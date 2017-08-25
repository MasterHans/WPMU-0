<?php get_header() ?>
<div class="page-top">
	<div class="parallax" style="background:url(<?php echo get_template_directory_uri() ?>/images/parallax1.jpg);"></div>
	<div class="container">
        <?php
        /*Выделить последнее слово в названии*/
        $post_name = get_the_title($post->ID);
        $post_name_arr = explode(' ', $post_name);
        $post_name_last_word = array_pop($post_name_arr);
        $post_others_words = implode(' ',$post_name_arr);

        ?>
        <h1><?php echo $post_others_words ?> <span><?php echo $post_name_last_word?></span></h1>
        <ul>
            <?php the_breadcrumb(); ?>
        </ul>
	</div>
</div><!--- PAGE TOP -->

<section>
	<div class="block">
		<div class="container">
			<div class="row">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-md-8 column">
                            <div class="single-page">
                                <?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'full-size-image',NULL,'featured-image-770-500'); ?>
                                <h2><?php the_title(); ?></h2>
                                <div class="meta">
                                    <ul>
                                        <li><i class="fa fa-reply"></i> Опубдиковано в Новостях</li>
                                        <li><i class="fa fa-calendar-o"></i><?php the_time('j M. Y') ?></li>
                                        <li><i class="fa fa-user"></i><?php the_author(); ?></li>
                                    </ul>
                                    <?php echo get_avatar( get_the_author_meta('user_email'), 80 ); ?>
                                </div><!-- POST META -->

                            </div><!-- SERMON SINGLE -->

                            <div class="content-text">
                                <?php the_content(); ?>
                            </div>


                            <div class="share-this">
                                <h5><i class="fa fa-share"></i> ПОДЕЛИТЬСЯ ЭТОЙ НОВОСТЬЮ</h5>
                                <ul class="social-media">
                                    <?php
                                    $idObj = get_category_by_slug('socials');/*Получаем категорию по слагу*/
                                    $soc_id = $idObj->term_id;
                                    $args = ['category' => $soc_id];
                                    $myposts = get_posts( $args );
                                    foreach( $myposts as $post ){ setup_postdata($post);
                                        // стандартный вывод записей
                                        ?>
                                        <li><a title="<?php the_title(); ?>" href="<?php echo get_post_meta($post->ID,'social_url',true) ?>" target="_blank"><i class="fa <?php echo get_post_meta($post->ID,'font_awesome',true) ?>"></i></a></li>
                                    <?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
                                </ul>
                                </ul>
                            </div><!-- SHARE THIS -->
                    <?php endwhile; ?>
                <?php endif; ?>
			</div>
            <?php get_sidebar('cats-zhizn-tsentra'); ?>
		</div>
	</div>
</section>
<?php get_footer() ?>