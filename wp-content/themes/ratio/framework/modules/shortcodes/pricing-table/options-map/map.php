<?php

if ( ! function_exists('ratio_edge_pricing_table_options_map') ) {
	/**
	 * Add Pricing Table options to elements page
	 */
	function ratio_edge_pricing_table_options_map() {

		$panel_pricing_table = ratio_edge_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_pricing_table',
				'title' => 'Pricing Table'
			)
		);

	}

	add_action( 'ratio_edge_options_elements_map', 'ratio_edge_pricing_table_options_map');

}