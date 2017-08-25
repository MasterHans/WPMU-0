<?php
/*
Template Name: Choose Reward
*/


global $post, $product;
?>
<?php get_header(); ?>
<?php get_template_part('lib/sub-header') ?>

<?php
$product_id = intval(sanitize_text_field(($_POST['data'])));

if (!$product_id) {
    $product_id = 0;
}

$args = ['include' => $product_id,
    'post_type' => 'product', 'post_status' => 'publish', 'numberposts' => -1];
$products = get_posts($args);
foreach ($products as $post) {




$campaign_rewards = get_post_meta($product_id, 'wpneo_reward', true);
$campaign_rewards = stripslashes($campaign_rewards);
$campaign_rewards_a = json_decode($campaign_rewards, true);
    if (is_array($campaign_rewards_a)) {
        if (count($campaign_rewards_a) > 0) {

            $i = 0;
            $amount = array();
?>
<main role="main">
    <div class="container-flex mt-pledge-page">
        <div class="row pledge-page__row">
            <div class="col col-8">
                <h2 class="checkout__title">Support this project</h2>

                <?php
                foreach ($campaign_rewards_a as $key => $row) {
                    $amount[$key] = $row['wpneo_rewards_pladge_amount'];
                }
                array_multisort($amount, SORT_ASC, $campaign_rewards_a);

                foreach ($campaign_rewards_a as $key => $value) {
                    $i++;
                    ?>
                    <div class="tab-rewards-wrapper">
                        <?php do_action('motivation_reward_submit_form', $i, $key, $value); ?>
                        <div class="pledge__info">
                            <h2 class="pledge__amount">
                                <?php echo 'Pledge ' . get_woocommerce_currency_symbol() . $value['wpneo_rewards_pladge_amount'];
                                if ('true' != get_option('wpneo_reward_fixed_price', '')) {
                                    echo (!empty($campaign_rewards_a[$i]['wpneo_rewards_pladge_amount'])) ? ' - ' . get_woocommerce_currency_symbol() . ($campaign_rewards_a[$i]['wpneo_rewards_pladge_amount'] - 1) : ' or more';
                                }
                                ?>
                            </h2>

                            <p class="pledge__reward-description pledge__reward-description--expanded"><?php echo html_entity_decode($value['wpneo_rewards_description']); ?></p>
                            <?php if ($value['wpneo_rewards_image_field']) { ?>
                                <div class="wpneo-rewards-image">
                                    <?php echo '<img src="' . wp_get_attachment_url($value["wpneo_rewards_image_field"]) . '"/>'; ?>
                                </div>
                            <?php } ?>
                            <div class="pledge__extra-info">
                                <div class="pledge__detail">
                            <span
                                class="pledge__detail-label"><?php _e('Estimated Delivery', 'wp-crowdfunding'); ?></span>
                            <span class="pledge__detail-info"><?php
                                $est_delivery = ucfirst($value['wpneo_rewards_endmonth']) . ' ' . $value['wpneo_rewards_endyear'];
                                echo $est_delivery; ?>
                            </span>
                                </div>
                            </div>

                            <div class="pledge__backer-stats">
                                <?php
                                $post_id = get_the_ID();
                                $min_data = $value['wpneo_rewards_pladge_amount'];
                                $max_data = '';
                                $orders = 0;

                                (!empty($campaign_rewards_a[$i]['wpneo_rewards_pladge_amount'])) ? ($max_data = $campaign_rewards_a[$i]['wpneo_rewards_pladge_amount'] - 1) : ($max_data = 9000000000);
                                if ($min_data != '') {

                                    $orders = stripslashes(get_post_meta($post->ID, 'motivation_reward_backers_' . $i, true));
                                    echo '<span class="pledge__backer-count">' . $orders . ' ' . __('backers', 'wp-crowdfunding') . '</span>';
                                }
                                ?>

                                <?php if ($value['wpneo_rewards_item_limit']) { ?>
                                    <p class="pledge__backer-left">
                                        <?php
                                        $quantity = 0;
                                        if ($value['wpneo_rewards_item_limit'] >= $orders) {
                                            $quantity = $value['wpneo_rewards_item_limit'] - $orders;
                                        }
                                        echo $quantity;
                                        _e(' rewards left', 'wp-crowdfunding');
                                        ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <?php
                }
        }
    }
}
wp_reset_postdata(); // сбрасываем переменную $post
                ?>
            </div>
            <div class="col col-4">
                <div class="important-notice">
                    <h6 class="important">
                        <span class="highlight">KickMENOT is not a store.</span>
                                    <span
                                        class="important__subhead">It's a way to bring creative projects to life.</span>
                    </h6>

                    <p>
                        Kickstarter does not guarantee projects or investigate a creator's ability to
                        complete
                        their
                        project. It is the responsibility of the project creator to complete their project
                        as
                        promised,
                        and the claims of this project are theirs alone.
                    </p>
                </div>
            </div>

        </div>
    </div>

</main>


<?php get_footer(); ?>
