<div class='edgtf-ptf-list-showcase-preview-item'>
    <?php if($three_images === 'yes'){ ?>
    <div class="edgtf-three-columns clearfix">
        <div class="edgtf-three-columns-inner">
    <?php }else{?>
    <div class="edgtf-two-columns-50-50 clearfix">
        <div class="edgtf-two-columns-50-50-inner">
    <?php } ?>
            <?php
            if(!empty($images_html)) {
                foreach ($images_html as $image_html) { ?>
                    <div class="edgtf-column">
                        <div class="edgtf-column-inner">
                            <a href="<?php echo esc_url($item_link); ?>" target="_blank">
                                <?php
                                print $image_html;
                                ?>
                            </a>
                        </div>
                    </div>
                <?php }
            }?>
        </div>
    </div>
	<div class="edgtf-ptf-list-showcase-preview-title-resp">
		<h4>
			<a href='<?php echo esc_url($item_link); ?>'><?php the_title(); ?></a>
		</h4>
	</div>
</div>