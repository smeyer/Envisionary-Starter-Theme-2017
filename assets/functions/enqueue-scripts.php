<?php
function site_scripts() {
    
    global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    
    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/vendor/foundation.min.js', array( 'jquery' ), '6.2', true );
    
    // Add html5shiv
    wp_enqueue_script( 'htmlshiv', get_template_directory_uri() . '/assets/js/html5shiv.js' );
    
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts-min.js', array( 'jquery' ), '', true );
    
    // Register main theme stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );

    // Register post-sass theme stylesheet
    //wp_enqueue_style( 'custom-site-css', get_template_directory_uri() . '/assets/css/post_scss_styles.min.css', array(), '', 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);