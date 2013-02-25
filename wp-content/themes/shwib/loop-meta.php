<?php
/**
 * Loop Meta Template
 *
 * Displays information at the top of the page on blog page views.
 *
 */
	if ( is_author() ) {

		$id = get_query_var( 'author' );
		$author_desc = apply_atomic( 'loop_meta_description',  get_the_author_meta( 'description', $id ) ); // shwib_loop_meta_description  ?>

		<div id="hcard-<?php the_author_meta( 'user_nicename', $id ); ?>" class="loop-meta vcard">

			<h1 class="loop-title fn n"><?php echo apply_atomic( 'loop_meta_title', get_the_author_meta( 'display_name', $id ) ); // shwib_loop_meta_title ?></h1>

			<div class="loop-description">
				<?php echo apply_atomic( 'loop_meta_avatar', get_avatar( get_the_author_meta( 'user_email', $id ), '100', '', get_the_author_meta( 'display_name', $id ) ) ); // shwib_loop_meta_avatar ?>

				<?php if ( !empty( $author_desc ) ) : ?>
				<p class="user-bio">
					<?php echo $author_desc; ?>
				</p><!-- .user-bio -->
				<?php endif; ?>
			</div><!-- .loop-description -->

		</div><!-- .loop-meta -->

	<?php }

	elseif ( !is_front_page() ) { ?>

			<div class="loop-meta">

				<?php echo shwib_loop_meta_title(); // shwib_loop_meta_title ?>

				<?php echo shwib_loop_meta_description(); // shwib_loop_meta_description ?>

			</div><!-- .loop-meta -->

	<?php } ?>