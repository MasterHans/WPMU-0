<?php

if (!function_exists('ratio_edge_search_opener_icon_size')) {

	function ratio_edge_search_opener_icon_size()
	{

		if (ratio_edge_options()->getOptionValue('header_search_icon_size')) {
			echo ratio_edge_dynamic_css('.edgtf-search-opener, .edgtf-header-standard .edgtf-search-opener', array(
				'font-size' => ratio_edge_filter_px(ratio_edge_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_search_opener_icon_size');

}

if (!function_exists('ratio_edge_search_opener_icon_colors')) {

	function ratio_edge_search_opener_icon_colors()
	{

		if (ratio_edge_options()->getOptionValue('header_search_icon_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-search-opener', array(
				'color' => ratio_edge_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (ratio_edge_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-search-opener:hover', array(
				'color' => ratio_edge_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (ratio_edge_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener,
			.edgtf-light-header .edgtf-top-bar .edgtf-search-opener', array(
				'color' => ratio_edge_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (ratio_edge_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener:hover,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener:hover,
			.edgtf-light-header .edgtf-top-bar .edgtf-search-opener:hover', array(
				'color' => ratio_edge_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (ratio_edge_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener,
			.edgtf-dark-header .edgtf-top-bar .edgtf-search-opener', array(
				'color' => ratio_edge_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (ratio_edge_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener:hover,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener:hover,
			.edgtf-dark-header .edgtf-top-bar .edgtf-search-opener:hover', array(
				'color' => ratio_edge_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_search_opener_icon_colors');

}

if (!function_exists('ratio_edge_search_opener_icon_background_colors')) {

	function ratio_edge_search_opener_icon_background_colors()
	{

		if (ratio_edge_options()->getOptionValue('search_icon_background_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-search-opener', array(
				'background-color' => ratio_edge_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (ratio_edge_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-search-opener:hover', array(
				'background-color' => ratio_edge_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_search_opener_icon_background_colors');
}

if (!function_exists('ratio_edge_search_opener_text_styles')) {

	function ratio_edge_search_opener_text_styles()
	{
		$text_styles = array();

		if (ratio_edge_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = ratio_edge_options()->getOptionValue('search_icon_text_color');
		}
		if (ratio_edge_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (ratio_edge_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (ratio_edge_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = ratio_edge_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (ratio_edge_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = ratio_edge_get_formatted_font_family(ratio_edge_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (ratio_edge_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = ratio_edge_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (ratio_edge_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = ratio_edge_options()->getOptionValue('search_icon_text_fontweight');
		}		
		if (ratio_edge_options()->getOptionValue('search_icon_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_icon_text_letterspacing')).'px';
		}

		if (!empty($text_styles)) {
			echo ratio_edge_dynamic_css('.edgtf-search-icon-text', $text_styles);
		}
		if (ratio_edge_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-search-opener:hover .edgtf-search-icon-text', array(
				'color' => ratio_edge_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_search_opener_text_styles');
}

if (!function_exists('ratio_edge_search_opener_spacing')) {

	function ratio_edge_search_opener_spacing()
	{
		$spacing_styles = array();

		if (ratio_edge_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (ratio_edge_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (ratio_edge_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (ratio_edge_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo ratio_edge_dynamic_css('.edgtf-search-opener', $spacing_styles);
		}

	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_search_opener_spacing');
}

if (!function_exists('ratio_edge_search_bar_background')) {

	function ratio_edge_search_bar_background()
	{

		if (ratio_edge_options()->getOptionValue('search_background_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-search-cover, .edgtf-search-cover .edgtf-container, .edgtf-search-fade .edgtf-fullscreen-search-holder .edgtf-fullscreen-search-table, .edgtf-fullscreen-search-overlay', array(
				'background-color' => ratio_edge_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_search_bar_background');
}

if (!function_exists('ratio_edge_search_text_styles')) {

	function ratio_edge_search_text_styles()
	{
		$text_styles = array();

		if (ratio_edge_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = ratio_edge_options()->getOptionValue('search_text_color');
			echo ratio_edge_dynamic_css('.edgt_search_field::-webkit-input-placeholder',array('color' => $text_styles['color']));
			echo ratio_edge_dynamic_css('.edgt_search_field:-moz-placeholder',array('color' => $text_styles['color']));
			echo ratio_edge_dynamic_css('.edgt_search_field::-moz-placeholder',array('color' => $text_styles['color']));
			echo ratio_edge_dynamic_css('.edgt_search_field:-ms-input-placeholder',array('color' => $text_styles['color']));
		}
		if (ratio_edge_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (ratio_edge_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = ratio_edge_options()->getOptionValue('search_text_texttransform');
		}
		if (ratio_edge_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = ratio_edge_get_formatted_font_family(ratio_edge_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (ratio_edge_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = ratio_edge_options()->getOptionValue('search_text_fontstyle');
		}
		if (ratio_edge_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = ratio_edge_options()->getOptionValue('search_text_fontweight');
		}
		if (ratio_edge_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo ratio_edge_dynamic_css('.edgtf-search-cover input[type="text"], .edgtf-fullscreen-search-opened .edgtf-form-holder .edgtf-search-field', $text_styles);
		}

	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_search_text_styles');
}

if (!function_exists('ratio_edge_search_label_styles')) {

	function ratio_edge_search_label_styles()
	{
		$text_styles = array();

		if (ratio_edge_options()->getOptionValue('search_label_text_color') !== '') {
			$text_styles['color'] = ratio_edge_options()->getOptionValue('search_label_text_color');
		}
		if (ratio_edge_options()->getOptionValue('search_label_text_fontsize') !== '') {
			$text_styles['font-size'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_label_text_fontsize')) . 'px';
		}
		if (ratio_edge_options()->getOptionValue('search_label_text_texttransform') !== '') {
			$text_styles['text-transform'] = ratio_edge_options()->getOptionValue('search_label_text_texttransform');
		}
		if (ratio_edge_options()->getOptionValue('search_label_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = ratio_edge_get_formatted_font_family(ratio_edge_options()->getOptionValue('search_label_text_google_fonts')) . ', sans-serif';
		}
		if (ratio_edge_options()->getOptionValue('search_label_text_fontstyle') !== '') {
			$text_styles['font-style'] = ratio_edge_options()->getOptionValue('search_label_text_fontstyle');
		}
		if (ratio_edge_options()->getOptionValue('search_label_text_fontweight') !== '') {
			$text_styles['font-weight'] = ratio_edge_options()->getOptionValue('search_label_text_fontweight');
		}
		if (ratio_edge_options()->getOptionValue('search_label_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_label_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo ratio_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-label', $text_styles);
		}

	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_search_label_styles');
}

if (!function_exists('ratio_edge_search_icon_styles')) {

	function ratio_edge_search_icon_styles()
	{

		if (ratio_edge_options()->getOptionValue('search_icon_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-submit', array(
				'color' => ratio_edge_options()->getOptionValue('search_icon_color')
			));
		}
		if (ratio_edge_options()->getOptionValue('search_icon_hover_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-submit:hover', array(
				'color' => ratio_edge_options()->getOptionValue('search_icon_hover_color')
			));
		}
		if (ratio_edge_options()->getOptionValue('search_icon_size') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-submit', array(
				'font-size' => ratio_edge_filter_px(ratio_edge_options()->getOptionValue('search_icon_size')) . 'px'
			));
		}

	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_search_icon_styles');
}

if (!function_exists('ratio_edge_search_border_styles')) {

	function ratio_edge_search_border_styles()
	{

		if (ratio_edge_options()->getOptionValue('search_border_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-field-holder', array(
				'border-color' => ratio_edge_options()->getOptionValue('search_border_color')
			));
		}
		if (ratio_edge_options()->getOptionValue('search_border_focus_color') !== '') {
			echo ratio_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-field-holder .edgtf-line', array(
				'background-color' => ratio_edge_options()->getOptionValue('search_border_focus_color')
			));
		}

	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_search_border_styles');
}

?>
