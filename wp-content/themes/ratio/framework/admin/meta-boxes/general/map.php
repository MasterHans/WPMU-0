<?php

$general_meta_box = ratio_edge_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => 'General',
        'name' => 'general_meta'
    )
);


    ratio_edge_add_meta_box_field(
        array(
            'name' => 'edgtf_page_background_color_meta',
            'type' => 'color',
            'default_value' => '',
            'label' => 'Page Background Color',
            'description' => 'Choose background color for page content',
            'parent' => $general_meta_box
        )
    );
	
	ratio_edge_add_meta_box_field(
		array(
			'name' => 'edgtf_page_padding_meta',
			'type' => 'text',
			'default_value' => '',
			'label' => 'Page Padding',
			'description' => 'Insert padding in format 10px 10px 10px 10px',
			'parent' => $general_meta_box
		)
	);

    ratio_edge_add_meta_box_field(
        array(
            'name' => 'edgtf_page_slider_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => 'Slider Shortcode',
            'description' => 'Paste your slider shortcode here',
            'parent' => $general_meta_box
        )
    );

    ratio_edge_add_meta_box_field(
        array(
            'name'        => 'edgtf_page_comments_meta',
            'type'        => 'selectblank',
            'label'       => 'Show Comments',
            'description' => 'Enabling this option will show comments on your page',
            'parent'      => $general_meta_box,
            'options'     => array(
                'yes' => 'Yes',
                'no' => 'No',
            )
        )
    );

	$boxed_option      = ratio_edge_options()->getOptionValue('boxed');
	$boxed_default_dependency = array(
		'' => '#edgtf_boxed_container'
	);

	$boxed_show_array = array(
		'yes' => '#edgtf_boxed_container'
	);

	$boxed_hide_array = array(
		'no' => '#edgtf_boxed_container'
	);

	if($boxed_option === 'yes') {
		$boxed_show_array = array_merge($boxed_show_array, $boxed_default_dependency);
		$temp_boxed_no = array(
			'hidden_value' => 'no'
		);
	} else {
		$boxed_hide_array = array_merge($boxed_hide_array, $boxed_default_dependency);
		$temp_boxed_no = array(
			'hidden_values'   => array('','no')
		);
	}

	ratio_edge_add_meta_box_field(
		array(
			'name'          => 'edgtf_boxed_meta',
			'type'          => 'select',
			'label'         => 'Boxed Layout',
			'description'   => '',
			'parent'        => $general_meta_box,
			'default_value' => '',
			'options'     => array(
				''		=> 'Default',
				'yes'	=> 'Yes',
				'no'	=> 'No'
			),
			'args' => array(
				"dependence" => true,
				'show'       => $boxed_show_array,
				'hide'       => $boxed_hide_array
			)
		)
	);

	$boxed_container = ratio_edge_add_admin_container_no_style(
		array_merge(
			array(
				'parent'            => $general_meta_box,
				'name'              => 'boxed_container',
				'hidden_property'   => 'edgtf_boxed_meta'
			),
			$temp_boxed_no
		)
	);

	ratio_edge_add_meta_box_field(
		array(
			'name'          => 'edgtf_page_background_color_in_box_meta',
			'type'          => 'color',
			'label'         => 'Page Background Color',
			'description'   => 'Choose the page background color outside box.',
			'parent'        => $boxed_container
		)
	);

	ratio_edge_add_meta_box_field(
		array(
			'name'          => 'edgtf_boxed_background_image_meta',
			'type'          => 'image',
			'label'         => 'Background Image',
			'description'   => 'Choose an image to be displayed in background',
			'parent'        => $boxed_container
		)
	);

	ratio_edge_add_meta_box_field(
		array(
			'name'          => 'edgtf_boxed_background_image_repeating_meta',
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

	ratio_edge_add_meta_box_field(
		array(
			'name'          => 'edgtf_boxed_background_image_attachment_meta',
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