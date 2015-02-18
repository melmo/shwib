<?php
/**
 * Posts Sidebar Template
 *
 * Displays widgets for the Posts dynamic sidebar if any have been added to the sidebar through the 
 * widgets screen in the admin by the user.  Otherwise, nothing is displayed.
 *
 */

if ( is_active_sidebar( 'posts' ) ) : ?>

	<div id="sidebar-posts" class="sidebar">

		<?php dynamic_sidebar( 'posts' ); ?>

	</div><!-- #sidebar-posts -->

<?php endif; ?>