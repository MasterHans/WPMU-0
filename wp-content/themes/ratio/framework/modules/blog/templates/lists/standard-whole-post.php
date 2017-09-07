<div class="edgtf-blog-holder edgtf-blog-type-standard <?php echo esc_attr($blog_classes)?>"   data-blog-type="<?php echo esc_attr($blog_type)?>" <?php echo esc_attr(ratio_edge_set_blog_holder_data_params()); ?> >
	<?php
		if($blog_query->have_posts()) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
			ratio_edge_get_post_format_html($blog_type);
		endwhile;
		else:
			ratio_edge_get_module_template_part('templates/parts/no-posts', 'blog');
		endif;
	?>
	<?php
		if(ratio_edge_options()->getOptionValue('pagination') == 'yes') {
			ratio_edge_pagination($blog_query->max_num_pages, $blog_page_range, $paged);
		}
	?>
</div>
