<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$raised_percent = MOTIVATIONCF()->getFundRaisedPercentFormat();
$raised = 0;
$total_raised = MOTIVATIONCF()->totalFundRaisedByCampaign();
if ($total_raised){
    $raised = $total_raised;
}

$raised_percent = round(MOTIVATIONCF()->getFundRaisedPercentFormat(),0);
?>
<div class="wpneo-fund-percent">
    <div class="wpneo-meta-desc"><?php echo $raised_percent; ?>%</div>
    <div class="wpneo-meta-name"><?php _e('funded', 'wp-crowdfunding'); ?></div>
</div>
