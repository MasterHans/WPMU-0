<?php
/**
 * Numbered Title shortcode template
 */
?>
<div class="edgtf-numbered-title">
	<div class="edgtf-nt-number" <?php ratio_edge_inline_style($number_style); ?>>
		<span>
			<?php echo esc_attr($number); ?>
		</span>
	</div>
	<div class="edgtf-nt-title-subtitle-holder">
		<<?php echo esc_attr($title_tag); ?> class="edgtf-nt-title" <?php ratio_edge_inline_style($title_style); ?>>
			<?php echo esc_html($title);?>
		</<?php echo esc_attr($title_tag); ?>>
	</div>
</div>