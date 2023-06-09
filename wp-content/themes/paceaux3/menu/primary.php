<?php if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>

	<nav id="menu-primary" role="navigation" aria-label="Primary Menu"  itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" class="menu menu-primary nav nav--primary">

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container'       => '',
				'menu_id'         => 'menu-primary-items',
				'menu_class'      => 'menu-items nav__list',
				'fallback_cb'     => '',
				'items_wrap'      => '<ul id="%s" class="%s">%s</ul>'
			)
		); ?>

	</nav><!-- #menu-primary -->

<?php endif; // End check for menu. ?>