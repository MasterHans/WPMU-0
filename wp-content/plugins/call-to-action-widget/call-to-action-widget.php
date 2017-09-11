<?php
/**
 * Plugin Name:   Call to Action Widget
 * Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
 * Description:   Adds a widget for a call to action box
 * Version:       1.0
 * Author:        Rachel McCollin
 * Author URI:    http://rachelmccollin.co.uk
 *
 *
 */

/*********************************************************************************
Enqueue stylesheet
 *********************************************************************************/
function wpmu_widget_enqueue_styles() {

    wp_register_style( 'cta_css', plugins_url( 'css/style.css', __FILE__ ) );
    wp_enqueue_style( 'cta_css' );

}
add_action( 'wp_enqueue_scripts', 'wpmu_widget_enqueue_styles' );