<?php

function cmp($a, $b)
{
    if ($a['priority'] == $b['priority']) {
        return 0;
    }
    return ($a['priority'] < $b['priority']) ? -1 : 1;
}

/*filter on motivation tabs*/
if (!function_exists('motivation_default_single_campaign_tabs')) {

    function motivation_default_single_campaign_tabs($tabs)
    {
        global $product, $post;

        // Description tab - shows product content
        if ($post->post_content) {
            $tabs['description'] = array(
                'title' => __('Campaign', 'wp-crowdfunding'),
                'priority' => 5,
                'callback' => 'wpneo_crowdfunding_campaign_story_tab'
            );
        }
        //Add FAQ tab
        $tabs['faq'] = array(
            'title' => __('FAQ', 'wp-crowdfunding'),
            'priority' => 7,
            'callback' => 'motivation_campaign_faq'
        );


        //rename Reviews to Comments
        if (isset($tabs['reviews'])) {
            $tabs['reviews'] = array(
                'title' => sprintf(__('Comments (%d)', 'wp-crowdfunding'), $product->get_review_count()),
                'priority' => 30,
                'callback' => 'comments_template'
            );
        }
        //Delete Backers
        unset($tabs['baker_list']);
        uasort($tabs, 'cmp');

        return $tabs;
    }
}


if (!function_exists('motivation_pledge_without_reward_form')) {
    function motivation_pledge_without_reward_form()
    {
        wpneo_crowdfunding_load_template('include/tabs/pledge_without_reward_form');
    }
}

if (!function_exists('motivation_campaign_faq')) {
    function motivation_campaign_faq()
    {
        wpneo_crowdfunding_load_template('include/tabs/campaign_faq');
    }
}


//if (!function_exists('motivation_choose_pledges_page')) {
//    function motivation_choose_pledges_page()
//    {
//        wpneo_crowdfunding_load_template('include/choose_pledges_page');
//    }
//}

if (!function_exists('motivation_loop_item_funding_percent')) {
    function motivation_loop_item_funding_percent()
    {
        wpneo_crowdfunding_load_template('include/loop/funding_percent');
    }
}

if (!function_exists('motivation_svg_icons_system')) {
    function motivation_svg_icons_system()
    {
        wpneo_crowdfunding_load_template('include/svg-icons-system');
    }
}

if (!function_exists('motivation_social_share')) {
    function motivation_social_share()
    {
        wpneo_crowdfunding_load_template('include/social-share');
    }
}

if (!function_exists('motivation_single_campaign_all_or_nothing')) {
    function motivation_single_campaign_all_or_nothing()
    {
        wpneo_crowdfunding_load_template('include/all-or-nothing');
    }
}

if (!function_exists('motivation_reward_submit_form')) {
    function motivation_reward_submit_form($i, $key, $value)
    {
//        var_dump($key);
//        wp_die();
        include get_stylesheet_directory() . '/wpneotemplate/woocommerce/basic/include/tabs/reward_submit_form.php';
    }
}

if (!function_exists('motivation_get_product_id_by_celery_url')) {
    function motivation_get_product_id_by_celery_url($celery_product_checkout_url)
    {
        $product_id = 0;
        //Get max Reward number of all products

        $args = [/*'include' => 246, */
            'post_type' => 'product', 'post_status' => 'publish', 'numberposts' => -1,
            'meta_query' => array(
                'relation' => 'OR',
                array(
                    'key' => 'motivation_celery_url_product_reward_1',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_2',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_3',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_4',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_5',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_6',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_7',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_8',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_9',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_10',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_11',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
                array(
                    'key' => 'motivation_celery_url_product_reward_12',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),                array(
                    'key' => 'motivation_celery_url_product_reward_13',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),                array(
                    'key' => 'motivation_celery_url_product_reward_14',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),                array(
                    'key' => 'motivation_celery_url_product_reward_15',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),                array(
                    'key' => 'motivation_celery_url_product_reward_16',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),                array(
                    'key' => 'motivation_celery_url_product_reward_17',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),                array(
                    'key' => 'motivation_celery_url_product_reward_18',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),                array(
                    'key' => 'motivation_celery_url_product_reward_19',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),                array(
                    'key' => 'motivation_celery_url_product_reward_20',
                    'value' => $celery_product_checkout_url,
                    'compare' => '='
                ),
            )

        ];
        $myposts = get_posts($args);
        foreach ($myposts as $post) {
            $product_id = $post->ID;
        }
        wp_reset_postdata(); // сбрасываем переменную $post

        return $product_id;
    }
}



