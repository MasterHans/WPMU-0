<?php get_header(); ?>
<div class="container contentwrap">
    <div class="container col-lg-9 content">

        <ul class="breadcrumb post-breadcrumb">
            <?php the_breadcrumb(); ?>
        </ul>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="post">
                <div class="thumbnail fullpost">
                    <p class="col-xs-6 post-date"><?php the_time('j M. Y') ?></p>
                    <p class="col-xs-6 post-rubrika">
                        <?php
                        $category = get_the_category();
                        echo $category[0]->cat_name;
                        ?>
                    </p>
<!--                    <img src="http://placekitten.com/g/600/340" alt="" class="img-responsive">-->
                    <div class="caption">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title() ; ?></a></h3>
                        <?php the_content() ?>
<!--                        <p>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации</p>-->
                        <!--<a href="#" class="btn btn-primary btn-next">Подробнее <i class="fa fa-arrow-right"></i></a>-->

                    </div>
                </div>
            </div>
                    <?php
                    $posttags = get_the_tags();
                    if ($posttags) {
                    ?>

                    <div class="meta"><i class="fa fa-tags"></i>
                        <?php foreach($posttags as $tag) {
                            $tag_links[] = '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                        }
                        echo join( ', ', $tag_links );
                        echo "</div>";
                        }
                        ?>
            <div class="commentwrap">
<!--                <h3>Комментарии <span><i class="fa fa-comments"></i> <a href="#">11</a></span></h3>-->

                <?php comments_template(); ?>

            </div>
        <?php endwhile; ?>
    <?php endif; ?>

    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>