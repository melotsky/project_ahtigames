<?php 
if ( !defined('ABSPATH')) exit;

/************************************/
// CREATE CPT PROJECTS / START
/************************************/

function my_custom_post_jackpot() {
	$labels = array(
		'name'               => _x( 'Jackpot Games', 'post type general name' ),
		'singular_name'      => _x( 'Jackpot Games', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Jackpot Game' ),
		'add_new_item'       => __( 'Add New Jackpot Game' ),
		'edit_item'          => __( 'Edit Jackpot Game' ),
		'new_item'           => __( 'New Jackpot Game' ),
		'all_items'          => __( 'All Jackpot Games' ),
		'view_item'          => __( 'View Jackpot Games' ),
		'search_items'       => __( 'Search Jackpot Games' ),
		'not_found'          => __( 'No Jackpot Games found' ),
		'not_found_in_trash' => __( 'No Jackpot Games found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Jackpot Games'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Jackpot Games only',
		'public'        => true, // make it false if you would like to unaccessible outside...

//		"show_in_rest" => false,		
		"publicly_queryable" => false,
//		"show_ui" => true,
//		"rest_base" => "",
		
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-filter',
		'rewrite' => array( 'slug' => 'jackpot-games' )
	);
	register_post_type( 'jackpot-games', $args );	
}
//add_action( 'init', 'my_custom_post_jackpot' );


function my_custom_post_roulette() {
	$labels = array(
		'name'               => _x( 'Roulettes', 'post type general name' ),
		'singular_name'      => _x( 'Roulettes', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Roulette' ),
		'add_new_item'       => __( 'Add New Roulette' ),
		'edit_item'          => __( 'Edit Roulette' ),
		'new_item'           => __( 'New Roulette' ),
		'all_items'          => __( 'All Roulettes' ),
		'view_item'          => __( 'View Roulettes' ),
		'search_items'       => __( 'Search Roulettes' ),
		'not_found'          => __( 'No Roulettes found' ),
		'not_found_in_trash' => __( 'No Roulettes found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Roulettes'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Roulettes only',
		'public'        => true, // make it false if you would like to unaccessible outside...

//		"show_in_rest" => false,		
		"publicly_queryable" => false,
//		"show_ui" => true,
//		"rest_base" => "",
		
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-filter',
		'rewrite' => array( 'slug' => 'roulettes' )
	);
	register_post_type( 'roulettes', $args );	
}
//add_action( 'init', 'my_custom_post_roulette' );


function my_custom_post_slots() {
	$labels = array(
		'name'               => _x( 'Slots', 'post type general name' ),
		'singular_name'      => _x( 'Slots', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Slot' ),
		'add_new_item'       => __( 'Add New Slot' ),
		'edit_item'          => __( 'Edit Slot' ),
		'new_item'           => __( 'New Slot' ),
		'all_items'          => __( 'All Slots' ),
		'view_item'          => __( 'View Slots' ),
		'search_items'       => __( 'Search Slots' ),
		'not_found'          => __( 'No Slots found' ),
		'not_found_in_trash' => __( 'No Slots found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Slots'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Slots only',
		'public'        => true, // make it false if you would like to unaccessible outside...

//		"show_in_rest" => false,		
		"publicly_queryable" => false,
//		"show_ui" => true,
//		"rest_base" => "",
		
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-flip-horizontal',
		'rewrite' => array( 'slug' => 'slots' )
	);
	register_post_type( 'slots', $args );	
}
//add_action( 'init', 'my_custom_post_slots' );



function my_custom_post_cardgames() {
	$labels = array(
		'name'               => _x( 'Card Games', 'post type general name' ),
		'singular_name'      => _x( 'Card Games', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Card Game' ),
		'add_new_item'       => __( 'Add New Card Game' ),
		'edit_item'          => __( 'Edit Card Game' ),
		'new_item'           => __( 'New Card Game' ),
		'all_items'          => __( 'All Card Games' ),
		'view_item'          => __( 'View Card Games' ),
		'search_items'       => __( 'Search Card Games' ),
		'not_found'          => __( 'No Card Games found' ),
		'not_found_in_trash' => __( 'No Card Games found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Card Games'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Card Games only',
		'public'        => true, // make it false if you would like to unaccessible outside...

//		"show_in_rest" => false,		
		"publicly_queryable" => false,
//		"show_ui" => true,
//		"rest_base" => "",
		
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'cardgames' )
	);
	register_post_type( 'cardgames', $args );	
}
//add_action( 'init', 'my_custom_post_cardgames' );


function create_my_taxonomies_for_projects() {
		register_taxonomy('projects_category', 'projects', array(
		'hierarchical' => true, 'label' => 'Project Category',
		'query_var' => true, 'rewrite' => true));
        
}
//add_action('init', 'create_my_taxonomies_for_projects', 0);

/************************************/
// CREATE CPT PROJECTS / START
/************************************/


/** TESTIMONIAL CPT */
function my_custom_post_testimonial() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name' ),
		'singular_name'      => _x( 'Testimonials', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Testimonial' ),
		'add_new_item'       => __( 'Add New Testimonial' ),
		'edit_item'          => __( 'Edit Testimonial' ),
		'new_item'           => __( 'New Testimonial' ),
		'all_items'          => __( 'All Testimonials' ),
		'view_item'          => __( 'View Testimonials' ),
		'search_items'       => __( 'Search Testimonials' ),
		'not_found'          => __( 'No Testimonials found' ),
		'not_found_in_trash' => __( 'No Testimonials found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Testimonials only',
		'public'        => true, // make it false if you would like to unaccessible outside...

//		"show_in_rest" => false,		
		"publicly_queryable" => false,
//		"show_ui" => true,
//		"rest_base" => "",
		
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-admin-users',
		'rewrite' => array( 'slug' => 'testimonials' )
	);
	register_post_type( 'testimonials', $args );	
}
add_action( 'init', 'my_custom_post_testimonial' );






/** TESTIMONIAL CPT */
function my_custom_post_pearl() {
	$labels = array(
		'name'               => _x( 'Pearl Score', 'post type general name' ),
		'singular_name'      => _x( 'Pearl Scores', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Pearl Score' ),
		'add_new_item'       => __( 'Add New Pearl Score' ),
		'edit_item'          => __( 'Edit Pearl Score' ),
		'new_item'           => __( 'New Pearl Score' ),
		'all_items'          => __( 'All Pearl Scores' ),
		'view_item'          => __( 'View Pearl Scores' ),
		'search_items'       => __( 'Search Pearl Scores' ),
		'not_found'          => __( 'No Pearl Scores found' ),
		'not_found_in_trash' => __( 'No Pearl Scores found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Pearl Scores'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Pearl Scores only',
		'public'        => true, // make it false if you would like to unaccessible outside...

//		"show_in_rest" => false,		
		"publicly_queryable" => false,
//		"show_ui" => true,
//		"rest_base" => "",
		
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-admin-users',
		'rewrite' => array( 'slug' => 'pearl-score' )
	);
	register_post_type( 'pearl-score', $args );	
}
//add_action( 'init', 'my_custom_post_pearl' );