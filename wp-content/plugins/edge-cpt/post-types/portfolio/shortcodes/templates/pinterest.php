<article class="edgtf-portfolio-item <?php echo esc_attr($categories)?>" >
	<a class="edgtf-portfolio-link" href="<?php echo esc_url($item_link); ?>"></a>
	<div class="edgtf-item-image-holder">
	<?php
		echo get_the_post_thumbnail(get_the_ID(),$thumb_size);
	?>				
	</div>
	<div class="edgtf-item-text-overlay">
		<div class="edgtf-item-text-overlay-inner">
			<div class="edgtf-item-text-holder">
				<div class="edgtf-item-text-holder-inner">
					<<?php echo esc_attr($title_tag)?> class="edgtf-item-title">
						<?php echo esc_attr(get_the_title()); ?>
					</<?php echo esc_attr($title_tag)?>>
					<span class="edgtf-ptf-line"></span>
					<?php
					echo $category_html;
					?>
				</div>
			</div>
		</div>
		<?php if ($hover == 'bordered'){ ?>
			<span class="edgtf-hover-border">
				<span class="edgtf-line-1"></span>
				<span class="edgtf-line-2"></span>
				<span class="edgtf-line-3"></span>
				<span class="edgtf-line-4"></span>
			</span>
		<?php } ?>
	</div>
</article>
