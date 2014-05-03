<!doctype html>
<!--[if IE 7 ]>		 <html class="no-js ie ie7 lte7 lte8 lte9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>		 <html class="no-js ie ie8 lte8 lte9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>		 <html class="no-js ie ie9 lte9>" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head data-live-domain="<?php echo JQUERY_LIVE_DOMAIN; ?>">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php
		global $page, $paged;
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	?></title>

	<meta name="author" content="Alexander Schmitz">
	<meta name="description" content="Uglymongrel.com ramplings of a front javascript junky and plugins and stuff">

	<meta name="viewport" content="width=device-width">

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/i/favicon.ico">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/base.css?v=1">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lego.css?v=1">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/icons.css?v=1">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  	<link rel="stylesheet"  href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.css">
	<!--[if lt IE 7]><link rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->

	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.2.6.2.min.js"></script>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	<script src="http://code.jquery.com/mobile/git/jquery.mobile-git.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>

</head>
<body <?php body_class(); ?>>

<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<brick data-role="page" class="grey">
	<brick data-role="header" class="dark height-1" style="margin-bottom:32px;">
			<brick1 class="height-1 width-10 dark">UGLYMONGREL.COM</brick1>
			<a href="#nav" class="brick ui-btn ui-btn-right red height-1 width-1 ui-nodisc-icon ui-btn-icon-notext ui-icon-bars">menu</a>
	</brick>
	<brick data-role="panel" id="nav" class="blue">
		<ul data-role="listview">
			<li><a class="brick height-2 red" href="/downloads/">Downloads</a></li>
			<li><a class="brick height-2 red" href="/downloads/">Api Docs</a></li>
			<li><a class="brick height-2 red" href="/downloads/">Blog</a></li>
			<li><a class="brick height-2 red" href="/downloads/">Demos</a></li>
			<li><a class="brick height-2 red" href="/downloads/">Plugins</a></li>
		</ul>
	</brick>
	<brick data-role="content">
		<brick id="main" class="main-plate plate clearfix ui-content">
			<?php get_template_part('menu', 'header'); ?>

			<?php get_search_form(); ?>
		</brick>

		<brick id="content-wrapper" class="clearfix plate row main-plate blue" style="padding-bottom:64px; padding:32px; margin-bottom:64px;">
