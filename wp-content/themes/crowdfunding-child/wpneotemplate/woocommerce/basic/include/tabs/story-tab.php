<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $post;
?>
<div class="row">
    <div class="tab-campaign-story-left">
        <div class="col col-8 description-container">
            <div class="mb3">
                <h3 class="normal mb3 mb7-sm mobile-hide"><?php _e('About this project', 'wp-crowdfunding') ?></h3>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <div class="tab-campaign-story-right">
        <div class="col col-4">
            <?php do_action('wpneo_campaign_story_right_sidebar'); ?>
            <div style="clear: both"></div>
        </div>
    </div>
</div>