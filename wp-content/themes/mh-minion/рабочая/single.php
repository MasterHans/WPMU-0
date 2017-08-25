<?php get_header(); ?>

<div id="Content">

    <div id="content-header">
    </div>

    <div id="main-content">

        <ul class="breadcrumb">
            <?php the_breadcrumb(); ?>
        </ul>


	    <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
        <div class="post">

            <h2><?php the_title(); ?></h2>

            <div class="clear"></div>

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


            <div class="text">
                <?php the_content() ?>

                <?php
                $posttags = get_the_tags();
                if ($posttags) {
                ?>
                    <span class="label-metki">Метки статьи</span>
                    <div class="meta"><i class="fa fa-tags"></i>
                    <?php foreach($posttags as $tag) {
                                $tag_links[] = '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                    }
                                echo join( ', ', $tag_links );
                                echo "</div>";
                }
                ?>


            </div>

<!--            <h3 class="comment-header">Комментарии <span><img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/comments.png" alt="комментарии"><a href="#">16</a></span></h3>-->

                <?php comments_template(); ?>



        <?php endwhile; ?>
        <?php endif; ?>

        </div>
    </div>
    <?php get_sidebar(); ?>

    <div class="clear"></div>

<?php get_footer(); ?>