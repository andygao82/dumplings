<?php
/**
 * The template for displaying search form.
 *
 * @package Confucius
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'confucius' ) ?></span>
	<label class="search-form__label">
		<input type="search" class="search-form__field"
			placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'confucius' ) ?>"
			value="<?php echo get_search_query() ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'confucius' ) ?>" />
		<button type="submit" class="search-form__submit"><i class="fa fa-search"></i></button>
	</label>
</form>
