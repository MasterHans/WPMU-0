<?php
namespace RatioEdge\Modules\Shortcodes\NumberedTitle;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class SectionSubtitle
 */
class NumberedTitle implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_numbered_title';

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

		vc_map( array(
				'name' => esc_html__('Numbered Title', 'ratio'),
				'base' => $this->getBase(),
				'category' => 'by EDGE',
				'icon' => 'icon-wpb-numbered-title extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						'type'			=> 'textfield',
						'heading'		=> 'Number',
						'param_name'	=> 'number',
						'value'			=> '',
						'admin_label'	=> true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => 'Number Color',
						'param_name'  => 'number_color'
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> 'Title',
						'param_name'	=> 'title',
						'value'			=> '',
						'admin_label'	=> true
					),
					array(
						'type' 			=> 'dropdown',
						'heading'		=> 'Title Tag',
						'param_name'	=> 'title_tag',
						'value'			=> array(
							'' => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6'
						)
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => 'Title Color',
						'param_name'  => 'title_color'
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> 'Space Between (px)',
						'param_name'	=> 'title_number_space',
						'value'			=> '',
						'description'   => 'Enter spacing between number and title in px'
					)

				)
		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'number'			=> '',
			'number_color'		=> '',
			'title'				=> '',
			'title_color'		=> '',
			'title_tag'			=> 'h3',
			'subtitle'			=> '',
			'subtitle_color'	=> '',
			'title_number_space'=> ''
		);

		$params = shortcode_atts($args, $atts);

		$params['number_style'] = '';
		$params['title_style'] = array();
		$params['subtitle_style'] = array();

		if($params['number_color'] != '') {
			$params['number_style'] = 'color:' . $params['number_color'] . ';';
		}

		if($params['title_number_space'] !== ''){
			$params['number_style'] .= 'padding-right:' . ratio_edge_filter_px($params['title_number_space']) . 'px';
		}

		if($params['title_color'] != '') {
			$params['title_style'][] = 'color:' . $params['title_color'];
		}

		//Get HTML from template
		$html = ratio_edge_get_shortcode_module_template_part('templates/numbered-title-template', 'numbered-title', '', $params);

		return $html;

	}


}