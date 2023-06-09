<?php
/**
 * Loads customizer-related files (see `/inc/customize`) and sets up customizer functionality.
 *
 * @package    HybridCore
 * @subpackage Includes
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2008 - 2015, Justin Tadlock
 * @link       http://themehybrid.com/hybrid-core
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

# Load custom control classes.
add_action( 'customize_register', 'hybrid_load_customize_classes', 0 );

# Register customizer panels, sections, settings, and/or controls.
add_action( 'customize_register', 'hybrid_customize_register' );

# Register customize controls scripts/styles.
add_action( 'customize_controls_enqueue_scripts', 'hybrid_customize_controls_register_scripts', 0 );
add_action( 'customize_controls_enqueue_scripts', 'hybrid_customize_controls_register_styles',  0 );

# Register/Enqueue customize preview scripts/styles.
add_action( 'customize_preview_init', 'hybrid_customize_preview_register_scripts', 0 );
add_action( 'customize_preview_init', 'hybrid_customize_preview_enqueue_scripts'     );

/**
 * Loads framework-specific customize classes.  These are classes that extend the core `WP_Customize_*`
 * classes to provide theme authors access to functionality that core doesn't handle out of the box.
 *
 * @since  3.0.0
 * @access public
 * @return void
 */
function hybrid_load_customize_classes( $wp_customize ) {

	// Load customize setting classes.
	require_once( HYBRID_CUSTOMIZE . 'setting-array-map.php'  );
	require_once( HYBRID_CUSTOMIZE . 'setting-image-data.php' );

	// Load customize control classes.
	require_once( HYBRID_CUSTOMIZE . 'control-checkbox-multiple.php' );
	require_once( HYBRID_CUSTOMIZE . 'control-dropdown-terms.php'    );
	require_once( HYBRID_CUSTOMIZE . 'control-palette.php'           );
	require_once( HYBRID_CUSTOMIZE . 'control-radio-image.php'       );
	require_once( HYBRID_CUSTOMIZE . 'control-select-group.php'      );
	require_once( HYBRID_CUSTOMIZE . 'control-select-multiple.php'   );

	require_if_theme_supports( 'theme-layouts', HYBRID_CUSTOMIZE . 'control-layout.php' );

	// Register JS control types.
	$wp_customize->register_control_type( 'Hybrid_Customize_Control_Checkbox_Multiple' );
	$wp_customize->register_control_type( 'Hybrid_Customize_Control_Palette'           );
	$wp_customize->register_control_type( 'Hybrid_Customize_Control_Radio_Image'       );
	$wp_customize->register_control_type( 'Hybrid_Customize_Control_Select_Group'      );
	$wp_customize->register_control_type( 'Hybrid_Customize_Control_Select_Multiple'   );
}

/**
 * Register customizer panels, sections, controls, and/or settings.
 *
 * @since  3.0.0
 * @access public
 * @return void
 */


function hybrid_customize_register( $wp_customize ) {

	// Always add the layout section so that theme devs can utilize it.
	$wp_customize->add_section(
		'layout',
		array(
			'title'    => esc_html__( 'Layout', 'hybrid-core' ),
			'priority' => 30,
		)
	);

	// Check if the theme supports the theme layouts customize feature.
	if ( current_theme_supports( 'theme-layouts', 'customize' ) ) {

		// Add the layout setting.
		$wp_customize->add_setting(
			'theme_layout',
			array(
				'default'           => hybrid_get_default_layout(),
				'sanitize_callback' => 'sanitize_key',
				'transport'         => 'postMessage'
			)
		);

		// Add the layout control.
		$wp_customize->add_control(
			new Hybrid_Customize_Control_Layout(
				$wp_customize,
				'theme_layout',
				array( 'label' => esc_html__( 'Global Layout', 'hybrid-core' ) )
			)
		);
	}

	/* Color Section*/
	$wp_customize->add_setting(
        'drop-shipping_topbar_color',
        array(
            'default'     => '#f8f8f8',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
 
    $wp_customize->add_control(
    	 new WP_Customize_Color_Control(
            $wp_customize,
            'drop-shipping_topbar_color',
            array(
                'label'      => __( 'Top Bar Color', 'drop-shipping' ),
                'section'    => 'colors',
                'settings'   => 'drop-shipping_topbar_color',
                'type' => 'color'
            )
            )
    );
	
$wp_customize->add_setting(
        'drop-shipping_main_color',
        array(
            'default'     => '#000000',
            'sanitize_callback' => 'sanitize_hex_color'

        )
    );
 
    $wp_customize->add_control(
    	 new WP_Customize_Color_Control(
            $wp_customize,
            'drop-shipping_main_color',
            array(
                'label'      => __( 'Main Color', 'drop-shipping' ),
                'section'    => 'colors',
                'settings'   => 'drop-shipping_main_color',
                'type' => 'color',
                'description' => __('Color for links, widget headings', 'drop-shipping')
            )
            )
    );

    $wp_customize->add_setting(
        'drop-shipping_second_color',
        array(
            'default'     => '#34b0b0',
            'sanitize_callback' => 'sanitize_hex_color'

        )
    );
 
    $wp_customize->add_control(
    	 new WP_Customize_Color_Control(
            $wp_customize,
            'drop-shipping_second_color',
            array(
                'label'      => __( 'Second Color', 'drop-shipping' ),
                'section'    => 'colors',
                'settings'   => 'drop-shipping_second_color',
                'type' => 'color',
                'description' => __('Color for link hover, category name', 'drop-shipping')
            )
            )
    );

      $wp_customize->add_setting(
        'drop-shipping_third_color',
        array(
            'default'     => '#000',
            'sanitize_callback' => 'sanitize_hex_color'

        )
    );
 
    $wp_customize->add_control(
    	 new WP_Customize_Color_Control(
            $wp_customize,
            'drop-shipping_third_color',
            array(
                'label'      => __( 'Third Color', 'drop-shipping' ),
                'section'    => 'colors',
                'settings'   => 'drop-shipping_third_color',
                'type' => 'color',
                'description' => __('Color for slogan, footer, sidebar text', 'drop-shipping')
            )
            )
    );
/* Theme section panel */
	$wp_customize->add_panel (
		'drop-shipping_theme_options',
		array(
			'title'=> __( 'Theme Settings', 'drop-shipping' ),
			'priority' => 10
			)
		);

/* Home  section*/	
	$wp_customize->add_section(
		'drop-shipping_home_page',
		array(
			'panel' => 'drop-shipping_theme_options',
			'title'    =>__( 'Home Page', 'drop-shipping' ),
			'description' => __('This message shows up when front page is recent posts', 'drop-shipping'),
			'priority' => 10,
		)
	);
$wp_customize->add_setting (
		'drop-shipping_home_page_welcome_title',
		array(
			'default' => '',
			'sanitize_callback' =>'sanitize_text_field',
			)	
		);
	$wp_customize->add_control (
		'drop-shipping_home_page_welcome_title',
		array(
			'section' => 'drop-shipping_home_page',
			'label' => __('Home Page Welcome Title','drop-shipping'),
			'type' => 'text',
			'sanitize_callback' => 'sanitize_text_field',
			)
		);

	$wp_customize->add_setting (
		'drop-shipping_home_page_welcome_text',
		array(
			'default' => '',
			'sanitize_callback' =>'sanitize_text_field',
			)	
		);
	$wp_customize->add_control (
		'drop-shipping_home_page_welcome_text',
		array(
			'section' => 'drop-shipping_home_page',
			'label' => __('Home Page Welcome Text','drop-shipping'),
			'type' => 'textarea',
			'sanitize_callback' => 'sanitize_text_field',
			)
		);


/* Social Network  section*/	
	$wp_customize->add_section(
		'drop-shipping_social_networks',
		array(
			'panel' => 'drop-shipping_theme_options',
			'title'    =>__( 'Social Networks', 'drop-shipping' ),
			'description' => __('Social Networks links', 'drop-shipping'),
			'priority' => 10,
		)
	);

	$wp_customize->add_setting (
		'drop-shipping_facebook_link',
		array(
			'default' => '',
			'sanitize_callback' =>'esc_url_raw',
			)	
		);
	$wp_customize->add_control (
		'drop-shipping_facebook_link',
		array(
			'section' => 'drop-shipping_social_networks',
			'label' => __('Facebook link','drop-shipping'),
			'type' => 'text',
			'sanitize_callback' => 'esc_url_raw',
			)
		);
	$wp_customize->add_setting (
		'drop-shipping_twitter_link',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			)	
		);
	$wp_customize->add_control (
		'drop-shipping_twitter_link',
		array(
			'section' => 'drop-shipping_social_networks',
			'label' => __('Twitter link', 'drop-shipping'),
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'text'
			)
		);
	$wp_customize->add_setting (
		'drop-shipping_instagram_link',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			)	
		);
	$wp_customize->add_control (
		'drop-shipping_instagram_link',
		array(
			'section' => 'drop-shipping_social_networks',
			'label' => __('Instagram link', 'drop-shipping'),
			'type' => 'text',
			'sanitize_callback' => 'esc_url_raw',
			)
		);
	$wp_customize->add_setting (
		'drop-shipping_pinterest_link',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			)	
		);
	$wp_customize->add_control (
		'drop-shipping_pinterest_link',
		array(
			'section' => 'drop-shipping_social_networks',
			'label' => __('Pinterest link','drop-shipping'),
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'text'
			)
		);
	$wp_customize->add_setting (
		'drop-shipping_youtube_link',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			)	
		);
	$wp_customize->add_control (
		'drop-shipping_youtube_link',
		array(
			'section' => 'drop-shipping_social_networks',
			'label' => __('Youtube link','drop-shipping'),
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'text'
			)
		);
	$wp_customize->add_setting (
		'drop-shipping_bloglovin_link',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			)	
		);
	$wp_customize->add_control (
		'drop-shipping_bloglovin_link',
		array(
			'section' => 'drop-shipping_social_networks',
			'label' => __('Bloglovin link','drop-shipping'),
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'text'
			)
		);
	$wp_customize->add_setting (
		'drop-shipping_google_plus_link',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			)	
		);
	$wp_customize->add_control (
		'drop-shipping_google_plus_link',
		array(
			'section' => 'drop-shipping_social_networks',
			'label' => __('Gogle Plus link','drop-shipping'),
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'text'
			)
		);
	$wp_customize->add_setting (
		'drop-shipping_rss_link',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			)	
		);
	$wp_customize->add_control (
		'drop-shipping_rss_link',
		array(
			'section' => 'drop-shipping_social_networks',
			'label' => __('Rss link','drop-shipping'),
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'text'
			)
		);


}
add_action( 'customize_register', 'hybrid_customize_register' );


/**
 * Register customizer controls scripts.
 *
 * @since  3.0.0
 * @access public
 * @return void
 */
function hybrid_customize_controls_register_scripts() {
	wp_register_script( 'hybrid-customize-controls', HYBRID_JS . 'customize-controls' . hybrid_get_min_suffix() . '.js', array( 'customize-controls' ), null, true );
}

/**
 * Register customizer controls styles.
 *
 * @since  3.0.0
 * @access public
 * @return void
 */
function hybrid_customize_controls_register_styles() {
	wp_register_style( 'hybrid-customize-controls', HYBRID_CSS . 'customize-controls' . hybrid_get_min_suffix() . '.css' );
}

/**
 * Register customizer preview scripts.
 *
 * @since  3.0.0
 * @access public
 * @return void
 */
function hybrid_customize_preview_register_scripts() {
	wp_register_script( 'hybrid-customize-preview', HYBRID_JS . 'customize-preview' . hybrid_get_min_suffix() . '.js', array( 'jquery' ), null, true );
}

/**
 * Register customizer preview scripts.
 *
 * @since  3.0.0
 * @access public
 * @return void
 */
function hybrid_customize_preview_enqueue_scripts() {

	if ( current_theme_supports( 'theme-layouts', 'customize' ) )
		wp_enqueue_script( 'hybrid-customize-preview' );
}
