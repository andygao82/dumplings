<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Confucius
 */
?>

<section class="error-404 not-found invert">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( '404', 'confucius' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<h2><?php esc_html_e( 'The page not found.', 'confucius' ); ?></h2>
		<p class=""><a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Visit home page', 'confucius' ); ?></a></p>
		<p class="error-desc">
			<?php esc_html_e( 'Unfortunately the page you were looking for could not be found.', 'confucius' ); ?> <br>
			<?php esc_html_e( 'Maybe search can help.', 'confucius' ); ?>
		</p>

		<?php get_search_form(); ?>

	</div><!-- .page-content -->
</section><!-- .error-404 -->
