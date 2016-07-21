<?php
/**
 * Loop Meta Template
 *
 * Displays information at the top of the page on blog page views.
 *
 */
?>


<?php if (!is_home()) { ?>
	<div class="archive-title">
		<div <?php hybrid_attr( 'loop-meta' ); ?>>

			<h1 <?php hybrid_attr( 'loop-title' ); ?>><?php the_archive_title(); ?></h1>

		</div><!-- .loop-meta -->
	</div>
<?php } ?>