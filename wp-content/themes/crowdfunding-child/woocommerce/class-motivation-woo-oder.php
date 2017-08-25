<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Motivation_Woo_Order
{
    /**
     *  Create Woocommerce Order from Celery Data
     */
    public function create($data)
    {

        $shipping_address = array(
            'first_name' => $data['shipping_address']['first_name'],
            'last_name' => $data['shipping_address']['last_name'],
            'company' => $data['shipping_address']['company'],
            'email' => $data['buyer']['email'],
            'phone' => $data['shipping_address']['phone'],
            'address_1' => $data['shipping_address']['line1'],
            'address_2' => $data['shipping_address']['line2'],
            'city' => $data['shipping_address']['city'],
            'state' => $data['shipping_address']['state'],
            'postcode' => $data['shipping_address']['zip'],
            'country' => $data['shipping_address']['country'],
        );

        $billing_address = array(
            'first_name' => $data['billing_address']['first_name'],
            'last_name' => $data['billing_address']['last_name'],
            'company' => $data['billing_address']['company'],
            'email' => $data['buyer']['email'],
            'phone' => $data['billing_address']['phone'],
            'address_1' => $data['billing_address']['line1'],
            'address_2' => $data['billing_address']['line2'],
            'city' => $data['billing_address']['city'],
            'state' => $data['billing_address']['state'],
            'postcode' => $data['billing_address']['zip'],
            'country' => $data['billing_address']['country'],
        );

        $product_id = motivation_get_product_id_by_celery_url(
            $data['celery_product_checkout_url'] .
            $data['line_items'][0]['product_id']
        );
        $product = wc_get_product($product_id);
        $order = wc_create_order();

        $args['totals']['subtotal'] = $data['subtotal'] / 100;
        $args['totals']['total'] = $data['subtotal'] / 100;
        //$args['totals']['total'] = intval($data['total']);


        $order->add_product($product, $data['line_items'][0]['quantity'], $args);
        $order->set_address($billing_address, 'billing');
        $order->set_address($shipping_address, 'shipping');

//to change order status
//    $order->update_status("completed", 'Imported order', TRUE);
        $order->calculate_totals();
//        $order->add_order_note(  );
        // payment_complete
//    $order->payment_complete();
//    var_dump($order->id);
        update_post_meta($order->id, 'is_crowdfunding_order', '1');
        update_post_meta($order->id, 'celery_order_id', $data['_id']);
        update_post_meta($order->id, 'is_charged', 0);
        update_post_meta($order->id, 'celery_number', $data['number']);

        //Buyer
        update_post_meta($order->id, 'client_details_ip', $data['client_details']['ip']);
        update_post_meta($order->id, 'buyer_name', $data['buyer']['name']);
        update_post_meta($order->id, 'buyer_notes', $data['buyer']['notes']);


        //Card
        update_post_meta($order->id, 'payment_source_card_type', $data['payment_source']['card']['type']);
        update_post_meta($order->id, 'payment_source_card_last4', $data['payment_source']['card']['last4']);
        update_post_meta($order->id, 'payment_source_card_cvc_check', $data['payment_source']['card']['cvc_check']);
        update_post_meta($order->id, 'payment_source_card_zip_check', $data['payment_source']['card']['zip_check']);


        //Save Celery order number to Woo order
        $message = 'Order number on Celery is: ' . $data['number'];
        $order->add_order_note($message);
        //Save Buyer note to Seller order number to Woo order
        if (!empty($data['buyer']['notes'])) {
            $message = 'The message to seller from buyer: ' . $data['buyer']['notes'];
            $order->add_order_note($message);
        }
    }
}

function add_motivation_woo_order($methods)
{
    $methods[] = 'Motivation_Celery_Connect';
    return $methods;
}

add_filter('woocommerce_payment_gateways', 'add_motivation_woo_order');