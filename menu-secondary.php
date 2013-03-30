<?php
/**
 * Secondary Menu Template
 *
 * Displays the Secondary Menu if it has active menu items.
 *
 */

if ( has_nav_menu( 'secondary' ) ) : ?>
	<?php do_atomic( 'before_menu_secondary' ); // prototype_before_menu_primary ?>
	
		<?php do_atomic( 'open_menu_secondary' ); // prototype_open_menu_primary ?>

		<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => 'nav', 'menu_id' => 'menu-secondary-items', 'fallback_cb' => '' ) ); ?>

		<?php do_atomic( 'close_menu_secondary' ); // prototype_close_menu_primary ?>
    
    <?php do_atomic( 'after_menu_secondary' ); // prototype_after_menu_primary ?>
<?php endif; ?>