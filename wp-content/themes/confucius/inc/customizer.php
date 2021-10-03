<?php
/**
 * Theme Customizer.
 *
 * @package Confucius
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function confucius_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'confucius_get_customizer_options' , array(
		'prefix'     => 'confucius',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Indentity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'confucius' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => false,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'   => esc_html__( 'Show ToTop button', 'confucius' ),
				'section' => 'title_tagline',
				'priority' => 61,
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'confucius' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'general_settings' => array(
				'title'       => esc_html__( 'General Site settings', 'confucius' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'       => esc_html__( 'Logo &amp; Favicon', 'confucius' ),
				'priority'    => 25,
				'panel'       => 'general_settings',
				'type'        => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'confucius' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'confucius' ),
					'text'  => esc_html__( 'Text', 'confucius' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'confucius' ),
				'description'     => esc_html__( 'Upload logo image', 'confucius' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'confucius_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'confucius' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'confucius' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'confucius_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'confucius' ),
				'section'         => 'logo_favicon',
				'default'         => 'Kaushan Script, handwriting',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'confucius_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'confucius' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => confucius_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'confucius_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'confucius' ),
				'section'         => 'logo_favicon',
				'default'         => '400',
				'field'           => 'select',
				'choices'         => confucius_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'confucius_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'confucius' ),
				'section'         => 'logo_favicon',
				'default'         => '39',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'confucius_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'confucius' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => confucius_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'confucius_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'confucius' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'confucius' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'confucius' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'confucius' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'confucius' ),
				'section' => 'breadcrumbs',
				'default' => 'minified',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'confucius' ),
					'minified' => esc_html__( 'Minified', 'confucius' ),
				),
				'type'    => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'confucius' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'confucius' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'confucius' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'confucius' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'confucius' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'confucius' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header type', 'confucius' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'confucius' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'confucius' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content type', 'confucius' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'confucius' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'confucius' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer type', 'confucius' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'confucius' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'confucius' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'confucius' ),
				'section'     => 'page_layout',
				'default'     => 1200,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'confucius' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'confucius' ),
				'description' => esc_html__( 'Configure Color Scheme', 'confucius' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'confucius' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#a55340',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#15191c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#F5F2DF',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#69564b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#d54d35',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#15191c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#69564b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#69564b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#a55340',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#69564b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#69564b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'confucius' ),
				'section' => 'regular_scheme',
				'default' => '#69564b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'confucius' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#555555',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#d54d35',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'confucius' ),
				'section' => 'invert_scheme',
				'default' => '#fff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'confucius' ),
				'description' => esc_html__( 'Configure typography settings', 'confucius' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'confucius' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'body_typography',
				'default' => 'Open Sans, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'body_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'body_typography',
				'default'     => '15',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'body_typography',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'body_typography',
				'default'     => '-0.3',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'confucius' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => confucius_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'confucius' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'h1_typography',
				'default' => 'Delius, handwriting',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'h1_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'h1_typography',
				'default'     => '60',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'h1_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'confucius' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => confucius_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'confucius' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'h2_typography',
				'default' => 'Delius, handwriting',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'h2_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'h2_typography',
				'default'     => '55',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'h2_typography',
				'default'     => '1.12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'confucius' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => confucius_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'confucius' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'h3_typography',
				'default' => 'Kaushan Script, handwriting',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'h3_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'h3_typography',
				'default'     => '42',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'h3_typography',
				'default'     => '1.15',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'confucius' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => confucius_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'confucius' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'h4_typography',
				'default' => 'Delius, handwriting',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'h4_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'h4_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'h4_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'confucius' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => confucius_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'confucius' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'h5_typography',
				'default' => 'Delius, handwriting',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'h5_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'h5_typography',
				'default'     => '22',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'h5_typography',
				'default'     => '1.3',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'confucius' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => confucius_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'confucius' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'h6_typography',
				'default' => 'Open Sans, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'h6_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'h6_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'h6_typography',
				'default'     => '1.3',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'h6_typography',
				'default'     => '-0.4',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'confucius' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => confucius_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Header showcase title` section */
			'showcase_title_typography' => array(
				'title'       => esc_html__( 'Header showcase title', 'confucius' ),
				'priority'    => 40,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'showcase_title_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'showcase_title_typography',
				'default' => 'Kaushan Script, handwriting',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'showcase_title_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'showcase_title_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'showcase_title_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'showcase_title_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'showcase_title_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'showcase_title_typography',
				'default'     => '42',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'showcase_title_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'showcase_title_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'showcase_title_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'showcase_title_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'showcase_title_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'showcase_title_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),

			'showcase_title_text_transform' => array(
				'title'   => esc_html__( 'Text transform', 'confucius' ),
				'section' => 'showcase_title_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => confucius_get_text_transform(),
				'type'    => 'control',
			),

			/** `Header showcase subtitle` section */
			'showcase_subtitle_typography' => array(
				'title'       => esc_html__( 'Header showcase subtitle', 'confucius' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'showcase_subtitle_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'showcase_subtitle_typography',
				'default' => 'Delius, handwriting',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'showcase_subtitle_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'showcase_subtitle_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'showcase_subtitle_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'showcase_subtitle_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'showcase_subtitle_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'showcase_subtitle_typography',
				'default'     => '77',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'showcase_subtitle_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'showcase_subtitle_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'showcase_subtitle_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'showcase_subtitle_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'showcase_subtitle_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'showcase_subtitle_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),

			'showcase_subtitle_text_transform' => array(
				'title'   => esc_html__( 'Text transform', 'confucius' ),
				'section' => 'showcase_subtitle_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => confucius_get_text_transform(),
				'type'    => 'control',
			),

			/** `Navigation` section */
			'navigation_typography' => array(
				'title'       => esc_html__( 'Navigation', 'confucius' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'navigation_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'navigation_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'navigation_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'navigation_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'navigation_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'navigation_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'navigation_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'navigation_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'navigation_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'navigation_typography',
				'default'     => '1.6',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'navigation_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'navigation_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'navigation_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'navigation_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'       => esc_html__( 'Breadcrumbs', 'confucius' ),
				'priority'    => 55,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'breadcrumbs_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '13',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),

			/** `Pagination` section */
			'pagination_typography' => array(
				'title'       => esc_html__( 'Pagination', 'confucius' ),
				'priority'    => 60,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'pagination_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'confucius' ),
				'section' => 'pagination_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'pagination_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'confucius' ),
				'section' => 'pagination_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => confucius_get_font_styles(),
				'type'    => 'control',
			),
			'pagination_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'confucius' ),
				'section' => 'pagination_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => confucius_get_font_weight(),
				'type'    => 'control',
			),
			'pagination_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'confucius' ),
				'section'     => 'pagination_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'pagination_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'confucius' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'confucius' ),
				'section'     => 'pagination_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'pagination_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'confucius' ),
				'section'     => 'pagination_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'pagination_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'confucius' ),
				'section' => 'pagination_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => confucius_get_character_sets(),
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'       => esc_html__( 'Header', 'confucius' ),
				'priority'    => 60,
				'type'        => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'       => esc_html__( 'Styles', 'confucius' ),
				'priority'    => 5,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'confucius' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#000000',
				'type'    => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'confucius' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'default' => '%s/assets/images/header_bg.jpg',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'confucius' ),
				'section' => 'header_styles',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'confucius' ),
					'repeat'     => esc_html__( 'Tile', 'confucius' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'confucius' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'confucius' ),
				),
				'type' => 'control',
			),
			'header_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'confucius' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'confucius' ),
					'center' => esc_html__( 'Center', 'confucius' ),
					'right'  => esc_html__( 'Right', 'confucius' ),
				),
				'type' => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'confucius' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'confucius' ),
					'fixed'  => esc_html__( 'Fixed', 'confucius' ),
				),
				'type' => 'control',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'confucius' ),
				'section' => 'header_styles',
				'default' => 'minimal',
				'field'   => 'select',
				'choices' => array(
					'minimal'  => esc_html__( 'Style 1', 'confucius' ),
					'centered' => esc_html__( 'Style 2', 'confucius' ),
					'default'  => esc_html__( 'Style 3', 'confucius' ),
				),
				'type' => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'       => esc_html__( 'Top Panel', 'confucius' ),
				'priority'    => 10,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'top_panel_text' => array(
				'title'       => esc_html__( 'Disclaimer Text', 'confucius' ),
				'description' => esc_html__( 'HTML formatting support', 'confucius' ),
				'section'     => 'header_top_panel',
				'default'     => confucius_get_default_top_panel_text(),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'top_panel_search' => array(
				'title'   => esc_html__( 'Enable search', 'confucius' ),
				'section' => 'header_top_panel',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_bg' => array(
				'title'   => esc_html__( 'Background color', 'confucius' ),
				'section' => 'header_top_panel',
				'default' => '#000000',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Header Showcase` section */
			'header_showcase_panel' => array(
				'title'       => esc_html__( 'Showcase Panel', 'confucius' ),
				'priority'    => 15,
				'panel'       => 'header_options',
				'type'        => 'section',
			),

			'header_showcase_title' => array(
				'title'    => esc_html__( 'Header showcase title', 'confucius' ),
				'section'  => 'header_showcase_panel',
				'default'  => esc_html__( 'Welcome to the', 'confucius' ),
				'field'    => 'text',
				'type'     => 'control',
			),

			'header_showcase_subtitle' => array(
				'title'    => esc_html__( 'Header showcase subtitle', 'confucius' ),
				'section'  => 'header_showcase_panel',
				'default'  => esc_html__( 'Confucius Restaurant', 'confucius' ),
				'field'    => 'text',
				'type'     => 'control',
			),

			'header_showcase_description' => array(
				'title'    => esc_html__( 'Header showcase description', 'confucius' ),
				'section'  => 'header_showcase_panel',
				'default'  => confucius_get_default_showcase_description(),
				'field'    => 'textarea',
				'type'     => 'control',
			),

			'header_showcase_btn_text' => array(
				'title'    => esc_html__( 'Header showcase button text(leave empty to hide button)', 'confucius' ),
				'section'  => 'header_showcase_panel',
				'default'  => esc_html__( 'Book a table', 'confucius' ),
				'field'    => 'text',
				'type'     => 'control',
			),

			'header_showcase_btn_url' => array(
				'title'    => esc_html__( 'Header showcase button url', 'confucius' ),
				'section'  => 'header_showcase_panel',
				'default'  => '#',
				'field'    => 'text',
				'type'     => 'control',
			),

			'header_showcase_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'confucius' ),
				'section' => 'header_showcase_panel',
				'field'   => 'image',
				'default' => '%s/assets/images/showcase_bg.jpg',
				'type'    => 'control',
			),

			'header_showcase_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'confucius' ),
				'section' => 'header_showcase_panel',
				'field'   => 'hex_color',
				'default' => '#181618',
				'type'    => 'control',
			),

			'header_showcase_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'confucius' ),
				'section' => 'header_showcase_panel',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'confucius' ),
					'repeat'     => esc_html__( 'Tile', 'confucius' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'confucius' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'confucius' ),
				),
				'type' => 'control',
			),

			'header_showcase_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'confucius' ),
				'section' => 'header_showcase_panel',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'confucius' ),
					'center' => esc_html__( 'Center', 'confucius' ),
					'right'  => esc_html__( 'Right', 'confucius' ),
				),
				'type' => 'control',
			),

			'header_showcase_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'confucius' ),
				'section' => 'header_showcase_panel',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'confucius' ),
					'fixed'  => esc_html__( 'Fixed', 'confucius' ),
				),
				'type' => 'control',
			),

			'header_showcase_color_mask' => array(
				'title'   => esc_html__( 'Color Image Mask', 'confucius' ),
				'section' => 'header_showcase_panel',
				'field'   => 'hex_color',
				'default' => '#000000',
				'type'    => 'control',
			),

			'header_showcase_opacity_mask' => array(
				'title'           => esc_html__( 'Opacity Image Mask', 'confucius' ),
				'section'         => 'header_showcase_panel',
				'default'         => '0',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
				'type'            => 'control',
			),

			'showcase_title_color' => array(
				'title'   => esc_html__( 'Showcase title color', 'confucius' ),
				'section' => 'header_showcase_panel',
				'default' => '#d34d34',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'showcase_subtitle_color' => array(
				'title'   => esc_html__( 'Showcase subtitle color', 'confucius' ),
				'section' => 'header_showcase_panel',
				'default' => '#6a564d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			'showcase_description_color' => array(
				'title'   => esc_html__( 'Showcase description color', 'confucius' ),
				'section' => 'header_showcase_panel',
				'default' => '#6a564d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'       => esc_html__( 'Main Menu', 'confucius' ),
				'priority'    => 20,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'confucius' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable item description', 'confucius' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'hidden_menu_items_title' => array(
				'title'    => esc_html__( 'Hidden menu items title', 'confucius' ),
				'section'  => 'header_main_menu',
				'default'  => esc_html__( 'More', 'confucius' ),
				'field'    => 'input',
				'type'     => 'control',
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'confucius' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'confucius' ),
				'section' => 'sidebar_settings',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'confucius' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'confucius' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'confucius' ),
				),
				'type' => 'control',
			),

			/** `MailChimp` section */
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'confucius' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'confucius' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'confucius' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'confucius' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'confucius' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'confucius' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'confucius' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'confucius' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'confucius' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => '',
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'confucius' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'footer_logo_url' => array(
				'title'   => esc_html__( 'Logo upload', 'confucius' ),
				'section' => 'footer_options',
				'field'   => 'image',
				'default' => '%s/assets/images/footer-logo.png',
				'type'    => 'control',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'confucius' ),
				'section' => 'footer_options',
				'default' => confucius_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_widget_columns' => array(
				'title'   => esc_html__( 'Widget Area Columns', 'confucius' ),
				'section' => 'footer_options',
				'default' => '3',
				'field'   => 'select',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type' => 'control',
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'confucius' ),
				'section' => 'footer_options',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'  => esc_html__( 'Style 1', 'confucius' ),
					'centered' => esc_html__( 'Style 2', 'confucius' ),
					'minimal'  => esc_html__( 'Style 3', 'confucius' ),
				),
				'type' => 'control',
			),
			'footer_widgets_bg' => array(
				'title'   => esc_html__( 'Footer Widgets Area Background color', 'confucius' ),
				'section' => 'footer_options',
				'default' => '#321C17',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'confucius' ),
				'section' => 'footer_options',
				'default' => '#281612',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'       => esc_html__( 'Blog Settings', 'confucius' ),
				'priority'    => 115,
				'type'        => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'confucius' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'confucius' ),
				'section' => 'blog',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'          => esc_html__( 'Listing', 'confucius' ),
					'grid-2-cols'      => esc_html__( 'Grid (2 Columns)', 'confucius' ),
					'grid-3-cols'      => esc_html__( 'Grid (3 Columns)', 'confucius' ),
					'masonry-2-cols'   => esc_html__( 'Masonry (2 Columns)', 'confucius' ),
					'masonry-3-cols'   => esc_html__( 'Masonry (3 Columns)', 'confucius' ),
				),
				'type' => 'control',
			),
			'blog_sticky_label' => array(
				'title'       => esc_html__( 'Featured Post Label', 'confucius' ),
				'description' => esc_html__( 'Label for sticky post', 'confucius' ),
				'section'     => 'blog',
				'default'     => 'icon:fa:star',
				'field'       => 'text',
				'type'        => 'control',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'confucius' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'confucius' ),
					'full'    => esc_html__( 'Full content', 'confucius' ),
				),
				'type' => 'control',
			),
			'blog_featured_image' => array(
				'title'   => esc_html__( 'Featured image', 'confucius' ),
				'section' => 'blog',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'small'     => esc_html__( 'Small', 'confucius' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'confucius' ),
				),
				'type' => 'control',
				'active_callback' => 'confucius_is_blog_featured_image',
			),
			'blog_read_more_text' => array(
				'title'   => esc_html__( 'Read More button text', 'confucius' ),
				'section' => 'blog',
				'default' => esc_html__( 'Read more', 'confucius' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'confucius' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'confucius' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'confucius' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'confucius' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'confucius' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'confucius' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'confucius' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'confucius' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'confucius' ),
				'section' => 'blog_post',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'confucius' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'confucius' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'confucius' ),
				'section' => 'blog_post',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation' => array(
				'title'   => esc_html__( 'Enable post navigation', 'confucius' ),
				'section' => 'blog_post',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `404` panel */
			'page_404_options' => array(
				'title'    => esc_html__( '404', 'confucius' ),
				'priority' => 118,
				'type'     => 'section',
			),
			'page_404_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'confucius' ),
				'section' => 'page_404_options',
				'field'   => 'hex_color',
				'default' => '#000000',
				'type'    => 'control',
			),
			'page_404_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'confucius' ),
				'section' => 'page_404_options',
				'field'   => 'image',
				'default' => '%s/assets/images/bg_404.jpg',
				'type'    => 'control',
			),
			'page_404_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'confucius' ),
				'section' => 'page_404_options',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'confucius' ),
					'repeat'     => esc_html__( 'Tile', 'confucius' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'confucius' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'confucius' ),
				),
				'type' => 'control',
			),
			'page_404_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'confucius' ),
				'section' => 'page_404_options',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'confucius' ),
					'center' => esc_html__( 'Center', 'confucius' ),
					'right'  => esc_html__( 'Right', 'confucius' ),
				),
				'type' => 'control',
			),
			'page_404_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'confucius' ),
				'section' => 'page_404_options',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'confucius' ),
					'fixed'  => esc_html__( 'Fixed', 'confucius' ),
				),
				'type' => 'control',
			),
		),
	) );
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control
 * @return bool
 */
function confucius_is_header_logo_image( $control ) {

	if ( $control->manager->get_setting( 'header_logo_type' )->value() == 'image' ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control
 * @return bool
 */
function confucius_is_header_logo_text( $control ) {

	if ( $control->manager->get_setting( 'header_logo_type' )->value() == 'text' ) {
		return true;
	}

	return false;
}

/**
 * Return blog-featured-image true if blog layout type is default. Otherwise - return false.
 *
 * @param  object $control
 *
 * @return bool
 */
function confucius_is_blog_featured_image( $control ) {
	if ( $control->manager->get_setting( 'blog_layout_type' )->value() == 'default' ) {
		return true;
	}

	return false;
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'confucius_customizer_change_core_controls', 20 );
/**
 * Customizer change core controls
 */
function confucius_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'confucius_logo_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'confucius' );
}

// Typography utility function
/**
 * Get font styles
 */
function confucius_get_font_styles() {
	return apply_filters( 'confucius_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'confucius' ),
		'italic'  => esc_html__( 'Italic', 'confucius' ),
		'oblique' => esc_html__( 'Oblique', 'confucius' ),
		'inherit' => esc_html__( 'Inherit', 'confucius' ),
	) );
}

/**
 * Get character sets
 */
function confucius_get_character_sets() {
	return apply_filters( 'confucius_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'confucius' ),
		'greek'        => esc_html__( 'Greek', 'confucius' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'confucius' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'confucius' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'confucius' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'confucius' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'confucius' ),
	) );
}

/**
 * Get text aligns
 */
function confucius_get_text_aligns() {
	return apply_filters( 'confucius_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'confucius' ),
		'center'  => esc_html__( 'Center', 'confucius' ),
		'justify' => esc_html__( 'Justify', 'confucius' ),
		'left'    => esc_html__( 'Left', 'confucius' ),
		'right'   => esc_html__( 'Right', 'confucius' ),
	) );
}

/**
 * Get font weight
 */
function confucius_get_font_weight() {
	return apply_filters( 'confucius_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Get text transform
 */
function confucius_get_text_transform() {
	return apply_filters( 'confucius_get_text_transform', array(
		'none'       => esc_html__( 'None ', 'confucius' ),
		'uppercase'  => esc_html__( 'Uppercase ', 'confucius' ),
		'lowercase'  => esc_html__( 'Lowercase', 'confucius' ),
		'capitalize' => esc_html__( 'Capitalize', 'confucius' ),
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function confucius_get_dynamic_css_options() {
	return apply_filters( 'confucius_get_dynamic_css_options', array(
		'prefix'    => 'confucius',
		'type'      => 'theme_mod',
		'single'    => true,
		'css_files' => array(
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/site/header.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/site/forms.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/site/social.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/site/menus.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/site/post.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/site/navigation.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/site/misc.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/site/buttons.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/plugins/builder.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/plugins/restaurant-menu.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/plugins/booked.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/widgets/custom-post.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/widgets/instagram.css',
			CONFUCIUS_THEME_DIR . '/assets/css/dynamic/widgets/subscribe.css',
		),
		'options' => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'showcase_title_font_style',
			'showcase_title_font_weight',
			'showcase_title_font_size',
			'showcase_title_line_height',
			'showcase_title_font_family',
			'showcase_title_letter_spacing',
			'showcase_title_text_transform',

			'showcase_subtitle_font_style',
			'showcase_subtitle_font_weight',
			'showcase_subtitle_font_size',
			'showcase_subtitle_line_height',
			'showcase_subtitle_font_family',
			'showcase_subtitle_letter_spacing',
			'showcase_subtitle_text_transform',

			'header_showcase_bg_color',
			'header_showcase_bg_repeat',
			'header_showcase_bg_position_x',
			'header_showcase_bg_attachment',
			'header_showcase_color_mask',
			'header_showcase_opacity_mask',
			'showcase_title_color',
			'showcase_subtitle_color',
			'showcase_description_color',

			'navigation_font_style',
			'navigation_font_weight',
			'navigation_font_size',
			'navigation_line_height',
			'navigation_font_family',
			'navigation_letter_spacing',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',

			'pagination_font_style',
			'pagination_font_weight',
			'pagination_font_size',
			'pagination_line_height',
			'pagination_font_family',
			'pagination_letter_spacing',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_accent_color_3',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_accent_color_2',
			'invert_accent_color_3',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'header_bg_color',
			'header_bg_repeat',
			'header_bg_position_x',
			'header_bg_attachment',

			'page_404_bg_color',
			'page_404_bg_repeat',
			'page_404_bg_position_x',
			'page_404_bg_attachment',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg',
			'footer_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function confucius_get_fonts_options() {
	return apply_filters( 'confucius_get_fonts_options', array(
		'prefix'  => 'confucius',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'showcase_title' => array(
				'family'  => 'showcase_title_font_family',
				'style'   => 'showcase_title_font_style',
				'weight'  => 'showcase_title_font_weight',
				'charset' => 'showcase_title_character_set',
			),
			'showcase_subtitle' => array(
				'family'  => 'showcase_subtitle_font_family',
				'style'   => 'showcase_subtitle_font_style',
				'weight'  => 'showcase_subtitle_font_weight',
				'charset' => 'showcase_subtitle_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'navigation' => array(
				'family'  => 'navigation_font_family',
				'style'   => 'navigation_font_style',
				'weight'  => 'navigation_font_weight',
				'charset' => 'navigation_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
			'pagination' => array(
				'family'  => 'pagination_font_family',
				'style'   => 'pagination_font_style',
				'weight'  => 'pagination_font_weight',
				'charset' => 'pagination_character_set',
			),
		),
	) );
}

/**
 * Get default top panel text.
 *
 * @since  1.0.0
 * @return string
 */
function confucius_get_default_top_panel_text() {
	return sprintf(
		__( '<div class="info-block">%s 6087 Richmond hwy, Alexandria, VA</div><div class="info-block">%s <a href="tel:#">703 329 0632</a></div><div class="info-block">%s Mo-Fr 11:00-00:00, Sa-Sa 15:00-00:00</div>', 'confucius' ),
		'<i class="fa fa-map-marker"></i>',
		'<i class="fa fa-phone"></i>',
		'<i class="fa fa-clock-o"></i>'
	);
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function confucius_get_default_footer_copyright() {
	$site_name = get_bloginfo( 'name' );

	return sprintf(
		__( '&copy; %%year%% %s. All Rights Reserved. <a href="%%terms-of-use%%">Terms of use</a> and <a href="%%privacy-policy%%">Privacy Policy</a>', 'confucius' ),
		$site_name
	);
}

/**
 * Get default showcase description.
 *
 * @since  1.0.0
 * @return string
 */
function confucius_get_default_showcase_description() {
	return __( 'Get the ultimate Chinese cuisine experience! <br> Call us at: 555.123.4567', 'confucius' );
}
