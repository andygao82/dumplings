<?php
/**
 * Template part for displaying posts pagination.
 *
 * @package Confucius
 */

the_posts_pagination(
	array(
		'prev_text' => sprintf( '%1$s%2$s', '<i class="fa fa-angle-left"></i>', '<span>' . esc_html__( 'Previous page', 'confucius' ) . '</span>' ),
		'next_text' => sprintf( '%2$s%1$s', '<i class="fa fa-angle-right"></i>', '<span>' . esc_html__( 'Next page', 'confucius' ) . '</span>' ),
	)
);
