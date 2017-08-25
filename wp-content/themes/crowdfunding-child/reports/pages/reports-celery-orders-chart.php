<?php

/**
 * Generate Reports
 */
global $wpdb, $wp;
$date_range = '';
$to_date = date('Y-m-d 23:59:59');
$from_date = date('Y-m-d 00:00:00', strtotime('-6 days'));
$chart_bottom_title = "Last 7 days";
$query_range = 'day_wise';


if (!empty($_GET['date_range'])) {
    $date_range = sanitize_text_field($_GET['date_range']);
    switch ($date_range) {

        case 'last_7_days':
            $chart_bottom_title = "Last 7 days";
            $query_range = 'day_wise';
            break;

        case 'this_month':
            $to_date = date('Y-m-d 23:59:59');
            $from_date = date('Y-m-01 00:00:00');
            $chart_bottom_title = "This Month";
            $query_range = 'day_wise';
            break;

        case 'last_month':
            $to_date = date('Y-m-t 23:59:59', strtotime('-1 month'));
            $from_date = date('Y-m-01 00:00:00', strtotime('-1 month'));
            $chart_bottom_title = "Last Month";
            $query_range = 'day_wise';
            break;

        case 'last_6_months':
            $to_date = date('Y-m-t 23:59:59', strtotime('-1 month'));
            $from_date = date('Y-m-01 00:00:00', strtotime('-6 month'));
            $chart_bottom_title = "Last 6 Months";
            $query_range = 'month_wise';
            break;

        case 'this_year':
            $to_date = date('Y-m-d 23:59:59');
            $from_date = date('Y-01-01 00:00:00');
            $chart_bottom_title = "This Year (" . date('Y') . ")";
            $query_range = 'month_wise';
            break;

        case 'last_year':
            $to_date = date('Y-12-31 23:59:59', strtotime('-1 year'));
            $from_date = date('Y-01-01 00:00:00', strtotime('-1 year'));
            $chart_bottom_title = "Last Year (" . (date('Y') - 1) . ")";
            $query_range = 'month_wise';
            break;
    }
}

if (!empty($_GET['date_range_from'])) {
    $from_date = sanitize_text_field($_GET['date_range_from']);
}
if (!empty($_GET['date_range_to'])) {
    $to_date = sanitize_text_field($_GET['date_range_to']);
}

$total_backers_amount_ever = array();
$from_time = strtotime('-1 day', strtotime($from_date));
$to_time = strtotime('-1 day', strtotime($to_date));

$total_orders_amount = array();
$total_charged_orders = array();
$total_not_charged_orders = array();


if ($from_time < $to_time) {
    // $format .= "['Date', 'Pledge Amount (".get_woocommerce_currency().")', 'Sales'],";

    if ($query_range === 'day_wise') {

        while ($from_time < $to_time) {
            $from_time = strtotime('+1 day', $from_time);
            $printed_date = date('d M', $from_time);

            //Get Total orders information
            $sql = "SELECT ID, DATE_FORMAT(post_date, '%d %b') AS order_time  ,$wpdb->postmeta.*, GROUP_CONCAT(DISTINCT ID SEPARATOR ',') AS order_ids FROM $wpdb->posts 
LEFT JOIN $wpdb->postmeta 
ON $wpdb->posts.ID = $wpdb->postmeta.post_id 
WHERE $wpdb->posts.post_type = 'shop_order'
AND meta_key = 'is_crowdfunding_order' AND meta_value = '1' AND post_status <> 'trash'  AND post_date LIKE '" . date('Y-m-d%', $from_time) . "' group by order_time";

            $results = $wpdb->get_results($sql);

            if ($results) {
                foreach ($results as $result) {
                    $total_orders_amount[] = $wpdb->get_var("(SELECT COUNT(ID) from $wpdb->posts where ID IN({$result->order_ids}) and post_type = 'shop_order' )");
                    $total_charged_orders[] = $wpdb->get_var(
                        "(SELECT COUNT(ID) from $wpdb->posts join $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id where ID IN({$result->order_ids}) and post_type = 'shop_order' AND meta_key = 'is_charged' AND meta_value = '1' )"
                    );
                    $total_not_charged_orders[] = $wpdb->get_var(
                        "(SELECT COUNT(ID) from $wpdb->posts join $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id where ID IN({$result->order_ids}) and post_type = 'shop_order' AND meta_key = 'is_charged' AND meta_value = '0' )"
                    );
                }
            } else {
                $total_orders_amount[] = 0;
            }

        }
    } else {
        $from_time = strtotime('-1 month', strtotime($from_date));
        $to_time = strtotime('-1 month', strtotime($to_date));

        while ($from_time < $to_time) {
            $from_time = strtotime('+1 month', $from_time);
            $printed_date = date('F', $from_time);

            $sql = "SELECT 
                        ID, MONTHNAME(post_date) AS order_time  ,$wpdb->postmeta.*, GROUP_CONCAT(DISTINCT ID SEPARATOR ',') AS order_ids 
                    FROM 
                        $wpdb->posts 
                    LEFT JOIN 
                        $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id 
                    WHERE 
                        $wpdb->posts.post_type = 'shop_order' AND meta_key = 'is_crowdfunding_order' AND meta_value = '1'  AND post_status <> 'trash' AND post_date
                    LIKE 
                        '" . date('Y-m%', $from_time) . "' group by order_time";

            $results = $wpdb->get_results($sql);


            if ($results) {
                foreach ($results as $result) {
                    $total_orders_amount[] = $wpdb->get_var("(SELECT COUNT(ID) from $wpdb->posts where ID IN({$result->order_ids}) and post_type = 'shop_order' )");
                    $total_charged_orders[] = $wpdb->get_var(
                        "(SELECT COUNT(ID) from $wpdb->posts join $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id where ID IN({$result->order_ids}) and post_type = 'shop_order' AND meta_key = 'is_charged' AND meta_value = '1' )"
                    );
                    $total_not_charged_orders[] = $wpdb->get_var(
                        "(SELECT COUNT(ID) from $wpdb->posts join $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id where ID IN({$result->order_ids}) and post_type = 'shop_order' AND meta_key = 'is_charged' AND meta_value = '0' )"
                    );

                }
            } else {
                $total_orders_amount[] = 0;
            }

        }

    }
}
$format .= ']';

/**
 * Get Total Campaigns
 */
$query_args = array(
    'post_type' => 'shop_order',
    'posts_per_page' => -1,
    'post_status' => array_keys(wc_get_order_statuses()),
    'date_query' => array(
        array(
            'after' => date('F jS, Y', strtotime($from_date)),
            'before' => array(
                'year' => date('Y', strtotime($to_date)),
                'month' => date('m', strtotime($to_date)),
                'day' => date('d', strtotime($to_date)),
            ),
            'inclusive' => true,
        ),
    ),
    'orderby' => 'ID',
);
$motivation_celery_orders = new WP_Query($query_args);


?>

<div class="wrap campaign-warp">
    <a href="<?php echo admin_url('admin.php?page=motivation-celery-reports&date_range=last_7_days'); ?>"
       class="page-title-action"><?php _e('Last 7 days', 'wp-crowdfunding'); ?></a>
    <a href="<?php echo admin_url('admin.php?page=motivation-celery-reports&date_range=this_month'); ?>"
       class="page-title-action"><?php _e('This Month', 'wp-crowdfunding'); ?></a>
    <a href="<?php echo admin_url('admin.php?page=motivation-celery-reports&date_range=last_month'); ?>"
       class="page-title-action"><?php _e('Last Month', 'wp-crowdfunding'); ?></a>
    <a href="<?php echo admin_url('admin.php?page=motivation-celery-reports&date_range=last_6_months'); ?>"
       class="page-title-action"><?php _e('Last 6 Months', 'wp-crowdfunding'); ?></a>
    <a href="<?php echo admin_url('admin.php?page=motivation-celery-reports&date_range=this_year'); ?>"
       class="page-title-action"><?php _e('This Year', 'wp-crowdfunding'); ?></a>
    <a href="<?php echo admin_url('admin.php?page=motivation-celery-reports&date_range=last_year'); ?>"
       class="page-title-action"><?php _e('Last Year', 'wp-crowdfunding'); ?></a>

    <form method="get" action="">
        <input type="hidden" name="page" value="motivation-celery-reports"/>
        <input type="text" id="datepicker" name="date_range_from" class="datepickers_1"
               value="<?php echo date('Y-m-d', strtotime($from_date)); ?>" placeholder="From"/>
        <input type="text" name="date_range_to" class="datepickers_1"
               value="<?php echo date('Y-m-d', strtotime($to_date)); ?>" placeholder="To"/>
        <input type="submit" value="Search" class="button" id="search-submit">
    </form>

    <div id="chart_div" style="width: 1200px;">
        <h2>Total KickMeNot Orders & Total Celery Charging Information</h2>

        <div class="celery_order_charge_report">
<!--            <div class="row">-->
                <table>
                    <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>KickMeNot Order ID</th>
                        <th>Celery Number</th>
                        <th>Is Charged (Yes/No)</th>
                        <th>Charge Date</th>
                        <th>Charge Message</th>
                        <th>Buyer Info</th>
                        <th>Card Summary</th>
                        <th>CVC Check</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    // The Loop
                    if ($motivation_celery_orders->have_posts()) {
                        while ($motivation_celery_orders->have_posts()) {
                            $motivation_celery_orders->the_post();
                            //Here orders data must be process
                            $order = $motivation_celery_orders->post;
                            ?>


                            <tr>
                                <td class="alert <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? 'alert-success' : 'alert-warning'?>">
                                    <?php echo motivation_fetch_date_from_string($order->post_date); ?>
                                </td>
                                <td class="alert <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? 'alert-success' : 'alert-warning'?>">
                                    <?php echo $order->ID; ?>
                                </td>
                                <td class="alert <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? 'alert-success' : 'alert-warning'?>">
                                    <?php echo get_post_meta($order->ID, 'celery_number', true); ?>
                                </td>
                                <td class="alert <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? 'alert-success' : 'alert-warning'?>">
                                    <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? 'YES' : 'NO'?>
                                </td>
                                <td class="alert <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? 'alert-success' : 'alert-warning'?>">
                                    <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? motivation_fetch_date_from_string(get_post_meta($order->ID, 'charge_date_from_celery', true)) : 'NO'?>
                                </td>
                                <td class="alert <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? 'alert-success' : 'alert-warning'?>">
                                    <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? get_post_meta($order->ID, 'charge_respond_from_celery', true) : 'NO'?>
                                </td>
                                <td class="alert <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? 'alert-success' : 'alert-warning'?>">
                                    <p>
                                        <?= get_post_meta($order->ID, 'client_details_ip', true) . '--' . get_post_meta($order->ID, 'buyer_name', true)?>
                                    </p>
                                </td>

                                <td class="alert <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? 'alert-success' : 'alert-warning'?>">
                                    <p>
                                        <?= get_post_meta($order->ID, 'payment_source_card_type', true) .
                                        '--' . get_post_meta($order->ID, 'payment_source_card_last4', true) .
                                        '--' . get_post_meta($order->ID, 'buyer_name', true)
                                        ?>
                                    </p>
                                </td>
                                <td class="alert <?= get_post_meta($order->ID, 'is_charged', true) == 1 ? 'alert-success' : 'alert-warning'?>">
                                    <?= get_post_meta($order->ID, 'payment_source_card_cvc_check', true)?>
                                </td>
                            </tr>

                        <?php }
                        /* Restore original Post Data */
                        wp_reset_postdata();
                    } else {
                        // no posts found
                    } ?>

                    </tbody>
                </table>
<!--            </div>-->
        </div>

        <p class="alert alert-success"><?php _e('Charged Orders : ', 'wp-crowdfunding'); ?><?php echo array_sum($total_charged_orders); ?> </p>

        <p class="alert alert-warning"><?php _e('Not Charged Orders: ', 'wp-crowdfunding'); ?><?php echo array_sum($total_not_charged_orders); ?> </p>

        <p class="alert alert-info"><?php _e('Total Orders : ', 'wp-crowdfunding'); ?><?php echo array_sum($total_orders_amount); ?> </p>
    </div>

