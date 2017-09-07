<?php

$edgt_pages = array();
$pages = get_pages(); 
foreach($pages as $page) {
	$edgt_pages[$page->ID] = $page->post_title;
}

//Portfolio Images

$edgtPortfolioImages = new RatioEdgeMetaBox("portfolio-item", "Portfolio Images (multiple upload)", '', '', 'portfolio_images');
$ratio_edge_Framework->edgtMetaBoxes->addMetaBox("portfolio_images",$edgtPortfolioImages);

	$edgt_portfolio_image_gallery = new RatioEdgeMultipleImages("edgt_portfolio-image-gallery","Portfolio Images","Choose your portfolio images");
	$edgtPortfolioImages->addChild("edgt_portfolio-image-gallery",$edgt_portfolio_image_gallery);

//Portfolio Images/Videos 2

$edgtPortfolioImagesVideos2 = new RatioEdgeMetaBox("portfolio-item", "Portfolio Images/Videos (single upload)");
$ratio_edge_Framework->edgtMetaBoxes->addMetaBox("portfolio_images_videos2",$edgtPortfolioImagesVideos2);

	$edgt_portfolio_images_videos2 = new RatioEdgeImagesVideosFramework("Portfolio Images/Videos 2","ThisIsDescription");
	$edgtPortfolioImagesVideos2->addChild("edgt_portfolio_images_videos2",$edgt_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

$edgtAdditionalSidebarItems = ratio_edge_add_meta_box(
    array(
        'scope' => array('portfolio-item'),
        'title' => 'Additional Portfolio Sidebar Items',
        'name' => 'portfolio_properties'
    )
);

	$edgt_portfolio_properties = ratio_edge_add_options_framework(
	    array(
	        'label' => 'Portfolio Properties',
	        'name' => 'edgt_portfolio_properties',
	        'parent' => $edgtAdditionalSidebarItems
	    )
	);
//Portfolio Second Featured Image

$edgtSecondPortfolioFeaturedImage =  ratio_edge_add_meta_box(array(
	'scope' => array('portfolio-item'),
	'title' => 'Second Featured image',
	'name' => 'second-featured-image',
	'context' => 'side',
	'priority' => 'low',
));

ratio_edge_add_meta_box_field(
	array(
		'name'        	=> 'portfolio_second_featured_image',
		'type'        	=> 'image',
		'label'       	=> '',
		'description' 	=> 'Only for Row and Scrollable Portfolio List Types',
		'parent'      	=> $edgtSecondPortfolioFeaturedImage,
	)
);

//Portfolio Third Featured Image

$edgtThirdPortfolioFeaturedImage = ratio_edge_add_meta_box(array(
	'scope' => array('portfolio-item'),
	'title' => 'Third Featured image',
	'name' => 'third-featured-image',
	'context' => 'side',
	'priority' => 'low',
));

ratio_edge_add_meta_box_field(
	array(
		'name'        	=> 'portfolio_third_featured_image',
		'type'        	=> 'image',
		'label'       	=> '',
		'description' 	=> 'Only for Row and Scrollable Portfolio List Types',
		'parent'      	=> $edgtThirdPortfolioFeaturedImage,
	)
);

if(!function_exists('ratio_edge_add_attachment_custom_field')){
	function ratio_edge_add_attachment_custom_field( $form_fields, $post = null ) {
		if(wp_attachment_is_image($post->ID)){
			$field_value = get_post_meta( $post->ID, '_ptf_single_masonry_image_size', true );

			$form_fields['ptf_single_masonry_image_size'] = array(
				'input' => 'html',
				'label' => esc_html__( 'Image Size', 'ratio'),
				'helps' => esc_html__( 'Choose image size for masonry single', 'ratio')
			);

			$form_fields['ptf_single_masonry_image_size']['html']  = "<select name='attachments[{$post->ID}][ptf_single_masonry_image_size]'>";
			$form_fields['ptf_single_masonry_image_size']['html'] .= '<option '.selected($field_value,'edgtf-default-masonry-item',false).' value="edgtf-default-masonry-item">'.esc_html__('Default Size','ratio').'</option>';
			$form_fields['ptf_single_masonry_image_size']['html'] .= '<option '.selected($field_value,'edgtf-large-height-masonry-item',false).' value="edgtf-large-height-masonry-item">'.esc_html__('Large Height','ratio').'</option>';
			$form_fields['ptf_single_masonry_image_size']['html'] .= '<option '.selected($field_value,'edgtf-large-width-masonry-item',false).' value="edgtf-large-width-masonry-item">'.esc_html__('Large Width','ratio').'</option>';
			$form_fields['ptf_single_masonry_image_size']['html'] .= '<option '.selected($field_value,'edgtf-large-width-height-masonry-item',false).' value="edgtf-large-width-height-masonry-item">'.esc_html__('Large Width/Height','ratio').'</option>';
			$form_fields['ptf_single_masonry_image_size']['html'] .= '</select>';

            $field_value = get_post_meta( $post->ID, '_ptf_single_slider_skin', true );

            // var_dump($field_value);

            $form_fields['ptf_single_slider_skin'] = array(
                'input' => 'html',
                'label' => esc_html__( 'Slide Skin', 'ratio'),
                'helps' => esc_html__( 'Choose slide skin for full screen single', 'ratio')
            );

            $form_fields['ptf_single_slider_skin']['html']  = "<select name='attachments[{$post->ID}][ptf_single_slider_skin]'>";
            $form_fields['ptf_single_slider_skin']['html'] .= '<option '.selected($field_value,'edgtf-slide-light-skin',false).' value="edgtf-slide-white-skin">'.esc_html__('Light Skin','ratio').'</option>';
            $form_fields['ptf_single_slider_skin']['html'] .= '<option '.selected($field_value,'edgtf-slide-dark-skin',false).' value="edgtf-slide-dark-skin">'.esc_html__('Dark Skin','ratio').'</option>';
            $form_fields['ptf_single_slider_skin']['html'] .= '</select>';
		}
		return $form_fields;
	}
	add_filter( 'attachment_fields_to_edit', 'ratio_edge_add_attachment_custom_field' , 10, 2 );
}

if(!function_exists('ratio_edge_image_attachment_fields_to_save')){
	/**
	 * @param array $post
	 * @param array $attachment
	 * @return array
	 */
	function ratio_edge_image_attachment_fields_to_save($post, $attachment) {

		if( isset($attachment['ptf_single_masonry_image_size']) ){
			update_post_meta($post['ID'], '_ptf_single_masonry_image_size', $attachment['ptf_single_masonry_image_size']);
		}

        if( isset($attachment['ptf_single_slider_skin']) ){
            update_post_meta($post['ID'], '_ptf_single_slider_skin', $attachment['ptf_single_slider_skin']);
        }
		return $post;
	}
	add_filter( 'attachment_fields_to_save', 'ratio_edge_image_attachment_fields_to_save',10,2 );
}