<?php
/**
 * Template part for showcase panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Confucius
 */

// Don't show showcase panel if all elements are disabled.
if ( ! confucius_is_showcase_panel_visible() ) {
	return;
} ?>

<div <?php echo confucius_get_container_classes( array( 'showcase-panel' ), 'header' ); ?>>

	<?php confucius_showcase_text_elements( '<h1 class="showcase-panel__title">%s</h1>', 'title' ); ?>
	<?php confucius_showcase_text_elements( '<h2 class="showcase-panel__subtitle">%s</h2>', 'subtitle' ); ?>
	<?php confucius_showcase_text_elements( '<p class="showcase-panel__description">%s</p>', 'description' ); ?>
	<?php confucius_showcase_btn(); ?>

</div><!-- .showcase-panel -->
