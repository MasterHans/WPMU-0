<div class="edgtf-ptf-list-showcase-meta-item">
	<?php if ($additional_data == 'year'){ ?>
    	<span class="edgtf-ptf-meta-item-date-year"><?php the_time('Y'); ?></span>
    <?php }
    else {
    	print $category_html;
    } ?>
    <<?php echo esc_attr($title_tag)?> class="edgtf-ptf-meta-item-title">
        <a href='<?php echo esc_url($item_link); ?>'><?php the_title(); ?></a>
    </<?php echo esc_attr($title_tag)?>>
    <h6 class="edgtf-ptf-view-holder">
    	<a href='<?php echo esc_url($item_link); ?>'><?php esc_html_e('View','edge-cpt'); ?></a>
    </h6>
</div>