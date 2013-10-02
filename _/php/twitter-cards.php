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
		hybrid_document_title();
	echo '">';
	echo '<meta name="twitter:description" content="' . shwib_description() . '">';
	echo '<meta name="twitter:image" content="' . shwib_image() . '">';
}
