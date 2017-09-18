<?php
/**************************************************************************
 * Customizer include file
 * Includes all functions for the customizer with this theme
 **************************************************************************/
/**
 * Bind JS handlers to instantly live-preview changes.
 */
function wpmu_customize_preview_js()
{
    wp_enqueue_script('wpmu-customize-preview', get_theme_file_uri('/assets/js/customize-preview.js'), array('customize-preview'), '1.0', true);
}

add_action('customize_preview_init', 'wpmu_customize_preview_js');

/**************************************************************************
 * Add theme customizer controls, settings etc.
 **************************************************************************/
function wpmu_customize_register($wp_customize)
{
    /*******************************************
     * Sections
     ********************************************/

    // contact details section
    $wp_customize->add_section('wpmu_contact', array(
        'title' => __('Contact Details', 'wpmu')
    ));

    // section for colors
    $wp_customize->add_section('wpmu_colors', array(
        'title' => __('Color Scheme', 'wpmu')
    ));

    // section for Logo
    $wp_customize->add_section('wpmu_logo', array(
        'title' => __('Website Logo', 'wpmu')
    ));

    // add page-layout section
    $wp_customize->add_section('wpmu_page_layout', array(
        'title' => __('Website Page Layout', 'wpmu')
    ));

    // sidebar text
    $wp_customize->add_section('wpmu_sidebar_text', array(
        'title' => __('Sidebar', 'wpmu')
    ));
    // footer text
    $wp_customize->add_section('wpmu_footer_text', array(
        'title' => __('Footer', 'wpmu')
    ));

    //Call to action button
    $wp_customize->add_section('wpmu_call_to_action_text', array(
        'title' => __('Call To Action', 'wpmu')
    ));

    /********************
     * Define generic controls
     *********************/
    // create class to define textarea controls in Customizer
    class wpmu_Customize_Textarea_Control extends WP_Customize_Control
    {

        public $type = 'textarea';

        public function render_content()
        {

            echo '<label>';
            echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
            echo '<textarea rows="2" style ="width: 100%;"';
            $this->link();
            echo '>' . esc_textarea($this->value()) . '</textarea>';
            echo '</label>';

        }
    }

    /**
     * Contact details
     */
    //settings
    // address
    $wp_customize->add_setting('wpmu_address_setting', array(
        'default' => __('Your address', 'wpmu')
    ));
    $wp_customize->add_control(new wpmu_Customize_Textarea_Control(
        $wp_customize,
        'wpmu_address_setting',
        array(
            'label' => __('Address', 'wpmu'),
            'section' => 'wpmu_contact',
            'settings' => 'wpmu_address_setting'
        )));

    //telephone
    $wp_customize->add_setting('wpmu_telephone_setting', array(
        'default' => __('Your telephone number', 'wpmu')
    ));
    $wp_customize->add_control(new wpmu_Customize_Textarea_Control(
        $wp_customize,
        'wpmu_telephone_setting',
        array(
            'label' => __('Telephone Number', 'wpmu'),
            'section' => 'wpmu_contact',
            'settings' => 'wpmu_telephone_setting'
        )));

    //email
    $wp_customize->add_setting('wpmu_email_setting', array(
        'default' => __('Your email address', 'wpmu')
    ));
    $wp_customize->add_control(new wpmu_Customize_Textarea_Control(
        $wp_customize,
        'wpmu_email_setting',
        array(
            'label' => __('Email', 'wpmu'),
            'section' => 'wpmu_contact',
            'settings' => 'wpmu_email_setting'
        )));

    /*******************************************
     * Color scheme
     ********************************************/

    // main color - site title, h1, h2, h4, widget headings, nav links, footer background
    $textcolors[] = array(
        'slug' => 'wpmu_color1',
        'default' => '#3394bf',
        'label' => __('Main color', 'wpmu')
    );

    // secondary color - navigation background
    $textcolors[] = array(
        'slug' => 'wpmu_color2',
        'default' => '#183c5b',
        'label' => __('Secondary color', 'wpmu')
    );

    // link color
    $textcolors[] = array(
        'slug' => 'wpmu_links_color1',
        'default' => '#3394bf',
        'label' => __('Links color', 'wpmu')
    );

    // link color on hover
    $textcolors[] = array(
        'slug' => 'wpmu_links_color2',
        'default' => '#666',
        'label' => __('Links color (on hover)', 'wpmu')
    );

    foreach ($textcolors as $textcolor) {

        // settings
        $wp_customize->add_setting(
            $textcolor['slug'], array(
                'default' => $textcolor['default'],
                'type' => 'option'
            )
        );
        // controls
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            $textcolor['slug'],
            array(
                'label' => $textcolor['label'],
                'section' => 'wpmu_colors',
                'settings' => $textcolor['slug']
            )
        ));
    }

    /**
     * Media upload
     * load Logo
     */
    $wp_customize->add_setting('wpmu_logo_setting', array(
        'default' => __('Your Logo', 'wpmu')
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo',
            array(
                'label' => __('Upload a logo', 'theme_name'),
                'section' => 'wpmu_logo',
                'settings' => 'wpmu_logo_setting',
                'context' => 'your_setting_context'
            )
        )
    );

    /**
     * Add Image styling
     */

    /**
     * Float left Logo to Title
     */
    $wp_customize->add_setting('wpmu_title_float_left_setting', array(
            'default' => 'none',
        )
    );

    $wp_customize->add_control('wpmu_title_float_left_setting', array(
            'label' => __('Title radio float Selection:', 'wpmu'),
            'type' => 'radio',
            'description' => __('This is a custom radio input.'),
            'section' => 'wpmu_logo',
            'settings' => 'wpmu_title_float_left_setting',
            'choices' => array(
                'none' => 'none',
                'left' => 'left',
            ),
            'default' => 'none',
        )
    );

    /**
     * Replace title with logo
     */

    $wp_customize->add_setting('wpmu_title_replace_by_logo_setting', array(
            'default' => 'none',
        )
    );

    $wp_customize->add_control('wpmu_title_replace_by_logo_setting', array(
            'label' => __('Replace title with logo:', 'wpmu'),
            'type' => 'radio',
            'description' => __('Choos what to sho title, logo or both.'),
            'section' => 'wpmu_logo',
            'settings' => 'wpmu_title_replace_by_logo_setting',
            'choices' => array(
                'logo' => __('Logo', 'wpmu'),
                'title' => __('Title', 'wpmu'),
                'both' => __('Both', 'wpmu'),
            ),
            'default' => 'none',
        )
    );
    /**
     * Logo above or below title
     */
    $wp_customize->add_setting('wpmu_logo_position_setting', array(
            'default' => 'below',
        )
    );

    $wp_customize->add_control('wpmu_logo_position_setting', array(
            'label' => __('Choose logo position:', 'wpmu'),
            'type' => 'radio',
            'description' => __('Choose where will logo display above or below title.'),
            'section' => 'wpmu_logo',
            'settings' => 'wpmu_logo_position_setting',
            'choices' => array(
                'above' => __('Logo above title', 'wpmu'),
                'below' => __('Logo below title', 'wpmu'),
            ),
            'default' => 'below',
        )
    );


    /**
     * Page layout
     */
    //Width
    $wp_customize->add_setting('wpmu_page_width_setting', array(
            'default' => 'none',
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'wpmu_page_width_setting',
        array(
            'type' => 'number',
            'label' => __('Page width', 'wpmu'),
            'section' => 'wpmu_page_layout',
            'settings' => 'wpmu_page_width_setting'
        )));

    //columns

    $wp_customize->add_setting('page_layout_column', array(
        'default' => 'two-column',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('page_layout_column', array(
        'label' => __('Page Layout', 'wpmu'),
        'section' => 'wpmu_page_layout',
        'type' => 'radio',
        'description' => __('When the two-column layout is assigned, the page title is in one column and content is in the other.', 'wpmu'),
        'choices' => array(
            'one-column' => __('One Column', 'wpmu'),
            'two-column' => __('Two Column', 'wpmu'),
        ),
    ));

    /**
     * More text options
     */

    // Checkbox to Display SideBar
    $wp_customize->add_setting('display_sidebar', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('display_sidebar', array(
        'label' => __('Display Site Bar ', 'wpmu'),
        'section' => 'wpmu_sidebar_text',
        'type' => 'checkbox',
        'priority' => 11,
    ));


    //The Sidebar Text
    $wp_customize->add_setting('wpmu_sidebar_text_setting', array(
        'default' => __('Enter text for sidebar:', 'wpmu')
    ));
    $wp_customize->add_control(new wpmu_Customize_Textarea_Control(
        $wp_customize,
        'wpmu_sidebar_text_setting',
        array(
            'label' => __('Sidebar text:', 'wpmu'),
            'section' => 'wpmu_sidebar_text',
            'settings' => 'wpmu_sidebar_text_setting'
        )));
    //The Footer Text
    $wp_customize->add_setting('wpmu_footer_text_setting', array(
        'default' => __('Enter text for footer:', 'wpmu')
    ));
    $wp_customize->add_control(new wpmu_Customize_Textarea_Control(
        $wp_customize,
        'wpmu_footer_text_setting',
        array(
            'label' => __('Footer text:', 'wpmu'),
            'section' => 'wpmu_footer_text',
            'settings' => 'wpmu_footer_text_setting'
        )));

    //Call to action button
    $wp_customize->add_setting('wpmu_call_to_action_text_setting', array(
        'default' => __('Enter text for call to action button:', 'wpmu')
    ));
    $wp_customize->add_control(new wpmu_Customize_Textarea_Control(
        $wp_customize,
        'wpmu_call_to_action_text_setting',
        array(
            'label' => __('Call To Action Text:', 'wpmu'),
            'section' => 'wpmu_call_to_action_text',
            'settings' => 'wpmu_call_to_action_text_setting'
        )));
    //radio button  for call to action button
    $wp_customize->add_setting('call_to_action_place_settings', array(
        'default' => 'none',
    ));

    $wp_customize->add_control('call_to_action_place_settings', array(
        'label' => __('Page Layout', 'wpmu'),
        'section' => 'wpmu_call_to_action_text',
        'type' => 'radio',
        'description' => __('Please choose is the call to action button display or not. And choose the position.', 'wpmu'),
        'choices' => array(
            'page' => __('On Pages', 'wpmu'),
            'post' => __('On Posts', 'wpmu'),
            'none' => __('None', 'wpmu'),
        ),
    ));


    //Adds the call to action box to the content of singular page or post or archive
    //phone
    $wp_customize->add_setting('wpmu_cta_content_phone_setting', array(
            'default' => 'Your phone number',
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'wpmu_cta_content_phone_setting',
        array(
            'type' => 'text',
            'label' => __('Phone for CTA box after content:', 'wpmu'),
            'section' => 'wpmu_call_to_action_text',
            'settings' => 'wpmu_cta_content_phone_setting'
        )));
    //email
    $wp_customize->add_setting('wpmu_cta_content_email_setting', array(
            'default' => 'Your email',
        )
    );

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'wpmu_cta_content_email_setting',
        array(
            'type' => 'text',
            'label' => __('Email for CTA box after content:', 'wpmu'),
            'section' => 'wpmu_call_to_action_text',
            'settings' => 'wpmu_cta_content_email_setting'
        )));
    //settings to choose where CTA will appear
    //radio button  for call to action button
    $wp_customize->add_setting('position_cta_box_content_settings', array(
        'default' => 'none',
    ));

    $wp_customize->add_control('position_cta_box_content_settings', array(
        'label' => __('CTA box position:', 'wpmu'),
        'section' => 'wpmu_call_to_action_text',
        'type' => 'radio',
        'description' => __('Please choose position of CTA box after the content.', 'wpmu'),
        'choices' => array(
            'page' => __('On Pages', 'wpmu'),
            'post' => __('On Posts', 'wpmu'),
            'none' => __('None', 'wpmu'),
        ),
    ));
}

add_action('customize_register', 'wpmu_customize_register');

/**********************************************************************
 * Add controls / content to theme
 **********************************************************************/
function wpmu_display_contact_details_in_header()
{ ?>
    <address>

        <p class="address">
            <?php echo get_theme_mod('wpmu_address_setting', 'Your address'); ?>
        </p>

        <p class="tel">
            <?php echo get_theme_mod('wpmu_telephone_setting', 'Your telephone number'); ?>
        </p>

        <?php $email = get_theme_mod('wpmu_email_setting', 'Your email address'); ?>
        <p class="email">
            <a href="<?php echo $email; ?>">
                <?php echo $email; ?>
            </a>
        </p>

    </address>
<?php }

add_action('wpmu_in_header', 'wpmu_display_contact_details_in_header');

/**
 * Add extra text to sidebar hook
 */

function wpmu_display_sidebar_text()
{
    ?>
    <aside>
        <p>
            <?php echo get_theme_mod('wpmu_sidebar_text_setting', 'Your sidebar Text'); ?>
        </p>
    </aside>
<?php }

add_action('wpmu_before_sidebar', 'wpmu_display_sidebar_text');

/**
 * Add extra text to footer hook
 */

function wpmu_display_footer_text()
{
    ?>
    <aside>
        <p>
            <?php echo get_theme_mod('wpmu_footer_text_setting', 'Your footer Text'); ?>
        </p>
    </aside>
<?php }

add_action('wpmu_before_footer', 'wpmu_display_footer_text');


/**
 * Add logo before title to the theme
 */
function wpmu_display_logo_before_header()
{
    ?>
    <?php $img_src = get_theme_mod('wpmu_logo_setting', 'WebSite Logo'); ?>
    <?php if (!empty($img_src)): ?>
    <div class="logo_before_header">
        <img src="<?php echo $img_src; ?>" alt=""
             style="height: 50px; display: <?php echo get_theme_mod('wpmu_logo_position_setting') == 'above' ? 'block' : 'none' ?>">
    </div>
<?php endif; ?>
<?php }

add_action('wpmu_logo_before_header', 'wpmu_display_logo_before_header');

/**
 * Add logo after title to the theme
 */
function wpmu_display_logo_after_header()
{
    ?>
    <?php $img_src = get_theme_mod('wpmu_logo_setting', 'WebSite Logo'); ?>
    <?php if (!empty($img_src)): ?>
    <div class="logo_after_header">
        <img src="<?php echo $img_src; ?>" alt=""
             style="height: 50px; display: <?php echo get_theme_mod('wpmu_logo_position_setting') == 'below' ? 'block' : 'none' ?>">
    </div>
<?php endif; ?>
<?php }

add_action('wpmu_logo_after_header', 'wpmu_display_logo_after_header');

/**
 * Add Call To Action Button befor content
 */
function wpmu_add_call_to_action_befor_content()
{
    ?>
    <?php if ('page' === get_theme_mod('call_to_action_place_settings') && is_page()): ?>
        <div class="call_to_action">
            <button>
                <?php echo get_theme_mod('wpmu_call_to_action_text_setting') ?>
            </button>
        </div>
    <?php elseif ('post' === get_theme_mod('call_to_action_place_settings') && is_singular('post')): ?>
        <div class="call_to_action">
            <button>
                <?php echo get_theme_mod('wpmu_call_to_action_text_setting') ?>
            </button>
        </div>
    <?php endif;
}

    add_action('wpmu_before_content', 'wpmu_add_call_to_action_befor_content');


    /*******************************************************************************
    * add styling to theme - attaches to the wp_head hook
    ********************************************************************************/
    function wpmu_add_color_scheme()
    {
    /****************
    * define text colors
    ****************/
    $color_scheme1 = get_option('wpmu_color1');
    $color_scheme2 = get_option('wpmu_color2');
    $link_color1 = get_option('wpmu_links_color1');
    $link_color2 = get_option('wpmu_links_color2');
    $title_float = get_option('wpmu_title_float_left_setting');

    /**
    * Add classes
    */
    ?>
    <style>
        /* main color Customizer */
        .site-title a:link,
        .site-title a:visited,
        .site-description,
        h1,
        h2,
        h2.page-title,
        h2.post-title,
        h2 a:link,
        h2 a:visited,
        nav.main a:link,
        nav.main a:visited {
            color: <?php echo $color_scheme1; ?>;
        }

        footer {
            background: <?php echo $color_scheme1; ?>;
        }

        /* secondary color */
        nav.main,
        nav.main a {
            background: <?php echo $color_scheme2; ?>;
        }

        /* links color */
        a:link,
        a:visited,
        .sidebar a:link,
        .sidebar a:visited {
            color: <?php echo $link_color1; ?>;
        }

        /* links hover color */
        a:hover,
        a:active,
        .sidebar a:hover,
        .sidebar a:active {
            color: <?php echo $link_color2; ?>;
        }

        .site-title {
            float: <?php echo get_theme_mod('wpmu_title_float_left_setting'); ?>;
        }

        <?php if(get_theme_mod('wpmu_title_replace_by_logo_setting') == 'title'):?>
        .site-title {
            display: block;
        }

        .logo_before_header {
            display: none;
        }

        .logo_after_header {
            display: none;
        }

        <?php elseif(get_theme_mod('wpmu_title_replace_by_logo_setting') == 'logo'): ?>
        .site-title {
            display: none;
        }

        .logo_before_header {
            display: <?php echo (get_theme_mod('wpmu_logo_position_setting') == 'above') ? 'block' : 'none'?>;
        }

        .logo_after_header {
            display: <?php echo (get_theme_mod('wpmu_logo_position_setting') == 'below') ? 'block' : 'none'?>;
        }

        <?php elseif(get_theme_mod('wpmu_title_replace_by_logo_setting') == 'logo'): ?>
        .site-title {
            display: none;
        }

        .logo_before_header {
            display: <?php echo (get_theme_mod('wpmu_logo_position_setting') == 'above') ? 'block' : 'none'?>;
        }

        .logo_after_header {
            display: <?php echo (get_theme_mod('wpmu_logo_position_setting') == 'below') ? 'block' : 'none'?>;
        }

        <?php else: ?>
        .site-title {
            display: block;
        }

        .logo_before_header {
            display: <?php echo (get_theme_mod('wpmu_logo_position_setting') == 'above') ? 'block' : 'none'?>;
        }

        .logo_after_header {
            display: <?php echo (get_theme_mod('wpmu_logo_position_setting') == 'below') ? 'block' : 'none'?>;
        }

        <?php endif;?>
    </style>

<?php }

add_action('wp_head', 'wpmu_add_color_scheme');

/**
 * Hook function with CTA appearance after content
 */

function wpmu_cta_box_after_content () {
?>
    <?php if ((get_theme_mod('position_cta_box_content_settings') === 'post' && is_single()) or (get_theme_mod('position_cta_box_content_settings') === 'page' && is_page())):?>
    <div class="cta_box_after_content">

        Call us on <?php echo get_theme_mod('wpmu_cta_content_phone_setting') ?> or email <a href="<?php echo get_theme_mod('wpmu_cta_content_email_setting') ?>"><?php echo get_theme_mod('wpmu_cta_content_email_setting') ?></a>

    </div>
    <?php endif; ?>

<?php
}

add_action('wpmu_after_content', 'wpmu_cta_box_after_content');

/**
 * Add column class to body
 */

function wpmu_add_class_to_body()
{
// Add class for one or two column page layouts.

    if ('one-column' === get_theme_mod('page_layout_column')) {
        $classes[] = 'page-one-column';
    } else {
        $classes[] = 'page-two-column';
    }

    //add SideBar

    if (get_theme_mod('display_sidebar')) {
        $classes[] = 'has-sidebar';
    }
    return $classes;
}

add_filter('body_class', 'wpmu_add_class_to_body');

/*******************************************************************************
 * add styling to theme - attaches to the wp_head hook
 ********************************************************************************/
function wpmu_add_layout_scheme()
{
    ?>
    <style>

        <?php if (!empty(get_theme_mod('wpmu_page_width_setting')) && is_singular()):?>
        .content {
            width: <?php echo get_theme_mod('wpmu_page_width_setting');?>px !important;
        }

        <?php endif; ?>

        body.page-two-column .post-title {
            float: left;
            width: 36%;
        }

        body.page-two-column .entry-content {
            float: right;
            width: 58%;
        }

        body.page-one-column .post-title {
            width: 740px;
        }

        body.page-one-column .entry-content {
            margin-left: auto;
            margin-right: auto;
        }

        body.has-sidebar .sidebar {
            display: block;
        }

        body:not(has-sidebar) .sidebar {
            display: none;
        }

    </style>

<?php }

add_action('wp_head', 'wpmu_add_layout_scheme');


/*******************************************************************************
 * add styling to call to action box after content
 ********************************************************************************/
function wpmu_add_cta_scheme()
{
    ?>
    <style>
        .cta_box_after_content {
            clear: both;
            width: 25em;
            max-width: 100%;
            margin: 10px 0;
            padding: 15px 5% 3px 5%;
            font: arial, sans-serif;
            font-size: 1.4rem;
            text-align: center;
            line-height: 1.8rem;
            background-color: #222;
            color: #fff;
        }
        .cta a:link,
        .cta a:visited {
            text-decoration: none;
        }
        .cta a:hover,
        .cta a:active {
            text-decoration: underline;
        }

        .sidebar .cta_box_after_content {
            max-width:100%;
            padding:5px;
        }


    </style>

<?php }

add_action('wp_head', 'wpmu_add_cta_scheme');