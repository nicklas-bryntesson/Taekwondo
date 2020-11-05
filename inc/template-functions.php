<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Taekwondo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tkd_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( is_front_page() || ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	} else {
		$classes[] = 'has-sidebar';
	}

	// Add class telling us if social menu is in use.
	if ( has_nav_menu( 'social' ) ) {
		$classes[] = 'has-social';
	} else {
		$classes[] = 'no-social';
	}

	// Add class for frontpage header image
	if ( is_front_page() && has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	return $classes;
}
add_filter( 'body_class', 'tkd_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tkd_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'tkd_pingback_header' );

/**
 * Remove the page template menu on frontpage.
 */
add_action( 'add_meta_boxes', function( string $post_type, WP_Post $post ) {

    if( $post_type != 'page' )
        return;

    $frontpageID = intval( get_option('page_on_front') );
    $currentID = intval( $post->ID );

    if( $frontpageID === $currentID ) {
        remove_meta_box( 'pageparentdiv', 'page', 'side' );
    }

}, 10, 2 );