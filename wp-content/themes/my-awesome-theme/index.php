<?php get_header() ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post() ?>
           <?php get_template_part('template-parts/content','')?>
    <?php endwhile ?>
<?php else : ?>
           <?php get_template_part('template-parts/content','none')?>
    <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
    <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

    <?php the_posts_pagination(); ?>
<?php endif ?>

<?php get_footer() ?>