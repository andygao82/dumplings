<?php
/**
 * Template part for displaying comments.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Confucius
 */
?>
<footer class="comment-meta">
	<div class="comment-author vcard">
		<?php echo confucius_comment_author_avatar(); ?>
	</div>
	<div class="comment-metadata">
		<?php printf( __( '<span class="posted-by">Posted by</span> %s', 'confucius' ), confucius_get_comment_author_link() ); ?>
		<?php echo confucius_get_comment_date( array( 'format' => 'M d, Y' ) ); ?>
	</div>
</footer>
<div class="comment-content">
	<?php echo confucius_get_comment_text(); ?>
</div>
<div class="reply">
	<?php echo confucius_get_comment_reply_link( array( 'reply_text' => esc_html__( 'Reply', 'confucius' ) ) ); ?>
</div>
