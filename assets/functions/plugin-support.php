<?php

function remove_acf_menu()
{

    // provide a list of usernames who can edit custom field definitions here
    $admins = array(
        'envision_SM',
    );

    // get the current user
    $current_user = wp_get_current_user();

    // match and remove if needed
    if( in_array( $current_user->user_login, $admins ) )
    {
        return true;
    }

}

add_filter('acf/settings/show_admin', 'remove_acf_menu');

//ACF Options Page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array('page_title' => 'Global Info'));
	
}

// check and return ACF field
function env_field($term, $get_field = false, $opt_page = false) {
    
    if(function_exists('get_field')) {
	if ($get_field) {
	    if ($opt_page) { 
		return get_field($term, 'option');
	    } else return get_field($term);
	}
	else if ($opt_page) { 
		return the_field($term, 'option');
	} else return the_field($term);
    }

}

// Add Google API Key for ACF map 
add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyCx_9eyYAfN7zA1DT3WDlL0Uo4Jnnp5KGw';
});

// Remove unnecessary formating options from editor 
function customformatTinyMCE($init) {
	$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6';
	return $init;
}
add_filter('tiny_mce_before_init', 'customformatTinyMCE' );

function my_mce_before_init_insert_formats( $init_array ) {

// Define the style_formats array

	$style_formats = array(
/*
* Each array child is a format with it's own settings
* Notice that each array has title, block, classes, and wrapper arguments
* Title is the label which will be visible in Formats menu
* Block defines whether it is a span, div, selector, or inline style
* Classes allows you to define CSS classes
* Wrapper whether or not to add a new block-level element around any selected elements
*/

		array(
			'title' => 'Button',
			'block' => 'a',
			'classes' => 'button',
			'wrapper' => false,
		),

	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


// For Gravity Form Tabbing
add_filter( 'gform_tabindex', '__return_false' );

// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
