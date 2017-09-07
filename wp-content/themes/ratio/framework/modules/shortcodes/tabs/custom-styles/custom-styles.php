<?php
if(!function_exists('ratio_edge_tabs_typography_styles')){
	function ratio_edge_tabs_typography_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = ratio_edge_options()->getOptionValue('tabs_font_family');
		
		if(ratio_edge_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = ratio_edge_get_font_option_val($font_family);
		}
		
		$text_transform = ratio_edge_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $tabs_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = ratio_edge_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $tabs_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = ratio_edge_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $tabs_tipography_array['letter-spacing'] = ratio_edge_filter_px($letter_spacing).'px';
        }

        $font_weight = ratio_edge_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $tabs_tipography_array['font-weight'] = $font_weight;
        }

        echo ratio_edge_dynamic_css($selector, $tabs_tipography_array);
	}
	add_action('ratio_edge_style_dynamic', 'ratio_edge_tabs_typography_styles');
}

if(!function_exists('ratio_edge_tabs_inital_color_styles')){
	function ratio_edge_tabs_inital_color_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li a';
		$styles = array();
		
		if(ratio_edge_options()->getOptionValue('tabs_color')) {
            $styles['color'] = ratio_edge_options()->getOptionValue('tabs_color');
        }
		if(ratio_edge_options()->getOptionValue('tabs_back_color')) {
            $styles['background-color'] = ratio_edge_options()->getOptionValue('tabs_back_color');
        }
		if(ratio_edge_options()->getOptionValue('tabs_border_color')) {
            $styles['border-color'] = ratio_edge_options()->getOptionValue('tabs_border_color');
        }
		
		echo ratio_edge_dynamic_css($selector, $styles);
	}
	add_action('ratio_edge_style_dynamic', 'ratio_edge_tabs_inital_color_styles');
}
if(!function_exists('ratio_edge_tabs_active_color_styles')){
	function ratio_edge_tabs_active_color_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li.ui-state-active a, .edgtf-tabs .edgtf-tabs-nav li.ui-state-hover a';
		$styles = array();
		
		if(ratio_edge_options()->getOptionValue('tabs_color_active')) {
            $styles['color'] = ratio_edge_options()->getOptionValue('tabs_color_active');
        }

		$background_color_first = ratio_edge_options()->getOptionValue('tabs_back_color_active');
		$background_color_second = ratio_edge_options()->getOptionValue('tabs_back_sec_color_active');

		if ($background_color_second !== '' && $background_color_first !== ''){
			$gradient = ratio_edge_inline_background_gradient($background_color_first,$background_color_second,true);
			echo ratio_edge_dynamic_css('.edgtf-tabs .edgtf-tabs-nav li .edgtf-tabs-gradient',array('background' => $gradient));
		}
		else if ($background_color_first !== ''){
			$styles['background-color'] = $background_color_first;
		}
		
		echo ratio_edge_dynamic_css($selector, $styles);
	}
	add_action('ratio_edge_style_dynamic', 'ratio_edge_tabs_active_color_styles');
}