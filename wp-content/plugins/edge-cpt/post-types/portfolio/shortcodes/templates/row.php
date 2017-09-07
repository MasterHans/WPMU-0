<article class="edgtf-portfolio-row-item-holder edgtf-three-columns">
    <div class="edgtf-three-columns">
		<div class="edgtf-three-columns-inner edgtf-item-images-holder clearfix">
		    <?php if(!empty($images_html)) {
		        foreach ($images_html as $image_html) {
		            ?>
		            <div class="edgtf-column">
		                <div class="edgtf-column-inner">
		                    <a class='edgtf-portfolio-row-item-link' href="<?php echo esc_url($item_link); ?>">
		                        <?php print $image_html; ?>
		                    </a>
		                </div>
		            </div>
		        <?php }
		    }?>
		</div>
    </div>
    <div class="edgtf-item-text-holder">
        <<?php echo esc_attr($title_tag)?> class="edgtf-item-title">
		<a href="<?php echo esc_url($item_link); ?>">
			<?php echo esc_attr(get_the_title()); ?>
		</a>
		</<?php echo esc_attr($title_tag)?>>
    <?php
    print $category_html;
    ?>
	<?php if ($hover == 'outline'){ ?>
		<span class="edgtf-view-project">
		     <a href="<?php echo esc_url($item_link); ?>" class="edgtf-btn edgtf-btn-medium edgtf-btn-transparent edgtf-btn-icon"><span class="edgtf-btn-text"><?php esc_html_e('View Project','edge-cpt') ?></span><span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right edgtf-btn-icon-holder"></span></a>
        </span>
	<?php } ?>
    </div>
</article>
