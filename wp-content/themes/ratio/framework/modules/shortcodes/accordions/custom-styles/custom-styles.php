<?php 

if(!function_exists('ratio_edge_accordions_typography_styles')){
	function ratio_edge_accordions_typography_styles(){
		$selector = '.edgtf-accordion-holder .edgtf-title-holder';
		$styles = array();
		
		$font_family = ratio_edge_options()->getOptionValue('accordions_font_family');
		if(ratio_edge_is_font_option_valid($font_family)){
			$styles['font-family'] = ratio_edge_get_font_option_val($font_family);
		}
		
		$text_transform = ratio_edge_options()->getOptionValue('accordions_text_transform');
       if(!empty($text_transform)) {
           $styles['text-transform'] = $text_transform;
       }

       $font_style = ratio_edge_options()->getOptionValue('accordions_font_style');
       if(!empty($font_style)) {
           $styles['font-style'] = $font_style;
       }

       $letter_spacing = ratio_edge_options()->getOptionValue('accordions_letter_spacing');
       if($letter_spacing !== '') {
           $styles['letter-spacing'] = ratio_edge_filter_px($letter_spacing).'px';
       }

       $font_weight = ratio_edge_options()->getOptionValue('accordions_font_weight');
       if(!empty($font_weight)) {
           $styles['font-weight'] = $font_weight;
       }

       echo ratio_edge_dynamic_css($selector, $styles);
	}
	add_action('ratio_edge_style_dynamic', 'ratio_edge_accordions_typography_styles');
}

if(!function_exists('ratio_edge_accordions_inital_title_color_styles')){
	function ratio_edge_accordions_inital_title_color_styles(){
		$selector = '.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder';
		$styles = array();
		
		if(ratio_edge_options()->getOptionValue('accordions_title_color')) {
			$styles['color'] = ratio_edge_options()->getOptionValue('accordions_title_color');
		}

		if (ratio_edge_options()->getOptionValue('accordions_back_color') !== ''){
			$styles['background-color'] = ratio_edge_options()->getOptionValue('accordions_back_color');
		}

		if (ratio_edge_options()->getOptionValue('accordions_border_color') !== ''){
			$styles['border-color'] = ratio_edge_options()->getOptionValue('accordions_border_color');
		}

		echo ratio_edge_dynamic_css($selector, $styles);
	}
	add_action('ratio_edge_style_dynamic', 'ratio_edge_accordions_inital_title_color_styles');
}

if(!function_exists('ratio_edge_accordions_active_title_color_styles')){
	
	function ratio_edge_accordions_active_title_color_styles(){
		$selector = array(
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-active',
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-hover'
		);
		$styles = array();
		
		if(ratio_edge_options()->getOptionValue('accordions_title_color_active')) {
           $styles['color'] = ratio_edge_options()->getOptionValue('accordions_title_color_active');
       }
		
		$background_color_first = ratio_edge_options()->getOptionValue('accordions_back_color_active');
		$background_color_second = ratio_edge_options()->getOptionValue('accordions_back_sec_color_active');

		if ($background_color_second !== '' && $background_color_first !== ''){
			$gradient = ratio_edge_inline_background_gradient($background_color_first,$background_color_second,true);
			echo ratio_edge_dynamic_css('.edgtf-accordion-holder .edgtf-title-holder .edgtf-acc-gradient',array('background' => $gradient));
		}
		else if ($background_color_first !== ''){
			$styles['background-color'] = $background_color_first;
		}

		echo ratio_edge_dynamic_css($selector, $styles);
	}
	add_action('ratio_edge_style_dynamic', 'ratio_edge_accordions_active_title_color_styles');
}
if(!function_exists('ratio_edge_accordions_inital_icon_color_styles')){
	
	function ratio_edge_accordions_inital_icon_color_styles(){
		$selector = '.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder .edgtf-accordion-mark';
		$styles = array();
		
		if(ratio_edge_options()->getOptionValue('accordions_icon_color')) {
           $styles['color'] = ratio_edge_options()->getOptionValue('accordions_icon_color');
       }
		echo ratio_edge_dynamic_css($selector, $styles);
	}
	add_action('ratio_edge_style_dynamic', 'ratio_edge_accordions_inital_icon_color_styles');
}
if(!function_exists('ratio_edge_accordions_active_icon_color_styles')){
	
	function ratio_edge_accordions_active_icon_color_styles(){
		$selector = array(
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-active  .edgtf-accordion-mark',
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-hover  .edgtf-accordion-mark'
		);
		$styles = array();
		
		if(ratio_edge_options()->getOptionValue('accordions_icon_color_active')) {
           $styles['color'] = ratio_edge_options()->getOptionValue('accordions_icon_color_active');
       }
		echo ratio_edge_dynamic_css($selector, $styles);
	}
	add_action('ratio_edge_style_dynamic', 'ratio_edge_accordions_active_icon_color_styles');
}