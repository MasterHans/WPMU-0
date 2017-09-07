<?php $i = 0; ?>
<div class="edgtf-advanced-carousel" <?php echo ratio_edge_get_inline_attrs($carousel_data); ?>>
	<div class="edgtf-advanced-carousel-images">
		<?php foreach ($images as $image) { ?>
			<div class="edgtf-advanced-carousel-item">
				<div class="edgtf-advanced-carousel-item-inner">
					<?php if(!empty($links[$i])) { ?>
		                <a class="edgtf-advanced-carousel-link" href="<?php echo esc_url($links[$i]) ?>" title="<?php echo esc_attr($image['title']); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
		            <?php } ?>
					<img src="<?php echo esc_url($image['url'])?>" alt="<?php echo esc_attr($image['title']); ?>" width="<?php echo esc_attr($image['width']); ?>" height="<?php echo esc_attr($image['height']); ?>">
					<?php if(!empty($links[$i])) { ?>
						</a>
					<?php } ?>
				</div>
				<?php if (!empty($image['title'])) { ?>
					<div class="edgtf-item-title">
						<h4>
							<?php if (!empty($links[$i])) { ?>
								<a href="<?php echo esc_url($links[$i]) ?>" target="<?php echo esc_attr($custom_link_target); ?>">
							<?php } ?>
								<?php echo esc_attr($image['title'])?>
							<?php if (!empty($links[$i])) { ?>
								</a>
							<?php } ?>
						</h4>
					</div>
				<?php } ?>
				<?php $i++; ?>
			</div>
		<?php } ?>
	</div>
</div>