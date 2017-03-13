<div class="off-canvas position-right" id="off-canvas" data-off-canvas data-position="right">
	<nav role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'env' ); ?>">
	<?php 
		wp_nav_menu(array(
			'container' => false, 				// Remove nav container
			'menu' => __( 'The Main Menu', 'env' ),
			'menu_class' => 'vertical menu',       		// Adding custom nav class
			'items_wrap' => '<ul id="%1$s" class="%2$s" data-drilldown>%3$s</ul>',
			'theme_location' => 'main-nav',        		// Where it's located in the theme
			'depth' => 3,                                   // Limit the depth of the nav
		));
		if ( is_active_sidebar( 'offcanvas' ) ) {
			dynamic_sidebar( 'offcanvas' );
		}
	?>
	</nav>
</div>