<?php
/**
 * Subsidiary Sidebar Template
 *
 * Displays widgets for the Subsidiary dynamic sidebar if any have been added to the sidebar through the 
 * widgets screen in the admin by the user.  Otherwise, nothing is displayed.
 *
 */

if ( is_active_sidebar( 'subsidiary' ) ) : ?>

	<div id="sidebar-subsidiary" class="sidebar">

		<?php dynamic_sidebar( 'subsidiary' ); ?>

	</div><!-- #sidebar-subsidiary -->

<?php endif; ?>