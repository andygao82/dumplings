<?php
/**
 * Theme hooks.
 *
 * @package Confucius
 */

// Menu description.
add_filter( 'walker_nav_menu_start_el', 'confucius_nav_menu_description', 10, 4 );

// Sidebars classes.
add_filter( 'confucius_widget_area_classes', 'confucius_set_sidebar_classes', 10, 2 );

// Add row to footer area classes.
add_filter( 'confucius_widget_area_classes', 'confucius_add_footer_widgets_wrapper_classes', 10, 2 );

// Set footer columns.
add_filter( 'dynamic_sidebar_params', 'confucius_get_footer_widget_layout' );

// Adapt default image post format classes to current theme.
add_filter( 'cherry_post_formats_image_css_model', 'confucius_add_image_format_classes', 10, 2 );

// Enqueue sticky menu if required.
add_filter( 'confucius_theme_script_depends', 'confucius_enqueue_misc' );

// Add has/no thumbnail classes for posts.
add_filter( 'post_class', 'confucius_post_thumb_classes' );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'confucius_modify_comment_form' );

// Reorder comment fields
add_filter( 'comment_form_fields', 'confucius_reorder_comment_fields' );

// Additional body classes.
add_filter( 'body_class', 'confucius_extra_body_classes' );

// Render macros in text widgets.
add_filter( 'widget_text', 'confucius_render_widget_macros' );

// Adds the meta viewport to the header.
add_action( 'wp_head', 'confucius_meta_viewport', 0 );

// Customization for `Tag Cloud` widget.
add_filter( 'widget_tag_cloud_args', 'confucius_customize_tag_cloud' );

// Changed excerpt more string.
add_filter( 'excerpt_more', 'confucius_excerpt_more' );

// Add custom image size to media library
add_filter( 'image_size_names_choose', 'confucius_media_custom_sizes' );

// Add custom inline style
add_action( 'wp_head', 'confucius_custom_css_style' );

// Customization grid class Power builder
add_filter( 'tm_builder_1_4_column_layout', 'confucius_builder_1_4_column_layout' );
add_filter( 'tm_builder_1_2_column_layout', 'confucius_builder_1_2_column_layout' );

/**
 * Append description into nav items
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 *
 * @return string
 */
function confucius_nav_menu_description( $item_output, $item, $depth, $args ) {

	if ( 'main' !== $args->theme_location || ! $item->description ) {
		return $item_output;
	}

	$descr_enabled = get_theme_mod( 'header_menu_attributes', confucius_theme()->customizer->get_default( 'header_menu_attributes' ) );

	if ( ! $descr_enabled ) {
		return $item_output;
	}

	$current     = $args->link_after . '</a>';
	$description = '<div class="menu-item__desc">' . $item->description . '</div>';
	$item_output = str_replace( $current, $description . $current, $item_output );

	return $item_output;
}

/**
 * Set layout classes for sidebars.
 *
 * @since  1.0.0
 * @uses   confucius_get_layout_classes.
 *
 * @param  array  $classes Additional classes.
 * @param  string $area_id Sidebar ID.
 *
 * @return array
 */
function confucius_set_sidebar_classes( $classes, $area_id ) {

	if ( ! in_array( $area_id, array( 'sidebar-primary', 'sidebar-secondary' ) ) ) {
		return $classes;
	}

	return confucius_get_layout_classes( 'sidebar', $classes );
}

/**
 * Set layout classes for sidebars.
 *
 * @since  1.0.0
 *
 * @param  array  $classes Additional classes.
 * @param  string $area_id Sidebar ID.
 *
 * @return array
 */
function confucius_add_footer_widgets_wrapper_classes( $classes, $area_id ) {

	if ( 'footer-area' !== $area_id ) {
		return $classes;
	}

	$columns = get_theme_mod( 'footer_widget_columns', confucius_theme()->customizer->get_default( 'footer_widget_columns' ) );

	switch ( $columns ) {
		case 4:
		case 3:
		case 2:
			$col_class = sprintf( 'footer-area--%s-cols', $columns );
			break;

		default:
			$col_class = 'footer-area--fullwidth';
			break;
	}

	$classes[] = 'row';

	$classes[] = $col_class;

	return $classes;
}


/**
 * Get footer widgets layout class
 *
 * @since  1.0.0
 *
 * @param  string $params Existing widget classes.
 *
 * @return string
 */
function confucius_get_footer_widget_layout( $params ) {

	if ( is_admin() ) {
		return $params;
	}

	if ( empty( $params[0]['id'] ) || 'footer-area' !== $params[0]['id'] ) {
		return $params;
	}

	if ( empty( $params[0]['before_widget'] ) ) {
		return $params;
	}

	$columns = get_theme_mod( 'footer_widget_columns', confucius_theme()->customizer->get_default( 'footer_widget_columns' ) );

	$columns = intval( $columns );
	$classes = 'class="col-xs-12 col-sm-%2$s col-md-%1$s %3$s ';

	switch ( $columns ) {
		case 4:
			$md_col = 3;
			$sm_col = 6;
			$extra  = 'footer-area--cols-4';
			break;

		case 3:
			$md_col = 4;
			$sm_col = 12;
			$extra  = 'footer-area--cols-3';
			break;

		case 2:
			$md_col = 6;
			$sm_col = 6;
			$extra  = 'footer-area--cols-2';
			break;

		default:
			$md_col = 12;
			$sm_col = 12;
			$extra  = 'footer-area--centered';
			break;
	}

	$params[0]['before_widget'] = str_replace( 'class="', sprintf( $classes, $md_col, $sm_col, $extra ), $params[0]['before_widget'] );

	return $params;
}

/**
 * Filter image CSS model
 *
 * @param  array $css_model Default CSS model.
 * @param  array $args      Post formats module arguments.
 *
 * @return array
 */
function confucius_add_image_format_classes( $css_model, $args ) {
	$css_model['link'] .= ' post-thumbnail--fullwidth';

	return $css_model;
}

/**
 * Add jQuery Stickup to theme script dependencies if required.
 *
 * @param  array $depends Default dependencies.
 *
 * @return array
 */
function confucius_enqueue_misc( $depends ) {
	$header_menu_sticky = get_theme_mod( 'header_menu_sticky', confucius_theme()->customizer->get_default( 'header_menu_sticky' ) );

	if ( $header_menu_sticky && ! wp_is_mobile() ) {
		$depends[] = 'jquery-stickup';
	}

	$totop_visibility = get_theme_mod( 'totop_visibility', confucius_theme()->customizer->get_default( 'totop_visibility' ) );

	if ( $totop_visibility && ! wp_is_mobile() ) {
		$depends[] = 'jquery-totop';
	}

	return $depends;
}

/**
 * Add has/no thumbnail classes for posts
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function confucius_post_thumb_classes( $classes ) {
	$thumb = 'no-thumb';

	if ( has_post_thumbnail() ) {
		$thumb = 'has-thumb';
	}

	$classes[] = $thumb;

	$layout     = get_theme_mod( 'blog_layout_type', confucius_theme()->customizer->get_default( 'blog_layout_type' ) );
	$format     = get_post_format();
	$thumb_size = get_theme_mod( 'blog_featured_image', confucius_theme()->customizer->get_default( 'blog_featured_image' ) );

	if ( 'default' === $layout && 'small' === $thumb_size && ! is_single() && ! is_sticky() && ! in_array( $format, array(
			'image',
			'gallery',
			'link',
		) ) && true === has_post_thumbnail()
	) {
		$classes[] = 'thumb-small';
	}

	return $classes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Argumnts for comment form.
 *
 * @return array
 */
function confucius_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Send', 'confucius' );

	$args['fields']['author'] = '<p class="comment-form-author"><span class="comment-form__input-title">' . esc_html__( 'Your name ', 'confucius' ) . '</span><input id="author" class="comment-form__field" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><span class="comment-form__input-title">' . esc_html__( 'Enter your e-mail ', 'confucius' ) . '</span><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['url'] = '';

	$args['comment_field'] = '<p class="comment-form-comment"><span class="comment-form__input-title">' . esc_html__( 'Message ', 'confucius' ) . '</span><textarea id="comment" class="comment-form__field" name="comment" cols="45" rows="8" aria-required="true" required="required"></textarea></p>';

	$args['title_reply_before'] = '<h4 id="reply-title" class="comment-reply-title">';

	$args['title_reply_after'] = '</h4>';

	$args['title_reply'] = esc_html__( 'Leave a reply', 'confucius' );

	return $args;
}

/**
 * Reorder comment fields
 *
 * @param  array $fields Comment fields.
 * @return array
 */
function confucius_reorder_comment_fields( $fields ) {

	$new_fields_order = array();
	$new_order        = array( 'author', 'email', 'comment' );

	foreach ( $new_order as $key ) {
		$new_fields_order[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	return $new_fields_order;
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function confucius_extra_body_classes( $classes ) {
	// Adds a class of front-page.
	if ( is_front_page() ) {
		$classes[] = 'front-page';
	}
	// Adds a class of mobile device.
	if ( wp_is_mobile() ) {
		$classes[] = 'mobile-device';
	}
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a options-based classes.
	$header_layout  = get_theme_mod( 'header_container_type', confucius_theme()->customizer->get_default( 'header_container_type' ) );
	$content_layout = get_theme_mod( 'content_container_type', confucius_theme()->customizer->get_default( 'content_container_type' ) );
	$footer_layout  = get_theme_mod( 'footer_container_type', confucius_theme()->customizer->get_default( 'footer_container_type' ) );
	$blog_layout    = get_theme_mod( 'blog_layout_type', confucius_theme()->customizer->get_default( 'blog_layout_type' ) );
	$sb_position    = get_theme_mod( 'sidebar_position', confucius_theme()->customizer->get_default( 'sidebar_position' ) );
	$sidebar        = get_theme_mod( 'sidebar_width', confucius_theme()->customizer->get_default( 'sidebar_width' ) );

	return array_merge( $classes, array(
		'header-layout-' . $header_layout,
		'content-layout-' . $content_layout,
		'footer-layout-' . $footer_layout,
		'blog-' . $blog_layout,
		'position-' . $sb_position,
		'sidebar-' . str_replace( '/', '-', $sidebar ),
	) );
}

/**
 * Replace macroses in text widget.
 *
 * @param  string $text Default text.
 *
 * @return string
 */
function confucius_render_widget_macros( $text ) {
	$uploads = wp_upload_dir();

	$data = array(
		'/%%uploads_url%%/' => $uploads['baseurl'],
		'/%%home_url%%/'    => home_url(),
		'/%%theme_url%%/'   => get_stylesheet_directory_uri(),
	);

	return preg_replace( array_keys( $data ), array_values( $data ), $text );
}

/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.1
 * @return string `<meta>` tag for viewport.
 */
function confucius_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}

/**
 * Customization for `Tag Cloud` widget.
 *
 * @since  1.0.1
 *
 * @param  array $args Widget arguments.
 *
 * @return array
 */
function confucius_customize_tag_cloud( $args ) {
	$args['smallest'] = 12;
	$args['largest']  = 12;
	$args['unit']     = 'px';

	return $args;
}

/**
 * Replaces `[...]` (appended to automatically generated excerpts) with `...`.
 *
 * @since  1.0.1
 *
 * @param  string $more The string shown within the more link.
 *
 * @return string
 */
function confucius_excerpt_more( $more ) {

	if ( is_admin() ) {
		return $more;
	}

	return ' &hellip;';
}

/**
 * Add custom image size to media library
 *
 * @param  array $sizes Media library sizes.
 * @return array
 */
function confucius_media_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'confucius-thumb-390-311' => 'Custom small',
		'confucius-thumb-682-351' => 'Custom medium',
	) );
}

/**
 * Add custom inline style
 */
function confucius_custom_css_style() {
	$showcase_bg_url = get_theme_mod( 'header_showcase_bg_image', confucius_theme()->customizer->get_default( 'header_showcase_bg_image' ) );
	$showcase_bg_url = esc_url( confucius_render_theme_url( $showcase_bg_url ) );

	$page_404_bg_url = get_theme_mod( 'page_404_bg_image', confucius_theme()->customizer->get_default( 'page_404_bg_image' ) );
	$page_404_bg_url = esc_url( confucius_render_theme_url( $page_404_bg_url ) );

	$header_bg_url = get_theme_mod( 'header_bg_image', confucius_theme()->customizer->get_default( 'header_bg_image' ) );
	$header_bg_url = esc_url( confucius_render_theme_url( $header_bg_url ) );

	$css = '<style type="text/css">';
		$css .= '.showcase-active .header-wrapper { background-image: url( ' . $showcase_bg_url . ' ); }';
		$css .= 'body.error404 { background-image: url( ' . $page_404_bg_url . ' ); }';
		$css .= '.header-wrapper { background-image: url( ' . $header_bg_url . ' ); }';
	$css .= '</style>';

	echo $css;
}

/**
 * Customization grid class Power builder for column layout - 1_4
 *
 * @param  string $grid_class Grid class.
 * @return string
 */
function confucius_builder_1_4_column_layout( $grid_class ) {
	$grid_class = 'col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3';

	return $grid_class;
}

/**
 * Customization grid class Power builder for column layout - 1_2
 *
 * @param  string $grid_class Grid class.
 * @return string
 */
function confucius_builder_1_2_column_layout( $grid_class ) {
	$grid_class = 'col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6';

	return $grid_class;
}

// Restaurant Menu single post action
remove_action( 'mprm_menu_item_content', 'mprm_menu_item_content_comments', 30 );

// Restaurant Menu taxonomy list actions
remove_action( 'mprm_taxonomy_list', 'mprm_category_menu_item_before_content', 5 );
remove_action( 'mprm_taxonomy_list', 'mprm_taxonomy_list_header_title', 30 );
remove_action( 'mprm_taxonomy_list', 'mprm_taxonomy_list_ingredients', 35 );
remove_action( 'mprm_taxonomy_list', 'mprm_taxonomy_list_tags', 40 );
remove_action( 'mprm_taxonomy_list', 'mprm_taxonomy_list_price', 45 );
remove_action( 'mprm_taxonomy_list', 'mprm_category_menu_item_after_content', 50 ); // 1.1.4
remove_action( 'mprm_taxonomy_list', 'mprm_category_menu_item_after_content', 55 );

add_action( 'mprm_taxonomy_list', 'confucius_mprm_item_title_wrap_before', 27 );
add_action( 'mprm_taxonomy_list', 'confucius_mprm_taxonomy_header_title', 30 );
add_action( 'mprm_taxonomy_list', 'mprm_taxonomy_list_price', 35 );
add_action( 'mprm_taxonomy_list', 'confucius_mprm_item_title_wrap_after', 37 );
add_action( 'mprm_taxonomy_list', 'mprm_taxonomy_list_tags', 40 );
add_action( 'mprm_taxonomy_list', 'confucius_mprm_taxonomy_excerpt', 43 );
add_action( 'mprm_taxonomy_list', 'mprm_taxonomy_list_ingredients', 45 );

// Restaurant Menu taxonomy grid actions
remove_action( 'mprm_taxonomy_grid', 'mprm_single_category_grid_header', 10 );
remove_action( 'mprm_taxonomy_grid', 'mprm_single_category_grid_title', 40 );
remove_action( 'mprm_taxonomy_grid', 'mprm_single_category_grid_ingredients', 45 );
remove_action( 'mprm_taxonomy_grid', 'mprm_single_category_grid_tags', 50 );
remove_action( 'mprm_taxonomy_grid', 'mprm_category_menu_item_after_content', 65 );

add_action( 'mprm_taxonomy_grid', 'confucius_mprm_single_category_grid_header', 10 );
add_action( 'mprm_taxonomy_grid', 'confucius_mprm_tax_thumb_wrap_before', 13 );
add_action( 'mprm_taxonomy_grid', 'mprm_category_menu_item_after_content', 30 );
add_action( 'mprm_taxonomy_grid', 'mprm_single_category_grid_tags', 31 );
add_action( 'mprm_taxonomy_grid', 'confucius_mprm_tax_thumb_wrap_after', 33 );
add_action( 'mprm_taxonomy_grid', 'confucius_mprm_taxonomy_header_title', 40 );
add_action( 'mprm_taxonomy_grid', 'confucius_mprm_taxonomy_excerpt', 45 );
add_action( 'mprm_taxonomy_grid', 'mprm_single_category_grid_ingredients', 50 );

// Restaurant Menu shortcode menu item grid actions
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_before_content', 15 );
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_image', 20 );
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_title', 30 );
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_ingredients', 40 );
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_attributes', 50 );
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_excerpt', 60 );
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_tags', 70 );
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_price', 75 ); // 1.1.4
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_price', 80 );
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_after_content', 80 ); // 1.1.4
remove_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_after_content', 85 );

add_action( 'mprm_shortcode_menu_item_grid', 'confucius_mprm_thumb_wrap_before', 15 );
add_action( 'mprm_shortcode_menu_item_grid', 'confucius_mprm_menu_item_grid_image', 20 );
add_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_tags', 23 );
add_action( 'mprm_shortcode_menu_item_grid', 'confucius_mprm_thumb_wrap_after', 25 );
add_action( 'mprm_shortcode_menu_item_grid', 'confucius_mprm_desc_wrap_before', 27 );
add_action( 'mprm_shortcode_menu_item_grid', 'confucius_mprm_menu_item_title', 30 );
add_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_excerpt', 50 );
add_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_ingredients', 60 );
add_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_price', 65 );
add_action( 'mprm_shortcode_menu_item_grid', 'mprm_menu_item_grid_attributes', 70 );
add_action( 'mprm_shortcode_menu_item_grid', 'confucius_mprm_desc_wrap_after', 88 );

// Restaurant Menu shortcode menu item list actions
remove_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_before_content', 10 );
remove_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_list_image', 15 );
remove_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_list_title', 25 );
remove_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_list_ingredients', 30 );
remove_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_list_attributes', 35 );
remove_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_list_tags', 45 );
remove_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_list_price', 50 );
remove_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_after_content', 60 );

add_action( 'mprm_shortcode_menu_item_list', 'confucius_mprm_shortcode_menu_item_list_image', 15 );
add_action( 'mprm_shortcode_menu_item_list', 'confucius_mprm_menu_item_list_title', 25 );
add_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_list_tags', 35 );
add_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_list_ingredients', 40 );
add_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_list_price', 45 );
add_action( 'mprm_shortcode_menu_item_list', 'mprm_menu_item_list_attributes', 50 );

// Restaurant Menu widget menu item grid actions
remove_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_before_content', 15 );
remove_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_image', 20 );
remove_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_title', 30 );
remove_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_ingredients', 40 );
remove_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_attributes', 50 );
remove_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_excerpt', 60 );
remove_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_tags', 70 );
remove_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_price', 80 );
remove_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_after_content', 90 );

add_action( 'mprm_widget_menu_item_grid', 'confucius_mprm_thumb_wrap_before', 15 );
add_action( 'mprm_widget_menu_item_grid', 'confucius_mprm_menu_item_grid_image', 20 );
add_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_tags', 23 );
add_action( 'mprm_widget_menu_item_grid', 'confucius_mprm_thumb_wrap_after', 25 );
add_action( 'mprm_widget_menu_item_grid', 'confucius_mprm_desc_wrap_before', 27 );
add_action( 'mprm_widget_menu_item_grid', 'confucius_mprm_menu_item_title', 30 );
add_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_excerpt', 40 );
add_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_ingredients', 50 );
add_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_price', 55 );
add_action( 'mprm_widget_menu_item_grid', 'mprm_menu_item_grid_attributes', 60 );
add_action( 'mprm_widget_menu_item_grid', 'confucius_mprm_desc_wrap_after', 88 );

// Restaurant Menu widget menu item list actions
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_before_content', 10 );
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_image', 15 );
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_title', 30 );
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_ingredients', 35 );
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_attributes', 40 );
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_excerpt', 50 );
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_tags', 60 );
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_price', 70 );
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_after_content', 75 ); // 1.1.4
remove_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_after_content', 80 );

add_action( 'mprm_widget_menu_item_list', 'confucius_mprm_shortcode_menu_item_list_image', 15 );
add_action( 'mprm_widget_menu_item_list', 'confucius_mprm_menu_item_title', 30 );
add_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_tags', 40 );
add_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_excerpt', 45 );
add_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_ingredients', 50 );
add_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_price', 55 );
add_action( 'mprm_widget_menu_item_list', 'mprm_menu_item_list_attributes', 60 );

// Restaurant Menu widget menu item simple list actions
remove_action( 'mprm_widget_menu_item_simple_list', 'mprm_menu_item_list_ingredients', 30 );
remove_action( 'mprm_widget_menu_item_simple_list', 'mprm_menu_item_list_attributes', 40 );
remove_action( 'mprm_widget_menu_item_simple_list', 'mprm_menu_item_list_excerpt', 50 );
remove_action( 'mprm_widget_menu_item_simple_list', 'mprm_menu_item_list_tags', 60 );

add_action( 'mprm_widget_menu_item_simple_list', 'mprm_menu_item_list_tags', 30 );
add_action( 'mprm_widget_menu_item_simple_list', 'mprm_menu_item_list_excerpt', 40 );
add_action( 'mprm_widget_menu_item_simple_list', 'mprm_menu_item_list_ingredients', 50 );
add_action( 'mprm_widget_menu_item_simple_list', 'mprm_menu_item_list_attributes', 60 );

/**
 * Restaurant Menu description wrap before
 */
function confucius_mprm_desc_wrap_before() {
	echo '<div class="mprm-desc">';
}

/**
 * Restaurant Menu description wrap after
 */
function confucius_mprm_desc_wrap_after() {
	echo '</div>';
}

/**
 * Restaurant Menu shortcode, widget menu item title
 */
function confucius_mprm_menu_item_title() {
	global $mprm_view_args;

	$utility = confucius_utility()->utility;

	$title_html = ( ! empty( $mprm_view_args['link_item'] ) ) ? '<h5 %1$s><a href="%2$s" rel="bookmark">%4$s</a></h5>' : '<h5 %1$s>%4$s</h5>';

	$utility->attributes->get_title( array(
		'class' => 'mprm-item-title',
		'html'  => $title_html,
		'echo'  => true,
	) );
}

/**
 * Restaurant Menu shortcode, widget menu item title
 */
function confucius_mprm_menu_item_list_title() {
	global $mprm_view_args;

	$utility = confucius_utility()->utility;

	$title_html = ( ! empty( $mprm_view_args['link_item'] ) ) ? '<h6 %1$s><a href="%2$s" rel="bookmark">%4$s</a></h6>' : '<h6 %1$s>%4$s</h6>';

	$utility->attributes->get_title( array(
		'class' => 'mprm-item-title',
		'html'  => $title_html,
		'echo'  => true,
	) );
}

/**
 * Restaurant Menu shortcode, widget menu item grid image
 */
function confucius_mprm_menu_item_grid_image() {
	global $mprm_view_args;

	if ( empty( $mprm_view_args['feat_img'] ) ) {
		return;
	}

	$utility = confucius_utility()->utility;
	$html = ( ! empty( $mprm_view_args['link_item'] ) ) ? '<a href="%1$s" %2$s><img class="mprm-image" src="%3$s" alt="%4$s" %5$s></a>' : '<img class="mprm-image" src="%3$s" alt="%4$s" %5$s>';

	$utility->media->get_image( array(
		'size'        => 'confucius-thumb-370-250',
		'mobile_size' => 'confucius-thumb-370-250',
		'class'       => 'mprm-link',
		'html'        => $html,
		'placeholder' => false,
		'echo'        => true,
	) );
}

/**
 * Restaurant Menu shortcode menu item list image
 */
function confucius_mprm_shortcode_menu_item_list_image() {
	global $mprm_view_args;

	if ( empty( $mprm_view_args['feat_img'] ) ) {
		return;
	}

	$utility = confucius_utility()->utility;
	$html = ( ! empty( $mprm_view_args['link_item'] ) ) ? '<a href="%1$s" %2$s><img class="mprm-image" src="%3$s" alt="%4$s" %5$s></a>' : '<img class="mprm-image" src="%3$s" alt="%4$s" %5$s>';

	$utility->media->get_image( array(
		'size'        => 'confucius-thumb-180-120',
		'mobile_size' => 'confucius-thumb-180-120',
		'class'       => 'mprm-link',
		'html'        => '<figure class="mprm-side mprm-left-side">' . $html . '</figure>',
		'placeholder' => false,
		'echo'        => true,
	) );
}

/**
 * Restaurant Menu shortcode grid thumb wrap before
 */
function confucius_mprm_thumb_wrap_before() {

	global $mprm_view_args;

	$html_before = ( ! empty( $mprm_view_args['feat_img'] ) ) ? '<div class="mprm_thumb_wrap">' : '<div class="mprm_thumb_wrap feat-img-disable">';

	echo $html_before;
}

/**
 * Restaurant Menu shortcode grid thumb wrap after
 */
function confucius_mprm_thumb_wrap_after() {
	echo '</div>';
}

/**
 * Restaurant Menu taxonomy grid thumb wrap before
 */
function confucius_mprm_tax_thumb_wrap_before() {

	echo '<div class="mprm_thumb_wrap">';
}

/**
 * Restaurant Menu taxonomy grid thumb wrap after
 */
function confucius_mprm_tax_thumb_wrap_after() {
	echo '</div>';
}

/**
 * Restaurant Menu taxonomy grid item before
 */
function confucius_mprm_single_category_grid_header() {
	?>
	<div <?php post_class( 'grid-item' ) ?>>

	<?php
}

/**
 * Restaurant Menu menu item title wrap before
 */
function confucius_mprm_item_title_wrap_before() {
	echo '<div class="mprm-item-title-wrap">';
}

/**
 * Restaurant Menu menu item title wrap after
 */
function confucius_mprm_item_title_wrap_after() {
	echo '</div>';
}

/**
 * Restaurant Menu taxonomy menu item title
 */
function confucius_mprm_taxonomy_header_title() {
	$utility = confucius_utility()->utility;

	$utility->attributes->get_title( array(
		'class' => 'mprm-item-title',
		'html'  => '<h5 %1$s><a href="%2$s" rel="bookmark">%4$s</a></h5>',
		'echo'  => true,
	) );
}

/**
 * Add excerpt to Restaurant Menu taxonomy
 */
function confucius_mprm_taxonomy_excerpt() {
	$utility = confucius_utility()->utility;

	$utility->attributes->get_content( array(
		'length'       => 15,
		'content_type' => 'post_excerpt',
		'class'        => 'mprm-excerpt',
		'echo'         => true,
	) );
}

// Disable mp_rm breadcrumbs
add_filter( 'mprm-item-breadcrumbs', '__return_false' );

// Change mp_rm related item image size
add_filter( 'mprm-related-item-image-size', 'confucius_mprm_related_item_image_size' );

/**
 * Change mp_rm related item image size
 *
 * @return string
 */
function confucius_mprm_related_item_image_size() {
	if ( is_tax( array( 'mp_menu_category', 'mp_menu_tag' ) ) ) {
		return 'confucius-thumb-370-250';
	}

	return 'confucius-thumb-320-252';
}
