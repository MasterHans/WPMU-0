<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.3.2
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

if (!comments_open()) {
    return;
}

?>
<div class="row">
    <div class="col-right col-4 mobile-hide">
        <div class="border-left border-thick border-grey-500 pl3 py2">
            <p class="f5 mb0">Use this space to cheer the creator along, ask questions, and talk to your fellow backers.
                Please remember to be respectful and considerate. Thanks!</p>
        </div>
    </div>
    <div class="col col-8">

        <div id="new_comment">
            <a class="btn btn--gray" id="add_comment_btn" href="#">
                Leave a comment
            </a>
        </div>

        <div id="reviews" class="woocommerce-Reviews">

            <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->id)) : ?>

                <div id="review_form_wrapper">
                    <div id="review_form">
                        <?php
                        $commenter = wp_get_current_commenter();

                        $comment_form = array(
                            'title_reply' => have_comments() ? __('Add a comment', 'woocommerce') : sprintf(__('Be the first to review &ldquo;%s&rdquo;', 'woocommerce'), get_the_title()),
                            'title_reply_to' => __('Leave a Reply to %s', 'woocommerce'),
                            'comment_notes_after' => '',
                            'fields' => array(
                                'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name', 'woocommerce') . ' <span class="required">*</span></label> ' .
                                    '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" required /></p>',
                                'email' => '<p class="comment-form-email"><label for="email">' . __('Email', 'woocommerce') . ' <span class="required">*</span></label> ' .
                                    '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" required /></p>',
                            ),
                            'label_submit' => __('Submit', 'woocommerce'),
                            'logged_in_as' => '',
                            'comment_field' => ''
                        );

                        if ($account_page_url = wc_get_page_permalink('myaccount')) {
                            $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a review.', 'woocommerce'), esc_url($account_page_url)) . '</p>';
                        }


                        $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __('Your Comment', 'woocommerce') . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>';

                        comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
                        ?>
                    </div>
                </div>

            <?php else : ?>

                <p class="woocommerce-verification-required"><?php _e('Only logged in customers who have purchased this product may leave a review.', 'woocommerce'); ?></p>

            <?php endif; ?>

            <div id="comments">
                <!--            <h2 class="woocommerce-Reviews-title">--><?php
                //                if (get_option('woocommerce_enable_review_rating') === 'yes' && ($count = $product->get_review_count()))
                //                    printf(_n('%s review for %s%s%s', '%s reviews for %s%s%s', $count, 'woocommerce'), $count, '<span>', get_the_title(), '</span>');
                //                else
                //                    _e('Reviews', 'woocommerce');
                //                ?><!--</h2>-->

                <?php if (have_comments()) : ?>

                    <ol class="commentlist">
                        <?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>
                    </ol>

                    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) :
                        echo '<nav class="woocommerce-pagination">';
                        paginate_comments_links(apply_filters('woocommerce_comment_pagination_args', array(
                            'prev_text' => '&larr;',
                            'next_text' => '&rarr;',
                            'type' => 'list',
                        )));
                        echo '</nav>';
                    endif; ?>

                <?php else : ?>

                    <p class="woocommerce-noreviews"><?php _e('There are no reviews yet.', 'woocommerce'); ?></p>

                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
