<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header('shop');

do_action('wpneo_before_crowdfunding_single_campaign');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}
//var_dump(is_product());
//wp_die();
?>

<main role="main">
    <?php while (have_posts()) : the_post(); ?>
        <section class="mt-campaign-hero">
            <div class="grid-container flex flex-column">
                <div itemscope itemtype="http://schema.org/ItemList"
                     id="campaign-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="grid-row order-1-lg order-md-2 mb6-lg mt-campaign-description mb3-md mb3-sm">
                        <div class="col-md-4-24">
                            <?php do_action('motivation_single_campaign_creator_info'); ?>
                        </div>
                        <div class="col-md-15-24">
                            <?php do_action('motivation_single_campaign_title'); ?>
                            <?php do_action('motivation_single_campaign_description'); ?>
                        </div>
                    </div>
                    <div class="grid-row order-2-lg order-md-1 mt-campaign-video-summary">
                        <div class="col-lg-16-24">
                            <?php do_action('motivation_single_campaign_feature_image'); ?>
                        </div>
                        <div class="col-lg-8-24">
                            <div class="mt-summary mb4 mb5-sm">
                                <?php do_action('motivation_single_campaign_fund_raised_percent'); ?>
                                <?php do_action('motivation_single_campaign_fund_raised_html'); ?>
                                <?php do_action('motivation_single_campaign_days_remaining'); ?>
                            </div>
                            <?php do_action('motivation_single_campaign_fund_this_campaign_btn'); ?>
                            <?php do_action('motivation_single_campaign_all_or_nothing'); ?>
                            <?php do_action('motivation_social_share'); ?>
                        </div>
                    </div>


                    <meta itemprop="url" content="<?php the_permalink(); ?>"/>
                </div>
                <!-- #campaign<?php the_ID(); ?>-->
            </div>
        </section>
        <div class="mt-campaign-content">
            <?php do_action('wpneo_after_crowdfunding_single_campaign_summery'); ?>
        </div>
    <?php endwhile; // end of the loop. ?>

    <div class="gap" style="clear:both">
        &nbsp;<br>
        &nbsp;<br>
        &nbsp;<br>
        &nbsp;<br>
        &nbsp;<br>
        &nbsp;<br>
    </div>
</main>

<?php get_footer('shop'); ?>