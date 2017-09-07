<?php
namespace EdgeCore\PostTypes\Portfolio\Shortcodes;

use EdgeCore\Lib;

/**
 * Class PortfolioList
 * @package EdgeCore\PostTypes\Portfolio\Shortcodes
 */
class PortfolioList implements Lib\ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_portfolio_list';

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
	 * Maps shortcode to Visual Composer
	 *
	 * @see vc_map
	 */
	public function vcMap() {
		if(function_exists('vc_map')) {

			$icons_array= array();
			if(edgt_core_theme_installed()) {
				$icons_array = \RatioEdgeIconCollections::get_instance()->getVCParamsArray();
			}

			vc_map( array(
					'name' => 'Portfolio List',
					'base' => $this->getBase(),
					'category' => 'by EDGE',
					'icon' => 'icon-wpb-portfolio extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params' => array(
						array(
							'type' => 'dropdown',
							'heading' => 'Portfolio List Template',
							'param_name' => 'type',
							'value' => array(
								'Standard' => 'standard',
								'Gallery' => 'gallery',
								'Gallery With Space' => 'gallery-with-space',
								'Masonry' => 'masonry',
								'Pinterest' => 'pinterest',
								'Pinterest With Space' => 'pinterest-with-space',
								'Row' => 'row',
								'Scrollable List' => 'scrollable'
							),
							'admin_label' => true,
							'description' => ''
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
							'admin_label' => true,
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Image Proportions',
							'param_name' => 'image_size',
							'value' => array(
								'Original' => 'full',
								'Square' => 'square',
								'Landscape' => 'landscape',
								'Portrait' => 'portrait'
							),
							'save_always' => true,
							'admin_label' => true,
							'description' => '',
							'dependency' => array('element' => 'type', 'value' => array('standard', 'gallery','gallery-with-space','row','scrollable'))
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Hover Type',
							'param_name' => 'hover_type_1',
							'value' => array(
								'Bordered' => 'bordered',
								'Post Info With Border' => 'post-info-border'
							),
							'dependency' => array('element' => 'type', 'value' => array('gallery','masonry','pinterest'))
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Hover Type',
							'param_name' => 'hover_type_2',
							'value' => array(
								'Bordered' => 'bordered',
								'Outline' => 'outline',
								'Post Info With Border' => 'post-info-border'
							),
							'dependency' => array('element' => 'type', 'value' => array('gallery-with-space'))
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Show Load More',
							'param_name' => 'show_load_more',
							'value' => array(
								'Yes' => 'yes',
								'No' => 'no'
							),
							'save_always' => true,
							'admin_label' => true,
							'description' => 'Default value is Yes',
                            'dependency' => array('element' => 'type', 'value' => array('standard','gallery','gallery-with-space','masonry','pinterest','pinterest-with-space','row')),
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Order By',
							'param_name' => 'order_by',
							'value' => array(
								'Menu Order' => 'menu_order',
								'Title' => 'title',
								'Date' => 'date'
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => '',
							'group' => 'Query and Layout Options'
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Order',
							'param_name' => 'order',
							'value' => array(
								'ASC' => 'ASC',
								'DESC' => 'DESC',
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => '',
							'group' => 'Query and Layout Options'
						),
						array(
							'type' => 'textfield',
							'heading' => 'One-Category Portfolio List',
							'param_name' => 'category',
							'value' => '',
							'admin_label' => true,
							'description' => 'Enter one category slug (leave empty for showing all categories)',
							'group' => 'Query and Layout Options'
						),
						array(
							'type' => 'textfield',
							'heading' => 'Number of Portfolios Per Page',
							'param_name' => 'number',
							'value' => '-1',
							'admin_label' => true,
							'description' => '(enter -1 to show all)',
							'group' => 'Query and Layout Options'
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Number of Columns',
							'param_name' => 'columns',
							'value' => array(
								'' => '',
								'One' => '1',
								'Two' => '2',
								'Three' => '3',
								'Four' => '4',
								'Five' => '5',
								'Six' => '6'
							),
							'admin_label' => true,
							'description' => 'Default value is Three',
							'dependency' => array('element' => 'type', 'value' => array('standard','gallery','gallery-with-space')),
							'group' => 'Query and Layout Options'
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Grid Size',
							'param_name' => 'grid_size',
							'value' => array(
								'Default' => '',
								'3 Columns Grid' => 'three',
								'4 Columns Grid' => 'four',
								'5 Columns Grid' => 'five'
							),
							'admin_label' => true,
							'description' => 'This option is only for Full Width Page Template',
							'dependency' => array('element' => 'type', 'value' => array('pinterest','pinterest-with-space')),
							'group' => 'Query and Layout Options'
						),
                        array(
                            'type' => 'dropdown',
                            'heading' => 'Show 3 Featured Images',
                            'param_name' => 'three_images',
                            'value' => array(
                                'Yes' => 'yes',
                                'No' => 'no',
                            ),
                            'admin_label' => true,
                            'description' => '',
                            'group' => 'Query and Layout Options',
                            'dependency' => array('element' => 'type', 'value' => array('scrollable'))
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => 'List Featured Images On The Right',
                            'param_name' => 'featured_images_on_right',
                            'value' => array(
                                'Yes' => 'yes',
                                'No' => 'no',
                            ),
                            'admin_label' => true,
                            'description' => '',
                            'group' => 'Query and Layout Options',
                            'dependency' => array('element' => 'type', 'value' => array('scrollable'))
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => 'Additional Data',
                            'param_name' => 'additional_data',
                            'value' => array(
                                'Show Year' => 'year',
                                'Show Type' => 'type',
                            ),
                            'description' => '',
                            'group' => 'Query and Layout Options',
                            'dependency' => array('element' => 'type', 'value' => array('scrollable'))
                        ),
						array(
							'type' => 'textfield',
							'heading' => 'Show Only Projects with Listed IDs',
							'param_name' => 'selected_projects',
							'value' => '',
							'admin_label' => true,
							'description' => 'Delimit ID numbers by comma (leave empty for all)',
							'group' => 'Query and Layout Options'
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Enable Category Filter',
							'param_name' => 'filter',
							'value' => array(
								'No' => 'no',
								'Yes' => 'yes'
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => 'Default value is No',
                            'dependency' => array('element' => 'type', 'value' => array('standard','gallery','gallery-with-space','masonry','pinterest','pinterest-with-space')),
							'group' => 'Query and Layout Options'
						),
						array(
							'type' => 'dropdown',
							'heading' => 'Filter Order By',
							'param_name' => 'filter_order_by',
							'value' => array(
								'Name'  => 'name',
								'Count' => 'count',
								'Id'    => 'id',
								'Slug'  => 'slug'
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => 'Default value is Name',
							'dependency' => array('element' => 'filter', 'value' => array('yes')),
							'group' => 'Query and Layout Options'
						)
					)
				)
			);
		}
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
			'type' => 'standard',
			'columns' => '3',
			'grid_size' => 'three',
			'image_size' => 'full',
			'hover_type_1' => 'bordered',
			'hover_type_2' => 'bordered',
			'order_by' => 'date',
			'order' => 'ASC',
			'number' => '-1',
			'filter' => 'no',
			'filter_order_by' => 'name',
			'category' => '',
			'selected_projects' => '',
			'show_load_more' => 'yes',
			'title_tag' => 'h4',
			'next_page' => '',
			'portfolio_slider' => '',
			'portfolios_shown' => '',
			'three_images' => 'yes',
			'featured_images_on_right' => 'yes',
			'additional_data' => 'year'
		);

		$params = shortcode_atts($args, $atts);
		extract($params);

		$query_array = $this->getQueryArray($params);
		$query_results = new \WP_Query($query_array);
		$params['query_results'] = $query_results;
		$params['hover'] = $this->getHover($params);

		$classes = $this->getPortfolioClasses($params);
		$data_atts = $this->getDataAtts($params);
		$data_atts .= 'data-max-num-pages = '.$query_results->max_num_pages;
		$params['masonry_filter'] = '';
		$scrollable_item = '';

		if($type !== 'scrollable' && $type !== 'row'){
			$params['single_cat_class'] = '';

			if(!empty($params['category'])) {
				$params['single_cat_class'] .= 'single-category';
			}
		}

		$thumb_html = '';

		$html = '';

		if($filter == 'yes' && ($type == 'masonry' || $type =='pinterest' || $type =='pinterest-with-space')){
			$params['filter_categories'] = $this->getFilterCategories($params);
			$params['masonry_filter'] = 'edgtf-masonry-filter';
			$html .= edgt_core_get_shortcode_module_template_part('portfolio','portfolio-filter', '', $params);
		}

		$html .= '<div class = "edgtf-portfolio-list-holder-outer '.$classes.'" '.$data_atts. '>';

		if($filter == 'yes' && ($type == 'standard' || $type =='gallery' || $type =='gallery-with-space')){
			$params['filter_categories'] = $this->getFilterCategories($params);
			$html .= edgt_core_get_shortcode_module_template_part('portfolio','portfolio-filter', '', $params);
		}

		$html .= '<div class = "edgtf-portfolio-list-holder clearfix" >';
		if($type == 'masonry' || $type == 'pinterest' || $type == 'pinterest-with-space'){
			$html .= '<div class="edgtf-portfolio-list-masonry-grid-sizer"></div>';
			$html .= '<div class="edgtf-portfolio-list-masonry-grid-gutter"></div>';
		}

		if($query_results->have_posts()){

            $counter = 0;
			if ($type == 'scrollable'){
				$scrollable_item = '-meta-item';

				$html .= '<div class="edgtf-ptf-list-showcase-meta">';
				$html .= '<div class="edgtf-ptf-list-showcase-meta-inner">';
				$html .= '<div class="edgtf-ptf-meta-headings">';
				$html .= '<h4 class="edgtf-ptf-meta-item-date-year">';
				if ($params['additional_data'] == 'year'){
					$html .= esc_html__('Year','edge-cpt');
				}
				else{
					$html .= esc_html__('Type','edge-cpt');
				}
				$html .= '</h4>';
				$html .= '<h4 class="edgtf-ptf-meta-item-title">'.esc_html__('Name','edge-cpt').'</h4>';
				$html .= '<h4 class="edgtf-ptf-view-holder"></h4>';
				$html .= '</div>';
				$html .= '<div class="edgtf-ptf-list-showcase-meta-items-holder">';
			}

			while ( $query_results->have_posts() ) : $query_results->the_post();

				$params['current_id'] = get_the_ID();
				$params['thumb_size'] = $this->getImageSize($params);
				$params['category_html'] = $this->getItemCategoriesHtml($params);
				$params['categories'] = $this->getItemCategories($params);
				$params['article_masonry_size'] = $this->getMasonrySize($params);
				$params['item_link'] = $this->getItemLink($params);
				if ($type == 'row' || $type == 'scrollable'){
					$params['images_html'] = $this->getItemImages($params);
				}

				$html .= edgt_core_get_shortcode_module_template_part('portfolio',$type.$scrollable_item, '', $params);

				if ($type == 'scrollable') {
					$thumb_html .= edgt_core_get_shortcode_module_template_part('portfolio','scrollable-preview-item','', $params);
				}

			endwhile;

			if ($type == 'scrollable'){
                $html .= '</div>'; // close .edgtf-ptf-list-showcase-meta-items-holder
                $html .= '</div>'; // close .edgtf-ptf-list-showcase-meta-inner
                $html .= '</div>'; // close .edgtf-ptf-list-showcase-meta
                $html .= '<div class="edgtf-ptf-list-showcase-preview">';
                $html .= $thumb_html;
                $html .= '</div>'; // close .edgtf-ptf-list-showcase-preview
			}
		}else{

			$html .= '<p>'. _e( 'Sorry, no posts matched your criteria.' ) .'</p>';

		}
		if(($type =='gallery-with-space' || $type == 'standard') && $portfolio_slider !== 'yes'){
			for($i=0;$i<(int)$columns;$i++){
				$html .= "<div class='edgtf-portfolio-gap'></div>\n";
			}
		}
		$html .= '</div>'; //close edgtf-portfolio-list-holder
		if($show_load_more == 'yes'){
			$html .= edgt_core_get_shortcode_module_template_part('portfolio','load-more-template', '', $params);
		}
		wp_reset_postdata();
		$html .= '</div>'; // close edgtf-portfolio-list-holder-outer
		return $html;
	}

	/**
	 * Generates portfolio list query attribute array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getQueryArray($params){

		$query_array = array();

		$query_array = array(
			'post_type' => 'portfolio-item',
			'orderby' =>$params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number']
		);

		if(!empty($params['category'])){
			$query_array['portfolio-category'] = $params['category'];
		}

		$project_ids = null;
		if (!empty($params['selected_projects'])) {
			$project_ids = explode(',', $params['selected_projects']);
			$query_array['post__in'] = $project_ids;
		}

		$paged = '';
		if(empty($params['next_page'])) {
			if(get_query_var('paged')) {
				$paged = get_query_var('paged');
			} elseif(get_query_var('page')) {
				$paged = get_query_var('page');
			}
		}

		if(!empty($params['next_page'])){
			$query_array['paged'] = $params['next_page'];

		}else{
			$query_array['paged'] = 1;
		}

		return $query_array;
	}

	public function getHover($params){
		$hover = '';
		$type = $params['type'];

		if ($type == 'standard' || $type == 'row' || $type == 'pinterest-with-space'){
			$hover = 'outline';
		}
		elseif ($type == 'gallery-with-space'){
			if ($params['hover_type_2'] !== ''){
				$hover = $params['hover_type_2'];
			}
			else{
				$hover = 'bordered';
			}
		}
		else{
			if ($params['hover_type_1'] !== ''){
				$hover = $params['hover_type_1'];
			}
			else{
				$hover = 'bordered';
			}
		}

		return $hover;
	}

	/**
	 * Generates portfolio classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getPortfolioClasses($params){
		$classes = array();
		$type = $params['type'];
		$columns = $params['columns'];
		$grid_size = $params['grid_size'];
		switch($type):
			case 'standard':
				$classes[] = 'edgtf-ptf-standard';
				break;
			case 'gallery':
				$classes[] = 'edgtf-ptf-gallery';
				break;
			case 'gallery-with-space':
				$classes[] = 'edgtf-ptf-gallery-with-space';
				break;
			case 'masonry':
				$classes[] = 'edgtf-ptf-masonry';
				break;
			case 'pinterest':
				$classes[] = 'edgtf-ptf-pinterest';
				break;
			case 'pinterest-with-space':
				$classes[] = 'edgtf-ptf-pinterest-with-space';
				break;
			case 'row':
				$classes[] = 'edgtf-ptf-row';
				break;
			case 'scrollable':
				$classes[] = 'edgtf-ptf-scrollable';
				$classes[] = ($params['featured_images_on_right'] === 'yes')?'edgtf-featured-images-on-right':'edgtf-featured-images-on-left';
				$classes[] = ($params['three_images'] === 'yes')?'edgtf-three-images-scrollable':'';
				break;
		endswitch;

		if(empty($params['portfolio_slider'])){ // portfolio slider mustn't have this classes

			if($type == 'standard' || $type == 'gallery' || $type == 'gallery-with-space' ){
				switch ($columns):
					case '1':
						$classes[] = 'edgtf-ptf-one-column';
						break;
					case '2':
						$classes[] = 'edgtf-ptf-two-columns';
						break;
					case '3':
						$classes[] = 'edgtf-ptf-three-columns';
						break;
					case '4':
						$classes[] = 'edgtf-ptf-four-columns';
						break;
					case '5':
						$classes[] = 'edgtf-ptf-five-columns';
						break;
					case '6':
						$classes[] = 'edgtf-ptf-six-columns';
						break;
				endswitch;
			}
			if($params['show_load_more']== 'yes' && $type !== 'scrollable'){
				$classes[] = 'edgtf-ptf-load-more';
			}

		}

		if($type == "pinterest" || $type == "pinterest-with-space"){
			switch ($grid_size):
				case 'three':
					$classes[] = 'edgtf-ptf-pinterest-three-columns';
					break;
				case 'four':
					$classes[] = 'edgtf-ptf-pinterest-four-columns';
					break;
				case 'five':
					$classes[] = 'edgtf-ptf-pinterest-five-columns';
					break;
			endswitch;
		}
		if($params['filter'] == 'yes'){
			$classes[] = 'edgtf-ptf-has-filter';
			if($params['type'] == 'masonry' || $params['type'] == 'pinterest' || $params['type'] == 'pinterest-with-space'){
				if($params['filter'] == 'yes'){
					$classes[] = 'edgtf-ptf-masonry-filter';
				}
			}
		}

		if(!empty($params['portfolio_slider']) && $params['portfolio_slider'] == 'yes'){
			$classes[] = 'edgtf-portfolio-slider-holder';
		}

		if ($params['hover'] != ''){
			$classes[] = 'edgtf-hover-'.$params['hover'];
		}

		return implode(' ',$classes);

	}
	/**
	 * Generates portfolio image size
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getImageSize($params){

		$thumb_size = 'full';
		$type = $params['type'];

		if($type !== 'masonry' && $type !== 'pinterest'){
			if(!empty($params['image_size'])){
				$image_size = $params['image_size'];

				switch ($image_size) {
					case 'landscape':
						$thumb_size = 'ratio_edge_landscape';
						break;
					case 'portrait':
						$thumb_size = 'ratio_edge_portrait';
						break;
					case 'square':
						$thumb_size = 'ratio_edge_square';
						break;
					case 'full':
						$thumb_size = 'full';
						break;
				}
			}
		}
		elseif($type == 'masonry'){

			$id = $params['current_id'];
			$masonry_size = get_post_meta($id, 'portfolio_masonry_dimenisions',true);

			switch($masonry_size):
				default :
					$thumb_size = 'ratio_edge_square';
					break;
				case 'large_width' :
					$thumb_size = 'ratio_edge_large_width';
					break;
				case 'large_height' :
					$thumb_size = 'ratio_edge_large_height';
					break;
				case 'large_width_height' :
					$thumb_size = 'ratio_edge_large_width_height';
					break;
			endswitch;
		}


		return $thumb_size;
	}
	/**
	 * Generates portfolio item categories ids.This function is used for filtering
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getItemCategories($params){
		$id = $params['current_id'];
		$category_return_array = array();

		$categories = wp_get_post_terms($id, 'portfolio-category');

		foreach($categories as $cat){
			$category_return_array[] = 'portfolio_category_'.$cat->term_id;
		}
		return implode(' ', $category_return_array);
	}
	/**
	 * Generates portfolio item categories html based on id
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getItemCategoriesHtml($params){
		$id = $params['current_id'];

		$categories = wp_get_post_terms($id, 'portfolio-category');
		if ($params['type'] == 'scrollable'){			
			$category_html = '<h4 class="edgtf-ptf-meta-item-date-year">';
		}
		else{
			$category_html = '<h6 class="edgtf-ptf-category-holder">';
		}
		$k = 1;
		foreach ($categories as $cat) {
			$category_html .= '<span>'.$cat->name.'</span>';
			if (count($categories) != $k) {
				$category_html .= ', ';
			}
			$k++;
		}
		if ($params['type'] == 'scrollable'){
			$category_html .= '</h4>';
		}
		else{
			$category_html .= '</h6>';
		}
		return $category_html;
	}

	/**
	 * Generates masonry size class for each article( based on id)
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getMasonrySize($params){
		$masonry_size_class = '';

		if($params['type'] == 'masonry'){

			$id = $params['current_id'];
			$masonry_size = get_post_meta($id, 'portfolio_masonry_dimenisions',true);
			switch($masonry_size):
				default :
					$masonry_size_class = 'edgtf-default-masonry-item';
					break;
				case 'large_width' :
					$masonry_size_class = 'edgtf-large-width-masonry-item';
					break;
				case 'large_height' :
					$masonry_size_class = 'edgtf-large-height-masonry-item';
					break;
				case 'large_width_height' :
					$masonry_size_class = 'edgtf-large-width-height-masonry-item';
					break;
			endswitch;
		}

		return $masonry_size_class;
	}
	/**
	 * Generates filter categories array
	 *
	 * @param $params
	 *
	 * * @return array
	 */
	public function getFilterCategories($params){

        $cat_id = 0;
        $categories_groups = array();
        $child_categories = array();

        if(!empty($params['category'])){

            $top_category = get_term_by('slug', $params['category'], 'portfolio-category');
            if(isset($top_category->term_id)){
                $cat_id = $top_category->term_id;
            }
        }

        $args = array(
            'parent' => $cat_id,
            'order_by' => $params['filter_order_by']
        );

        $parent_categories = get_terms('portfolio-category',$args);

        $categories_groups['parent_categories'] = $parent_categories;

        foreach($parent_categories as $parent){
            $args = array(
                'child_of' => $parent->term_id,
                'order_by' => $params['filter_order_by']
            );
            if(get_terms('portfolio-category',$args)){
                $child = array();
                $child['id'] = $parent->term_id;
                $child['value'] = get_terms('portfolio-category',$args);
                $child_categories[] = $child;
                $data_filter = '';
                foreach($child['value'] as $cat){
                    $data_filter .= '.portfolio_category_'.$cat->term_id.', ';
                }
                $categories_groups[$parent->term_id] = rtrim($data_filter,', ');
            }else{
                $categories_groups[$parent->term_id] = '.portfolio_category_'.$parent->term_id;
            }
        }

        $categories_groups['child_categories'] = $child_categories;

        return $categories_groups;

	}
	/**
	 * Generates datta attributes array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getDataAtts($params){

		$data_attr = array();
		$data_return_string = '';

		if(get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif(get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		if(!empty($paged)) {
			$data_attr['data-next-page'] = $paged+1;
		}
		if(!empty($params['type'])){
			$data_attr['data-type'] = $params['type'];
		}
		if(!empty($params['columns'])){
			$data_attr['data-columns'] = $params['columns'];
		}
		if(!empty($params['grid_size'])){
			$data_attr['data-grid-size'] = $params['grid_size'];
		}
		if(!empty($params['order_by'])){
			$data_attr['data-order-by'] = $params['order_by'];
		}
		if(!empty($params['order'])){
			$data_attr['data-order'] = $params['order'];
		}
		if(!empty($params['number'])){
			$data_attr['data-number'] = $params['number'];
		}
		if(!empty($params['image_size'])){
			$data_attr['data-image-size'] = $params['image_size'];
		}
		if(!empty($params['filter'])){
			$data_attr['data-filter'] = $params['filter'];
		}
		if(!empty($params['filter_order_by'])){
			$data_attr['data-filter-order-by'] = $params['filter_order_by'];
		}
		if(!empty($params['category'])){
			$data_attr['data-category'] = $params['category'];
		}
		if(!empty($params['selected_projects'])){
			$data_attr['data-selected-projects'] = $params['selected_projects'];
		}
		if(!empty($params['show_load_more'])){
			$data_attr['data-show-load-more'] = $params['show_load_more'];
		}
		if(!empty($params['title_tag'])){
			$data_attr['data-title-tag'] = $params['title_tag'];
		}
		if(!empty($params['portfolio_slider']) && $params['portfolio_slider']=='yes'){
			$data_attr['data-items'] = $params['portfolios_shown'];
		}

		foreach($data_attr as $key => $value) {
			if($key !== '') {
				$data_return_string .= $key.'="'.esc_attr($value).'" ';
			}
		}
		return $data_return_string;
	}

	public function getItemLink($params){

		$id = $params['current_id'];
		$portfolio_link = get_permalink($id);
		if (get_post_meta($id, 'portfolio_external_link',true) !== ''){
			$portfolio_link = get_post_meta($id, 'portfolio_external_link',true);
		}

		return $portfolio_link;

	}

    /**
     * Generates images for scrollable and row portfolio list
     *
     * @return array
     */
    public function getItemImages($params){
        $html = array();
        $img_ids = array();
        $id = $params['current_id'];

       $thumb1 = get_post_thumbnail_id($id);
        if($thumb1) {
            $img_ids[] = $thumb1;
        }

        $thumb2 = get_post_meta($id, 'portfolio_second_featured_image', true);
        if($thumb2) {
            $img_ids[] = ratio_edge_get_attachment_id_from_url($thumb2);
        }

        $scrollable_three_images = true;
        if ($params['type'] == 'scrollable' && $params['three_images'] == 'no'){
        	$scrollable_three_images = false;
        }

        $thumb3 = get_post_meta($id, 'portfolio_third_featured_image', true);
        if($thumb3 && $scrollable_three_images) {
            $img_ids[] = ratio_edge_get_attachment_id_from_url($thumb3);
        }

        if(!empty($img_ids)) :
            foreach($img_ids as $image_id) {
                $media                = array();
                $media['title']       = get_the_title($image_id);
                $media['image_src']   = wp_get_attachment_image_src($image_id, $params['thumb_size']);
                $html[] = '<img src="'.$media['image_src'][0].'" alt="'.$media['title'].'" />';
            }
        endif;

        return $html;
    }
}