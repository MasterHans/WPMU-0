<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$raised_percent = MOTIVATIONCF()->getFundRaisedPercentFormat();
?>
<div class="wpneo-raised-bar">
    <div id="neo-progressbar" class=" w100p bg-navy-400 mb2 mb3-md mt3-md mt0-lg">
        <?php $css_width = MOTIVATIONCF()->getFundRaisedPercent(); if( $css_width >= 100 ){ $css_width = 100; } ?>
        <div style="width: <?php echo $css_width; ?>%" class="bg-green-400 h100p"></div>
    </div>
</div>