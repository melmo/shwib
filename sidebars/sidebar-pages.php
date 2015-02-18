<?php
/**
 * Pages Sidebar Template
 *
 * Displays widgets for the Pages dynamic sidebar if any have been added to the sidebar through the 
 * widgets screen in the admin by the user.  Otherwise, nothing is displayed.
 *
 */

if ( is_active_sidebar( 'pages' ) ) : ?>

	<div id="sidebar-pages" class="sidebar">

		<?php dynamic_sidebar( 'pages' ); ?>

	</div><!-- #sidebar-pages -->

<?php endif; ?>