<?php
/**
 * Primary Menu Template
 *
 * Displays the Primary Menu if it has active menu items.
 *
 */

if ( has_nav_menu( 'primary' ) ) : ?>
	<?php do_atomic( 'before_menu_primary' ); // prototype_before_menu_primary ?>
	
		<?php do_atomic( 'open_menu_primary' ); // prototype_open_menu_primary ?>

		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'menu_id' => 'menu-primary-items', 'fallback_cb' => '' ) ); ?>

		<?php do_atomic( 'close_menu_primary' ); // prototype_close_menu_primary ?>
    
    <?php do_atomic( 'after_menu_primary' ); // prototype_after_menu_primary ?>
<?php endif; ?>