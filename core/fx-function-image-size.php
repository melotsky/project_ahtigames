<?php 
if ( !defined('ABSPATH')) exit;
/************************************/
// IMAGE SIZES / START
/************************************/
if ( function_exists( 'add_image_size' ) ) { 
	//add_image_size( 'ImageSize', 132, 80, true ); //(cropped)
	//add_image_size( 'sliderImage', 969, 401, true ); //(cropped)
	//add_image_size( 'contactImage', 641, 401, true ); //(cropped)
    //add_image_size( 'cptThumb', 310, 200, true ); //(cropped)
    
    //Games Images Sizes for CPT
    add_image_size( 'cptThumb', 316, 316, true ); //(cropped)
    add_image_size( 'big-cptThumb', 346, 346, true ); //(cropped)
    add_image_size( 'bigger-cptThumb', 500, 500, true ); //(cropped)

    //Featured Image size
    add_image_size( 'featured-image-tabs', 651, 375, true ); //(cropped)
    add_image_size( 'desktop-featured-image-tabs', 1110, 350, true ); //(cropped)

    //Latest winner size
    add_image_size( 'latest-winner-image', 57, 57, true ); //(cropped)

    //Testimonial image size
    add_image_size( 'testimonial-image', 70, 70, true ); //(cropped)

    //Featured image blog size
    add_image_size( 'featured-image', 315, 210, true ); //(cropped)

    //Slider sizes
    add_image_size( 'slider-desktop', 1920, 498, true ); //(cropped)
    add_image_size( 'slider-desktop500', 1920, 500, true ); //(cropped)
    add_image_size( 'slider-mobile', 750, 658, true ); //(cropped)

    //Trustly Tabs
    add_image_size( 'trustly-tabs', 701, 405, true ); //(cropped)    

    //Game Header
    add_image_size( 'game-header-desktop', 1110, 701, true ); //(cropped)
    add_image_size( 'game-header-mobile', 750, 701, true ); //(cropped)    

    //Payments Tab
    add_image_size( 'payments-tab-card', 98, 57, true ); //(cropped)    

    //Background Image with Logo and Button
    add_image_size( 'biwlb-img', 797, 397, true ); //(cropped)    
    add_image_size( 'biwlb-logo', 302, 99999, false ); //(cropped)
    add_image_size( 'single-game-logo', 300, 99999, false ); //(cropped)    

    
    //Image for Mobile and Desktop View
    add_image_size( 'imdv-mob', 750, 9999, false ); //(cropped)

    //Image Background for Providers Archive Header
    add_image_size( 'mobile_pah', 750, 414, true ); //(cropped)
    add_image_size( 'desktop_pah', 1110, 515, true ); //(cropped)

    //Providers Archive Header Thumbnail
    add_image_size( 'archive_Header_thumbnail', 315, 210, true ); //(cropped)


    // FROM BLOGI

	//Featured Image
	add_image_size( 'featured_post_image__desktop', 825, 386, true ); //(cropped)
	add_image_size( 'featured_post_image__mobile', 634, 423, true ); //(cropped)
	add_image_size( 'featured_image__blogsummary', 350, 233, true ); //(cropped)

	//Advertise Banner
	add_image_size( 'advertise__desktop', 255, 999999, false ); //(cropped)
	add_image_size( 'advertise__mobile', 460, 999999, false ); //(cropped)
	add_image_size( 'advertise__tablet', 860, 999999, false ); //(cropped)

	//Author Quote 
	add_image_size( 'author_qoute', 48, 48, true ); //(cropped)

	//Popup Video
    add_image_size( 'v_thumb', 255, 143, true ); //(cropped)    
    

	//FOR PELIT TEMPLATE
    add_image_size( 'f_img_pelit_desktop', 1920, 375, true ); //(cropped)    
    add_image_size( 'f_img_pelit_mobile', 750, 415, true ); //(cropped)    


    //FOR PERCETAGE BLOCK
    add_image_size( 'log_perc', 320, 9999, false ); //(cropped)    

    //FOR HOME CAROUSEL BLOCK
    add_image_size( 'hcb_thumb', 173, 173, true ); //(cropped)    

    //FOR PAYMENT LISTS NEW
    add_image_size( 'payment_lists_cards', 100, 62, true ); //(cropped)    

    //PELIT NAVIGATION
    add_image_size( 'pelit_bg_icons', 30, 30, true ); //(cropped)        

    //PELIT NAVIGATION
    add_image_size( 'grid_thumbnails', 314, 314, true ); //(cropped)

    //PELIT NEW THUMB SIZED
    add_image_size( 'the_grid_thumbnails', 210, 210, true ); //(cropped)

    //SINGLE GAME PAGE
    add_image_size( 'single_game_img', 648, 364, true ); //(cropped)
    add_image_size( 'screenshot_game', 650, 9999999, false ); //(cropped)

    //Full width Banner For Pelivalmistaja
    add_image_size( 'pelivalmistaja_banner', 1920, 375, true ); //(cropped)

    //Full width Banner For Pelivalmistaja
    add_image_size( 'game_image_mobile', 687, 999999, false ); //(cropped)    
    add_image_size( 'game_image_desktop', 1024, 999999, false ); //(cropped)  
    
    
    //Full width Banner For Promo Block 1
    add_image_size( 'promo_block1_img_desk', 652, 543, true ); //(cropped)        
    add_image_size( 'promo_block1_img_mob', 407, 339, true ); //(cropped)        

    //Full width Banner For Promo Block 4
    add_image_size( 'promo_block4_img_thumb', 350, 329, true ); //(cropped)            


    //LANDING PAGE TEMPLATE 001
    add_image_size( 'lpt001_mob_main_bg', 750, 1600, true ); //(cropped)
    add_image_size( 'lpt001_presentation_mobile', 324, 690, true ); //(cropped)
    add_image_size( 'lpt001_mob_main_bg', 750, 1600, true ); //(cropped)
    add_image_size( 'lpt001_mob_main_bg', 750, 1600, true ); //(cropped)
    add_image_size( 'lpt001_mob_main_bg', 750, 1600, true ); //(cropped)

    add_image_size( 'lpt001_desk_main_bg', 1960, 845, true ); //(cropped)
    add_image_size( 'lpt001_desk_main_bg2', 1920, 845, true ); //(cropped)

    //LOGO FOR SLIDER MAIN
    add_image_size( 'logo_slider_main', 488, 9999999999, false ); //(cropped)    
    add_image_size( 'logo_slider_main_mob', 360, 9999999999, false ); //(cropped)    

    //LANDING PAGE 002
    
    add_image_size( 'lpt_18_logo', 23, 23, true ); //(cropped)
    add_image_size( 'lpt_mga_logo', 64, 25, true ); //(cropped)

    add_image_size( 'lpt002_mobile_main_character', 413, 415, true ); //(cropped)
    add_image_size( 'lpt002_mobile_background', 647, 99999999, false ); //(cropped)
    add_image_size( 'lpt002_logo1', 154, 111, true ); //(cropped)
    add_image_size( 'lpt002_logo2', 138, 40, true ); //(cropped)

    add_image_size( 'lpt_tablet_character', 631, 633, true ); //(cropped)
    add_image_size( 'lpt_tablet_background', 1024, 705, true ); //(cropped)


    //LANDING PAGE 003
    add_image_size( 'lpt003_mobile_main_character', 722, 425, true ); //(cropped)
    add_image_size( 'lpt003_desktop_main_character', 749, 425, true ); //(cropped)

    //LANDING PAGE 005
    add_image_size( 'lpt005_mobile_main_character', 750, 737, true ); //(cropped)
    add_image_size( 'lpt005_desktop_main_character', 937, 561, true ); //(cropped)


    //LANDING PAGE 007
    add_image_size( 'lpt007_mobile_logo', 361, 91, true ); //(cropped)
    add_image_size( 'lpt007_desktop_logo', 361, 222, true ); //(cropped)

    add_image_size( 'lpt007_mobile_main_character', 750, 1084, true ); //(cropped)
    add_image_size( 'lpt007_desktop_main_character', 991, 845, true ); //(cropped)


    //LANDING PAGE 008
    add_image_size( 'lpt008_mobile_main_character', 750, 728, true ); //(cropped)
    add_image_size( 'lpt008_desktop_main_character', 926, 768, true ); //(cropped)

    //LANDING PAGE 009
    add_image_size( 'lpt009_mobile_main_character', 883, 1038, true ); //(cropped)
    add_image_size( 'lpt009_desktop_main_character', 1044, 1225, true ); //(cropped)

    // Software Banners
    add_image_size( 'soft_banner_1110', 1110, 99999999, false ); //(cropped)
    add_image_size( 'soft_banner_1000', 1000, 99999999, false ); //(cropped)
    add_image_size( 'soft_banner_900', 900, 99999999, false ); //(cropped)
    add_image_size( 'soft_banner_800', 800, 99999999, false ); //(cropped)
    add_image_size( 'soft_banner_750', 750, 99999999, false ); //(cropped)
    add_image_size( 'soft_banner_600', 600, 99999999, false ); //(cropped)
    add_image_size( 'soft_banner_500', 500, 99999999, false ); //(cropped)
    add_image_size( 'soft_banner_360', 360, 99999999, false ); //(cropped)

}



add_filter( 'image_size_names_choose','wpmudev_custom_image_sizes' );

function wpmudev_custom_image_sizes( $sizes ) {

    return array_merge( $sizes, array(
    //Add your custom sizes here
    'archive_Header_thumbnail' => __( 'Providers Archive Thumbnail' ),
    // 'blog-width' => __( 'Blog Content Full Width' )
    )
    );
}


/************************************/
// IMAGE SIZES / END
/************************************/
