<?php 
if ( !defined('ABSPATH')) exit;

// ACF DECLARATION

add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    $path = get_template_directory() . '/assets/acf/';
	return $path;    
}

add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    $dir = get_template_directory_uri() . '/assets/acf/';
    return $dir;
}

include_once( get_template_directory() . '/assets/acf/acf.php' );
//include_once( get_stylesheet_directory() . '/assets/acf/acf.php' );

// TABS FOR OPTION THEME
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Slider Options',
		'menu_title'	=> 'Slider Options',
		'parent_slug'	=> 'theme-general-settings',
    ));
    
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Beam Options',
		'menu_title'	=> 'Beam Options',
		'parent_slug'	=> 'theme-general-settings',
	));    

	
}

//SAVE ACF FIELDS
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_template_directory() . '/assets/acf/acf-json';
    return $path;
}

//LOADS ACF FIELDS
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_template_directory() . '/assets/acf/acf-json';
        return $paths;
}


//ENABLE THIS AFTER DEVELOPMENT WAS DONE
//add_filter('acf/settings/show_admin', '__return_false');


