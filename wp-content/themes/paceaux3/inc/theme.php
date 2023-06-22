<?php

# Register custom image sizes.
add_action( 'init', 'hybrid_base_register_image_sizes', 5 );

# Register custom menus.
add_action( 'init', 'hybrid_base_register_menus', 5 );

# Register custom layouts.
add_action( 'hybrid_register_layouts', 'hybrid_base_register_layouts' );

# Register sidebars.
add_action( 'widgets_init', 'hybrid_base_register_sidebars', 5 );

# Add custom scripts and styles
add_action( 'wp_enqueue_scripts', 'hybrid_base_enqueue_scripts', 5 );
add_action( 'wp_enqueue_scripts', 'hybrid_base_enqueue_styles',  5 );

/**
 * Registers custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_register_image_sizes() {

	// Sets the 'post-thumbnail' size.
	set_post_thumbnail_size( 0, 240, true );
}

/**
 * Registers nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_register_menus() {
	register_nav_menu( 'primary',    esc_html_x( 'Primary',    'nav menu location', 'drop-shipping' ) );
	register_nav_menu( 'secondary',  esc_html_x( 'Secondary',  'nav menu location', 'drop-shipping' ) );
	register_nav_menu( 'subsidiary', esc_html_x( 'Subsidiary', 'nav menu location', 'drop-shipping' ) );
}

/**
 * Registers layouts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_register_layouts() {

	hybrid_register_layout( '1c',   array( 'label' => esc_html__( '1 Column',                     'drop-shipping' ), 'image' => '%s/images/layouts/1c.png'   ) );
	hybrid_register_layout( '2c-l', array( 'label' => esc_html__( '2 Columns: Content / Sidebar', 'drop-shipping' ), 'image' => '%s/images/layouts/2c-l.png' ) );
	hybrid_register_layout( '2c-r', array( 'label' => esc_html__( '2 Columns: Sidebar / Content', 'drop-shipping' ), 'image' => '%s/images/layouts/2c-r.png' ) );
}

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => esc_html_x( 'Primary', 'sidebar', 'drop-shipping' ),
			'description' => esc_html__( 'Primary sidebar, displayed  on left or right', 'drop-shipping' )
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'subsidiary',
			'name'        => esc_html_x( 'Header', 'header-widget', 'drop-shipping' ),
			'description' => esc_html__( 'This is the header widget area', 'drop-shipping' )
		)
	);
}

/**
 * Load scripts for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

function hybrid_base_enqueue_scripts() {
	wp_enqueue_script( 'hybrid-mobile-toggle');
}

/**
 * Load stylesheets for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hybrid_base_enqueue_styles() {

	// Load one-five base style.
	//wp_enqueue_style( 'hybrid-one-five' );

	// Load gallery style if 'cleaner-gallery' is active.
	if ( current_theme_supports( 'cleaner-gallery' ) )
		// wp_enqueue_style( 'hybrid-gallery' );

	// Load parent theme stylesheet if child theme is active.
	if ( is_child_theme() )
		wp_enqueue_style( 'hybrid-parent' );

	// Load active theme stylesheet.
	wp_enqueue_style( 'hybrid-style' );  
}

function drop_shipping_customizer_css() {
    ?>
    <style type="text/css">
        #sidebar-primary ul li:before, a { color: <?php echo esc_attr(get_theme_mod( 'drop-shipping_main_color' )); ?>;}

         #searchnavi input, #top-bar { background: <?php echo esc_attr(get_theme_mod( 'drop-shipping_topbar_color' )); ?>; }
         h2.entry-title a:hover, #menu-primary li a:hover, li.current-menu-item > a, body.custom-header #site-title a:hover, a:hover { color: <?php echo esc_attr(get_theme_mod( 'drop-shipping_second_color' )); ?>; }
       h2.entry-title a, #site-description, .sidebar, .credit { color: <?php echo esc_attr(get_theme_mod( 'drop-shipping_third_color' )); ?>; }
    </style>
    <?php 
}
add_action( 'wp_head', 'drop_shipping_customizer_css' );

