<?php

if ( ! function_exists('ratio_edge_team_options_map') ) {
	/**
	 * Add Team options to elements page
	 */
	function ratio_edge_team_options_map() {

		$panel_team = ratio_edge_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_team',
				'title' => 'Team'
			)
		);

	}

	add_action( 'ratio_edge_options_elements_map', 'ratio_edge_team_options_map');

}