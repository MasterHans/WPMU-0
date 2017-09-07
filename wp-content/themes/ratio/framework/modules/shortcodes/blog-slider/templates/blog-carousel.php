<div class="edgtf-blog-carousel-item">
	<?php if($show_image != 'no' && has_post_thumbnail()) { ?>
		<div class="edgtf-blog-slide-image">
				<a href="<?php the_permalink(); ?>">
					<?php
                        the_post_thumbnail($image_size);
                    ?>
				</a>
		</div>
	<?php } ?>
	<div class="edgtf-blog-slide-info-holder clearfix">
		<h3 class="edgtf-blog-slide-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<div class="edgtf-blog-slide-post-info">
			<?php ratio_edge_post_info(array('author' => 'yes', 'category' => 'yes', 'date' => 'yes')) ?>
		</div>
		<?php if ($text_length != '0') {
			$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
			<p class="edgtf-blog-slide-excerpt"><?php echo esc_html($excerpt)?>...</p>
		<?php } ?>
		<?php echo ratio_edge_read_more_button('', 'edgtf-blog-slide-read-more'); ?>
		</div>
</div>