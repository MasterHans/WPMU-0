<?php
if(!function_exists('ratio_edge_design_styles')) {
    /**
     * Generates general custom styles
     */
    function ratio_edge_design_styles() {

        $preload_background_styles = array();

        if(ratio_edge_options()->getOptionValue('preload_pattern_image') !== ""){
            $preload_background_styles['background-image'] = 'url('.ratio_edge_options()->getOptionValue('preload_pattern_image').') !important';
        }else{
            $preload_background_styles['background-image'] = 'url('.esc_url(EDGE_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo ratio_edge_dynamic_css('.edgtf-preload-background', $preload_background_styles);

		if (ratio_edge_options()->getOptionValue('google_fonts')){
			$font_family = ratio_edge_options()->getOptionValue('google_fonts');
			if(ratio_edge_is_font_option_valid($font_family)) {
				echo ratio_edge_dynamic_css('body', array('font-family' => ratio_edge_get_font_option_val($font_family)));
			}
		}

        if(ratio_edge_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
				'a',
				'h1 a:hover',
				'h2 a:hover',
				'h3 a:hover',
				'h4 a:hover',
				'h5 a:hover',
				'h6 a:hover',
				'p a',
				'.edgtf-comment-holder .edgtf-comment-text .edgtf-comment-date',
				'#submit_comment:hover',
				'.post-password-form input[type=submit]:hover',
				'.edgtf-main-menu ul li.edgtf-active-item a',
				'.edgtf-main-menu ul li:hover a',
				'.edgtf-main-menu>ul>li.edgtf-active-item>a',
				'body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu>ul>li:hover>a',
				'.edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner>ul>li>a',
				'.edgtf-slidedown-menu-holder-outer .edgtf-slidedown-right-widget-holder .edgtf-slidedown-widget-title',
				'.edgtf-top-bar .widget .edgtf-icon-element',
				'.edgtf-header-vertical .edgtf-search-wrapper input[type=submit]',
				'.edgtf-header-vertical .edgtf-vertical-menu ul li a:hover',
				'.edgtf-mobile-header .edgtf-mobile-nav a:hover',
				'.edgtf-mobile-header .edgtf-mobile-nav h4:hover',
				'.edgtf-mobile-header .edgtf-mobile-menu-opener a:hover',
				'.edgtf-fullscreen-menu-holder .edgtf-search-wrapper input[type=submit]',
				'nav.edgtf-fullscreen-menu ul li.edgtf-has-sub.open_sub>a',
				'nav.edgtf-fullscreen-menu ul li a:hover',
				'footer .edgtf-footer-bottom-holder .widget',
				'.edgtf-side-menu-button-opener:hover',
				'.edgtf-search-opener:hover',
				'.edgtf-team .edgtf-team-social-wrapp a:hover',
				'.edgtf-team.main-info-below-image .edgtf-team-info .edgtf-team-position',
				'.edgtf-counter-holder .edgtf-counter-title',
				'.edgtf-message .edgtf-message-inner a.edgtf-close',
				'.edgtf-ordered-list ol>li:before',
				'.edgtf-icon-list-item .edgtf-icon-list-icon-holder-inner i',
				'.edgtf-icon-list-item .edgtf-icon-list-icon-holder-inner span',
				'.edgtf-testimonials-holder .edgtf-testimonial-icon',
				'.edgtf-price-table .edgtf-price-table-inner ul li.edgtf-table-prices .edgtf-mark',
				'.edgtf-process-holder .edgtf-process-item-holder .edgtf-pi-number-holder .edgtf-pi-arrow',
				'.edgtf-blog-list-holder .edgtf-item-info-section',
				'.edgtf-blog-list-holder .edgtf-item-info-section>div a',
				'.edgtf-blog-slider .edgtf-blog-slide-post-info',
				'.edgtf-blog-slider .edgtf-blog-slide-post-info>div a',
				'.edgtf-btn.edgtf-btn-transparent.edgtf-btn-icon .edgtf-btn-icon-holder',
				'input[type=submit].edgtf-btn.edgtf-btn-transparent.edgtf-btn-icon .edgtf-btn-icon-holder',
				'blockquote .edgtf-icon-quotations-holder',
				'.edgtf-dropcaps',
				'.edgtf-portfolio-list-holder article .edgtf-item-icons-holder a',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-pinterest-with-space article .edgtf-item-icons-holder a:hover',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-standard article .edgtf-item-icons-holder a:hover',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-pinterest-with-space .edgtf-ptf-category-holder',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-standard .edgtf-ptf-category-holder',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-gallery article .edgtf-ptf-category-holder',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-gallery-with-space article .edgtf-ptf-category-holder',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-masonry article .edgtf-ptf-category-holder',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-pinterest article .edgtf-ptf-category-holder',
				'.edgtf-ptf-row .edgtf-ptf-category-holder',
				'.edgtf-ptf-list-showcase-meta-item.active .edgtf-ptf-meta-item-title a:hover',
				'.edgtf-ptf-list-showcase-meta-item .edgtf-ptf-view-holder',
				'.edgtf-iwt .edgtf-icon-shortcode.normal a:hover>.edgtf-icon-element',
				'.edgtf-social-share-holder.edgtf-list li a:hover',
				'.edgtf-social-share-holder.edgtf-list .edgtf-social-share-title',
				'.edgtf-numbered-title .edgtf-nt-number',
				'.edgtf-crossfade-slider .edgtf-crossfade-slider-text .edgtf-crossfade-slider-subtitle',
				'.edgtf-sidebar .widget.widget_archive li:hover',
				'.edgtf-sidebar .widget.widget_calendar #next a',
				'.edgtf-sidebar .widget.widget_calendar #prev a',
				'.edgtf-sidebar .widget.widget_nav_menu ul li.current-menu-item a',
				'.edgtf-sidebar .widget ul li',
				'.edgtf-blog-holder article.sticky .edgtf-post-title a',
				'.edgtf-blog-holder article .edgtf-post-info',
				'.edgtf-blog-holder article .edgtf-post-info>div a',
				'.edgtf-blog-holder article .edgtf-post-info-bottom .edgtf-post-info-bottom-left',
				'.edgtf-blog-holder article .edgtf-post-info-bottom .edgtf-post-info-bottom-left a',
				'.edgtf-blog-holder article .edgtf-post-mark',
				'.edgtf-filter-blog-holder li.edgtf-active',
				'.edgtf-woocommerce-page .price>.amount',
				'.edgtf-woocommerce-page ins',
				'.woocommerce .price>.amount',
				'.woocommerce ins',
				'.woocommerce-pagination .page-numbers.current:hover',
				'.woocommerce-pagination .page-numbers:hover',
				'.edgtf-single-product-summary .price>.amount',
				'.edgtf-single-product-summary ins>.amount',
				'.edgtf-single-product-summary .edgtf-social-share-holder.edgtf-list li a:hover',
				'.edgtf-shopping-cart-dropdown ul li a:hover',
				'.edgtf-shopping-cart-dropdown .edgtf-item-info-holder .edgtf-item-left:hover',
				'.edgtf-shopping-cart-dropdown .edgtf-item-info-holder .edgtf-item-left .amount',
				'.edgtf-shopping-cart-dropdown .edgtf-cart-bottom .edgtf-subtotal-holder .edgtf-total-amount .amount',
				'.star-rating span:before'
            );

            $color_important_selector = array(
                '.edgtf-top-bar-light .edgtf-top-bar .widget #lang_sel a:hover'
            );

            $background_color_selector = array(
				'.edgtf-st-loader .pulse',
				'.edgtf-st-loader .double_pulse .double-bounce1',
				'.edgtf-st-loader .double_pulse .double-bounce2',
				'.edgtf-st-loader .cube',
				'.edgtf-st-loader .rotating_cubes .cube1',
				'.edgtf-st-loader .rotating_cubes .cube2',
				'.edgtf-st-loader .stripes>div',
				'.edgtf-st-loader .wave>div',
				'.edgtf-st-loader .two_rotating_circles .dot1',
				'.edgtf-st-loader .two_rotating_circles .dot2',
				'.edgtf-st-loader .five_rotating_circles .container1>div',
				'.edgtf-st-loader .five_rotating_circles .container2>div',
				'.edgtf-st-loader .five_rotating_circles .container3>div',
				'.edgtf-st-loader .atom .ball-1:before',
				'.edgtf-st-loader .atom .ball-2:before',
				'.edgtf-st-loader .atom .ball-3:before',
				'.edgtf-st-loader .atom .ball-4:before',
				'.edgtf-st-loader .clock .ball:before',
				'.edgtf-st-loader .mitosis .ball',
				'.edgtf-st-loader .lines .line1',
				'.edgtf-st-loader .lines .line2',
				'.edgtf-st-loader .lines .line3',
				'.edgtf-st-loader .lines .line4',
				'.edgtf-st-loader .fussion .ball',
				'.edgtf-st-loader .fussion .ball-1',
				'.edgtf-st-loader .fussion .ball-2',
				'.edgtf-st-loader .fussion .ball-3',
				'.edgtf-st-loader .fussion .ball-4',
				'.edgtf-st-loader .wave_circles .ball',
				'.edgtf-st-loader .pulse_circles .ball',
				'#submit_comment',
				'.post-password-form input[type=submit]',
				'#edgtf-back-to-top span span',
				'.edgtf-slidedown-menu-opener.opened .edgtf-line',
				'.edgtf-slidedown-menu-opener:hover .edgtf-line',
				'.edgtf-slidedown-menu-holder-outer .edgtf-slidedown-menu-holder-inner .edgtf-line-3-x',
				'.edgtf-slidedown-menu-holder-outer .edgtf-slidedown-menu-holder-inner .edgtf-line-5-x',
				'nav.edgtf-slidedown-menu>ul>li>a:after',
				'.edgtf-header-standard .edgtf-fullscreen-menu-opener:before',
				'.edgtf-header-standard .edgtf-header-cart:before',
				'.edgtf-header-standard .edgtf-search-opener:before',
				'.edgtf-header-standard .edgtf-side-menu-button-opener:before',
				'.edgtf-header-vertical .edgtf-vertical-menu>ul>li>a:before',
				'.edgtf-header-vertical .edgtf-vertical-menu>ul>li>a:after',
				'.edgtf-fullscreen-menu-opener.opened:hover .edgtf-line:after',
				'.edgtf-fullscreen-menu-opener.opened:hover .edgtf-line:before',
				'.edgtf-fullscreen-menu-opener:not(.opened):hover .edgtf-line',
				'.edgtf-fullscreen-search-opened .edgtf-search-close .edgtf-search-close-lines:hover .edgtf-line-1',
				'.edgtf-fullscreen-search-opened .edgtf-search-close .edgtf-search-close-lines:hover .edgtf-line-2',
				'.edgtf-search-covers-opened .edgtf-search-close .edgtf-search-close-lines:hover .edgtf-line-1',
				'.edgtf-search-covers-opened .edgtf-search-close .edgtf-search-close-lines:hover .edgtf-line-2',
				'.edgtf-pie-chart-doughnut-holder .edgtf-pie-legend ul li .edgtf-pie-color-holder',
				'.edgtf-pie-chart-pie-holder .edgtf-pie-legend ul li .edgtf-pie-color-holder',
				'.edgtf-btn.edgtf-btn-solid .edgtf-btn-background-holder',
				'input[type=submit].edgtf-btn.edgtf-btn-solid',
				'.edgtf-carousel-holder .edgtf-carousel-item-holder .edgtf-carousel-first-image-holder.edgtf-underline .edgtf-carousel-underline',
				'.edgtf-dropcaps.edgtf-circle',
				'.edgtf-dropcaps.edgtf-square',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-pinterest-with-space article .edgtf-item-icons-holder',
				'.edgtf-portfolio-list-holder-outer.edgtf-ptf-standard article .edgtf-item-icons-holder',
				'.edgtf-advanced-carousel .slick-slider .edgtf-slick-next',
				'.edgtf-advanced-carousel .slick-slider .edgtf-slick-prev',
				'.edgtf-tooltip-icon',
				'.edgtf-blog-audio-holder .mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
				'.edgtf-blog-audio-holder .mejs-container .mejs-controls .mejs-time-rail .mejs-time-current',
				'.woocommerce-pagination .page-numbers.current:after',
				'.edgtf-woocommerce-page .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
				'.edgtf-woocommerce-page .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
				'.woocommerce-account input[type=submit]',
				'.woocommerce-checkout input[type=submit]',
				'.edgtf-shopping-cart-dropdown .edgtf-cart-bottom .view-cart:after',
				'.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a'
            );

            $background_color_important_selector = array();

            $border_color_selector = array(
				'.edgtf-outline:after',
				'.edgtf-st-loader .pulse_circles .ball',
				'#respond input[type=text]:focus',
				'#respond textarea:focus',
				'.post-password-form input[type=password]:focus',
				'.wpcf7-form-control.wpcf7-date:focus',
				'.wpcf7-form-control.wpcf7-number:focus',
				'.wpcf7-form-control.wpcf7-quiz:focus',
				'.wpcf7-form-control.wpcf7-select:focus',
				'.wpcf7-form-control.wpcf7-text:focus',
				'.wpcf7-form-control.wpcf7-textarea:focus',
				'#submit_comment',
				'.post-password-form input[type=submit]',
				'.slick-slider .edgtf-slick-dots li',
				'.edgtf-slidedown-menu-holder-outer #searchform input[type=text]',
				'footer .widget .edgtf-search-wrapper input[type=text]',
				'.edgtf-title .edgtf-separator',
				'.edgtf-side-menu .edgtf-search-wrapper input[type=text]',
				'.edgtf-price-table.edgtf-active .edgtf-price-table-inner',
				'.edgtf-accordion-holder .edgtf-accordion-content',
				'.edgtf-blog-slider.edgtf-blog-slider-type-carousel .edgtf-blog-carousel-item:hover .edgtf-blog-slide-info-holder',
				'.edgtf-btn.edgtf-btn-solid .edgtf-btn-background-holder',
				'input[type=submit].edgtf-btn.edgtf-btn-solid',
				'.edgtf-portfolio-list-holder article .edgtf-item-icons-holder a',
				'.edgtf-portfolio-list-holder-outer.edgtf-hover-outline article:hover .edgtf-hover-border',
				'.edgtf-sidebar .widget .edgtf-search-wrapper input[type=text]',
				'.woocommerce-account input[type=submit]',
				'.woocommerce-checkout input[type=submit]'
            );

			$border_top_color_selector = array(
				'.edgtf-blog-holder article .edgtf-post-info-bottom'
			);

			$border_bottom_color_selector = array(
				'.edgtf-main-menu.edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li a .edgtf-item-outer:after',
				'nav.edgtf-slidedown-menu ul li a .edgtf-item-outer:after',
				'.edgtf-header-vertical .edgtf-vertical-menu.edgtf-vertical-dropdown-float .edgtf-menu-second .edgtf-menu-inner ul li a .edgtf-item-outer:after',
				'footer .widget .menu a:after',
				'footer .widget .tagcloud a:hover',
				'.edgtf-side-menu .tagcloud a:hover',
				'.small-images .edgtf-portfolio-content,.small-slider .edgtf-portfolio-content',
				'.small-masonry .edgtf-portfolio-content',
				'.edgtf-portfolio-single-holder.full-screen-slider .edgtf-portfolio-info-holder',
				'.split-screen .edgtf-portfolio-content',
				'.edgtf-sidebar .edgtf-widget-title',
				'.edgtf-sidebar .widget .tagcloud a:hover',
				'.wpb_widgetised_column .widget .menu a:after',
			);

			$border_right_color_selector = array(
				'.edgtf-main-menu>ul>li>a>span.edgtf-item-outer:after',
				'.big-images .edgtf-column1,.big-slider .edgtf-column1,.gallery .edgtf-column1',
				'.big-masonry .edgtf-column1',
			);

			$border_left_color_selector = array(
				'.edgtf-video-button-play .edgtf-video-button-wrapper .edgtf-video-button-icon'
			);

            echo ratio_edge_dynamic_css($color_selector, array('color' => ratio_edge_options()->getOptionValue('first_color')));
            echo ratio_edge_dynamic_css($color_important_selector, array('color' => ratio_edge_options()->getOptionValue('first_color').'!important'));
            echo ratio_edge_dynamic_css('::selection', array('background' => ratio_edge_options()->getOptionValue('first_color')));
            echo ratio_edge_dynamic_css('::-moz-selection', array('background' => ratio_edge_options()->getOptionValue('first_color')));
            echo ratio_edge_dynamic_css($background_color_selector, array('background-color' => ratio_edge_options()->getOptionValue('first_color')));
            echo ratio_edge_dynamic_css($background_color_important_selector, array('background-color' => ratio_edge_options()->getOptionValue('first_color').'!important'));
            echo ratio_edge_dynamic_css($border_color_selector, array('border-color' => ratio_edge_options()->getOptionValue('first_color')));
            echo ratio_edge_dynamic_css($border_top_color_selector, array('border-top-color' => ratio_edge_options()->getOptionValue('first_color')));
            echo ratio_edge_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => ratio_edge_options()->getOptionValue('first_color')));
            echo ratio_edge_dynamic_css($border_left_color_selector, array('border--left-color' => ratio_edge_options()->getOptionValue('first_color')));
            echo ratio_edge_dynamic_css($border_right_color_selector, array('border-right-color' => ratio_edge_options()->getOptionValue('first_color')));
        }

		if (ratio_edge_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
				'.edgtf-wrapper-inner',
				'.edgtf-content'
			);
			echo ratio_edge_dynamic_css($background_color_selector, array('background-color' => ratio_edge_options()->getOptionValue('page_background_color')));
		}

		if (ratio_edge_options()->getOptionValue('selection_color')) {
			echo ratio_edge_dynamic_css('::selection', array('background' => ratio_edge_options()->getOptionValue('selection_color')));
			echo ratio_edge_dynamic_css('::-moz-selection', array('background' => ratio_edge_options()->getOptionValue('selection_color')));
		}

		$boxed_background_style = array();
		if (ratio_edge_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = ratio_edge_options()->getOptionValue('page_background_color_in_box');
		}

		if (ratio_edge_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(ratio_edge_options()->getOptionValue('boxed_background_image')).')';
			if(ratio_edge_options()->getOptionValue('boxed_background_image_repeating') == 'yes') {
				$boxed_background_style['background-position'] = '0px 0px';
				$boxed_background_style['background-repeat'] = 'repeat';
			} else {
				$boxed_background_style['background-position'] = 'center 0px';
				$boxed_background_style['background-repeat'] = 'repeat';
			}
		}


		if (ratio_edge_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (ratio_edge_options()->getOptionValue('boxed_background_image_attachment'));
		}

		echo ratio_edge_dynamic_css('.edgtf-boxed .edgtf-wrapper', $boxed_background_style);


		if(ratio_edge_options()->getOptionValue('gradient_first_color') !== "" && ratio_edge_options()->getOptionValue('gradient_second_color') !== "") {

			$gradient_selector = array(
				'.slick-slider .edgtf-slick-dots li.slick-active',
				'#edgtf-back-to-top span span:after',
				'.edgtf-slidedown-menu-holder-outer #searchform input[type="submit"]',
				'footer .widget .edgtf-search-wrapper input[type=submit]',
				'.edgtf-side-menu .edgtf-search-wrapper input[type=submit]',
				'.edgtf-call-to-action',
				'.edgtf-icon-shortcode.circle .edgtf-icon-background-hover-holder',
				'.edgtf-icon-shortcode.square .edgtf-icon-background-hover-holder',
				'.edgtf-progress-bar .edgtf-progress-content-outer .edgtf-progress-content',
				'.edgtf-testimonials.edgtf-testimonials-type-carousel .edgtf-testimonial-text-holder .edgtf-testimonial-arrow',
				'.edgtf-price-table.edgtf-active .edgtf-price-table-inner ul li.edgtf-table-title',
				'.edgtf-process-holder .edgtf-process-item-holder .edgtf-pi-number-holder',
				'.edgtf-process-holder .edgtf-process-item-holder:hover .edgtf-pi-number-holder',
				'.edgtf-process-holder .edgtf-process-item-holder.edgtf-pi-highlighted .edgtf-pi-number-holder',
				'.edgtf-tabs .edgtf-tabs-nav li .edgtf-tabs-gradient',
				'.edgtf-accordion-holder .edgtf-title-holder .edgtf-acc-gradient',
				'.edgtf-btn.edgtf-btn-gradient .edgtf-btn-background-holder',
				'input[type=submit].edgtf-btn.edgtf-btn-gradient',
				'input.wpcf7-form-control.wpcf7-submit',
				'.edgtf-advanced-carousel .slick-slider .edgtf-slick-prev',
				'.edgtf-advanced-carousel .slick-slider .edgtf-slick-next',
				'.edgtf-sidebar .widget .edgtf-search-wrapper input[type=submit]',
				'.woocommerce .product .edgtf-product-badge.edgtf-onsale',
				'.edgtf-woocommerce-page .product .edgtf-product-badge.edgtf-onsale',
				'.woocommerce .added_to_cart',
				'.woocommerce .add_to_cart_button',
				'.edgtf-woocommerce-page .added_to_cart',
				'.edgtf-woocommerce-page .add_to_cart_button',
				'.woocommerce.widget input[type=submit]',
				'.woocommerce.widget button',
				'.widget_price_filter .ui-slider-horizontal .ui-slider-range',
				'.edgtf-blog-audio-holder .mejs-container'
			);

			echo ratio_edge_dynamic_css($gradient_selector, array('background' => ratio_edge_inline_background_gradient(ratio_edge_options()->getOptionValue('gradient_first_color'), ratio_edge_options()->getOptionValue('gradient_second_color'),true)));

		}

    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_design_styles');
}

if (!function_exists('ratio_edge_h1_styles')) {

    function ratio_edge_h1_styles() {

        $h1_styles = array();

        if(ratio_edge_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = ratio_edge_options()->getOptionValue('h1_color');
        }
        if(ratio_edge_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = ratio_edge_get_formatted_font_family(ratio_edge_options()->getOptionValue('h1_google_fonts'));
        }
        if(ratio_edge_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = ratio_edge_options()->getOptionValue('h1_texttransform');
        }
        if(ratio_edge_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = ratio_edge_options()->getOptionValue('h1_fontstyle');
        }
        if(ratio_edge_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = ratio_edge_options()->getOptionValue('h1_fontweight');
        }
        if(ratio_edge_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo ratio_edge_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_h1_styles');
}

if (!function_exists('ratio_edge_h2_styles')) {

    function ratio_edge_h2_styles() {

        $h2_styles = array();

        if(ratio_edge_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = ratio_edge_options()->getOptionValue('h2_color');
        }
        if(ratio_edge_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = ratio_edge_get_formatted_font_family(ratio_edge_options()->getOptionValue('h2_google_fonts'));
        }
        if(ratio_edge_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = ratio_edge_options()->getOptionValue('h2_texttransform');
        }
        if(ratio_edge_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = ratio_edge_options()->getOptionValue('h2_fontstyle');
        }
        if(ratio_edge_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = ratio_edge_options()->getOptionValue('h2_fontweight');
        }
        if(ratio_edge_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo ratio_edge_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_h2_styles');
}

if (!function_exists('ratio_edge_h3_styles')) {

    function ratio_edge_h3_styles() {

        $h3_styles = array();

        if(ratio_edge_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = ratio_edge_options()->getOptionValue('h3_color');
        }
        if(ratio_edge_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = ratio_edge_get_formatted_font_family(ratio_edge_options()->getOptionValue('h3_google_fonts'));
        }
        if(ratio_edge_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = ratio_edge_options()->getOptionValue('h3_texttransform');
        }
        if(ratio_edge_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = ratio_edge_options()->getOptionValue('h3_fontstyle');
        }
        if(ratio_edge_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = ratio_edge_options()->getOptionValue('h3_fontweight');
        }
        if(ratio_edge_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo ratio_edge_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_h3_styles');
}

if (!function_exists('ratio_edge_h4_styles')) {

    function ratio_edge_h4_styles() {

        $h4_styles = array();

        if(ratio_edge_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = ratio_edge_options()->getOptionValue('h4_color');
        }
        if(ratio_edge_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = ratio_edge_get_formatted_font_family(ratio_edge_options()->getOptionValue('h4_google_fonts'));
        }
        if(ratio_edge_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = ratio_edge_options()->getOptionValue('h4_texttransform');
        }
        if(ratio_edge_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = ratio_edge_options()->getOptionValue('h4_fontstyle');
        }
        if(ratio_edge_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = ratio_edge_options()->getOptionValue('h4_fontweight');
        }
        if(ratio_edge_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo ratio_edge_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_h4_styles');
}

if (!function_exists('ratio_edge_h5_styles')) {

    function ratio_edge_h5_styles() {

        $h5_styles = array();

        if(ratio_edge_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = ratio_edge_options()->getOptionValue('h5_color');
        }
        if(ratio_edge_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = ratio_edge_get_formatted_font_family(ratio_edge_options()->getOptionValue('h5_google_fonts'));
        }
        if(ratio_edge_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = ratio_edge_options()->getOptionValue('h5_texttransform');
        }
        if(ratio_edge_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = ratio_edge_options()->getOptionValue('h5_fontstyle');
        }
        if(ratio_edge_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = ratio_edge_options()->getOptionValue('h5_fontweight');
        }
        if(ratio_edge_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo ratio_edge_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_h5_styles');
}

if (!function_exists('ratio_edge_h6_styles')) {

    function ratio_edge_h6_styles() {

        $h6_styles = array();

        if(ratio_edge_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = ratio_edge_options()->getOptionValue('h6_color');
        }
        if(ratio_edge_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = ratio_edge_get_formatted_font_family(ratio_edge_options()->getOptionValue('h6_google_fonts'));
        }
        if(ratio_edge_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(ratio_edge_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = ratio_edge_options()->getOptionValue('h6_texttransform');
        }
        if(ratio_edge_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = ratio_edge_options()->getOptionValue('h6_fontstyle');
        }
        if(ratio_edge_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = ratio_edge_options()->getOptionValue('h6_fontweight');
        }
        if(ratio_edge_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo ratio_edge_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_h6_styles');
}

if (!function_exists('ratio_edge_text_styles')) {

    function ratio_edge_text_styles() {

        $text_styles = array();

        if(ratio_edge_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = ratio_edge_options()->getOptionValue('text_color');
        }
        if(ratio_edge_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = ratio_edge_get_formatted_font_family(ratio_edge_options()->getOptionValue('text_google_fonts'));
        }
        if(ratio_edge_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('text_fontsize')).'px';
        }
        if(ratio_edge_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('text_lineheight')).'px';
        }
        if(ratio_edge_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = ratio_edge_options()->getOptionValue('text_texttransform');
        }
        if(ratio_edge_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = ratio_edge_options()->getOptionValue('text_fontstyle');
        }
        if(ratio_edge_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = ratio_edge_options()->getOptionValue('text_fontweight');
        }
        if(ratio_edge_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = ratio_edge_filter_px(ratio_edge_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo ratio_edge_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_text_styles');
}

if (!function_exists('ratio_edge_link_styles')) {

    function ratio_edge_link_styles() {

        $link_styles = array();

        if(ratio_edge_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = ratio_edge_options()->getOptionValue('link_color');
        }
        if(ratio_edge_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = ratio_edge_options()->getOptionValue('link_fontstyle');
        }
        if(ratio_edge_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = ratio_edge_options()->getOptionValue('link_fontweight');
        }
        if(ratio_edge_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = ratio_edge_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo ratio_edge_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_link_styles');
}

if (!function_exists('ratio_edge_link_hover_styles')) {

    function ratio_edge_link_hover_styles() {

        $link_hover_styles = array();

        if(ratio_edge_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = ratio_edge_options()->getOptionValue('link_hovercolor');
        }
        if(ratio_edge_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = ratio_edge_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo ratio_edge_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(ratio_edge_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = ratio_edge_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo ratio_edge_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_link_hover_styles');
}

if (!function_exists('ratio_edge_smooth_page_transition_styles')) {

    function ratio_edge_smooth_page_transition_styles() {
        
        $loader_style = array();

        if(ratio_edge_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
            $loader_style['background-color'] = ratio_edge_options()->getOptionValue('smooth_pt_bgnd_color');
        }

        $loader_selector = array('.edgtf-smooth-transition-loader');

        if (!empty($loader_style)) {
            echo ratio_edge_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(ratio_edge_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
            $spinner_style['background-color'] = ratio_edge_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_selectors = array(
            '.edgtf-st-loader .pulse',
            '.edgtf-st-loader .double_pulse .double-bounce1',
            '.edgtf-st-loader .double_pulse .double-bounce2',
            '.edgtf-st-loader .cube',
            '.edgtf-st-loader .rotating_cubes .cube1',
            '.edgtf-st-loader .rotating_cubes .cube2',
            '.edgtf-st-loader .stripes > div',
            '.edgtf-st-loader .wave > div',
            '.edgtf-st-loader .two_rotating_circles .dot1',
            '.edgtf-st-loader .two_rotating_circles .dot2',
            '.edgtf-st-loader .five_rotating_circles .container1 > div',
            '.edgtf-st-loader .five_rotating_circles .container2 > div',
            '.edgtf-st-loader .five_rotating_circles .container3 > div',
            '.edgtf-st-loader .atom .ball-1:before',
            '.edgtf-st-loader .atom .ball-2:before',
            '.edgtf-st-loader .atom .ball-3:before',
            '.edgtf-st-loader .atom .ball-4:before',
            '.edgtf-st-loader .clock .ball:before',
            '.edgtf-st-loader .mitosis .ball',
            '.edgtf-st-loader .lines .line1',
            '.edgtf-st-loader .lines .line2',
            '.edgtf-st-loader .lines .line3',
            '.edgtf-st-loader .lines .line4',
            '.edgtf-st-loader .fussion .ball',
            '.edgtf-st-loader .fussion .ball-1',
            '.edgtf-st-loader .fussion .ball-2',
            '.edgtf-st-loader .fussion .ball-3',
            '.edgtf-st-loader .fussion .ball-4',
            '.edgtf-st-loader .wave_circles .ball',
            '.edgtf-st-loader .pulse_circles .ball'
        );

        if (!empty($spinner_style)) {
            echo ratio_edge_dynamic_css($spinner_selectors, $spinner_style);
        }

        $spinner_outline_border_style = array();
        $spinner_outline_background_style = array();

        if(ratio_edge_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
            $spinner_outline_border_style['border-color'] = ratio_edge_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_outline_border_selectors = array(
            '.edgtf-st-loader .edgtf-outline > .edgtf-line-1',
            '.edgtf-st-loader .edgtf-outline > .edgtf-line-2',
            '.edgtf-st-loader .edgtf-outline > .edgtf-line-3',
            '.edgtf-st-loader .edgtf-outline > .edgtf-line-4'
        );

        if(ratio_edge_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
            $spinner_outline_background_style['background-color'] = ratio_edge_options()->getOptionValue('smooth_pt_bgnd_color');
        }

        $spinner_outline_background_selectors = array(
            '.edgtf-st-loader .edgtf-outline'
        );

        if (!empty($spinner_outline_border_style)) {
            echo ratio_edge_dynamic_css($spinner_outline_border_selectors, $spinner_outline_border_style);
        }

        if (!empty($spinner_outline_background_style)) {
            echo ratio_edge_dynamic_css($spinner_outline_background_selectors, $spinner_outline_background_style);
        }
    }

    add_action('ratio_edge_style_dynamic', 'ratio_edge_smooth_page_transition_styles');
}