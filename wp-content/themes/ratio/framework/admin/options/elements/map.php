<?php

if ( ! function_exists('ratio_edge_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function ratio_edge_load_elements_map() {

		ratio_edge_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => 'Elements',
				'icon' => 'fa fa-header'
			)
		);

		do_action( 'ratio_edge_options_elements_map' );

	}

	add_action('ratio_edge_options_map', 'ratio_edge_load_elements_map', 11);

}