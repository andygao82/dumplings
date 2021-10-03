<?php
/**
 * Menus configuration.
 *
 * @package Confucius
 */

add_action( 'after_setup_theme', 'confucius_register_menus', 5 );
/**
 * Register menus
 */
function confucius_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'main'   => esc_html__( 'Main', 'confucius' ),
		'footer' => esc_html__( 'Footer', 'confucius' ),
		'social' => esc_html__( 'Social', 'confucius' ),
	) );
}
