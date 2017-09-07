<?php

if ( ! function_exists('ratio_edge_general_options_map') ) {
    /**
     * General options page
     */
    function ratio_edge_general_options_map() {

        ratio_edge_add_admin_page(
            array(
                'slug'  => '',
                'title' => 'General',
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = ratio_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => 'Design Style'
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose a default Google font for your site',
                'parent' => $panel_design_style
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => 'Additional Google Fonts',
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = ratio_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose additional Google font for your site',
                'parent'        => $additional_google_fonts_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose additional Google font for your site',
                'parent'        => $additional_google_fonts_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose additional Google font for your site',
                'parent'        => $additional_google_fonts_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose additional Google font for your site',
                'parent'        => $additional_google_fonts_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => 'Font Family',
                'description'   => 'Choose additional Google font for your site',
                'parent'        => $additional_google_fonts_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => 'First Main Color',
                'description'   => 'Choose the most dominant theme color. Default color is #d6ab60',
                'parent'        => $panel_design_style
            )
        );

		ratio_edge_add_admin_field(
			array(
				'name'          => 'gradient_first_color',
				'type'          => 'color',
				'label'         => 'Gradient First Color',
				'description'   => 'Choose first color for gradient. Default color is #c0954b',
				'parent'        => $panel_design_style
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name'          => 'gradient_second_color',
				'type'          => 'color',
				'label'         => 'Gradient Second Color',
				'description'   => 'Choose second color for gradient. Default color is #e7bd74',
				'parent'        => $panel_design_style
			)
		);

        ratio_edge_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => 'Page Background Color',
                'description'   => 'Choose the background color for page content. Default color is #ffffff',
                'parent'        => $panel_design_style
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => 'Text Selection Color',
                'description'   => 'Choose the color users see when selecting text',
                'parent'        => $panel_design_style
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => 'Boxed Layout',
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_boxed_container"
                )
            )
        );

        $boxed_container = ratio_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => 'Page Background Color',
                'description'   => 'Choose the page background color outside box.',
                'parent'        => $boxed_container
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => 'Background Image',
                'description'   => 'Choose an image to be displayed in background',
                'parent'        => $boxed_container
            )
        );

		ratio_edge_add_admin_field(
			array(
				'name'          => 'boxed_background_image_repeating',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => 'Use Background Image as Pattern',
				'description'   => 'Set this option to "yes" to use the background image as repeating pattern',
				'parent'        => $boxed_container,
				'options'       => array(
					'no'	=>	'No',
					'yes'	=>	'Yes'
				)
			)
		);

        ratio_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => 'Background Image Behaviour',
                'description'   => 'Choose background image behaviour',
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => 'Fixed',
                    'scroll'    => 'Scroll'
                )
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label'         => 'Initial Width of Content',
                'description'   => 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid"',
                'parent'        => $panel_design_style,
                'options'       => array(
                    ""          => "1300px - default",
                    "grid-1300" => "1300px",
                    "grid-1200" => "1200px",
                    "grid-1000" => "1000px",
                    "grid-800"  => "800px"
                )
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'preload_pattern_image',
                'type'          => 'image',
                'label'         => 'Preload Pattern Image',
                'description'   => 'Choose preload pattern image to be displayed until images are loaded ',
                'parent'        => $panel_design_style
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => 'Element Appearance',
                'description' => 'For animated elements, set distance (related to browser bottom) to start the animation',
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = ratio_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => 'Settings'
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => 'Smooth Scroll',
                'description'   => 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)',
                'parent'        => $panel_settings
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => 'Smooth Page Transitions',
                'description'   => 'Enabling this option will perform a smooth transition between pages when clicking on links.',
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_page_transitions_container"
                )
            )
        );

        $page_transitions_container = ratio_edge_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label'         => 'Page Loader Background Color',
                //'description'   => 'Enabling this option will perform a smooth transition between pages when clicking on links.',
                'parent'        => $page_transitions_container
            )
        );

        $group_pt_spinner_animation = ratio_edge_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title'         => 'Loader Style',
            'description'   => 'Define styles for loader spinner animation',
            'parent'        => $page_transitions_container
        ));

        $row_pt_spinner_animation = ratio_edge_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        ratio_edge_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => 'outline',
            'label'         => 'Spinner Type',
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                "outline" => "Outline",
                "pulse" => "Pulse",
                "double_pulse" => "Double Pulse",
                "cube" => "Cube",
                "rotating_cubes" => "Rotating Cubes",
                "stripes" => "Stripes",
                "wave" => "Wave",
                "two_rotating_circles" => "2 Rotating Circles",
                "five_rotating_circles" => "5 Rotating Circles",
                "atom" => "Atom",
                "clock" => "Clock",
                "mitosis" => "Mitosis",
                "lines" => "Lines",
                "fussion" => "Fussion",
                "wave_circles" => "Wave Circles",
                "pulse_circles" => "Pulse Circles"
            )
        ));

        ratio_edge_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => 'Spinner Color',
            'parent'        => $row_pt_spinner_animation
        ));

        ratio_edge_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => 'Show "Back To Top Button"',
                'description'   => 'Enabling this option will display a Back to Top button on every page',
                'parent'        => $panel_settings
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => 'Responsiveness',
                'description'   => 'Enabling this option will make all pages responsive',
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = ratio_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => 'Custom Code'
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => 'Custom CSS',
                'description'   => 'Enter your custom CSS here',
                'parent'        => $panel_custom_code
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => 'Custom JS',
                'description'   => 'Enter your custom Javascript here',
                'parent'        => $panel_custom_code
            )
        );

        $panel_google_maps_api_key = ratio_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'google_maps_api_key',
                'title' => 'Google Maps API key'
            )
        );

        ratio_edge_add_admin_field(
            array(
                'name'          => 'google_maps_api_key',
                'type'          => 'text',
                'label'         => 'Google Maps API key',
                'description'   => 'Enter your Google Maps API key here',
                'parent'        => $panel_google_maps_api_key
            )
        );

    }

    add_action( 'ratio_edge_options_map', 'ratio_edge_general_options_map', 1);

}