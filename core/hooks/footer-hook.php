<?php 
if ( !defined('ABSPATH')) exit;
use cumuli\son_api\Helper;

function theFooterHook(){
    do_action('theFooterHook');
}

function footerWrapperStart(){
    echo '<section id="secFooter" class="group lv__bg">';
    echo '<div id="secFooterHelper" class="group">';
    echo '<footer id="masterFooter" class="group site-360px">';
}

function footerWrapperEnd(){
    echo '</footer></div>'; 
    //echo '<div id="lastFooterWrapper" class="group"><div id="lastFooter" class="group site-1400px">';
    //echo '<p><a href="https://www.eteam.dk/" target="_blank"><span>E</span>team.dk</a></p>';
    //echo '</div></div>'; ?>
    </section>
    <div style="display: none !important"><div id="backtotop" class="group" style="display: none"> <span></span> </div></div>
    </div><!-- #the-site-holder END -->
        <div id="ls__mob" class="group">
        <div id="lsx__mob" class="group">
        <a href="#" onclick="CU_SON_API.auth_open_login(); return false;" id="ls__login"><?php Helper::ln_e('log in'); ?></a>
        <a href="#" onclick="CU_SON_API.auth_open_registration(); return false;" id="ls__signup"><?php Helper::ln_e('sign up'); ?></a>
        </div>
        </div>
    </div> <!-- #sb-site END -->
<?php }

function footerLogo(){
    $theUrl = get_site_url();
    $footerLogo = wp_get_attachment_image_src(get_field('footer_logo', 'option'), 'full'); 
    $startWrapper = '<div id="cptrFooter" class="group">';
    $startWrapper .= '<a href="'. home_url( '/' ) .'">';
    $startWrapper .= '<img id="footerLogo" src="'. $footerLogo[0] .'" alt="'. get_bloginfo('name') .'" title="'. get_bloginfo('name') .'" /></a>';
    $startWrapper .= '<p>&copy; Copyright '. date("Y"). ' <a href="'. home_url( '/' ) .'">' .  getDomain($theUrl) . '</a><br />';
    $startWrapper .= ' All rights reserved.</p></div>';
    echo $startWrapper;
    //getDomain($theUrl)
}

function rightAreaStartWrap() {
    $rightAreaStartWrap = '<div id="rightFooter" class="group">';
    echo $rightAreaStartWrap;
}

function rightAreaEndWrap() {
    $rightAreaEndWrap = '</div>';
    echo $rightAreaEndWrap;
}

function mainRightFooter(){ 
    ob_start();
    dynamic_sidebar( 'footermenu' );
    $theMenu = ob_get_contents();
    $mainRightFooter = '<div id="footerMenu1" class="group footerClassSupport">';
    $mainRightFooter .= $theMenu . '</div>';
    ob_end_clean();
    echo $mainRightFooter;

    ob_start();
    dynamic_sidebar( 'fifp' );
    $theSecMenux = ob_get_contents();
    $xmainSecRightFooter = '<div id="footerInformationWidg" class="group footerClassSupport">';
    $xmainSecRightFooter .= $theSecMenux . '</div>';
    ob_end_clean();
    echo $xmainSecRightFooter;

    ob_start();
    dynamic_sidebar( 'cifp' );
    $theContactWid = ob_get_contents();
    $theContactWidWrappers = '<div id="footerContactWidg" class="group footerClassSupport">';
    $theContactWidWrappers .= $theContactWid . '</div>';
    ob_end_clean();
    echo $theContactWidWrappers;
}

function popup_form() {
    global $post;
    if ( get_field('enable_popup_form', $post->ID) ) :
        $rf_title = get_field( 'title_of_the_form', $post->ID );
        $form_shortcode = get_field( 'form_shortcode', $post->ID );
        echo "<div id=\"regulator-form\" class=\"popup-form mfp-hide\">";
        echo "<div class=\"group rf_inner_wrapper\">";
        echo "<h3 class=\"rf_title\">{$rf_title}</h3>";
        echo "<div id=\"the_cf7_form\" class=\"group tcf7\">";
        echo do_shortcode( $form_shortcode );
        echo "</div>";
        echo "</div></div>";
    endif; 

}

function the_popup_box(){
    global $post;
    $box1 = get_field('content_b1', $post->ID );
    $box2 = get_field('content_b2', $post->ID );
    $box3 = get_field('content_b3y', $post->ID );
    if ( get_field('box_1', $post->ID) ) :
        echo "<div id=\"popupbox-1\" class=\"popup-form mfp-hide\">";
        echo "<div class=\"group entry-content entry-helper\">";
        echo $box1;
        echo "<div class=\"pop-linker\"><a href=\"#popupbox-2\" class=\"popup-form-toggle\">Næste</a></div>";
        echo "</div></div>";
        echo "<div id=\"popupbox-2\" class=\"popup-form mfp-hide\">";
        echo "<div class=\"group entry-content entry-helper\">";
        echo $box2;
        echo "<div class=\"pop-linker\"><a href=\"#popupbox-3\" class=\"popup-form-toggle\">Næste</a></div>";
        echo "</div></div>";
        echo "<div id=\"popupbox-3\" class=\"popup-form mfp-hide\">";
        echo "<div class=\"group entry-content entry-helper\">";
        echo $box3;
        echo "<div class=\"pop-linker\"><a href=\"#popupbox-1\" class=\"popup-form-toggle\">Næste</a></div>";
        echo "</div></div>";
    endif;
}

function read_more_content(){ 
    ob_start();
    dynamic_sidebar( 'frm' );
    $readmore = ob_get_contents();
    $readmore_content = '<div id="read_more__wrapper" class="group read_more__wrapper">';
    $readmore_content .= $readmore . '</div>';
    ob_end_clean();
    echo $readmore_content;
}

function second_widget_footer(){ 
    ob_start();
    dynamic_sidebar( 'frm2' );
    $content = ob_get_contents();
    $wrapper = '<div id="footer__2nd" class="group fw__wrapper">';
    $wrapper .= $content . '</div>';
    ob_end_clean();
    echo $wrapper;
}

function third_widget_footer(){ 
    ob_start();
    dynamic_sidebar( 'frm3' );
    $content = ob_get_contents();
    $wrapper = '<div id="footer__3rd" class="group fw__wrapper">';
    $wrapper .= $content . '</div>';
    ob_end_clean();
    echo $wrapper;
}

function fourth_widget_footer(){ 
    ob_start();
    dynamic_sidebar( 'frm4' );
    $content = ob_get_contents();
    $wrapper = '<div id="footer__4th" class="group fw__wrapper">';
    $wrapper .= $content . '</div>';
    ob_end_clean();
    echo $wrapper;
}


function footer_lang_switcher(){
    
    $flag = array("fin-flag.png", "en-flag.png", "norway-flag.png", "deutsch-flag.png", "dansk-flag.png", "svenska-flag.png");
    $langt = array("fi", "eng", "nor", "de", "da", "sv");
    $langname = array("soumi", "english", "norsk", "deutsch", "dsanish", "swenska");

    $current_lang_local = array("fi", "en-GB", "nb-NO", "de-DE", "da-DK", "sv-SE");
    $flag_holder = array("fi"=>"fin-flag.png", "en_GB"=>"en-flag.png", "no"=>"norway-flag.png", "de_DE"=>"deutsch-flag.png", "da_DK"=>"dansk-flag.png", "sv_SE"=>"svenska-flag.png");
    $flag_name = array("fi"=>"suomi", "en_GB"=>"english", "no"=>"norsk", "de_DE"=>"deutsch", "da_DK"=>"dansk", "sv_SE"=>"svenska");    

    $tobe_converted = $current_locale = get_locale();
    $converted = str_replace( '_', '-', $tobe_converted );
    $current_flag_holder = $flag_holder[ $current_locale ];
    $current_flag_name = $flag_name[ $current_locale ];

    $full_path_current_flag_holder = get_template_directory_uri() . "/assets/css/images/" . $current_flag_holder;
    
    ?>
    <div id="lang_switcher_desktop" class="group">
        <div id="lsd_current_lang" class="group">
            <img src="<?php _e($full_path_current_flag_holder)?>" />
            <span><?php _e($current_flag_name) ?></span>
        </div>
        <ul id="lsd_dplang" style="display: none;">
        <?php
        $translations = pll_the_languages( array('raw'=>1) );
        $da = "da";
        $sv = "sv";
        $counter=1;
        $xcounter=0;
        foreach($translations as $lang) { 
            $url = $lang['url'];
            $slugs = $lang['slug'];
            $the_flag = current($flag);
            $thelang = current($langt); 
            $full_flag = get_template_directory_uri() . "/assets/css/images/";
            $full_flag .= $the_flag; 
            $name = $lang['name'];
            $thelang = $lang['current_lang'];
            if ( $thelang == "1"): $hideclass= "hidethis_lang"; endif; ?>
            <?php
            if ( $da == $slugs ):
                next($langt);
                next($flag);               
                $hideclass ="";
                $counter++;    
                continue;
            endif;
            if ( $sv == $slugs ):
                next($langt);
                next($flag);               
                $hideclass ="";
                $counter++;    
                continue;
            endif;
            ?>
            <li class="<?php _e($hideclass)?> group <?php _e($slugs)?>">
                <a href="<?php _e($url)?>" class="lang_switcher_item_footer <?php _e($slugs)?>">
                    <img src="<?php _e($full_flag)?>" /> <span><?php _e($langname[$xcounter])?></span>
                </a>
            </li>
        <?php 
            next($langt);
            next($flag);
            $hideclass ="";
            $xcounter++;
            $counter++;    
        }
        ?>
        </ul>

    </div>

    <script type="text/javascript">
    jQuery(document).ready(function(){
        // Show hide popover
        jQuery("#lsd_current_lang").click(function(){
            jQuery("#lsd_dplang").slideToggle("fast");
        });

        jQuery("#lsd_dplang li.hidethis_lang, #lsd_dplang li.da, #lsd_dplang li.sv").remove();
    });    

    jQuery(document).on("click", function(event){
        var $trigger = jQuery("#lang_switcher_desktop");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            jQuery("#lsd_dplang").slideUp("fast");
        }            
    });
    </script>

    <?php

}

function copyright_and_logo(){
    $theUrl = get_site_url();
    $domain = getDomain($theUrl);
    $footer_logo = wp_get_attachment_image_src(get_field('footer_logo', 'option'), 'full');
    $convert_this = esc_html__( 'All rights reserved.', 'ahti_lang' );
    $date = date("Y"); ?>
    <div id="footer__2nd" class="group fw__wrapper">
        <div id="the_last_footer" class="group">
            <div id="footer_lang_switcher" class="group">
                <?php footer_lang_switcher();?>
            </div>
            <p>&copy; <?php _e($date) ?> <a href="<?php _e($theUrl) ?>"><?php _e($domain) ?></a> <?php Helper::ln_e('Inc.');?> <?php Helper::ln_e('All rights reserved.');?></p>
            <a href="<?php _e($theUrl) ?>"><img class="the_footer_logo" src="<?php _e($footer_logo[0]) ?>"></a>
        </div>
    </div>
    <?php
    //echo $startWrapper;    
}

function login_signup_mobile(){ ?>
     <div id="ls__mob" class="group">
         <div id="lsx__mob" class="group">
         <a href="#" onclick="CU_SON_API.auth_open_login(); return false;" id="ls__login"><?php Helper::ln_e('log in'); ?></a>
         <a href="#" onclick="CU_SON_API.auth_open_registration(); return false;" id="ls__signup"><?php Helper::ln_e('sign up'); ?></a>
         </div>
     </div>
<?php }


function data_layer_push(){
  $section = '';

  if(is_front_page()){
    $section = 'Home Page';
  }else{
    $section = get_permalink();
    $section = trim(str_replace( home_url(), "", $section ),'/');
  }

  if(!empty($section)):
?>
    <script>
      setTimeout(()=>dataLayerPush({ "visitSection": "<?=$section?>", "event": "userChangePage" }),1500);
    </script>
<?php
  endif;
?>
<?php }

add_action('theFooterHook', 'footerWrapperStart', 2);
add_action('theFooterHook', 'read_more_content', 3);
add_action('theFooterHook', 'second_widget_footer', 4);
add_action('theFooterHook', 'third_widget_footer', 5);
add_action('theFooterHook', 'fourth_widget_footer', 6);
add_action('theFooterHook', 'copyright_and_logo', 7);
add_action('theFooterHook', 'footerWrapperEnd', 100);
add_action('theFooterHook', 'data_layer_push', 300);