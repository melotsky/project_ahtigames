<?php 
if ( !defined('ABSPATH')) exit;
function homepage_tabs() {
    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'homepage-tabs',
        'title'             => __('Homepage Tabs'),
        'description'       => __('Tabs for the games'),
        'render_template'   => './inc/blocks/homepage-tabs/homepage-tabs.php',
        'category'          => 'Homepage Tabs',
        'icon'              => 'dashicons-buddicons-replies',
        'keywords'          => array( 'homepage-tabs', 'quote' ),
    ));
}

function popup_video() {

     // register a latest_winners.
     acf_register_block_type(array(
         'name'              => 'popup-video',
         'title'             => __('Popup Video'),
         'description'       => __('Popup Video'),
         'render_template'   => './inc/blocks/popup-video/popup-video.php',
         'category'          => 'New blocks',
         'icon'              => 'admin-comments',
         //'keywords'          => array( 'popup-video', 'quote' ),
         //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/popup-video/popup-video.css',
     ));
    
}


function latest_winners() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'latest-winners',
        'title'             => __('Latest Winners', 'ahti_lang'),
        'description'       => __('Latest Winners', 'ahti_lang'),
        'render_template'   => './inc/blocks/latest-winners/latest-winners.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'latest-winners', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function the_testimonials() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'the-testomonials',
        'title'             => __('Testimonials', 'ahti_lang'),
        'description'       => __('Testimonials', 'ahti_lang'),
        'render_template'   => './inc/blocks/the-testimonials/the-testimonials.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'the-testimonials', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}


function blog_post_hp() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'blog-post-hp',
        'title'             => __('Blog Post for Hp', 'ahti_lang'),
        'description'       => __('Blog Post for Hp', 'ahti_lang'),
        'render_template'   => './inc/blocks/blog-post-hp/blog-post-hp.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'blog-post-hp', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function trustly_tab() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'trustly-tab',
        'title'             => __('Trustly Tab', 'ahti_lang'),
        'description'       => __('Trustly Tab', 'ahti_lang'),
        'render_template'   => './inc/blocks/trustly-tab/trustly-tab.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'trustly-tab', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function percentage_range() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'percentage-range',
        'title'             => __('Percentage Range', 'ahti_lang'),
        'description'       => __('Percentage Range', 'ahti_lang'),
        'render_template'   => './inc/blocks/percentage-range/percentage-range.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'percentage-range', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function game_header() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'game-header',
        'title'             => __('Game Header', 'ahti_lang'),
        'description'       => __('Game Header', 'ahti_lang'),
        'render_template'   => './inc/blocks/game-header/game-header.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'game-header', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}


function payments_tab() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'payments-tab',
        'title'             => __('Payments Tab', 'ahti_lang'),
        'description'       => __('Payments Tab', 'ahti_lang'),
        'render_template'   => './inc/blocks/payments-tab/payments-tab.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'payments-tab', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}


function background_image_with_content() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'background-image-with-content',
        'title'             => __('Background Image with Logo and Button', 'ahti_lang'),
        'description'       => __('Background Image with Logo and Button', 'ahti_lang'),
        'render_template'   => './inc/blocks/background-image-with-content/background-image-with-content.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'background-image-with-content', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function image_mobile_desktop() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'image-mobile-desktop',
        'title'             => __('Image for Mobile and Desktop View', 'ahti_lang'),
        'description'       => __('Image for Mobile and Desktop View', 'ahti_lang'),
        'render_template'   => './inc/blocks/image-mobile-desktop/image-mobile-desktop.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'image-mobile-desktop', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function providers_archive_header() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'providers-archive-header',
        'title'             => __('Providers Archive Header', 'ahti_lang'),
        'description'       => __('Image for Mobile and Desktop View', 'ahti_lang'),
        'render_template'   => './inc/blocks/providers-archive-header/providers-archive-header.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'providers-archive-header', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}


//function home_caro_slider() {
//
//    // register a latest_winners.
//    acf_register_block_type(array(
//        'name'              => 'home-caro-slider',
//        'title'             => __('Home Carousel Slider', 'ahti_lang'),
//        'description'       => __('Home Carousel Slider', 'ahti_lang'),
//        'render_template'   => './inc/blocks/home-caro-slider/home-caro-slider.php',
//        'category'          => 'New blocks',
//        'icon'              => 'admin-comments',
//        'keywords'          => array( 'home-caro-slider', 'quote' ),
//        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
//    ));
//
//}

function yellow_btn() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'yellow-btn',
        'title'             => __('Yellow Button', 'ahti_lang'),
        'description'       => __('Yellow Button', 'ahti_lang'),
        'render_template'   => './inc/blocks/yellow-btn/yellow-btn.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'yellow-btn', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function payments_with_type() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'payments-with-type',
        'title'             => __('Payment Lists', 'ahti_lang'),
        'description'       => __('Payment Lists', 'ahti_lang'),
        'render_template'   => './inc/blocks/payments-with-type/payments-with-type.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'payments-with-type', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}


function grid_thumbnails() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'grid-thumbnails',
        'title'             => __('Grid Thumbnails', 'ahti_lang'),
        'description'       => __('Grid Thumbnails', 'ahti_lang'),
        'render_template'   => './inc/blocks/grid-thumbnails/grid-thumbnails.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'grid-thumbnails', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function the_grid_thumbnails() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'the-grid-thumbnails',
        'title'             => __('The Grid Thumbnails', 'ahti_lang'),
        'description'       => __('The Grid Thumbnails', 'ahti_lang'),
        'render_template'   => './inc/blocks/the-grid-thumbnails/the-grid-thumbnails.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'the-grid-thumbnails', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}


function game_iframe_img() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'game-iframe-img',
        'title'             => __('Game Iframe Img', 'ahti_lang'),
        'description'       => __('Game Iframe Img', 'ahti_lang'),
        'render_template'   => './inc/blocks/game-iframe-img/game-iframe-img.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'game-iframe-img', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function single_game_info() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'single-game-info',
        'title'             => __('Single Game Info', 'ahti_lang'),
        'description'       => __('Single Game Info', 'ahti_lang'),
        'render_template'   => './inc/blocks/single-game-info/single-game-info.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'single-game-info', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function game_image() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'game-image',
        'title'             => __('Game Image', 'ahti_lang'),
        'description'       => __('Game Image', 'ahti_lang'),
        'render_template'   => './inc/blocks/game-image/game-image.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'game-image', 'quote' ),
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

function promotion_block_one() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'promotion_block_one',
        'title'             => __('Promo Block 1', 'ahti_lang'),
        'description'       => __('Promo Block 1', 'ahti_lang'),
        'render_template'   => './inc/blocks/promotion-block-one/promotion-block-one.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'promotion-block-one', 'quote' ),
        'mode' => 'edit'
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}


function promotion_block_four() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'promotion_block_four',
        'title'             => __('Promo Block 4 Prizes', 'ahti_lang'),
        'description'       => __('Promo Block 4 Prizes', 'ahti_lang'),
        'render_template'   => './inc/blocks/promotion-block-four/promotion-block-four.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'promotion-block-four', 'quote' ),
        'mode' => 'edit'
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}


function arvostelut_question_answer() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'arvostelut_question_answer',
        'title'             => __('Arvostelut Question & Answer', 'ahti_lang'),
        'description'       => __('Arvostelut Question & Answer', 'ahti_lang'),
        'render_template'   => './inc/blocks/arvostelut-question-answer/arvostelut-question-answer.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'arvostelut-question-answer', 'quote' ),
        'mode' => 'edit'
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}


// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'homepage_tabs');
    add_action('acf/init', 'latest_winners');
    add_action('acf/init', 'the_testimonials');
    add_action('acf/init', 'blog_post_hp');
    add_action('acf/init', 'trustly_tab');
    add_action('acf/init', 'percentage_range');
    add_action('acf/init', 'game_header');
    add_action('acf/init', 'payments_tab');
    add_action('acf/init', 'popup_video');
    add_action('acf/init', 'background_image_with_content');
    add_action('acf/init', 'image_mobile_desktop');
    add_action('acf/init', 'providers_archive_header');
//    add_action('acf/init', 'home_caro_slider');
    add_action('acf/init', 'yellow_btn');
    add_action('acf/init', 'payments_with_type');
    add_action('acf/init', 'grid_thumbnails');
    add_action('acf/init', 'the_grid_thumbnails');
    add_action('acf/init', 'game_iframe_img');
    add_action('acf/init', 'single_game_info');
    add_action('acf/init', 'game_image');
    add_action('acf/init', 'promotion_block_one');
    add_action('acf/init', 'promotion_block_four');
    add_action('acf/init', 'arvostelut_question_answer');
}    

