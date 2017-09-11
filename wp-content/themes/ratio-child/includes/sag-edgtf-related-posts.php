<?php

/**
 * Order an array of objects by object property
 */
function sag_orderby($a, $b)
{
    global $posts;
    $apos = array_search($a->ID, $posts);
    $bpos = array_search($b->ID, $posts);
    return ($apos < $bpos) ? -1 : 1;
}

if (!function_exists('sag_ratio_edge_get_related_post_type')) {
    /**
     * Function for returning latest posts types
     *
     * @param $post_id
     * @param array $options
     * @return WP_Query
     */
    function sag_ratio_edge_get_related_post_type($post_id, $options = array())
    {

        $post_type = get_post_type($post_id);

        //Get tags
        $tags = ($post_type == 'portfolio-item') ? wp_get_object_terms($post_id, 'portfolio-tag') : get_the_tags($post_id);

        //Get categories
        $categories = ($post_type == 'portfolio-item') ? wp_get_object_terms($post_id, 'portfolio-category') : get_the_category($post_id);

        //Sort tags according to "Sorting Hat"
        $tag_ids = array();
        if ($tags) {
            foreach ($tags as $tag) {
                $tag_id = $tag->term_id;
                $key_to_sort = intval(get_option("tag_$tag_id")['sorting_hat']);
                $tag_ids[$key_to_sort] = $tag->term_id;
            }
        }

        ksort($tag_ids);

        $category_ids = array();
        if ($categories) {
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
        }

        $hasRelatedByTag = false;
        $hasRelatedByCategory = false;

        if ($tag_ids) {

            if ($post_type == 'portfolio-item') {
                $related_by_tag = sag_ratio_edge_get_related_custom_post_type_by_param($post_id, $tag_ids, 'portfolio-tag', $options); //For Custom Posts
            } else {
                $related_by_tag = sag_ratio_edge_get_related_posts($post_id, $tag_ids, 'tag', $options);
            }

            if (!empty($related_by_tag->posts)) {
                $hasRelatedByTag = true;
                return $related_by_tag;
            }
            $hasRelatedByTag = false;

        }
        if ($categories && !$hasRelatedByTag) {

            if ($post_type == 'portfolio-item') {
                $related_by_category = sag_ratio_edge_get_related_custom_post_type_by_param($post_id, $category_ids, 'portfolio-category', $options);
            } else {
                $related_by_category = sag_ratio_edge_get_related_posts($post_id, $category_ids, 'category', $options);
            }

            if (!empty($related_by_category->posts)) {
                $hasRelatedByCategory = true;
                return $related_by_category;
            }
            $hasRelatedByCategory = false;

        }

    }

}

if (!function_exists('sag_ratio_edge_get_related_posts')) {
    /**
     * Function for related posts
     *
     * @param $post_id - Post ID
     * @param $term_ids - Category or Tag IDs
     * @param $slug - term slug for WP_Query
     * @param array $options
     * @return WP_Query
     */
    function sag_ratio_edge_get_related_posts($post_id, $term_ids, $slug, $options = array())
    {

        //Query options
        $posts_per_page = -1;

        //Override query options
        extract($options);

        $args = array(
            'post__not_in' => array($post_id),
            $slug . '__in' => $term_ids,
            'order' => 'DESC',
            'orderby' => 'date',
            'posts_per_page' => $posts_per_page
        );

        $related_posts = new WP_Query($args);

        return $related_posts;

    }
}

if (!function_exists('sag_ratio_edge_get_related_custom_post_type_by_param')) {
    /**
     * @param $post_id - Post ID
     * @param $term_ids - Category or Tag IDs
     * @param $taxonomy
     * @param array $options
     * @return WP_Query
     */
    function sag_ratio_edge_get_related_custom_post_type_by_param($post_id, $term_ids, $taxonomy, $options = array())
    {

        //Query options
        $posts_per_page = -1;

        //Override query options
        extract($options);

        if ($taxonomy == 'portfolio-tag') {

            $sorted_ids = [];

            foreach ($term_ids as $tag_id) {
                $related_args = [
                    'post__not_in' => array($post_id),
                    'post_type' => 'portfolio-item',
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field' => 'term_id',
                            'terms' => $tag_id,
                        ),
                    )
                ];

                $related_posts = get_posts($related_args);
                foreach ($related_posts as $related_post) {
                    if (!in_array($related_post->ID, $sorted_ids)) {
                        $sorted_ids[] = $related_post->ID;
                    }
                }
            }

            $args = array(
                'post__in' => $sorted_ids,
                'orderby' => 'post__in',
                'order' => 'ASC',
                'post_type' => 'portfolio-item',
                'posts_per_page' => $posts_per_page,
            );

        } else {
            $args = array(
                'post__not_in' => array($post_id),
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => $posts_per_page,
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'term_id',
                        'terms' => $term_ids,
                    ),
                )
            );

        }

        $related_by_taxonomy = new WP_Query($args);
        return $related_by_taxonomy;

    }

}