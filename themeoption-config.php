<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "fi_print_options";

    // This line is adding in extensions.
//    Redux::setExtensions( $opt_name, dirname(__FILE__).'/../main-extensions');

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => false,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'fi-print' ),
        'page_title'           => __( 'Theme Options', 'fi-print' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer_only'      => false,
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
//    $args['admin_bar_links'][] = array(
//        'id'    => 'redux-docs',
//        'href'  => 'http://docs.reduxframework.com/',
//        'title' => __( 'Documentation', 'fi-print' ),
//    );

//    $args['admin_bar_links'][] = array(
//        //'id'    => 'redux-support',
//        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
//        'title' => __( 'Support', 'fi-print' ),
//    );

//    $args['admin_bar_links'][] = array(
//        'id'    => 'redux-extensions',
//        'href'  => 'reduxframework.com/extensions',
//        'title' => __( 'Extensions', 'fi-print' ),
//    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
//    $args['share_icons'][] = array(
//        'url'   => 'https://github.com/',
//        'title' => 'Visit us on GitHub',
//        'icon'  => 'el el-github'
//        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
//    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/fi_printthemes',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.twitter.com/fi_printthemes',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
//    $args['share_icons'][] = array(
//        'url'   => 'http://www.linkedin.com/',
//        'title' => 'Find us on LinkedIn',
//        'icon'  => 'el el-linkedin'
//    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
//        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'fi-print' ), $v );
    } else {
//        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'fi-print' );
    }

    // Add content after the form.
//    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'fi-print' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

//    $tabs = array(
//        array(
//            'id'      => 'redux-help-tab-1',
//            'title'   => __( 'Theme Information 1', 'fi-print' ),
//            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'fi-print' )
//        ),
//        array(
//            'id'      => 'redux-help-tab-2',
//            'title'   => __( 'Theme Information 2', 'fi-print' ),
//            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'fi-print' )
//        )
//    );
//    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
//    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'fi-print' );
//    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -----------------------------------------------------------------------------------
    //  0.  Customizer - Set subsections
    // -----------------------------------------------------------------------------------

    if ( is_customize_preview() ) {

        // Change subtitle text in customizer / options panel
        $fi_print_subtitle_customizer   = 'subtitle';
        $fi_print_subtitle_panel        = NULL;

        // Change section field used in customizer / options panel
        $fi_print_section_field         = 'fi_print_section';

        // Enable sub-sections in customizer
        $fi_print_customizer_subsection = true;

        Redux::setSection( $opt_name, array(
            'title'            => __( 'Theme Options', 'fi-print' ),
            'id'               => 'fi_print_theme_options',
            'desc'             => __( 'Use the options below to customize your theme!', 'fi-print' ),
            'customizer_width' => '400px',
            'icon'             => 'el el-home',
            'customizer'       => true,
        ) );

    } else {

        // Disable sub-sections in theme options panel
        $fi_print_customizer_subsection = false;

        // Change subtitle text in customizer / options panel
        $fi_print_subtitle_customizer   = NULL;
        $fi_print_subtitle_panel        = 'subtitle';

        // Change section field used in customizer / options panel
        $fi_print_section_field         = 'section';

    }


    // -----------------------------------------------------------------------------------
    //  1.  General Settings
    // -----------------------------------------------------------------------------------

    Redux::setSection( $opt_name, array(
        'title'      => __('General Settings', 'fi-print'),
        'header'     => __('Welcome to the Simple Options Framework Demo', 'fi-print'),
        'desc'       => __('<span class="redux-title">Logo & Favicon Settings</span>', 'fi-print'),
        'icon_class' => '',
        'icon'       => 'el el-wrench',
        'subsection' => $fi_print_customizer_subsection,
        'customizer' => true,
        'fields'     => array(
            array(
                 'id'        => 'preloader',
                 'type'      => 'switch',
                 'title'     => __('Activate preloader', 'fi-print'),
                 'subtitle'  => __('Smooth page loader for your site', 'fi-print'),
                 'default'   => '1',
             ),


            array(
                'id'        => 'preloader-logo',
                'type'      => 'media',
                'title'     => __('Logo in the Preloader', 'fi-print'),
                'compiler'  => 'true',
                'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'subtitle'  => __('Upload logo to be displayed on prelaoder', 'fi-print'),

            ),
              array(
                        'id'        => 'logo',
                        'type'      => 'media',
                        'title'     => __('Logo Normal', 'fi-print'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'subtitle'  => __('Upload header logo for your website', 'fi-print'),

                    ),

                    array(
                        'id'        => 'retinalogo',
                        'type'      => 'media',
                        'title'     => __('Retina Normal', 'fi-print'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'subtitle'  => __('Upload header logo for your website', 'fi-print'),

                    ),

                    array(
                        'id'        => 'top-bar-title-1',
                        'type'      => 'text',
                        'title'     => __('Top Bar Title One', 'fi-print'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                    ),

                    array(
                        'id'        => 'top-bar-detail-1',
                        'type'      => 'text',
                        'title'     => __('Top Bar Detail One', 'fi-print'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                    ),

                    array(
                        'id'        => 'top-bar-title-2',
                        'type'      => 'text',
                        'title'     => __('Top Bar Title Two', 'fi-print'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                    ),

                    array(
                        'id'        => 'top-bar-detail-2',
                        'type'      => 'text',
                        'title'     => __('Top Bar Title Detail Two', 'fi-print'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                    ),
                    array(
                        'id'        => 'top-bar-title-3',
                        'type'      => 'text',
                        'title'     => __('Top Bar Title Three', 'fi-print'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.

                    ),

                    array(
                        'id'        => 'top-bar-detail-3',
                        'type'      => 'text',
                        'title'     => __('Top Bar Detail Three', 'fi-print'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                    ),


            array(
                'title'                      => __('Select a Sidebar', 'fi-print'),
                $fi_print_subtitle_panel      => __('Choose a sidebar to use with the page layout.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Choose a sidebar to use with the page layout.', 'fi-print'),
                'id'                         => 'fi_print_general_sidebars',
                'type'                       => 'select',
                'data'                       => 'sidebars',
                'required'                   => array(
                    array( 'fi_print_general_layout', '=',
                        array( 'option2', 'option3' ),
                    ),
                )
            ),

            array(
                'title'                      => __('Enable Fixed Layout', 'fi-print'),
                $fi_print_subtitle_panel      => __('Check to enable fixed layout.<br />(i.e. Disable responsive layout)', 'fi-print'),
                $fi_print_subtitle_customizer => __('Check to enable fixed layout.<br />(i.e. Disable responsive layout)', 'fi-print'),
                'id'                         => 'fi_print_general_fixedlayoutswitch',
                'type'                       => 'switch',
            ),

            array(
                'title'                      => __('Enable Breadcrumbs', 'fi-print'),
                $fi_print_subtitle_panel      => __('Switch on to enable breadcrumbs.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Switch on to enable breadcrumbs.', 'fi-print'),
                'id'                         => 'fi_print_general_breadcrumbswitch',
                'type'                       => 'switch',
                'default'                    => '0',
            ),

            array(
                'title'                      => __('Breadcrumb Delimiter', 'fi-print'),
                $fi_print_subtitle_panel      => __('Specify a custom delimiter to use instead of the default &#40; / &#41; when displaying breadcrumbs.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Specify a custom delimiter to use instead of the default &#40; / &#41; when displaying breadcrumbs.', 'fi-print'),
                'default'                    => '/',
                'id'                         => 'fi_print_general_breadcrumbdelimeter',
                'type'                       => 'text',
                'validate'                   => 'html',
                'required'                   => array(
                    array( 'fi_print_general_breadcrumbswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_section_general_code',
                'type'     => $fi_print_section_field,
                'title'    => __( ' ', 'fi-print' ),
                'subtitle' => __( '<span class="redux-title">Custom Code</span>', 'fi-print' ),
                'indent'   => false,
            ),

            array(
                'title'                      => __('Custom CSS', 'fi-print'),
                $fi_print_subtitle_panel      => __('Developers can use this to apply custom css. Use this to control, by styling of any element on the webpage by targeting id&#39;s and classes.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Developers can use this to apply custom css. Use this to control, by styling of any element on the webpage by targeting id&#39;s and classes.', 'fi-print'),
                'id'                         => 'fi_print_general_customcss',
                'type'                       => 'textarea',
                'validate'                   => 'css',
            ),

//          array(
//              'title'                      => __('Custom jQuery - Front End', 'fi-print'),
//              $fi_print_subtitle_panel      => __('Developers can use this to apply custom jQuery which will only affect the front end of the website.<br /><br />Use this to control your site by adding great jQuery features.', 'fi-print'),
//              $fi_print_subtitle_customizer => __('Developers can use this to apply custom jQuery which will only affect the front end of the website.<br /><br />Use this to control your site by adding great jQuery features.', 'fi-print'),
//              'id'                         => 'fi_print_general_customjavafront',
//              'type'                       => 'textarea',
//          ),

            // Ensures ThinkUpThemes custom code is output
            array(
                'title'    => __('Custom Code', 'fi-print'),
                'subtitle' => __('Custom Code', 'fi-print'),
                'id'       => 'fi_print_customization',
                'type'     => 'fi_print_custom_code',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'type' => 'divide',
    ) );

    // -----------------------------------------------------------------------------------
    //  2.1.    Home Settings
    // -----------------------------------------------------------------------------------

    Redux::setSection( $opt_name, array(
        'title'      => __('Homepage', 'fi-print'),
        'desc'       => __('<span class="redux-title">Homepage Layout</span>', 'fi-print'),
        'icon_class' => '',
        'icon'       => 'el el-home',
        'subsection' => $fi_print_customizer_subsection,
        'customizer' => true,
        'fields'     => array(

            array(
                'title'                      => __('Homepage Layout', 'fi-print'),
                $fi_print_subtitle_panel      => __('Select page layout. This will only be applied to the home page.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Select page layout. This will only be applied to the home page.', 'fi-print'),
                'id'                         => 'fi_print_homepage_layout',
                'type'                       => 'image_select',
                'compiler'                   => true,
                'default'                    => '0',
                'options'                    => array(
                    'option1' => array('alt' => '1 Column',       'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
                    'option2' => array('alt' => '2 Column Left',  'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
                    'option3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
                ),
            ),

            array(
                'title'                      => __('Select a Sidebar', 'fi-print'),
                $fi_print_subtitle_panel      => __('Choose a sidebar to use with the layout.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Choose a sidebar to use with the layout.', 'fi-print'),
                'id'                         => 'fi_print_homepage_sidebars',
                'type'                       => 'select',
                'data'                       => 'sidebars',
                'required'                   => array(
                    array( 'fi_print_homepage_layout', '=',
                        array( 'option2', 'option3' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_section_homepage_slider',
                'type'     => $fi_print_section_field,
                'title'    => __( ' ', 'fi-print' ),
                'subtitle' => __( '<span class="redux-title">Homepage Slider</span>', 'fi-print' ),
                'indent'   => false,
            ),

            array(
                'title'                      => __('Enable Homepage Slider', 'fi-print'),
                $fi_print_subtitle_panel      => __('Switch on to enable home page slider.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Switch on to enable home page slider.', 'fi-print'),
                'id'                         => 'fi_print_homepage_sliderswitch',
                'type'                       => 'button_set',
                'options'                    => array(
                    'option1'                => 'ThinkUpSlider',
                    'option2'                => 'Custom Slider',
                    'option3'                => 'Disable'
                ),
                'default'                    => 'option1'
            ),

            array(
                'id'                         => 'fi_print_homepage_slidername',
                'title'                      => __('Homepage Slider Shortcode', 'fi-print'),
                $fi_print_subtitle_panel      => __('Input the shortcode of the slider you want to display. I.e. [shortcode_name].', 'fi-print'),
                $fi_print_subtitle_customizer => __('Input the shortcode of the slider you want to display. I.e. [shortcode_name].', 'fi-print'),
                'type'                       => 'text',
                'validate'                   => 'html',
                'required'                   => array(
                    array( 'fi_print_homepage_sliderswitch', '=',
                        array( 'option2' ),
                    ),
                )
            ),

            array(
                'id'                         => 'fi_print_homepage_sliderpreset',
                'title'                      => __('Built-In Slider', 'fi-print'),
                $fi_print_subtitle_panel      => __('Unlimited slides with drag and drop sortings.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Unlimited slides with drag and drop sortings.', 'fi-print'),
                'type'                       => 'fi_print_slider_free',
                'required'                   => array(
                    array( 'fi_print_homepage_sliderswitch', '=',
                        array( 'option1' ),
                    ),
                )
            ),

            array(
                'id'                         => 'fi_print_homepage_sliderpresetwidth',
                'title'                      => __('Enable Full-Width Slider', 'fi-print'),
                $fi_print_subtitle_panel      => __('Switch on to enable full-width slider.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Switch on to enable full-width slider.', 'fi-print'),
                'type'                       => 'switch',
                'default'                    => '1',
                'required'                   => array(
                    array( 'fi_print_homepage_sliderswitch', '=',
                        array( 'option1' ),
                    ),
                )
            ),

            array(
                'id'                         => 'fi_print_homepage_sliderpresetheight',
                'type'                       => 'slider',
                'title'                      => __('Slider Height (Max)', 'fi-print'),
                $fi_print_subtitle_panel      => __('Specify the maximum slider height (px).', 'fi-print'),
                $fi_print_subtitle_customizer => __('Specify the maximum slider height (px).', 'fi-print'),
                "default"                    => "350",
                "min"                        => "200",
                "step"                       => "5",
                "max"                        => "800",
                'required'                   => array(
                    array( 'fi_print_homepage_sliderswitch', '=',
                        array( 'option1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_section_homepage_ctaintro',
                'type'     => $fi_print_section_field,
                'title'    => __( ' ', 'fi-print' ),
                'subtitle' => __( '<span class="redux-title">Call To Action - Intro</span>', 'fi-print' ),
                'indent'   => false,
            ),

            array(
                'title'   => __('Message', 'fi-print'),
                'desc'    => __('Check to enable intro on home page.', 'fi-print'),
                'id'      => 'fi_print_homepage_introswitch',
                'type'    => 'checkbox',
                'default' => '0',
            ),

            array(
                $fi_print_subtitle_panel      => __('Enter a <strong>main</strong> message.<br /><br />This will be one of the first messages your visitors see. Use this to get their attention.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Enter a <strong>main</strong> message.<br /><br />This will be one of the first messages your visitors see. Use this to get their attention.', 'fi-print'),
                'id'                         => 'fi_print_homepage_introaction',
                'type'                       => 'textarea',
                'validate'                   => 'html',
            ),

            array(
                $fi_print_subtitle_panel      => __('Enter a <strong>teaser</strong> message. <br /><br />Use this to provide more details about what you offer.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Enter a <strong>teaser</strong> message. <br /><br />Use this to provide more details about what you offer.', 'fi-print'),
                'id'                         => 'fi_print_homepage_introactionteaser',
                'type'                       => 'textarea',
                'validate'                   => 'html',
            ),

            array(
                'title'                      => __('Button Text', 'fi-print'),
                $fi_print_subtitle_panel      => __('Input text to display on the action button.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Input text to display on the action button.', 'fi-print'),
                'id'                         => 'fi_print_homepage_introactionbutton',
                'type'                       => 'text',
                'validate'                   => 'html',
            ),

            array(
                'title'                      => __('Link', 'fi-print'),
                $fi_print_subtitle_panel      => __('Specify whether the action button should link to a page on your site, out to external webpage or disable the link altogether.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Specify whether the action button should link to a page on your site, out to external webpage or disable the link altogether.', 'fi-print'),
                'id'                         => 'fi_print_homepage_introactionlink',
                'type'                       => 'radio',
                'options'                    => array(
                    'option1' => 'Link to a Page',
                    'option2' => 'Specify Custom link',
                    'option3' => 'Disable Link'
                ),
            ),

            array(
                'title'                      => __('Link to a page', 'fi-print'),
                $fi_print_subtitle_panel      => __('Select a target page for action button link.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Select a target page for action button link.', 'fi-print'),
                'id'                         => 'fi_print_homepage_introactionpage',
                'type'                       => 'select',
                'data'                       => 'pages',
                'required'                   => array(
                    array( 'fi_print_homepage_introactionlink', '=',
                        array( 'option1' ),
                    ),
                )
            ),

            array(
                'title'                      => __('Custom link', 'fi-print'),
                $fi_print_subtitle_panel      => __('Input a custom url for the action button link.<br>Add http:// if linking to an external webpage.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Input a custom url for the action button link.<br>Add http:// if linking to an external webpage.', 'fi-print'),
                'id'                         => 'fi_print_homepage_introactioncustom',
                'type'                       => 'text',
                'validate'                   => 'html',
                'required'                   => array(
                    array( 'fi_print_homepage_introactionlink', '=',
                        array( 'option2' ),
                    ),
                )
            ),
        )
    ) );


    // -----------------------------------------------------------------------------------
    //  2.2.    Homepage (Featured)
    // -----------------------------------------------------------------------------------

    Redux::setSection( $opt_name, array(
        'title'      => __('Homepage (Featured)', 'fi-print'),
        'desc'       => __('<span class="redux-title">Display Pre-Designed Homepage Layout</span>', 'fi-print'),
        'icon_class' => '',
        'icon'       => 'el el-pencil',
        'subsection' => $fi_print_customizer_subsection,
        'customizer' => true,
        'fields'     => array(

            array(
                'title'                      => __('Enable Pre-Made Homepage ', 'fi-print'),
                $fi_print_subtitle_panel      => __('switch on to enable pre-designed homepage layout.', 'fi-print'),
                $fi_print_subtitle_customizer => __('switch on to enable pre-designed homepage layout.', 'fi-print'),
                'id'                         => 'fi_print_homepage_sectionswitch',
                'type'                       => 'switch',
                'default'                    => '1',
            ),

            array(
                'id'       => 'fi_print_homepage_section1_icon',
                'title'    => __('Content Area 1', 'fi-print'),
                'desc'     => __('Choose an icon for the section background.', 'fi-print'),
                'type'     => 'select',
                'data'     => 'elusive-icons',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section1_title',
                'desc'     => __('Add a title to the section.', 'fi-print'),
                'type'     => 'text',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section1_desc',
                'desc'     => __('Add a description to the section.', 'fi-print'),
                'type'     => 'textarea',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section1_link',
                'desc'     => __('Link to a page', 'fi-print'),
                'type'     => 'select',
                'data'     => 'pages',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section2_icon',
                'title'    => __('Content Area 2', 'fi-print'),
                'desc'     => __('Choose an icon for the section background.', 'fi-print'),
                'type'     => 'select',
                'data'     => 'elusive-icons',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section2_title',
                'desc'     => __('Add a title to the section.', 'fi-print'),
                'type'     => 'text',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section2_desc',
                'desc'     => __('Add a description to the section.', 'fi-print'),
                'type'     => 'textarea',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section2_link',
                'desc'     => __('Link to a page', 'fi-print'),
                'type'     => 'select',
                'data'     => 'pages',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section3_icon',
                'title'    => __('Content Area 3', 'fi-print'),
                'desc'     => __('Choose an icon for the section background.', 'fi-print'),
                'type'     => 'select',
                'data'     => 'elusive-icons',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section3_title',
                'desc'     => __('Add a title to the section.', 'fi-print'),
                'type'     => 'text',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section3_desc',
                'desc'     => __('Add a description to the section.', 'fi-print'),
                'type'     => 'textarea',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'id'       => 'fi_print_homepage_section3_link',
                'desc'     => __('Link to a page', 'fi-print'),
                'type'     => 'select',
                'data'     => 'pages',
                'required' => array(
                    array( 'fi_print_homepage_sectionswitch', '=',
                        array( '1' ),
                    ),
                )
            ),
        )
    ) );


    // -----------------------------------------------------------------------------------
    //  3.  Header
    // -----------------------------------------------------------------------------------

    Redux::setSection( $opt_name, array(
        'title'      => __('Header', 'fi-print'),
        'desc'       => __('<span class="redux-title">Control Header Content</span>', 'fi-print'),
        'icon'       => 'el el-chevron-up',
        'icon_class' => '',
        'subsection' => $fi_print_customizer_subsection,
        'customizer' => true,
        'fields'     => array(

            array(
                'title'                      => __('Enable Search', 'fi-print'),
                $fi_print_subtitle_panel      => __('Switch on to enable header search.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Switch on to enable header search.', 'fi-print'),
                'id'                         => 'fi_print_header_searchswitch',
                'type'                       => 'switch',
                'default'                    => '0',
            ),

            array(
                'title'                      => __('Enable Social Media Links', 'fi-print'),
                $fi_print_subtitle_panel      => __('Switch on to enable links to social media pages.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Switch on to enable links to social media pages.', 'fi-print'),
                'id'                         => 'fi_print_header_socialswitch',
                'type'                       => 'switch',
                'default'                    => '0',
            ),

            array(
                'id'       => 'fi_print_section_header_social',
                'type'     => $fi_print_section_field,
                'title'    => __( ' ', 'fi-print' ),
                'subtitle' => __( '<span class="redux-title">Social Media Content</span>', 'fi-print' ),
                'indent'   => false,
            ),

            array(
                'title'                      => __('Display Message', 'fi-print'),
                $fi_print_subtitle_panel      => __('Add a message here. E.g. &#34;Follow Us&#34;.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Add a message here. E.g. &#34;Follow Us&#34;.', 'fi-print'),
                'id'                         => 'fi_print_header_socialmessage',
                'type'                       => 'text',
                'validate'                   => 'html',
            ),

            // Facebook social settings
            array(
                'title'                      => __('Facebook', 'fi-print'),
                $fi_print_subtitle_panel      => __('Enable link to Facebook profile.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Enable link to Facebook profile.', 'fi-print'),
                'id'                         => 'fi_print_header_facebookswitch',
                'type'                       => 'switch',
                'default'                    => '0',
            ),

            array(
                'desc'     => __('Input the url to your Facebook page. <strong>Note:</strong> Add http:// as the url is an external link.', 'fi-print'),
                'id'       => 'fi_print_header_facebooklink',
                'type'     => 'text',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_header_facebookswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Use Custom Facebook Icon', 'fi-print'),
                'id'       => 'fi_print_header_facebookiconswitch',
                'type'     => 'checkbox',
                'default'  => '0',
                'required' => array(
                    array( 'fi_print_header_facebookswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'fi-print'),
                'id'       => 'fi_print_header_facebookcustomicon',
                'type'     => 'media',
                'url'      => true,
                'required' => array(
                    array( 'fi_print_header_facebookswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            // Twitter social settings
            array(
                'title'                      => __('Twitter', 'fi-print'),
                $fi_print_subtitle_panel      => __('Enable link to Twitter profile.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Enable link to Twitter profile.', 'fi-print'),
                'id'                         => 'fi_print_header_twitterswitch',
                'type'                       => 'switch',
                'default'                    => '0',
            ),

            array(
                'desc'     => __('Input the url to your Twitter page. <strong>Note:</strong> Add http:// as the url is an external link.', 'fi-print'),
                'id'       => 'fi_print_header_twitterlink',
                'type'     => 'text',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_header_twitterswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Use Custom Twitter Icon', 'fi-print'),
                'id'       => 'fi_print_header_twittericonswitch',
                'type'     => 'checkbox',
                'default'  => '0',
                'required' => array(
                    array( 'fi_print_header_twitterswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'fi-print'),
                'id'       => 'fi_print_header_twittercustomicon',
                'type'     => 'media',
                'url'      => true,
                'required' => array(
                    array( 'fi_print_header_twitterswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            // Google+ social settings
            array(
                'title'                      => __('Google+', 'fi-print'),
                $fi_print_subtitle_panel      => __('Enable link to Google+ profile.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Enable link to Google+ profile.', 'fi-print'),
                'id'                         => 'fi_print_header_googleswitch',
                'type'                       => 'switch',
                'default'                    => '0',
            ),

            array(
                'desc'     => __('Input the url to your Google+ page. <strong>Note:</strong> Add http:// as the url is an external link.', 'fi-print'),
                'id'       => 'fi_print_header_googlelink',
                'type'     => 'text',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_header_googleswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Use Custom Google+ Icon', 'fi-print'),
                'id'       => 'fi_print_header_googleiconswitch',
                'type'     => 'checkbox',
                'default'  => '0',
                'required' => array(
                    array( 'fi_print_header_googleswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'fi-print'),
                'id'       => 'fi_print_header_googlecustomicon',
                'type'     => 'media',
                'url'      => true,
                'required' => array(
                    array( 'fi_print_header_googleswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            // LinkedIn social settings
            array(
                'title'                      => __('LinkedIn', 'fi-print'),
                $fi_print_subtitle_panel      => __('Enable link to LinkedIn profile.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Enable link to LinkedIn profile.', 'fi-print'),
                'id'                         => 'fi_print_header_linkedinswitch',
                'type'                       => 'switch',
                'default'                    => '0',
            ),

            array(
                'desc'     => __('Input the url to your LinkedIn page. <strong>Note:</strong> Add http:// as the url is an external link.', 'fi-print'),
                'id'       => 'fi_print_header_linkedinlink',
                'type'     => 'text',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_header_linkedinswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Use Custom LinkedIn Icon', 'fi-print'),
                'id'       => 'fi_print_header_linkediniconswitch',
                'type'     => 'checkbox',
                'default'  => '0',
                'required' => array(
                    array( 'fi_print_header_linkedinswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'fi-print'),
                'id'       => 'fi_print_header_linkedincustomicon',
                'type'     => 'media',
                'url'      => true,
                'required' => array(
                    array( 'fi_print_header_linkedinswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            // Flickr social settings
            array(
                'title'                      => __('Flickr', 'fi-print'),
                $fi_print_subtitle_panel      => __('Enable link to Flickr profile.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Enable link to Flickr profile.', 'fi-print'),
                'id'                         => 'fi_print_header_flickrswitch',
                'type'                       => 'switch',
                'default'                    => '0',
            ),

            array(
                'desc'     => __('Input the url to your Flickr page. <strong>Note:</strong> Add http:// as the url is an external link.', 'fi-print'),
                'id'       => 'fi_print_header_flickrlink',
                'type'     => 'text',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_header_flickrswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Use Custom Flickr Icon', 'fi-print'),
                'id'       => 'fi_print_header_flickriconswitch',
                'type'     => 'checkbox',
                'default'  => '0',
                'required' => array(
                    array( 'fi_print_header_flickrswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'fi-print'),
                'id'       => 'fi_print_header_flickrcustomicon',
                'type'     => 'media',
                'url'      => true,
                'required' => array(
                    array( 'fi_print_header_flickrswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            // Last FM social settings
            array(
                'title'                      => __('Last FM', 'fi-print'),
                $fi_print_subtitle_panel      => __('Enable link to Last FM profile.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Enable link to Last FM profile.', 'fi-print'),
                'id'                         => 'fi_print_header_lastfmswitch',
                'type'                       => 'switch',
                'default'                    => '0',
            ),

            array(
                'desc'     => __('Input the url to your Last FM page. <strong>Note:</strong> Add http:// as the url is an external link.', 'fi-print'),
                'id'       => 'fi_print_header_lastfmlink',
                'type'     => 'text',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_header_lastfmswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Use Custom Last FM Icon', 'fi-print'),
                'id'       => 'fi_print_header_lastfmiconswitch',
                'type'     => 'checkbox',
                'default'  => '0',
                'required' => array(
                    array( 'fi_print_header_lastfmswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'fi-print'),
                'id'       => 'fi_print_header_lastfmcustomicon',
                'type'     => 'media',
                'url'      => true,
                'required' => array(
                    array( 'fi_print_header_lastfmswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            // RSS social settings
            array(
                'title'                      => __('RSS', 'fi-print'),
                $fi_print_subtitle_panel      => __('Enable link to RSS profile.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Enable link to RSS profile.', 'fi-print'),
                'id'                         => 'fi_print_header_rssswitch',
                'type'                       => 'switch',
                'default'                    => '0',
            ),

            array(
                'desc'     => __('Input the url to your RSS page. <strong>Note:</strong> Add http:// as the url is an external link.', 'fi-print'),
                'id'       => 'fi_print_header_rsslink',
                'type'     => 'text',
                'validate' => 'html',
                'required' => array(
                    array( 'fi_print_header_rssswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Use Custom RSS Icon', 'fi-print'),
                'id'       => 'fi_print_header_rssiconswitch',
                'type'     => 'checkbox',
                'default'  => '0',
                'required' => array(
                    array( 'fi_print_header_rssswitch', '=',
                        array( '1' ),
                    ),
                )
            ),

            array(
                'desc'     => __('Add a link to the image or upload one from your desktop. The image will be resized.', 'fi-print'),
                'id'       => 'fi_print_header_rsscustomicon',
                'type'     => 'media',
                'url'      => true,
                'required' => array(
                    array( 'fi_print_header_rssswitch', '=',
                        array( '1' ),
                    ),
                )
            ),
        )
    ) );


    // -----------------------------------------------------------------------------------
    //  4.  Footer
    // -----------------------------------------------------------------------------------

    Redux::setSection( $opt_name, array(
        'title'      => __('Footer', 'fi-print'),
        'desc'       => __('<span class="redux-title">Control Footer Content</span>', 'fi-print'),
        'icon'       => 'el el-chevron-down',
        'icon_class' => '',
        'subsection' => $fi_print_customizer_subsection,
        'customizer' => true,
        'fields'     => array(

            array(
                'title'                      => __('Footer Widgets Layout', 'fi-print'),
                $fi_print_subtitle_panel      => __('Select footer layout. Take complete control of the footer content by adding widgets.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Select footer layout. Take complete control of the footer content by adding widgets.', 'fi-print'),
                'id'                         => 'fi_print_footer_layout',
                'type'                       => 'image_select',
                'compiler'                   => true,
                'default'                    => '0',
                'options'                    => array(
                    'option1'  => ReduxFramework::$_url . 'assets/img/layout/footer/option01.png',
                    'option2'  => ReduxFramework::$_url . 'assets/img/layout/footer/option02.png',
                    'option3'  => ReduxFramework::$_url . 'assets/img/layout/footer/option03.png',
                    'option4'  => ReduxFramework::$_url . 'assets/img/layout/footer/option04.png',
                    'option5'  => ReduxFramework::$_url . 'assets/img/layout/footer/option05.png',
                    'option6'  => ReduxFramework::$_url . 'assets/img/layout/footer/option06.png',
                    'option7'  => ReduxFramework::$_url . 'assets/img/layout/footer/option07.png',
                    'option8'  => ReduxFramework::$_url . 'assets/img/layout/footer/option08.png',
                    'option9'  => ReduxFramework::$_url . 'assets/img/layout/footer/option09.png',
                    'option10' => ReduxFramework::$_url . 'assets/img/layout/footer/option10.png',
                    'option11' => ReduxFramework::$_url . 'assets/img/layout/footer/option11.png',
                    'option12' => ReduxFramework::$_url . 'assets/img/layout/footer/option12.png',
                    'option13' => ReduxFramework::$_url . 'assets/img/layout/footer/option13.png',
                    'option14' => ReduxFramework::$_url . 'assets/img/layout/footer/option14.png',
                    'option15' => ReduxFramework::$_url . 'assets/img/layout/footer/option15.png',
                    'option16' => ReduxFramework::$_url . 'assets/img/layout/footer/option16.png',
                    'option17' => ReduxFramework::$_url . 'assets/img/layout/footer/option17.png',
                    'option18' => ReduxFramework::$_url . 'assets/img/layout/footer/option18.png',
                    ),
                ),

            array(
                'title'   => __('Disable Footer Widgets', 'fi-print'),
                'desc'    => __('Check to disable footer widgets.', 'fi-print'),
                'id'      => 'fi_print_footer_widgetswitch',
                'type'    => 'checkbox',
                'default' => '0',
            ),
        )
    ) );


    // -----------------------------------------------------------------------------------
    //  5.  Blog
    // -----------------------------------------------------------------------------------

    Redux::setSection( $opt_name, array(
        'title'      => __('Blog', 'fi-print'),
        'desc'       => __('<span class="redux-title">Control Blog Pages</span>', 'fi-print'),
        'icon'       => 'el el-comment',
        'icon_class' => '',
        'subsection' => $fi_print_customizer_subsection,
        'customizer' => true,
        'fields'     => array(

            array(
                'title'                      => __('Blog Layout', 'fi-print'),
                $fi_print_subtitle_panel      => __('Select blog page layout. Only applied to the main blog page and not individual posts.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Select blog page layout. Only applied to the main blog page and not individual posts.', 'fi-print'),
                'id'                         => 'fi_print_blog_layout',
                'type'                       => 'image_select',
                'compiler'                   => true,
                'options'                    => array(
                    'option1' => ReduxFramework::$_url . 'assets/img/layout/blog/option01.png',
                    'option2' => ReduxFramework::$_url . 'assets/img/layout/blog/option02.png',
                    'option3' => ReduxFramework::$_url . 'assets/img/layout/blog/option03.png',
                ),
            ),

            array(
                'title'                      => __('Select a Sidebar', 'fi-print'),
                $fi_print_subtitle_panel      => __('<strong>Note:</strong> Sidebars will not be applied to homepage Blog. Control sidebars on the homepage from the &#39;Home Settings&#39; option.', 'fi-print'),
                $fi_print_subtitle_customizer => __('<strong>Note:</strong> Sidebars will not be applied to homepage Blog. Control sidebars on the homepage from the &#39;Home Settings&#39; option.', 'fi-print'),
                'id'                         => 'fi_print_blog_sidebars',
                'type'                       => 'select',
                'data'                       => 'sidebars',
                'required'                   => array(
                    array( 'fi_print_blog_layout', '=',
                        array( 'option2', 'option3' ),
                    ),
                )
            ),

            array(
                'title'                      => __('Post Content', 'fi-print'),
                $fi_print_subtitle_panel      => __('Control how much content you want to show from each post on the main blog page. Remember to control the full article content by using the Wordpress <a href="http://en.support.wordpress.com/splitting-content/more-tag/">more</a> tag in your post.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Control how much content you want to show from each post on the main blog page. Remember to control the full article content by using the Wordpress <a href="http://en.support.wordpress.com/splitting-content/more-tag/">more</a> tag in your post.', 'fi-print'),
                'id'                         => 'fi_print_blog_postswitch',
                'type'                       => 'radio',
                'options'                    => array(
                    'option1' => 'Show excerpt',
                    'option2' => 'Show full article',
                    'option3' => 'Hide article',
                ),
            ),

            array(
                'id'       => 'fi_print_section_post_layout',
                'type'     => $fi_print_section_field,
                'title'    => __( ' ', 'fi-print' ),
                'subtitle' => __( '<span class="redux-title">Control Single Post Page</span>', 'fi-print' ),
                'indent'   => false,
            ),

            array(
                'title'                      => __('Post Layout', 'fi-print'),
                $fi_print_subtitle_panel      => __('Select blog page layout. This will only be applied to individual posts and not the main blog page.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Select blog page layout. This will only be applied to individual posts and not the main blog page.', 'fi-print'),
                'id'                         => 'fi_print_post_layout',
                'type'                       => 'image_select',
                'compiler'                   => true,
                'default'                    => 'option1',
                'options'                    => array(
                    'option1' => array('alt' => '1 Column',       'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
                    'option2' => array('alt' => '2 Column Left',  'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
                    'option3' => array('alt' => '2 Column Right', 'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
                ),
            ),

            array(
                'title'                      => __('Select a Sidebar', 'fi-print'),
                $fi_print_subtitle_panel      => __('Choose a sidebar to use with the layout.', 'fi-print'),
                $fi_print_subtitle_customizer => __('Choose a sidebar to use with the layout.', 'fi-print'),
                'id'                         => 'fi_print_post_sidebars',
                'type'                       => 'select',
                'data'                       => 'sidebars',
                'required'                   => array(
                    array( 'fi_print_post_layout', '=',
                        array( 'option2', 'option3' ),
                    ),
                )
            ),
        )
    ) );
 Redux::setSection( $opt_name, array(
        'title'      => __('Portfolio', 'fi-print'),
        'desc'       => __('<span class="redux-title">Control Portfolio Pages</span>', 'fi-print'),
        'icon'       => 'el el-comment',
        'icon_class' => '',
        'subsection' => $fi_print_customizer_subsection,
        'customizer' => true,
        'fields'     => array(
            array(
                'title'   => __('Portfolio Number', 'fi-print'),
                'desc'    => __('Number of portfolio elements to display in portfolio page', 'fi-print'),
                'id'      => 'portfolio_number',
                'type'    => 'text',
                'default' => '10',
            ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=> true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

