<?php

if( !function_exists('ratio_edge_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function ratio_edge_search_body_class($classes) {

		if ( is_active_widget( false, false, 'edgt_search_opener' ) ) {

			$classes[] = 'edgtf-' . ratio_edge_options()->getOptionValue('search_type');

			if ( ratio_edge_options()->getOptionValue('search_type') == 'fullscreen-search' ) {

				$classes[] = 'edgtf-search-fade';

			}

		}
		return $classes;

	}

	add_filter('body_class', 'ratio_edge_search_body_class');
}

if ( ! function_exists('ratio_edge_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function ratio_edge_get_search() {

		if ( ratio_edge_active_widget( false, false, 'edgt_search_opener' ) ) {

			$search_type = ratio_edge_options()->getOptionValue('search_type');

			if ($search_type == 'search-covers-header') {
				ratio_edge_set_position_for_covering_search();
				return;
			}

			ratio_edge_load_search_template();

		}
	}

}

if ( ! function_exists('ratio_edge_set_position_for_covering_search') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function ratio_edge_set_position_for_covering_search() {

		$containing_sidebar = ratio_edge_active_widget( false, false, 'edgt_search_opener' );

		foreach ($containing_sidebar as $sidebar) {

			if ( strpos( $sidebar, 'top-bar' ) !== false ) {
				add_action( 'ratio_edge_after_header_top_html_open', 'ratio_edge_load_search_template');
			} else if ( strpos( $sidebar, 'main-menu' ) !== false ) {
				add_action( 'ratio_edge_after_header_menu_area_html_open', 'ratio_edge_load_search_template');
			} else if ( strpos( $sidebar, 'mobile-logo' ) !== false ) {
				add_action( 'ratio_edge_after_mobile_header_html_open', 'ratio_edge_load_search_template');
			} else if ( strpos( $sidebar, 'logo' ) !== false ) {
				add_action( 'ratio_edge_after_header_logo_area_html_open', 'ratio_edge_load_search_template');
			} else if ( strpos( $sidebar, 'sticky' ) !== false ) {
				add_action( 'ratio_edge_after_sticky_menu_html_open', 'ratio_edge_load_search_template');
			}

		}

	}

}

if ( ! function_exists('ratio_edge_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function ratio_edge_load_search_template() {
		global $ratio_edge_IconCollections;

		$search_type = ratio_edge_options()->getOptionValue('search_type');

		$search_icon = '';
		if ( ratio_edge_options()->getOptionValue('search_icon_pack') !== '' ) {
			$search_icon = $ratio_edge_IconCollections->getSearchIcon( ratio_edge_options()->getOptionValue('search_icon_pack'), true );
		}

		$parameters = array(
			'search_in_grid'		=> ratio_edge_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'			=> $search_icon,
		);

		ratio_edge_get_module_template_part( 'templates/types/'.$search_type, 'search', '', $parameters );

	}

}