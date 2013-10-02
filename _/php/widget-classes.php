<?php 

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