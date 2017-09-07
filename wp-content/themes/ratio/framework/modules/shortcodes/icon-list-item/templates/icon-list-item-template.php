<?php
$icon_html = ratio_edge_icon_collections()->renderIcon($icon, $icon_pack, $params);
?>
<div class="edgtf-icon-list-item">
	<div class="edgtf-icon-list-icon-holder">
        <div class="edgtf-icon-list-icon-holder-inner clearfix" <?php ratio_edge_inline_style($icon_holder);?>>
			<?php 
			print $icon_html;
			?>
		</div>
	</div>
	<p class="edgtf-icon-list-text" <?php echo ratio_edge_get_inline_style($title_style)?> > <?php echo wp_kses_post($title)?></p>
</div>