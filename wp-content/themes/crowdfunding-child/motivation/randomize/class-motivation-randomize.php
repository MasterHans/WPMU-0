<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Motivation_Randomize
{
    public $debug_details = false;

    public function randomizeOne($data)
    {
        //Pick up Backers from range between 10 and 25
        $picked_up_backers = rand(intval($data['motivation_backers_from']), intval($data['motivation_backers_to']));
        $motivation_backers_total_one_session = 0;
        $motivation_pledged_total_one_session = 0;

        $j = 1;

        //Debug
        if ($this->debug_details) {
            motivation_logging('============', true);
            motivation_logging('$picked_up_backers = ' . $picked_up_backers, true);
            motivation_logging('Reward #' . $data['motivation_rewards_counter'], true);
        }

        //calculate number of backers % * picked_up_backers
        while ($j <= intval($data['motivation_rewards_counter'])) {
            //backers for reward #j
            $motivation_reward_backers = round((intval($data['motivation_reward_percent_' . $j]) * $picked_up_backers) / 100, 0);
            $data['motivation_reward_backers_' . $j] = $data['motivation_reward_backers_' . $j] + $motivation_reward_backers;
            $motivation_backers_total_one_session = $motivation_backers_total_one_session + $motivation_reward_backers;

            //pledges for reward #j
            $motivation_reward_pledges = $data['motivation_reward_backers_' . $j] * intval($data['motivation_reward_amount_' . $j]);
            $data['motivation_reward_pledges_' . $j] = $data['motivation_reward_pledges_' . $j] + $motivation_reward_pledges;
            $motivation_pledged_total_one_session = $motivation_pledged_total_one_session + $motivation_reward_pledges;

            //Debug
            if ($this->debug_details) {
                motivation_logging('percent' . $j . ' = ' . $data['motivation_reward_percent_' . $j], true);
                motivation_logging('$motivation_reward_backers = ' . $motivation_reward_backers, true);
                motivation_logging('$motivation_reward_pledges = ' . $motivation_reward_pledges, true);
            }
            $j += 1;
        }

        //main value
        $data['motivation_backers'] = $data['motivation_backers'] + $motivation_backers_total_one_session;
        $data['motivation_pledged'] = $data['motivation_pledged'] + $motivation_pledged_total_one_session;

        //debugging data
        $data['motivation_picked_up_backers'] = $picked_up_backers;
        $data['motivation_backers_total_one_session'] = $motivation_backers_total_one_session;
        $data['motivation_pledged_total_one_session'] = $motivation_pledged_total_one_session;
        $data['motivation_last_randomize_date_time'] = motivation_fetch_date_from_string('now');

        if ($this->debug_details) {
            motivation_logging('motivation_backers = ' . $data['motivation_backers'], true);
            motivation_logging('motivation_pledged = ' . $data['motivation_pledged'], true);
        }

        return $data;
    }

    public function fetchMotivationData($data)
    {
        $motivation_data = [];

        foreach ($data as $key => $val) {
            if (strpos($key, 'motivation_') === 0) {
                $motivation_data[$key] = $val[0];
            }

        };
        return $motivation_data;
    }

    function validateMotivationData($data)
    {
        $result = true;
        if ($data['motivation_minutes_from'] == '' or $data['motivation_minutes_from'] == 0) {
            motivation_logging('"Minutes From" is Empty! Please fill it.');
            $result = false;
        }

        if ($data['motivation_minutes_to'] == '' or $data['motivation_minutes_to'] == 0) {
            motivation_logging('"Minutes To" is Empty! Please fill it.');
            $result = false;
        }

        if ($data['motivation_backers_from'] == '' or $data['motivation_backers_from'] == 0) {
            motivation_logging('"Backers From" is Empty! Please fill it.');
            $result = false;
        }

        if ($data['motivation_backers_to'] == '' or $data['motivation_backers_to'] == 0) {
            motivation_logging('"Backers To" is Empty! Please fill it.');
            $result = false;
        }

        $j = 1;
        while ($j <= intval($data['motivation_rewards_counter'])) {

            if ($data['motivation_reward_percent_' . $j] == '' or $data['motivation_reward_percent_' . $j] == 0 or !isset($data['motivation_reward_percent_' . $j])) {
                motivation_logging('"Reward Percent #"' . $j . ' is Empty! Please fill it.');
                $result = false;
            }
            if ($data['motivation_reward_amount_' . $j] == '' or $data['motivation_reward_amount_' . $j] == 0) {
                motivation_logging('"Reward Amount #"' . $j . ' is Empty! Please fill it.');
                $result = false;
            }
            $j += 1;
        }

        return $result;
    }

    public function updateMotivationMetaData($data, $post_id)
    {
        $result = false;
        foreach ($data as $key => $val) {
            if (($key == 'motivation_last_randomize_date_time') ||
                ($key == 'motivation_company_name') ||
                (strpos($key, 'motivation_celery_url_product_reward_') === 0) ||
                (strpos($key, 'label_motivation_celery_url_product_reward_') === 0)
            ) {
                update_post_meta($post_id, $key, $val);
            } else {
                update_post_meta($post_id, $key, intval($val));
            };
            $result = true;
        };
        return $result;
    }

    public function randomizeAll()
    {
        motivation_logging('Start Total Randomization Process');

        //Main loop trough the posts with post_type = 'product'
        //Don't forget to set up numberposts
        $args = [/*'include' => 246, */
            'post_type' => 'product', 'post_status' => 'publish', 'numberposts' => -1];
        $products = get_posts($args);
        foreach ($products as $post) {
            //action on every post
            motivation_logging('Product - ' . $post->post_title);

            $data = $this->fetchMotivationData(get_post_meta($post->ID));
            if (!$this->validateMotivationData($data)) {
                motivation_logging('This product motivation tab is not set up correctly. Skipping this product.');
                continue;
            } else {
                //Check if the goal reached
                motivation_logging('Pledged: ' . intval($data['motivation_pledged']));
                motivation_logging('Goal: ' . intval($data['motivation_funding_goal']));
                if (intval($data['motivation_pledged']) < intval($data['motivation_funding_goal'])) {
                    motivation_logging('This product is ready for randomizing. Start randomize One !');
                    motivation_logging('The Last date and time of randomization is = ' . $data['motivation_last_randomize_date_time']);
                    //Keeping current time in variable
                    $current_date_time = motivation_fetch_date_from_string('now');;
                    if ($data['motivation_last_randomize_date_time'] == '0') {
                        motivation_logging('Never randomize this product before. Start first time.');
                        $data = $this->randomizeOne($data);
                    } else {
                        motivation_logging('Pickup random minutes between ' . $data['motivation_minutes_from'] . ' and ' . $data['motivation_minutes_to']);
                        $picked_up_minutes = rand(intval($data['motivation_minutes_from']), intval($data['motivation_minutes_to']));
                        motivation_logging('Random Minutes = ' . $picked_up_minutes);
                        motivation_logging('Start to evaluate has the randomization moment for this product came?');
                        $next_randomize_date = motivation_add_minutes_to_date($data['motivation_last_randomize_date_time'], $picked_up_minutes);
                        motivation_logging('Measured date and time is : ' . $next_randomize_date);
                        motivation_logging('Current system  date and time is : ' . $current_date_time);
                        if ($current_date_time >= $next_randomize_date) {
                            motivation_logging('The time is come! Randomize this product!');
                            $data = $this->randomizeOne($data);
                        } else {
                            motivation_logging('The time did not come! Skip this product!');
                            continue;
                        };
                    }
                    //Save metadata
                    if ($this->updateMotivationMetaData($data, $post->ID)) {
                        motivation_logging('Product: ' . $post->post_title . ' Randomized SUCCESSFULLY !!!');
                    } else {
                        motivation_logging('Product: ' . $post->post_title . ' Randomized FAIL !!!');
                    }

                } else {
                    motivation_logging('The goal for this product is reached! No need for randomization.');
                }
            }
        }
        wp_reset_postdata(); // сбрасываем переменную $post
    }

}



