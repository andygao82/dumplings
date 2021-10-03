<?php
/**
 * Sidebars configuration.
 *
 * @package Confucius
 */

add_action( 'after_setup_theme', 'confucius_register_sidebars', 5 );
/**
 * Register sidebars
 */
function confucius_register_sidebars() {

	confucius_widget_area()->widgets_settings = apply_filters( 'tm_widget_area_default_settings', array(
		'sidebar-primary' => array(
			'name'           => esc_html__( 'Sidebar Primary', 'confucius' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h5 class="widget-title">',
			'after_title'    => '</h5>',
			'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
			'after_wrapper'  => '</div>',
			'is_global'      => true,
		),
		'full-width-header-area' => array(
			'name'           => esc_html__( 'Header Fullwidth Area', 'confucius' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h4 class="widget-title">',
			'after_title'    => '</h4>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => false,
			'conditional'    => array( 'is_front_page' ),
		),
		'after-content-full-width-area' => array(
			'name'           => esc_html__( 'After Content Fullwidth Area', 'confucius' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h4 class="widget-title">',
			'after_title'    => '</h4>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => false,
			'conditional'    => array( 'is_front_page' ),
		),
		'footer-area' => array(
			'name'           => esc_html__( 'Footer Area', 'confucius' ),
			'description'    => '',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h4 class="widget-title">',
			'after_title'    => '</h4>',
			'before_wrapper' => '<section id="%1$s" %2$s>',
			'after_wrapper'  => '</section>',
			'is_global'      => true,
		),
	) );
}
