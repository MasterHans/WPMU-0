<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if (!defined('ABSPATH')) {
    exit;
}
/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see wpneo_crowdfunding_default_single_campaign_tabs()
 */
$tabs = apply_filters('wpneo_crowdfunding_default_single_campaign_tabs', $tabs);
global $product;

//var_dump($tabs);
//wp_die();
if (!empty($tabs)) : ?>
<!--    mt-campaign-tabs-->
    <div class="wpneo-tabs" style="">
        <div class="mt-campaign__project_nav js-project-nav skrollable skrollable-between">
            <div class="container-flex js-project-nav-scroll">
                <div class="row">
                    <ul class="wpneo-tabs-menu">
                        <?php $i = 0;
                        foreach ($tabs as $key => $tab) :
                            $i++;
                            $current = $i === 1 ? 'wpneo-current' : '';
                            ?>
                            <li class="<?php echo $current.' '.esc_attr( $key ); ?>_tab">
                                <a class="tabbed-nav__link project-nav__link--<?php echo esc_attr($key); ?> js-load-project-content js-load-project-<?php echo esc_attr($key); ?>"
                                   href="#wpneo-tab-<?php echo esc_attr( $key ); ?>">
                                    <?php echo apply_filters('wpneo_campaign_' . $key . '_tab_title', esc_html($tab['title']), $key); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="project-nav__buttons skrollable skrollable-after" data-600="bottom: -70px;"
                         data-800="bottom: 0px;" style="">
<!--                        <a class="btn btn--green" title="Back this project"-->
<!--                           href="#">Back-->
<!--                            this project</a>-->
                        <form enctype="multipart/form-data" action="<?php echo get_home_url(); ?>/choose-reward/" method="post" class="cart">
                            <input type="hidden" name="action" value="choose_pledges_page">
                            <input type="hidden" name="data" value="<?=$product->id?>">
                            <button type="submit" class="btn btn--green">
                                <?php echo __(apply_filters('add_to_donate_button_text', 'Back this project'), 'wp-crowdfunding'); ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
<!--    <div class="clear-float"></div>-->
    </div>

<!--    <div class="wpneo-tab">-->
        <?php foreach ( $tabs as $key => $tab ) :?>
            <section id="wpneo-tab-<?php echo esc_attr( $key ); ?>" class="wpneo-tab-content">
                <div class="py3 py10-sm bg-white">
                    <div class="container-flex px3">
                            <?php call_user_func( $tab['callback'], $key, $tab ); ?>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
<!--    </div>-->
<?php endif; ?>