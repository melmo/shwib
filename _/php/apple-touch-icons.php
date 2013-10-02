<?php 

/* 
* Apple Touch Icons
*/

add_action('wp_head','apple_touch_icon');
function apple_touch_icon() {
	$appletouch =  '<link rel="apple-touch-icon" href="' . get_bloginfo('template_url') . '/_/img/apple-touch-icon.png">';
	$appletouch .='<link rel="apple-touch-icon-precomposed" href="'. get_bloginfo('template_url') . '/_/img/apple-touch-icon-precomposed.png">';
	$appletouch .= '<link rel="apple-touch-icon-72x72-precomposed" href="' . get_bloginfo('template_url') . '/_/img/apple-touch-icon-72x72-precomposed.png">';
	$appletouch .= '<link rel="apple-touch-icon-57x57-precomposed" href="' . get_bloginfo('template_url') . '/_/img/apple-touch-icon-57x57-precomposed.png">';
	$appletouch .= '<link rel="apple-touch-icon-114x114-precomposed" href="' . get_bloginfo('template_url') . '/_/img/apple-touch-icon-114x114-precomposed.png">';
	$appletouch .= '<link rel="apple-touch-icon-144x144-precomposed" href="' . get_bloginfo('template_url') . '/_/img/apple-touch-icon-144x144-precomposed.png">';
	echo $appletouch;     
}