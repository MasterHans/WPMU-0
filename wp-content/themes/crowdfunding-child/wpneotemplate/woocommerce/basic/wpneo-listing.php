<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$col_num = get_option('number_of_collumn_in_row', 3);
$number = array( "2"=>"two","3"=>"three","4"=>"four" );
?>
<div class="wpneo-wrapper">
    <div class="wpneo-container">
        <?php do_action('wpneo_campaign_listing_before_loop'); ?>
        <div class="wpneo-wrapper-inner">
            <?php if (have_posts()): ?>
                <?php
                $i = 1;
                while (have_posts()) : the_post();
                    $class = '';
                    if( $i == $col_num ){
                        $class = 'last';
                        $i = 0;
                    }
                    if($i == 1){ $class = 'first'; }
                ?>
                    <div class="wpneo-listings <?php echo $number[$col_num]; ?> <?php echo $class; ?>">
                        <div class="project-card">
                            <?php do_action('wpneo_campaign_loop_item_before_content'); ?>
                            <div class="wpneo-listing-content">
                                <?php do_action('motivation_campaign_loop_item_title'); ?>
                                <?php do_action('motivation_campaign_loop_item_author'); ?>
                                <?php do_action('motivation_campaign_loop_item_short_description'); ?>
                            </div>
                            <div class="project-card-footer">
                                <?php do_action('motivation_campaign_loop_item_location'); ?>
                                <?php do_action('motivation_campaign_loop_item_fund_raised_percent'); ?>
                                <ul class="project-stats">
                                    <li>
                                        <?php do_action('motivation_loop_item_funding_percent'); ?>
                                    </li>
                                    <li>
                                        <?php do_action('motivation_campaign_loop_item_fund_raised'); ?>
                                    </li>
                                    <li>
                                        <?php do_action('motivation_campaign_loop_item_time_remaining'); ?>
                                    </li>
                                </ul>


                            </div>
                            <?php do_action('wpneo_campaign_loop_item_after_content'); ?>
                        </div>
                    </div>
                <?php $i++; endwhile; ?>
            <?php
            else:
                wpneo_crowdfunding_load_template('include/loop/no-campaigns-found');
            endif;
            ?>
        </div>
        <?php do_action('wpneo_campaign_listing_after_loop'); ?>
        <?php 
        wpneo_crowdfunding_load_template('include/pagination');
        ?>
    </div>
</div>

