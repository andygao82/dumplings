<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Confucius
 */
?>

<div class="footer-container invert">
	<div <?php echo confucius_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<div class="site-info__flex">
			<?php
			confucius_footer_copyright();
			confucius_social_list( 'footer' );
			?>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->
