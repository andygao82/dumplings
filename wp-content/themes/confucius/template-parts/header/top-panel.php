<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Confucius
 */

// Don't show top panel if all elements are disabled.
if ( ! confucius_is_top_panel_visible() ) {
	return;
} ?>

<div class="top-panel invert">
	<div <?php echo confucius_get_container_classes( array( 'top-panel__wrap' ), 'header' ); ?>>
		<div class="row">
			<?php
			confucius_top_message( '<div class="top-panel__message">%s</div>' );
			confucius_top_search( '<div class="top-panel__search">%s</div>' );
			confucius_social_list( 'header' );
			?>
		</div>
	</div>
</div><!-- .top-panel -->
