<?php

if ( ! function_exists('ratio_edge_blockquote_options_map') ) {
	/**
	 * Add Blockquote options to elements page
	 */
	function ratio_edge_blockquote_options_map() {

		$panel_blockquote = ratio_edge_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_blockquote',
				'title' => 'Blockquote'
			)
		);

	}

	add_action( 'ratio_edge_options_elements_map', 'ratio_edge_blockquote_options_map');

}