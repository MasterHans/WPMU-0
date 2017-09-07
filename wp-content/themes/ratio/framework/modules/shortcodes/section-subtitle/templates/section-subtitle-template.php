<?php
/**
 * Section Subtitle shortcode template
 */
?>

<p class="edgtf-section-subtitle <?php echo esc_attr( $css_class ); ?>" <?php ratio_edge_inline_style($subtitle_style); ?>>
	<?php echo esc_html($subtitle_text);?>
</p>