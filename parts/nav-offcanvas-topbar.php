<div class="top-bar row" id="top-bar-menu">
	<div class="columns small-12">
		<div class="top-bar-left">
			<?php if( is_front_page()){
				$h = 'h1';
			} else {
				$h = 'h2';
			}
			echo '<a href="' . esc_url(get_bloginfo('url')) . '" rel="home" id="logo"><'. $h .'><img alt="' . esc_url(get_bloginfo('name')) . '" src="' . get_template_directory_uri() . '/assets/images/logo.svg" /></'. $h .'></a>';
			?>
		</div>
		<nav role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'env' ); ?>" class="top-bar-right show-for-large">
			<?php wp_nav_menu(array(
				'container' => false,                           // Remove nav container
				'menu_class' => 'vertical medium-horizontal menu',       // Adding custom nav class
				'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
				'theme_location' => 'main-nav',        			// Where it's located in the theme
				'depth' => 3,                                   // Limit the depth of the nav
				'fallback_cb' => false,                         // Fallback function (see below)
			)); ?>	
		</nav>
		<div class="menu-toggle hide-for-large">
			<ul class="menu toggle-icon">
				<li><a href="#" data-toggle="off-canvas"><button class="menu-icon"></button></a></li>
			</ul>
		</div>
	</div>
</div>