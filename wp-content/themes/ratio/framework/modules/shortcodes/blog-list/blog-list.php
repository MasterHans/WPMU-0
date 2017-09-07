<?php

namespace RatioEdge\Modules\Shortcodes\BlogList;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class BlogList
 */
class BlogList implements ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_blog_list';
		
		add_action('vc_before_init', array($this,'vcMap'));

	}
	
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Edge Blog List', 'ratio'),
			'base' => $this->base,
			'icon' => 'icon-wpb-blog-list extended-custom-icon',
			'category' => 'by EDGE',
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Type', 'ratio'),
						'param_name' => 'type',
						'value' => array(
							'Boxes' => 'boxes',
							'Narrow' => 'narrow',
							'Minimal' => 'minimal',
							'Image in box' => 'image_in_box'
						),
						'description' => '',
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'heading' => 'Number of Posts',
						'param_name' => 'number_of_posts',
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'heading' => 'Number of Columns',
						'param_name' => 'number_of_columns',
						'value' => array(
							'One' => '1',
							'Two' => '2',
							'Three' => '3',
							'Four' => '4'
						),
						'description' => '',
						'dependency' => Array('element' => 'type', 'value' => array('boxes')),
                        'save_always' => true
					),
					array(
						'type' => 'dropdown',
						'heading' => 'Order By',
						'param_name' => 'order_by',
						'value' => array(
							'Title' => 'title',
							'Date' => 'date'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'heading' => 'Order',
						'param_name' => 'order',
						'value' => array(
							'ASC' => 'ASC',
							'DESC' => 'DESC'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' => 'textfield',
						'heading' => 'Category Slug',
						'param_name' => 'category',
						'description' => 'Leave empty for all or use comma for list',
						'admin_label' => true
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> 'Selected Posts',
						'param_name'	=> 'selected_posts',
						'description'	=> 'Selected Posts (leave empty for all, delimit by comma)',
						'admin_label'	=> true
					),
					array(
						'type' => 'dropdown',
						'heading' => 'Image Size',
						'param_name' => 'image_size',
						'value' => array(
							'Original' => 'original',
							'Landscape' => 'landscape',
							'Square' => 'square'
						),
						'description' => '',
						'dependency' => Array('element' => 'type', 'value' => array('boxes')),
                        'save_always' => true
					),
					array(
						'type' => 'textfield',
						'heading' => 'Text length',
						'param_name' => 'text_length',
						'description' => 'Number of characters'
					),
					array(
						'type' => 'dropdown',
						'heading' => 'Title Tag',
						'param_name' => 'title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'description' => ''
					)
				)
		) );

	}
	public function render($atts, $content = null) {
		
		$default_atts = array(
			'type' 					=> 'boxes',
            'number_of_posts' 		=> '',
            'number_of_columns'		=> '',
            'image_size'			=> 'original',
            'order_by'				=> '',
            'order'					=> '',
            'category'				=> '',
			'selected_posts' 		=> '',
            'title_tag'				=> 'h3',
			'text_length'			=> '90'
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['holder_classes'] = $this->getBlogHolderClasses($params);
	
		$queryArray = $this->generateBlogQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;	
     
		
        $thumbImageSize = $this->generateImageSize($params);
		$params['thumb_image_size'] = $thumbImageSize;

		$html ='';
        $html .= ratio_edge_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);
		return $html;
		
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getBlogHolderClasses($params){
		$holderClasses = '';
		
		$columnNumber = $this->getColumnNumberClass($params);
		
		if(!empty($params['type'])){
			switch($params['type']){
				case 'image_in_box':
					$holderClasses = 'edgtf-image-in-box';
				break;
				case 'boxes' : 
					$holderClasses = 'edgtf-boxes';
				break;	
				case 'masonry' : 
					$holderClasses = 'edgtf-masonry';
				break;
				case 'minimal' :
					$holderClasses = 'edgtf-minimal';
				break;
				case 'narrow' :
					$holderClasses = 'edgtf-narrow';
				break;
				default: 
					$holderClasses = 'edgtf-boxes';
			}
		}
		
		$holderClasses .= ' '.$columnNumber;
		
		return $holderClasses;
		
	}

	/** 
	   * Generates column classes for boxes type
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getColumnNumberClass($params){
		
		$columnsNumber = '';
		$type = $params['type'];
		$columns = $params['number_of_columns'];
		
        if ($type == 'boxes') {
            switch ($columns) {
                case 1:
                    $columnsNumber = 'edgtf-one-column';
                    break;
                case 2:
                    $columnsNumber = 'edgtf-two-columns';
                    break;
                case 3:
                    $columnsNumber = 'edgtf-three-columns';
                    break;
                case 4:
                    $columnsNumber = 'edgtf-four-columns';
                    break;
                default:
					$columnsNumber = 'edgtf-one-column';
                    break;
            }
        }
		return $columnsNumber;
	}

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateBlogQueryArray($params){
		
		$queryArray = array(
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'category_name' => $params['category']
		);

		$post_ids = null;
		if($params['selected_posts'] != ''){
			$post_ids = explode(',', $params['selected_posts']);
			$queryArray['post__in'] = $post_ids;
		}

		return $queryArray;
	}

	/**
	   * Generates image size option
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function generateImageSize($params){
		$thumbImageSize = '';
		$imageSize = $params['image_size'];
		
		if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'ratio_edge_landscape';
        } else if($imageSize === 'square'){
			$thumbImageSize .= 'ratio_edge_square';
		} else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        }
		return $thumbImageSize;
	}

}
