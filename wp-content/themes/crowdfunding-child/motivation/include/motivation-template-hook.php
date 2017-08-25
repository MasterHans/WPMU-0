<?php
/**
 * Single campaign Template hook
 */
/*actions*/
add_action('motivation_single_campaign_creator_info', 'wpneo_crowdfunding_campaign_creator_info', 12);
add_action('motivation_single_campaign_title', 'wpneo_crowdfunding_template_campaign_title');
add_action('motivation_single_campaign_description', 'wpneo_crowdfunding_campaign_single_description');
add_action('motivation_single_campaign_feature_image', 'wpneo_crowdfunding_campaign_single_feature_image');
add_action('motivation_single_campaign_fund_raised_percent', 'wpneo_crowdfunding_campaign_single_loop_item_fund_raised_percent');
add_action('motivation_single_campaign_fund_raised_html', 'wpneo_crowdfunding_campaign_single_fund_raised_html');
add_action('motivation_single_campaign_days_remaining', 'wpneo_crowdfunding_campaign_single_days_remaining');
add_action('motivation_single_campaign_fund_this_campaign_btn', 'wpneo_crowdfunding_campaign_single_fund_this_campaign_btn');
add_action('motivation_pledge_without_reward_form', 'motivation_pledge_without_reward_form');
add_action('motivation_campaign_loop_item_title', 'wpneo_crowdfunding_loop_item_title');
add_action('motivation_campaign_loop_item_author', 'wpneo_crowdfunding_loop_item_author');
add_action('motivation_campaign_loop_item_short_description', 'wpneo_crowdfunding_loop_item_short_description');
add_action('motivation_campaign_loop_item_location', 'wpneo_crowdfunding_loop_item_location');
add_action('motivation_campaign_loop_item_fund_raised_percent', 'wpneo_crowdfunding_loop_item_fund_raised_percent');
add_action('motivation_loop_item_funding_percent', 'motivation_loop_item_funding_percent');
add_action('motivation_campaign_loop_item_fund_raised', 'wpneo_crowdfunding_loop_item_fund_raised');
add_action('motivation_campaign_loop_item_time_remaining', 'wpneo_crowdfunding_loop_item_time_remaining');
add_action('motivation_svg_icons_system', 'motivation_svg_icons_system');
add_action('motivation_social_share', 'motivation_social_share');
add_action('motivation_single_campaign_all_or_nothing', 'motivation_single_campaign_all_or_nothing');
add_action('motivation_reward_submit_form', 'motivation_reward_submit_form', 7, 3);

/*filters*/
add_filter('wpneo_crowdfunding_default_single_campaign_tabs', 'motivation_default_single_campaign_tabs', 20);
add_filter('woocommerce_price_trim_zeros', '__return_true');//trim decimals in price

/*Handling POST WordPress way*/
//add_action('admin_post_nopriv_choose_pledges_page', 'motivation_choose_pledges_page');
//add_action('admin_post_choose_pledges_page', 'motivation_choose_pledges_page');

