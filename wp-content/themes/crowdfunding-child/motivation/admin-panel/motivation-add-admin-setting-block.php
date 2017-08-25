<?php
/*
* Add Motivation tab (Woocommerce /Product ).
* Only show if type "Crowdfunding" Selected
*/
function motivation_tabs($tabs)
{
    $tabs['motivation'] = array(
        'label' => __('Motivation', 'wp-crowdfunding'),
        'target' => 'motivation_options',
        'class' => array('show_if_neo_crowdfunding_options', 'show_if_neo_crowdfunding_options'),
    );
    return $tabs;
}

add_filter('woocommerce_product_data_tabs', 'motivation_tabs');

/*
* Add Motivation tab Content(Woocommerce / Product).
* Only show the fields under Motivation Tab
*/
function motivation_options_tab_content($post_id)
{
    global $post;

    //Display counters variable

    $motivation_company_name = get_post_meta($post->ID, 'motivation_company_name', true); //Company name

    $real_funding_goal = get_post_meta($post->ID, '_nf_funding_goal', true); //Funding Goal

    $real_fund_raised = wpneo_crowdfunding_get_total_fund_raised_by_campaign($post->ID);
    $real_fund_raised = $real_fund_raised ? $real_fund_raised : 0; // Fund Raised

    $real_backers = motivation_crowdfunding_get_total_order_number_by_campaign($post->ID);
    $real_backers = $real_backers ? $real_backers : 0; // Fund Raised

    $real_pledged_percent = ($real_fund_raised >= $real_funding_goal) ? 100 : ($real_fund_raised * 100) / $real_funding_goal;
    $real_pledged_percent = Round($real_pledged_percent, 2);

    $motivation_pledged = stripslashes(get_post_meta($post->ID, 'motivation_pledged', true));
    $motivation_pledged = !empty($motivation_pledged) ? $motivation_pledged : $real_fund_raised;

    $motivation_backers = stripslashes(get_post_meta($post->ID, 'motivation_backers', true));
    $motivation_backers = !empty($motivation_backers) ? $motivation_backers : $real_backers;


    $motivation_pledged_percent = ($motivation_pledged >= $real_funding_goal) ? 100 : ($motivation_pledged * 100) / $real_funding_goal;
    $motivation_pledged_percent = Round($motivation_pledged_percent, 2);

    //Motivation settings variable
    $motivation_minutes_from = stripslashes(get_post_meta($post->ID, 'motivation_minutes_from', true));
    $motivation_minutes_to = stripslashes(get_post_meta($post->ID, 'motivation_minutes_to', true));

    $motivation_backers_from = stripslashes(get_post_meta($post->ID, 'motivation_backers_from', true));
    $motivation_backers_to = stripslashes(get_post_meta($post->ID, 'motivation_backers_to', true));

    //Get the rewards from custom field
    $wpneo_reward = stripslashes(get_post_meta($post->ID, 'wpneo_reward', true));
    $wpneo_reward = json_decode($wpneo_reward);

    //Date and time of last randomization
    $motivation_last_randomize_date_time = stripslashes(get_post_meta($post->ID, 'motivation_last_randomize_date_time', true));

    //Create arrays of metadata to display inputs
    $woocommerce_meta_field_displayed = array(
        // Pledged Amount
        array(
            'id' => 'motivation_pledged',
            'label' => __('Pledged Amount', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Pledged Amount', 'wp-crowdfunding'),
            'value' => $motivation_pledged,
            'class' => 'wc_input_price',
            'field_type' => 'textfield'
        ),
        // Backers number
        array(
            'id' => 'motivation_backers',
            'label' => __('Backers Number', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Backers Number', 'wp-crowdfunding'),
            'value' => $motivation_backers,
            'class' => 'wc_input_price',
            'field_type' => 'textfield'
        ),

    );

    //Create arrays of metadata for randomization settings
    $woocommerce_meta_field_randomization_settings = array(
        // Header
        array('line' => '<h2>Time range</h2>'),
        // Pick up Minutes From
        array(
            'id' => 'motivation_minutes_from',
            'label' => __('Minutes From', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Minutes From', 'wp-crowdfunding'),
            'value' => $motivation_minutes_from,
            'class' => 'wc_input_price',
            'field_type' => 'textfield'
        ),
        // Pick up Minutes To
        array(
            'id' => 'motivation_minutes_to',
            'label' => __('Minutes To', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Minutes To', 'wp-crowdfunding'),
            'value' => $motivation_minutes_to,
            'class' => 'wc_input_price',
            'field_type' => 'textfield'
        ),
        // Draw Line
        array('line' => '<hr>'),
        // Header
        array('line' => '<h2>Backers range</h2>'),
        // Pick up Backers From
        array(
            'id' => 'motivation_backers_from',
            'label' => __('Backers From', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Backers From', 'wp-crowdfunding'),
            'value' => $motivation_backers_from,
            'class' => 'wc_input_price',
            'field_type' => 'textfield'
        ),
        // Pick up Backers To
        array(
            'id' => 'motivation_backers_to',
            'label' => __('Backers To', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Backers To', 'wp-crowdfunding'),
            'value' => $motivation_backers_to,
            'class' => 'wc_input_price',
            'field_type' => 'textfield'
        ),
        // Draw Line
        array('line' => '<hr>'),
        // Header
        array('line' => '<h3>Rewards setting</h3>'),
    );
    $i = 0;

    //Add Rewards Amount in a loop
    foreach ($wpneo_reward as $items) {
        $i += 1;
        $woocommerce_meta_field_randomization_settings[] = array('reward_block_begin' => '<div class="motivation_reward_group_' . $i . '">');
        $woocommerce_meta_field_randomization_settings[] = array('line' => '<h2 class="motivation_reward_header" motivation_reward_index="' . $i . '">Reward #' . $i . '</h2>');
        //Pick up URL to direct customers to your products and checkout on Celery:
        $woocommerce_meta_field_randomization_settings[] = array('line' => '<h4>URL to Celery Product (Reward) and checkout. Please Copy-Past it from Celery Dashboard:</h4>');
        $woocommerce_meta_field_randomization_settings[] = array('line' => '<h5 id="label_motivation_celery_url_product_reward_' . $i . '" >'. stripslashes(get_post_meta($post->ID, 'motivation_celery_url_product_reward_' . $i, true)) .'</h5>');
        $woocommerce_meta_field_randomization_settings[] = array(
            'id' => 'motivation_celery_url_product_reward_' . $i,
            'label' => __('Celery Reward URL:', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Celery URL product (Reward) #' . $i, 'wp-crowdfunding'),
            'value' => stripslashes(get_post_meta($post->ID, 'motivation_celery_url_product_reward_' . $i, true)),
            'class' => '',
            'field_type' => 'textfield'
        );

        // Pick up Percent for Reward
        $woocommerce_meta_field_randomization_settings[] = array(
            'id' => 'motivation_reward_percent_' . $i,
            'label' => __('Percent', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Reward Percent #' . $i, 'wp-crowdfunding'),
            'value' => stripslashes(get_post_meta($post->ID, 'motivation_reward_percent_' . $i, true)),
            'class' => 'wc_input_price',
            'field_type' => 'textfield'
        );

        // Pick up Amount for Reward
        $woocommerce_meta_field_randomization_settings[] = array(
            'id' => 'motivation_reward_amount_' . $i,
            'label' => __('Amount', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Reward Amount #' . $i, 'wp-crowdfunding'),
            'value' => $items->wpneo_rewards_pladge_amount,
            'class' => 'wc_input_price',
            'field_type' => 'textfield',
            'custom_attributes' => array(
                'readonly' => 'true',
            )
        );
        $woocommerce_meta_field_randomization_settings[] = array('line' => '<h2>Calculated Values</h2>');

        // Calculate and pick up the backers number for Reward
        $woocommerce_meta_field_randomization_settings[] = array(
            'id' => 'motivation_reward_backers_' . $i,
            'label' => __('Backers', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Backers #' . $i, 'wp-crowdfunding'),
            'value' => stripslashes(get_post_meta($post->ID, 'motivation_reward_backers_' . $i, true)),
            'class' => 'wc_input_price',
            'field_type' => 'textfield'
        );
        // Calculate and pick up the pledges for Reward
        $woocommerce_meta_field_randomization_settings[] = array(
            'id' => 'motivation_reward_pledges_' . $i,
            'label' => __('Pledges', 'wp-crowdfunding'),
            'desc_tip' => 'true',
            'type' => 'text',
            'placeholder' => __('Pledges #' . $i, 'wp-crowdfunding'),
            'value' => stripslashes(get_post_meta($post->ID, 'motivation_reward_pledges_' . $i, true)),
            'class' => 'wc_input_price',
            'field_type' => 'textfield'
        );
        //drawing line
        $woocommerce_meta_field_randomization_settings[] = array('line' => '<hr>');
        $woocommerce_meta_field_randomization_settings[] = array('reward_block_end' => '</div>');
    }

//    var_dump($woocommerce_meta_field_displayed);

    ?>
    <div id='motivation_options' class='panel woocommerce_options_panel' xmlns="http://www.w3.org/1999/html">

        <div id="motivation_real_values" style="display: none">
            <div id="motivation_real_fund_raised"><?= $real_fund_raised ?></div>
            <div id="motivation_real_backers"><?= $real_backers ?></div>
            <div id="motivation_real_pledged_percent"><?= $real_pledged_percent ?></div>
            <div id="motivation_post_id"><?= $post->ID ?></div>
            <input class="wc_input_price" style="" name="motivation_rewards_counter" id="motivation_rewards_counter"
                   readonly
                   value="<?= $i ?>" type="text">
            <input class="wc_input_price" style="" name="motivation_last_randomize_date_time"
                   id="motivation_last_randomize_date_time"
                   value="<?= $motivation_last_randomize_date_time ?>" type="text">
        </div>

        <hr>
        <h3>Company Creator:</h3>
        <hr>

        <p class="form-field">
            <label for="motivation_company_name">Company name</label>
            <input class="" style="" name="motivation_company_name" id="motivation_company_name"
                   value="<?php echo $motivation_company_name ?>" type="text">

        </p>

        <hr>
        <h3>Displayed Frontend counters:</h3>
        <hr>

        <p class="form-field">
            <label for="motivation_funding_goal">Goal Funding</label>
            <input class="wc_input_price" style="" name="motivation_funding_goal" id="motivation_funding_goal" readonly
                   value="<?php echo $real_funding_goal ?>" type="text">

        </p>
        <?php
        foreach ($woocommerce_meta_field_displayed as $value) {
            woocommerce_wp_text_input($value);
        }
        ?>

        <div class="motivation_percent_wrapper">
            <p class="motivation_percent_label">Pledged Percent</p>

            <div id="motivation_progress">
                <div class="progress">
                    <div class="progress-bar" id="motivation_pledged_percent" role="progressbar"
                         aria-valuenow="<?php echo $motivation_pledged_percent ?>" aria-valuemin="0"
                         aria-valuemax="100" style="width: <?php echo $motivation_pledged_percent ?>%;">
                        <span id="motivation_pledged_percent_span"
                              class="sr-only"><?php echo $motivation_pledged_percent ?>% Complete</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="motivation_buttons">
            <input type="button" class="moto-btn moto-btn-primary" id="btn-motivation-randomize" value="Randomize">
            <input type="button" class="moto-btn moto-btn-warning" id="btn-motivation-reset"
                   value="Reset to Real Values">
        </div>

        <hr>
        <h3>Motivation Randomization Settings:</h3>
        <hr>

        <!--        Empty block to clone Reward-->
        <div class="motivation_reward_group_empty" style="display: none;">
            <h2 class="motivation_reward_header">Reward #empty</h2>
            <h4>URL to Celery Product (Reward) and checkout:</h4>
            <h5 id="label_motivation_celery_url_product_reward_empty"></h5>

            <p class="form-field motivation_celery_url_product_reward_empty_field ">
                <label for="motivation_celery_url_product_reward_empty">Celery Reward URL:</label>
                <input type="text" class="" style="" name="motivation_celery_url_product_reward_empty"
                       id="motivation_celery_url_product_reward_empty" value="" placeholder="Celery URL product (Reward) #empty">
            </p>

            <p class="form-field motivation_reward_percent_empty_field ">
                <label for="motivation_reward_percent_empty">Percent</label>
                <input type="text" class="wc_input_price" style="" name="motivation_reward_percent_empty"
                       id="motivation_reward_percent_empty" value="" placeholder="Reward Percent #empty"></p>

            <p class="form-field motivation_reward_amount_empty_field ">
                <label for="motivation_reward_amount_empty">Amount</label>
                <input type="text" class="wc_input_price" style="" name="motivation_reward_amount_empty"
                       id="motivation_reward_amount_empty" value="" placeholder="Reward Amount #empty"
                       readonly="true">
            </p>

            <h2>Calculated Values</h2>

            <p class="form-field motivation_reward_backers_empty_field ">
                <label for="motivation_reward_backers_empty">Backers</label>
                <input type="text" class="wc_input_price" style="" name="motivation_reward_backers_4"
                       id="motivation_reward_backers_empty" value="" placeholder="Backers #empty">
            </p>

            <p class="form-field motivation_reward_pledges_empty_field ">
                <label for="motivation_reward_pledges_empty">Pledges</label>
                <input type="text" class="wc_input_price" style="" name="motivation_reward_pledges_empty"
                       id="motivation_reward_pledges_empty" value="" placeholder="Pledges #empty"></p>
            <hr>
        </div>

        <div id="motivation_reward_settings">
            <?php
            foreach ($woocommerce_meta_field_randomization_settings as $value) {

                if ($value['reward_block_begin']) {
                    echo $value['reward_block_begin'];
                } elseif ($value['line']) {
                    echo $value['line'];
                } elseif ($value['reward_block_end']) {
                    echo $value['reward_block_end'];
                } else {
                    woocommerce_wp_text_input($value);
                }

            }
            ?>
        </div>

    </div>
    <?php

}

add_action('woocommerce_product_data_panels', 'motivation_options_tab_content');

/*
* Save Motivation tab Data(Woocommerce / Product).
* Update Post Meta for Motivation Tab
*/
function motivation_options_field_save($post_id)
{
    $data = [];

//    var_dump($_POST);
//    wp_die();

    foreach ($_POST as $key => $val) {

        if ((!empty($val) or $val === '0') && (strpos($key, 'motivation_') === 0)) {
            $data[$key] = $val;
            if (($key == 'motivation_last_randomize_date_time') ||
                ($key == 'motivation_company_name') ||
                (strpos($key, 'motivation_celery_url_product_reward_') === 0) ||
                (strpos($key, 'label_motivation_celery_url_product_reward_') === 0)
            ) {
                update_post_meta($post_id, $key, $val);
            } else {
                update_post_meta($post_id, $key, intval($val));
            };
        }
    };
//    var_dump($data);

    //delete all trash motivation meta from this post
    $meta_all = get_post_meta($post_id);
    $meta_to_del = array_diff_key($meta_all, $data);
    foreach ($meta_to_del as $meta_key => $meta_val) {
        if (strpos($meta_key, 'motivation_') === 0) {
            delete_post_meta($post_id, $meta_key);
        }
    };
//var_dump($meta_to_del);
//    wp_die();

//    // basic counters
//    if (!empty($_POST['motivation_pledged'])) {
//        update_post_meta($post_id, 'motivation_pledged', intval($_POST['motivation_pledged']));
//    }
//
//    if (!empty($_POST['motivation_backers'])) {
//        update_post_meta($post_id, 'motivation_backers', intval($_POST['motivation_backers']));
//    }
}

add_action('woocommerce_process_product_meta', 'motivation_options_field_save');