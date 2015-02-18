<?php
/**
 * Posts After Singular Template
 *
 * Displays widgets for the After Singular dynamic sidebar if any have been added to the sidebar through the 
 * widgets screen in the admin by the user.  Otherwise, nothing is displayed.
 *
 */

if ( is_active_sidebar( 'after-singular' ) ) : ?>

	<div id="sidebar-after-singular" class="sidebar">

		<?php dynamic_sidebar( 'after-singular' ); ?>

	</div><!-- #sidebar-after-singular -->

<?php endif; ?>