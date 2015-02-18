<?php
/**
 * Subsidiary Menu Template
 *
 * Displays the Subsidiary Menu if it has active menu items.
 *
 */

if ( has_nav_menu( 'subsidiary' ) ) : ?>

		<?php wp_nav_menu( array( 'theme_location' => 'subsidiary', 'container' => false, 'menu_class' => 'nav', 'menu_id' => 'menu-subsidiary-items', 'fallback_cb' => '' ) ); ?>

<?php endif; ?>