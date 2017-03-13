<?php

// Theme support options
require_once(get_stylesheet_directory().'/assets/functions/theme-support.php'); 

// Plugin Functions
require_once(get_stylesheet_directory().'/assets/functions/plugin-support.php'); 

// Register scripts and stylesheets
require_once(get_stylesheet_directory().'/assets/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_stylesheet_directory().'/assets/functions/menu.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_stylesheet_directory().'/assets/functions/page-navi.php'); 

// Register sidebars/widget areas
require_once(get_stylesheet_directory().'/assets/functions/sidebars_reg.php'); 

// Makes WordPress comments suck less
//require_once(get_stylesheet_directory().'/assets/functions/comments.php'); 

// CUSTOM POST TYPES

// Adds the resource custom post type
//require_once(get_stylesheet_directory().'/assets/functions/resources-post-type.php');

// Adds the news custom post type
//require_once(get_stylesheet_directory().'/assets/functions/news-post-type.php'); 

// Adds the event custom post type
//require_once(get_stylesheet_directory().'/assets/functions/events-post-type.php'); 

// Adds the staff custom post type
//require_once(get_stylesheet_directory().'/assets/functions/staff-post-type.php');