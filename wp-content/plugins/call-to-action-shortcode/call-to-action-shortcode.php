<?php
/**
 * Plugin Name:   Call to Action Shortcode
 * Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
 * Description:   Adds a shortcode for a call to action box
 * Version:       1.0
 * Author:        Rachel McCollin
 * Author URI:    http://rachelmccollin.co.uk
 *
 */

function wpmu_shortcode_enqueue_styles()
{

    wp_register_style('shortcode_cta_css', plugins_url('public/css/style.css', __FILE__));
    wp_enqueue_style('shortcode_cta_css');

}

add_action('wp_enqueue_scripts', 'wpmu_shortcode_enqueue_styles');

function wpmu_cta_simple()
{
    ob_start();
    ?>

    <div class="shortcode cta">

        <?php _e('Call us on 111-1111 or email <a href="email@email.com">email@email.com</a>', 'wpmu'); ?>

    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('cta-simple', 'wpmu_cta_simple');

function wpmu_cta_tags($atts, $content = null)
{
    ob_start();
    ?>

    <div class="shortcode cta">

        <?php echo $content; ?>

    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('cta-tags', 'wpmu_cta_tags');

function wpmu_cta_atts($atts, $content = null)
{

    $atts = shortcode_atts(array(
        'tel' => 'telephone',
        'email' => 'email address'
    ), $atts, 'cta-atts');

    ob_start();
    ?>


    <div class="shortcode cta">
        <?php
            $tel = $atts['tel'];
            $email = $atts['email'];

        ?>
        <?php printf( __( 'Call us on %1$s or email <a href="%2$s">%2$s</a>', 'wpmu'), $tel, $email); ?>

    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('cta-atts', 'wpmu_cta_atts');