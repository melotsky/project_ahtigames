<?php 
if ( !defined('ABSPATH')) exit;

/************************************/
// LOAD CSS / START
/************************************/
//global $template;
//global $post;
if (!is_admin()) {
function fx_css() {
	
//	wp_register_style( 'superfish_style', get_template_directory_uri(). '/assets/css/nav.css', 'all' ); // SUPERFISH
//	wp_enqueue_style( 'superfish_style' );


	
//	wp_register_style( 'ham_style', get_template_directory_uri(). '/assets/css/ham.css', 'all' ); // HAM STYLE
//	wp_enqueue_style( 'ham_style' );
	

	
//	wp_register_style( 'magnific_style', get_template_directory_uri(). '/assets/css/magnific-popup.css', 'all' ); // MAGNIFIC STYLE
//	wp_enqueue_style( 'magnific_style' );

	wp_register_style( 'main_style', get_template_directory_uri(). '/assets/css/style.css', 'all'); // MAIN STYLE
	wp_enqueue_style( 'main_style' );

	wp_register_style( 'fontawesome_style', get_template_directory_uri(). '/assets/css/font-awesome-4.3.0/css/font-awesome.min.css', 'all' ); // SUPERFISH
	wp_enqueue_style( 'fontawesome_style' );

	wp_register_style( 'slicknav_style', get_template_directory_uri(). '/assets/css/slicknav.css', 'all' ); // SLICKNAV
	wp_enqueue_style( 'slicknav_style' );

	wp_register_style( 'slidebars_style', get_template_directory_uri(). '/assets/css/slidebars.min.css', 'all' ); // SLIDEBAR STYLE
	wp_enqueue_style( 'slidebars_style' );

	wp_register_style( 'animation_style', get_template_directory_uri(). '/assets/css/animate.css', 'all' ); // ANIMATE STYLE
	wp_enqueue_style( 'animation_style' );

//	wp_register_style( 'splide_style', get_template_directory_uri(). '/assets/css/splide-core.min.css' );
//  wp_enqueue_style( 'splide_style' );

  wp_register_style( 'keen_slider_style', get_template_directory_uri(). '/assets/css/keen-slider.min.css' );
  wp_enqueue_style( 'keen_slider_style' );
    
    //TEMPORARY STYLES FOR NEW LANDING PAGE
    wp_register_style( 'lpt_002', get_template_directory_uri(). '/assets/css/lpt_002.css' );
    wp_enqueue_style( 'lpt_002' );
    
    wp_register_style( 'lpt_003', get_template_directory_uri(). '/assets/css/lpt_003.css' );
    wp_enqueue_style( 'lpt_003' );
    
    wp_register_style( 'lpt_004', get_template_directory_uri(). '/assets/css/lpt_004.css' );
    wp_enqueue_style( 'lpt_004' );
    
    wp_register_style( 'lpt_005', get_template_directory_uri(). '/assets/css/lpt_005.css' );
    wp_enqueue_style( 'lpt_005' );
    
    wp_register_style( 'lpt_006', get_template_directory_uri(). '/assets/css/lpt_006.css' );
    wp_enqueue_style( 'lpt_006' );
    
    wp_register_style( 'lpt_007', get_template_directory_uri(). '/assets/css/lpt_007.css' );
    wp_enqueue_style( 'lpt_007' );
    
    wp_register_style( 'lpt_008', get_template_directory_uri(). '/assets/css/lpt_008.css' );
    wp_enqueue_style( 'lpt_008' );
    
    wp_register_style( 'lpt_009', get_template_directory_uri(). '/assets/css/lpt_009.css' );
    wp_enqueue_style( 'lpt_009' );
    


//	wp_register_style( 'slickcaro_style', get_template_directory_uri(). '/assets/css/slick.css', 'all' ); // SLICK CAROUSEL STYLE
//	wp_enqueue_style( 'slickcaro_style' );

	
//	$tmp = get_page_template_slug($post_id);
//	if ( basename( $template ) == 'template-home.php' ) {
//		wp_register_style( 'home-template', get_template_directory_uri().'/assets/css/home.css', 'all' );
//		wp_enqueue_style( 'home-template' );
//	}
	// if('template-home.php' == $tmp) {
	// 	wp_register_style( 'home-template', get_template_directory_uri().'/assets/css/home.css', 'all' );
	// 	wp_enqueue_style( 'home-template' );
	// }
	// Home Template
	



}

add_action('init', 'fx_css', 2);
}

/************************************/
// LOAD CSS / END
/************************************/
