<?php
/**
 * Loop Nav Template
 *
 * This template is used to show your your next/previous post links on singular pages and
 * the next/previous posts links on the home/posts page and archive pages.
 *
 */
?>
<?php if ( is_singular( 'post' ) ) : // If viewing a single post page. ?>

	<div class="loop-nav">
		<?php previous_post_link( '<div class="prev">' . __( 'Previous Post: %link', 'hybrid-base' ) . '</div>', '%title' ); ?>
		<?php next_post_link(     '<div class="next">' . __( 'Next Post: %link',     'hybrid-base' ) . '</div>', '%title' ); ?>
	</div><!-- .loop-nav -->

<?php elseif ( is_home() || is_archive() || is_search() ) : // If viewing the blog, an archive, or search results. ?>

	<?php loop_pagination(
		array( 
			'prev_text' => _x( '&larr; Previous', 'posts navigation', 'hybrid-base' ), 
			'next_text' => _x( 'Next &rarr;',     'posts navigation', 'hybrid-base' )
		) 
	); ?>

<?php endif; // End check for type of page being viewed. ?>