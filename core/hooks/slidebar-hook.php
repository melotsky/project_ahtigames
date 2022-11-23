<?php 


if ( !defined('ABSPATH')) exit;
use cumuli\son_api\Helper;



/*************************/
/* FOR SLIDEBAR AREA START */
/*************************/

function my_slidebar() {
    do_action('my_slidebar');
}

function sliderbarWrapperStart(){
    // Responsive Slidedrbar Start
    $sliderbarWrapperStart = '<!--RESPONSIVE SLIDE BAR WITH RESPONSIVE MENU SLICK NAV -->';
    $sliderbarWrapperStart .= '<div id="resp-sidebar" class="sb-slidebar sb-left group">';
    $sliderbarWrapperStart .= '<div class="group resp-sidebar-main-wrapper"><div id="wrapper_SB" class="group">';
    echo $sliderbarWrapperStart;
}

function sliderbarWrapperEnd(){
    // Responsive Slidedrbar End    
    $sliderbarWrapperEnd = '</div></div></div>'; 
    $sliderbarWrapperEnd .= '<!--RESPONSIVE SLIDE BAR WITH RESPONSIVE MENU SLICK NAV -->';
    $sliderbarWrapperEnd .= '<!-- HOLDER OF SITE -->';
    $sliderbarWrapperEnd .= '<div id="sb-site" class="group">';
    $sliderbarWrapperEnd .= '<div id="the-site-holder" class="group" style="position: relative;">';
    echo $sliderbarWrapperEnd;
  }


function header_lang_switcher_mobile(){
    
    $flag = array("fin-flag.png", "en-flag.png", "norway-flag.png", "deutsch-flag.png", "dansk-flag.png", "svenska-flag.png");
    $langt = array("fi", "eng", "nor", "de", "da", "sv");
    $langname = array("soumi", "english", "norsk", "deutsch", "dsanish", "swenska");

    $current_lang_local = array("fi", "en-GB", "nb-NO", "de-DE", "da-DK", "sv-SE");
    $flag_holder = array("fi"=>"fin-flag.png", "en_GB"=>"en-flag.png", "no"=>"norway-flag.png", "de_DE"=>"deutsch-flag.png", "da_DK"=>"dansk-flag.png", "sv_SE"=>"svenska-flag.png");
    $flag_name = array("fi"=>"suomi", "en_GB"=>"english", "no"=>"norsk", "de_DE"=>"deutsch", "da_DK"=>"dansk", "sv_SE"=>"svenska");    

    $tobe_converted = $current_locale = get_locale();
    $converted = str_replace( '_', '-', $tobe_converted );
    //echo $converted . "<br>";
    //echo $new = in_array( $current_locale, $current_lang_local );
    $current_flag_holder = $flag_holder[ $current_locale ];
    $current_flag_name = $flag_name[ $current_locale ];

    $full_path_current_flag_holder = get_template_directory_uri() . "/assets/css/images/" . $current_flag_holder;
    
    ?>
    <div id="slidebar__header" class="group"><div id="close_slidebar"></div>

    <div id="lang_switcher_mobile" class="group">

        <div id="lsd_current_lang_mobile" class="group">
            <img src="<?php _e($full_path_current_flag_holder)?>" />
            <span><?php _e($current_flag_name) ?></span>
        </div>

        <ul id="lsd_dplang_mobile" style="display: none;">
            <?php
            $translations = pll_the_languages(array( 'raw'=>1 ));
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
                    <a href="<?php _e($url)?>" class="lang_switcher_item <?php _e($slugs)?>">
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
    </div>

    <script type="text/javascript">
    jQuery(document).ready(function(){
        // Show hide popover
        jQuery("#lsd_current_lang_mobile").click(function(){
            jQuery("#lsd_dplang_mobile").slideToggle("fast");
        });

        jQuery("#lsd_dplang_mobile li.hidethis_lang, #lsd_dplang_mobile li.da, #lsd_dplang_mobile li.sv").remove();
    });    

    jQuery(document).on("click", function(event){
        var $trigger = jQuery("#lang_switcher_mobile");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            jQuery("#lsd_dplang_mobile").slideUp("fast");
        }            
    });
    </script>

    <?php

}



function theResponsiveLogo(){
    //$login = sprintf( __( 'login', 'ahti_lang' ));
    //$image = wp_get_attachment_image_src(get_field('logo', 'option'), 'full');
    $logoholder = '<div id="slidebar__header" class="group"><div id="close_slidebar"></div>'; 
    //$logoholder .= '<a href="'.esc_url( home_url( '/' ) ).'" class="mblogo">';
    //$logoholder .= '<img id="mobile_logo" src="'. $image[0] .'" alt="'. get_bloginfo('name') .'" title="' . get_bloginfo('name') . '" />';
    //$logoholder .= '</a>';
    header_lang_switcher_mobile();
    $logoholder .= '</div>';
    echo $logoholder;
}

function responsiveMenu(){
    //echo '<div id="responsive-menu" class="group"></div>';
}
function pelitnav_mobile(){
    ob_start();
    dynamic_sidebar( 'slb' );
    $pelitnav_mobile = ob_get_contents();
    $pelitnav_mobile_content = $pelitnav_mobile;
    ob_end_clean();
    echo $pelitnav_mobile_content;
}

function respCopyRight(){
    $theUrl = get_site_url();
    $startWrapper = '<div id="respCptrFooter" class="group sbH_helper">';
    $startWrapper .= '<p>&copy; '. date("Y"). ' <a href="'. home_url( '/' ) .'">' . getDomain($theUrl) . '</a><br />';
    $startWrapper .= 'All rights reserved.</p></div>';
    echo $startWrapper;
}

function contact_information_slide_bar(){
    ob_start();
    dynamic_sidebar( 'cisb' );
    $cisb = ob_get_contents();
    $cisb_content  = '<div id="cisb" class="group">';
    $cisb_content .= $cisb . '</div>';
    ob_end_clean();
    echo $cisb_content;
}



function lang_switcher(){
    
    $flag = array("fin-flag.png", "en-flag.png", "norway-flag.png", "deutsch-flag.png", "dansk-flag.png", "svenska-flag.png");
    $langt = array("fi", "eng", "nor", "de", "da", "sv");

    $translations = pll_the_languages(array('raw'=>1));
    echo "<div id=\"lang-flag-switcher\" class=\"group\"><div class=\"lfs\">";
    $counter=1;
    foreach($translations as $lang) {
        $the_flag = current($flag); 
        
        $thelang = current($langt); 
        
        $full_flag = get_template_directory_uri() . "/assets/css/images/";
        $full_flag .= $the_flag;
        $url = $lang['url'];
        //$name = $lang['name'];
        echo "<div class=\"f-item f-item-{$counter}\"><a href=\"{$url}\">";
        echo "<img src=\"{$full_flag}\" />";
        echo "<div class=\"flag_lang\"><div class=\"flag_langtb\"><div class=\"flag_langtbc\">{$thelang}</div></div></div>";
        echo "</a></div>";
        next($langt);
        next($flag);
        $counter++;
      }
    echo "</div></div>";
}


function information_slidebar(){
    ob_start();
    dynamic_sidebar( 'slb2' );
    $sbr2_widget = ob_get_contents();
    $sbr2 = $sbr2_widget;
    ob_end_clean();
    echo $sbr2;
}






add_action('my_slidebar', 'sliderbarWrapperStart', 1);


add_action('my_slidebar', 'header_lang_switcher_mobile', 1 );
//add_action('my_slidebar', 'theResponsiveLogo', 1 );


add_action('my_slidebar', 'pelitnav_mobile', 4);
add_action('my_slidebar', 'information_slidebar', 5);
//add_action('my_slidebar', 'login_signup_mobile', 10);
//add_action('my_slidebar', 'responsiveMenu', 3);
//add_action('my_slidebar', 'contact_information_slide_bar', 4);
//add_action('my_slidebar', 'lang_switcher', 5);
//add_action('my_slidebar', 'respCopyRight', 6);


add_action('my_slidebar', 'sliderbarWrapperEnd', 100);
