<?php
global $post, $woocommerce, $product;
$currency = '$';
if ($product->product_type == 'crowdfunding') {
    if (WPNEOCF()->campaignValid()) {
        $recomanded_price = get_post_meta($product->id, 'wpneo_funding_recommended_price', true);
        $min_price = get_post_meta($product->id, 'wpneo_funding_minimum_price', true);
        $max_price = get_post_meta($product->id, 'wpneo_funding_maximum_price', true);
        if (function_exists('get_woocommerce_currency_symbol')) {
            $currency = get_woocommerce_currency_symbol();
        }
        if (!empty($_GET['reward_min_amount'])) {
            $recomanded_price = (int)esc_html($_GET['reward_min_amount']);
        } ?>
        <div class="tab-rewards-wrapper">
            <div class="pledge__info">
                <h2 class="pledge__amount">
                    Make a pledge without a reward
                </h2>

                <form class="cart NS_pledges__shipping_select new-form new-form--block"
                      method="post">
                    <input type="hidden" value="<?php echo esc_attr($product->id); ?>" name="add-to-cart">
                    <div class="pledge__checkout-form">
                        <input value="<?php echo $recomanded_price; ?>" data-min-price="<?php echo $min_price ?>"
                               data-max-price="<?php echo $max_price ?>"
                               class="new-form__input--numbers form-control js-no-reward-form-input js-form-input pledge__no-reward__input text"
                               placeholder="<?php echo $recomanded_price; ?>"
                               type="text" name="wpneo_donate_amount_field" id="backing_amount">

                        <div class="new-form__currency-box">
                            <span class="new-form__currency-box__text"><?=$currency?></span>
                        </div>

                        <div class="pledge__continue js-continue">
                            <button
                                class="btn btn--green btn--block pledge__button js-pledge-button js-reward-continue-button">
                                    <span class="btn-text">
                                    Continue
                                    </span>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <?php
    } else {
        echo apply_filters('end_campaign_message', __('This campaigns is over.', 'wp-crowdfunding'));
    }
}?>