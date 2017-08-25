<?php get_header() ?>

<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery lightbox">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
                            <a href="<?php echo wp_get_attachment_image_src( $post -> ID,[770,500])[0]; ?>" title="СССАаааюбьбь">
                                <img src="<?php echo wp_get_attachment_image_src( $post -> ID,[770,500])[0]; ?>" alt="" title="<?php the_title(); ?>">
                            </a>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div><!-- GALLERY ITEM -->
                </div>

            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>

