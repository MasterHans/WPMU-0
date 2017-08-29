<div id="post-content" class="<?php post_class(); ?>">
    <div class="featured-image" style="display:<?php echo has_post_thumbnail() ? 'block' : 'none'; ?>">
        <?php the_post_thumbnail([300,300])?>
    </div>
    <h2><a href='<?php the_permalink() ?>'><?php the_title() ?></a></h2>
