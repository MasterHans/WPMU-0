<?php if(!empty($lightbox)) : ?>
    <a title="<?php echo esc_attr($media['title']); ?>" data-rel="prettyPhoto[single_pretty_photo]" href="<?php echo esc_url($media['image_url']); ?>">
<?php endif; ?>

	<?php if ($gallery) { ?>
		<span class="edgtf-portfolio-gallery-text-holder">
			<span class="edgtf-portfolio-gallery-text-holder-inner">
				<h4><?php echo esc_html($media['title']); ?></h4>
			</span>
		</span>
	<?php } ?>
    <?php if($params['full-screen-slider']){ ?>
        <span class="edgtf-portfolio-slide-image" style="background-image:url('<?php echo esc_url($media['image_url']); ?>');"></span>
    <?php } else { ?>
    	<img src="<?php echo esc_url($media['image_url']); ?>" alt="<?php echo esc_attr($media['description']); ?>" />
    <?php } ?>

<?php if(!empty($lightbox)) : ?>
    </a>
<?php endif; ?>
