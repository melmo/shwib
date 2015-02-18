<?php
/**
 * Secondary Menu Template
 *
 * Displays the Secondary Menu if it has active menu items.
 *
 */

if ( has_nav_menu( 'secondary' ) ) : ?>

		<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => 'nav', 'menu_id' => 'menu-secondary-items', 'fallback_cb' => '' ) ); ?>

<?php endif; ?>