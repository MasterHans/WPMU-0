<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$wpneo_campaign_end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);

$total_raised = MOTIVATIONCF()->totalFundRaisedByCampaign(get_the_ID());
if ($total_raised){
    $raised = $total_raised;
}

$motivation_backers = get_post_meta(get_the_ID(), 'motivation_backers', true);

?>
<!--Fund Raised-->
<div class="mb2-lg">
    <span class="block green-700 medium type-16 type-24-md"><?php echo wpneo_crowdfunding_price($raised);?></span>
    <span class="block navy-600 type-12 type-14-md lh3-lg">
    pledged of <span class="money"><?php echo wpneo_crowdfunding_price(wpneo_crowdfunding_get_total_goal_by_campaign(get_the_ID())); ?></span> <span class="mobile-hide">goal</span>
    </span>
</div>
<!--Backers-->
<div class="ml0-lg mb2-lg">
    <div class="js-backers_count block type-16 type-24-md medium navy-700" data-backers-count="<?=$motivation_backers?>" id="backers_count">
          <?=$motivation_backers?>
    </div>
    <span class="block navy-600 type-12 type-14-md lh3-lg">backers</span>
</div>


