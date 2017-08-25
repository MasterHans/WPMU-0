<?php
require_once get_stylesheet_directory() . '/motivation/randomize/class-motivation-randomize.php';

//Hook for Ajax "Randomize" button in admin panel WooCommerce / Product 
function motivation_randomize_button_click_callback()
{
    $data = [];
    foreach ($_POST as $key => $val) {
//        if (!empty($val) && (strpos($key, 'motivation_') === 0)) {
        if (strpos($key, 'motivation_') === 0) {
            $data[$key] = $val;
        }
    };


    $randomize = new Motivation_Randomize();
    //Switch on/off detailed debug
    $randomize->debug_details = false;
    $data = $randomize->randomizeOne($data);

    $motivation_pledged_percent = ($data['motivation_pledged'] >= $data['motivation_funding_goal']) ? 100 : ($data['motivation_pledged'] * 100) / $data['motivation_funding_goal'];
    $motivation_pledged_percent = Round($motivation_pledged_percent, 2);

    $data['motivation_pledged_percent'] = $motivation_pledged_percent;

    $data_json = json_encode($data);

    echo $data_json;

    wp_die(); //exit to exclude everything extra
}

add_action('wp_ajax_motivation_randomize_button_click', 'motivation_randomize_button_click_callback');