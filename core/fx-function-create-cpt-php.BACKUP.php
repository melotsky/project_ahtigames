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
add_action( 'init', 'my_custom_post_jackpot' );


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
add_action( 'init', 'my_custom_post_roulette' );


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
add_action( 'init', 'my_custom_post_slots' );



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
add_action( 'init', 'my_custom_post_cardgames' );


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



 





function gaming_provider_menu() {
	
	/* 
	
	add_menu_page(
		string   $page_title, 
		string   $menu_title, 
		string   $capability, 
		string   $menu_slug, 
		callable $function = '', 
		string   $icon_url = '', 
		int      $position = null 
	)
	
	*/
	
	add_menu_page(
		esc_html__('Game Providers', 'ahti_lang'),
		esc_html__('Game Providers', 'ahti_lang'),
		'manage_options',
		'gameproviders',
		'gameproviders',
		'dashicons-admin-generic',
		10
	);
	
}
add_action( 'admin_menu', 'gaming_provider_menu' );

//'show_in_menu' => 'gameprovider'



// GAME PROVIDERS CPT
function baccarat_cpt() {
	$labels = array(
		'name'               => _x( 'Baccarat', 'post type general name' ),
		'singular_name'      => _x( 'Baccarat', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Baccarat' ),
		'add_new_item'       => __( 'Add New Baccarat' ),
		'edit_item'          => __( 'Edit Baccarat' ),
		'new_item'           => __( 'New Baccarat' ),
		'all_items'          => __( 'Baccarat' ),
		'view_item'          => __( 'View Baccarat' ),
		'search_items'       => __( 'Search Baccarat' ),
		'not_found'          => __( 'No Baccarat' ),
		'not_found_in_trash' => __( 'No Baccarat found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Baccarat'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Baccarat only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'baccarat-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'baccarat-cpt', $args );	
}
add_action( 'init', 'baccarat_cpt' );


function blackJack_cpt() {
	$labels = array(
		'name'               => _x( 'BlackJack', 'post type general name' ),
		'singular_name'      => _x( 'BlackJack', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'BlackJack' ),
		'add_new_item'       => __( 'Add New BlackJack' ),
		'edit_item'          => __( 'Edit BlackJack' ),
		'new_item'           => __( 'New BlackJack' ),
		'all_items'          => __( 'BlackJack' ),
		'view_item'          => __( 'View BlackJack' ),
		'search_items'       => __( 'Search BlackJack' ),
		'not_found'          => __( 'No BlackJack' ),
		'not_found_in_trash' => __( 'No BlackJack found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'BlackJack'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For BlackJack only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'blackjack-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'blackjack-cpt', $args );	
}
add_action( 'init', 'blackJack_cpt' );


function bluePrint_cpt() {
	$labels = array(
		'name'               => _x( 'Blue Print', 'post type general name' ),
		'singular_name'      => _x( 'Blue Print', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Blue Print' ),
		'add_new_item'       => __( 'Add New Blue Print' ),
		'edit_item'          => __( 'Edit Blue Print' ),
		'new_item'           => __( 'New Blue Print' ),
		'all_items'          => __( 'Blue Print' ),
		'view_item'          => __( 'View Blue Print' ),
		'search_items'       => __( 'Search Blue Print' ),
		'not_found'          => __( 'No Blue Print' ),
		'not_found_in_trash' => __( 'No Blue Print found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Blue Print'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Blue Print only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'blueprint-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'blueprint-cpt', $args );	
}
add_action( 'init', 'bluePrint_cpt' );


function dreamcatcher_cpt() {
	$labels = array(
		'name'               => _x( 'Dream Catcher', 'post type general name' ),
		'singular_name'      => _x( 'Dream Catcher', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Dream Catcher' ),
		'add_new_item'       => __( 'Add New Dream Catcher' ),
		'edit_item'          => __( 'Edit Dream Catcher' ),
		'new_item'           => __( 'New Dream Catcher' ),
		'all_items'          => __( 'Dream Catcher' ),
		'view_item'          => __( 'View Dream Catcher' ),
		'search_items'       => __( 'Search Dream Catcher' ),
		'not_found'          => __( 'No Dream Catcher' ),
		'not_found_in_trash' => __( 'No Dream Catcher found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Dream Catcher'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Dream Catcher only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'dreamcatcher-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'dreamcatcher-cpt', $args );	
}
add_action( 'init', 'dreamcatcher_cpt' );


function freeSlots_cpt() {
	$labels = array(
		'name'               => _x( 'Free Slots', 'post type general name' ),
		'singular_name'      => _x( 'Free Slots', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Free Slots' ),
		'add_new_item'       => __( 'Add New Free Slots' ),
		'edit_item'          => __( 'Edit Free Slots' ),
		'new_item'           => __( 'New Free Slots' ),
		'all_items'          => __( 'Free Slots' ),
		'view_item'          => __( 'View Free Slots' ),
		'search_items'       => __( 'Search Free Slots' ),
		'not_found'          => __( 'No Free Slots' ),
		'not_found_in_trash' => __( 'No Free Slots found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Free Slots'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Free Slots only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'freeslots-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'freeslots-cpt', $args );	
}
add_action( 'init', 'freeSlots_cpt' );


function ganapati_cpt() {
	$labels = array(
		'name'               => _x( 'Ganapati', 'post type general name' ),
		'singular_name'      => _x( 'Ganapati', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Ganapati' ),
		'add_new_item'       => __( 'Add New Ganapati' ),
		'edit_item'          => __( 'Edit Ganapati' ),
		'new_item'           => __( 'New Ganapati' ),
		'all_items'          => __( 'Ganapati' ),
		'view_item'          => __( 'View Ganapati' ),
		'search_items'       => __( 'Search Ganapati' ),
		'not_found'          => __( 'No Ganapati' ),
		'not_found_in_trash' => __( 'No Ganapati found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Ganapati'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Ganapati only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'ganapati-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'ganapati-cpt', $args );	
}
add_action( 'init', 'ganapati_cpt' );


function liveCasino_cpt() {
	$labels = array(
		'name'               => _x( 'Live Casino', 'post type general name' ),
		'singular_name'      => _x( 'Live Casino', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Live Casino' ),
		'add_new_item'       => __( 'Add New Live Casino' ),
		'edit_item'          => __( 'Edit Live Casino' ),
		'new_item'           => __( 'New Live Casino' ),
		'all_items'          => __( 'Live Casino' ),
		'view_item'          => __( 'View Live Casino' ),
		'search_items'       => __( 'Search Live Casino' ),
		'not_found'          => __( 'No Live Casino' ),
		'not_found_in_trash' => __( 'No Live Casino found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Live Casino'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Live Casino only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'livecasino-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'livecasino-cpt', $args );	
}
add_action( 'init', 'liveCasino_cpt' );


function merkur_cpt() {
	$labels = array(
		'name'               => _x( 'Merkur', 'post type general name' ),
		'singular_name'      => _x( 'Merkur', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Merkur' ),
		'add_new_item'       => __( 'Add New Merkur' ),
		'edit_item'          => __( 'Edit Merkur' ),
		'new_item'           => __( 'New Merkur' ),
		'all_items'          => __( 'Merkur' ),
		'view_item'          => __( 'View Merkur' ),
		'search_items'       => __( 'Search Merkur' ),
		'not_found'          => __( 'No Merkur' ),
		'not_found_in_trash' => __( 'No Merkur found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Merkur'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Merkur only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'merkur-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'merkur-cpt', $args );	
}
add_action( 'init', 'merkur_cpt' );


function microGaming_cpt() {
	$labels = array(
		'name'               => _x( 'MicroGaming', 'post type general name' ),
		'singular_name'      => _x( 'MicroGaming', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'MicroGaming' ),
		'add_new_item'       => __( 'Add New MicroGaming' ),
		'edit_item'          => __( 'Edit MicroGaming' ),
		'new_item'           => __( 'New MicroGaming' ),
		'all_items'          => __( 'MicroGaming' ),
		'view_item'          => __( 'View MicroGaming' ),
		'search_items'       => __( 'Search MicroGaming' ),
		'not_found'          => __( 'No MicroGaming' ),
		'not_found_in_trash' => __( 'No MicroGaming found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'MicroGaming'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For MicroGaming only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'microgaming-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'microgaming-cpt', $args );	
}
add_action( 'init', 'microGaming_cpt' );


function netEnt_cpt() {
	$labels = array(
		'name'               => _x( 'NetEnt', 'post type general name' ),
		'singular_name'      => _x( 'NetEnt', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'NetEnt' ),
		'add_new_item'       => __( 'Add New NetEnt' ),
		'edit_item'          => __( 'Edit NetEnt' ),
		'new_item'           => __( 'New NetEnt' ),
		'all_items'          => __( 'NetEnt' ),
		'view_item'          => __( 'View NetEnt' ),
		'search_items'       => __( 'Search NetEnt' ),
		'not_found'          => __( 'No NetEnt' ),
		'not_found_in_trash' => __( 'No NetEnt found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'NetEnt'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For NetEnt only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'netent-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'netent-cpt', $args );	
}
add_action( 'init', 'netEnt_cpt' );


function nextGen_cpt() {
	$labels = array(
		'name'               => _x( 'NextGen', 'post type general name' ),
		'singular_name'      => _x( 'NextGen', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'NextGen' ),
		'add_new_item'       => __( 'Add New NextGen' ),
		'edit_item'          => __( 'Edit NextGen' ),
		'new_item'           => __( 'New NextGen' ),
		'all_items'          => __( 'NextGen' ),
		'view_item'          => __( 'View NextGen' ),
		'search_items'       => __( 'Search NextGen' ),
		'not_found'          => __( 'No NextGen' ),
		'not_found_in_trash' => __( 'No NextGen found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'NextGen'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For NextGen only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'nextgen-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'nextgen-cpt', $args );	
}
add_action( 'init', 'nextGen_cpt' );


function nyx_cpt() {
	$labels = array(
		'name'               => _x( 'NYX', 'post type general name' ),
		'singular_name'      => _x( 'NYX', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'NYX' ),
		'add_new_item'       => __( 'Add New NYX' ),
		'edit_item'          => __( 'Edit NYX' ),
		'new_item'           => __( 'New NYX' ),
		'all_items'          => __( 'NYX' ),
		'view_item'          => __( 'View NYX' ),
		'search_items'       => __( 'Search NYX' ),
		'not_found'          => __( 'No NYX' ),
		'not_found_in_trash' => __( 'No NYX found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'NYX'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For NYX only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'nyx-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'nyx-cpt', $args );	
}
add_action( 'init', 'nyx_cpt' );


function playngo_cpt() {
	$labels = array(
		'name'               => _x( 'Play N Go', 'post type general name' ),
		'singular_name'      => _x( 'Play N Go', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Play N Go' ),
		'add_new_item'       => __( 'Add New Play N Go' ),
		'edit_item'          => __( 'Edit Play N Go' ),
		'new_item'           => __( 'New Play N Go' ),
		'all_items'          => __( 'Play N Go' ),
		'view_item'          => __( 'View Play N Go' ),
		'search_items'       => __( 'Search Play N Go' ),
		'not_found'          => __( 'No Play N Go' ),
		'not_found_in_trash' => __( 'No Play N Go found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Play N Go'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Play N Go only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'playngo-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'playngo-cpt', $args );	
}
add_action( 'init', 'playngo_cpt' );


function pragmaticplay_cpt() {
	$labels = array(
		'name'               => _x( 'Pragmatic Play', 'post type general name' ),
		'singular_name'      => _x( 'Pragmatic Play', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Pragmatic Play' ),
		'add_new_item'       => __( 'Add New Pragmatic Play' ),
		'edit_item'          => __( 'Edit Pragmatic Play' ),
		'new_item'           => __( 'New Pragmatic Play' ),
		'all_items'          => __( 'Pragmatic Play' ),
		'view_item'          => __( 'View Pragmatic Play' ),
		'search_items'       => __( 'Search Pragmatic Play' ),
		'not_found'          => __( 'No Pragmatic Play' ),
		'not_found_in_trash' => __( 'No Pragmatic Play found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Pragmatic Play'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Pragmatic Play only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'pragmaticplay-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'pragmaticplay-cpt', $args );	
}
add_action( 'init', 'pragmaticplay_cpt' );


function realistic_cpt() {
	$labels = array(
		'name'               => _x( 'Realistic', 'post type general name' ),
		'singular_name'      => _x( 'Realistic', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Realistic' ),
		'add_new_item'       => __( 'Add New Realistic' ),
		'edit_item'          => __( 'Edit Realistic' ),
		'new_item'           => __( 'New Realistic' ),
		'all_items'          => __( 'Realistic' ),
		'view_item'          => __( 'View Realistic' ),
		'search_items'       => __( 'Search Realistic' ),
		'not_found'          => __( 'No Realistic' ),
		'not_found_in_trash' => __( 'No Realistic found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Realistic'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Realistic only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'realistic-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'realistic-cpt', $args );	
}
add_action( 'init', 'realistic_cpt' );


function redTiger_cpt() {
	$labels = array(
		'name'               => _x( 'Red Tiger', 'post type general name' ),
		'singular_name'      => _x( 'Red Tiger', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Red Tiger' ),
		'add_new_item'       => __( 'Add New Red Tiger' ),
		'edit_item'          => __( 'Edit Red Tiger' ),
		'new_item'           => __( 'New Red Tiger' ),
		'all_items'          => __( 'Red Tiger' ),
		'view_item'          => __( 'View Red Tiger' ),
		'search_items'       => __( 'Search Red Tiger' ),
		'not_found'          => __( 'No Red Tiger' ),
		'not_found_in_trash' => __( 'No Red Tiger found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Red Tiger'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Red Tiger only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'redtiger-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'redtiger-cpt', $args );	
}
add_action( 'init', 'redTiger_cpt' );


function roulette_cpt() {
	$labels = array(
		'name'               => _x( 'Roulette', 'post type general name' ),
		'singular_name'      => _x( 'Roulette', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Roulette' ),
		'add_new_item'       => __( 'Add New Roulette' ),
		'edit_item'          => __( 'Edit Roulette' ),
		'new_item'           => __( 'New Roulette' ),
		'all_items'          => __( 'Roulette' ),
		'view_item'          => __( 'View Roulette' ),
		'search_items'       => __( 'Search Roulette' ),
		'not_found'          => __( 'No Roulette' ),
		'not_found_in_trash' => __( 'No Roulette found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Roulette'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Roulette only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'roulette-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'roulette-cpt', $args );	
}
add_action( 'init', 'roulette_cpt' );


function slot_cpt() {
	$labels = array(
		'name'               => _x( 'Slot', 'post type general name' ),
		'singular_name'      => _x( 'Slot', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Slot' ),
		'add_new_item'       => __( 'Add New Slot' ),
		'edit_item'          => __( 'Edit Slot' ),
		'new_item'           => __( 'New Slot' ),
		'all_items'          => __( 'Slot' ),
		'view_item'          => __( 'View Slot' ),
		'search_items'       => __( 'Search Slot' ),
		'not_found'          => __( 'No Slot' ),
		'not_found_in_trash' => __( 'No Slot found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Slot'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Slot only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'slot-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'slot-cpt', $args );	
}
add_action( 'init', 'slot_cpt' );


function stakeLogic_cpt() {
	$labels = array(
		'name'               => _x( 'StakeLogic', 'post type general name' ),
		'singular_name'      => _x( 'StakeLogic', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'StakeLogic' ),
		'add_new_item'       => __( 'Add New StakeLogic' ),
		'edit_item'          => __( 'Edit StakeLogic' ),
		'new_item'           => __( 'New StakeLogic' ),
		'all_items'          => __( 'StakeLogic' ),
		'view_item'          => __( 'View StakeLogic' ),
		'search_items'       => __( 'Search StakeLogic' ),
		'not_found'          => __( 'No StakeLogic' ),
		'not_found_in_trash' => __( 'No StakeLogic found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'StakeLogic'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For StakeLogic only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'stakeLogic-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'stakeLogic-cpt', $args );	
}
add_action( 'init', 'stakeLogic_cpt' );


function thunderKick_cpt() {
	$labels = array(
		'name'               => _x( 'ThunderKick', 'post type general name' ),
		'singular_name'      => _x( 'ThunderKick', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'ThunderKick' ),
		'add_new_item'       => __( 'Add New ThunderKick' ),
		'edit_item'          => __( 'Edit ThunderKick' ),
		'new_item'           => __( 'New ThunderKick' ),
		'all_items'          => __( 'ThunderKick' ),
		'view_item'          => __( 'View ThunderKick' ),
		'search_items'       => __( 'Search ThunderKick' ),
		'not_found'          => __( 'No ThunderKick' ),
		'not_found_in_trash' => __( 'No ThunderKick found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'ThunderKick'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For ThunderKick only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'thunderkick-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'thunderkick-cpt', $args );	
}
add_action( 'init', 'thunderKick_cpt' );


function yggDrasil_cpt() {
	$labels = array(
		'name'               => _x( 'YggDrasil', 'post type general name' ),
		'singular_name'      => _x( 'YggDrasil', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'YggDrasil' ),
		'add_new_item'       => __( 'Add New YggDrasil' ),
		'edit_item'          => __( 'Edit YggDrasil' ),
		'new_item'           => __( 'New YggDrasil' ),
		'all_items'          => __( 'YggDrasil' ),
		'view_item'          => __( 'View YggDrasil' ),
		'search_items'       => __( 'Search YggDrasil' ),
		'not_found'          => __( 'No YggDrasil' ),
		'not_found_in_trash' => __( 'No YggDrasil found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'YggDrasil'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For YggDrasil only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'yggdrasil-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'yggdrasil-cpt', $args );	
}
add_action( 'init', 'yggDrasil_cpt' );


function elkstudios_cpt() {
	$labels = array(
		'name'               => _x( 'ELK Studios', 'post type general name' ),
		'singular_name'      => _x( 'ELK Studios', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'ELK Studios' ),
		'add_new_item'       => __( 'Add New ELK Studios' ),
		'edit_item'          => __( 'Edit ELK Studios' ),
		'new_item'           => __( 'New ELK Studios' ),
		'all_items'          => __( 'ELK Studios' ),
		'view_item'          => __( 'View ELK Studios' ),
		'search_items'       => __( 'Search ELK Studios' ),
		'not_found'          => __( 'No ELK Studios' ),
		'not_found_in_trash' => __( 'No ELK Studios found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'ELK Studios'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For ELK Studios only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'elkstudios-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'elkstudios-cpt', $args );	
}
add_action( 'init', 'elkstudios_cpt' );


function egtinteractive_cpt() {
	$labels = array(
		'name'               => _x( 'EGT Interactive', 'post type general name' ),
		'singular_name'      => _x( 'EGT Interactive', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'EGT Interactive' ),
		'add_new_item'       => __( 'Add New EGT Interactive' ),
		'edit_item'          => __( 'Edit EGT Interactive' ),
		'new_item'           => __( 'New EGT Interactive' ),
		'all_items'          => __( 'EGT Interactive' ),
		'view_item'          => __( 'View EGT Interactive' ),
		'search_items'       => __( 'Search EGT Interactive' ),
		'not_found'          => __( 'No EGT Interactive' ),
		'not_found_in_trash' => __( 'No EGT Interactive found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'EGT Interactive'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For EGT Interactive only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'egtinteractive-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'egtinteractive-cpt', $args );	
}
add_action( 'init', 'egtinteractive_cpt' );


function bigtimegaming_cpt() {
	$labels = array(
		'name'               => _x( 'Big Time Gaming', 'post type general name' ),
		'singular_name'      => _x( 'Big Time Gaming', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Big Time Gaming' ),
		'add_new_item'       => __( 'Add New Big Time Gaming' ),
		'edit_item'          => __( 'Edit Big Time Gaming' ),
		'new_item'           => __( 'New Big Time Gaming' ),
		'all_items'          => __( 'Big Time Gaming' ),
		'view_item'          => __( 'View Big Time Gaming' ),
		'search_items'       => __( 'Search Big Time Gaming' ),
		'not_found'          => __( 'No Big Time Gaming' ),
		'not_found_in_trash' => __( 'No Big Time Gaming found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Big Time Gaming'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Big Time Gaming only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'bigtimegaming-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'bigtimegaming-cpt', $args );	
}
add_action( 'init', 'bigtimegaming_cpt' );


function relaxGaming_cpt() {
	$labels = array(
		'name'               => _x( 'Relax Gaming', 'post type general name' ),
		'singular_name'      => _x( 'Relax Gaming', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Relax Gaming' ),
		'add_new_item'       => __( 'Add New Relax Gaming' ),
		'edit_item'          => __( 'Edit Relax Gaming' ),
		'new_item'           => __( 'New Relax Gaming' ),
		'all_items'          => __( 'Relax Gaming' ),
		'view_item'          => __( 'View Relax Gaming' ),
		'search_items'       => __( 'Search Relax Gaming' ),
		'not_found'          => __( 'No Relax Gaming' ),
		'not_found_in_trash' => __( 'No Relax Gaming found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Relax Gaming'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Relax Gaming only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'relaxgaming-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'relaxgaming-cpt', $args );	
}
add_action( 'init', 'relaxGaming_cpt' );


function quickspin_cpt() {
	$labels = array(
		'name'               => _x( 'Quickspin', 'post type general name' ),
		'singular_name'      => _x( 'Quickspin', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Quickspin' ),
		'add_new_item'       => __( 'Add New Quickspin' ),
		'edit_item'          => __( 'Edit Quickspin' ),
		'new_item'           => __( 'New Quickspin' ),
		'all_items'          => __( 'Quickspin' ),
		'view_item'          => __( 'View Quickspin' ),
		'search_items'       => __( 'Search Quickspin' ),
		'not_found'          => __( 'No Quickspin' ),
		'not_found_in_trash' => __( 'No Quickspin found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Quickspin'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Quickspin only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'quickspin-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'quickspin-cpt', $args );	
}
add_action( 'init', 'quickspin_cpt' );


function barcrest_cpt() {
	$labels = array(
		'name'               => _x( 'Barcrest', 'post type general name' ),
		'singular_name'      => _x( 'Barcrest', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Barcrest' ),
		'add_new_item'       => __( 'Add New Barcrest' ),
		'edit_item'          => __( 'Edit Barcrest' ),
		'new_item'           => __( 'New Barcrest' ),
		'all_items'          => __( 'Barcrest' ),
		'view_item'          => __( 'View Barcrest' ),
		'search_items'       => __( 'Search Barcrest' ),
		'not_found'          => __( 'No Barcrest' ),
		'not_found_in_trash' => __( 'No Barcrest found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Barcrest'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Barcrest only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'barcrest-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'barcrest-cpt', $args );	
}
add_action( 'init', 'barcrest_cpt' );


function high5Games_cpt() {
	$labels = array(
		'name'               => _x( 'High 5 Games', 'post type general name' ),
		'singular_name'      => _x( 'High 5 Games', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'High 5 Games' ),
		'add_new_item'       => __( 'Add New High 5 Games' ),
		'edit_item'          => __( 'Edit High 5 Games' ),
		'new_item'           => __( 'New High 5 Games' ),
		'all_items'          => __( 'High 5 Games' ),
		'view_item'          => __( 'View High 5 Games' ),
		'search_items'       => __( 'Search High 5 Games' ),
		'not_found'          => __( 'No High 5 Games' ),
		'not_found_in_trash' => __( 'No High 5 Games found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'High 5 Games'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For High 5 Games only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'high5games-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'high5games-cpt', $args );	
}
add_action( 'init', 'high5Games_cpt' );


function slingoOriginals_cpt() {
	$labels = array(
		'name'               => _x( 'Slingo Originals', 'post type general name' ),
		'singular_name'      => _x( 'Slingo Originals', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Slingo Originals' ),
		'add_new_item'       => __( 'Add New Slingo Originals' ),
		'edit_item'          => __( 'Edit Slingo Originals' ),
		'new_item'           => __( 'New Slingo Originals' ),
		'all_items'          => __( 'Slingo Originals' ),
		'view_item'          => __( 'View Slingo Originals' ),
		'search_items'       => __( 'Search Slingo Originals' ),
		'not_found'          => __( 'No Slingo Originals' ),
		'not_found_in_trash' => __( 'No Slingo Originals found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Slingo Originals'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Slingo Originals only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'slingooriginals-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'slingooriginals-cpt', $args );	
}
add_action( 'init', 'slingoOriginals_cpt' );


function wazdan_cpt() {
	$labels = array(
		'name'               => _x( 'Wazdan', 'post type general name' ),
		'singular_name'      => _x( 'Wazdan', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Wazdan' ),
		'add_new_item'       => __( 'Add New Wazdan' ),
		'edit_item'          => __( 'Edit Wazdan' ),
		'new_item'           => __( 'New Wazdan' ),
		'all_items'          => __( 'Wazdan' ),
		'view_item'          => __( 'View Wazdan' ),
		'search_items'       => __( 'Search Wazdan' ),
		'not_found'          => __( 'No Wazdan' ),
		'not_found_in_trash' => __( 'No Wazdan found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Wazdan'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Wazdan only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'wazdan-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'wazdan-cpt', $args );	
}
add_action( 'init', 'wazdan_cpt' );


function gamomat_cpt() {
	$labels = array(
		'name'               => _x( 'Gamomat', 'post type general name' ),
		'singular_name'      => _x( 'Gamomat', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Gamomat' ),
		'add_new_item'       => __( 'Add New Gamomat' ),
		'edit_item'          => __( 'Edit Gamomat' ),
		'new_item'           => __( 'New Gamomat' ),
		'all_items'          => __( 'Gamomat' ),
		'view_item'          => __( 'View Gamomat' ),
		'search_items'       => __( 'Search Gamomat' ),
		'not_found'          => __( 'No Gamomat' ),
		'not_found_in_trash' => __( 'No Gamomat found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Gamomat'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Gamomat only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'gamomat-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'gamomat-cpt', $args );	
}
add_action( 'init', 'gamomat_cpt' );


function cayetano_cpt() {
	$labels = array(
		'name'               => _x( 'Cayetano', 'post type general name' ),
		'singular_name'      => _x( 'Cayetano', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Cayetano' ),
		'add_new_item'       => __( 'Add New Cayetano' ),
		'edit_item'          => __( 'Edit Cayetano' ),
		'new_item'           => __( 'New Cayetano' ),
		'all_items'          => __( 'Cayetano' ),
		'view_item'          => __( 'View Cayetano' ),
		'search_items'       => __( 'Search Cayetano' ),
		'not_found'          => __( 'No Cayetano' ),
		'not_found_in_trash' => __( 'No Cayetano found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Cayetano'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Cayetano only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'cayetano-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'cayetano-cpt', $args );	
}
add_action( 'init', 'cayetano_cpt' );


function kalambaGames_cpt() {
	$labels = array(
		'name'               => _x( 'Kalamba Games', 'post type general name' ),
		'singular_name'      => _x( 'Kalamba Games', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Kalamba Games' ),
		'add_new_item'       => __( 'Add New Kalamba Games' ),
		'edit_item'          => __( 'Edit Kalamba Games' ),
		'new_item'           => __( 'New Kalamba Games' ),
		'all_items'          => __( 'Kalamba Games' ),
		'view_item'          => __( 'View Kalamba Games' ),
		'search_items'       => __( 'Search Kalamba Games' ),
		'not_found'          => __( 'No Kalamba Games' ),
		'not_found_in_trash' => __( 'No Kalamba Games found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Kalamba Games'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Kalamba Games only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'kalambagames-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'kalambagames-cpt', $args );	
}
add_action( 'init', 'kalambaGames_cpt' );


function lightningBox_cpt() {
	$labels = array(
		'name'               => _x( 'Lightning Box', 'post type general name' ),
		'singular_name'      => _x( 'Lightning Box', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Lightning Box' ),
		'add_new_item'       => __( 'Add New Lightning Box' ),
		'edit_item'          => __( 'Edit Lightning Box' ),
		'new_item'           => __( 'New Lightning Box' ),
		'all_items'          => __( 'Lightning Box' ),
		'view_item'          => __( 'View Lightning Box' ),
		'search_items'       => __( 'Search Lightning Box' ),
		'not_found'          => __( 'No Lightning Box' ),
		'not_found_in_trash' => __( 'No Lightning Box found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Lightning Box'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Lightning Box only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'lightgbox-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'lightgbox-cpt', $args );	
}
add_action( 'init', 'lightningBox_cpt' );


function oryx_cpt() {
	$labels = array(
		'name'               => _x( 'Oryx', 'post type general name' ),
		'singular_name'      => _x( 'Oryx', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Oryx' ),
		'add_new_item'       => __( 'Add New Oryx' ),
		'edit_item'          => __( 'Edit Oryx' ),
		'new_item'           => __( 'New Oryx' ),
		'all_items'          => __( 'Oryx' ),
		'view_item'          => __( 'View Oryx' ),
		'search_items'       => __( 'Search Oryx' ),
		'not_found'          => __( 'No Oryx' ),
		'not_found_in_trash' => __( 'No Oryx found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Oryx'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Oryx only',
		'public'        => true, // make it false if you would like to unaccessible outside...
		"publicly_queryable" => false,
		'menu_position' => 5,
		'supports'      => array( 'title'),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-image-rotate-right',
		'rewrite' => array( 'slug' => 'oryx-cpt' ),
		'show_in_menu' => 'gameproviders'
	);
	register_post_type( 'oOryx-cpt', $args );	
}
add_action( 'init', 'oryx_cpt' );