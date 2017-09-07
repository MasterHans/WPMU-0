<?php
namespace RatioEdge\Modules\Shortcodes\ElementsHolderItem;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolderItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_elements_holder_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Edge Elements Holder Item', 'ratio'),
					'base' => $this->base,
					'as_child' => array('only' => 'edgtf_elements_holder'),
					'as_parent' => array('except' => 'vc_row, vc_accordion, no_cover_boxes, no_portfolio_list, no_portfolio_slider'),
					'content_element' => true,
					'category' => 'by EDGE',
					'icon' => 'icon-wpb-elements-holder-item extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view' => 'VcColumnView',
					'params' => array(
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => 'Background Gradient',
							'param_name' => 'background_gradient',
							'value' => array(
								'No'    	=> 'no',
								'Yes'    	=> 'yes'
							),
							'description' => ''
						),
						array(
							'type' => 'colorpicker',
							'class' => '',
							'heading' => 'Background Color',
							'param_name' => 'background_color',
							'value' => '',
							'description' => '',
							'dependency' => array('element' => 'background_gradient', 'value' => 'no')
						),
						array(
							'type' => 'colorpicker',
							'class' => '',
							'heading' => 'Gradient First Color',
							'param_name' => 'gradient_first_color',
							'value' => '',
							'dependency' => array('element' => 'background_gradient', 'value' => 'yes')
						),
						array(
							'type' => 'colorpicker',
							'class' => '',
							'heading' => 'Gradient Second Color',
							'param_name' => 'gradient_second_color',
							'value' => '',
							'dependency' => array('element' => 'background_gradient', 'value' => 'yes')
						),
						array(
							'type' => 'attach_image',
							'class' => '',
							'heading' => 'Background Image',
							'param_name' => 'background_image',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => 'Animate Background Image on Hover',
							'param_name' => 'animate_image',
							'value' => array(
								'No'    	=> 'no',
								'Yes'    	=> 'yes'
							),
							'description' => '',
							'dependency' => array('element' => 'background_image', 'not_empty' => true)
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => 'Inside Border',
							'param_name' => 'inside_border',
							'value' => array(
								'No'    	=> 'no',
								'Yes'    	=> 'yes'
							),
							'description' => ''
						),
						array(
							'type' => 'colorpicker',
							'class' => '',
							'heading' => 'Inside Border Color',
							'param_name' => 'inside_border_color',
							'value' => '',
							'description' => '',
							'dependency' => array('element' => 'inside_border', 'value' => 'yes')
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => 'Animate Border on Hover',
							'param_name' => 'animate_border',
							'value' => array(
								'No'    	=> 'no',
								'Yes'    	=> 'yes'
							),
							'description' => '',
							'dependency' => array('element' => 'inside_border', 'value' => 'yes')
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'heading' => 'Padding',
							'param_name' => 'item_padding',
							'value' => '',
							'description' => 'Please insert padding in format 0px 10px 0px 10px'
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => 'Horizontal Alignment',
							'param_name' => 'horizontal_aligment',
							'value' => array(
								'Left'    	=> 'left',
								'Right'     => 'right',
								'Center'    => 'center'
							),
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => 'Vertical Alignment',
							'param_name' => 'vertical_alignment',
							'value' => array(
								'Middle'    => 'middle',
								'Top'    	=> 'top',
								'Bottom'    => 'bottom'
							),
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => 'Make whole item linkable?',
							'param_name' => 'linkable',
							'value' => array(
								'No'    	=> 'no',
								'Yes'    	=> 'yes'
							),
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'heading' => 'Link',
							'param_name' => 'link',
							'value' => '',
							'description' => '',
							'dependency' => array('element' => 'linkable', 'value' => 'yes')
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => 'Link target',
							'param_name' => 'link_target',
							'value' => array(
								'Blank'    	=> '_blank',
								'Self'    	=> '_self'
							),
							'description' => '',
							'dependency' => array('element' => 'linkable', 'value' => 'yes')
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => 'Animation Name',
							'param_name' => 'animation_name',
							'value' => array(
								'No Animation'			=> '',
								'Flip In'				=> 'flip-in',
								'Grow In'				=> 'grow-in',
								'X Rotate'				=> 'x-rotate',
								'Z Rotate'				=> 'z-rotate',
								'Y Translate'			=> 'y-translate',
								'Fade In'				=> 'fade-in',
								'Fade In Down'			=> 'fade-in-down',
								'Fade In Left X Rotate' => 'fade-in-left-x-rotate'
							),
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'heading' => 'Animation Delay (ms)',
							'param_name' => 'animation_delay',
							'value' => '',
							'description' => '',
							'dependency' => array('element' => 'animation_name', 'not_empty' => true)
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => 'Width & Responsiveness',
							'heading' => 'Padding on screen size between 1280px-1439px',
							'param_name' => 'item_padding_1280_1439',
							'value' => '',
							'description' => 'Please insert padding in format 0px 10px 0px 10px'
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => 'Width & Responsiveness',
							'heading' => 'Padding on screen size between 1024px-1280px',
							'param_name' => 'item_padding_1024_1280',
							'value' => '',
							'description' => 'Please insert padding in format 0px 10px 0px 10px'
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => 'Width & Responsiveness',
							'heading' => 'Padding on screen size between 768px-1024px',
							'param_name' => 'item_padding_768_1024',
							'value' => '',
							'description' => 'Please insert padding in format 0px 10px 0px 10px'
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => 'Width & Responsiveness',
							'heading' => 'Padding on screen size between 600px-768px',
							'param_name' => 'item_padding_600_768',
							'value' => '',
							'description' => 'Please insert padding in format 0px 10px 0px 10px'
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => 'Width & Responsiveness',
							'heading' => 'Padding on screen size between 480px-600px',
							'param_name' => 'item_padding_480_600',
							'value' => '',
							'description' => 'Please insert padding in format 0px 10px 0px 10px'
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => 'Width & Responsiveness',
							'heading' => 'Padding on Screen Size Bellow 480px',
							'param_name' => 'item_padding_480',
							'value' => '',
							'description' => 'Please insert padding in format 0px 10px 0px 10px'
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'background_gradient' => '',
			'background_color' => '',
			'gradient_first_color' => '',
			'gradient_second_color' => '',
			'background_image' => '',
			'animate_image' => '',
			'inside_border' => '',
			'inside_border_color' => '',
			'animate_border' => '',
			'item_padding' => '',
			'horizontal_aligment' => '',
			'vertical_alignment' => '',
			'linkable' => '',
			'link' => '',
			'link_target' => '_blank',
			'animation_name' => '',
			'animation_delay' => '',
			'item_padding_1280_1439' => '',
			'item_padding_1024_1280' => '',
			'item_padding_768_1024' => '',
			'item_padding_600_768' => '',
			'item_padding_480_600' => '',
			'item_padding_480' => ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['content']= $content;

		$rand_class = 'edgtf-elements-holder-custom-' . mt_rand(100000,1000000);

		$params['elements_holder_item_style'] = $this->getElementsHolderItemStyle($params);
		$params['elements_holder_item_background'] = $this->getElementsHolderItemBackground($params);
		$params['elements_holder_item_inner_style'] = $this->getElementsHolderItemInnerStyle($params);
		$params['elements_holder_item_content_style'] = $this->getElementsHolderItemContentStyle($params);
		$params['elements_holder_item_class'] = $this->getElementsHolderItemClass($params);
		$params['elements_holder_item_content_class'] = $rand_class;
		$params['elements_holder_item_content_responsive'] = $this->getElementsHolderItemContentResponsiveStyle($params);
		$params['elements_holder_item_data'] = $this->getData($params);

		$html = ratio_edge_get_shortcode_module_template_part('templates/elements-holder-item-template', 'elements-holder', '', $params);

		return $html;
	}


	/**
	 * Return Elements Holder Item style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemStyle($params) {

		$element_holder_item_style = array();

		if ($params['inside_border'] == 'yes' && $params['inside_border_color'] !== '') {
			$element_holder_item_style[] = 'border-color:' . $params['inside_border_color'];
		}

		if ($params['animation_delay'] !== '') {
			$element_holder_item_style[] = 'transition-delay:' . $params['animation_delay'] .'ms;'. '-webkit-transition-delay:' . $params['animation_delay'] .'ms';
		}
		return implode(';', $element_holder_item_style);

	}

	/**
	 * Return Elements Holder Item Background
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemBackground($params) {

		$elements_holder_item_background = array();

		if ($params['background_color'] !== '') {
			$elements_holder_item_background[] = 'background-color: ' . $params['background_color'];
		}

		if ($params['background_gradient'] == 'yes' && $params['gradient_first_color'] != '' && $params['gradient_second_color'] != '') {
			$elements_holder_item_background[] = ratio_edge_inline_background_gradient($params['gradient_first_color'], $params['gradient_second_color']);
		}

		if ($params['background_image'] !== '') {
			$elements_holder_item_background[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']) . ')';
		}

		return implode(';', $elements_holder_item_background);

	}

	private function getElementsHolderItemInnerStyle($params) {

		$element_holder_item_style = array();


		if ($params['inside_border'] == 'yes' && $params['inside_border_color'] !== '') {
			$element_holder_item_style[] = 'border: 1px solid ' . $params['inside_border_color'];
		}

		return implode(';', $element_holder_item_style);

	}
	/**
	 * Return Elements Holder Item Content style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemContentStyle($params) {

		$element_holder_item_content_style = array();

		if ($params['item_padding'] !== '') {
			$element_holder_item_content_style[] = 'padding: ' . $params['item_padding'];
		}

		return implode(';', $element_holder_item_content_style);

	}

	/**
	 * Return Elements Holder Item Content Responssive style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemContentResponsiveStyle($params) {

		$element_holder_item_responsive_style = array();

		if ($params['item_padding_1280_1439'] !== '') {
			$element_holder_item_responsive_style['item_padding_1280_1439'] = $params['item_padding_1280_1439'];
		}
		if ($params['item_padding_1024_1280'] !== '') {
			$element_holder_item_responsive_style['item_padding_1024_1280'] = $params['item_padding_1024_1280'];
		}
		if ($params['item_padding_768_1024'] !== '') {
			$element_holder_item_responsive_style['item_padding_768_1024'] = $params['item_padding_768_1024'];
		}
		if ($params['item_padding_600_768'] !== '') {
			$element_holder_item_responsive_style['item_padding_600_768'] = $params['item_padding_600_768'];
		}
		if ($params['item_padding_480_600'] !== '') {
			$element_holder_item_responsive_style['item_padding_480_600'] = $params['item_padding_480_600'];
		}
		if ($params['item_padding_480'] !== '') {
			$element_holder_item_responsive_style['item_padding_480'] = $params['item_padding_480'];
		}

		return $element_holder_item_responsive_style;

	}

	/**
	 * Return Elements Holder Item classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemClass($params) {

		$element_holder_item_class = array();

		if ($params['vertical_alignment'] !== '') {
			$element_holder_item_class[] = 'edgtf-vertical-alignment-'. $params['vertical_alignment'];
		}

		if ($params['horizontal_aligment'] !== '') {
			$element_holder_item_class[] = 'edgtf-horizontal-alignment-'. $params['horizontal_aligment'];
		}

		if ($params['animation_name'] !== '') {
			$element_holder_item_class[] = 'edgtf-'. $params['animation_name'];
		}

		if ($params['inside_border'] == 'yes') {
			$element_holder_item_class[] = 'edgtf-inside-border';
		}

		if ($params['animate_border'] == 'yes') {
			$element_holder_item_class[] = 'edgtf-animate-border';
		}

		if ($params['animate_image'] == 'yes') {
			$element_holder_item_class[] = 'edgtf-animate-image';
		}

		return implode(' ', $element_holder_item_class);

	}

	private function getData($params) {
		$data = array();

		if($params['animation_name'] !== '') {
			$data['data-animation'] = 'edgtf-'.$params['animation_name'];
		}

		return $data;
	}
}
