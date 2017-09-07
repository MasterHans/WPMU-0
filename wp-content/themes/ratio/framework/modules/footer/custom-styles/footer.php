<?php

if(!function_exists('ratio_edge_footer_top_styles')) {
	/**
	 * Generates styles for footer top
	 */
	function ratio_edge_footer_top_styles() {

		$background_image = ratio_edge_options()->getOptionValue('footer_top_background_image');
		$footer_top_styles = array();
		if($background_image !== '') {
			$footer_top_styles['background-image'] = 'url(' .$background_image . ')';
		}

		echo ratio_edge_dynamic_css('.edgtf-footer-top-holder', $footer_top_styles);
	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_footer_top_styles');
}
