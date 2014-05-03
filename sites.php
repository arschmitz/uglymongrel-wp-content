<?php

function uglymongrel_sites() {
	static $sites;
	if ( isset( $sites ) )
		return $sites;

	$sites = array( /* blog_id, cookie domain */
		'blog.uglymongrel.com' => array(
			'blog_id' => 2,
			'cookie_domain' => '.uglymongrel.com',
			'body_class' => 'uglymongrel',
			'options' => array(
				'blogname' => 'Uglymongrel Blog',
				'stylesheet' => 'blog-uglymongrel-com',
			//	'permalink_structure' => '/%category%/%postname%/',
			),
		),
		'api.uglymongrel.com' => array(
			'blog_id' => 3,
			'cookie_domain' => '.uglymongrel.com',
			'body_class' => 'uglymongrel',
			'logo_link' => 'http://uglymongrel.com/',
			'options' => array(
				'blogname' => 'Uglymongrel API Documentation',
				'stylesheet' => 'api.uglymongrel.com',
				'active_plugins' => array(),
			),
		),
		'uglymongrel.com' => array(
			'blog_id' => 1,
			'cookie_domain' => '.uglymongrel.com',
			'body_class' => 'uglymongrel',
			'options' => array(
				'blogname' => 'Uglymongrel',
				'stylesheet' => 'uglymongrel.com',
				'active_plugins' => array(
					'uglymongrel-static-index.php',
					'vaultpress/vaultpress.php',
				),
			),
		),
	);

	uasort( $sites, function( $a, $b ) {
		if ( $a['blog_id'] == $b['blog_id'] )
			die( 'Two sites have the same blog_id.' );
		if ( $a['blog_id'] > $b['blog_id'] )
			return 1;
		return -1;
	} );
	return $sites;
}

function uglymongrel_default_site_options() {
	return array(
		'enable_xmlrpc' => 1,
		'template' => 'uglymongrel',
		'blogdescription' => '',
		'permalink_structure' => '/%postname%/',
		'use_smilies' => 0,
	);

}
