<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if (! class_exists('MOTIVATION_Frontend_Hook')) {

    class MOTIVATION_Frontend_Hook {

        protected static $_instance;
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * @param $campaign_id
         * @return mixed
         *
         * Get Total funded amount by a campaign
         */

        public function totalFundRaisedByCampaign($campaign_id = 0){
            global $post;

            if ($campaign_id == 0){
                $campaign_id = $post->ID;
            }

            return $funding_goal = get_post_meta( $campaign_id, 'motivation_pledged', true );
        }

        /**
         * @param $campaign_id
         * @return mixed
         *
         * Get total campaign goal
         */
        public function totalGoalByCampaign($campaign_id){
            return $funding_goal = get_post_meta( $campaign_id, '_nf_funding_goal', true );
        }


        /**
         * @param $campaign_id
         * @return int|string
         *
         * Return total percent funded for a campaign
         */
        public function getFundRaisedPercent($campaign_id = 0) {
            
            global $post;
            $percent = 0;
            if ($campaign_id == 0){
                $campaign_id = $post->ID;
            }
            $total = $this->totalFundRaisedByCampaign($campaign_id);
            $goal = $this->totalGoalByCampaign($campaign_id);
            if ($total > 0) {
                $percent = number_format($total / $goal * 100, 2, '.', '');
            }
            return $percent;
        }

        public function getFundRaisedPercentFormat(){
            return $this->getFundRaisedPercent().'%';
        }


        public function ordersIDlistPerCampaign(){

            global $wpdb, $post;
            $prefix = $wpdb->prefix;
            $post_id = $post->ID;

            $query ="SELECT 
                        order_id 
                    FROM 
                        {$wpdb->prefix}woocommerce_order_itemmeta woim 
			        LEFT JOIN 
                        {$wpdb->prefix}woocommerce_order_items oi ON woim.order_item_id = oi.order_item_id 
			        WHERE 
                        meta_key = '_product_id' AND meta_value = %d
			        GROUP BY 
                        order_id ORDER BY order_id DESC ;";
            $order_ids = $wpdb->get_col( $wpdb->prepare( $query, $post_id ) );

            return $order_ids;
        }
        
        public function totalBackers(){
            $wpneo_orders = $this->getCustomersByProductQuery();
            if ($wpneo_orders){
                return $wpneo_orders->post_count;
            }else{
                return 0;
            }
        }
        

    }
}

//Run this class now
WPNEO_Frontend_Hook::instance();
function MOTIVATIONCF(){
    return MOTIVATION_Frontend_Hook::instance();
}
$GLOBALS['MOTIVATIONCF'] = MOTIVATIONCF();