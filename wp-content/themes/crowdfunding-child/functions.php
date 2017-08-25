<?php
/*Enqueue parent and child  themes stylesheets */
function motivation_enqueue_styles()
{

    if (is_child_theme()) {
        wp_enqueue_style('parent-styles', get_template_directory_uri() . '/style.css');
    }

    // Here load active Child theme stylesheet for the Theme website

    //boostrap grid 24 column
    wp_register_style('motivation_wp_theme_kick_grid_24_css', get_stylesheet_directory_uri() . '/motivation/lib/css/kick.grid.24.css', array(), '1.0.4');
    wp_enqueue_style('motivation_wp_theme_kick_grid_24_css');

    //Reset style - default values
    wp_register_style('motivation_wp_theme_reset_css', get_stylesheet_directory_uri() . '/motivation/lib/css/reset.css', array('motivation_wp_theme_kick_grid_24_css'), '1.0.4');
    wp_enqueue_style('motivation_wp_theme_reset_css');
    //Fonts
    wp_register_style('motivation_wp_theme_fonts_css', get_stylesheet_directory_uri() . '/motivation/lib/css/fonts.css', array('motivation_wp_theme_reset_css'), '1.0.4');
    wp_enqueue_style('motivation_wp_theme_fonts_css');
    //main style
    wp_register_style('motivation_wp_theme_main_css', get_stylesheet_directory_uri() . '/motivation/lib/css/main.css', array('motivation_wp_theme_fonts_css'), '1.0.4');
    wp_enqueue_style('motivation_wp_theme_main_css');
    // responsive design here
    wp_register_style('motivation_wp_theme_responsive_css', get_stylesheet_directory_uri() . '/motivation/lib/css/responsive.css', array('motivation_wp_theme_main_css'), '1.0.4');
    wp_enqueue_style('motivation_wp_theme_responsive_css');


    //js
    wp_register_script('motivation_theme_custom_js', get_stylesheet_directory_uri() . '/motivation/lib/js/custom.js', array('jquery'), '1.0.2', true);
    wp_enqueue_script('motivation_theme_custom_js');

    if (is_product()) {

//        wp_register_script('motivation_single_product_prettysocial_js', get_stylesheet_directory_uri() . '/motivation/lib/js/jquery.mt_prettysocial.js', array('jquery'), '1.0.1', true);
//        wp_enqueue_script('motivation_single_product_prettysocial_js');

        wp_register_script('motivation_single_product_js', get_stylesheet_directory_uri() . '/motivation/lib/js/single-product.js', array('jquery'), '1.0.2', true);
        wp_enqueue_script('motivation_single_product_js');
    }
}

add_action('wp_enqueue_scripts', 'motivation_enqueue_styles',10000);

function load_motivation_wp_admin_style($hook)
{
    //css
    wp_register_style('bootstrap_css', get_stylesheet_directory_uri() . '/motivation/lib/css/bootstrap-progress-bar-only.css', array('woocommerce_admin_styles'), '1.0.0');
    wp_enqueue_style('bootstrap_css');

    wp_register_style('motivation_wp_admin_css', get_stylesheet_directory_uri() . '/motivation/lib/css/admin.css', array('bootstrap_css'), '1.0.1');
    wp_enqueue_style('motivation_wp_admin_css');

    //js
    wp_register_script('motivation_admin_randomize_js', get_stylesheet_directory_uri() . '/motivation/lib/js/script-randomize.js', array('jquery'), '1.0.1', true);
    wp_enqueue_script('motivation_admin_randomize_js');

}

add_action('admin_enqueue_scripts', 'load_motivation_wp_admin_style');

//Add page with 'randomizer' name create access point to randomization
function crowdfunding_child_setup()
{

    $args = ['post_type' => 'page', 'name' => 'randomizer', 'numberposts' => -1];
    $pages = get_posts($args);

    if (empty($pages)) {
        $post_data = array(
            'post_title' => 'Randomize products',
            'post_content' => 'This is the access point for randomization process ...',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_name' => 'randomizer',
            'post_type' => 'page',
        );

        $post_id = wp_insert_post(wp_slash($post_data));
    }
}

add_action('after_setup_theme', 'crowdfunding_child_setup');

function checkOnThemeLoad()
{
    //Check time zone
    if (empty(get_option('timezone_string')) or get_option('timezone_string') == 'UTC') {
        echo 'Warning! !Your time zone is empty or set to UTC or set to Manual offset. Please set timezone in WP admin panel to appropriate value  for example: "America/Toronto".';
        echo '<br>';
    };

    //Check WP-Cron
    if (!defined('DISABLE_WP_CRON') or !DISABLE_WP_CRON) {
        echo 'Error! You must switch off WP-Cron function first!';
        echo '<br>';
        echo 'Please add this "define(\'DISABLE_WP_CRON\', true);" to your wp-config.php.';
    };

}

add_action('wp', 'checkOnThemeLoad');

/*Use WP-Cron*/
/*To set up minute interval for WP-Cron Schedule*/
function cron_add_one_minute($schedules)
{

    // Adds once minute to the existing schedules.
    $schedules['minute'] = array(
        'interval' => 5, // 5 сек.
        'display' => __('Every One Minute')
    );
    return $schedules;
}

add_filter('cron_schedules', 'cron_add_one_minute');

/*Create wp-cron activation hook*/
function wp_cron_activation()
{
    if (!wp_next_scheduled('motivation_init_randomization_all_event')) {
        wp_schedule_event(time(), 'minute', 'motivation_init_randomization_all_event');
    }
}

/*Execute hook after wp class is set up*/
add_action('wp', 'wp_cron_activation');
/*Set up randomization every minute by WP-Cron*/
add_action('motivation_init_randomization_all_event', 'motivation_total_randomization_process');


function image_size_register() {
    add_theme_support( 'post-thumbnails', array('product') ); // This feature enables post-thumbnail support for a theme
    add_image_size( 'featured-image-42-42', 42, 42, true );
    add_image_size( 'featured-image-30-30', 30, 30, true );
}
add_action( 'after_setup_theme', 'image_size_register' );



/*Add thumbnail for Product company creator*/
if (class_exists('MultiPostThumbnails')) {
    $types = array('product');
    foreach($types as $type) {
        new MultiPostThumbnails(array(
                'label' => 'Company thumbnail (must be square!):',
                'id' => 'company-creator-image',
                'post_type' => $type
            )
        );
    }
}


/*-------------------------------------------
*           KingComposer Shortcode
*--------------------------------------------*/
require_once( get_stylesheet_directory() . '/lib/addons/kc-slider.php' );
//require_once( get_stylesheet_directory() . '/lib/addons/kc-listing.php' );

/*-------------------------------------------*/

/*Import ajax hooks for WP admin panel*/
require_once get_stylesheet_directory() . '/motivation/admin-panel/motivation-ajax-hooks.php';

/*Import motivation block hooks */
require_once get_stylesheet_directory() . '/motivation/admin-panel/motivation-add-admin-setting-block.php';

/*Import motivation function DB Query etc*/
require_once get_stylesheet_directory() . '/motivation/common/motivation-functions.php';

/*Import function for frontend templates (took from plugin and modify)*/
require_once get_stylesheet_directory() . '/motivation/include/class-motivation-frontend-hook.php';

/*Add WP-Cron functions*/
require_once get_stylesheet_directory() . '/motivation/randomize/motivation-randomization-functions.php';

/*Add Template Functions*/
require_once get_stylesheet_directory() . '/motivation/include/motivation-template-functions.php';

/*Add Template Hooks*/
require_once get_stylesheet_directory() . '/motivation/include/motivation-template-hook.php';

/*Login section*/
require_once get_stylesheet_directory() . '/lib/login.php';

/*Load sidebar registration*/
require_once get_stylesheet_directory() . '/lib/main-function/crowdfunding-register.php';

/*Celery payment system*/
require_once get_stylesheet_directory() . '/celery-connect/celery-connect.php';

/*WooCommerce order creation class*/
require_once get_stylesheet_directory() . '/woocommerce/class-motivation-woo-oder.php';

/*WooCommerce orders charging on Celery process hooks (Add new bulk action for WooCommerce orders list)*/
require_once get_stylesheet_directory() . '/woocommerce/motivation-wc-orders-charging-celery.php';


/*Motivation Reports (e.g. Celery order charging)*/
require_once get_stylesheet_directory() . '/reports/reports.php';
