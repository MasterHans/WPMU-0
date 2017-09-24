<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

    <?php if (is_front_page()) {
        return;
    } else { ?>
        <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"
                                  title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h1>
        <?php if (is_singular('post')) { ?>
            <div class="entry-meta-before">
                    <p>Written by <?php the_author_posts_link(); ?> on <?php the_date(); ?>.</p>
                    <?php echo get_the_term_list($post->ID, 'category', '<p>Posted in: ', ',', '</p>') ?>
                    <?php echo get_the_tag_list('<p>Tags: ', ', ', '</p>'); ?>
            </div>
        <?php } ?>
    <?php } ?>

    <div class="entry-content">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('large'); ?>
        </a>
        <?php the_content('<p class="left"></p>'); ?>
    </div>
    <!--.entry-content-->
    <?php if (is_singular('project')) { ?>
        <div class="entry-meta">
            <?php the_terms($post->ID, 'service', 'Services: ', ', '); ?>
        </div>

    <?php } else if (is_singular('post')) { ?>
        <!--        <div class="entry-meta">-->
        <!--            --><?php //the_meta(); ?>
        <!--        </div>-->
    <?php } ?>

</article>

