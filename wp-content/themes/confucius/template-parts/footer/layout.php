<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Confucius
 */
?>

<div class="footer-area-wrap">
	<div <?php echo confucius_get_container_classes( array( 'footer-area-container', 'invert' ), 'footer' ); ?>>
	<section id="footer-area" class="footer-area widget-area row footer-area--3-cols"><aside id="confucius_widget_about-2" class="col-xs-12 col-sm-12 col-md-4 footer-area--cols-3 widget widget-about">
<div class="widget-about__logo">
	<a class="widget-about__logo-link" href="<?php echo get_home_url(); ?>">
		<img class="widget-about__logo-img" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Mr Chan's Dumplings" style="max-width: 200px">
	</a>
</div>
<div class="widget-about__tagline"></div>
<div class="widget-about__content"><p>Mr. Chan is also the mastermind behind the design of our eye-catching logo, he uses bright orange to symbolize the bright and happy smiles that we hope you get from trying our dumplings and use this to represent our vibrant corporate image. </p>
</div>
</aside><aside id="text-4" class="col-xs-12 col-sm-12 col-md-4 footer-area--cols-3 widget widget_text"><h4 class="widget-title">Contact us</h4>			<div class="textwidget"><div class="info-block"><i class="fa fa-map-marker"></i> 752 Glenferrie Rd, Hawthorn VIC 3122</div>
<div class="info-block"><i class="fa fa-phone"></i> <a href="tel:#">(03) 9077 1666</a></div>
<div class="info-block"><i class="fa fa-clock-o"></i>Everyday 11am - 3pm, 5pm - 8pm</div>
<div class="info-block"><i class="fa fa-envelope"></i> <a href="mailto:info@demolink.org">info@mrchansdumplings.com.au</a></div></div>
		</aside><aside id="confucius_widget_subscribe_follow-4" class="col-xs-12 col-sm-12 col-md-4 footer-area--cols-3 widget widget-subscribe"><div class="subscribe-follow__wrap "><div class="subscribe-block">
	
	<div class="container subscribe-block__wrap">
		<div class="row">

			<div class="col-xs-12">
				<h4 class="widget-title">Sign Up for Discounts</h4>				<div class="subscribe-block__message">Never miss a chance to order a Beef Chow Mein or a Noodle Soup at a discounted price!</div>			</div>

			<div class="col-xs-12">
				<form method="POST" action="#" class="subscribe-block__form"><input type="hidden" id="confucius_subscribe" name="confucius_subscribe" value="f56cc949e1"><input type="hidden" name="_wp_http_referer" value="/dumplings/">					<div class="subscribe-block__input-group"><input class="subscribe-block__input" type="email" name="subscribe-mail" value="" placeholder="Enter your e-mail"><a href="#" class="subscribe-block__submit btn"><i class="fa fa-envelope-o"></i></a></div><div class="subscribe-block__messages">
					<div class="subscribe-block__success hidden">You successfully subscribed</div>
					<div class="subscribe-block__error hidden"></div>
				</div></form>
			</div>

		</div>
	</div>
</div>
</div></aside></section>
	</div>
</div>
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
