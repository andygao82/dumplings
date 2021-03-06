<?php
/**
 * Template part for Testimonial module displaying
 *
 * @package Confucius
 */
?>
<?php echo $this->_var( 'portrait_image' ); ?>
<div class="tm_pb_testimonial_description">
	<div class="tm_pb_testimonial_description_inner">
		<?php echo $this->shortcode_content; ?>
		<h5 class="tm_pb_testimonial_author">
			<?php echo $this->_var( 'author' ); ?>
		</h5>
		<p class="tm_pb_testimonial_meta"><?php
			echo $this->_var( 'job_title' );
			if ( $this->_var( 'company_name' ) ) {
				printf( ', %s', $this->_var( 'company_name' ) );
			}
			if ( $this->_var( 'testi_date' ) ) {
				printf( ' - %s', $this->_var( 'testi_date' ) );
			}
			?></p>
	</div><!-- .tm_pb_testimonial_description_inner -->
</div><!-- .tm_pb_testimonial_description -->
