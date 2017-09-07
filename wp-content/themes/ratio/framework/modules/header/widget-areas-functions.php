<?php

if(!function_exists('ratio_edge_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function ratio_edge_register_top_header_areas() {
        $top_bar_layout  = ratio_edge_options()->getOptionValue('top_bar_layout');
            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'ratio'),
                'id'            => 'edgtf-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            //register this widget area only if top bar layout is three columns
            if($top_bar_layout === 'three-columns') {
                register_sidebar(array(
                    'name'          => esc_html__('Top Bar Center', 'ratio'),
                    'id'            => 'edgtf-top-bar-center',
                    'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                    'after_widget'  => '</div>'
                ));
            }

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'ratio'),
                'id'            => 'edgtf-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));
    }

    add_action('widgets_init', 'ratio_edge_register_top_header_areas');
}

if(!function_exists('ratio_edge_header_standard_widget_areas')) {
    /**
     * Registers widget areas for standard header type
     */
    function ratio_edge_header_standard_widget_areas() {
            register_sidebar(array(
                'name'          => esc_html__('Right From Main Menu', 'ratio'),
                'id'            => 'edgtf-right-from-main-menu',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-main-menu-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'ratio')
            ));
    }

    add_action('widgets_init', 'ratio_edge_header_standard_widget_areas');
}

if(!function_exists('ratio_edge_header_vertical_widget_areas')) {
    /**
     * Registers widget areas for vertical header
     */
    function ratio_edge_header_vertical_widget_areas() {
		register_sidebar(array(
			'name'          => esc_html__('Vertical Area', 'ratio'),
			'id'            => 'edgtf-vertical-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-vertical-area-widget">',
			'after_widget'  => '</div>',
			'description'   => esc_html__('Widgets added here will appear on the bottom of vertical menu', 'ratio')
		));
    }

    add_action('widgets_init', 'ratio_edge_header_vertical_widget_areas');
}


if(!function_exists('ratio_edge_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function ratio_edge_register_mobile_header_areas() {
        if(ratio_edge_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'ratio'),
                'id'            => 'edgtf-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'ratio')
            ));
        }
    }

    add_action('widgets_init', 'ratio_edge_register_mobile_header_areas');
}

if(!function_exists('ratio_edge_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function ratio_edge_register_sticky_header_areas() {
        if(in_array(ratio_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Right', 'ratio'),
                'id'            => 'edgtf-sticky-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-sticky-right">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'ratio')
            ));
			register_sidebar(array(
				'name'          => esc_html__('Full Screen Sticky Right', 'ratio'),
				'id'            => 'edgtf-full-screen-sticky-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-sticky-right">',
				'after_widget'  => '</div>',
				'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu for full screen header type', 'ratio')
			));
			register_sidebar(array(
				'name'          => esc_html__('Slide Down Sticky Right', 'ratio'),
				'id'            => 'edgtf-slide-down-sticky-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-sticky-right">',
				'after_widget'  => '</div>',
				'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu for slide down header type', 'ratio')
			));
        }
    }

    add_action('widgets_init', 'ratio_edge_register_sticky_header_areas');
}

if(!function_exists('ratio_edge_header_slide_down_widget_areas')) {
	/**
	 * Registers widget areas for standard header type
	 */
	function ratio_edge_header_slide_down_widget_areas() {
			register_sidebar(array(
				'name'          => esc_html__('Slide Down Menu Right', 'ratio'),
				'id'            => 'edgtf-right-in-slide-down-menu',
				'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-in-slide-down-menu">',
				'after_widget'  => '</div>',
				'description'   => esc_html__('This widget area is rendered right slide down menu', 'ratio')
			));
	}

	add_action('widgets_init', 'ratio_edge_header_slide_down_widget_areas');
}