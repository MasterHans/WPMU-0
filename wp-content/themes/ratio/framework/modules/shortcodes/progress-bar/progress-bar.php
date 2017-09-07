<?php
namespace RatioEdge\Modules\Shortcodes\ProgressBar;

use RatioEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Edge Progress Bar', 'ratio'),
			'base' => $this->base,
			'icon' => 'icon-wpb-progress-bar extended-custom-icon',
			'category' => 'by EDGE',
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => 'Title',
					'param_name' => 'title',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
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
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => 'Percentage',
					'param_name' => 'percent',
					'description' => ''
				),	
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => 'Percentage Type',
					'param_name' => 'percentage_type',
					'value' => array(
						'Floating'  => 'floating',
						'Static' => 'static'
					),
					'dependency' => Array('element' => 'percent', 'not_empty' => true)
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Bar Inactive Color',
					'param_name' => 'inactive_color',
					'description' => ''
				)
			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
            'title' => '',
            'title_tag' => 'h6',
            'percent' => '100',
            'percentage_type' => 'floating',
            'inactive_color' => ''
        );
		$params = shortcode_atts($args, $atts);

		//Extract params for use in method
		extract($params);
		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
		
		$params['percentage_classes'] = $this->getPercentageClasses($params);
		$params['percentage_inactive_style'] = $this->getProgressInactiveStyle($params);

        //init variables
		$html = ratio_edge_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
		
	}
	/**
    * Generates css classes for progress bar
    *
    * @param $params
    *
    * @return array
    */
	private function getPercentageClasses($params){
		
		$percentClassesArray = array();
		
		if(!empty($params['percentage_type'])){
			
			if($params['percentage_type'] == 'floating'){
				
				$percentClassesArray[] = 'edgtf-floating';


			}
			elseif($params['percentage_type'] == 'static'){
				
				$percentClassesArray[] = 'edgtf-static';
				
			}
		}
		return implode(' ', $percentClassesArray);
	}

	/**
    * Generates css style for progress bar
    *
    * @param $params
    *
    * @return array
    */
	private function getProgressInactiveStyle($params){
		
		$progress_inactive_style = '';
		
		if($params['inactive_color'] != ''){
			$progress_inactive_style .= 'background-color:'.$params['inactive_color'];
		}
		return $progress_inactive_style;
	}
}