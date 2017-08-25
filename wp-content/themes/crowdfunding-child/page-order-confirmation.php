<?php
/*
Template Name: Order Confirmation
*/

//'number' => string '101372823' (length=9)
//'email' => string 'test@mail.com' (length=13)

$celery = new Motivation_Celery_Connect();

if (empty($_GET['number'])) {
    wp_redirect(get_home_url() . '/404-2/');
    exit;
}

$respond = $celery->get_order_from_celery($_GET['number']);

$respond = json_decode($respond, true);
//var_dump($respond);
//wp_die();
$celery_meta_code = $respond['meta']['code'];
$celery_order_data = $respond['data'];

$celery_order_data ['celery_product_checkout_url'] = $celery->celery_product_checkout_url;

if ($celery_meta_code === 200) {

    //Create order in KickMeNot WooCommerce
    $woo_order_data = new Motivation_Woo_Order();
    $woo_order_data->create($celery_order_data);

//    var_dump($celery_order_data);

    $redirect_url = get_home_url() . '/order-succeed/?number=' . $celery_order_data['number'];
} else {
    $redirect_url = get_home_url() . '/order-failed/';
}


wp_redirect($redirect_url);
exit;




