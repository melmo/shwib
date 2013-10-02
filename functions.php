<?php
/* Load the core theme framework. */
require_once( trailingslashit( TEMPLATEPATH ) . '/_/hybrid/hybrid.php' );
$theme = new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'shwib_theme_setup' );

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
	add_theme_support( 'automatic-feed-links' );
	// add_custom_background();

}

add_action( 'wp_footer', 'content_bump' );

function content_bump() {
	if(is_user_logged_in()) echo "<style>.navbar-fixed-top {top: 28px;}</style>";
}

add_action('wp_enqueue_scripts', 'shwib_add_scripts');

function shwib_add_scripts() {

  	wp_enqueue_script('modernizr',
       get_template_directory_uri() . '/_/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js',
       false,
       '2.6.2' );
   	wp_enqueue_script('bootstrap',
       get_template_directory_uri() . '/_/js/vendor/bootstrap.min.js',
       array("jquery"),
       '1.0', true );
   	wp_enqueue_script('underscore',
      false,
       array(),
       '1.0', true );
   	wp_enqueue_script('main',
       get_template_directory_uri() . '/_/js/main.js',
       array("bootstrap"),
       '1.0', true );
}

/**
 * Additional widget classes with number of each widget position and first/last widget class.
 * This is a modified code from Sukelius Magazine Theme.
 *
 * @link http://themehybrid.com/themes/sukelius-magazine
 * @since 0.1.0
 */

add_filter( 'dynamic_sidebar_params', 'shwib_widget_classes' );

function shwib_widget_classes( $params ) {

	/* Global a counter array */
	global $shwib_widget_num;

	/* Get the id for the current sidebar we're processing */
	$this_id = $params[0]['id'];

	/* Get registered widgets */
	$arr_registered_widgets = wp_get_sidebars_widgets();

	/* If the counter array doesn't exist, create it */
	if ( !$shwib_widget_num ) {
		$shwib_widget_num = array();
	}

	/* if current sidebar has no widget, return. */
	if ( !isset( $arr_registered_widgets[$this_id] ) || !is_array( $arr_registered_widgets[$this_id] ) ) {
		return $params;
	}

	/* See if the counter array has an entry for this sidebar */
	if ( isset( $shwib_widget_num[$this_id] ) ) {
		$shwib_widget_num[$this_id] ++;
	}
	/* If not, create it starting with 1 */
	else {
		$shwib_widget_num[$this_id] = 1;
	}

	/* Add a widget number class for additional styling options */
	$class = 'class="widget widget-' . $shwib_widget_num[$this_id] . ' '; 

	/* in first widget, add 'widget-first' class */
	if ( $shwib_widget_num[$this_id] == 1 ) {
		$class .= 'widget-first ';
	}
	/* in last widget, add 'widget-last' class */
	elseif( $shwib_widget_num[$this_id] == count( $arr_registered_widgets[$this_id] ) ) { 
		$class .= 'widget-last ';
	}

	/* str replace before_widget param with new class */
	$params[0]['before_widget'] = str_replace( 'class="widget ', $class, $params[0]['before_widget'] );

	return $params;
}

/**
 * Loop Meta Title.
 * 
 * @since 0.1.0
 */
function shwib_loop_meta_title(){

	global $wp_query;

	/* attr */
	$attr = array(
		'before' => '<h1 class="loop-title">',
		'after' => '</h1>' );

	/* default var */
	$current = '';

	if ( is_home() || is_singular() ) {
		$current = get_post_field( 'post_title', get_queried_object_id() );
	}

	/* If viewing any type of archive page. */
	elseif ( is_archive() ) {

		/* If viewing a taxonomy term archive. */
		if ( is_category() || is_tag() || is_tax() ) {
			if ( is_search() )
				$current = esc_attr( get_search_query() ).' &ndash; '.single_term_title( '', false );
			else
				$current = single_term_title( '', false );
		}

		/* If viewing a post type archive. */
		elseif ( is_post_type_archive() ) {
			$current = post_type_archive_title( false );
		}

		/* If viewing a date-/time-based archive. */
		elseif ( is_date () ) {
			if ( get_query_var( 'minute' ) && get_query_var( 'hour' ) )
				$current = sprintf( __( '%1$s', 'shwib' ), get_the_time( __( 'g:i a', 'shwib' ) ) );

			elseif ( get_query_var( 'minute' ) )
				$current = sprintf( __( 'minute %1$s', 'shwib' ), get_the_time( __( 'i', 'shwib' ) ) );

			elseif ( get_query_var( 'hour' ) )
				$current = sprintf( __( '%1$s', 'shwib' ), get_the_time( __( 'g a', 'shwib' ) ) );

			elseif ( is_day() )
				$current = sprintf( __( '%1$s', 'shwib' ), get_the_time( __( 'F jS, Y', 'shwib' ) ) );

			elseif ( get_query_var( 'w' ) )
				$current = sprintf( __( 'week %1$s of %2$s', 'shwib' ), get_the_time( __( 'W', 'shwib' ) ), get_the_time( __( 'Y', 'shwib' ) ) );

			elseif ( is_month() )
				$current = sprintf( __( '%1$s', 'shwib' ), single_month_title( ' ', false) );

			elseif ( is_year() )
				$current = sprintf( __( '%1$s', 'shwib' ), get_the_time( __( 'Y', 'shwib' ) ) );
		}

		/* For any other archives. */
		else {
			$current = __( 'Archives', 'shwib' );
		}
	}

	/* If viewing a search results page. */
	elseif ( is_search() )
		$current = esc_attr( get_search_query() );

	/* Filter it */
	$current = apply_atomic( 'loop_meta_title', $current );

	/* Format title */
	if ( !empty( $current ) ){
		$current = $attr['before'] . $current . $attr['after'] . "\n";
	}

	/* Print the title to the screen. */
	return $current;
}


/**
 * Loop Meta Description.
 * 
 * @since 0.1.0
 */
function shwib_loop_meta_description(){

	global $wp_query;

	/* attr */
	$attr = array(
		'before' => '<div class="loop-description">',
		'after' => '</div>' );

	/* Set an empty $description variable. */
	$description = '';

	/* If viewing the posts page or a singular post. */
	if ( is_home() && !is_front_page()  ) {

		$description = get_post_field( 'post_excerpt', get_queried_object_id() );

		if ( !empty( $description ) )
			$description = '<p>' . $description . '</p>';
	}

	/* If viewing an archive page. */
	elseif ( is_archive() ) {

		/* If viewing a taxonomy term archive, get the term's description. */
		if ( is_category() || is_tag() || is_tax() )
			$description = term_description( '', get_query_var( 'taxonomy' ) );

		/* If viewing a custom post type archive. */
		elseif ( is_post_type_archive() ) {

			/* Get the post type object. */
			$post_type = get_post_type_object( get_query_var( 'post_type' ) );

			/* If a description was set for the post type, use it. */
			if ( isset( $post_type->description ) )
				$description = '<p>' . $post_type->description . '</p>';
		}
	}

	/* Filter it */
	$description = apply_atomic( 'loop_meta_description', $description );

	/* loop description. */
	if ( !empty( $description ) ){
		$description = $attr['before'] . $description . $attr['after'] . "\n";
	}

	return $description;
}

/* 
* Apple Touch Icons
*/

add_action('wp_head','apple_touch_icon');
function apple_touch_icon() {
	$appletouch =  '<link rel="apple-touch-icon" href="' . get_bloginfo('template_url') . '/_/images/apple-touch-icon.png">';
	$appletouch .='<link rel="apple-touch-icon-precomposed" href="'. get_bloginfo('template_url') . '/_/images/apple-touch-icon-precomposed.png">';
	$appletouch .= '<link rel="apple-touch-icon-72x72-precomposed" href="' . get_bloginfo('template_url') . '/_/images/apple-touch-icon-72x72-precomposed.png">';
	$appletouch .= '<link rel="apple-touch-icon-57x57-precomposed" href="' . get_bloginfo('template_url') . '/_/images/apple-touch-icon-57x57-precomposed.png">';
	$appletouch .= '<link rel="apple-touch-icon-114x114-precomposed" href="' . get_bloginfo('template_url') . '/_/images/apple-touch-icon-114x114-precomposed.png">';
	$appletouch .= '<link rel="apple-touch-icon-144x144-precomposed" href="' . get_bloginfo('template_url') . '/_/images/apple-touch-icon-144x144-precomposed.png">';
	echo $appletouch;     
}


/**
* Facebook Open Graph Tags
 *
 */

 
 define('OPENGRAPH_NS_URI', 'http://opengraphprotocol.org/schema/');
$opengraph_ns_set = false;


/**
 * Add Open Graph XML namespace to <html> element.
 */
function opengraph_add_namespace( $output ) {
	global $opengraph_ns_set;
	$opengraph_ns_set = true;

	$output .= ' xmlns:og="' . esc_attr(OPENGRAPH_NS_URI) . '"';
	return $output;
}
add_filter('language_attributes', 'opengraph_add_namespace');


/**
 * Get the Open Graph metadata for the current page.
 *
 * @uses apply_filters() Calls 'opengraph_{$name}' for each property name
 * @uses apply_filters() Calls 'opengraph_metadata' before returning metadata array
 */
function opengraph_metadata() {
	$metadata = array();

 	// defualt properties defined at http://opengraphprotocol.org/
	$properties = array(
		// required
		'title', 'type', 'image', 'url', 

		// optional
		'site_name', 'description', 

		// location
		'longitude', 'latitude', 'street-address', 'locality', 'region', 
		'postal-code', 'country-name',

		// contact
		'email', 'phone_number', 'fax_number',
	);

	foreach ($properties as $property) {
		$filter = 'opengraph_' . $property;
		$metadata["og:$property"] = apply_filters($filter, '');
	}

	return apply_filters('opengraph_metadata', $metadata);
}


/**
 * Register filters for default Open Graph metadata.
 */
function opengraph_default_metadata() {
	add_filter('opengraph_title', 'opengraph_default_title', 5);
	add_filter('opengraph_type', 'opengraph_default_type', 5);
	add_filter('opengraph_image', 'opengraph_default_image', 5);
	add_filter('opengraph_url', 'opengraph_default_url', 5);

	add_filter('opengraph_site_name', 'opengraph_default_sitename', 5);
	add_filter('opengraph_description', 'opengraph_default_description', 5);
}
add_filter('wp', 'opengraph_default_metadata');


/**
 * Default title property, using the page title.
 */
function opengraph_default_title( $title ) {
	if ( is_singular() && empty($title) ) {
		global $post;
		$title = $post->post_title;
	}

	return $title;
}


/**
 * Default type property.
 */
function opengraph_default_type( $type ) {
	if ( empty($type) ) {	
	$type = ( (is_singular() )?'article': 'website' );	
	return $type;
}

}
/**
 * Default image property, using the post-thumbnail.
 */
function opengraph_default_image( $image ) {
	global $post;
	if ( is_singular() && empty($image) && has_post_thumbnail($post->ID) ) {
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail');
		if ($thumbnail) {
			$image = $thumbnail[0];
		}
	}
	if ( is_singular() && empty($image) && has_post_thumbnail($post->ID)  ) {
        $thumbnailID = get_post_thumbnail_id( $post->ID );
        // If the post thumbnail id has the form ngg- then it is a NextGEN image.
        if ( is_string($thumbnailID) && substr($thumbnailID, 0, 4) == 'ngg-') {
            $thumbnailID = substr($thumbnailID, 4);
            $image = nggdb::find_image($thumbnailID);
            if ($image) { // Safety check for null pointer.
                $image = $image->thumbURL;
				 $image = str_replace("thumbs/thumbs_","",$image);
            }
		
        }
    }
	if ($image == '') {$image = get_bloginfo('template_url').'/_/img/logo.png';}
    return $image;

}


/**
 * Default url property, using the permalink for the page.
 */
function opengraph_default_url( $url ) {
$Path=$_SERVER['REQUEST_URI'];
$URI=get_bloginfo('url').$Path;

return $URI;
}


/**
 * Default site_name property, using the bloginfo name.
 */
function opengraph_default_sitename( $name ) {
	if ( empty($name) ) $name = get_bloginfo('name');
	return $name;
}


/**
 * Default description property, using the bloginfo description.
 */
function opengraph_default_description( $description ) {
    if ( !empty($description) ) {
        return $description;
    }
    	$description = shwib_description();
 return $description;
}


/**
 * Output Open Graph <meta> tags in the page header.
 */
function opengraph_meta_tags() {
	global $opengraph_ns_set;

	$xml_ns = '';
	if ( !$opengraph_ns_set ) {
		$xml_ns = 'xmlns:og="' . esc_attr(OPENGRAPH_NS_URI) . '" ';
	}

	$metadata = opengraph_metadata();
	foreach ( $metadata as $key => $value ) {
		if ( empty($key) || empty($value) ) continue;
		echo '<meta ' . $xml_ns . 'property="' . esc_attr($key) . '" content="' . esc_attr($value) . '" />' . "\n";
		
	}
	

}
add_action('wp_head', 'opengraph_meta_tags');

/**
     * Generates an excerpt from the content, if needed. (outside the loop)
     *
     * @param int|object $post_or_id can be the post ID, or the actual $post object itself
     * @param string $excerpt_more the text that is applied to the end of the excerpt if we algorithically snip it
     * @return string the snipped excerpt or the manual excerpt if it exists         
     */
    function shwib_excerpt($post_or_id, $excerpt_more = ' [...]') {
        if ( is_object( $post_or_id ) ) $postObj = $post_or_id;
        else $postObj = get_post($post_or_id);

        $raw_excerpt = $text = $postObj->post_excerpt;
        if ( '' == $text ) {
            $text = $postObj->post_content;
$text = __($text);
            $text = strip_shortcodes( $text );
			
            $text = apply_filters('the_content', $text);
        //   $text = str_replace(']]>', ']]&gt;', $text);
            $text = strip_tags($text);
            $excerpt_length = apply_filters('excerpt_length', 55);

            // don't automatically assume we will be using the global "read more" link provided by the theme
            // $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
            $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
            if ( count($words) > $excerpt_length ) {
                array_pop($words);
                $text = implode(' ', $words);
                $text = $text . $excerpt_more;
            } else {
                $text = implode(' ', $words);
            }
        }
        return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
    }

/**
     * Generates a description of the current page.
     *
*/	 
	
function shwib_description() {
	global $wp_query;

	$description = '';

	if ( is_home() ) {
		$description = get_bloginfo( 'description' );
	}

	elseif ( is_singular() ) {
		$description = get_metadata( 'post', $wp_query->post->ID, 'Description', true );

		if ( empty( $description ) && is_front_page() )
			$description = get_bloginfo( 'description' );

		elseif ( empty( $description ) )
			$description = shwib_excerpt($wp_query->post->ID,'');
	}

	elseif ( is_archive() ) {

		if ( is_author() )
			$description = get_the_author_meta( 'description', get_query_var( 'author' ) );

		elseif ( is_category() || is_tag() || is_tax() )
			$description = term_description( '', get_query_var( 'taxonomy' ) );

		elseif ( function_exists( 'is_post_type_archive' ) && is_post_type_archive() ) {
			$post_type = get_post_type_object( get_query_var( 'post_type' ) );
			$description = $post_type->description;
		}
	}
return __($description);
}

function shwib_the_excerpt_max_charlength($charlength) {
   $excerpt = get_the_excerpt();
   $charlength++;
   if(strlen($excerpt)>$charlength) {
	   $subex = substr($excerpt,0,$charlength-5);
	   $exwords = explode(" ",$subex);
	   $excut = -(strlen($exwords[count($exwords)-1]));
	   if($excut<0) {
			echo substr($subex,0,$excut);
	   } else {
			echo $subex;
	   }?>
	   <a style="text-decoration:none;" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">...</a><?php
   } else {
	   echo $excerpt;
   }
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
			$item->classes[] = 'menu-parent-item'; 
		}
	}
	
	return $items;    
}