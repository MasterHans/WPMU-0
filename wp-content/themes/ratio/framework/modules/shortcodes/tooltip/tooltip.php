<?php
namespace RatioEdge\Modules\Shortcodes\Tooltip;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class Tooltip implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_tooltip';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name'						=> esc_html__('Edge Tooltip', 'ratio'),
			'base'						=> $this->base,
			'icon'						=> 'icon-wpb-tooltip extended-custom-icon',
			'category'					=> 'by EDGE',
			'as_parent'					=> array('only' => 'edgtf_crossfade_slide'),
			'show_settings_on_create'	=> true,
			'params'					=> array(
				array(
				    'type'        => 'textfield',
				    'heading'     => 'Tooltip Title',
				    'param_name'  => 'tooltip_title',
				    'admin_label' => true,
				),
				array(
				    'type'        => 'textfield',
				    'heading'     => 'Tooltip Subtitle',
				    'param_name'  => 'tooltip_subtitle',
				    'admin_label' => true,
				),
				array(
				    'type'        => 'colorpicker',
				    'heading'     => 'Icon Color',
				    'param_name'  => 'icon_color',
				    'group'	=> 'Style'
				),
				array(
				    'type'        => 'colorpicker',
				    'heading'     => 'Icon Background Color',
				    'param_name'  => 'icon_background_color',
				    'group'	=> 'Style'
				),
				array(
				    'type'        => 'colorpicker',
				    'heading'     => 'Title Color',
				    'param_name'  => 'title_color',
				    'group'	=> 'Style'
				),
				array(
				    'type'        => 'colorpicker',
				    'heading'     => 'Subtitle Color',
				    'param_name'  => 'subtitle_color',
				    'group'	=> 'Style'
				),
				array(
				    'type'        => 'colorpicker',
				    'heading'     => 'Tooltip Background Color',
				    'param_name'  => 'background_color',
				    'group'	=> 'Style'
				),
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'tooltip_title' => '',
			'tooltip_subtitle' => '',
			'icon_color' => '',
			'icon_background_color' => '',
			'title_color' => '',
			'subtitle_color' => '',
			'background_color' => '',
		);
		$params = shortcode_atts($args, $atts);

		$params['tooltipStyles'] = $this->getTooltipStyles($params);
		$params['tooltipIconStyles'] = $this->getTooltipIconStyles($params);
		$params['titleStyles'] = $this->getTitleStyles($params);
		$params['subtitleStyles'] = $this->getSubtitleStyles($params);

		extract($params);

		$html = '';
		$html .= '<div class="edgtf-tooltip-outer">';
		$html .= '<div class="edgtf-tooltip-icon-outer">';
		$html .= '<div class="edgtf-tooltip-icon" '. ratio_edge_get_inline_style($tooltipIconStyles) .'>';
		$html .= '<span>i</span>';
		$html .= '</div>';
		$html .= '</div>'; //tooltip icon outer close
		$html .= '<div class="edgtf-tooltip" '. ratio_edge_get_inline_style($tooltipStyles) .'>';
		$html .= '<h5 class="edgtf-tooltip-title" '. ratio_edge_get_inline_style($titleStyles) .'>'. esc_attr($tooltip_title) .'</h5>';	
		$html .= '<p class="edgtf-tooltip-subtitle" '. ratio_edge_get_inline_style($subtitleStyles) .'>'. esc_attr($tooltip_subtitle) .'</p>';	
		$html .= '</div>'; //tooltip close
		$html .= '</div>'; //tooltip outer close

		return $html;

	}


	/**
     * Generates tooltip styles
     *
     * @param $params
     *
     * @return array
     */
	private function getTooltipStyles($params){
		$tooltipStyles = array();

        if(!empty($params['background_color'])) {
            $tooltipStyles[] = 'background-color: '.$params['background_color'];
        }

        return implode(';', $tooltipStyles);
	}

	/**
     * Generates tooltip styles
     *
     * @param $params
     *
     * @return array
     */
	private function getTooltipIconStyles($params){
		$tooltipIconStyles = array();

        if(!empty($params['icon_color'])) {
            $tooltipIconStyles[] = 'color: '.$params['icon_color'];
        }

        if(!empty($params['icon_background_color'])) {
            $tooltipIconStyles[] = 'background-color: '.$params['icon_background_color'];
        }

        return implode(';', $tooltipIconStyles);
	}

	/**
     * Generates title styles
     *
     * @param $params
     *
     * @return array
     */
	private function getTitleStyles($params){
		$titleStyles = array();

        if(!empty($params['title_color'])) {
            $titleStyles[] = 'color: '.$params['title_color'];
        }

        return implode(';', $titleStyles);
	}

	/**
     * Generates subtitle styles
     *
     * @param $params
     *
     * @return array
     */
	private function getSubtitleStyles($params){
		$subtitleStyles = array();

        if(!empty($params['subtitle_color'])) {
            $subtitleStyles[] = 'color: '.$params['subtitle_color'];
        }

        return implode(';', $subtitleStyles);
	}

}
