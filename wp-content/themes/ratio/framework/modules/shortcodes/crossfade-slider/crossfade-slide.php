<?php
namespace RatioEdge\Modules\Shortcodes\CrossfadeSlide;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class CrossfadeSlide implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_crossfade_slide';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Crossfade Slide', 'ratio'),
					'base' => $this->base,
					'as_child'	=> array('only' => 'edgtf_crossfade_slider'),
					'category' => 'by EDGE',
					'icon' => 'icon-wpb-crossfade-slide extended-custom-icon',
					'show_settings_on_create'	=> true,
					'params' => array(
						array(
						    'type'        => 'attach_image',
						    'heading'     => 'Slide Image',
						    'param_name'  => 'slide_image',
						    'value'       => '',
							'description'	=> 'Select image from media library'
						),
					)
				)
			);		
		}
	}

		public function render($atts, $content = null) {
		
			$args = array(
				'slide_image' => '',
			);
			$params = shortcode_atts($args, $atts);
			extract($params);

			$html = ratio_edge_get_shortcode_module_template_part('templates/crossfade-slide-template', 'crossfade-slider', '', $params);

			return $html;

		}

}
