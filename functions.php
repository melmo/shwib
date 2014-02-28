<?php
/* Load the core theme framework. */
require_once( trailingslashit( TEMPLATEPATH ) . '/_/hybrid/hybrid.php' );
$theme = new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'shwib_theme_setup' );
add_action( 'after_setup_theme', 'shwib_additional_setup' );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 * @since 0.1.0
 */
function shwib_theme_setup() {

	/* Get action/filter hook prefix. */
	$prefix = hybrid_get_prefix();

	/* Add theme support for core framework features. */
	add_theme_support( 'hybrid-core-menus', array( 'primary', 'secondary', 'subsidiary' ) );
	add_theme_support( 'hybrid-core-sidebars', array( 'pages', 'posts', 'header', 'subsidiary', 'after-singular' ) );
	add_theme_support( 'hybrid-core-widgets' );
	add_theme_support( 'hybrid-core-shortcodes' );
	//add_theme_support( 'hybrid-core-post-meta-box' );
	//add_theme_support( 'hybrid-core-theme-settings' );
	add_theme_support( 'hybrid-core-seo' );
	add_theme_support( 'hybrid-core-template-hierarchy' );
	add_theme_support( 'loop-pagination' );
	// add_theme_support( 'get-the-image' );
	//add_theme_support( 'cleaner-gallery' );
	add_theme_support('post_thumbnails');
	add_theme_support( 'automatic-feed-links' );
	// add_custom_background();

}

function shwib_additional_setup() {
	// Additional widget classes with number of each widget position and first/last widget class.
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/widget-classes.php' );
	// Apple Touch Icons
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/apple-touch-icons.php' );
	// Better excerpt handling - required for Facebook open graph tags
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/excerpts.php' );
	// Loop Meta
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/loop-meta.php' );
	// Facebook Open Graph tags
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/facebook-open-graph.php' );
	// Twitter Cards
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/twitter-cards.php' );
}


/**
 * Enqueue additional scripts here.
 *
 *
 */

add_action('wp_enqueue_scripts', 'shwib_add_scripts');

function shwib_add_scripts() {

  	wp_enqueue_script('modernizr',
       get_template_directory_uri() . '/_/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js',
       false,
       '2.6.2' );
   	wp_enqueue_script('bootstrap',
       get_template_directory_uri() . '/_/js/vendor/bootstrap.min.js',
       array("jquery"),
       '3.0.0', true );
   	wp_enqueue_script('main',
       get_template_directory_uri() . '/_/js/main.js',
       array("bootstrap", "jquery"),
       '1.0', true );
}

/**
 * Makes CSS behave when user is logged in and admin bar is visible
 *
 *
 */

add_action( 'wp_footer', 'content_bump' );

function content_bump() {
	if(is_user_logged_in()) echo "<style>.navbar-fixed-top {top: 28px;}</style>";
}


// Add menu-parent-item class to tops li of submenu
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {
	
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'dropdown'; 
		}
	}
	
	return $items;    
}