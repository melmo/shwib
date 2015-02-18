<?php
/**
 * Primary Menu Template
 *
 * Displays the Primary Menu if it has active menu items.
 *
 */

if ( has_nav_menu( 'primary' ) ) : ?>

		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'menu_id' => 'menu-primary-items', 'fallback_cb' => '' ) ); ?>

<?php endif; ?>