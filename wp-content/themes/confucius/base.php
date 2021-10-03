<?php get_header( confucius_template_base() ); ?>

	<?php do_action( 'confucius_render_widget_area', 'full-width-header-area' ); ?>

	<?php confucius_site_breadcrumbs(); ?>

	<div <?php echo confucius_get_container_classes( array( 'site-content_wrap' ), 'content' ); ?>>


		<div class="row">

			<div id="primary" <?php confucius_primary_content_class(); ?>>

				<main id="main" class="site-main" role="main">

					<?php include confucius_template_path(); ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template.  ?>

		</div><!-- .row -->

	</div><!-- .container -->

	<?php do_action( 'confucius_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( confucius_template_base() ); ?>
