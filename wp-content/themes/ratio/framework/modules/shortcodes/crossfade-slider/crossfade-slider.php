<?php
namespace RatioEdge\Modules\Shortcodes\CrossfadeSlider;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class CrossfadeSlider implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_crossfade_slider';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name'						=> esc_html__('Edge Crossfade Slider', 'ratio'),
			'base'						=> $this->base,
			'icon'						=> 'icon-wpb-crossfade-slider extended-custom-icon',
			'category'					=> 'by EDGE',
			'as_parent'					=> array('only' => 'edgtf_crossfade_slide'),
			'js_view'					=> 'VcColumnView',
			'show_settings_on_create'	=> true,
			'params'					=> array(
				array(
				    'type'        => 'textfield',
				    'heading'     => 'Title',
				    'param_name'  => 'title',
				    'admin_label' => true
				),
				array(
				    'type'        => 'textfield',
				    'heading'     => 'Subtitle',
				    'param_name'  => 'subtitle',
				    'admin_label' => true
				),
				array(
				    'type'        => 'textfield',
				    'heading'     => 'Transition interval',
				    'param_name'  => 'transition_interval',
				    'description'  => 'Time between slide transitions.',
				    'admin_label' => true
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
				    'heading'     => 'Background Color',
				    'param_name'  => 'background_color',
				    'group'	=> 'Style'
				),
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'title' => '',
			'subtitle' => '',
			'title_color' => '',
			'subtitle_color' => '',
			'background_color' => '',
			'transition_interval' => ''
		);
		$params = shortcode_atts($args, $atts);

		$params['sliderStyles'] = $this->getSliderStyles($params);
		$params['sliderData'] = $this->getSliderData($params);
		$params['titleStyles'] = $this->getTitleStyles($params);
		$params['subtitleStyles'] = $this->getSubtitleStyles($params);

		extract($params);

		$html = '';

		$html .= '<div class="edgtf-crossfade-slider">';
		$html .= '<div class="edgtf-crossfade-slider-images" '. ratio_edge_get_inline_style($sliderStyles) .''. ratio_edge_get_inline_attrs($sliderData) .'>';
			$html .= do_shortcode($content);
		$html .= '</div>'; //crossfade slider images close
		$html .= '<div class="edgtf-crossfade-slider-text">';
		if ($title != '') {
			$html .= '<h5 class="edgtf-crossfade-slider-title" '. ratio_edge_get_inline_style($titleStyles) .'>'. esc_attr($title).'</h5>';
		} if ($subtitle != '') {
			$html .= '<h6 class="edgtf-crossfade-slider-subtitle" '. ratio_edge_get_inline_style($subtitleStyles) .'>'. esc_attr($subtitle).'</h6>';
		}	
		$html .= '</div>'; //crossfade slider text close
		$html .= '</div>'; //crossfade slider close

		return $html;

	}


	/**
     * Generates slider styles
     *
     * @param $params
     *
     * @return array
     */
	private function getSliderStyles($params){
		$sliderStyle = array();

        if(!empty($params['background_color'])) {
            $sliderStyle[] = 'background-color: '.$params['background_color'];
        }

        return implode(';', $sliderStyle);
	}

	/**
     * Generates slider data
     *
     * @param $params
     *
     * @return array
     */
	private function getSliderData($params){
		$sliderData = array();

        if(!empty($params['background_color'])) {
			$sliderData['data-transition-interval'] = ($params['transition_interval'] !== '') ? $params['transition_interval'] : '';
        }

        return $sliderData;
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
