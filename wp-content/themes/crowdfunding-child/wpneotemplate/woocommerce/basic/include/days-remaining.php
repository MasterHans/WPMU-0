<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$wpneo_campaign_end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);

?>
	<div class="mt-single-days-to-go">
	    <span class="block type-16 type-24-md medium navy-700"><?php echo WPNEOCF()->dateRemaining(); ?></span>
	    <span class="block navy-600 type-12 type-14-md lh3-lg"><?php _e('days to go','wp-crowdfunding'); ?></span>
	</div>