<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div class="mt-single-pledge-button">
    <?php
    global $post, $woocommerce, $product;
    $currency = '$';

    if ($product->product_type == 'crowdfunding') {
        if (WPNEOCF()->campaignValid()) {
            $recomanded_price = get_post_meta($product->id, 'wpneo_funding_recommended_price', true);
            $min_price = get_post_meta($product->id, 'wpneo_funding_minimum_price', true);
            $max_price = get_post_meta($product->id, 'wpneo_funding_maximum_price', true);
            if(function_exists( 'get_woocommerce_currency_symbol' )){
                $currency = get_woocommerce_currency_symbol();
            }

            if (! empty($_GET['reward_min_amount'])){
                $recomanded_price = (int) esc_html($_GET['reward_min_amount']);
            } ?>


            <form enctype="multipart/form-data" action="<?php echo get_home_url(); ?>/choose-reward/" method="post" class="cart">
                <input type="hidden" name="action" value="choose_pledges_page">
                <input type="hidden" name="data" value="<?=$product->id?>">
                <button type="submit" class="<?php echo apply_filters('add_to_donate_button_class', 'mt_donate_button'); ?> bttn bttn-green bttn-large block mb3">
                    <?php echo __(apply_filters('add_to_donate_button_text', 'Back this project'), 'wp-crowdfunding'); ?>
            </form>

            
            <?php
        } else {
            echo apply_filters('end_campaign_message', __('This campaigns is over.','wp-crowdfunding'));
        }
    }

    ?>
</div>