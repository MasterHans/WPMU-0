<?php
/*
Plugin Name: Featured Image Resize
Plugin URI: http://wordpress.org/plugins/wise-thoughts/
Description: This plugin resize image when the user set featured image in QP admin.
Author: Alexander Suvorov
Version: 1.0
Author URI: http://masterhans.ru/
*/
define('THIS_PLUGIN_CATALOG_DIR_URL', plugin_dir_url(__FILE__));

add_action('admin_enqueue_scripts', 'load_custom_admin_js');
function load_custom_admin_js()
{
    //js
    if (is_admin()) {
        wp_register_script('pick_up_image_js', THIS_PLUGIN_CATALOG_DIR_URL . 'pick_up_image.js', array('jquery'), '1.0.1', true);
        wp_enqueue_script('pick_up_image_js');
    }
}

//add_action('admin_init', 'add_test_content');
//function add_test_content()
//{
//    echo '
//    <h1>TEST</h1>
//    <h1>TEST</h1>
//    <h1>TEST</h1>
//    <h1>TEST</h1>
//    <h1>TEST</h1>
//    <h1>TEST</h1>
//    <div class="media-toolbar">
//        <div class="media-toolbar-secondary"></div>
//            <div class="media-toolbar-primary search-form">
//                <button type="button" class="button media-button button-primary button-large media-button-select" style="margin-left: 400px">Set featured image</button>
//            </div>
//    </div>
//
//
//    ';
//}
