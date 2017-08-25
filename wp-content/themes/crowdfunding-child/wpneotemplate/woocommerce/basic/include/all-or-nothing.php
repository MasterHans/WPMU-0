<?php
global $product, $post;
$date_end = get_post_meta($post->ID, '_nf_duration_end', true);
?>

<p class="mb3 mb0-lg type-12">
    <span class="link-navy medium">
        <a class="mt-all-or-nothing-modal-btn navy-700 pointer" href="javascript:;">
            All or nothing.
        </a>
    </span>
    This project will only be funded if it reaches its goal by
    <time datetime="<?=motivation_date_tag_format($date_end)?>" data-format="llll z"
          class="js-adjust-time"><?=motivation_date_output_format($date_end)?>
    </time>
    .
</p>

<!-- Modal Content -->
<div class="mt-all-or-nothing-modal-wrapper">
    <div class="mt-modal-content">
        <div class="mt-modal-wrapper-head">
            <h4><?php _e('Why is funding all-or-nothing?', 'wp-crowdfunding'); ?></h4>
            <a href="javascript:;" class="wpneo-modal-close">&times;</a>
        </div>
        <div class="mt-modal-content-inner">
            <?php
            /*Get All or nothing page by slug all-or-nothing*/
            $args = ['name' => 'all-or-nothing', 'post_type' => 'page', 'post_status' => 'publish'];
            $myposts = get_posts($args);
            foreach ($myposts as $post) {
                setup_postdata($post);
                //стандартный вывод записей
                the_content() ?>
            <?php }
            wp_reset_postdata(); // сбрасываем переменную $post ?>

        </div>
    </div>
</div>
