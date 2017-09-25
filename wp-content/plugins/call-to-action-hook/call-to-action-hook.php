<?php
/**
 * Plugin Name:   Call to Action Hook
 * Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
 * Description:   Adds a call to action box as a hook below the content
 * Version:       1.0
 * Author:        Rachel McCollin
 * Author URI:    http://rachelmccollin.co.uk
 * Text Domain: wpmu
 * Domain Path: /languages
 */

/*********************************************************************************
 * Enqueue stylesheet
 *********************************************************************************/
function wpmu_hook_enqueue_styles()
{

    wp_register_style('cta_css', plugins_url('public/css/style.css', __FILE__));
    wp_enqueue_style('cta_css');

}

add_action('wp_enqueue_scripts', 'wpmu_hook_enqueue_styles');


/**
 * Adds function to the hook created previously
 */
function wpmu_cta_below_posts()
{

    if (is_singular('post')) { ?>
        <hr>
        <div class="cta-in-post">
            <?php _e('Call us on 777-1111 or email <a href="email@email.com">email@email.com</a>', 'wpmu') ?>
        </div>

    <?php }
}

add_action('wpmu_after_content', 'wpmu_cta_below_posts');

function wpmu_cta_hook_i18n()
{

    load_plugin_textdomain('wpmu', false, plugin_basename(dirname(__FILE__)) . '/languages');

}

add_action('after_setup_theme', 'wpmu_cta_hook_i18n');