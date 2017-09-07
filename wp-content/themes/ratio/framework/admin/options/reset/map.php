<?php

if ( ! function_exists('ratio_edge_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function ratio_edge_reset_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => 'Reset',
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = ratio_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => 'Reset'
			)
		);

		ratio_edge_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> 'Reset to Defaults',
			'description'	=> 'This option will reset all Edge Options values to defaults',
			'parent'		=> $panel_reset
		));

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_reset_options_map', 21 );

}