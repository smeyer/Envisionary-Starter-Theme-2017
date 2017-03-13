<?php
// Register menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu', 'env' ),   // Main nav in header
		'mobile-nav' => __( 'The Mobile Menu', 'env' ),   // Mobile nav in header
		'footer-bav' => __( 'Footer Menu', 'env' ) // Secondary nav in footer
	)
);

/*

// The Top Menu
function joints_top_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'vertical medium-horizontal menu',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
        'theme_location' => 'main-nav',        			// Where it's located in the theme
        'depth' => 3,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        //'walker' => new Topbar_Menu_Walker()
    ));
} 

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}

// The Off Canvas Menu
function joints_off_canvas_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'vertical menu',       		// Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
        'theme_location' => 'main-nav',        		// Where it's located in the theme
        'depth' => 3,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        //'walker' => new EC_Menu_Walker()
    ));
} 

class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu\">\n";
    }
}

// The Footer Menu
function joints_footer_links() {
    wp_nav_menu(array(
    	'container' => 'false',                         // Remove nav container
    	'menu' => __( 'Footer Links', 'env' ),   	// Nav name
    	'menu_class' => 'menu',      			// Adding custom nav class
    	'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
    	'fallback_cb' => ''  							// Fallback function
	));
} // End Footer Menu

// Header Fallback Menu
function joints_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => '',      			// Adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                           // Before each link
        'link_after' => ''                             // After each link
	) );
}

// Footer Fallback Menu
function joints_footer_links_fallback() {
	// You can put a default here if you like 
}

// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );

// Check if page is a child 
function env_is_subpage() {
	global $post;
	if ( is_page() && $post->post_parent ) {
		$parentID = $post->post_parent;
		return $parentID;
	} else {
		return false;
	};
}

// display submenu 
function env_display_subpages()
{
	global $post;
	$ancestor = $post->ancestors[1];
	$ancestor2 = $post->ancestors[2];
	$ancestor3 = $post->ancestors[3];
	if($post->post_parent && $ancestor3) { $main_par = $ancestor3; }
	else if($post->post_parent && $ancestor2) { $main_par = $ancestor2; }
	else if($post->post_parent && $ancestor) { $main_par = $ancestor; }
	else if($post->post_parent) { $main_par = $post->post_parent; }
	else { $main_par = $post->ID; }
	$children = preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a$2><span>$3</span></a>', wp_list_pages("title_li=&child_of=".$main_par."&echo=0&depth=4"));
	if ($children) { ?>
	<div class="widget subnav">
		<h4 class="widgettitle clear <?php if (!$children) { ?>nochild<?php } ?>"><a href="<?php echo get_permalink($main_par); ?>"><?php echo get_the_title($main_par); ?></a></h4>
		<?php  ?>
		<ul id="subnav" class="menu">
		<?php echo $children; ?>
		</ul><!--subnav-->
	</div><!-- widget-->
	<?php }
} 

// display specific page's submenu 
function env_display_spec_subpages($parent_ID)
{
	$ancestors = get_post_ancestors( $parent_ID );
	$ancestor = $ancestors[0];
	$ancestor2 = $ancestors[1];
	$ancestor3 = $ancestors[2];
	if($ancestor3) { $main_par = $ancestor3; }
	else if($ancestor2) { $main_par = $ancestor2; }
	else if($ancestor) { $main_par = $ancestor; }
	else { $main_par = $parent_ID;  }
	$children = preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a$2><span>$3</span></a>', wp_list_pages("title_li=&child_of=".$main_par."&echo=0&depth=4"));
	if ($children) { ?> 
	<li class="widget subnav">
		<h2 class="widgettitle clear"><a href="<?php echo get_permalink($main_par); ?>"><?php echo get_the_title($main_par); ?></a></h2>
		<?php if ($children) { ?>
		<ul id="subnav" class="widget_inside">
		<?php echo $children; ?>
		</ul><!--subnav-->
		<?php } ?>
	</li><!-- widget--> 
	<?php } else { ?>
	<li class="widget subnav">
		<h2 class="widgettitle clear nochild"><a href="<?php echo get_permalink($parent_ID); ?>"><?php echo '&larr; Back to ' . get_the_title($parent_ID); ?></a></h2>
	</li><!-- widget--> 
	<?php }
}

*/