<?php
/**
 * Blockquote shortcode template
 */
?>

<blockquote class="edgtf-blockquote-shortcode" <?php ratio_edge_inline_style($blockquote_style); ?> >
	<span class="edgtf-icon-quotations-holder">
		<?php echo ratio_edge_icon_collections()->getQuoteIcon("font_elegant", true); ?>
	</span>
	<span class="edgtf-blockquote-text">
		<?php echo esc_attr($text); ?>
	</span>
</blockquote>