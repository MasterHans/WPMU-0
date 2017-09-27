<?php
/*
* Plugin Name:   The final Challenge plugin Part 1
* Plugin URI:    http://masterhans.ru
* Description:   Adds the custom type "employees" and taxonomies  "managers", "repairmen"
* Version:       1.0
* Author:        Alex Suvorov
* Author URI:    http://masterhans.ru
* Text Domain: sag
* Domain Path: /languages
*/

/**
 * Registers new post type 'Employee'
 */
function sag_create_post_type_employee()
{
    $labels = array(
        'name' => __('Employees', 'sag'),
        'singular_name' => __('Employee', 'sag-intermediate-final-challenge-plugin-part-1'),
        'add_new' => __('New Employee', 'sag-intermediate-final-challenge-plugin-part-1'),
        'add_new_item' => __('Add New Employee', 'sag-intermediate-final-challenge-plugin-part-1'),
        'edit_item' => __('Edit Employee', 'sag-intermediate-final-challenge-plugin-part-1'),
        'new_item' => __('New Employee', 'sag-intermediate-final-challenge-plugin-part-1'),
        'view_item' => __('View Employee', 'sag-intermediate-final-challenge-plugin-part-1'),
        'search_items' => __('Search Employees', 'sag-intermediate-final-challenge-plugin-part-1'),
        'not_found' => __('No Employees Found', 'sag-intermediate-final-challenge-plugin-part-1'),
        'not_found_in_trash' => __('No Employees found in Trash', 'sag-intermediate-final-challenge-plugin-part-1'),
    );
    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'employees'),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'custom-fields',
            'thumbnail',
            'page-attributes'
        ),
        'taxonomies' => array('post_tag', 'category'),
    );
    register_post_type('employee', $args);
}

add_action('init', 'sag_create_post_type_employee');


/**
 * Register the custom taxonomy - "Repairman"
 */
function sag_register_taxonomies()
{
//Register "Occupation"
    $labels = array(
        'name' => __('Positions', 'sag-intermediate-final-challenge-plugin-part-1'),
        'singular_name' => __('Repairman', 'sag-intermediate-final-challenge-plugin-part-1'),
        'search_items' => __('Search Positions', 'sag-intermediate-final-challenge-plugin-part-1'),
        'all_items' => __('All Positions', 'sag-intermediate-final-challenge-plugin-part-1'),
        'edit_item' => __('Edit Positions', 'sag-intermediate-final-challenge-plugin-part-1'),
        'update_item' => __('Update Positions', 'sag-intermediate-final-challenge-plugin-part-1'),
        'add_new_item' => __('Add New Positions', 'sag-intermediate-final-challenge-plugin-part-1'),
        'new_item_name' => __('New Position Name', 'sag-intermediate-final-challenge-plugin-part-1'),
        'menu_name' => __('Positions', 'sag-intermediate-final-challenge-plugin-part-1'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'sort' => true,
        'args' => array('orderby' => 'term_order'),
        'rewrite' => array('slug' => 'positions'),
        'show_admin_column' => true
    );

    register_taxonomy('position', array('post', 'employee'), $args);
}

add_action('init', 'sag_register_taxonomies');


/**
 * Register metadata for my custom post type
 */

/**
 * Adds metabox to admin screen
 */
function sag_add_post_metabox() {
    add_meta_box( 'sag_metabox', __('Occupation:', 'sag-intermediate-final-challenge-plugin-part-1'), 'sag_metabox_callback', 'employee', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'sag_add_post_metabox' );

function sag_metabox_callback( $post ) { ?>

		<?php // add nonce for security
		wp_nonce_field( 'sag_metabox_nonce', 'sag_nonce' );

		//retrieve metadata value if it exists
		$skills = get_post_meta( $post->ID, 'sag_skills', true ); ?>

		<label for "sag_metadata_skills"><?php _e('Employee Skills','sag-intermediate-final-challenge-plugin-part-1');?></label>
		<input type="text" name="sag_metadata_skills" value=<?php echo esc_attr( $skills ); ?>>

<?php }

function sag_save_my_meta( $post_id ) {

	//check for nonce
	if( !isset( $_POST['sag_nonce'] ) ||
	!wp_verify_nonce( $_POST['sag_nonce'], 'sag_metabox_nonce' ) ) {
	  return;
	}

	// Check if the current user has permission to edit the post.
	if ( !current_user_can( 'edit_post', $post_id ) ) {
	  return;
	 }

	if ( isset( $_POST['sag_metadata_skills'] ) ) {
		$new_value = ( $_POST['sag_metadata_skills'] );
		update_post_meta( $post_id, 'sag_skills', $new_value );
	}

}
add_action( 'save_post', 'sag_save_my_meta' );


/**
* Switch off the standart output of custom fields in admin screen
 */
function sag_remove_custom_fields_ui() {

	remove_meta_box( 'postcustom', 'post', 'normal' );

}
add_action( 'admin_init','sag_remove_custom_fields_ui' );


function sag_metabox_plugin_i18n()
{
    load_plugin_textdomain('sag-intermediate-final-challenge-plugin-part-1', false, plugin_basename(dirname(__FILE__)) . '/languages');
}

add_action('after_setup_theme', 'sag_metabox_plugin_i18n');
