<?php
/**
 * Template Name: Landing Page 001 Template
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head> 
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" maximum-scale=1.0, />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php
if ( is_singular() && get_option( 'thread_comments' ) )
wp_enqueue_script( 'comment-reply' );
wp_head();

?>
</head>
<body <?php body_class('temp001'); ?>>

<?php
$mob_img1 = wp_get_attachment_image_src(get_field('main_background_image_mob'), 'lpt001_mob_main_bg'); //main_background_image_mob
$mob_img2 = wp_get_attachment_image_src(get_field('main_image_character_mob'), 'lpt001_mob_main_bg'); //main_image_character_mob
$mob_img3 = wp_get_attachment_image_src(get_field('supporting_image_1_mob'), 'lpt001_mob_main_bg'); //supporting_image_1_mob
$mob_img4 = wp_get_attachment_image_src(get_field('supporting_image_2_mob'), 'lpt001_mob_main_bg'); //supporting_image_2_mob
$mob_img5 = wp_get_attachment_image_src(get_field('supporting_image_3_mob'), 'lpt001_mob_main_bg'); //supporting_image_3_mob
do_shortcode('[cu_son_api_widget widgetclass=Login]');
$img = get_stylesheet_directory_uri() . "/assets/css/images/18.png";
$mobile_logo = wp_get_attachment_image_src(get_field('mobile_logo_mob'), 'full');
?>

<div class="lp001_mobile group">
    <div class="lp001_mobile__imgwrapper">
        <?php if($mob_img1) :?>
            <div class="main_bg_mob_lp001" style="background-image: url(<?php _e($mob_img1[0])?>)"></div>
        <?php endif; ?>

        <?php if($mob_img5) :?>
            <div class="front_stone5_mob_lp001" style="background-image: url(<?php _e($mob_img5[0])?>)"></div>
        <?php endif; ?>

        <?php if($mob_img2) :?>
            <div class="main_character_mob_lp001" style="background-image: url(<?php _e($mob_img2[0])?>)"></div>
        <?php endif; ?>

        <?php if($mob_img3) :?>
            <div class="front_stone1_mob_lp001" style="background-image: url(<?php _e($mob_img3[0])?>)"></div>
        <?php endif; ?>

        <?php if($mob_img4) :?>
            <div class="front_stone2_mob_lp001" style="background-image: url(<?php _e($mob_img4[0])?>)"></div>
        <?php endif; ?>
    </div>

    <header id="lp001__header" class="group">

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
            <img src="<?php _e($mobile_logo[0])?>">
        </a>

        <div id="lp001__header_mobile_contnet" class="group">
            <h1><?php the_field('main_title_mob_lp') ?></h1>
            <h2><?php the_field('sub_title_mob_lp') ?></h2>
        </div>

        <div id="lp001__header_mobile_btns" class="group">
            <p class="colored_btn_holder_mob">
                <a rel="nofollow" href="#" onclick="CU_SON_API.auth_open_registration(); return false;"><?php the_field('none_transparent_button_label_for_mobile')?></a>
            </p>
        </div>
    </header> 

    <?php 
    if( get_field('enable_link_only') == 0 ) :?>
        <?php 
            $button_text_lp = get_field('button_text_lp');
            $terms_condition_lp = get_field('terms_condition_lp');
            if( $button_text_lp && $terms_condition_lp ): ?>
            <div id="lp_tnc_mob" class="group">
                <div class="lp_tnc_mob__content group">
                    <?php the_field('terms_condition_lp')?>
                    <div class="footer__links group">
                        <div class="footer__links_tb">
                        <div class="footer__links_tb_cell">
                        <p class="group fl_one__mob">
                            <img class="egtl" src="<?php echo get_stylesheet_directory_uri()?>/assets/css/images/tmpl001/18-desktop.png" /> <a class="tpl001_dh1" href="<?php the_field('target_link_lpheader') ?>" rel="noopener nofollow" ><?php the_field('18+_label_lpheader') ?></a>
                        </p>
                        <p class="group fl_two__mob">
                            <a rel="noopener nofollow" href="<?php the_field('target_link_lpheader') ?>"  class="tpl001_dh2"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/css/images/tmpl001/mga-desktop.png" /></a>                            
                        </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
    <?php else: ?>
            <div id="lp_tnc_mob" class="group">
                <div class="lp_tnc_mob__toggler group">
                    <a href="<?php the_field('target_linkxx_lp')?>" rel="nofollow"><?php the_field('link_label_lp')?></a>
                </div>
            </div>    
    <?php endif; ?>

</div>

<div class="lp001_desktop" style="display: none">
    
    <!--HEADER AREA START DESKTOP -->
    <div class="header-helper-desktop group">
    <header id="lp001_desktop__header" class="group site-header ">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
            <img src="<?php _e($mobile_logo[0])?>" class="lp001_desktop__logo">
        </a>


    </header>
    </div>
    <!--HEADER AREA END DESKTOP -->

    <?php
    $desk_img1 = wp_get_attachment_image_src(get_field('main_background_image_desk'), 'lpt001_desk_main_bg'); //main_background_image_mob
    $desk_img2 = wp_get_attachment_image_src(get_field('main_image_desk_character'), 'lpt001_desk_main_bg'); //main_background_image_mob
    $desk_img3 = wp_get_attachment_image_src(get_field('supporting__image_1_desk'), 'lpt001_desk_main_bg2'); //main_background_image_mob
    $desk_img4 = wp_get_attachment_image_src(get_field('supporting__image_2_desk'), 'lpt001_desk_main_bg2'); //main_background_image_mob
    $desk_img5 = wp_get_attachment_image_src(get_field('supporting__image_3_desk'), 'lpt001_desk_main_bg2'); //main_background_image_mob
    $desk_img6 = wp_get_attachment_image_src(get_field('supporting__image_4_desk'), 'lpt001_desk_main_bg2'); //main_background_image_mob
    $desk_img7 = wp_get_attachment_image_src(get_field('supporting__image_5_desk'), 'lpt001_desk_main_bg2'); //main_background_image_mob
    $desk_img8 = wp_get_attachment_image_src(get_field('supporting__image_6_desk'), 'lpt001_desk_main_bg2'); //main_background_image_mob
    $desk_img9 = wp_get_attachment_image_src(get_field('supporting__image_7_desk'), 'lpt001_desk_main_bg2'); //main_background_image_mob
    ?>
    <!-- the  body start -->
    <div id="lp001_desktop__thebg">
        <?php if($desk_img1) :?>
            <div class="main_bg_desk_lp001" style="background-image: url(<?php _e($desk_img1[0])?>)"></div>
        <?php endif; ?>

        <?php if($desk_img7) :?>
            <div class="hidden_stone7_desk_lp001" style="background-image: url(<?php _e($desk_img7[0])?>)"></div>
        <?php endif; ?>

        <?php if($desk_img2) :?>
            <div class="main_character_desk_lp001" style="background-image: url(<?php _e($desk_img2[0])?>)"></div>
        <?php endif; ?>

        <?php if($desk_img3) :?>
            <div class="the_100" style="background-image: url(<?php _e($desk_img3[0])?>)"></div>
        <?php endif; ?>

        <?php if($desk_img8) :?>
            <div class="the_leftright_stone1" style="background-image: url(<?php _e($desk_img8[0])?>)"></div>
        <?php endif; ?>

        <?php if($desk_img9) :?>
            <div class="the_leftright_stone2" style="background-image: url(<?php _e($desk_img9[0])?>)"></div>
        <?php endif; ?>

        <?php if($desk_img4) :?>
            <div class="hidden_stone4_desk_lp001" style="background-image: url(<?php _e($desk_img4[0])?>)"></div>
        <?php endif; ?>

        <?php if($desk_img5) :?>
            <div class="hidden_stone5_desk_lp001" style="background-image: url(<?php _e($desk_img5[0])?>)"></div>
        <?php endif; ?>
        <?php if($desk_img6) :?>
            <div class="hidden_stone6_desk_lp001" style="background-image: url(<?php _e($desk_img6[0])?>)"></div>
        <?php endif; ?>

        
    </div>
    <!-- the  body END-->

    <!-- desktop buttons start-->
    <div id="lp001_desktop__text" class="group site-main">
        <div id="lpdt__wrapper" class="group">
            <div class="lpdt__tbl">
                <div class="lpdt__tblc text_sld_anim1">
                    <h1><?php the_field('main_title_mob_lp') ?></h1>
                    <h2><?php the_field('sub_title_mob_lp') ?></h2>

                    <div class="tmpl__btn12s">
                        <div class="tb2kp group">
                            <a rel="nofollow" href="#" onclick="CU_SON_API.auth_open_registration(); return false;"><?php the_field('none_transparent_button_label_mob_lp') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- desktop buttons end-->


    <?php 
    if( get_field('enable_link_only') == 0 ) :?>
        <?php 
            $button_text_lp = get_field('button_text_lp');
            $terms_condition_lp = get_field('terms_condition_lp');
            if( $button_text_lp && $terms_condition_lp ): ?>
            <div id="lp_tnc_mob" class="group fordeskty">
                <div class="lp_tnc_mob__content group showthis">
                    <?php the_field('terms_condition_lp')?>
                    <div class="footer__links group">
                        <div class="footer__links_tb">
                        <div class="footer__links_tb_cell">
                        <p class="group fl_one__mob">
                            <img class="egtl" src="<?php echo get_stylesheet_directory_uri()?>/assets/css/images/tmpl001/18-desktop.png" /> <a class="tpl001_dh1" href="<?php the_field('target_link_lpheader') ?>" rel="noopener nofollow" ><?php the_field('18+_label_lpheader') ?></a>
                        </p>
                        <p class="group fl_two__mob">
                            <a rel="noopener nofollow" href="<?php the_field('target_link_lpheader') ?>"  class="tpl001_dh2"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/css/images/tmpl001/mga-desktop.png" /></a>                            
                        </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
    <?php else: ?>
            <div id="lp_tnc_mob" class="group fordeskty">
                <div class="lp_tnc_mob__toggler group">
                    <a href="<?php the_field('target_linkxx_lp')?>" rel="nofollow"><?php the_field('link_label_lp')?></a>
                </div>
            </div>    
    <?php endif; ?>    


</div>
<?php 
wp_footer();
?>
</body>
</html>
