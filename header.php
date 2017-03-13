<!doctype html>

<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">		
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Icons & Favicons -->
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">
	<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	<meta name="theme-color" content="#121212">
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	
	<?php wp_head(); ?>
	
	<noscript>
	  <style>#wrapper { opacity: 1; }</style>
	</noscript>

</head>
	
<body <?php body_class('preload'); ?>>

  <noscript><?php _e("Your browser does not support JavaScript! Please enable Javascript to view this site as it is intended.", "env"); ?></noscript>
  
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'env' ); ?></a>

  <div id="wrapper" class="off-canvas-wrapper load-with-js with-menu"> <!-- REMOVE "with-menu" if not using nav-offcanvas-topbar -->
	  
	<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		
	  <?php get_template_part( 'parts/content', 'offcanvas' ); ?>
	  
	  <div class="off-canvas-content" data-off-canvas-content>
		
		<!-- shorter fixed header that slides in on scroll - remove this line and _scrollheader.scss if not wanted -->
		<?php  get_template_part( 'parts/nav', 'scroll-header' ); ?>
		  
		<header id="header" role="banner">
				
		  <?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?> <!-- nav-offcanvas also available -->

		</header> <!-- end .header -->
		
		<main role="main" itemscope <?php if (is_page) { ?>itemtype="http://schema.org/WebPage"<?php } else if (is_home() || is_single()) { ?>itemtype="http://schema.org/Blog"<?php } else if (is_search()) { ?>itemtype="http://schema.org/SearchResultsPage"<?php } ?>>
    
		<?php if(env_field('header_type', true) !== "none" && !is_search()) { get_template_part( 'parts/content', 'page-header' ); } ?>