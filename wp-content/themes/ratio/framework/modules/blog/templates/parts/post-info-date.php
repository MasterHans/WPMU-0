<div class="edgtf-post-info-date">
	<?php if(!ratio_edge_post_has_title()) { ?><a href="<?php the_permalink() ?>"><?php } ?>
		<?php the_time(get_option('date_format')); ?>
	<?php if(!ratio_edge_post_has_title()) { ?></a><?php } ?>
</div>