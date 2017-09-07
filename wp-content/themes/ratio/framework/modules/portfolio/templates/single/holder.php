<?php $type = ratio_edge_get_portfolio_single_type();
	if(have_posts()): while(have_posts()) : the_post();
		if($fullwidth || $type === 'full-screen-slider' || $type === 'split-screen') : ?>
			<div class="edgtf-full-width <?php echo 'edgtf-'.esc_attr($type);?>">
				<div class="edgtf-full-width-inner">
			<?php else: ?>
			<div class="edgtf-container">
				<div class="edgtf-container-inner clearfix">
			<?php endif; ?>
				<div <?php ratio_edge_class_attribute($holder_class); ?>>
					<?php if(post_password_required()) {
						echo get_the_password_form();
					} else {
						//load proper portfolio template
						ratio_edge_get_module_template_part('templates/single/single', 'portfolio', $portfolio_template);
					} ?>
				</div>
				<?php 
					if(ratio_edge_options()->getOptionValue('portfolio_single_show_related') === 'yes' && $type !== 'full-width-custom' && $type !== 'custom'){
						//load portfolio related
						ratio_edge_get_module_template_part('templates/single/parts/related', 'portfolio');
					}
				?>
				</div>
			</div>
			<?php
				
				//load portfolio navigation
				ratio_edge_get_module_template_part('templates/single/parts/navigation', 'portfolio');

				//load portfolio comments
				ratio_edge_get_module_template_part('templates/single/parts/comments', 'portfolio');
			?>
<?php
	endwhile;
	endif;
?>