<?php

if ( ! function_exists('ratio_edge_header_options_map') ) {

	function ratio_edge_header_options_map() {

		ratio_edge_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => 'Header',
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = ratio_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => 'Header'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => 'Choose Header Type',
				'description' => 'Select the type of header you would like to use',
				'options' => array(
					'header-standard' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-standard.png',
						'label' => 'Header Standard'
					),
					'header-vertical' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-vertical.png',
						'label' => 'Header Vertical'
					),
					'header-full-screen' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-full-screen.png',
						'label' => 'Header Full Screen'
					),
					'header-slide-down' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-slide-down.png',
						'label' => 'Header Slide Down'
					)
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
						'header-vertical' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu',
						'header-full-screen' => '#edgtf_panel_header_full_screen,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_fullscreen_menu',
						'header-slide-down' => '#edgtf_panel_header_slide_down,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_slidedown_menu',
					),
					'hide' => array(
						'header-standard' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_full_screen,#edgtf_panel_slidedown_menu,#edgtf_panel_header_slide_down,#edgtf_fullscreen_menu',
						'header-vertical' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu,#edgtf_panel_header_full_screen,#edgtf_panel_slidedown_menu,#edgtf_panel_header_slide_down,#edgtf_fullscreen_menu',
						'header-full-screen' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_slidedown_menu,#edgtf_panel_header_slide_down',
						'header-slide-down' => '#edgtf_panel_header_standard,#edgtf_panel_main_menu,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu, #edgtf_panel_header_full_screen,#edgtf_fullscreen_menu',
					)
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'sticky-header-on-scroll-up',
				'label' => 'Choose Header behaviour',
				'description' => 'Select the behaviour of header when you scroll down to page',
				'options' => array(
					'sticky-header-on-scroll-up' => 'Sticky on scrol up',
					'sticky-header-on-scroll-down-up' => 'Sticky on scrol up/down',
					'fixed-on-scroll' => 'Fixed on scroll'
				),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array('header-vertical','header-full-screen'),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_sticky_header',
						'fixed-on-scroll' => '#edgtf_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_fixed_header',
						'fixed-on-scroll' => '#edgtf_panel_sticky_header',
					)
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'top_bar',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => 'Top Bar',
				'description' => 'Enabling this option will show top bar area',
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_container"
				)
			)
		);

		$top_bar_container = ratio_edge_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

		ratio_edge_add_admin_field(
			array(
				'parent' => $top_bar_container,
				'type' => 'select',
				'name' => 'top_bar_layout',
				'default_value' => 'two-columns',
				'label' => 'Choose top bar layout',
				'description' => 'Select the layout for top bar',
				'options' => array(
					'two-columns' => 'Two columns',
					'three-columns' => 'Three columns'
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"two-columns" => "#edgtf_top_bar_layout_container",
						"three-columns" => ""
					),
					"show" => array(
						"two-columns" => "",
						"three-columns" => "#edgtf_top_bar_layout_container"
					)
				)
			)
		);

		$top_bar_layout_container = ratio_edge_add_admin_container(array(
			'name' => 'top_bar_layout_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value' => '',
			'hidden_values' => array("two-columns"),
		));

		ratio_edge_add_admin_field(
			array(
				'parent' => $top_bar_layout_container,
				'type' => 'select',
				'name' => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label' => 'Choose column widths',
				'description' => '',
				'options' => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'top_bar_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => 'Top Bar in grid',
				'description' => 'Set top bar content to be in grid',
				'parent' => $top_bar_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = ratio_edge_add_admin_container(array(
			'name' => 'top_bar_in_grid_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value' => 'no'
		));

		ratio_edge_add_admin_field(array(
			'name' => 'top_bar_grid_background_color',
			'type' => 'color',
			'label' => 'Grid Background Color',
			'description' => 'Set grid background color for top bar',
			'parent' => $top_bar_in_grid_container
		));


		ratio_edge_add_admin_field(array(
			'name' => 'top_bar_grid_background_transparency',
			'type' => 'text',
			'label' => 'Grid Background Transparency',
			'description' => 'Set grid background transparency for top bar',
			'parent' => $top_bar_in_grid_container,
			'args' => array('col_width' => 3)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'top_bar_background_color',
			'type' => 'color',
			'label' => 'Background Color',
			'description' => 'Set background color for top bar',
			'parent' => $top_bar_container
		));

		ratio_edge_add_admin_field(array(
			'name' => 'top_bar_background_transparency',
			'type' => 'text',
			'label' => 'Background Transparency',
			'description' => 'Set background transparency for top bar',
			'parent' => $top_bar_container,
			'args' => array('col_width' => 3)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'top_bar_height',
			'type' => 'text',
			'label' => 'Top bar height',
			'description' => 'Enter top bar height (Default is 40px)',
			'parent' => $top_bar_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'hide_top_bar_on_responsive',
			'type' => 'yesno',
			'default_value' => 'yes',
			'label' => 'Hide Top Bar on Responsive',
			'description' => 'Enabling this option you will hide top header area on responsive',
			'parent' => $top_bar_container,
		));

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_style',
				'default_value' => '',
				'label' => 'Header Skin',
				'description' => 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style',
				'options' => array(
					'' => '',
					'light-header' => 'Light',
					'dark-header' => 'Dark'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label' => 'Enable Header Style on Scroll',
				'description' => 'Enabling this option, header will change style depending on row settings for dark/light style',
			)
		);


		$panel_header_standard = ratio_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_standard',
				'title' => 'Header Standard',
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
                    'header-vertical',
					'header-full-screen',
					'header-slide-down'
				)
			)
		);

		ratio_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_title',
				'title' => 'Menu Area'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_standard',
				'default_value' => 'no',
				'label' => 'Header in grid',
				'description' => 'Set header content to be in grid',
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_header_standard_container'
				)
			)
		);

		$menu_area_in_grid_header_standard_container = ratio_edge_add_admin_container(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_in_grid_header_standard_container',
				'hidden_property' => 'menu_area_in_grid_header_standard',
				'hidden_value' => 'no'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'color',
				'name' => 'menu_area_grid_background_color_header_standard',
				'default_value' => '',
				'label' => 'Grid Background color',
				'description' => 'Set grid background color for header area',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'text',
				'name' => 'menu_area_grid_background_transparency_header_standard',
				'default_value' => '',
				'label' => 'Grid background transparency',
				'description' => 'Set grid background transparency for header',
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label' => 'Background color',
				'description' => 'Set background color for header'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label' => 'Background transparency',
				'description' => 'Set background transparency for header',
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_height_header_standard',
				'default_value' => '',
				'label' => 'Height',
				'description' => 'Enter header height (default is 60px)',
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

        $panel_header_vertical = ratio_edge_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_vertical',
                'title' => 'Header Vertical',
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-standard',
					'header-full-screen',
					'header-slide-down'
                )
            )
        );

            ratio_edge_add_admin_field(array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' => 'Background Color',
                'description' => 'Set background color for vertical menu',
                'parent' => $panel_header_vertical
            ));

            ratio_edge_add_admin_field(array(
                'name' => 'vertical_header_transparency',
                'type' => 'text',
                'label' => 'Transparency',
                'description' => 'Enter transparency for vertical menu (value from 0 to 1)',
                'parent' => $panel_header_vertical,
                'args' => array(
                    'col_width' => 1
                )
            ));

            ratio_edge_add_admin_field(
                array(
                    'name' => 'vertical_header_background_image',
                    'type' => 'image',
                    'default_value' => '',
                    'label' => 'Background Image',
                    'description' => 'Set background image for vertical menu',
                    'parent' => $panel_header_vertical
                )
            );


		$panel_header_full_screen = ratio_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen',
				'title' => 'Header Full Screen',
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical',
					'header-slide-down'
				)
			)
		);


		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_full_screen',
				'default_value' => 'no',
				'label' => 'Header in grid',
				'description' => 'Set header content to be in grid',
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_header_standard_container'
				)
			)
		);



		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_full_screen',
				'default_value' => '',
				'label' => 'Background color',
				'description' => 'Set background color for header'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_full_screen',
				'default_value' => '',
				'label' => 'Background transparency',
				'description' => 'Set background transparency for header',
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label' => 'Height',
				'description' => 'Enter header height (default is 60px)',
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_header_slide_down = ratio_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_slide_down',
				'title' => 'Header Slide Down',
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical',
					'header-full-screen'
				)
			)
		);


		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_slide_down,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_slide_down',
				'default_value' => 'no',
				'label' => 'Header in grid',
				'description' => 'Set header content to be in grid',
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_header_standard_container'
				)
			)
		);



		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_slide_down,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_slide_down',
				'default_value' => '',
				'label' => 'Background color',
				'description' => 'Set background color for header'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_slide_down,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_slide_down',
				'default_value' => '',
				'label' => 'Background transparency',
				'description' => 'Set background transparency for header',
				'args' => array(
					'col_width' => 3
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_header_slide_down,
				'type' => 'text',
				'name' => 'menu_area_height_header_slide_down',
				'default_value' => '',
				'label' => 'Height',
				'description' => 'Enter header height (default is 60px)',
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_sticky_header = ratio_edge_add_admin_panel(
			array(
				'title' => 'Sticky Header',
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => 'Scroll Amount for Sticky',
				'description' => 'Enter scroll amount for Sticky Menu to appear (deafult is header height)',
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => 'Sticky Header in grid',
				'description' => 'Set sticky header content to be in grid',
				'parent' => $panel_sticky_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = ratio_edge_add_admin_container(array(
			'name' => 'sticky_header_in_grid_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value' => 'no'
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_background_color',
			'type' => 'color',
			'label' => 'Grid Background Color',
			'description' => 'Set grid background color for sticky header',
			'parent' => $sticky_header_in_grid_container
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_transparency',
			'type' => 'text',
			'label' => 'Sticky Header Grid Transparency',
			'description' => 'Enter transparency for sticky header grid (value from 0 to 1)',
			'parent' => $sticky_header_in_grid_container,
			'args' => array(
				'col_width' => 1
			)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => 'Background Color',
			'description' => 'Set background color for sticky header',
			'parent' => $panel_sticky_header
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => 'Sticky Header Transparency',
			'description' => 'Enter transparency for sticky header (value from 0 to 1)',
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => 'Sticky Header Height',
			'description' => 'Enter height for sticky header (default is 60px)',
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$group_sticky_header_menu = ratio_edge_add_admin_group(array(
			'title' => 'Sticky Header Menu',
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => 'Define styles for sticky menu items',
		));

		$row1_sticky_header_menu = ratio_edge_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => 'Text Color',
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		ratio_edge_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => 'Hover/Active color',
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = ratio_edge_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		ratio_edge_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => 'Font Family',
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_fontsize',
				'label' => 'Font Size',
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_lineheight',
				'label' => 'Line height',
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_texttransform',
				'label' => 'Text transform',
				'default_value' => '',
				'options' => ratio_edge_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = ratio_edge_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		ratio_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontstyle',
				'default_value' => '',
				'label' => 'Font Style',
				'options' => ratio_edge_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontweight',
				'default_value' => '',
				'label' => 'Font Weight',
				'options' => ratio_edge_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		ratio_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letterspacing',
				'label' => 'Letter Spacing',
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = ratio_edge_add_admin_panel(
			array(
				'title' => 'Fixed Header',
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
			)
		);

		ratio_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => 'Grid Background Color',
			'description' => 'Set grid background color for fixed header',
			'parent' => $panel_fixed_header
		));

		ratio_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_transparency',
			'type' => 'text',
			'default_value' => '',
			'label' => 'Header Transparency Grid',
			'description' => 'Enter transparency for fixed header grid (value from 0 to 1)',
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		ratio_edge_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => 'Background Color',
			'description' => 'Set background color for fixed header',
			'parent' => $panel_fixed_header
		));

		ratio_edge_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => 'Header Transparency',
			'description' => 'Enter transparency for fixed header (value from 0 to 1)',
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = ratio_edge_add_admin_panel(
			array(
				'title' => 'Main Menu',
				'name' => 'panel_main_menu',
				'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-vertical',
					'header-full-screen',
					'header-slide-down'
				)
			)
		);

		ratio_edge_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => 'Main Menu General Settings'
			)
		);


		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_icon_position',
				'default_value' => 'left',
				'label' => 'Icon Position in 1st Level Menu',
				'description' => 'Choose position of icon selected in Appearance->Menu->Menu Structure',
				'options' => array(
					'left' => 'Left',
					'top' => 'Top'
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'left' => '#edgtf_menu_item_icon_position_container'
					),
					'show' => array(
						'top' => '#edgtf_menu_item_icon_position_container'
					)
				)
			)
		);

		$menu_item_icon_position_container = ratio_edge_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_icon_position_container',
				'hidden_property' => 'menu_item_icon_position',
				'hidden_value' => 'left'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $menu_item_icon_position_container,
				'type' => 'text',
				'name' => 'menu_item_icon_size',
				'default_value' => '',
				'label' => 'Icon Size',
				'description' => 'Choose position of icon selected in Appearance->Menu->Menu Structure',
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_style',
				'default_value' => 'small_item',
				'label' => 'Item Height in 1st Level Menu',
				'description' => 'Choose menu item height',
				'options' => array(
					'small_item' => 'Small',
					'large_item' => 'Big'
				)
			)
		);

		$drop_down_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_group',
				'title' => 'Main Dropdown Menu',
				'description' => 'Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)'
			)
		);

		$drop_down_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row1',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_color',
				'default_value' => '',
				'label' => 'Background Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'textsimple',
				'name' => 'dropdown_background_transparency',
				'default_value' => '',
				'label' => 'Transparency',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_separator_color',
				'default_value' => '',
				'label' => 'Item Bottom Separator Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'yesnosimple',
				'name' => 'enable_dropdown_separator_full_width',
				'default_value' => 'no',
				'label' => 'Item Separator Full Width',
			)
		);

		$drop_down_padding_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_padding_group',
				'title' => 'Main Dropdown Menu Padding',
				'description' => 'Choose a top/bottom padding for dropdown menu'
			)
		);

		$drop_down_padding_row = ratio_edge_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name' => 'drop_down_padding_row',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_top_padding',
				'default_value' => '',
				'label' => 'Top Padding',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_bottom_padding',
				'default_value' => '',
				'label' => 'Bottom Padding',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label' => 'Main Dropdown Menu Appearance',
				'description' => 'Choose appearance for dropdown menu',
				'options' => array(
					'dropdown-default' => 'Default',
					'dropdown-slide-from-bottom' => 'Slide From Bottom',
					'dropdown-slide-from-top' => 'Slide From Top',
					'dropdown-animate-height' => 'Animate Height',
					'dropdown-slide-from-left' => 'Slide From Left'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'text',
				'name' => 'dropdown_top_position',
				'default_value' => '',
				'label' => 'Dropdown position',
				'description' => 'Enter value in percentage of entire header height',
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_wide_menu_background',
				'default_value' => 'yes',
				'label' => 'Enable Full Width Background for Wide Dropdown Type',
				'description' => 'Enabling this option will show full width background for wide dropdown type',
			)
		);

		$first_level_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'first_level_group',
				'title' => '1st Level Menu',
				'description' => 'Define styles for 1st level in Top Navigation Menu'
			)
		);

		$first_level_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_color',
				'default_value' => '',
				'label' => 'Text Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_hovercolor',
				'default_value' => '',
				'label' => 'Hover Text Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_activecolor',
				'default_value' => '',
				'label' => 'Active Text Color',
			)
		);

		$first_level_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_text_background_color',
				'default_value' => '',
				'label' => 'Text Background Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_hover_background_color',
				'default_value' => '',
				'label' => 'Hover Text Background Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_active_background_color',
				'default_value' => '',
				'label' => 'Active Text Background Color',
			)
		);

		$first_level_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row3',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_hovercolor',
				'default_value' => '',
				'label' => 'Light Menu Hover Text Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_activecolor',
				'default_value' => '',
				'label' => 'Light Menu Active Text Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_border_color',
				'default_value' => '',
				'label' => 'Light Menu Border Hover/Active Color',
			)
		);

		$first_level_row4 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row4',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_hovercolor',
				'default_value' => '',
				'label' => 'Dark Menu Hover Text Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_activecolor',
				'default_value' => '',
				'label' => 'Dark Menu Active Text Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_border_color',
				'default_value' => '',
				'label' => 'Dark Menu Border Hover/Active Color',
			)
		);

		$first_level_row5 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row5',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'fontsimple',
				'name' => 'menu_google_fonts',
				'default_value' => '-1',
				'label' => 'Font Family',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_fontsize',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_hover_background_color_transparency',
				'default_value' => '',
				'label' => 'Hover Background Color Transparency',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_active_background_color_transparency',
				'default_value' => '',
				'label' => 'Active Background Color Transparency',
			)
		);

		$first_level_row6 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row6',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontstyle',
				'default_value' => '',
				'label' => 'Font Style',
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontweight',
				'default_value' => '',
				'label' => 'Font Weight',
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_letterspacing',
				'default_value' => '',
				'label' => 'Letter Spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_texttransform',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => ratio_edge_get_text_transform_array()
			)
		);

		$first_level_row7 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row7',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_lineheight',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_padding_left_right',
				'default_value' => '',
				'label' => 'Padding Left/Right',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_margin_left_right',
				'default_value' => '',
				'label' => 'Margin Left/Right',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_group',
				'title' => '2nd Level Menu',
				'description' => 'Define styles for 2nd level in Top Navigation Menu'
			)
		);

		$second_level_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color',
				'default_value' => '',
				'label' => 'Text Color'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor',
				'default_value' => '',
				'label' => 'Hover/Active Color'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor',
				'default_value' => '',
				'label' => 'Hover/Active Background Color'
			)
		);

		$second_level_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label' => 'Font Family'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_padding_top_bottom',
				'default_value' => '',
				'label' => 'Padding Top/Bottom',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle',
				'default_value' => '',
				'label' => 'Font style',
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight',
				'default_value' => '',
				'label' => 'Font weight',
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing',
				'default_value' => '',
				'label' => 'Letter spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => ratio_edge_get_text_transform_array()
			)
		);

		$second_level_wide_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_wide_group',
				'title' => '2nd Level Wide Menu',
				'description' => 'Define styles for 2nd level in Wide Menu'
			)
		);

		$second_level_wide_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color',
				'default_value' => '',
				'label' => 'Text Color'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label' => 'Hover/Active Color'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor',
				'default_value' => '',
				'label' => 'Hover/Active Background Color'
			)
		);

		$second_level_wide_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row2',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label' => 'Font Family'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_padding_top_bottom',
				'default_value' => '',
				'label' => 'Padding Top/Bottom',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row3',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label' => 'Font style',
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label' => 'Font weight',
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label' => 'Letter spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => ratio_edge_get_text_transform_array()
			)
		);

		$third_level_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_group',
				'title' => '3nd Level Menu',
				'description' => 'Define styles for 3nd level in Top Navigation Menu'
			)
		);

		$third_level_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label' => 'Text Color'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => 'Hover/Active Color'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => 'Hover/Active Background Color'
			)
		);

		$third_level_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row2',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => 'Font Family'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row3',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => 'Font style',
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label' => 'Font weight',
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => 'Letter spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => ratio_edge_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_wide_group',
				'title' => '3rd Level Wide Menu',
				'description' => 'Define styles for 3rd level in Wide Menu'
			)
		);

		$third_level_wide_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label' => 'Text Color'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => 'Hover/Active Color'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => 'Hover/Active Background Color'
			)
		);

		$third_level_wide_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row2',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => 'Font Family'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row3',
				'next' => true
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => 'Font style',
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label' => 'Font weight',
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => 'Letter spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => ratio_edge_get_text_transform_array()
			)
		);

        $panel_vertical_main_menu = ratio_edge_add_admin_panel(
            array(
                'title' => 'Vertical Main Menu',
                'name' => 'panel_vertical_main_menu',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-standard',
					'header-full-screen',
					'header-slide-down'
				)
            )
        );

        $drop_down_group = ratio_edge_add_admin_group(
            array(
                'parent' => $panel_vertical_main_menu,
                'name' => 'vertical_drop_down_group',
                'title' => 'Main Dropdown Menu',
                'description' => 'Set a style for dropdown menu'
            )
        );

        $vertical_drop_down_row1 = ratio_edge_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name' => 'edgtf_drop_down_row1',
            )
        );

        ratio_edge_add_admin_field(
            array(
                'parent' => $vertical_drop_down_row1,
                'type' => 'colorsimple',
                'name' => 'vertical_dropdown_background_color',
                'default_value' => '',
                'label' => 'Background Color',
            )
        );

        $group_vertical_first_level = ratio_edge_add_admin_group(array(
            'name'			=> 'group_vertical_first_level',
            'title'			=> '1st level',
            'description'	=> 'Define styles for 1st level menu',
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_first_level_1 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_1',
                'parent'	=> $group_vertical_first_level
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_color',
                'default_value'	=> '',
                'label'			=> 'Text Color',
                'parent'		=> $row_vertical_first_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_hover_color',
                'default_value'	=> '',
                'label'			=> 'Hover/Active Color',
                'parent'		=> $row_vertical_first_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_fontsize',
                'default_value'	=> '',
                'label'			=> 'Font Size',
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_lineheight',
                'default_value'	=> '',
                'label'			=> 'Line Height',
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            $row_vertical_first_level_2 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_2',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_texttransform',
                'default_value'	=> '',
                'label'			=> 'Text Transform',
                'options'		=> ratio_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_1st_google_fonts',
                'default_value'	=> '-1',
                'label'			=> 'Font Family',
                'parent'		=> $row_vertical_first_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontstyle',
                'default_value'	=> '',
                'label'			=> 'Font Style',
                'options'		=> ratio_edge_get_font_style_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontweight',
                'default_value'	=> '',
                'label'			=> 'Font Weight',
                'options'		=> ratio_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            $row_vertical_first_level_3 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_3',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_letter_spacing',
                'default_value'	=> '',
                'label'			=> 'Letter Spacing',
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_3
            ));

        $group_vertical_second_level = ratio_edge_add_admin_group(array(
            'name'			=> 'group_vertical_second_level',
            'title'			=> '2nd level',
            'description'	=> 'Define styles for 2nd level menu',
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_second_level_1 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_1',
                'parent'	=> $group_vertical_second_level
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_color',
                'default_value'	=> '',
                'label'			=> 'Text Color',
                'parent'		=> $row_vertical_second_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_hover_color',
                'default_value'	=> '',
                'label'			=> 'Hover/Active Color',
                'parent'		=> $row_vertical_second_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_fontsize',
                'default_value'	=> '',
                'label'			=> 'Font Size',
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_lineheight',
                'default_value'	=> '',
                'label'			=> 'Line Height',
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            $row_vertical_second_level_2 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_2',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_texttransform',
                'default_value'	=> '',
                'label'			=> 'Text Transform',
                'options'		=> ratio_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_2nd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> 'Font Family',
                'parent'		=> $row_vertical_second_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontstyle',
                'default_value'	=> '',
                'label'			=> 'Font Style',
                'options'		=> ratio_edge_get_font_style_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontweight',
                'default_value'	=> '',
                'label'			=> 'Font Weight',
                'options'		=> ratio_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            $row_vertical_second_level_3 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_3',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_letter_spacing',
                'default_value'	=> '',
                'label'			=> 'Letter Spacing',
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_3
            ));

        $group_vertical_third_level = ratio_edge_add_admin_group(array(
            'name'			=> 'group_vertical_third_level',
            'title'			=> '3rd level',
            'description'	=> 'Define styles for 3rd level menu',
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_third_level_1 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_1',
                'parent'	=> $group_vertical_third_level
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_color',
                'default_value'	=> '',
                'label'			=> 'Text Color',
                'parent'		=> $row_vertical_third_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_hover_color',
                'default_value'	=> '',
                'label'			=> 'Hover/Active Color',
                'parent'		=> $row_vertical_third_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_fontsize',
                'default_value'	=> '',
                'label'			=> 'Font Size',
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_lineheight',
                'default_value'	=> '',
                'label'			=> 'Line Height',
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            $row_vertical_third_level_2 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_2',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_texttransform',
                'default_value'	=> '',
                'label'			=> 'Text Transform',
                'options'		=> ratio_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_3rd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> 'Font Family',
                'parent'		=> $row_vertical_third_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontstyle',
                'default_value'	=> '',
                'label'			=> 'Font Style',
                'options'		=> ratio_edge_get_font_style_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontweight',
                'default_value'	=> '',
                'label'			=> 'Font Weight',
                'options'		=> ratio_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            $row_vertical_third_level_3 = ratio_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_3',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            ratio_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_letter_spacing',
                'default_value'	=> '',
                'label'			=> 'Letter Spacing',
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_3
            ));

		$panel_slidedown_menu = ratio_edge_add_admin_panel(
			array(
				'title' => 'Slide Down Menu',
				'name' => 'panel_slidedown_menu',
				'page' => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values' => array(
					'header-vertical',
					'header-full-screen',
					'header-standard'
				)
			)
		);


		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_slidedown_menu,
				'type' => 'selectblank',
				'name' => 'slidedown_alignment',
				'default_value' => '',
				'label' => 'Slide Down Menu Alignment',
				'description' => 'Choose alignment for slidedown menu content',
				'options' => array(
					"left" => "Left",
					"center" => "Center",
					"right" => "Right"
				)
			)
		);

		$background_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_slidedown_menu,
				'name' => 'background_group',
				'title' => 'Background',
				'description' => 'Select a background color and transparency for Slide Down Menu (0 = fully transparent, 1 = opaque)'

			)
		);

		$background_group_row = ratio_edge_add_admin_row(
			array(
				'parent' => $background_group,
				'name' => 'background_group_row'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_background_color',
				'default_value' => '',
				'label' => 'Background Color'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_background_transparency',
				'default_value' => '',
				'label' => 'Transparency (values:0-1)'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $panel_slidedown_menu,
				'type' => 'image',
				'name' => 'slidedown_menu_background_image',
				'default_value' => '',
				'label' => 'Background Image',
				'description' => 'Choose a background image for Slide Down Menu background'
			)
		);

//1st level style group
		$first_level_style_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_slidedown_menu,
				'name' => 'first_level_style_group',
				'title' => '1st Level Style',
				'description' => 'Define styles for 1st level in Slide Down Menu'
			)
		);

		$first_level_style_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_color',
				'default_value' => '',
				'label' => 'Text Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_hover_color',
				'default_value' => '',
				'label' => 'Hover Text Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_active_color',
				'default_value' => '',
				'label' => 'Active Text Color',
			)
		);

		$first_level_style_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row2'
			)
		);


		$first_level_style_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row3'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'fontsimple',
				'name' => 'slidedown_menu_google_fonts',
				'default_value' => '-1',
				'label' => 'Font Family',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_fontsize',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_lineheight',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_style_row4 = ratio_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row4'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontstyle',
				'default_value' => '',
				'label' => 'Font Style',
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontweight',
				'default_value' => '',
				'label' => 'Font Weight',
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_letterspacing',
				'default_value' => '',
				'label' => 'Letter Spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_texttransform',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => ratio_edge_get_text_transform_array()
			)
		);

//2nd level style group
		$second_level_style_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_slidedown_menu,
				'name' => 'second_level_style_group',
				'title' => '2nd Level Style',
				'description' => 'Define styles for 2nd level in Slide Down Menu'
			)
		);

		$second_level_style_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_color_2nd',
				'default_value' => '',
				'label' => 'Text Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_hover_color_2nd',
				'default_value' => '',
				'label' => 'Hover Text Color',
			)
		);

		$second_level_style_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'slidedown_menu_google_fonts_2nd',
				'default_value' => '-1',
				'label' => 'Font Family',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_fontsize_2nd',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_lineheight_2nd',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_style_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontstyle_2nd',
				'default_value' => '',
				'label' => 'Font Style',
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontweight_2nd',
				'default_value' => '',
				'label' => 'Font Weight',
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_letterspacing_2nd',
				'default_value' => '',
				'label' => 'Letter Spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_texttransform_2nd',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => ratio_edge_get_text_transform_array()
			)
		);

		$third_level_style_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_slidedown_menu,
				'name' => 'third_level_style_group',
				'title' => '3rd Level Style',
				'description' => 'Define styles for 3rd level in Slide Down Menu'
			)
		);

		$third_level_style_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'third_level_style_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_color_3rd',
				'default_value' => '',
				'label' => 'Text Color',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_hover_color_3rd',
				'default_value' => '',
				'label' => 'Hover Text Color',
			)
		);

		$third_level_style_row2 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'slidedown_menu_google_fonts_3rd',
				'default_value' => '-1',
				'label' => 'Font Family',
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_fontsize_3rd',
				'default_value' => '',
				'label' => 'Font Size',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_lineheight_3rd',
				'default_value' => '',
				'label' => 'Line Height',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_style_row3 = ratio_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontstyle_3rd',
				'default_value' => '',
				'label' => 'Font Style',
				'options' => ratio_edge_get_font_style_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_fontweight_3rd',
				'default_value' => '',
				'label' => 'Font Weight',
				'options' => ratio_edge_get_font_weight_array()
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'textsimple',
				'name' => 'slidedown_menu_letterspacing_3rd',
				'default_value' => '',
				'label' => 'Letter Spacing',
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'slidedown_menu_texttransform_3rd',
				'default_value' => '',
				'label' => 'Text Transform',
				'options' => ratio_edge_get_text_transform_array()
			)
		);



		$icon_colors_group = ratio_edge_add_admin_group(
			array(
				'parent' => $panel_slidedown_menu,
				'name' => 'slidedown_menu_icon_colors_group',
				'title' => 'Slide Down Menu Icon Style',
				'description' => 'Define styles for Slide Down Menu Icon'
			)
		);

		$icon_colors_row1 = ratio_edge_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row1'
			)
		);

		ratio_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_icon_color',
				'label' => 'Color',
			)
		);
		ratio_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'slidedown_menu_icon_hover_color',
				'label' => 'Hover Color',
			)
		);

	}

	add_action( 'ratio_edge_options_map', 'ratio_edge_header_options_map', 4);

}