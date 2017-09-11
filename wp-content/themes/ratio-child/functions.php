<?php

/***  Enqueue child theme stylesheet ***/

function ratio_edge_child_enqueue_style() {
	// enqueue parent styles
	wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
//	wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
//	wp_enqueue_style( 'childstyle' );
}
add_action( 'wp_enqueue_scripts', 'ratio_edge_child_enqueue_style');

/*include the function for related posts displaying*/
require_once get_stylesheet_directory() . '/includes/sag-edgtf-related-posts.php';
