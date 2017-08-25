<?php
/**
 *  Campaign WooCommerce / Product
 */
if (!function_exists('motivation_crowdfunding_get_total_order_number_by_campaign')) {
    function motivation_crowdfunding_get_total_order_number_by_campaign($campaign_id = 0)
    {
        global $wpdb, $post;
        $db_prefix = $wpdb->prefix;

        if ($campaign_id == 0)
            $campaign_id = $post->ID;

        $query = "SELECT
                    COUNT(ltoim.meta_value) as total_orders_number
                FROM
                    {$wpdb->prefix}woocommerce_order_itemmeta woim
			    LEFT JOIN
                    {$wpdb->prefix}woocommerce_order_items oi ON woim.order_item_id = oi.order_item_id
			    LEFT JOIN
                    {$wpdb->prefix}posts wpposts ON order_id = wpposts.ID
			    LEFT JOIN
                    {$wpdb->prefix}woocommerce_order_itemmeta ltoim ON ltoim.order_item_id = oi.order_item_id AND ltoim.meta_key = '_line_total'
			    WHERE
                    woim.meta_key = '_product_id' AND woim.meta_value = %d AND wpposts.post_status = 'wc-completed'
                GROUP BY woim.meta_value;";

        $wp_sql = $wpdb->get_row($wpdb->prepare($query, $campaign_id));
        return $wp_sql->total_orders_number;
    }
}

/*Calendar functions*/
function motivation_get_current_date_time()
{
    $date = new DateTime("now", new DateTimeZone(get_option('timezone_string')));
    return $date->format('Y-m-d H:i:s');
}

function motivation_fetch_date_from_string($date_str)
{
    $date = new DateTime($date_str, new DateTimeZone(get_option('timezone_string')));
    return $date->format('Y-m-d H:i:s');
}

;

function motivation_add_minutes_to_date($date_str, $minutes)
{
    $date = new DateTime($date_str, new DateTimeZone(get_option('timezone_string')));
    $date->add(new DateInterval('PT' . $minutes . 'M'));
    return $date->format('Y-m-d H:i:s');
};

function motivation_date_output_format($date)
{
    $date = new DateTime($date, new DateTimeZone(get_option('timezone_string')));
    return $date->format('D, F j Y g:i a O');
};


function motivation_date_tag_format($date)
{
    $date = new DateTime($date, new DateTimeZone(get_option('timezone_string')));
    return $date->format('c');
};

function get_page_by_slug($slug)
{
    $pages = get_posts(array(
        'name' => $slug,
        'post_type' => 'post',
        'post_status' => 'publish'
    ));

    if (!$pages) {
        throw new Exception("NoSuchPostBySpecifiedID");
    }
    return $pages[0];
};

/*Find is user administrator*/
function motivation_author_is_admin($comment_id)
{
    $author_email = get_comment_author_email($comment_id);
    $user = get_user_by('email', $author_email);
    $is_admin = false;
    if ($user != false) {
        foreach ($user->roles as $role) {
            if ($role == 'administrator') {
                $is_admin = true;
            }
        }
    }
    return $is_admin;
};