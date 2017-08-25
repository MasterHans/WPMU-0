<?php
/**
 * Adds a new item into the Bulk Actions dropdown.
 * for WooCommerce orders list
 */
function motivation_register_my_bulk_actions($bulk_actions)
{
    $bulk_actions['charge_on_celery'] = __('Charge order on Celery', 'wp-crowdfunding');
    return $bulk_actions;
}

add_filter('bulk_actions-edit-shop_order', 'motivation_register_my_bulk_actions');


/**
 *
 * Processing Bulk action for orders
 * @param $redirect_to
 * @param $action
 * @param $post_ids
 * @return string
 */
function motivation_handle_bulk_actions_edit_product($redirect_to, $action, $post_ids)
{
    if ($action != 'charge_on_celery') {
        return $redirect_to;
    }

    $charged_orders_ids = array();
    $failed_orders_ids = array();
    $already_charged_orders_ids = array();
    $not_crowdfunding_orders_ids = array();

    foreach ($post_ids as $post_id) {
        $order = wc_get_order($post_id);


        if (get_post_meta($post_id, 'is_crowdfunding_order', true) == 1 && $order->get_status() !== 'complete') {

            $celery = new Motivation_Celery_Connect();
            if (get_post_meta($post_id, 'is_charged', true) == 0) {
                if ($celery->charge_order_on_celery($order)) {
                    $charged_orders_ids[] = $post_id;
                } else {
                    $failed_orders_ids[] = $post_id;
                };
            } else {
                $already_charged_orders_ids[] = $post_id;
            }

        } else {
            $not_crowdfunding_orders_ids[] = $post_id;
        }
    }

    $redirect_to = add_query_arg(
        [
            'charged_orders_ids' => $charged_orders_ids,
            'failed_orders_ids' => $failed_orders_ids,
            'already_charged_orders_ids' => $already_charged_orders_ids,
            'not_crowdfunding_orders_ids' => $not_crowdfunding_orders_ids,
        ],
        $redirect_to
    );

    return $redirect_to;
}

add_filter('handle_bulk_actions-edit-shop_order', 'motivation_handle_bulk_actions_edit_product', 10, 3);


function motivation_bulk_action_edit_order_admin_notice()
{
    if (isset($_REQUEST['charged_orders_ids'])) {
        $charged_products = $_REQUEST['charged_orders_ids'];
        $charged_products_count = intval(count($charged_products));
        $array_to_display = implode(',', $charged_products);

        echo '<div id="message" class="' . ($charged_products_count > 0 ? 'updated' : 'error') . '">';

        if ($charged_products_count > 0) {
            echo '<p>' . __('Charged successfully : ' . $charged_products_count . ' ' . _n('order', 'orders', $charged_products_count, 'wordpress') . '!', 'wordpress') . '(' . $array_to_display . ')' . '</p>';
            echo '<p>' . $array_to_display . '</p>';
        } else {
            echo '<p>' . __('No orders were charged!', 'wordpress') . '</p>';
        }

        echo '</div>';
    }

    if (isset($_REQUEST['failed_orders_ids'])) {
        $failed_orders_ids = $_REQUEST['failed_orders_ids'];
        $failed_orders_ids_count = intval(count($failed_orders_ids));
        $array_to_display = implode(',', $failed_orders_ids);

        echo '<div id="message" class="error">';

        if ($failed_orders_ids_count > 0) {
            echo '<p>' . __('Failed to charge : ' . $failed_orders_ids_count . ' ' . _n('order', 'orders', $failed_orders_ids_count, 'wordpress') . '!', 'wordpress') . '(' . $array_to_display . ')' . '</p>';
            echo '<p>' . $array_to_display . '</p>';
        }

        echo '</div>';
    }

    if (isset($_REQUEST['already_charged_orders_ids'])) {
        $already_charged_orders_ids = $_REQUEST['already_charged_orders_ids'];
        $already_charged_orders_ids_count = intval(count($already_charged_orders_ids));
        $array_to_display = implode(',', $already_charged_orders_ids);

        echo '<div id="message" class="error">';

        if ($already_charged_orders_ids_count > 0) {
            echo '<p>' . __('Already charged orders : ' . $already_charged_orders_ids_count . ' ' . _n('order', 'orders', $already_charged_orders_ids_count, 'wordpress') . '! No need to charge skipped...', 'wordpress') . '(' . $array_to_display . ')' . '</p>';
            echo '<p>' . $array_to_display . '</p>';
        }

        echo '</div>';
    }

    if (isset($_REQUEST['not_crowdfunding_orders_ids'])) {
        $not_crowdfunding_orders_ids = $_REQUEST['not_crowdfunding_orders_ids'];
        $not_crowdfunding_orders_ids_count = intval(count($not_crowdfunding_orders_ids));
        $array_to_display = implode(',', $not_crowdfunding_orders_ids);

        echo '<div id="message" class="error">';

        if ($not_crowdfunding_orders_ids_count > 0) {
            echo '<p>' . __('This orders are not from crowdfunding or complete : ' . $not_crowdfunding_orders_ids_count . ' ' . _n('order', 'orders', $not_crowdfunding_orders_ids_count, 'wordpress') . '! No need to charge skipped...', 'wordpress') . '(' . $array_to_display . ')' . '</p>';
            echo '<p>' . $array_to_display . '</p>';
        }

        echo '</div>';
    }
}

add_action('admin_notices', 'motivation_bulk_action_edit_order_admin_notice');


/**
 * Add a custom action to order actions select box on edit order page
 * Only added for charged orders that haven't fired this action yet
 *
 * @param array $actions order actions array to display
 * @return array - updated actions
 */
function motivation_wc_add_order_meta_box_action()
{
//    global $theorder;

//    // bail if the order has been paid for or this action has been run
//    if ( ! $theorder->is_paid() || get_post_meta( $theorder->id, 'is_charged', 1 ) ) {
//        return $actions;
//    }
    // add "mark charged" custom action
    $actions['wc_charge_on_celery_order_action'] = __('Charge order on Celery', 'wp-crowdfunding');
    return $actions;
}

add_action('woocommerce_order_actions', 'motivation_wc_add_order_meta_box_action');


/**
 * Add an order note when custom action is clicked
 * Add a flag on the order to show it's been run
 * Send to Celery charge request
 * @param \WC_Order $order
 */
function motivation_wc_process_order_meta_box_action($order)
{
    if (get_post_meta($order->id, 'is_crowdfunding_order', true) == 1 && $order->get_status() !== 'complete') {
        if (get_post_meta($order->id, 'is_charged', true) == 0) {
            $celery = new Motivation_Celery_Connect();
            $celery->charge_order_on_celery($order);
        }
    }
}

add_action('woocommerce_order_action_wc_charge_on_celery_order_action', 'motivation_wc_process_order_meta_box_action');