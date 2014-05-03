<?php
/* Plugin Name: uglymongrel Static Index
 * Description: Activate this plugin if the page 'index' is to be the static front page for a site.
 * Author: Andrew Nacin
 * Author URI: http://nacin.com/
 * Version: 0.1
 */

add_filter( 'pre_option_show_on_front', 'uglymongrel_filter_show_on_front' );
add_filter( 'pre_option_page_on_front', 'uglymongrel_filter_page_on_front' );
add_action( 'posts_request',            'uglymongrel_on_posts_request', 10, 2 );

function uglymongrel_filter_show_on_front( $value ) {
	return 'page';
}

function uglymongrel_filter_page_on_front( $value ) {
	static $page_on_front;
	if ( isset( $page_on_front ) )
		return $page_on_front;

	if ( $page = get_page_by_path( 'index' ) )
		return $page_on_front = $page->ID;
	return $page_on_front = 0;
}

// Nuke the main query, we don't need it.
function uglymongrel_on_posts_request( $request, $query ) {
	if ( $query->is_page && $query->get('p') && $query->get('p') == get_option( 'page_on_front' ) && $query->is_main_query() ) {
		add_filter( 'posts_results', 'uglymongrel_on_posts_results', 10, 2 );
		return false;
	}
	return $request;
}

// Set up $wp_query->posts.
function uglymongrel_on_posts_results( $posts, $query ) {
	remove_filter( 'posts_results', 'uglymongrel_on_posts_results', 10, 2 );
	return array( get_page( get_option( 'page_on_front' ) ) );
}