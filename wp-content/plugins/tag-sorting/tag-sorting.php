<?php
/*
Plugin Name: Custom tag order
Plugin URI: http://wordpress.org/plugins/tag-sorting/
Description: This plugin for making tags custom order
Author: Alexander Suvorov
Version: 1.0
Author URI: http://masterhans.ru/
*/


//add_filter('the_tags', 'sag_hook_the_tags');
//function sag_hook_the_tags($list) {
//    echo '<h1>' . 'the_tags' . '</h1>';
//    var_dump($list);
//    return $list;
//}
//
//add_filter('get_the_tags', 'sag_hook_get_the_tags');
//function sag_hook_get_the_tags($list) {
//    echo '<h1>' . 'get_the_tags' . '</h1>';
//    var_dump($list);
//    return $list;
//}

// Called in front-end via the_tags() or related variations of.
add_filter( 'get_the_terms', function($terms, $post_id, $taxonomy) {
    if ( $taxonomy != 'post_tag' || ! $terms ) {
        return $terms;
    }
//    var_dump($terms);
    foreach ( $terms as $term_id => $term ) {
        echo '<h2>' . $term->term_id . '</h2>';
    }

    return $terms;
}, 10, 3 );