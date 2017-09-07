<?php
namespace RatioEdge\Modules\Shortcodes\CallToAction;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class CallToAction
 */
class CallToAction implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_call_to_action';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see edgt_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		$call_to_action_button_icons_array = array();
		$call_to_action_button_IconCollections = ratio_edge_icon_collections()->iconCollections;
		foreach($call_to_action_button_IconCollections as $collection_key => $collection) {

			$call_to_action_button_icons_array[] = array(
				'type' => 'dropdown',
				'heading' => 'Button Icon',
				'param_name' => 'button_'.$collection->param,
				'value' => $collection->getIconsArray(),
				'save_always' => true,
				'group' => 'Button Options',
				'dependency' => Array('element' => 'button_icon_pack', 'value' => array($collection_key))
			);

		}

		vc_map( array(
				'name' => esc_html__('Edge Call To Action', 'ratio'),
				'base' => $this->getBase(),
				'category' => 'by EDGE',
				'icon' => 'icon-wpb-call-to-action extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array_merge(
					array(
						array(
							'type'          => 'dropdown',
							'heading'       => 'Full Width',
							'param_name'    => 'full_width',
							'admin_label'	=> true,
							'value'         => array(
								'Yes'       => 'yes',
								'No'        => 'no'
							),
							'save_always' 	=> true,
							'description'   => '',
						),
						array(
							'type'          => 'dropdown',
							'heading'       => 'Content in grid',
							'param_name'    => 'content_in_grid',
							'value'         => array(
								'Yes'       => 'yes',
								'No'        => 'no'
							),
							'save_always'	=> true,
							'description'   => '',
							'dependency'    => array('element' => 'full_width', 'value' => 'yes')
						),
						array(
							'type'          => 'dropdown',
							'heading'       => 'Text and Button Position',
							'param_name'    => 'tb_position',
							'value'         => array(
								'Together'	=> 'together',
								'Separated' => 'separated'
							),
							'save_always' 	=> true,
							'description'   => '',
						),
						array(
							'type'          => 'dropdown',
							'heading'       => 'Text and Button Align',
							'param_name'    => 'together_align',
							'value'         => array(
								'Center'	=> 'center',
								'Left'		=> 'left',
								'Right'		=> 'right'
							),
							'save_always' 	=> true,
							'description'   => '',
							'dependency'    => array('element' => 'tb_position', 'value' => 'together')
						),
						array(
							'type'          => 'dropdown',
							'heading'       => 'Grid size',
							'param_name'    => 'grid_size',
							'value'         => array(
								'75/25'     => '75',
								'50/50'     => '50',
								'66/33'     => '66'
							),
							'save_always' 	=> true,
							'description'   => '',
							'dependency'    => array('element' => 'tb_position', 'value' => 'separated')
						),
						array(
							'type' 			=> 'dropdown',
							'heading'		=> 'Type',
							'param_name' 	=> 'type',
							'admin_label' 	=> true,
							'value' 		=> array(
								'Normal' 	=> 'normal',
								'With Icon' => 'with-icon',
							),
							'save_always' 	=> true,
							'description' 	=> ''
						)
					),
					ratio_edge_icon_collections()->getVCParamsArray(array('element' => 'type', 'value' => array('with-icon'))),
					array(
						array(
							'type' 			=> 'textfield',
							'heading' 		=> 'Icon Size (px)',
							'param_name' 	=> 'icon_size',
							'description' 	=> '',
							'dependency' 	=> Array('element' => 'type', 'value' => array('with-icon')),
							'group'			=> 'Design Options',
						),
						array(
							'type' 			=> 'textfield',
							'heading' 		=> 'Box Padding (top right bottom left) px',
							'param_name' 	=> 'box_padding',
							'admin_label' 	=> true,
							'description' 	=> 'Default padding is 20px on all sides',
							'group'			=> 'Design Options'
						),
						array(
							'type' 			=> 'colorpicker',
							'heading' 		=> 'Background Color',
							'param_name' 	=> 'background_color',
							'admin_label' 	=> true,
							'group'			=> 'Design Options'
						),
						array(
							'type' 			=> 'colorpicker',
							'heading' 		=> 'Background Second (Gradient) Color',
							'param_name' 	=> 'background_sec_color',
							'admin_label' 	=> true,
							'group'			=> 'Design Options'
						),
						array(
							'type' 			=> 'dropdown',
							'heading' 		=> 'Inset Border',
							'param_name' 	=> 'inset_border',
							'value' 		=> array(
								'No' 		=> 'no',
								'Yes' 		=> 'yes'
							),
							'admin_label' 	=> true,
							'description' 	=> '',
							'group'			=> 'Design Options',
						),
						array(
							'type' 			=> 'colorpicker',
							'heading' 		=> 'Inset Border Color',
							'param_name' 	=> 'inset_border_color',
							'admin_label' 	=> true,
							'group'			=> 'Design Options',
							'dependency'	=> array('element' => 'inset_border', 'value' => array('yes'))
						),
						array(
							'type' 			=> 'textfield',
							'heading' 		=> 'Default Text Font Size (px)',
							'param_name' 	=> 'text_size',
							'description' 	=> 'Font size for p tag',
							'group'			=> 'Design Options',
						),
						array(
							'type' 			=> 'colorpicker',
							'heading' 		=> 'Text Color',
							'param_name' 	=> 'text_color',
							'group'			=> 'Design Options',
						),
						array(
							'type' 			=> 'dropdown',
							'heading' 		=> 'Show Button',
							'param_name' 	=> 'show_button',
							'value' 		=> array(
								'Yes' 		=> 'yes',
								'No' 		=> 'no'
							),
							'admin_label' 	=> true,
							'save_always' 	=> true,
							'description' 	=> 'For options go to Button Options tab'
						),
						array(
							'type' => 'textfield',
							'heading' => 'Button Text',
							'param_name' => 'button_text',
							'admin_label' 	=> true,
							'description' => 'Default text is "button"',
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'textfield',
							'heading' => 'Button Link',
							'param_name' => 'button_link',
							'description' => '',
							'admin_label' 	=> true,
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Button Target',
							'param_name' => 'button_target',
							'value' => array(
								'' => '',
								'Self' => '_self',
								'Blank' => '_blank'
							),
							'description' => '',
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Button Icon Pack',
							'param_name' => 'button_icon_pack',
							'value' => array_merge(array('No Icon' => ''),ratio_edge_icon_collections()->getIconCollectionsVC()),
							'save_always' => true,
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						)
					),
					$call_to_action_button_icons_array,
					array(
						array(
							'type' => 'textarea_html',
							'admin_label' => true,
							'heading' => 'Content',
							'param_name' => 'content',
							'value' => '<p>'.'I am test text for Call to action.'.'</p>',
							'description' => ''
						)
					),
					array(
						array(
							'type' => 'dropdown',
							'heading' => 'Button Position',
							'param_name' => 'button_position',
							'value' => array(
								'Default/right' => '',
								'Center' => 'center',
								'Left' => 'left'
							),
							'description' => 'Works only with separated text and button position',
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes'))
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Button Size',
							'param_name' => 'button_size',
							'value' => array(
								'Default' => '',
								'Small' => 'small',
								'Medium' => 'medium',
								'Large' => 'large',
								'Extra Large' => 'big_large'
							),
							'description' => '',
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes')),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => 'Button Type',
							'param_name'  => 'button_type',
							'value'       => array(
								'Default' => '',
								'Outline' => 'outline',
								'Solid'   => 'solid',
								'Gradient'=> 'gradient'
							),
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes')),
						),
						array(
							'type' => 'colorpicker',
							'heading' => 'Button Text Color',
							'param_name' => 'button_color',
							'description' => '',
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes')),
						),
						array(
							'type' => 'colorpicker',
							'heading' => 'Button Text Hover Color',
							'param_name' => 'button_hover_color',
							'description' => '',
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes')),
						),
						array(
							'type' => 'colorpicker',
							'heading' => 'Button Border Color',
							'param_name' => 'button_border_color',
							'description' => '',
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes')),
						),
						array(
							'type' => 'colorpicker',
							'heading' => 'Button Border Hover Color',
							'param_name' => 'button_border_hover_color',
							'description' => '',
							'group' => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes')),
						),
	                    array(
	                        'type'        => 'colorpicker',
	                        'heading'     => 'Button Background Color',
	                        'param_name'  => 'button_background_color',
	                        'dependency'  => array('element' => 'button_type', 'value' => array('solid','gradient')),
	                        'group'       => 'Button Options'
	                    ),
						array(
							'type'        => 'colorpicker',
							'heading'     => 'Button Background Second(Gradient) Color',
							'param_name'  => 'button_background_second_color',
							'dependency'  => array('element' => 'button_type', 'value' => array('gradient')),
							'group'       => 'Button Options'
						),
	                    array(
	                        'type'        => 'colorpicker',
	                        'heading'     => 'Button Hover Background Color',
	                        'param_name'  => 'button_hover_background_color',
	                        'group'       => 'Button Options',
							'dependency' => array('element' => 'show_button', 'value' => array('yes')),
	                    ),
					)
				)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'type' => 'normal',
			'full_width' => 'yes',
			'content_in_grid' => 'yes',
			'tb_position' => 'together',
			'together_align' => 'center',
			'grid_size' => '75',
			'icon_size' => '',
			'box_padding' => '20px',
			'text_size' => '',
			'text_color' => '',
			'show_button' => 'yes',
			'button_position' => 'right',
			'button_size' => '',
			'button_link' => '',
			'button_text' => 'button',
			'button_target' => '',
			'button_icon_pack' => '',
			'button_type' => 'outline',
			'button_color' => '',
			'button_hover_color' => '',
			'button_border_color' => '',
			'button_border_hover_color' => '',
			'button_background_color' => '',
			'button_background_second_color' => '',
			'button_hover_background_color' => '',
			'background_color' => '',
			'background_sec_color' => '',
			'inset_border' => 'no',
			'inset_border_color' => '',
		);

		$call_to_action_icons_form_fields = array();

		foreach (ratio_edge_icon_collections()->iconCollections as $collection_key => $collection) {

			$call_to_action_icons_form_fields['button_' . $collection->param ] = '';

		}

		$args = array_merge($args, ratio_edge_icon_collections()->getShortcodeParams(),$call_to_action_icons_form_fields);

		$params = shortcode_atts($args, $atts);

		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
		$params['content'] = $content;
		$params['text_wrapper_classes'] = $this->getTextWrapperClasses($params);
		$params['wrapper_styles'] = $this->getCallToActionWrapperStyles($params);
		$params['content_styles'] = $this->getContentStyles($params);
		$params['row_classes'] = $this->getRowClasses($params);
		$params['call_to_action_styles'] = $this->getCallToActionStyles($params);
		$params['icon'] = $this->getCallToActionIcon($params);
		$params['button_parameters'] = $this->getButtonParameters($params);
		$params['inset'] = $this->getInsetBorder($params);

		//Get HTML from template
		$html = ratio_edge_get_shortcode_module_template_part('templates/call-to-action-template', 'calltoaction', '', $params);

		return $html;

	}

	/**
	 * Return Classes for Call To Action text wrapper
	 *
	 * @param $params
	 * @return string
	 */
	private function getTextWrapperClasses($params) {
		return ( $params['show_button'] == 'yes') ? 'edgtf-call-to-action-column1 edgtf-call-to-action-cell' : '';
	}

	/**
	 * Return CSS styles for Call To Action Wrapper shortcode
	 *
	 * @param $params
	 * @return string
	 */
	private function getCallToActionWrapperStyles($params) {
		$wrapper_styles = array();

	
        $background_color = $params['background_color'];
        $background_color_sec = $params['background_sec_color'];

        if($background_color !== '' && $background_color_sec !== '') {
            $wrapper_styles[] = ratio_edge_inline_background_gradient($background_color,$background_color_sec);
        }
        elseif ($background_color !== '') {
            $wrapper_styles[] = 'background: none';
            $wrapper_styles[] = 'background-color: '.$background_color;
        }

		return implode(';', $wrapper_styles);
	}

	/**
	 * Return CSS styles for Call To Action Icon
	 *
	 * @param $params
	 * @return string
	 */
	private function getIconStyles($params) {
		$icon_style = array();

		if ($params['icon_size'] !== '') {
			$icon_style[] = 'font-size: ' . $params['icon_size'] . 'px';
		}

		return implode(';', $icon_style);
	}

	/**
	 * Return CSS styles for Call To Action Content
	 *
	 * @param $params
	 * @return string
	 */
	private function getContentStyles($params) {
		$content_styles = array();

		if ($params['text_size'] !== '') {
			$content_styles[] = 'font-size: ' . $params['text_size'] . 'px';
		}

		if ($params['text_color'] !== '') {
			$content_styles[] = 'color: ' . $params['text_color'];
		}

		return implode(';', $content_styles);
	}


	/**
	 * Return Classes for Call To Action row
	 *
	 * @param $params
	 * @return string
	 */
	private function getRowClasses($params) {
		$row_classes = '';

		if ($params['tb_position'] == 'together'){
			$row_classes .= 'edgtf-call-to-action-together';
		}
		else{
			$row_classes .= 'edgtf-call-to-action-separate ';
			if ($params['grid_size'] == '75'){
				$row_classes .= 'edgtf-call-to-action-row-75-25';
			}
			elseif ($params['grid_size'] == '66'){
				$row_classes .= 'edgtf-call-to-action-row-66-33';
			}
			else{
				$row_classes .= 'edgtf-call-to-action-row-50-50';
			}
			$row_classes .= ' clearfix';
		}
		return $row_classes;
	}

	/**
	 * Return CSS styles for Call To Action shortcode
	 *
	 * @param $params
	 * @return string
	 */
	private function getCallToActionStyles($params) {
		$call_to_action_styles = array();

		if ($params['box_padding'] != '') {
			$call_to_action_styles[] = 'padding: ' . $params['box_padding'];
		}

		if ($params['tb_position'] == 'together' && $params['together_align'] !== ''){
			$call_to_action_styles[] = 'text-align:'.$params['together_align'];
		}

		return implode(';', $call_to_action_styles);
	}

	/**
	 * Return Icon for Call To Action Shortcode
	 *
	 * @param $params
	 * @return mixed
	 */
	private function getCallToActionIcon($params) {

		$icon = ratio_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$iconStyles = array();
		$iconStyles['icon_attributes']['style'] = $this->getIconStyles($params);
		$call_to_action_icon = '';
		if(!empty($params[$icon])){			
			$call_to_action_icon = ratio_edge_icon_collections()->renderIcon( $params[$icon], $params['icon_pack'], $iconStyles );
		}
		return $call_to_action_icon;

	}
	
	private function getButtonParameters($params) {
		$button_params_array = array();
		
		if(!empty($params['button_link'])) {
			$button_params_array['link'] = $params['button_link'];
		}
		
		if(!empty($params['button_size'])) {
			$button_params_array['size'] = $params['button_size'];
		}
		
		if(!empty($params['button_type'])) {
			$button_params_array['type'] = $params['button_type'];
		}
		
		if(!empty($params['button_icon_pack'])) {
			$button_params_array['icon_pack'] = $params['button_icon_pack'];
			$iconPackName = ratio_edge_icon_collections()->getIconCollectionParamNameByKey($params['button_icon_pack']);
			$button_params_array[$iconPackName] = $params['button_'.$iconPackName];		
		}
				
		if(!empty($params['button_target'])) {
			$button_params_array['target'] = $params['button_target'];
		}
		
		if(!empty($params['button_text'])) {
			$button_params_array['text'] = $params['button_text'];
		}

		if(!empty($params['button_color'])) {
			$button_params_array['color'] = $params['button_color'];
		}

		if(!empty($params['button_hover_color'])) {
			$button_params_array['hover_color'] = $params['button_hover_color'];
		}

		if(!empty($params['button_border_color'])) {
			$button_params_array['border_color'] = $params['button_border_color'];
		}
		
		if(!empty($params['button_border_hover_color'])) {
			$button_params_array['hover_border_color'] = $params['button_border_hover_color'];
		}
		
		if(!empty($params['button_background_color'])) {
			$button_params_array['background_color'] = $params['button_background_color'];
		}
		
		if(!empty($params['button_background_second_color'])) {
			$button_params_array['background_second_color'] = $params['button_background_second_color'];
		}
		
		if(!empty($params['button_hover_background_color'])) {
			$button_params_array['hover_background_color'] = $params['button_hover_background_color'];
		}

		return $button_params_array;
	}

	private function getInsetBorder($params){
		$border_inset = '';

		if ($params['inset_border'] == 'yes'){
			$style = '';
			if ($params['inset_border_color'] !== ''){
				$style = 'border-color:' .$params['inset_border_color'];
			}
			$border_inset .= '<div class="edgtf-call-to-action-inset" '.ratio_edge_get_inline_style($style).'></div>';
		}

		return $border_inset;
	}
}