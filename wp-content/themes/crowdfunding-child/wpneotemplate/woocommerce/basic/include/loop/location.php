<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$location = wpneo_crowdfunding_get_campaigns_location();
?>
<div class="wpneo-location">
<!--    <i class="fa-map-marker wpneo-icon wpneo-icon-location"></i>-->
    <i class="fa-map-marker wpneo-icon wpneo-icon-location"></i>
    <div class="wpneo-meta-desc">
        <?php echo $location; ?>
    </div>
</div>
