<?php

if(!function_exists('ratio_edge_button_typography_styles')) {
    /**
     * Typography styles for all button types
     */
    function ratio_edge_button_typography_styles() {
        $selector = '.edgtf-btn';
        $styles = array();

        $font_family = ratio_edge_options()->getOptionValue('button_font_family');
        if(ratio_edge_is_font_option_valid($font_family)) {
            $styles['font-family'] = ratio_edge_get_font_option_val($font_family);
        }

        $text_transform = ratio_edge_options()->getOptionValue('button_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = ratio_edge_options()->getOptionValue('button_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = ratio_edge_options()->getOptionValue('button_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = ratio_edge_filter_px($letter_spacing).'px';
        }

        $font_weight = ratio_edge_options()->getOptionValue('button_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        echo ratio_edge_dynamic_css($selector, $styles);
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_button_typography_styles');
}

if(!function_exists('ratio_edge_button_outline_styles')) {
    /**
     * Generate styles for outline button
     */
    function ratio_edge_button_outline_styles() {
        //outline styles
        $outline_styles   = array();
        $outline_border_styles   = array();
        $outline_background_border_hover_styles   = array();
        $outline_selector = '.edgtf-btn.edgtf-btn-outline';
        $outline_border_selector = '.edgtf-btn.edgtf-btn-outline .edgtf-btn-background-holder';
        $outline_background_border_hover_selector = '.edgtf-btn.edgtf-btn-outline .edgtf-btn-background-hover-holder';

        if(ratio_edge_options()->getOptionValue('btn_outline_text_color')) {
            $outline_styles['color'] = ratio_edge_options()->getOptionValue('btn_outline_text_color');
        }

        if(ratio_edge_options()->getOptionValue('btn_outline_border_color')) {
            $outline_border_styles['border-color'] = ratio_edge_options()->getOptionValue('btn_outline_border_color');
        }

        echo ratio_edge_dynamic_css($outline_selector, $outline_styles);
        echo ratio_edge_dynamic_css($outline_border_selector, $outline_border_styles);

        //outline hover styles
        if(ratio_edge_options()->getOptionValue('btn_outline_hover_text_color')) {
            echo ratio_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-outline:not(.edgtf-btn-custom-hover-color):hover',
                array('color' => ratio_edge_options()->getOptionValue('btn_outline_hover_text_color').'!important')
            );
        }

        if(ratio_edge_options()->getOptionValue('btn_outline_hover_bg_color')) {
            $outline_background_border_hover_styles['background-color'] = ratio_edge_options()->getOptionValue('btn_outline_hover_bg_color');
        }

        if(ratio_edge_options()->getOptionValue('btn_outline_hover_border_color')) {
            $outline_background_border_hover_styles['border-color'] = ratio_edge_options()->getOptionValue('btn_outline_hover_border_color');
        }

        echo ratio_edge_dynamic_css($outline_background_border_hover_selector, $outline_background_border_hover_styles);
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_button_outline_styles');
}

if(!function_exists('ratio_edge_button_solid_styles')) {
    /**
     * Generate styles for solid type buttons
     */
    function ratio_edge_button_solid_styles() {
        //solid styles
        $solid_selector = '.edgtf-btn.edgtf-btn-solid';
        $solid_background_border_selector = '.edgtf-btn.edgtf-btn-solid .edgtf-btn-background-holder';
        $solid_background_border_hover_selector = '.edgtf-btn.edgtf-btn-solid .edgtf-btn-background-hover-holder';
        $solid_styles = array();
        $solid_background_border_styles = array();
        $solid_background_border_hover_styles = array();

        if(ratio_edge_options()->getOptionValue('btn_solid_text_color')) {
            $solid_styles['color'] = ratio_edge_options()->getOptionValue('btn_solid_text_color');
        }

        echo ratio_edge_dynamic_css($solid_selector, $solid_styles);

        if(ratio_edge_options()->getOptionValue('btn_solid_border_color')) {
            $solid_background_border_styles['border-color'] = ratio_edge_options()->getOptionValue('btn_solid_border_color');
        }

        if(ratio_edge_options()->getOptionValue('btn_solid_bg_color')) {
            $solid_background_border_styles['background-color'] = ratio_edge_options()->getOptionValue('btn_solid_bg_color');
        }

        echo ratio_edge_dynamic_css($solid_background_border_selector, $solid_background_border_styles);

        //solid hover styles
        if(ratio_edge_options()->getOptionValue('btn_solid_hover_text_color')) {
            echo ratio_edge_dynamic_css(
                '.edgtf-btn.edgtf-btn-solid:not(.edgtf-btn-custom-hover-color):hover',
                array('color' => ratio_edge_options()->getOptionValue('btn_solid_hover_text_color').'!important')
            );
        }

        if(ratio_edge_options()->getOptionValue('btn_solid_hover_bg_color')) {
            $solid_background_border_hover_styles['background-color'] = ratio_edge_options()->getOptionValue('btn_solid_hover_bg_color');
        }

        if(ratio_edge_options()->getOptionValue('btn_solid_hover_border_color')) {
            $solid_background_border_hover_styles['border-color'] = ratio_edge_options()->getOptionValue('btn_solid_hover_border_color');
        }

        echo ratio_edge_dynamic_css($solid_background_border_hover_selector, $solid_background_border_hover_styles);
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_button_solid_styles');
}

if(!function_exists('ratio_edge_button_transparent_styles')) {
	/**
	 * Generate styles for transparent type buttons
	 */
	function ratio_edge_button_transparent_styles() {
		//transparent styles
		$solid_selector = '.edgtf-btn.edgtf-btn-transparent';
		$solid_icon_selector = '.edgtf-btn.edgtf-btn-transparent.edgtf-btn-icon .edgtf-btn-icon-holder';
		$solid_styles = array();
		$solid_icon_styles = array();

		if(ratio_edge_options()->getOptionValue('btn_transparent_text_color')) {
			$solid_styles['color'] = ratio_edge_options()->getOptionValue('btn_transparent_text_color');
		}

		if(ratio_edge_options()->getOptionValue('btn_transparent_icon_color')) {
			$solid_icon_styles['color'] = ratio_edge_options()->getOptionValue('btn_transparent_icon_color');
		}

		echo ratio_edge_dynamic_css($solid_selector, $solid_styles);
		echo ratio_edge_dynamic_css($solid_icon_selector, $solid_icon_styles);

		//transparent hover styles
		if(ratio_edge_options()->getOptionValue('btn_transparent_hover_text_color')) {
			echo ratio_edge_dynamic_css(
				'.edgtf-btn.edgtf-btn-transparent:not(.edgtf-btn-custom-hover-color):hover',
				array('color' => ratio_edge_options()->getOptionValue('btn_transparent_hover_text_color').'!important')
			);
		}
		if(ratio_edge_options()->getOptionValue('btn_transparent_hover_icon_color')) {
			echo ratio_edge_dynamic_css(
				'.edgtf-btn.edgtf-btn-transparent.edgtf-btn-icon:not(.edgtf-btn-custom-hover-color):hover .edgtf-btn-icon-holder',
				array('color' => ratio_edge_options()->getOptionValue('btn_transparent_hover_icon_color').'!important')
			);
		}
	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_button_transparent_styles');
}

if(!function_exists('ratio_edge_button_gradient_styles')) {
	/**
	 * Generate styles for gradient type buttons
	 */
	function ratio_edge_button_gradient_styles() {
		//gradient styles
		$gradient_selector = '.edgtf-btn.edgtf-btn-gradient';
		$gradient_background_border_selector = '.edgtf-btn.edgtf-btn-gradient .edgtf-btn-background-holder';
		$gradient_background_border_hover_selector = '.edgtf-btn.edgtf-btn-gradient .edgtf-btn-background-hover-holder';
		$gradient_styles = array();
		$gradient_background_border_styles = array();
		$gradient_background_border_hover_styles = array();

		if(ratio_edge_options()->getOptionValue('btn_gradient_text_color')) {
			$gradient_styles['color'] = ratio_edge_options()->getOptionValue('btn_gradient_text_color');
		}

		if(ratio_edge_options()->getOptionValue('btn_gradient_border_color')) {
			$gradient_background_border_styles['border'] = '1px solid '.ratio_edge_options()->getOptionValue('btn_gradient_border_color');
		}

		if(ratio_edge_options()->getOptionValue('btn_gradient_bg_color_1') && ratio_edge_options()->getOptionValue('btn_gradient_bg_color_2')) {
			$gradient_background_border_styles['background'] = ratio_edge_inline_background_gradient(ratio_edge_options()->getOptionValue('btn_gradient_bg_color_1'), ratio_edge_options()->getOptionValue('btn_gradient_bg_color_2'),true);
		}

		echo ratio_edge_dynamic_css($gradient_selector, $gradient_styles);
		echo ratio_edge_dynamic_css($gradient_background_border_selector, $gradient_background_border_styles);

		//gradient hover styles
		if(ratio_edge_options()->getOptionValue('btn_gradient_hover_text_color')) {
			echo ratio_edge_dynamic_css(
				'.edgtf-btn.edgtf-btn-gradient:not(.edgtf-btn-custom-hover-color):hover',
				array('color' => ratio_edge_options()->getOptionValue('btn_gradient_hover_text_color').'!important')
			);
		}

		if(ratio_edge_options()->getOptionValue('btn_gradient_hover_bg_color')) {
			$gradient_background_border_hover_styles['background-color'] = ratio_edge_options()->getOptionValue('btn_gradient_hover_bg_color');
		}

		if(ratio_edge_options()->getOptionValue('btn_gradient_hover_border_color')) {
			$gradient_background_border_hover_styles['border'] = '1px solid '.ratio_edge_options()->getOptionValue('btn_gradient_hover_border_color');
		}

		echo ratio_edge_dynamic_css($gradient_background_border_hover_selector, $gradient_background_border_hover_styles);
	}

	add_action('ratio_edge_style_dynamic', 'ratio_edge_button_gradient_styles');
}