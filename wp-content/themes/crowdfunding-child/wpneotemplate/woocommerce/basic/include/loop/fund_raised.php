<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$raised_percent = MOTIVATIONCF()->getFundRaisedPercentFormat();
$raised = 0;
$total_raised = MOTIVATIONCF()->totalFundRaisedByCampaign();
if ($total_raised) {
    $raised = round($total_raised,0);
}
?>
<div class="wpneo-fund-pledged">
    <div class="wpneo-meta-desc"><?php echo wc_price($raised); ?></div>
    <div class="wpneo-meta-name"><?php _e('pledged', 'wp-crowdfunding'); ?></div>
</div>
