<div class="edgtf-progress-bar">
	<<?php echo esc_attr($title_tag);?> class="edgtf-progress-title-holder clearfix">
		<span class="edgtf-progress-title"><?php echo esc_attr($title)?></span>
		<span class="edgtf-progress-number-wrapper <?php echo esc_attr($percentage_classes)?> " >
			<span class="edgtf-progress-number">
				<span class="edgtf-percent">0</span>
			</span>
		</span>
	</<?php echo esc_attr($title_tag)?>>
	<div class="edgtf-progress-content-outer" <?php ratio_edge_inline_style($percentage_inactive_style);?>>
		<div data-percentage=<?php echo esc_attr($percent)?> class="edgtf-progress-content" ></div>
	</div>
</div>	