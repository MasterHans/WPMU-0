<?php
/**
 * Plugin Name:   Call to Action Widget
 * Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
 * Description:   Adds a widget for a call to action box
 * Version:       1.0
 * Author:        Rachel McCollin
 * Author URI:    http://rachelmccollin.co.uk
 * Text Domain: wpmu
 * Domain Path: /languages
 */

/*********************************************************************************
Enqueue stylesheet
 *********************************************************************************/
function wpmu_widget_enqueue_styles() {

    wp_register_style( 'cta_css', plugins_url( 'public/css/style.css', __FILE__ ) );
    wp_enqueue_style( 'cta_css' );

}
add_action( 'wp_enqueue_scripts', 'wpmu_widget_enqueue_styles' );

class Wpmu_Cta_Widget extends WP_Widget {
    function __construct() {
        $widget_options = array(
            'classname' => 'wpmu_cta_widget',
            'description' => 'Add a Call to Action box encouraging people to get in touch.'
        );
        parent::__construct( 'wpmu_cta_widget', __('Call to Action', 'wpmu'), $widget_options );
    }
    function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $tel = ! empty( $instance['tel'] ) ? $instance['tel'] : 'Telephone number';
        $email = ! empty( $instance['email'] ) ? $instance['email'] : 'Email address';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wpmu'); ?></label>
            <input class="widefat" type ="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'tel' ); ?>"><?php _e('Your telephone number:', 'wpmu'); ?></label>
            <input class="widefat" rows="10" type="text" id="<?php echo $this->get_field_id( 'tel' ); ?>" name="<?php echo $this->get_field_name( 'tel' ); ?>" value="<?php echo esc_attr( $tel ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('Your email address:', 'wpmu'); ?></label>
            <input class="widefat" rows="10" type="text" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $email ); ?>" />
        </p>

    <?php }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        $instance[ 'tel' ] = strip_tags( $new_instance[ 'tel' ] );
        $instance[ 'email' ] = strip_tags( $new_instance[ 'email' ] );
        return $instance;
    }

    function widget( $args, $instance ) {
        echo $args ['before_widget'];
        $title = apply_filters( 'widget_title', $instance[ 'title' ] );
        $tel = $instance['tel'];
        $email = $instance['email'];
        ?>
        <div class="shortcode cta">
            <?php if ( ! empty( $title ) ) {
                echo $args['before_title'] . $title . $args['after_title'];
		}; ?>
            <?php printf( __( 'Call us on %1$s or email <a href="%2$s">%2$s</a>', 'wpmu' ), $tel, $email ); ?>
        </div>

        <?php echo $args['after_widget'];
    }
}
function wpmu_register_widget() {
    register_widget( 'Wpmu_Cta_Widget' );
}
add_action( 'widgets_init', 'wpmu_register_widget' );

function wpmu_cta_widget_i18n()
{
    load_plugin_textdomain('wpmu', false, plugin_basename(dirname(__FILE__)) . '/languages');
}

add_action('after_setup_theme', 'wpmu_cta_widget_i18n');