<button type="submit" <?php ratio_edge_inline_style($button_styles); ?> <?php ratio_edge_class_attribute($button_classes); ?> <?php echo ratio_edge_get_inline_attrs($button_data); ?> <?php echo ratio_edge_get_inline_attrs($button_custom_attrs); ?>>
    <span class="edgtf-btn-text"><?php echo esc_html($text); ?></span><?php echo ratio_edge_icon_collections()->renderIcon($icon, $icon_pack, $icon_params_array); ?>
    <span class="edgtf-btn-background-holder" <?php ratio_edge_inline_style($button_background_styles); ?>></span>
    <span class="edgtf-btn-background-hover-holder" <?php ratio_edge_inline_style($button_background_hover_styles); ?>></span>
</button>