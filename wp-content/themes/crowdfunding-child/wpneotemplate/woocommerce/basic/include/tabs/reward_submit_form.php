<?php
global $post;
$pay_option = new Motivation_Celery_Connect();
$celery_product_reward_url = stripslashes(get_post_meta($post->ID, 'motivation_celery_url_product_reward_' . $i, true));

$error_celery_url = false;

if (empty($celery_product_reward_url)) {
    $error_celery_url = true;
}

//var_dump($i);
//var_dump($key);
//var_dump($value);

?>

<div id="checkout-error-message" class="form-group checkout-error-message <?php echo $error_celery_url == true ? 'has-error' : 'hide-error-message'?>">
    <p class="help-block">Unfortunately this Reward is not ready for checkout...</p>
</div>

<?php if ($pay_option->celery_enabled == 'yes') : ?>
    <!--    <h1>--><? //= $pay_option->celery_live_celery_access_token?><!--</h1>-->
    <div class="overlay pledge__hover hover-zoomout">
        <div>
            <div>
                <form enctype="multipart/form-data" method="get" class="cart"
                      action="<?= $celery_product_reward_url ?>">
                    <!--                <a href="-->
                    <? //= $celery_product_reward_url ?><!--" class="select_rewards_button">-->
                    <?php //_e('Select Reward', 'wp-crowdfunding'); ?><!--</a>-->
                    <button type="submit"
                            class="select_rewards_button"><?php _e('Select Reward', 'wp-crowdfunding'); ?></button>
                </form>

            </div>
        </div>
    </div>
<?php else : ?>
    <?php if (get_option('wpneo_single_page_reward_design') == 1) { ?>
        <div class="overlay pledge__hover hover-zoomout">
            <div>
                <div>
                    <form enctype="multipart/form-data" method="post" class="cart">
                        <input type="hidden"
                               value="<?php echo $value['wpneo_rewards_pladge_amount']; ?>"
                               name="wpneo_donate_amount_field"/>
                        <input type="hidden" value="<?php echo $key; ?>" name="wpneo_rewards_index"/>
                        <input type="hidden" value="<?php echo esc_attr($post->post_author); ?>"
                               name="_cf_product_author_id">
                        <input type="hidden" value="<?php echo esc_attr($post->ID); ?>"
                               name="add-to-cart">
                        <button type="submit"
                                class="select_rewards_button"><?php _e('Select Reward', 'wp-crowdfunding'); ?></button>
                    </form>

                </div>
            </div>
        </div>
    <?php } else if (get_option('wpneo_single_page_reward_design') == 2) { ?>
        <div class="tab-rewards-submit-form-style1">
            <p><?php _e('Rewards Amount', 'wp-crowdfunding'); ?></p>

            <form enctype="multipart/form-data" method="post" class="cart">
                <input type="hidden" value="<?php echo $value['wpneo_rewards_pladge_amount']; ?>"
                       name="wpneo_donate_amount_field"/>
                <input type="hidden" value="<?php echo $key; ?>" name="wpneo_rewards_index"/>
                <input type="hidden" value="<?php echo esc_attr($post->post_author); ?>"
                       name="_cf_product_author_id">
                <input type="hidden" value="<?php echo esc_attr($post->ID); ?>" name="add-to-cart">
                <button type="submit"
                        class="select_rewards_button"><?php _e('Select Reward', 'wp-crowdfunding'); ?></button>
            </form>
        </div>
    <?php } ?>
<?php endif; ?>
