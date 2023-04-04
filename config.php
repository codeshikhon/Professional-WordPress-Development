<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( !class_exists( 'Redux' ) ) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'shujon_options'; // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */// phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url = Redux_Core::$url . '../sample/patterns/';
$sample_patterns = array();

if ( is_dir( $sample_patterns_path ) ) {
    $sample_patterns_dir = opendir( $sample_patterns_path );

    if ( $sample_patterns_dir ) {

        // phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
        while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                $name = explode( '.', $sample_patterns_file );
                $name = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file,
                );
            }
        }
    }
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
    'a'      => array(
        'href' => array(),
    ),
    'strong' => array(),
    'br'     => array(),
    'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
    // This is where your data is stored in the database and also becomes your global variable name.
    'opt_name'                  => $opt_name,

    // Name that appears at the top of your panel.
    'display_name'              => $theme->get( 'Name' ),

    // Version that appears at the top of your panel.
    'display_version'           => $theme->get( 'Version' ),

    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
    'menu_type'                 => 'menu',

    // Show the sections below the admin menu item or not.
    'allow_sub_menu'            => false,

    // The text to appear in the admin menu.
    'menu_title'                => esc_html__( 'Site Options', 'shujon' ),

    // The text to appear on the page title.
    'page_title'                => esc_html__( 'Site Options', 'shujon' ),

    // Disable to create your own Google fonts loader.
    'disable_google_fonts_link' => false,

    // Show the panel pages on the admin bar.
    'admin_bar'                 => true,

    // Icon for the admin bar menu.
    'admin_bar_icon'            => 'dashicons-admin-generic',

    // Priority for the admin bar menu.
    'admin_bar_priority'        => 50,

    // Sets a different name for your global variable other than the opt_name.
    'global_variable'           => $opt_name,

    // Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
    'dev_mode'                  => false,

    // Enable basic customizer support.
    'customizer'                => true,

    // Allow the panel to open expanded.
    'open_expanded'             => false,

    // Disable the save warning when a user changes a field.
    'disable_save_warn'         => false,

    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_priority'             => 90,

    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
    'page_parent'               => 'themes.php',

    // Permissions needed to access the options panel.
    'page_permissions'          => 'manage_options',

    // Specify a custom URL to an icon.
    'menu_icon'                 => '',

    // Force your panel to always open to a specific tab (by id).
    'last_tab'                  => '',

    // Icon displayed in the admin panel next to your menu_title.
    'page_icon'                 => 'icon-themes',

    // Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
    'page_slug'                 => $opt_name,

    // On load save the defaults to DB before user clicks save.
    'save_defaults'             => false,

    // Display the default value next to each field when not set to the default value.
    'default_show'              => false,

    // What to print by the field's title if the value shown is default.
    'default_mark'              => '*',

    // Shows the Import/Export panel when not used as a field.
    'show_import_export'        => true,

    // The time transients will expire when the 'database' arg is set.
    'transient_time'            => 60 * MINUTE_IN_SECONDS,

    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
    'output'                    => true,

    // Allows dynamic CSS to be generated for customizer and google fonts,
    // but stops the dynamic CSS from going to the page head.
    'output_tag'                => true,

    // Disable the footer credit of Redux. Please leave if you can help it.
    'footer_credit'             => 'Developed by Shujon',

    // If you prefer not to use the CDN for ACE Editor.
    // You may download the Redux Vendor Support plugin to run locally or embed it in your code.
    'use_cdn'                   => true,

    // Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
    'admin_theme'               => 'wp',

    // Enable or disable flyout menus when hovering over a menu with submenus.
    'flyout_submenus'           => true,

    // Mode to display fonts (auto|block|swap|fallback|optional)
    // See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
    'font_display'              => 'swap',

    // HINTS.
    'hints'                     => array(
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
    ),

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'database'                  => '',
    'network_admin'             => true,
    'search'                    => true,
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
// PLEASE CHANGE THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['admin_bar_links'][] = array(
    'id'    => 'redux-docs',
    'href'  => '//devs.redux.io/',
    'title' => __( 'Documentation', 'shujon' ),
);

$args['admin_bar_links'][] = array(
    'id'    => 'redux-support',
    'href'  => '//github.com/ReduxFramework/redux-framework/issues',
    'title' => __( 'Support', 'shujon' ),
);

$args['admin_bar_links'][] = array(
    'id'    => 'redux-extensions',
    'href'  => 'redux.io/extensions',
    'title' => __( 'Extensions', 'shujon' ),
);

// Panel Intro text -> before the form.
if ( !isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
    if ( !empty( $args['global_variable'] ) ) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $args['opt_name'] );
    }
}

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */
$help_tabs = array(
    array(
        'id'      => 'redux-help-tab-1',
        'title'   => esc_html__( 'Theme Information 1', 'shujon' ),
        'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'shujon' ) . '</p>',
    ),
    array(
        'id'      => 'redux-help-tab-2',
        'title'   => esc_html__( 'Theme Information 2', 'shujon' ),
        'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'shujon' ) . '</p>',
    ),
);
Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'shujon' ) . '</p>';

Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 * ---> START SECTIONS
 */

// -> START Basic Fields
Redux::set_section(
    $opt_name,
    array(
        'title'  => esc_html__( 'Website Layout', 'shujon' ),
        'id'     => 'weblayout',
        'icon'   => 'el el-website',
        'fields' => array(
            array(
                'id'            => 'container-w',
                'type'          => 'slider',
                'title'         => esc_html__( 'Container Max Width (px)', 'shujon' ),
                'default'       => 1170,
                'min'           => 300,
                'step'          => 5,
                'max'           => 2000,
                'display_value' => 'text',
            ),
            array(
                'id'            => 'container-spacing',
                'type'          => 'spacing',
                'output'        => array( '.site' ),
                // Have one field that applies to all.
                'all'           => false,

                // You can specify a unit value. Possible: px, em, %.
                'units'         => array( 'px', 'em', '%' ),

                // Set to false to hide the units if the units are specified.
                'display_units' => true,
                'title'         => esc_html__( 'Container Padding (Left|Right)', 'shujon' ),
                'default'       => array(
                    'padding-right' => '30',
                    'padding-left'  => '30',
                    'units'         => 'px',
                ),
                'top'           => false, // Disable the top.
                'bottom'        => false, // Disable the bottom.
            ),
            array(
                'id'             => 'header-spacing',
                'type'           => 'spacing',
                'all'            => false,
                'units'          => array( 'em', 'px', '%' ),
                'units_extended' => true,
                'title'          => __( 'Header Padding', 'shujon' ),
                'output'         => array( '.site-header' ),
                'default'        => array(
                    'padding-top'    => '0',
                    'padding-right'  => '0',
                    'padding-bottom' => '0',
                    'padding-left'   => '0',
                    'units'          => 'px',
                ),
            ),
            array(
                'id'            => 'sitemain-w',
                'type'          => 'slider',
                'title'         => esc_html__( 'Main Content Max Width (px)', 'shujon' ),
                'default'       => 800,
                'min'           => 300,
                'step'          => 1,
                'max'           => 1200,
                'display_value' => 'text',
            ),
            array(
                'id'             => 'sitemain-spacing',
                'type'           => 'spacing',
                'all'            => false,
                'units'          => array( 'em', 'px', '%' ),
                'units_extended' => true,
                'title'          => __( 'Site Main Content Padding', 'shujon' ),
                'output'         => array( '.site-main' ),
                'default'        => array(
                    'padding-top'    => '0',
                    'padding-right'  => '0',
                    'padding-bottom' => '0',
                    'padding-left'   => '0',
                    'units'          => 'px',
                ),
            ),
            array(
                'id'            => 'sidebar-w',
                'type'          => 'slider',
                'title'         => esc_html__( 'Sidebar Max Width (px)', 'shujon' ),
                'default'       => 300,
                'min'           => 100,
                'step'          => 1,
                'max'           => 800,
                'display_value' => 'text',
            ),
            array(
                'id'             => 'sidebar-spacing',
                'type'           => 'spacing',
                'all'            => false,
                'units'          => array( 'em', 'px', '%' ),
                'units_extended' => true,
                'title'          => __( 'Sidebar Padding', 'shujon' ),
                'output'         => array( '.widget-area' ),
                'default'        => array(
                    'padding-top'    => '0',
                    'padding-right'  => '0',
                    'padding-bottom' => '0',
                    'padding-left'   => '0',
                    'units'          => 'px',
                ),
            ),
            array(
                'id'             => 'widget-spacing',
                'type'           => 'spacing',
                'all'            => true,
                'units'          => array( 'em', 'px', '%' ),
                'units_extended' => true,
                'title'          => __( 'Widget Padding', 'shujon' ),
                'output'         => array( '.widget-area .widget' ),
                'default'        => array(
                    'padding-top'    => '0',
                    'padding-right'  => '0',
                    'padding-bottom' => '0',
                    'padding-left'   => '0',
                    'units'          => 'px',
                ),
            ),
            array(
                'id'             => 'footer-spacing',
                'type'           => 'spacing',
                'all'            => false,
                'units'          => array( 'em', 'px', '%' ),
                'units_extended' => true,
                'title'          => __( 'Widget Padding', 'shujon' ),
                'output'         => array( '.site-footer' ),
                'default'        => array(
                    'padding-top'    => '0',
                    'padding-right'  => '0',
                    'padding-bottom' => '0',
                    'padding-left'   => '0',
                    'units'          => 'px',
                ),
            ),
        ),
    )
);

Redux::set_section(
    $opt_name,
    array(
        'title'  => esc_html__( 'Colors', 'shujon' ),
        'id'     => 'webcolors',
        'icon'   => 'el el-adjust',
        'fields' => array(
            array(
                'id'      => 'body-background',
                'type'    => 'background',
                'output'  => array(
                    'background-color' => 'body',
                    'important'        => true,
                ),
                'default' => array(
                    'background-color' => '#f0f0f0',
                ),
                'title'   => __( 'Body Background', 'shujon' ),
            ),
            array(
                'id'       => 'site-main-bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Main Content Color', 'shujon' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.site-main',
                ),
            ),
            array(
                'id'       => 'widget-bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Widget Background Color', 'shujon' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.widget-area .widget',
                ),
            ),
            array(
                'id'      => 'link-color',
                'type'    => 'link_color',
                'title'   => esc_html__( 'Links Color', 'shujon' ),
                'default' => array(
                    'regular' => '#4169e1',
                    'hover'   => '#000',
                    'active'  => '#000',
                ),
                'output'  => array(
                    '.site a'
                ),
            ),
            array(
                'id'       => 'text-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Body Text Color', 'shujon' ),
                'default'  => '#000000',
                'validate' => 'color',
                'output'   => array(
                    'color' => 'body',
                ),
            ),
        ),
    )
);

Redux::set_section(
    $opt_name,
    array(
        'title'  => esc_html__( 'Typography', 'shujon' ),
        'id'     => 'font-styles',
        'icon'   => 'el el-fontsize',
        'fields' => array(
            array(
                'id'                => 'body-font',
                'type'              => 'typography',
                'title'             => esc_html__( 'Body Font', 'shujon' ),
                'google'            => true,
                'font_family_clear' => true,
                'default'           => array(
                    'font-size'   => '16px',
                    'font-family' => 'Arial, Helvetica, sans-serif',
                    'font-weight' => 'Normal',
                ),
                'output'            => array( 'body, p' ),
                'color'             => false,
            ),
            array(
                'id'          => 'heading-font',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading Fonts', 'shujon' ),

                // Use if you want to hook in your own CSS compiler.
                'compiler'    => true,

                // Select a backup non-google font in addition to a Google font.
                'font-backup' => true,

                // Enable all Google Font style/weight variations to be added to the page.
                'all-styles'  => true,
                'all-subsets' => true,
                'units'       => 'px',
                'default'     => array(
                    'color'       => '#333',
                    'font-style'  => '700',
                    'font-family' => 'Abel',
                    'google'      => true,
                    'font-size'   => '36px',
                    'line-height' => '42px',
                ),
                'output'      => array( '.entry-content h1, .entry-content h2' ),

            ),
            array(
                'id'                => 'entry-title',
                'type'              => 'typography',
                'title'             => esc_html__( 'Title Font', 'shujon' ),
                'google'            => true,
                'font_family_clear' => false,
                'margin-top'        => true,
                'margin-bottom'     => true,
                'default'           => array(
                    'font-size'     => '30px',
                    'font-family'   => 'Arial, Helvetica, sans-serif',
                    'font-weight'   => 'Normal',
                    'margin-top'    => '20px',
                    'margin-bottom' => '20px',
                ),
                'output'            => array( '.entry-title' ),
            ),
            array(
                'id'                => 'widget-title',
                'type'              => 'typography',
                'title'             => esc_html__( 'Widget Title Font', 'shujon' ),
                'google'            => true,
                'font_family_clear' => true,
                'default'           => array(
                    'font-size'   => '20px',
                    'font-family' => 'Arial, Helvetica, sans-serif',
                    'font-weight' => 'Normal',
                ),
                'output'            => array( '.widget h2, .widget h3' ),
                'color'             => false,
            ),
            array(
                'id'                => 'footer-copyright',
                'type'              => 'typography',
                'title'             => esc_html__( 'Footer Copyright Font', 'shujon' ),
                'google'            => true,
                'font_family_clear' => true,
                'default'           => array(
                    'font-size'   => '13px',
                    'font-family' => 'Arial, Helvetica, sans-serif',
                    'font-weight' => 'Normal',
                ),
                'output'            => array( '.site-info p' ),
                'color'             => false,
            ),
        ),
    )
);

Redux::set_section(
   $opt_name,
   array(
       'title'  => esc_html__( 'Header', 'shujon' ),
       'id'     => 'header-styles',
       'icon'   => 'el el-credit-card',
       'fields' => array(
         array(
				'id'       => 'header-menu',
				'type'     => 'select',
				'data'     => 'menus',
				'title'    => esc_html__( 'Header Menu', 'shujon' ),
			),
         array(
				'id'             => 'header-menu-item-spacing',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'all'            => false,
				'units'          => array( 'em', 'px', '%' ),
				'units_extended' => true,
				'title'          => __( 'Header Menu Item Padding', 'shujon' ),
				'default'        => array(
					'padding-top'    => '15',
					'padding-right'  => '15',
					'padding-bottom' => '15',
					'padding-left'   => '15',
					'units'         => 'px',
				),
            'output'      => array( '.main-navigation a' ),
			),
       )
   )
);

Redux::set_section(
   $opt_name,
   array(
       'title'  => esc_html__( 'Footer', 'shujon' ),
       'id'     => 'footer-styles',
       'icon'   => 'el el-photo',
       'fields' => array(
         array(
				'id'       => 'footer-menu',
				'type'     => 'select',
				'data'     => 'menus',
				'title'    => esc_html__( 'Footer Menu', 'shujon' ),
			),
         array(
				'id'             => 'footer-menu-item-spacing',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'all'            => false,
				'units'          => array( 'em', 'px', '%' ),
				'units_extended' => true,
				'title'          => __( 'Footer Menu Item Padding', 'shujon' ),
				'default'        => array(
					'padding-top'    => '15',
					'padding-right'  => '15',
					'padding-bottom' => '15',
					'padding-left'   => '15',
					'units'         => 'px',
				),
            'output'      => array( '.site-footer .menu a' ),
			),
         array(
				'id'           => 'footer-logo',
				'type'         => 'media',
				'url'          => true,
				'title'        => esc_html__( 'Footer Logo', 'shujon' ),
				'compiler'     => 'true',
				'preview_size' => 'full',
			),
			array(
				'id'      => 'front-footer-copyright',
				'type'    => 'editor',
				'title'   => esc_html__( 'Footer Copyright', 'shujon' ),
				'default' => __( 'Copyright © 2023', 'shujon' ),
				'args'    => array(
					'wpautop'       => false,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'teeny'         => false,
					'quicktags'     => false,
				),
			)
       )
   )
);

Redux::set_section(
   $opt_name,
   array(
       'title'  => esc_html__( 'Social & Slider', 'shujon' ),
       'id'     => 'social-slider',
       'icon'   => 'el el-slideshare',
       'fields'     => array(
			array(
				'id'       => 'social_links',
				'type'     => 'multi_text',
				'title'    => esc_html__( 'Social Site Link', 'shujon' ),
            'validate' => 'url'
			),
         array(
				'id'          => 'website-slider',
				'type'        => 'slides',
				'title'       => esc_html__( 'Slider', 'shujon' ),
				'placeholder' => array(
					'title'       => esc_html__( 'This is a title', 'shujon' ),
					'description' => esc_html__( 'Description Here', 'shujon' ),
					'url'         => esc_html__( 'Give us a link!', 'shujon' ),
				),
			),
		),
   )
);

/*
 * <--- END SECTIONS
 */

/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */

/*
 * --> Action hook examples.
 */

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section. Can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if ( !function_exists( 'compiler_action' ) ) {
    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field's value has changed and compiler=>true is set.
     *
     * @param array  $options        Options values.
     * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
     * @param array  $changed_values Any values changed since last save.
     */
    function compiler_action( array $options, string $css, array $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo '<pre>';
        // phpcs:ignore WordPress.PHP.DevelopmentFunctions
        print_r( $changed_values ); // Values that have changed since the last save.
        // echo '<br/>';
        // print_r($options); //Option values.
        // echo '<br/>';
        // print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS ).
        echo '</pre>';
    }
}

if ( !function_exists( 'redux_validate_callback_function' ) ) {
    /**
     * Custom function for the callback validation referenced above
     *
     * @param array $field          Field array.
     * @param mixed $value          New value.
     * @param mixed $existing_value Existing value.
     *
     * @return array
     */
    function redux_validate_callback_function( array $field, $value, $existing_value ): array{
        $error = false;
        $warning = false;

        // Do your validation.
        if ( 1 === (int) $value ) {
            $error = true;
            $value = $existing_value;
        } elseif ( 2 === (int) $value ) {
            $warning = true;
            $value = $existing_value;
        }

        $return['value'] = $value;

        if ( true === $error ) {
            $field['msg'] = 'your custom error message';
            $return['error'] = $field;
        }

        if ( true === $warning ) {
            $field['msg'] = 'your custom warning message';
            $return['warning'] = $field;
        }

        return $return;
    }
}

if ( !function_exists( 'dynamic_section' ) ) {
    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
     *
     * @param array $sections Section array.
     *
     * @return array
     */
    function dynamic_section( array $sections ): array{
        $sections[] = array(
            'title'  => esc_html__( 'Section via hook', 'shujon' ),
            'desc'   => '<p class="description">' . esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'shujon' ) . '</p>',
            'icon'   => 'el el-paper-clip',

            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array(),
        );

        return $sections;
    }
}

if ( !function_exists( 'change_arguments' ) ) {
    /**
     * Filter hook for filtering the args.
     * Good for child themes to override or add to the args array. Can also be used in other functions.
     *
     * @param array $args Global arguments array.
     *
     * @return array
     */
    function change_arguments( array $args ): array{
        $args['dev_mode'] = true;

        return $args;
    }
}

if ( !function_exists( 'change_defaults' ) ) {
    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     *
     * @param array $defaults Default value array.
     *
     * @return array
     */
    function change_defaults( array $defaults ): array{
        $defaults['str_replace'] = esc_html__( 'Testing filter hook!', 'shujon' );

        return $defaults;
    }
}

if ( !function_exists( 'redux_custom_sanitize' ) ) {
    /**
     * Function to be used if the field sanitize argument.
     * Return value MUST be the formatted or cleaned text to display.
     *
     * @param string $value Value to evaluate or clean.  Required.
     *
     * @return string
     */
    function redux_custom_sanitize( string $value ): string {
        $return = '';

        foreach ( explode( ' ', $value ) as $w ) {
            foreach ( str_split( $w ) as $k => $v ) {
                if (  ( $k + 1 ) % 2 !== 0 && ctype_alpha( $v ) ) {
                    $return .= mb_strtoupper( $v );
                } else {
                    $return .= $v;
                }
            }

            $return .= ' ';
        }

        return $return;
    }
}
