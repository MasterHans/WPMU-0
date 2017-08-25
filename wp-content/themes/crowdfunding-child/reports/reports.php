<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists('Motivation_Celery_Reports')) {
    class Motivation_Celery_Reports
    {
        /**
         * @var null
         *
         * Instance of this class
         */
        protected static $_instance = null;

        /**
         * @return null|Wpneo_Crowdfunding
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function __construct(){
            add_action('admin_menu', array($this, 'motivation_celery_add_reports_page'));
        }

        public function motivation_celery_add_reports_page(){
            add_submenu_page('wpneo-crowdfunding', __('Celery Reports', 'wp-crowdfunding'),__('Celery Reports', 'wp-crowdfunding'),'manage_options', 'motivation-celery-reports', array($this, 'motivation_celery_reports'));
        }


        /**
         *
         */
        public function motivation_celery_reports(){

            //Defining page location into variable
            $default_file = get_stylesheet_directory() . '/reports/pages/reports-celery-orders-chart.php';

            $celery_orders_report = get_stylesheet_directory() . '/reports/pages/reports-celery-orders-chart.php';


            // Settings Tab With slug and Display name
            $tabs = apply_filters('motivation_celery_reports_page_panel_tabs', array(
                    'celery_orders_report' 	=>
                        array(
                            'tab_name' => __('Celery Orders Report','wp-crowdfunding'),
                            'load_form_file' => $celery_orders_report
                        ),
                )
            );

            $current_page = 'celery_orders_report';
            if( ! empty($_GET['tab']) ){
                $current_page = sanitize_text_field($_GET['tab']);
            }

            // Print the Tab Title
            echo '<h1 class="top-reports">'.__( "Celery Charging Process Report" , "wp-crowdfunding" ).'</h1>';
            echo '<h2 class="nav-tab-wrapper">';
            foreach( $tabs as $tab => $name ){
                $class = ( $tab == $current_page ) ? ' nav-tab-active' : '';
                echo "<a class='nav-tab$class' href='?page=motivation-celery-reports&tab=$tab'>{$name['tab_name']}</a>";
            }
            echo '</h2>';

            //Load tab file
            $request_file = $tabs[$current_page]['load_form_file'];

            if (array_key_exists(trim(esc_attr($current_page)), $tabs)){
                if (file_exists($default_file)){
                    include_once $request_file;
                }else{
                    include_once $default_file;
                }
            } else {
                include_once $default_file;
            }
        }

    }
}
Motivation_Celery_Reports::instance();