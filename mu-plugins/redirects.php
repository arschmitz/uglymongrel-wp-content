<?php

$uglymongrel_redirects = array(
	'qunitjs.com' => array(
		'/addons/' => '/plugins/'
	)
);

add_filter( 'template_redirect', function() {
	global $uglymongrel_redirects;

	// Only handle 404 Not Found
	if ( !is_404() ) {
		return;
	}

	// Check if this site has any redirects
	if ( empty( $uglymongrel_redirects[ UGLYMONGREL_LIVE_SITE ] ) ) {
		return;
	}

	// See if any redirects match the current URL
	$url = trailingslashit( $_SERVER[ 'REQUEST_URI' ] );
	if ( !empty( $uglymongrel_redirects[ UGLYMONGREL_LIVE_SITE ][ $url ] ) ) {
		wp_redirect( $uglymongrel_redirects[ UGLYMONGREL_LIVE_SITE ][ $url ], 301 );
	}
});
