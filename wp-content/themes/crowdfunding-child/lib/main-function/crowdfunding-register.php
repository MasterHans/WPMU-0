<?php 

/*-------------------------------------------*
 *      Themeum Widget Registration
 *------------------------------------------*/

if(!function_exists('motivation_crowdfunding_widdget_init')):

    function motivation_crowdfunding_widdget_init()
    {

        register_sidebar(array( 
                'name'          => __( 'Motivation Bottom Left', 'crowdfunding' ),
                'id'            => 'mt-bottom-left',
                'description'   => __( 'Widgets in this area will be shown before Footer left.' , 'crowdfunding'),
                'before_title'  => '<h3 class="mt_widget_title" style="display: none">',
                'after_title'   => '</h3>',
                'before_widget' => '<div><div id="mt_bottom_menu_left" class="mt_widget mt_bottom_menu_left" >',
                'after_widget'  => '</div></div>'
                )
        );
        register_sidebar(array(
                'name'          => __( 'Motivation Bottom Center', 'crowdfunding' ),
                'id'            => 'mt-bottom-center',
                'description'   => __( 'Widgets in this area will be shown before Footer center.' , 'crowdfunding'),
                'before_title'  => '<h3 class="mt_widget_title" style="display: none">',
                'after_title'   => '</h3>',
                'before_widget' => '<div><div id="mt_bottom_menu_center" class="mt_widget mt_bottom_menu_center" >',
                'after_widget'  => '</div></div>'
            )
        );

        register_sidebar(array(
                'name'          => __( 'Motivation Bottom Right', 'crowdfunding' ),
                'id'            => 'mt-bottom-right',
                'description'   => __( 'Widgets in this area will be shown before Footer right.' , 'crowdfunding'),
                'before_title'  => '<h3 class="mt_widget_title" style="display: none">',
                'after_title'   => '</h3>',
                'before_widget' => '<div><div id="mt_bottom_menu_right" class="mt_widget mt_bottom_menu_right" >',
                'after_widget'  => '</div></div>'
            )
        );

    }
    
    add_action('widgets_init','motivation_crowdfunding_widdget_init');

endif;