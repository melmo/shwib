<?php

/*
*
* Twitter Cards
*
*/

add_action('wp_head', 'twitter_cards');

function twitter_cards() {
	echo '<meta name="twitter:card" content="summary">';
	echo '<meta name="twitter:title" content="';
		echo wp_get_document_title();
	echo '">';
	echo '<meta name="twitter:description" content="' . esc_attr(shwib_description()) . '">';
	$image = shwib_image('thumbnail');
	$image['url'] = str_replace('logo', 'logo-twitter', $image['url']);
	echo '<meta name="twitter:image" content="' . esc_attr($image['url']) . '">';
}
