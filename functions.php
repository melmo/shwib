<?php
/* Sets the path to the core framework directory. */
if ( !defined( 'HYBRID_DIR' ) )
	define( 'HYBRID_DIR', trailingslashit( TEMPLATEPATH ) . '/_/hybrid/' );

/* Sets the path to the core framework directory URI. */
if ( !defined( 'HYBRID_URI' ) )
	define( 'HYBRID_URI', trailingslashit( TEMPLATEPATH ) . '/_/hybrid/hybrid.php' );
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

	/* Add theme support for core framework features. */
	add_theme_support( 'hybrid-core-widgets' );
	add_theme_support( 'hybrid-core-template-hierarchy' );
	add_theme_support( 'loop-pagination' );
	add_theme_support( 'get-the-image' );	
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'cleaner-caption' );
	add_theme_support( 'cleaner-gallery' );

	// add_custom_background();
	// add_theme_support( 'breadcrumb-trail' );
	// add_theme_support( 'hybrid-core-post-meta-box' );
	// add_theme_support( 'hybrid-core-theme-settings' );
	// add_theme_support( 'hybrid-core-seo' );

}

function shwib_additional_setup() {
	// Additional widget classes with number of each widget position and first/last widget class.
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/widget-classes.php' );
	// Favicon and App Icons
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/app-icons.php' );
	// Better excerpt handling - required for Facebook open graph tags
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/excerpts.php' );
	// Loop Meta
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/loop-meta.php' );
	// Facebook Open Graph tags
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/facebook-open-graph.php' );
	// Twitter Cards
	require_once( trailingslashit( TEMPLATEPATH ) . '/_/php/twitter-cards.php' );
}

/* Register custom menus. */
add_action( 'init', 'shwib_register_menus', 5 );


function shwib_register_menus() {
	register_nav_menu( 'primary',    _x( 'Primary',    'nav menu location', 'hybrid-base' ) );
	register_nav_menu( 'secondary',  _x( 'Secondary',  'nav menu location', 'hybrid-base' ) );
	register_nav_menu( 'subsidiary', _x( 'Subsidiary', 'nav menu location', 'hybrid-base' ) );
}



/* Register sidebars. */
add_action( 'widgets_init', 'shwib_register_sidebars', 5 );

function shwib_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          => 'posts',
			'name'        => _x( 'Posts', 'sidebar', 'shwib' ),
			'description' => __( 'Shown on posts and blog index.', 'shwib' )
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'pages',
			'name'        => _x( 'Pages', 'sidebar', 'shwib' ),
			'description' => __( 'Shown on pages.', 'shwib' )
		)
	);
}


/**
 * Enqueue additional scripts here.
 *
 *
 */

add_action('wp_enqueue_scripts', 'shwib_add_scripts');

function shwib_add_scripts() {

   	wp_enqueue_script('main',
       get_template_directory_uri() . '/_/js/main.min.js',
       array( "jquery"),
       '1.0', true );
}

/**
 * Makes CSS behave when user is logged in and admin bar is visible
 *
 *
 */

add_action( 'wp_footer', 'content_bump' );

function content_bump() {
	if(is_user_logged_in()) echo "<style>.navbar-fixed-top {top: 32px;}@media screen and (max-width: 782px){.navbar-fixed-top {top: 46px;}}</style>";
}


// Add menu-parent-item class to tops li of submenu
add_filter( 'wp_nav_menu_objects', 'shwib_add_menu_parent_class' );
function shwib_add_menu_parent_class( $items ) {
	
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

add_filter('nav_menu_css_class', 'shwib_add_dropdown_menu_class', 10, 4);

function shwib_add_dropdown_menu_class( $classes , $item, $args, $depth ) {
	if ($depth == 1)
		$classes[] = "dropdown-item";
	return $classes;
}


add_filter('nav_menu_link_attributes', 'shwib_add_nav_link_atts', 10, 4);

function shwib_add_nav_link_atts( $atts , $item, $args, $depth ) {
	if (in_array('menu-item-has-children', $item->classes)) {
		$atts['class'] = 'dropdown-toggle';
		$atts['data-toggle'] = 'dropdown';
	}
	
	return $atts;
}



class Dropdown_Nav_Walker extends Walker_Nav_Menu {
 
    // start the top level
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
 
    // end the top level
    function end_lvl(&$output, $depth=0, $args=array()) {

        parent::end_lvl($output, $depth,$args);
    }
 
    // print top-level elements
    function start_el(&$output, $item, $depth=0, $args=array()) {

        parent::start_el($output, $item, $depth, $args);
    }
 
    function end_el(&$output, $item, $depth=0, $args=array()) {

    	

        parent::end_el($output, $item, $depth, $args);
    }
 
    // follow down  branch
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
 
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}