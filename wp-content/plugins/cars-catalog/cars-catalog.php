<?php
/*
Plugin Name: Cars Catalog
Plugin URI: http://masterhans.ru
Description: Saloon for new cars selling.
Author: Alexander Suvorov
Version: 1.0
Author URI: http://masterhans.ru/
*/

/**
 * Register a car post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */


/**
 * Define car-catalog plugin's url path
 */
define('CAR_CATALOG_DIR_URL', plugin_dir_url(__FILE__));

// Add custom admin styles

add_action( 'admin_enqueue_scripts', 'load_custom_admin_styles' );
function load_custom_admin_styles() {

    wp_register_style( 'custom_dashicons', CAR_CATALOG_DIR_URL . 'car/styles.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_dashicons' );
}

add_action( 'init', 'codex_car_init' );
function codex_car_init() {
    $labels = array(
        'name'               => _x( 'Cars Catalog', 'post type general name', 'cars-catalog' ),
        'singular_name'      => _x( 'Car Catalog', 'post type singular name', 'cars-catalog' ),
        'menu_name'          => _x( 'Cars Catalog', 'admin menu', 'cars-catalog' ),
        'name_admin_bar'     => _x( 'Car Catalog', 'add new on admin bar', 'cars-catalog' ),
        'add_new'            => _x( 'Add New', 'car', 'cars-catalog' ),
        'add_new_item'       => __( 'Add New Car', 'cars-catalog' ),
        'new_item'           => __( 'New Car', 'cars-catalog' ),
        'edit_item'          => __( 'Edit Car', 'cars-catalog' ),
        'view_item'          => __( 'View Car', 'cars-catalog' ),
        'all_items'          => __( 'All Cars', 'cars-catalog' ),
        'search_items'       => __( 'Search Cars', 'cars-catalog' ),
        'parent_item_colon'  => __( 'Parent Cars:', 'cars-catalog' ),
        'not_found'          => __( 'No Cars found.', 'cars-catalog' ),
        'not_found_in_trash' => __( 'No Cars found in Trash.', 'cars-catalog' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Cars Catalog.', 'cars-catalog' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'car' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon' => 'dashicons-car-car',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
    );

    register_post_type( 'car', $args );
}

add_action('pre_get_posts','add_car_catalog_to_query');
function add_car_catalog_to_query($query) {
    if(!is_admin()){
        $query->set('post_type', ['post', 'car']);
    }
};

add_filter('the_title', 'prepend_post_title');
function prepend_post_title($title, $id){
    if (is_home()){
        $post_type = get_post_type($id);
        $types =[
            'post' => 'Blog',
            'car' => 'Car',
        ];
        return $types[$post_type] . ': ' . $title;
    };
    return $title;
};

add_filter('the_content','prepend_post_content');
function prepend_post_content ($content){
    if(is_singular()){
        $engine = get_post_meta(get_the_ID(),'engine',true);
        $transmission = get_post_meta(get_the_ID(),'transmission',true);

            $html = '
                <p>Engine: ' . $engine . '  </p>
            ';
        return $content . $html;
    }

    return $content;
};

/*Twitter options page in admin*/
function tweet_link( $content ) {
    return $content . '<p><a href="https://twitter.com/intent/tweet?url='.get_permalink().'">Tweet about this</a></p>';
}
add_action( 'the_content', 'tweet_link' );

add_action('admin_menu', 'tweetlink_settings_menu');

function tweetlink_settings_menu() {
    //add_menu_page('Tweet Link Settings', 'Tweet Link', 'manage_options', 'tweetlink-settings', 'tweetlink_settings_page', 'dashicons-twitter');
    add_options_page('Tweet Link Settings', 'Tweet Link', 'manage_options', 'tweetlink-settings', 'tweetlink_settings_page');
}

function tweetlink_settings_page() {
    ?>
    <div class="wrap">
        <h2>Tweet Link Settings</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'tweetlink_settings' ); ?>
            <?php do_settings_sections( 'tweetlink_settings' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Twitter Account</th>
                    <td><input type="text" name="twitter_account" value="<?php echo esc_attr( get_option('twitter_account') ); ?>" /></td>
                </tr>
            </table>

            <?php submit_button(); ?>

        </form>
    </div>

    <?php
}

add_action( 'admin_init', 'tweetlink_settings' );

function tweetlink_settings() {
    register_setting( 'tweetlink_settings', 'twitter_account' );
}

add_action( 'admin_menu', 'my_plugin_menu' );

function my_plugin_menu() {
    add_options_page(
        'My Options',
        'My Plugin',
        'manage_options',
        'my-plugin.php',
        'my_plugin_page'
    );
}