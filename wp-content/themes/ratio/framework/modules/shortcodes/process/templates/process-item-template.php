<div <?php ratio_edge_class_attribute($item_classes); ?>>
	<?php if($link != '') { ?>
		<a class="edgtf-process-link" href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target) ?>">
	<?php } ?>
	<div class="edgtf-pi-holder-inner">
		<?php if(!empty($number)) : ?>
			<div class="edgtf-pi-number-holder" <?php ratio_edge_inline_style($number_holder_style); ?>>
				<span class="edgtf-pi-image" <?php ratio_edge_inline_style($image_style); ?>></span>
				<span class="edgtf-pi-arrow"><i class="icon-arrows-slim-right linea"></i></span>
				<span class="edgtf-pi-number" <?php ratio_edge_inline_style($number_style); ?>><?php echo esc_html($number); ?></span>
			</div>
		<?php endif; ?>
		<?php if(!empty($title) || !empty($text)) : ?>
			<div class="edgtf-pi-content-holder">
				<?php if(!empty($title)) : ?>
					<div class="edgtf-pi-title-holder">
						<h4 class="edgtf-pi-title"><?php echo esc_html($title); ?></h4>
					</div>
				<?php endif; ?>

				<?php if(!empty($text)) : ?>
					<div class="edgtf-pi-text-holder">
						<p><?php echo esc_html($text); ?></p>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
	<?php if($link != '') { ?>
		</a>
	<?php } ?>
</div>