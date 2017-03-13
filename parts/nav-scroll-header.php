<header id="scrollheader" role="banner">
    <div class="top-bar row">
        <div class="large-12 medium-12 columns">
            <div class="top-bar-left float-left">
              <?php if( is_front_page()){
                  $h = 'h1';
              } else {
                  $h = 'h2';
              }
              echo '<a href="' . esc_url(get_bloginfo('url')) . '" rel="home" id="logo"><'. $h .'><img alt="' . esc_url(get_bloginfo('name')) . '" src="' . get_template_directory_uri() . '/assets/images/logo.svg" /></'. $h .'></a>';
              ?>
            </div>
            <nav role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'env' ); ?>" class="top-bar-right">
                <?php wp_nav_menu(array(
                    'container' => false,                           // Remove nav container
                    'menu_class' => 'vertical medium-horizontal menu',       // Adding custom nav class
                    'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
                    'theme_location' => 'main-nav',        			// Where it's located in the theme
                    'depth' => 3,                                   // Limit the depth of the nav
                )); ?>	
            </nav>
        </div>
    </div>
</header>