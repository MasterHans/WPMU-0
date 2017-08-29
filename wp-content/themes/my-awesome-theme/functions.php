<?php

function theme_assets() {
    wp_enqueue_style( 'my-awesome-theme-style-reset', get_template_directory_uri() . 'reset.css');
    wp_enqueue_style( 'my-awesome-theme-style', get_stylesheet_uri(), ['my-awesome-theme-style-reset']);

}
add_action( 'wp_enqueue_scripts', 'theme_assets' );

function awesome_widget_areas() {
    register_sidebar( array(
        'name' => 'Theme Sidebar',
        'id' => 'awesome-sidebar',
        'description' => 'The main sidebar shown on the right in our awesome theme',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar( array(
        'name' => 'Theme2Sidebar2',
        'id' => 'awesome2-sidebar',
        'description' => 'The main sidebar shown on the right in our awesome theme',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}

add_action( 'widgets_init', 'awesome_widget_areas' );


register_nav_menus( array(
    'header-menu' => 'Our Awesome Header Menu',
) );

add_theme_support( 'post-thumbnails' );