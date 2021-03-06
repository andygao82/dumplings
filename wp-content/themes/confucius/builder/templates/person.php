<?php
/**
 * Template part for Person module displaying
 *
 * @package Confucius
 */
?>
<?php echo $this->_var( 'image' ); ?>
<div class="tm_pb_team_member_description">
	<h4 class="tm_pb_team_member_name"><?php
		echo $this->html( esc_url( $this->_var( 'custom_url' ) ), '<a href="%s">' );
		echo esc_html( $this->_var( 'name' ) );
		echo $this->html( $this->_var( 'custom_url' ), '</a>' );
	?></h4>
	<p class="tm_pb_member_position"><small><?php echo esc_html( $this->_var( 'position' ) ); ?></small></p>
	<?php echo $this->shortcode_content; ?>
	<?php echo $this->_var( 'social_links' ); ?>
</div> <!-- .tm_pb_team_member_description -->
