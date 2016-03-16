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
		wp_title(" |");
	echo '">';
	echo '<meta name="twitter:description" content="' . esc_attr(shwib_description()) . '">';
	echo '<meta name="twitter:image" content="' . esc_attr(shwib_image()) . '">';
}
