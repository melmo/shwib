<?php 

/* 
* App Icons
*/

add_action('wp_head','app_icons');
function app_icons() {
	$return = '<!-- Desktop Browsers -->';
	$return .= '<link rel="shortcut icon" type="image/x-icon" href="' . get_bloginfo('template_url') . '/_/appicons/favicon.ico" />';
	$return .= '<!-- Android: Chrome M39 and up-->';
	$return .= '<link rel="manifest" href="' . get_bloginfo('template_url') . '/_/appicons/manifest.json">';
	$return .= '<!-- Android: Chrome M31 and up, ignored if manifest is present-->';
	$return .= '<meta name="mobile-web-app-capable" content="yes">';
	$return .= '<link rel="icon" sizes="192x192" href="' . get_bloginfo('template_url') . '/_/appicons/icon-192x192.png">';
	$return .= '<!-- iOS -->';
	$return .= '<meta name="apple-mobile-web-app-capable" content="yes">';
	$return .= '<meta name="apple-mobile-web-app-title" content="' . get_bloginfo('name') . '">';
	$return .= '<link rel="apple-touch-icon" sizes="180x180" href="' . get_bloginfo('template_url') . '/_/appicons/apple-touch-icon-180x180-precomposed.png">';
	$return .= '<link href="' . get_bloginfo('template_url') . '/_/appicons/apple-touch-icon-152x152-precomposed.png" sizes="152x152" rel="apple-touch-icon">';
	$return .= '<link href="' . get_bloginfo('template_url') . '/_/appicons/apple-touch-icon-144x144-precomposed.png" sizes="144x144" rel="apple-touch-icon">';
	$return .= '<link href="' . get_bloginfo('template_url') . '/_/appicons/apple-touch-icon-120x120-precomposed.png" sizes="120x120" rel="apple-touch-icon">';
	$return .= '<link href="' . get_bloginfo('template_url') . '/_/appicons/apple-touch-icon-114x114-precomposed.png" sizes="114x114" rel="apple-touch-icon">';
	$return .= '<link href="' . get_bloginfo('template_url') . '/_/appicons/apple-touch-icon-76x76-precomposed.png" sizes="76x76" rel="apple-touch-icon">';
	$return .= '<link href="' . get_bloginfo('template_url') . '/_/appicons/apple-touch-icon-72x72-precomposed.png" sizes="72x72" rel="apple-touch-icon">';
	$return .= '<link href="' . get_bloginfo('template_url') . '/_/appicons/apple-touch-icon-60x60-precomposed.png" sizes="60x60" rel="apple-touch-icon">';
	$return .= '<link href="' . get_bloginfo('template_url') . '/_/appicons/apple-touch-icon-57x57-precomposed.png" sizes="57x57" rel="apple-touch-icon">';
	$return .= '<link href="' . get_bloginfo('template_url') . '/_/appicons/apple-touch-icon-precomposed.png" rel="apple-touch-icon">';
	$return .= '<!-- Windows 8 and IE 11 -->';
	$return .= '<meta name="msapplication-config" content="' . get_bloginfo('template_url') . '/_/appicons/browserconfig.xml" />';
	$return .= '<!-- Windows -->';
	$return .= '<meta name="application-name" content="' . get_bloginfo('name') . '" />';
	$return .= '<meta name="msapplication-tooltip" content="' . get_bloginfo('description') . '" />';
	$return .= '<meta name="msapplication-window" content="width=1024;height=768" />';
	$return .= '<meta name="msapplication-navbutton-color" content="#98d2cf" />';
	$return .= '<meta name="msapplication-starturl" content="./" />';
	echo $return;     
}

