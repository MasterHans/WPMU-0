<div class="edgtf-pie-chart-with-icon-holder">
	<div class="edgtf-percentage-with-icon" <?php echo ratio_edge_get_inline_attrs($pie_chart_data); ?>>
		<?php print $icon; ?>
	</div>
	<div class="edgtf-pie-chart-text" <?php ratio_edge_inline_style($pie_chart_style)?>>
		<<?php echo esc_html($title_tag)?> class="edgtf-pie-title">
			<?php echo esc_html($title); ?>
		</<?php echo esc_html($title_tag)?>>
		<p class="edgtf-pie-text"><?php echo esc_html($text); ?></p>
	</div>
</div>