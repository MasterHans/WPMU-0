<?php
$tags = wp_get_post_terms(get_the_ID(), 'portfolio-tag');
$tag_names = array();

if(is_array($tags) && count($tags)) :
    $tag_names = [];
    foreach($tags as $tag) {
        $tag_id = $tag->term_id;
        $key_to_sort = intval(get_option("tag_$tag_id")['sorting_hat']);
        $tag_names[$key_to_sort] = $tag->name;
    }
    ksort($tag_names);
    ?>
    <div class="edgtf-portfolio-info-item edgtf-portfolio-tags">
        <h4><?php esc_html_e('Tags:', 'ratio'); ?></h4>
        <p>
            <?php echo esc_html(implode(', ', $tag_names)); ?>
        </p>
    </div>
<?php endif; ?>
