<aside class="col-md-4 sidebar column">
    <div class="widget">
        <div class="widget-title"><h4>Наша галерея</h4></div>
        <div class="gallery-widget lightbox">
            <?php
            $idObj = get_category_by_slug('galereya');/*Получаем категорию по слагу*/
            $parent_cat_id = $idObj->term_id;
            $categories = get_categories('child_of=' . $parent_cat_id . '&hide_empty=0' . '&exclude=33,34,35,41' . '&orderby=rand' . '&order=ASC');
            shuffle( $categories );
            $i = 1; //для ограничения кол-ва выводимых картинок

            //Основной цикл
            foreach ($categories as $child_cat) { ?>
                <?php
                $args = ['category' => $child_cat -> term_id, 'orderby' => 'rand', 'posts_per_page' => '-1'];
                $myposts = get_posts( $args );
                    foreach( $myposts as $post ){ setup_postdata($post);
                        //стандартный вывод записей
                        //получаем все картинки из галлереи поста в виде массива
                        $gallery = get_post_gallery( get_the_ID(), false );
                        $ids_images = explode(',', $gallery['ids']);

                        //получаем объект $attachments из медиа библиотеки по ID в виде массива где ключом является ключ массива $ids_images
                        $args = array( 'include' => $gallery['ids'], 'post_mime_type' => 'image', 'post_type' => 'attachment', 'post_parent' => null, 'orderby' => 'rand', 'order' => 'ASC');
                        $attachments = get_children($args);
                        $gallery_attachments_ids = [];

                        if (!empty($gallery)) {
                            foreach ($attachments as $attachment) {
                                if (!empty($attachment->guid)) {
                                    $gallery_attachments_ids [array_search($attachment->ID, $ids_images)] = $attachment->ID;
                                };
                            };
                            foreach ($gallery_attachments_ids as $gallery_attachment_id) {
                            if( 8>=$i ) { ?>
                                <div class="col-md-3">
                                   <a href="<?php echo wp_get_attachment_image_url($gallery_attachment_id, [770, 500]); ?>" title="">
                                        <img src="<?php echo wp_get_attachment_image_url($gallery_attachment_id, [84, 80]); ?>" alt=""
                                            title="<?php echo get_the_title($gallery_attachment_id) ?>"/>
                                   </a>
                                </div>
                            <?php } ?>

                            <?php $i++;};
                        }; ?>
                <?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
            <?php }; wp_reset_postdata(); // сбрасываем переменную $post ?>
        </div>
    </div><!-- GALLERY -->

    <?php
        $idObj = get_category_by_slug('lechenie-v-tsentre');/*Получаем категорию по слагу*/
        $parent_cat_id = $idObj->term_id;
        $categories = get_categories('child_of=' . $parent_cat_id . '&hide_empty=0');
    //Сортировка по произвольному полю категории cat_sort
    foreach ($categories as $category) {
        $cat_data = get_option("category_" . $category -> term_id);
        $my_cats[(int)$cat_data['cat_sort']] = $category->term_id;
    }
    ksort($my_cats);?>

    <div class="widget">
        <div class="widget-title"><h4><?php echo get_cat_name($parent_cat_id) ?></h4></div>
        <ul>
            <?php //Основной цикл
            foreach ($my_cats as $child_cat_id) { ?>
                <li><a href="<?php echo get_category_link($child_cat_id) ?>" title="<?php echo get_cat_name($child_cat_id) ?>"><i class="fa fa-hand-o-right"></i><?php echo get_cat_name($child_cat_id) ?></a></li>
            <?php }; ?>
        </ul>
    </div><!-- CATEGORIES -->

    <div class="widget">
        <div class="widget-title"><h4>Отзывы о нас</h4></div>
        <div class="remove-ext">
            <?php
            $idObj = get_category_by_slug('otzyivyi');/*Получаем категорию по слагу*/
            $cat_otziv_id = $idObj->term_id;
            $args = ['category' => $cat_otziv_id, 'orderby' => 'rand', 'order' => 'ASC', 'showposts' => '2'];
            $myposts = get_posts( $args );
            foreach( $myposts as $post ){ setup_postdata($post);
                // стандартный вывод записей
                ?>
                <div class="widget-blog">

                    <div class="widget-blog-img">
                        <?php echo the_post_thumbnail( [97,97] ); ?>
                    </div>
                    <h6><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h6>
                    <p><?php echo get_post_meta($post->ID,'description',true); ?></p>
                    <span><i class="fa fa-calendar-o"></i><?php the_time('j M. Y') ?></span>
                </div><!-- WIDGET BLOG -->
            <?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
        </div>
    </div><!-- RECENT BLOG -->

    <div class="widget">
        <?php
        $idObj = get_category_by_slug('video');/*Получаем категорию по слагу*/
        $cat_video_id = $idObj->term_id;
        $args = ['cat' =>  $cat_video_id, 'orderby' => 'rand', 'order' => 'ASC', 'showposts' => '1'];
        $myposts = get_posts( $args );
        foreach( $myposts as $post ){ setup_postdata($post);
            // стандартный вывод записей
            ?>
            <div class="widget-title"><h4><?php the_title() ?></h4></div>
            <div class="video">
                <?php the_content() ?>
            </div>
        <?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
    </div><!-- VIDEO -->


    <div class="widget">
        <div class="widget-title"><h4>ДОКУМЕНТЫ</h4></div>
        <?php
            $idObj = get_category_by_slug('docs');/*Получаем категорию по слагу*/
            $cat_video_id = $idObj->term_id;
            $args = ['cat' =>  $cat_video_id, 'orderby' => 'rand', 'order' => 'ASC', 'showposts' => '1'];
            $myposts = get_posts( $args );
        foreach( $myposts as $post ){ setup_postdata($post);
        // стандартный вывод записей
        ?>
            <a href="<?php echo the_permalink() ?>" title="<?php echo the_title() ?>"><?php echo the_post_thumbnail( [355,250] ); ?></a>
        <?php } wp_reset_postdata(); // сбрасываем переменную $post ?>
    </div><!-- META -->
</aside><!-- SIDEBAR -->