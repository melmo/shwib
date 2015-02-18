<?php
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


	/* loop description. */
	if ( !empty( $description ) ){
		$description = $attr['before'] . $description . $attr['after'] . "\n";
	}

	return $description;
}
?>