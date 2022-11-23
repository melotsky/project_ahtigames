<?php
/**
 * Template Name: Landing Page 022 Template
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
$mob_img2 = wp_get_attachment_image_src(get_field('main_image_character_mob'), 'full'); //main_image_character_mob
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
            <div class="main_bg_mob_lp001" style="background-image: url(<?php _e($mob_img1[0])?>)">
                <div class="main_char_mob_temp002">
                    <?php $mob_img2 = $mob_img2[0]?>
                    <img src="<?php _e($mob_img2)?>" class="data-no-lazy" />              
                </div>
            </div>
        <?php endif; ?>


    </div>

    <header id="lp001__header" class="group">

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
            <img src="<?php _e($mobile_logo[0])?>">
        </a>

        <div id="lp001__header_mobile_contnet" class="group temp002">
            <h1><?php the_field('main_title_mob_lp') ?></h1>
            <?php if( get_field('sub_title_mob_lp') ) : ?>
                <h2><?php the_field('sub_title_mob_lp') ?></h2>
            <?php else: 
            $theclass__helper = "xtrap__helper";
            endif; ?>
            <p class="<?php _e($theclass__helper)?>"><?php the_field('extra_content_lpcont') ?></p>
        </div>

        <div id="lp001__header_mobile_btns" class="group temp002">
            <p class="colored_btn_holder_mob">
                <a rel="nofollow" href="#" onclick="CU_SON_API.auth_open_registration(); return false;"><?php the_field('none_transparent_button_label_mob_lp')?></a>
            </p>
        </div>
    </header> 
    

    <?php 
    if( get_field('enable_link_only') == 0 ) :?>
        <?php 
            $button_text_lp = get_field('button_text_lp');
            $terms_condition_lp = get_field('terms_condition_lp');
            if( $button_text_lp && $terms_condition_lp ): ?>
                        <div id="mydiv1" style="display:none;">
                        <div class="lightboxcontainer">
                            <div class="lightboxleft">
                            <div class="divtext">
                                <div class="entry-content">
                                    <?php the_field('terms_condition_full_lp002')?>
                                </div>
                            </div>
                            </div>

                            <div style="clear:both;"></div>
                        </div>
                        </div>                                
            <div id="lp_tnc_mob" class="group">
                <div class="lp_tnc_mob__content group">
                    <p>
                        <?php the_field('terms_condition_lp')?> 
                        <?php if(get_field('popup_label_lp002')) :?>
                            <a href="#mydiv1" class="html5lightbox"><?php the_field('popup_label_lp002')?></a>
                        <?php endif; ?>
                    </p>
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
    $desk_img2 = wp_get_attachment_image_src(get_field('main_image_desk_character'), 'full'); //main_background_image_mob
    
    ?>
    <!-- the  body start -->
    <div id="lp001_desktop__thebg">
        <?php if($desk_img1) :?>
            <div class="main_bg_desk_lp001 temp002" style="background-image: url(<?php _e($desk_img1[0])?>)">
                <div class="main_bg_desk_lp001__char">
                <img src="<?php _e($desk_img2[0])?>" srcset="<?php echo wp_get_attachment_image_srcset( $desk_img2[0], '' ); ?>" />
                </div>
            </div>
        <?php endif; ?>

        
    </div>
    <!-- the  body END-->

    <!-- desktop buttons start-->
    <div id="lp001_desktop__text" class="group site-main">
        <div id="lpdt__wrapper" class="group">
            <div class="lpdt__tbl ">
                <div class="lpdt__tblc text_sld_anim1 temp002">
                    <h1><?php the_field('main_title_mob_lp') ?></h1>
                    <?php if( get_field('sub_title_mob_lp') ) : ?>
                        <h2><?php the_field('sub_title_mob_lp') ?></h2>
                    <?php endif; ?>
                    <p><?php the_field('extra_content_lpcont') ?></p>

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
                        <div id="mydiv2" style="display:none;">
                        <div class="lightboxcontainer">
                            <div class="lightboxleft">
                            <div class="divtext">
                                <div class="entry-content">
                                    <?php the_field('terms_condition_full_lp002')?>
                                </div>
                            </div>
                            </div>

                            <div style="clear:both;"></div>
                        </div>
                        </div>            
            <div id="lp_tnc_mob" class="group fordeskty">
                <div class="lp_tnc_mob__content group showthis">
                    <p><?php the_field('terms_condition_lp')?> <?php if(get_field('popup_label_lp002')) :?><a href="#mydiv2" class="html5lightbox"><?php the_field('popup_label_lp002')?></a><?php endif;?></p>
                    <div class="footer__links group">
                        <div class="footer__links_tb">
                        <div class="footer__links_tb_cell">
                        <p class="group fl_one__mob">
                            <img class="egtl" src="<?php echo get_stylesheet_directory_uri()?>/assets/css/images/tmpl001/18-desktop.png" /> <a class="tpl001_dh1" href="<?php the_field('target_link_lpheader') ?>" rel="noopener nofollow" ><?php the_field('18+_label_lpheader') ?></a>
                        </p>
                        <p class="group fl_two__mob">
                            <a rel="noopener nofollow" href="<?php the_field('mga_link_lpheader') ?>"  class="tpl001_dh2"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/css/images/tmpl001/mga-desktop.png" /></a>                            
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
