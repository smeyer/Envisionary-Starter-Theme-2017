<?php
	
// Adding WP Functions & Theme Support
function ec_theme_support() {

    // Add WP Thumbnail Support
    add_theme_support( 'post-thumbnails' );
    
    // Default thumbnail size
    set_post_thumbnail_size(125, 125, true);

    // Add RSS Support
    add_theme_support( 'automatic-feed-links' );
    
    // Add Support for WP Controlled Title Tag
    add_theme_support( 'title-tag' );
    
    // Add HTML5 Support
    add_theme_support( 'html5', 
	     array( 
		    'comment-list', 
		    'comment-form', 
		    'search-form', 
	     ) 
    );
    
    add_image_size( 'maxwidth', 2500, 9999, false );
	
    add_action('init', 'env_head_cleanup');
	
} // end theme support 
add_action( 'after_setup_theme', 'ec_theme_support' );


//The default wordpress head is a mess. Let's clean it up by removing all the junk we don't need.
function env_head_cleanup() {
    // Remove WP version
    remove_action( 'wp_head', 'wp_generator' );
    // Remove EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // Remove Windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // Remove emoji code
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    // Remove REST API link
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    remove_action('rest_api_init', 'wp_oembed_register_route');
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    // Remove category feeds
    //remove_action( 'wp_head', 'feed_links_extra', 3 );
    // Remove post and comment feeds
    //remove_action( 'wp_head', 'feed_links', 2 );
    // Remove Shortlink
    // remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 ); 
    // Remove index link
    //remove_action( 'wp_head', 'index_rel_link' );
    // Remove previous link
    //remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // Remove start link
    //remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // Remove links for adjacent posts
    //remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    
}


// Remove Admin Bar on front
add_filter('show_admin_bar', '__return_false');


/* Admin clean-up 
function remove_menu_items() {
  global $menu;
  $restricted = array(__('Posts'), __('Comments'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
      unset($menu[key($menu)]);}
    }
  }
add_action('admin_menu', 'remove_menu_items');*/


//  Stop WordPress from using the sticky class (which conflicts with Foundation), and style WordPress sticky posts using the .wp-sticky class instead
function remove_sticky_class($classes) {
	if(in_array('sticky', $classes)) {
		$classes = array_diff($classes, array("sticky"));
		$classes[] = 'wp-sticky';
	}
	
	return $classes;
}
add_filter('post_class','remove_sticky_class');


// Add page sizes for images
function setup_image_sizes() {
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'page-fullwidth-image', 2500, 9999, false );
		add_image_size( 'page-cwidth-image', 1100, 9999, false );
	}
}
add_action( 'init', 'setup_image_sizes' );


// Add images sizes to media library dropdown
function env_image_sizes($sizes){
	$custom_sizes = array(
		'page-fullwidth-image' => 'Page Full-Width Image',
		'page-cwidth-image' => 'Page Content-Width Image'
	);
	return array_merge( $sizes, $custom_sizes );
}
add_filter('image_size_names_choose', 'env_image_sizes');


// Remove margin around images with captions
function remove_caption_padding( $width ) {
	return $width - 10;
}
add_filter( 'img_caption_shortcode_width', 'remove_caption_padding' );


// Add styles for page header and page footer to wp_head
function env_add_banner_styles() {
	global $post;
	if(function_exists('get_field')) {
		$header_type = get_field('header_type', $post->ID);
		$default_header = get_field('default_global_header', 'option');
		if (get_field('header_image', $post->ID) && $header_type === "custom") {
			$banner_imgurl = get_field('header_image', $post->ID); 
		} else if($default_header === "yes") {
			$banner_imgurl = get_field('page_header_default_image', 'option');
		}
		if (get_field('space_from_top', $post->ID) !== "" && $header_type === "custom") {
			$banner_fromtop = get_field('space_from_top', $post->ID);
		} else if($default_header === "yes") {
			$banner_fromtop = get_field('page_header_text_space_from_top', 'option');
		}
		if (get_field('space_from_left', $post->ID) !== "" && $header_type === "custom") {
			$banner_fromleft = get_field('space_from_left', $post->ID);
		} else if($default_header === "yes") {
			$banner_fromleft = get_field('page_header_text_space_from_left', 'option');
		}
		//if (get_field('space_from_bottom', $post->ID)) { $banner_frombtm = get_field('space_from_bottom', $post->ID); } else { $banner_frombtm = get_field('page_header_text_space_from_bottom', 'option'); }
		if (get_field('header_text_width', $post->ID) && $header_type === "custom") {
			$banner_text_width = get_field('header_text_width', $post->ID);
		} else if($default_header === "yes") {
			$banner_text_width = get_field('page_header_text_width', 'option');
		}
		$banner_text_color = get_field('page_header_text_color', 'option');
		$center_banner_text = get_field('center_banner_text', $post->ID);
		if ($center_banner_text === 'yes' && $header_type === "custom") {
			$banner_text_center = $center_banner_text;
			$center_override = "yes";
		} else if($default_header === "yes" && $header_type === 'default') {
			$banner_text_center = get_field('page_header_center_text', 'option');
			if ($banner_text_center === "yes") { $center_override = "yes"; } else { $center_override = "no"; }
		}
		if ($center_banner_text === 'no' && $header_type === "custom") { $center_override = "no"; }
		if (get_field('space_from_top', $post->ID) != "" || get_field('space_from_left', $post->ID) != "" || get_field('space_from_bottom', $post->ID) != "") {
			$local_override = "yes";
		} else {
			$local_override = "no";
		}
		if (get_field('header_height', $post->ID) && $header_type === "custom") { $banner_height = get_field('header_height', $post->ID); } else { $banner_height = get_field('page_header_height', 'option'); }
		
		$footer_type = get_field('page_footer_type', $post->ID);
		$default_footer = get_field('default_global_footer', 'option');
		if (get_field('footer_image', $post->ID) && $footer_type === "custom") {
			$footer_banner_imgurl = get_field('footer_image', $post->ID); 
		} else if($default_footer === "yes") {
			$footer_banner_imgurl = get_field('page_footer_default_image', 'option');
		}
		if (get_field('footer_space_from_top', $post->ID) !== "" && $footer_type === "custom") {
			$footer_banner_fromtop = get_field('footer_space_from_top', $post->ID);
		} else if($default_footer === "yes") {
			$footer_banner_fromtop = get_field('page_footer_text_space_from_top', 'option');
		}
		if (get_field('footer_space_from_left', $post->ID) !== "" && $footer_type === "custom") {
			$footer_banner_fromleft = get_field('footer_space_from_left', $post->ID);
		} else if($default_footer === "yes") {
			$footer_banner_fromleft = get_field('page_footer_text_space_from_left', 'option');
		}
		//if (get_field('space_from_bottom', $post->ID)) { $banner_frombtm = get_field('space_from_bottom', $post->ID); } else { $banner_frombtm = get_field('page_footer_text_space_from_bottom', 'option'); }
		if (get_field('footer_text_width', $post->ID) && $footer_type === "custom") {
			$footer_banner_text_width = get_field('footer_text_width', $post->ID);
		} else if($default_footer === "yes") {
			$footer_banner_text_width = get_field('page_footer_text_width', 'option');
		}
		$footer_banner_text_color = get_field('page_footer_text_color', 'option');
		$footer_center_banner_text = get_field('footer_center_banner_text', $post->ID);
		if ($footer_center_banner_text === 'yes' && $footer_type === "custom") {
			$footer_banner_text_center = $footer_center_banner_text;
			$footer_center_override = "yes";
		} else if($default_footer === "yes" && $footer_type === 'default') {
			$footer_banner_text_center = get_field('page_footer_center_text', 'option');
			if ($footer_banner_text_center === "yes") { $footer_center_override = "yes"; } else { $footer_center_override = "no"; }
		}
		if ($footer_center_banner_text === 'no' && $footer_type === "custom") { $footer_center_override = "no"; }
		if (get_field('footer_space_from_top', $post->ID) != "" || get_field('footer_space_from_left', $post->ID) != "" || get_field('footer_space_from_bottom', $post->ID) != "") {
			$footer_local_override = "yes";
		} else {
			$footer_local_override = "no";
		}
		if (get_field('footer_height', $post->ID) && $footer_type === "custom") { $footer_banner_height = get_field('footer_height', $post->ID); } else { $footer_banner_height = get_field('page_footer_height', 'option'); }
		?>
<style>
	#page_header #header_text {
		<?php if ($banner_text_width) { echo 'width: ' . $banner_text_width . '; '; }
		if ($center_override != "yes") {
			if ($banner_fromtop !== "" && $banner_imgurl) { echo 'top: ' . $banner_fromtop . '; '; }
			//if ($banner_frombtm && $banner_imgurl) { echo 'bottom: ' . $banner_frombtm . '; '; }
			if ($banner_fromtop !== "" && !$banner_imgurl) { echo 'margin-top: ' . $banner_fromtop . '; '; }
			//if ($banner_frombtm && !$banner_imgurl && $local_override == "yes") { echo 'margin-bottom: ' . $banner_frombtm . '; '; }
			if ($banner_fromleft !== "" && $banner_text_width !== "100%") { echo 'left: ' . $banner_fromleft . '; '; }
				else if ($banner_fromleft !== "") { echo 'padding-left: ' . $banner_fromleft . ';'; }
		}
		if (($center_override == 'yes') || ( $banner_text_center == "yes" && $local_override == "no")) {
			echo 'text-align: center;';
		}
		if ($banner_text_color) { echo 'color: ' . $banner_text_color . '; '; } ?>
	}
	<?php if (($center_override == 'yes') || ( $banner_text_center == "yes" && $local_override == "no")) { ?>
		@media screen and (min-width: 640px) {
			#page_header.with_bg #header_text {
				top: 50%; transform: translateY(-50%); position: absolute;
			}
		}
	<?php } ?>
	<?php if($banner_height) { ?>
		#page_header .row, #page_header.with_bg .row { min-height: <?php echo $banner_height*0.7; ?>px; } @media screen and (min-width: 640px) { #page_header .row, #page_header.with_bg .row { min-height: <?php echo $banner_height; ?>px; } }
	<?php }
	if (($center_override == 'yes') || ( $banner_text_center == "yes" && $local_override == "no")) { ?>
		#header_text h1, #header_text h2, #header_text h3, #header_text h4, #header_text h5, #header_text h6, #header_text p, #header_text div { text-align: center!important; <?php echo $banner_text_color ?> }
	<?php } else if($banner_text_color) { ?>
		#header_text h1, #header_text h2, #header_text h3, #header_text h4, #header_text h5, #header_text h6, #header_text p, #header_text div { <?php echo $banner_text_color ?> }
	<?php } ?>
		#header_text a { <?php echo $banner_text_color ?> text-decoration: underline; }
	
	#page_footer #footer_text {
		<?php if ($banner_text_width) { echo 'width: ' . $banner_text_width . '; '; }
		if ($center_override != "yes") {
			if ($footer_banner_fromtop !== "" && $footer_banner_imgurl) { echo 'top: ' . $footer_banner_fromtop . '; '; }
			//if ($banner_frombtm && $banner_imgurl) { echo 'bottom: ' . $banner_frombtm . '; '; }
			if ($footer_banner_fromtop !== "" && !$footer_banner_imgurl) { echo 'margin-top: ' . $footer_banner_fromtop . '; '; }
			//if ($banner_frombtm && !$banner_imgurl && $local_override == "yes") { echo 'margin-bottom: ' . $banner_frombtm . '; '; }
			if ($footer_banner_fromleft !== "" && $footer_banner_text_width !== "100%") { echo 'left: ' . $footer_banner_fromleft . '; '; }
				else if ($footer_banner_fromleft !== "") { echo 'padding-left: ' . $footer_banner_fromleft . ';'; }
		}
		if (($footer_center_override == 'yes') || ( $footer_banner_text_center == "yes" && $footer_local_override == "no")) {
			echo 'text-align: center;';
		}
		if ($footer_banner_text_color) { echo 'color: ' . $footer_banner_text_color . '; '; } ?>
	}
	<?php if (($footer_center_override == 'yes') || ( $footer_banner_text_center == "yes" && $footer_local_override == "no")) { ?>
		@media screen and (min-width: 640px) {
			#page_footer.with_bg #footer_text {
				top: 50%; transform: translateY(-50%); position: absolute;
			}
		}
	<?php } ?>
	<?php if($footer_banner_height) { ?>
		#page_footer .row, #page_footer.with_bg .row { min-height: <?php echo $footer_banner_height*0.7; ?>px; } @media screen and (min-width: 640px) { #page_footer .row, #page_footer.with_bg .row { min-height: <?php echo $footer_banner_height; ?>px; } }
	<?php }
	if (($footer_center_override == 'yes') || ( $footer_banner_text_center == "yes" && $footer_local_override == "no")) { ?>
		#footer_text h1, #footer_text h2, #footer_text h3, #footer_text h4, #footer_text h5, #footer_text h6, #footer_text p, #footer_text div { text-align: center!important; <?php echo $footer_banner_text_color ?> }
	<?php } else if($footer_banner_text_color) { ?>
		#footer_text h1, #footer_text h2, #footer_text h3, #footer_text h4, #footer_text h5, #footer_text h6, #footer_text p, #footer_text div { <?php echo $footer_banner_text_color ?> }
	<?php } ?>
		#footer_text a { <?php echo $footer_banner_text_color ?> text-decoration: underline; }
</style>
		<?php 
	}
}
add_action("wp_head", "env_add_banner_styles");


// Remove author link from the_author_posts_link()
function env_get_the_author_posts_link() {
    global $authordata;
    if ( !is_object( $authordata ) )
	    return false;
    $link = sprintf(
	    '%1$s',
	    get_the_author()
    );
    return $link;
}


// Change Excerpt length 
function custom_excerpt_length( $length ) {
	if (is_front_page()) { return 25; }
	else return 48;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Change Excerpt "more" link 
function new_excerpt_more($more) {
    global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="more">&#8230;more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Sets default link in drop down to none
function env_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'env_imagelink_setup', 10);


// Use the first image in the post if no featured image
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){ //Defines a default image
    $first_img = "";
  }
  return $first_img;
}


/*
 
// Remove injected CSS for recent comments widget
function joints_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// Remove injected CSS from recent comments widget
function joints_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// Remove injected CSS from gallery
function joints_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

*/
