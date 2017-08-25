<?php get_header(); ?>

<div id="Content">

    <div id="content-header">
    </div>

    <div id="main-content">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="post">
            <a href="<?php the_permalink(); ?>"><img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/thumb.png" alt="Миниатюра"></a>

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <div class="postdate">
                <img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/calendar.png" alt="картинка-календарь">
                <p>19 сентября 2015 г.</p>
                <img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/author.png" alt="картинка-автор">
                <p>Мастер Ганс</p>
                <img src="http://wp.tw1.su/wp-content/themes/mh-minion/img/comments.png" alt="комментарии">
                <p><?php comments_popup_link('0','1','%');?></p>
            </div>

            <div class="rubrika-header">
                <p class="rubrika">Windows</p>
            </div>

            <?php the_excerpt(); ?>

            <div class="readmorecontent">
                <a href="<?php the_permalink(); ?>">Далее</a>
            </div>

        </div>

        <?php endwhile; ?>
        <div class="navigation">

            <div class="pagenavi"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div><!--end pagination-->


        </div>
        <?php else : ?>
        <?php endif; ?>


    </div>

    <?php get_sidebar(); ?>
    <div id="clear"></div>
    <div id="navigation">
        <div id="pagenavi">
            <span class="pages">Страница 1 из 27</span>
            <span class="current">1</span>
            <a class="page larger" href="#">2</a>
            <a class="page larger" href="#">3</a>
            <a class="page larger" href="#">4</a>
            <a class="page larger" href="#">5</a>
            <a class="page larger" href="#">»</a>
            <a class="last" href="#">Последняя »</a>


        </div>
    </div>

    <div id="clear"></div>



<?php get_footer(); ?>

