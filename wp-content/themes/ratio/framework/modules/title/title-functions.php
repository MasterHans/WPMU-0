<?php

if(!function_exists('ratio_edge_get_title')) {
    /**
     * Loads title area HTML
     */
    function ratio_edge_get_title() {
        $id = ratio_edge_get_page_id();

        extract(ratio_edge_title_area_height());
        extract(ratio_edge_title_area_background());


        //check if title area is visible on page first, then in the options
        if(($meta_temp = get_post_meta($id, "edgtf_show_title_area_meta", true)) !== ""){
            $show_title_area = $meta_temp == 'yes' ? true : false;
        }else {
            $show_title_area = ratio_edge_options()->getOptionValue('show_title_area') == 'yes' ? true : false;
        }

        //check for title type on page first, then in options
        if(($meta_temp = get_post_meta($id, "edgtf_title_area_type_meta", true)) !== ""){
            $type = $meta_temp;
        }else {
            $type = ratio_edge_options()->getOptionValue('title_area_type');
        }

        //check if breadcrumbs are enabled on page first, then in options
        if(($meta_temp = get_post_meta($id, "edgtf_title_area_enable_breadcrumbs_meta", true)) !== ""){
            $enable_breadcrumbs = $meta_temp == 'yes' ? true : false;
        }else {
            $enable_breadcrumbs = ratio_edge_options()->getOptionValue('title_area_enable_breadcrumbs') == 'yes' ? true : false;
        }

		//check if separator are enabled on page first, then in options
		if(get_post_meta($id, "edgtf_title_area_enable_separator_meta", true) !== ""){
			$enable_separator = get_post_meta($id, "edgtf_title_area_enable_separator_meta", true) == 'yes' ? true : false;
		}else {
			$enable_separator = ratio_edge_options()->getOptionValue('title_area_enable_separator') == 'yes' ? true : false;
		}


		//seaprator options
		$separator_args = array();
		if($enable_separator) {
			if (get_post_meta($id, "edgtf_title_area_content_alignment_meta", true) != "") {
				$separator_args['position'] = get_post_meta($id, "edgtf_title_area_content_alignment_meta", true);
			} else {
				$separator_args['position'] = ratio_edge_options()->getOptionValue('title_area_content_alignment');
			}
		}

        //check if title color is set on page
        $title_color = '';
        if(($meta_temp = get_post_meta($id, "edgtf_title_text_color_meta", true)) !== ""){
            $title_color = 'color:'.$meta_temp.';';
        }

        //check if subtitle color is set on page
        $subtitle_color = '';
        if(($meta_temp = get_post_meta($id, "edgtf_subtitle_color_meta", true)) !== ""){
            $subtitle_color = 'color:'.$meta_temp.';';
        }

        $parameters = array(
            'show_title_area' => $show_title_area,
            'type' => $type,
            'enable_breadcrumbs' => $enable_breadcrumbs,
			'enable_separator' => $enable_separator,
			'separator_args' => $separator_args,
            'title_height' => $title_height,
            'title_holder_height' => $title_holder_height,
            'title_subtitle_holder_padding' => $title_subtitle_holder_padding,
            'title_background_color' => $title_background_color,
            'title_background_image' => $title_background_image,
            'title_background_image_width' => $title_background_image_width,
            'title_background_image_src' => $title_background_image_src,
            'has_subtitle' => get_post_meta($id, "edgtf_title_area_subtitle_meta", true) != "" ? true : false,
            'title_color' => $title_color,
            'subtitle_color' => $subtitle_color
        );

        $parameters = apply_filters('ratio_edge_title_area_height_params', $parameters);

        ratio_edge_get_module_template_part('templates/title', 'title', '', $parameters);
    }
}

if(!function_exists('ratio_edge_get_title_text')) {
    /**
     * Function that returns current page title text. Defines ratio_edge_title_text filter
     * @return string current page title text
     *
     * @see is_tag()
     * @see is_date()
     * @see is_author()
     * @see is_category()
     * @see is_home()
     * @see is_search()
     * @see is_404()
     * @see get_queried_object_id()
     * @see ratio_edge_is_woocommerce_installed()
     */
    function ratio_edge_get_title_text() {

        $id = ratio_edge_get_page_id();
        $title 	= '';

        //is current page tag archive?
        if (is_tag()) {
            //get title of current tag
            $title = single_term_title("", false).esc_html__(' Tag', 'ratio');
        }

        //is current page date archive?
        elseif (is_date()) {
            //get current date archive format
            $title = get_the_time('F Y');
        }

        //is current page author archive?
        elseif (is_author()) {
            //get current author name
            $title = esc_html__('Author:', 'ratio') . " " . get_the_author();
        }

        //us current page category archive
        elseif (is_category()) {
            //get current page category title
            $title = single_cat_title('', false);
        }

        //is current page blog post page and front page? Latest posts option is set in Settings -> Reading
        elseif (is_home() && is_front_page()) {

			if(ratio_edge_options()->getOptionValue('title_front_page') != ""){
				//get it from options
				$title = ratio_edge_options()->getOptionValue('title_front_page');
			} else {
				//get site name from options
				$title = get_option('blogname');
			}
        }

		//is current page search page?
		elseif (is_search()) {
			//get title for search page
			$title = esc_html__('Search Results for', 'ratio').': '.get_search_query();
		}

		//is single post page
        elseif (is_singular('post')) {
			if (ratio_edge_options()->getOptionValue('blog_single_title_in_title_area') == "yes") {
				$title = get_the_title($id);
			} else {
				$title = esc_html__('Blog', 'ratio');
			}
		}
        //is current page 404?
        elseif (is_404()) {
            //is 404 title text set in theme options?
            if(ratio_edge_options()->getOptionValue('404_title') != "") {
                //get it from options
                $title = ratio_edge_options()->getOptionValue('404_title');
            } else {
                //get default 404 page title
                $title = esc_html__('404 - Page not found', 'ratio');
            }
        }

        //is WooCommerce installed and is shop or single product page?
        elseif(ratio_edge_is_woocommerce_installed() && (is_shop() || is_singular('product'))) {
            //get shop page id from options table
            $shop_id = get_option('woocommerce_shop_page_id');

            //get shop page and get it's title if set
            $shop = get_post($shop_id);
            if(isset($shop->post_title) && $shop->post_title !== '') {
                $title = $shop->post_title;
            }

        }

        //is WooCommerce installed and is current page product archive page?
        elseif(ratio_edge_is_woocommerce_installed() && (is_product_category() || is_product_tag())) {
            global $wp_query;

            //get current taxonomy and it's name and assign to title
            $tax 			= $wp_query->get_queried_object();
            $category_title = $tax->name;
            $title 			= $category_title;
        }

        //is current page some archive page?
        elseif (is_archive()) {
            $title = esc_html__('Archive','ratio');
        }

        //current page is regular page
        else {
            $title = get_the_title($id);
        }

        $title = apply_filters('ratio_edge_title_text', $title);

        return $title;
    }
}

if(!function_exists('ratio_edge_title_text')) {
    /**
     * Function that echoes title text.
     *
     * @see ratio_edge_get_title_text()
     */
    function ratio_edge_title_text() {
        echo ratio_edge_get_title_text();
    }
}

if(!function_exists('ratio_edge_subtitle_text')) {
    /**
     * Function that echoes subtitle text.
     *
     */
    function ratio_edge_subtitle_text() {
        $id = ratio_edge_get_page_id();
        $subtitle 	= '';

        if(($meta_temp = get_post_meta($id, "edgtf_title_area_subtitle_meta", true)) != ""){
            $subtitle = wp_kses_post($meta_temp);
        }

        print $subtitle;
    }
}

if(!function_exists('ratio_edge_custom_breadcrumbs')) {
    /**
     * Function that renders breadcrumbs
     *
     * @see home_url()
     * @see get_option()
     * @see get_post_meta()
     * @see is_home()
     * @see is_front_page()
     * @see is_category()
     * @see ratio_edge_is_product_category()
     * @see get_search_query()
     */
    function ratio_edge_custom_breadcrumbs() {
        global $post;

        $output = "";
        $homeLink = esc_url(home_url('/'));
        $pageid = ratio_edge_get_page_id();
        $bread_style = "";

        if(($meta_temp = get_post_meta($pageid, "edgtf_title_breadcrumb_color_meta", true)) != ""){
            $bread_style="color:". $meta_temp;
        }

        $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '<span class="edgtf-delimiter" '.ratio_edge_get_inline_style($bread_style).'>&nbsp;/&nbsp;</span>'; // delimiter between crumbs
        $home = get_bloginfo('name'); // text for the 'Home' link
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $before = '<span class="edgtf-current" '.ratio_edge_get_inline_style($bread_style).'>'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb

        if (is_home() && !is_front_page()) {
            $output = '<div class="edgtf-breadcrumbs"><div class="edgtf-breadcrumbs-inner"><a '.ratio_edge_get_inline_style($bread_style).' href="' . $homeLink . '">' . $home . '</a>' . $delimiter . ' <a '.ratio_edge_get_inline_style($bread_style).' href="' . $homeLink . '">'. get_the_title($pageid) .'</a></div></div>';

        } elseif(is_home()) {
            $output = '<div class="edgtf-breadcrumbs"><div class="edgtf-breadcrumbs-inner">'.$before.$home.$after.'</div></div>';
        }

        elseif(is_front_page()) {
            if ($showOnHome == 1) $output = '<div class="edgtf-breadcrumbs"><div class="edgtf-breadcrumbs-inner"><a '.ratio_edge_get_inline_style($bread_style).' href="' . $homeLink . '">' . $home . '</a></div></div>';
        }

        else {

            $output .= '<div class="edgtf-breadcrumbs"><div class="edgtf-breadcrumbs-inner"><a '.ratio_edge_get_inline_style($bread_style).' href="' . $homeLink . '">' . $home . '</a>' . $delimiter;

            if ( is_category() || ratio_edge_is_product_category()) {
                $thisCat = get_category(get_query_var('cat'), false);
                if (isset($thisCat->parent) && $thisCat->parent != 0) $output .= get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter);
                $output .= $before . single_cat_title('', false) . $after;

            } elseif ( is_search() ) {
                $output .= $before . esc_html__('Search results for ', 'ratio') . '"' . get_search_query() . '"' . $after;

            } elseif ( is_day() ) {
                $output .= '<a '.ratio_edge_get_inline_style($bread_style).' href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter;
                $output .= '<a '.ratio_edge_get_inline_style($bread_style).' href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $delimiter;
                $output .= $before . get_the_time('d') . $after;

            } elseif ( is_month() ) {
                $output .= '<a '.ratio_edge_get_inline_style($bread_style).' href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter;
                $output .= $before . get_the_time('F') . $after;

            } elseif ( is_year() ) {
                $output .= $before . get_the_time('Y') . $after;

            } elseif ( is_single() && !is_attachment() ) {
                if ( get_post_type() != 'post' ) {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    if ($showCurrent == 1) $output .= $before . get_the_title() . $after;
                } else {
                    $cat = get_the_category(); $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, ' ' . $delimiter);
                    if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                    $output .= $cats;
                    if ($showCurrent == 1) $output .= $before . get_the_title() . $after;
                }

            }  elseif ( is_attachment() && !$post->post_parent ) {
                if ($showCurrent == 1) $output .= $before . get_the_title() . $after;

            } elseif ( is_attachment() ) {
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID);
                if($cat) {
                    $cat = $cat[0];
                    $output .= get_category_parents($cat, TRUE, ' ' . $delimiter);
                }
                $output .= '<a '.ratio_edge_get_inline_style($bread_style).' href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
                if ($showCurrent == 1) $output .= $delimiter . $before . get_the_title() . $after;

            } elseif ( is_page() && !$post->post_parent ) {
                if ($showCurrent == 1) $output .= $before . get_the_title() . $after;

            } elseif ( is_page() && $post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a '.ratio_edge_get_inline_style($bread_style).' href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    $output .= $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) $output .= ' ' . $delimiter;
                }
                if ($showCurrent == 1) $output .= $delimiter . $before . get_the_title() . $after;

            } elseif ( is_tag() ) {
                $output .= $before . esc_html__('Posts tagged ','ratio') .'"' . single_tag_title('', false) . '"' . $after;

            } elseif ( is_author() ) {
                global $authordata;
                $output .= $before . esc_html__('Articles posted by ','ratio') . $authordata->display_name . $after;

            } elseif ( is_404() ) {
                $output .= $before . 'Error 404' . $after;
            } elseif(function_exists("is_woocommerce") && is_shop()){
                global $woocommerce;
                $shop_id = get_option('woocommerce_shop_page_id');
                $shop= get_page($shop_id);
                $output .= $before .  $shop->post_title . $after;
            }

            if ( get_query_var('paged') ) {

                $output .= $before . " (" . esc_html__('Page', 'ratio') . ' ' . get_query_var('paged') . ")" . $after;

            }

            $output .= '</div></div>';

        }

        echo wp_kses($output, array(
            'div' => array(
                'id' => true,
                'class' => true,
                'style' => true
            ),
            'span' => array(
                'class' => true,
                'id' => true,
                'style' => true
            ),
            'a' => array(
                'class' => true,
                'id' => true,
                'href' => true,
                'style' => true
            )
        ));
    }
}

if(!function_exists('ratio_edge_get_title_area_height')) {

    /**
     * Function that returns title height
     **/
    function ratio_edge_get_title_area_height() {

        $id = ratio_edge_get_page_id();

        if(($meta_temp = get_post_meta($id, 'edgtf_title_area_type_meta', true)) != '') {
            $title_type = $meta_temp;
        } else {
            $title_type = ratio_edge_options()->getOptionValue('title_area_type');
        }

        $title_height = 150; // default title height without header height
        if($title_type == "breadcrumb") {
            $title_height = 150;
        }

        if(($meta_temp = get_post_meta($id, "edgtf_title_area_height_meta", true)) != '') {
            $title_height = $meta_temp;
        } elseif(ratio_edge_options()->getOptionValue('title_area_height') !== '') {
            $title_height = ratio_edge_options()->getOptionValue('title_area_height');
        }

        return apply_filters('ratio_edge_title_area_height', $title_height);
    }
}

if(!function_exists('ratio_edge_get_title_content_padding')) {
    /**
     * Function that returns title content pading
     **/

    function ratio_edge_get_title_content_padding() {
        return apply_filters('ratio_edge_title_content_padding', 0);
    }
}


if(!function_exists('ratio_edge_title_area_height')) {
    /**
     * Function that returns title height and padding to be applied in template
     **/

    function ratio_edge_title_area_height() {
        $id = ratio_edge_get_page_id();
        $title_height_and_padding = array();
        $title_height          = ratio_edge_get_title_area_height();
        $header_height_padding = ratio_edge_get_title_content_padding();
        $title_vertical_alignment = 'header_bottom';
        $title_holder_height = '';
        $title_subtitle_holder_padding = '';

        //is responsive image is set for current page?
        if(($meta_temp = get_post_meta($id, "edgtf_title_area_background_image_responsive_meta", true)) != "") {
            $is_img_responsive = $meta_temp;
        } else {
            //take value from theme options
            $is_img_responsive = ratio_edge_options()->getOptionValue('title_area_background_image_responsive');
        }

        if(($meta_temp = get_post_meta($id, "edgtf_title_area_vertial_alignment_meta", true)) !== '') {
            $title_vertical_alignment = $meta_temp;
        }else{
            $title_vertical_alignment = ratio_edge_options()->getOptionValue('title_area_vertial_alignment');;
        }

        //we need to define title height only when aligning text bellog header and when image isn't responsive
        if($is_img_responsive !== 'yes' && $title_vertical_alignment == 'header_bottom') {
            $title_holder_height = 'height:'.$title_height.'px;';
        }
        //we need to add padding-top property only if we are aligning title text from bellow header
        if($title_vertical_alignment == 'header_bottom' && !empty($header_height_padding)) {
            if($is_img_responsive == 'yes') {
                $title_subtitle_holder_padding = 'padding-top: '.$header_height_padding.'px;';
            } else {
                $title_holder_height .= 'padding-top: '.$header_height_padding.'px;';
            }
        }

        //increase title height for the height of header transparent parts
        $title_height_and_padding['title_height'] = 'height:'.($title_height + $header_height_padding).'px;';
        $title_height_and_padding['title_holder_height'] = $title_holder_height;
        $title_height_and_padding['title_subtitle_holder_padding'] = $title_subtitle_holder_padding;


        return $title_height_and_padding;
    }
}

if(!function_exists('ratio_edge_title_area_background')) {
    /**
     * Function that returns title background style be applied in template
     **/

    function ratio_edge_title_area_background() {
        $id = ratio_edge_get_page_id();
        $show_title_img = true;
        $title_area_background = array();
        $title_background_color = '';
        $title_background_image = '';
        $title_background_image_width = '';
        $title_background_image_src = '';
        $is_img_responsive = '';

        //is title image hidden for current page?
        if(get_post_meta($id, "edgtf_hide_background_image_meta", true) == "yes") {
            $show_title_img = false;
        }

        //is responsive image is set for current page?
        if(($meta_temp = get_post_meta($id, "edgtf_title_area_background_image_responsive_meta", true)) != "") {
            $is_img_responsive = $meta_temp;
        } else {
            //take value from theme options
            $is_img_responsive = ratio_edge_options()->getOptionValue('title_area_background_image_responsive');
        }

        //check if background color is set on page or in options
        if(($meta_temp = get_post_meta($id, "edgtf_title_area_background_color_meta", true)) != ""){
            $background_color = $meta_temp;
        }else{
            $background_color = ratio_edge_options()->getOptionValue('title_area_background_color');
        }

        //check if background image is set on page or in options
        if(($meta_temp = get_post_meta($id, "edgtf_title_area_background_image_meta", true)) != ""){
            $background_image = $meta_temp;
        }else{
            $background_image = ratio_edge_options()->getOptionValue('title_area_background_image');
        }

        //check for background image width
        $background_image_width = "";
        if($background_image !== ''){
            $background_image_width_dimensions_array = ratio_edge_get_image_dimensions($background_image);
            if (count($background_image_width_dimensions_array)) {
                $background_image_width = $background_image_width_dimensions_array["width"];
            }
        }

        //generate styles
        if(!empty($background_color)){$title_background_color = 'background-color:'.$background_color.';';}
        if($is_img_responsive == 'no' && $show_title_img){ //no need for those styles if image is set to be responsive
            if(!empty($background_image)){$title_background_image = 'background-image:url('.$background_image.');';}
            if(!empty($background_image_width)){$title_background_image_width = 'data-background-width="'.$background_image_width.'"';}

        }
        if($show_title_img) {
            if(!empty($background_image)) { $title_background_image_src = $background_image; }
        }

        $title_area_background['title_background_color'] = $title_background_color;
        $title_area_background['title_background_image'] = $title_background_image;
        $title_area_background['title_background_image_width'] = $title_background_image_width;
        $title_area_background['title_background_image_src'] = $title_background_image_src;


        return $title_area_background;
    }
}
