<?php if($icon_animation_holder) : ?>
    <span class="edgtf-icon-animation-holder" <?php ratio_edge_inline_style($icon_animation_holder_styles); ?>>
<?php endif; ?>

    <span <?php ratio_edge_class_attribute($icon_holder_classes); ?> <?php ratio_edge_inline_style($icon_holder_styles); ?> <?php echo ratio_edge_get_inline_attrs($icon_holder_data); ?>>
        <?php if ($type == 'circle' || $type == 'square') { ?>
        <span class="edgtf-icon-background-holder" <?php ratio_edge_inline_style($background_holder_styles);?>></span>
        <span class="edgtf-icon-background-hover-holder" <?php ratio_edge_inline_style($background_hover_holder_styles);?>></span>
        <?php } ?>
        <?php if($link !== '') : ?>
            <a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php ratio_edge_class_attribute($link_class) ?>>
        <?php endif; ?>

        <?php echo ratio_edge_icon_collections()->renderIcon($icon, $icon_pack, $icon_params); ?>

        <?php if($link !== '') : ?>
            </a>
        <?php endif; ?>
    </span>

<?php if($icon_animation_holder) : ?>
    </span>
<?php endif; ?>
