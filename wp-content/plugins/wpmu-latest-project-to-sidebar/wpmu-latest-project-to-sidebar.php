<?php
/**
 * Plugin Name:   WPMU Intermediate Plugin latest project to sidebar
 * Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
 * Description:   Add latest project to after sidebar hook
 * Version:       1.0
 * Author:        Rachel McCollin
 * Author URI:    http://rachelmccollin.co.uk
 *
 */

/*********************************************************************************
 * Enqueue stylesheet
 *********************************************************************************/
function wpmu_hook_enqueue_styles()
{

    wp_register_style('latest_project_css', plugins_url('public/css/style.css', __FILE__));
    wp_enqueue_style('latest_project_css');

}

add_action('wp_enqueue_scripts', 'wpmu_hook_enqueue_styles');

function wpmu_latest_project()
{
    global $wp_query;
    //TODO Ask about global $wp_query

    // basic arguments for query
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => 1
    );


    // On a service archive page, remove that service form the query so it isn’t duplicated in the sidebar

//    $current_service = $wp_query->get_queried_object();
//    if (is_tax()) {
//        var_dump($current_service->taxonomy);
//    }
//
//    $args = array(
//        'post_type' => 'project',
//        'posts_per_page' => 1,
//        'tax_query' => array(
//            array(
//                'taxonomy' => 'service',
//                'field' => 'term_id',
//                'terms' => array($current_service->term_id),
//                'operator' => 'NOT IN',
//            ),
//        ),
//    );
    //Have a different project displayed each time the screen is refreshed
//    $args = array(
//        'post_type' => 'project',
//        'orderby'        => 'rand',
//        'posts_per_page' => 1
//    );

    // Use another taxonomy for featured projects and display only those.
    //TODO Paraphrase it. What the difference between this to tasks

    //Use a conditional tag to only run the query on Pages or the main blog page, for example.
    //TODO No logic - If the main Blog is page it is actually already  "Pages"
    if (is_page()) {
        // run the query
        $query = new WP_query ($args);
//    var_dump($query);
        // check the query returns posts
        if ($query->have_posts()) { ?>

            <section class="projects">

                <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <?php //contents of loop ?>
                    <h3>Latest Project - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                    <?php the_excerpt(); ?>

                <?php endwhile; ?>

                <?php rewind_posts(); ?>
                <div class="read-more">
                    <a href="<?php the_permalink(); ?>">Read More</a>
                </div>
            </section>
            }
        <?php }
    }
}

add_action('wpmu_after_sidebar', 'wpmu_latest_project');