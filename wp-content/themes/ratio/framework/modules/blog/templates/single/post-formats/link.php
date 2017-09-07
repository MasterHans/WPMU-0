<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner clearfix">
				<div class="edgtf-post-mark edgtf-link-mark">
					<span class="icon_link"></span>
				</div>
				<div class="edgtf-post-info">
					<?php ratio_edge_post_info(array('author' => 'yes', 'category' => 'yes', 'date' => 'yes')) ?>
				</div>
				<h3 class="edgtf-post-title">
					<a href="<?php echo esc_html(get_post_meta(get_the_ID(), "edgtf_post_link_link_meta", true)); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h3>
			</div>
		</div>
		<?php the_content(); ?>
		<?php ratio_edge_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>
		<?php if(has_tag() || ratio_edge_get_social_share_html() != '') : ?>
			<div class="edgtf-post-info-bottom">
				<div class="edgtf-post-info-bottom-left">
					<?php has_tag() ? the_tags('', ', ', '') : ''; ?>
				</div>
				<div class="edgtf-post-info-bottom-right">
					<?php ratio_edge_post_info(array('share' => 'yes')) ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</article>