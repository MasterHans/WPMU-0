<?php
namespace RatioEdge\Modules\Shortcodes\Process;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessItem implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_process_item';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                    => 'Process Item',
			'base'                    => $this->getBase(),
			'as_child'                => array('only' => 'edgtf_process_holder'),
			'category'                => 'by EDGE',
			'icon'                    => 'icon-wpb-call-to-action extended-custom-icon',
			'show_settings_on_create' => true,
			'params'                  => array(
				array(
					'type'        => 'textfield',
					'heading'     => 'Number',
					'param_name'  => 'number',
					'admin_label' => true
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Number Color',
					'param_name' => 'number_color',
					'description' => '',
					'dependency' => array('element' => 'number', 'not_empty' => true)
				),
//				array(
//					'type' => 'colorpicker',
//					'heading' => 'Number Hover Color',
//					'param_name' => 'number_hover_color',
//					'description' => '',
//					'dependency' => array('element' => 'number_color', 'not_empty' => true)
//				),
				array(
					'type'        => 'attach_image',
					'heading'     => 'Image',
					'param_name'  => 'image'
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Title',
					'param_name'  => 'title',
					'admin_label' => true
				),
				array(
					'type'        => 'textarea',
					'heading'     => 'Text',
					'param_name'  => 'text',
					'admin_label' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => 'Highlight Item?',
					'param_name'  => 'highlighted',
					'value'       => array(
						'No'  => 'no',
						'Yes' => 'yes'
					),
					'admin_label' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Link',
					'param_name'  => 'link',
					'admin_label' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => 'Target',
					'param_name'  => 'target',
					'value'       => array(
						'Self'  => '_self',
						'Blank' => '_blank'
					),
					'admin_label' => true,
					'dependency' => array('element' => 'link', 'not_empty' => true)
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'number'		=> '',
			'number_color'	=> '',
	//		'number_hover_color'	=> '',
			'image'			=> '',
			'title'     	=> '',
			'text'      	=> '',
			'highlighted'	=> 'no',
			'link'			=> '',
			'target'		=> '_self'
		);

		$params = shortcode_atts($default_atts, $atts);

		$params['item_classes'] = array(
			'edgtf-process-item-holder'
		);

		if($params['highlighted'] === 'yes') {
			$params['item_classes'][] = 'edgtf-pi-highlighted';
		}

		$params['image_style'] = '';
		if($params['image'] != ''){
			$params['image_style'] = 'background-image: url(' . wp_get_attachment_url($params['image']) . ')';

		}

		$params['number_style'] = '';
		if($params['number_color'] != ''){
			$params['number_style'] = 'color:' . $params['number_color'];
		}

		$params['number_holder_style'] = '';
//		if($params['number_hover_color'] != ''){
//			$params['number_holder_style'] = 'color:' . $params['number_hover_color'];
//		}

		return ratio_edge_get_shortcode_module_template_part('templates/process-item-template', 'process', '', $params);
	}

}