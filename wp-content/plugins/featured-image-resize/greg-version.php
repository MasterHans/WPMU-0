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

// Fine-tuning the plug-in
// Returns all the thumbnail size required, and the croping mode
// Returns the limits of images in the theme
function get_thumbnail_settings(){
    // Setting the max height and width used by images in the theme
    $limits = array( "w_limit" => 0, "y_limit" => 450 );

    // If there is a multisite network
    switch( explode('.', $_SERVER['HTTP_HOST'])[0] ){
        case "banc-refuge":
            $sizes = array(
                "medium" => array( "name" => "medium" , "x" => 300 , "y" => 200 , "hardcrop" => true )
            );
            break;
        default: //blog
            $sizes = array(
                "small" => array( "name" => "small" , "x" => 238 , "y" => 125 , "hardcrop" => true ),
                "medium" => array( "name" => "medium" , "x" => 476 , "y" => 249 , "hardcrop" => true ),
                // "large" => array( "name" => "large" , "x" => 550 , "y" => 450 )
            );
            break;
    }
    return array( "sizes" => $sizes , "limits" => $limits );
}

// Modify how thumbnails are created : now only when selected as featured images
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
    $settings = get_thumbnail_settings();

    foreach( $settings['sizes'] as $s )
        add_image_size( 'custom_thumbnail_' . $s['name'] , $s['x'], $s['y'], $s['hardcrop'] );

    $attachment_id = $_POST['attachment_id'];
    $filename = get_attached_file($attachment_id);

    // Create new image size only for picked up featured image
    $attach_data = wp_generate_attachment_metadata( $attachment_id, $filename );
    wp_update_attachment_metadata( $attachment_id, $attach_data );

    wp_die(); //exit to exclude everything extra
}

// Adding Retina support
// Loading the script downloaded at http://imulus.github.io/retinajs/
add_action('wp_enqueue_scripts', 'load_retina_js');
function load_retina_js()
{
    //js
    wp_register_script('retina', THIS_PLUGIN_CATALOG_DIR_URL . 'retina.min.js', "", '', true);
    wp_enqueue_script('retina');
}

// Generating @2x versions
add_action( 'HOOK TO UPDATE' , 'generate_retina_version' );
function generate_retina_version(){
    $settings = get_thumbnail_settings();

    // IF the current image is the source file
        // IF( $settings['limits']['w_limit'] == 0 || ( $settings['limits']['w_limit'] != 0 && image width >= ( $settings['limits']['w_limit'] * 2 ) ) &&
        //     $settings['limits']['h_limit'] == 0 || ( $settings['limits']['h_limit'] != 0 && image height >= ( $settings['limits']['h_limit'] * 2 ) ) )
            // Appen @2x between filename and extension
            // Create a copy of the image that is half the dimensions and use the original filename
        // ELSE, there are no limits set and/or the file is too small
        // Create a duplicate of the original file, that is twice its size and name with an @2x attribute

    // ELSE, the current image is a thumbnail
    // Generate the thumbnail, the regular way
    // create a retina version of the thumbnail from the original file
}