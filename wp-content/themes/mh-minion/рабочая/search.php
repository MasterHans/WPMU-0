<?php get_header(); ?>
    <div id="Content">

    <div id="content-header">
    </div>

    <div id="main-content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="post">
                    <a href="<?php the_permalink(); ?>">
                        <!--                <img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/thumb.png" alt="Миниатюра">-->
                        <?php
                        if ( function_exists( 'add_theme_support' ) )
                            the_post_thumbnail( array(250,9999), array('class' => 'img-polaroid') );
                        ?>
                    </a>

                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <div class="postdate">
                        <img src="<?php bloginfo('template_url'); ?>/img/calendar.png" alt="картинка-календарь">
                        <?php the_time('F jS, Y') ?>
                        <img src="<?php bloginfo('template_url'); ?>/img/author.png" alt="картинка-автор">
                        <?php the_author() ?>

                        <?php if (current_user_can('edit_post', $post->ID)) { ?>
                            <img src="<?php bloginfo('template_url'); ?>/img/edit.png" />
                            <?php edit_post_link('Редактировать', '', '');
                        } ?>

                        <img src="<?php bloginfo('template_url'); ?>/img/comments.png" alt="комментарии">
                        <?php comments_popup_link('0','1','%');?>
                    </div>

                    <div class="rubrika-header">
                        <p class="rubrika">
                            <?php
                            $category = get_the_category();
                            echo $category[0]->cat_name;
                            ?>
                        </p>
                    </div>


                    <?php the_excerpt(); ?>

                    <div class="readmorecontent">
                        <a href="<?php the_permalink(); ?>">Далее</a>
                    </div>
                    <hr>
                </div>

            <?php endwhile; ?>




        <?php else : ?>
            <div class="search-result">Поиск не дал результатов.</div>
        <?php endif; ?>

    </div>

    <?php get_sidebar(); ?>

    <div class="clear"></div>

<?php get_footer(); ?>