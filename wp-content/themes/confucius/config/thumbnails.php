<?php
/**
 * Thumbnails configuration.
 *
 * @package Confucius
 */

add_action( 'after_setup_theme', 'confucius_register_image_sizes', 5 );
/**
 * Register image sizes
 */
function confucius_register_image_sizes() {
	set_post_thumbnail_size( 350, 348, true );

	// Registers a new image sizes.
	add_image_size( 'confucius-thumb-s', 150, 150, true );
	add_image_size( 'confucius-thumb-m', 400, 400, true );
	add_image_size( 'confucius-thumb-l', 1170, 520, true );
	add_image_size( 'confucius-thumb-xl', 1920, 1080, true );

	add_image_size( 'confucius-thumb-180-120', 180, 120, true );   // mp-rm list item
	add_image_size( 'confucius-thumb-320-252', 320, 252, true );   // mp-rm related item
	add_image_size( 'confucius-thumb-370-250', 370, 250, true );   // mp-rm grid item
	add_image_size( 'confucius-thumb-370-385', 370, 385, true );   // banner
	add_image_size( 'confucius-thumb-390-311', 390, 311, true );   // page typography
	add_image_size( 'confucius-thumb-682-351', 682, 351, true );   // page typography
	add_image_size( 'confucius-thumb-1170-679', 1170, 679, true ); // single menu-item
	add_image_size( 'confucius-thumb-1170-781', 1170, 781, true ); // single post
}
