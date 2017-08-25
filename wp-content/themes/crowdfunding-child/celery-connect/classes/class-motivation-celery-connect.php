<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Motivation_Celery_Connect extends WC_Payment_Gateway
{
    public $celery_enabled;
    public $celery_live_celery_user_id;
    public $celery_live_celery_access_token;
    public $celery_order_retrieve_url;
    public $celery_product_checkout_url;

    /**
     * Motivation_Celery_Connect constructor.
     */
    public function __construct()
    {
        $this->id = 'motivation_celery_connect';
        $this->method_title = 'Motivation Celery connect';
        $this->init_form_fields();
        add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
        $this->init_settings();
        $this->celery_enabled = $this->get_option('enabled');
        $this->celery_live_celery_user_id = $this->get_option('live_celery_user_id');
        $this->celery_live_celery_access_token = $this->get_option('live_celery_access_token');
        $this->celery_order_retrieve_url = $this->get_option('celery_order_retrieve_url');
        $this->celery_product_checkout_url = $this->get_option('celery_product_checkout_url');
    }

    /**
     * Initialise Gateway Settings Form Fields.
     */
    public function init_form_fields()
    {

        $this->form_fields = array(
            'enabled' => array(
                'title' => __('Enable Celery Connect Payment', 'wp-crowdfunding'),
                'label' => __('Enable Celery Connect Payment', 'wp-crowdfunding'),
                'type' => 'checkbox',
                'description' => '',
                'default' => 'no',

            ),
            'live_celery_user_id' => array(
                'title' => __('Celery User ID', 'wp-crowdfunding'),
                'type' => 'text',
                'description' => __('Get your user ID from Celery dashboard settings (Celery-Settings-Integration)', 'wp-crowdfunding'),
                'default' => '',
                'desc_tip' => true,
            ),
            'live_celery_access_token' => array(
                'title' => __('Celery Access Token', 'wp-crowdfunding'),
                'type' => 'text',
                'description' => __('Get your Access Token from Celery dashboard settings (Celery-Settings-Integration)', 'wp-crowdfunding'),
                'default' => '',
                'desc_tip' => true,
            ),

            'celery_order_retrieve_url' => array(
                'title' => __('Celery base URL to retrieve Orders', 'wp-crowdfunding'),
                'type' => 'text',
                'description' => __('Request to retrieve all orders would resemble', 'wp-crowdfunding'),
                'default' => '',
                'desc_tip' => true,
            ),

            'celery_product_checkout_url' => array(
                'title' => __('Celery base URL redirect users to Celery checkout form', 'wp-crowdfunding'),
                'type' => 'text',
                'description' => __('Use this base URL to direct customers to your products and checkout', 'wp-crowdfunding'),
                'default' => '',
                'desc_tip' => true,
            ),
        );

    }

    //CurlClient

    // USER DEFINED TIMEOUTS

    const DEFAULT_TIMEOUT = 80;
    const DEFAULT_CONNECT_TIMEOUT = 30;

    private $timeout = self::DEFAULT_TIMEOUT;
    private $connectTimeout = self::DEFAULT_CONNECT_TIMEOUT;

    public function setTimeout($seconds)
    {
        $this->timeout = (int)max($seconds, 0);
        return $this;
    }

    public function setConnectTimeout($seconds)
    {
        $this->connectTimeout = (int)max($seconds, 0);
        return $this;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    public function getConnectTimeout()
    {
        return $this->connectTimeout;
    }

    // END OF USER DEFINED TIMEOUTS


    public function request($method, $absUrl, $headers, $params, $hasFile)
    {
        $curl = curl_init();
        $method = strtolower($method);


        $opts = array();

        if ($method == 'get') {
            if ($hasFile) {
                throw new \Exception(
                    "Issuing a GET request with a file parameter"
                );
            }
            $opts[CURLOPT_HTTPGET] = 1;

        } elseif ($method == 'post') {
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
        } else {
            throw new \Exception("Unrecognized method $method");
        }

        $opts[CURLOPT_URL] = $absUrl;
        $opts[CURLOPT_RETURNTRANSFER] = true;
        $opts[CURLOPT_CONNECTTIMEOUT] = $this->connectTimeout;
        $opts[CURLOPT_TIMEOUT] = $this->timeout;
        $opts[CURLOPT_HTTPHEADER] = $headers;

        curl_setopt_array($curl, $opts);
        $respond_body = curl_exec($curl);
        curl_close($curl);

        return $respond_body;
    }

    public function get_order_from_celery($order_id)
    {
        $absUrl = $this->celery_order_retrieve_url . $order_id;
        $headers = [
            'Content-Type:application/json',
            'Authorization:' . $this->celery_live_celery_access_token,
        ];
        try {
            $order = $this->request('GET', $absUrl, $headers, null, false);
            return $order;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function charge_order_on_celery($woo_order_data)
    {
        // add the order note
        $respond = '';
        $celery_meta_code = '';

        $absUrl = $this->celery_order_retrieve_url . get_post_meta($woo_order_data->id, 'celery_order_id', true) . '/payment_charge';
        $headers = [
            'Content-Type:application/json',
            'Authorization:' . $this->celery_live_celery_access_token,
        ];
        try {
            $respond = $this->request('POST', $absUrl, $headers, null, false);
            $respond = json_decode($respond, true);
            $celery_meta_code = $respond['meta']['code'];

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if ($celery_meta_code === 200) {
            $message = "This order is charged !!!";
            $woo_order_data->add_order_note($message);
            // add the flag
            update_post_meta($woo_order_data->id, 'is_charged', 1);
            update_post_meta($woo_order_data->id, 'charge_respond_from_celery', 'SUCCESSFULLY CHARGED');
            update_post_meta($woo_order_data->id, 'charge_date_from_celery', motivation_get_current_date_time());

            //Changing order status
            $change_status_order = [
                'ID' => $woo_order_data->id,
                'post_status' => 'wc-completed',
            ];
            // Update the post into the database
            wp_update_post($change_status_order);

            return true;
        } else {
            $message = 'Failed to charge message from Celery:' . $respond['data'];
            $woo_order_data->add_order_note($message);
            update_post_meta($woo_order_data->id, 'charge_respond_from_celery', $respond['data']);
            return false;
        }

        return false;
    }


}


function add_motivation_celery_connect($methods)
{
    $methods[] = 'Motivation_Celery_Connect';
    return $methods;
}

add_filter('woocommerce_payment_gateways', 'add_motivation_celery_connect');