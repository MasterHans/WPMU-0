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
        wp_register_script('pick_up_image_js', THIS_PLUGIN_CATALOG_DIR_URL . 'pick_up_image.js', array('jquery'), '1.0.2', true);
        wp_enqueue_script('pick_up_image_js');
    }
}

//This hook fires up when the featured image had selected in modal windows and clicked "Set featured Image" button
add_action('wp_ajax_resize_featured_image_on_fly', 'resize_featured_image_on_fly_callback');

function resize_featured_image_on_fly_callback()
{
    add_image_size( 'loop_thumbnail', 476, 249, true );
    $attachment_id = $_POST['attachment_id'];
    $filename = get_attached_file($attachment_id);

    // Create new image size only for picked up featured image
    $attach_data = wp_generate_attachment_metadata( $attachment_id, $filename );
    wp_update_attachment_metadata( $attachment_id, $attach_data );

    wp_die(); //exit to exclude everything extra
}

