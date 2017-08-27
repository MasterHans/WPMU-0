<?php get_header(); ?>

    <div class="container">
        <div class="content">
            <?php if (have_posts()) : ?>

                <?php $title = $wp_query->get_queried_object(); ?>

                <h1>
                    <?php
                    echo 'Archive for ';
                    // echo out correct title depending on archive type
                    if (is_day()) {
                        echo the_time('F jS, Y');
                    } elseif (is_month()) {
                        echo the_time('F Y');
                    } elseif (is_year()) {
                        echo the_time('Y');
                    } else {
                        echo $title->name;
                    }
                    ?>
                </h1>

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('loop'); ?>

                <?php endwhile; ?>
                <?php the_posts_pagination(array(
                    'prev_text' => 'Previous page',
                    'next_text' => 'Next page',
                    'before_page_number' => 'Page:',
                )); ?>
            <?php else: ?>
                <h3>Nothing has fiund. Sorry. Please try again:</h3>
                <?php get_search_form(); ?>
            <?php endif; ?>

        </div>
        <!--.content-->

        <?php get_sidebar(); ?>

    </div><!--.container-->

<?php get_footer(); ?>