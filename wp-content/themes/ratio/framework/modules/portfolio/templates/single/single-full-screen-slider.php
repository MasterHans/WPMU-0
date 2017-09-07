
<div class="edgtf-portfolio-slider-content">
	<span class="edgtf-control edgtf-close arrow_condense"></span>
	<span class="edgtf-control edgtf-open arrow_expand"></span>

	<div class="edgtf-description">
		<div class="edgtf-table">
			<div class="edgtf-table-cell">
				<h2><?php the_title(); ?></h2>
                <span class="edgtf-ptf-excerpt"><?php echo esc_html(get_the_excerpt()); ?></span>
			</div>
		</div>
	</div>

	<div class="edgtf-portfolio-slider-content-info">
		<div class="edgtf-portfolio-info-holder">
			<?php
			//get portfolio custom fields section
			ratio_edge_portfolio_get_info_part('custom-fields');

			//get portfolio date section
			ratio_edge_portfolio_get_info_part('date');

			//get portfolio categories section
			ratio_edge_portfolio_get_info_part('categories');

			//get portfolio tags section
			ratio_edge_portfolio_get_info_part('tags');
			?>
		</div>
		<?php ratio_edge_portfolio_get_info_part('content'); ?>
		<?php
			//get portfolio share section
			ratio_edge_portfolio_get_info_part('social');
		?>
	</div>

</div>
<div class="edgtf-full-screen-slider-holder">
	<?php
	$media = ratio_edge_get_portfolio_single_media();

	if(is_array($media) && count($media)) : ?>
		<div class="edgtf-portfolio-full-screen-slider">
			<?php foreach($media as $single_media) : ?>
                <div class="edgtf-portfolio-single-media  <?php echo esc_html($single_media['class_size']); ?>">
					<?php ratio_edge_portfolio_get_media_html($single_media); ?>
                </div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>