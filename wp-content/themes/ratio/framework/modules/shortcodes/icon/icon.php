<?php
namespace RatioEdge\Modules\Shortcodes\Icon;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Icon
 * @package RatioEdge\Modules\Shortcodes\Icon
 */
class Icon implements ShortcodeInterface {


    /**
     * Icon constructor.
     */
    public function __construct() {
        $this->base = 'edgtf_icon';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     *
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Edge Icon', 'ratio'),
            'base'                      => $this->base,
            'category'                  => 'by EDGE',
            'icon'                      => 'icon-wpb-icons extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                \RatioEdgeIconCollections::get_instance()->getVCParamsArray(),
                array(
                    array(
                        'type'        => 'dropdown',
                        'heading'     => 'Size',
                        'admin_label' => true,
                        'param_name'  => 'size',
                        'value'       => array(
                            'Tiny'       => 'edgtf-icon-tiny',
                            'Small'      => 'edgtf-icon-small',
                            'Medium'     => 'edgtf-icon-medium',
                            'Large'      => 'edgtf-icon-large',
                            'Very Large' => 'edgtf-icon-huge'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'admin_label' => true,
                        'heading'     => 'Custom Size (px)',
                        'param_name'  => 'custom_size',
                        'value'       => ''
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => 'Type',
                        'param_name'  => 'type',
                        'admin_label' => true,
                        'value'       => array(
                            'Normal' => 'normal',
                            'Circle' => 'circle',
                            'Square' => 'square'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Border radius',
                        'param_name'  => 'border_radius',
                        'description' => esc_html__('Please insert border radius(Rounded corners) in px. For example: 4 ', 'ratio'),
                        'dependency'  => array('element' => 'type', 'value' => array('square'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Shape Size (px)',
                        'param_name'  => 'shape_size',
                        'admin_label' => true,
                        'value'       => '',
                        'description' => '',
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Icon Color',
                        'param_name'  => 'icon_color',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Border Color',
                        'param_name'  => 'border_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Border Width',
                        'param_name'  => 'border_width',
                        'admin_label' => true,
                        'description' => 'Enter just number. Omit pixels',
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Background Color',
                        'param_name'  => 'background_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Background Second (Gradient) Color',
                        'param_name'  => 'background_sec_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square')),
                        'description' => 'Enter this color if you want to create gradient background'
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Hover Icon Color',
                        'param_name'  => 'hover_icon_color',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Hover Border Color',
                        'param_name'  => 'hover_border_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Hover Background Color',
                        'param_name'  => 'hover_background_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => 'Hover Background Second (Gradient) Color',
                        'param_name'  => 'hover_background_sec_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square')),
                        'description' => 'Enter this color if you want to create gradient background'
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Margin',
                        'param_name'  => 'margin',
                        'admin_label' => true,
                        'description' => 'Margin (top right bottom left)'
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => 'Icon Animation',
                        'param_name'  => 'icon_animation',
                        'admin_label' => true,
                        'value'       => array(
                            'No'  => '',
                            'Yes' => 'yes'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Icon Animation Delay (ms)',
                        'param_name'  => 'icon_animation_delay',
                        'value'       => '',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'icon_animation', 'value' => 'yes')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => 'Link',
                        'param_name'  => 'link',
                        'value'       => '',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'checkbox',
                        'heading'     => 'Use Link as Anchor',
                        'value'       => array('Use this icon as Anchor?' => 'yes'),
                        'param_name'  => 'anchor_icon',
                        'admin_label' => true,
                        'description' => 'Check this box to use icon as anchor link (eg. #contact)',
                        'dependency'  => Array('element' => 'link', 'not_empty' => true)
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => 'Target',
                        'param_name'  => 'target',
                        'admin_label' => true,
                        'value'       => array(
                            'Self'  => '_self',
                            'Blank' => '_blank'
                        ),
                        'save_always' => true,
                        'dependency'  => array('element' => 'link', 'not_empty' => true)
                    )
                )
            )
        ));
    }

    /**
     * Renders shortcode's HTML
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size'                   => '',
            'custom_size'            => '',
            'type'                   => 'normal',
            'border_radius'          => '',
            'shape_size'             => '',
            'icon_color'             => '',
            'border_color'           => '',
            'border_width'           => '',
            'background_color'       => '',
            'background_sec_color'   => '',
            'hover_icon_color'       => '',
            'hover_border_color'     => '',
            'hover_background_color' => '',
            'hover_background_sec_color' => '',
            'margin'                 => '',
            'icon_animation'         => '',
            'icon_animation_delay'   => '',
            'link'                   => '',
            'anchor_icon'            => '',
            'target'                 => ''
        );

        $default_atts = array_merge($default_atts, ratio_edge_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $iconPackName = ratio_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

        //generate icon holder classes
        $iconHolderClasses = array('edgtf-icon-shortcode', $params['type']);

        if($params['icon_animation'] == 'yes') {
            $iconHolderClasses[] = 'edgtf-icon-animation';
        }

        if($params['custom_size'] == '') {
            $iconHolderClasses[] = $params['size'];
        }

        //prepare params for template
        $params['icon']							= $params[$iconPackName];
        $params['icon_holder_classes']			= $iconHolderClasses;
        $params['icon_holder_styles']			= $this->generateIconHolderStyles($params);
        $params['background_holder_styles']		= $this->generateBackgroundHolderStyles($params);
        $params['background_hover_holder_styles']= $this->generateBackgroundHoverHolderStyles($params);
        $params['icon_holder_data']				= $this->generateIconHolderData($params);
        $params['icon_params']					= $this->generateIconParams($params);
        $params['icon_animation_holder']		= isset($params['icon_animation']) && $params['icon_animation'] == 'yes';
        $params['icon_animation_holder_styles'] = $this->generateIconAnimationHolderStyles($params);
		$params['link_class']					= $this->getLinkClass($params);

        $html = ratio_edge_get_shortcode_module_template_part('templates/icon', 'icon', '', $params);

        return $html;
    }

    /**
     * Generates icon parameters array
     *
     * @param $params
     *
     * @return array
     */
    private function generateIconParams($params) {
        $iconParams = array('icon_attributes' => array());

        $iconParams['icon_attributes']['style'] = $this->generateIconStyles($params);
        $iconParams['icon_attributes']['class'] = 'edgtf-icon-element';

        return $iconParams;
    }

    /**
     * Generates icon styles array
     *
     * @param $params
     *
     * @return string
     */
    private function generateIconStyles($params) {
        $iconStyles = array();

        if(!empty($params['icon_color'])) {
            $iconStyles[] = 'color: '.$params['icon_color'];
        }

        if(($params['type'] !== 'normal' && !empty($params['shape_size'])) ||
           ($params['type'] == 'normal')
        ) {
            if(!empty($params['custom_size'])) {
                $iconStyles[] = 'font-size:'.ratio_edge_filter_px($params['custom_size']).'px';
            }
        }

        return implode(';', $iconStyles);
    }

    /**
     * Generates icon holder styles for circle and square icon type
     *
     * @param $params
     *
     * @return array
     */
    private function generateIconHolderStyles($params) {
        $iconHolderStyles = array();

		if(isset($params['margin']) && $params['margin'] !== '') {
			$iconHolderStyles[] = 'margin: '.$params['margin'];
		}

        //generate styles attribute only if type isn't normal
        if(isset($params['type']) && $params['type'] !== 'normal') {

            $shapeSize = '';
            if(!empty($params['shape_size'])) {
                $shapeSize = $params['shape_size'];
            } elseif(!empty($params['custom_size'])) {
                $shapeSize = $params['custom_size'];
            }

            if(!empty($shapeSize)) {
                $iconHolderStyles[] = 'width: '.ratio_edge_filter_px($shapeSize).'px';
                $iconHolderStyles[] = 'height: '.ratio_edge_filter_px($shapeSize).'px';
                $iconHolderStyles[] = 'line-height: '.ratio_edge_filter_px($shapeSize).'px';
            }
        }

        return $iconHolderStyles;
    }

    /**
     * Generates background holder styles for circle and square icon type
     *
     * @param $params
     *
     * @return array
     */
    private function generateBackgroundHolderStyles($params) {
        $background_holder_styles = array();

        //generate styles attribute only if type isn't normal
        if(isset($params['type']) && $params['type'] !== 'normal') {

            $background_color = $params['background_color'];
            $background_color_sec = $params['background_sec_color'];

            if($background_color !== '' && $background_color_sec !== '') {
                $background_holder_styles[] = ratio_edge_inline_background_gradient($background_color,$background_color_sec);
            }
            elseif ($background_color !== '') {
                $background_holder_styles[] = 'background-color: '.$background_color;
            }

            if(!empty($params['border_color']) && (isset($params['border_width']) && $params['border_width'] !== '')) {
				$background_holder_styles[] = 'border-style: solid';
				$background_holder_styles[] = 'border-color: '.$params['border_color'];
				$background_holder_styles[] = 'border-width: '.ratio_edge_filter_px($params['border_width']).'px';
			} else if(isset($params['border_width']) && $params['border_width'] !== ''){
				$background_holder_styles[] = 'border-style: solid';
				$background_holder_styles[] = 'border-width: '.ratio_edge_filter_px($params['border_width']).'px';
			} else if(!empty($params['border_color'])){
				$background_holder_styles[] = 'border-color: '.$params['border_color'];
			}

            if($params['type'] == 'square') {
                if(isset($params['border_radius']) && $params['border_radius'] !== '') {
                    $background_holder_styles[] = 'border-radius: '.ratio_edge_filter_px($params['border_radius']).'px';
                }
            }
        }

        return $background_holder_styles;
    }

    /**
     * Generates background hover holder styles for circle and square icon type
     *
     * @param $params
     *
     * @return array
     */
    private function generateBackgroundHoverHolderStyles($params) {
        $background_hover_holder_styles = array();

        //generate styles attribute only if type isn't normal
        if(isset($params['type']) && $params['type'] !== 'normal') {

            $background_color = $params['hover_background_color'];
            $background_color_sec = $params['hover_background_sec_color'];

            if($background_color !== '' && $background_color_sec !== '') {
                $background_hover_holder_styles[] = ratio_edge_inline_background_gradient($background_color,$background_color_sec);
            }
            elseif ($background_color !== '') {
                $background_hover_holder_styles[] = 'background: none';
                $background_hover_holder_styles[] = 'background-color: '.$background_color;
            }

            if(!empty($params['hover_border_color']) && (isset($params['border_width']) && $params['border_width'] !== '')) {
				$background_hover_holder_styles[] = 'border-style: solid';
				$background_hover_holder_styles[] = 'border-color: '.$params['hover_border_color'];
				$background_hover_holder_styles[] = 'border-width: '.ratio_edge_filter_px($params['border_width']).'px';
			} else if(isset($params['border_width']) && $params['border_width'] !== ''){
				$background_hover_holder_styles[] = 'border-style: solid';
				$background_hover_holder_styles[] = 'border-width: '.ratio_edge_filter_px($params['border_width']).'px';
			} else if(!empty($params['hover_border_color'])){
				$background_hover_holder_styles[] = 'border-color: '.$params['hover_border_color'];
			}

            if($params['type'] == 'square') {
                if(isset($params['border_radius']) && $params['border_radius'] !== '') {
                    $background_hover_holder_styles[] = 'border-radius: '.ratio_edge_filter_px($params['border_radius']).'px';
                }
            }
        }

        return $background_hover_holder_styles;
    }

    /**
     * Generates icon holder data attribute array
     *
     * @param $params
     *
     * @return array
     */
    private function generateIconHolderData($params) {
        $iconHolderData = array();

        if((isset($params['icon_animation']) && $params['icon_animation'] == 'yes')
           && (isset($params['icon_animation_delay']) && $params['icon_animation_delay'] !== '')
        ) {
            $iconHolderData['data-animation-delay'] = $params['icon_animation_delay'];
        }

        if(!empty($params['hover_icon_color'])) {
            $iconHolderData['data-hover-color'] = $params['hover_icon_color'];
        }

        if(!empty($params['icon_color'])) {
            $iconHolderData['data-color'] = $params['icon_color'];
        }

        return $iconHolderData;
    }

    private function generateIconAnimationHolderStyles($params) {
        $styles = array();

        if((isset($params['icon_animation']) && $params['icon_animation'] == 'yes')
           && (isset($params['icon_animation_delay']) && $params['icon_animation_delay'] !== '')
        ) {
            $styles[] = 'transition-delay: '.$params['icon_animation_delay'].'ms';
            $styles[] = '-webkit-transition-delay: '.$params['icon_animation_delay'].'ms';
            $styles[] = '-moz-transition-delay: '.$params['icon_animation_delay'].'ms';
            $styles[] = '-ms-transition-delay: '.$params['icon_animation_delay'].'ms';
        }

        return $styles;
    }

	private function getLinkClass($params) {
		$class = array();

		if(isset($params['anchor_icon']) && $params['anchor_icon'] == 'yes') {
			$class[] = 'edgtf-anchor';
		}

		return implode(' ', $class);
	}

}