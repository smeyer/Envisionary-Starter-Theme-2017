<?php
// SIDEBARS AND WIDGETIZED AREAS
function env_register_sidebars() {
	register_sidebar(array(
		'id' => 'post_sidebar',
		'name' => __('Post Sidebar', 'envision'),
		'description' => __('The sidebar for posts.', 'envision'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'page_sidebar',
		'name' => __('Page Sidebar', 'envision'),
		'description' => __('The sidebar for pages.', 'envision'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'footer',
		'name' => __('Footer', 'envision'),
		'description' => __('Column 1 of the footer.', 'envision'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'offcanvas',
		'name' => __('Offcanvas', 'envision'),
		'description' => __('The offcanvas sidebar.', 'envision'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
} // don't remove this bracket!
add_action( 'widgets_init', 'env_register_sidebars' );