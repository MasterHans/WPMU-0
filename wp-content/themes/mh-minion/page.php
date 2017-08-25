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
            <img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/calendar.png" alt="картинка-календарь">
            <p>19 сентября 2015 г.</p>
            <img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/author.png" alt="картинка-автор">
            <p>Мастер Ганс</p>
            <img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/comments.png" alt="комментарии">
            <p>16</p>
        </div>

        <div class="rubrika-header">
            <p class="rubrika">Windows</p>
        </div>

        <!--            <a href="#"><img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/thumb.png" alt="Миниатюра"></a>-->

        <div class="text">
            <?php the_content() ?>

            <?php
            $posttags = get_the_tags();
            if ($posttags) {
            ?>
            <span class="label-metki">Метки страницы</span>
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