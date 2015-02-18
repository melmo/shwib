<?php
/**
 * Comment Template
 *
 * The comment template displays an individual comment. This can be overwritten by templates specific
 * to the comment type (comment.php, comment-{$comment_type}.php, comment-pingback.php, 
 * comment-trackback.php) in a child theme.
 *
 */

	global $post, $comment;
?>

	<li id="comment-<?php comment_ID(); ?>" class="<?php hybrid_comment_class(); ?>">

		<div class="comment-wrap">

			<div class="comment-image"><?php echo hybrid_avatar(); ?></div>

			<?php echo apply_atomic_shortcode( 'comment_meta', '<div class="comment-meta">[comment-author] <br> [comment-published] <br> [comment-permalink] [comment-edit-link before="| "] [comment-reply-link before="| "]</div>' ); // shwib_comment_meta ?>

			<div class="comment-content comment-text">
				<?php if ( '0' == $comment->comment_approved ) : ?>
					 <p class="alert moderation"> <?php _e( 'Your comment is awaiting moderation.', 'shwib' ) ;?></p>
				<?php endif; ?>

				<?php comment_text( $comment->comment_ID ); ?>
			</div><!-- .comment-content .comment-text -->

		</div><!-- .comment-wrap -->

	<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>