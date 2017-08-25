<?php get_header(); ?>
    <div class="container contentwrap">
        <div class="container col-lg-9 content">
            <div class="row masonry"  data-columns>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="post">
                            <div class="thumbnail">
                                <p class="col-xs-6 post-date"><?php the_time('j M. Y') ?></p>
                                <p class="col-xs-6 post-rubrika">
                                    <?php
                                    $category = get_the_category();
                                    echo $category[0]->cat_name;
                                    ?>
                                </p>
                                <!--                            <img src="http://placekitten.com/g/600/340" alt="" class="img-responsive">-->
                                <?php
                                if ( function_exists( 'add_theme_support' ) )
                                    the_post_thumbnail( array(250,9999), array('class' => 'img-polaroid') );
                                ?>
                                <div class="caption">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-next">Подробнее <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>


                <?php else : ?>
                    <div class="search-result">Поиск не дал результатов</div>
                <?php endif; ?>

            </div>


        </div>

        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>