<?php
/*
Plugin Name: Custom query for recent post
Plugin URI: http://masterhans.ru
Description: Custom query for recent post
Author: Alexander Suvorov
Version: 1.0
Author URI: http://masterhans.ru/
*/

function wpmu_get_recent_posts()
{

    if (!is_home() && !is_page('countries')) {
        /*arguments*/
        $args = array(
            'sort_order' => 'desc',
            'sort_column' => 'date',
            'number' => '5',
        );

        // now run get_posts and check that any are returned
        $myposts = get_posts($args);
        if ($myposts) { ?>

            <h2>Latest Posts</h2>

            <?php // output the posts
            foreach ($myposts as $mypost) {

                setup_postdata($mypost);

                $postID = $mypost->ID; ?>

                <article class="post recent <?php echo $postID; ?>">

                    <h3><a href="<?php echo get_page_link($postID); ?>"><?php echo get_the_title($postID); ?></a></h3>
                    <section class="entry">
                        <?php the_excerpt($postID); ?>
                        <a href="<?php echo get_page_link($postID); ?>">Read More</a>
                    </section>
                </article>

            <?php }
        }


    }
}
add_action('wpmu_after_content', 'wpmu_get_recent_posts');