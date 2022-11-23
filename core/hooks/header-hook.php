<?php 
if ( !defined('ABSPATH')) exit;
use cumuli\son_api\Helper;

/*************************/
/* FOR HEADER AREA START */
/*************************/

function my_header() {
    do_action('my_header');
}
function headerWrapperStart1(){ ?>
    <div id="mainHeaderHolder" class="group">
<?php
    //if( is_front_page() or is_page_template( 'templates/template-tarjouksetsub.php' ) ) {
        // ob_start();
        // dynamic_sidebar( 'lnp1' );
        // $ln1 = ob_get_contents();
        // $lnmain = $ln1;
        // ob_end_clean();
        // echo $lnmain;
    //}
    require_once( dirname(__FILE__) . '/beam.php'); // WP OTHER FUNCTIONS FRONT END
}

function the_legal_notice_1(){
    //ob_start();
    //dynamic_sidebar( 'lnp1' );
    //$ln1 = ob_get_contents();
    //$lnmain = $ln1;
    //ob_end_clean();
    //echo $lnmain;
}

function headerWrapperStart(){
    // WRAPPPER FOR HEADER START 
    // FOR IMAGES THAT NEEDS TO LOAD ON THE HEADER
?>
    <section id="secHHolder" class="group">
    <header id="masterHeader" class="group site-header">
<?php
}

function headerWrapperEnd(){
    // WRAPPER FOR HEADER END

    //ob_start();
    //dynamic_sidebar( 'lnp2' );
    $mainln2 = "</header></section>";
    //$ln2 = ob_get_contents();
    $mainln2 .= "</div>";
    //ob_end_clean();
    echo $mainln2;
}

function headerInnerWrapperStart(){
?>
    <div id="innerHeaderWrapper" class="group">
<?php
}

function headerInnerWrapperEnd(){
?>
    </div>
<?php
}

function theHeaderLogo(){
    $footer_logo = wp_get_attachment_image_src(get_field('footer_logo', 'option'), 'full');
    $thelogo_svg = get_stylesheet_directory_uri() . '/assets/css/images/logo.svg';
    $desktop_logo = wp_get_attachment_image_src(get_field('logo', 'option'), 'full');
    $mobile_logo = wp_get_attachment_image_src(get_field('mobile_logo', 'option'), 'full');
    //echo $mobile_logo[0];
    $logoholder = '<div class="logo_holder__header"><a href="'.esc_url( home_url( '/' ) ).'">';
    //$logoholder .= '<img class="desktop_logo__header" id="logo" src="'. $desktop_logo[0] .'" alt="'. get_bloginfo('name') .'" title="' . get_bloginfo('name') . '" />';
    $logoholder .= '<img class="mobile_logo__header" id="logo" src="'. $footer_logo[0] .'" alt="'. get_bloginfo('name') .'" title="' . get_bloginfo('name') . '" />';
    $logoholder .= '</a>';
    $logoholder .= '</div>';
    echo $logoholder;
}

function mainNavDeclaration(){
    ob_start();
    wp_nav_menu( array('container' => 'nav', 'container_class' => 'header-nav group', 'container_id' => 'id_header-nav', 'menu_class' => 'sf-menu', 'menu_id' => 'thenavigator', 'theme_location' => 'main-nav-top-position') );
    $theNavValue = ob_get_contents();
    $mainNav = '<div id="navigation" class="group">';
    $mainNav .= $theNavValue;
    $mainNav .="</div>";
    ob_end_clean();
    echo $mainNav;
  }

function navWrapperStart(){
    echo "<div id=\"nav-holder-right\" class=\"group\"><div id=\"navHolder\" class=\"group\">";
}

function navWrapperEnd(){
    echo "</div></div>";
}

function humbergerMennu(){
    echo "<div id=\"hamMenuHolder\" class=\"group sb-toggle-left show-left showRespMenu\">";
    echo "<div id=\"innerHamMenuHolder\" class=\"group\">";
    echo "<div id=\"hmhBTNHolder\" class=\"group\">";
    echo "<div id=\"btn__holder\" class=\"group\"><span></span><span></span><span></span> </div>";
    echo "</div></div></div>";
}

function header_lang_switcher(){
    
    $flag = array("fin-flag.png", "en-flag.png", "norway-flag.png", "deutsch-flag.png", "dansk-flag.png", "svenska-flag.png");
    $langt = array("fi", "eng", "nor", "de", "da", "sv");

    $current_lang_local = array("fi", "en-GB", "nb-NO", "de-DE", "da-DK", "sv-SE");
    $flag_holder = array("fi"=>"fin-flag.png", "en_GB"=>"en-flag.png", "nb_NO"=>"norway-flag.png", "de_DE"=>"deutsch-flag.png", "da_DK"=>"dansk-flag.png", "sv_SE"=>"svenska-flag.png");
    $flag_name = array("fi"=>"suomi", "en_GB"=>"english", "nb_NO"=>"norsk", "de_DE"=>"deutschg", "da_DK"=>"dansk", "sv_SE"=>"svenska");    

    $tobe_converted = $current_locale = get_locale();
    $converted = str_replace( '_', '-', $tobe_converted );
    //echo $converted . "<br>";
    //echo $new = in_array( $current_locale, $current_lang_local );
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
                <a href="<?php _e($url)?>">
                    <img src="<?php _e($full_flag)?>" /> <span><?php _e($name)?></span>
                </a>
            </li>
        <?php 
            next($langt);
            next($flag);
            $hideclass ="";
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

function search_header(){ 
    ?>
    <div id="search__desktop" class="group">
        <div class="sd__icon">
        <span><?php Helper::ln_e('search among'); ?></span> <span>3,267</span> <span><?php Helper::ln_e('games'); ?></span>
        </div>
    </div>
<?php 
}

function login_header_mobile(){?>
    <div class="mobile_login_header__wrapper group">
        <?php 
        //window.openRegistration();
        //header_lang_switcher();
        search_header();
        do_shortcode('[cu_son_api_widget widgetclass=Login]');
        ?>
        <div class="group" id="btns_header_deskt">
        <a rel="nofollow" id="mobile_signup_header" class="hbtn_helper" href="#" onclick="CU_SON_API.auth_open_registration(); return false;"><?php Helper::ln_e('sign up'); ?></a> 
        <a rel="nofollow" id="mobile_login_header" href="#" onclick="CU_SON_API.auth_open_login(); return false;"><?php Helper::ln_e('login'); ?></a>
        </div>
    </div> 
    <?php
}

function dummy_search(){ ?>
    <div class="search__d"></div>
<?php
}


function slider_holder(){
  get_template_part( 'template-parts/content', 'home-slider-keen' );
}
function lnp2(){
  ob_start();
  dynamic_sidebar( 'lnp2' );
  $ln1 = ob_get_contents();
  $lnmain = $ln1;
  ob_end_clean();
  echo $lnmain;
}
function above_18(){
    // ob_start();
    // dynamic_sidebar( 'lnp1' );
    // $ln1 = ob_get_contents();
    // $lnmain = $ln1;
    // ob_end_clean();
    // echo $lnmain;

}

function btn_search_wrapper_start(){
    echo "<div id=\"btn_search_wrapper\" class=\"group\">";
    echo "<div id=\"btn_search_wrapper__inner\" class=\"group site-1180px\">";
}

function btn_search_wrapper_end(){
    echo "</div>";
	echo "<div id=\"spt_srch\" class=\"group\"></div>";
	echo "</div>";
}

function btn_support($main_title, $link1, $link2, $title1, $title2){
    global $post;
    $current_link = get_permalink($post->ID);

    if ($current_link == $link1){ $class_active1 = " active"; }
    if ($current_link == $link2){ $class_active2 = " active"; }

    $output  .= "<div id=\"the-btns\" class=\"group\">";
    $output .= "<h3>{$main_title}</h3>";
    $output .= "<div class=\"group the-btns_innerwrapper\">";
    $output .= "<a href=\"{$link1}\" class=\"btn_link_1{$class_active1}\"><span>{$title1}</span></a>";
    $output .= "<a href=\"{$link2}\" class=\"btn_link_2{$class_active2}\"><span>{$title2}</span></a>";
    $output .= "</div></div>";
    return $output;
}

function the_btns(){
    $btn_main_title = get_field('button_title', 'option');
    $btn_title1 = get_field('button_1_title', 'option');
    $btn_title2 = get_field('button_2_title', 'option');
    $btn_link1 = get_field('target_page_button_1', 'option');
    $btn_link2 = get_field('target_page_button_2', 'option');
    echo btn_support($btn_main_title, $btn_link1, $btn_link2, $btn_title1, $btn_title2);
}

function searchform_slider(){ 
	$search_title = get_field('search_title', 'option');
    $value = isset($_GET['s']) ? $_GET['s'] : "Søg i feltet her";
    $value = esc_attr($value);
    $home_url = home_url( '/' );
    echo "<div id=\"search_holder\" class=\"group\"><h3>{$search_title}</h3>";
	echo "<aside class=\"widget group\" id=\"search-form\">";
    echo "<div class=\"textwidget group\">";
	echo "<form action=\"{$home_url}\" id=\"searchform\" method=\"get\">";
    echo "<fieldset><input type=\"text\" id=\"s\" name=\"s\" placeholder=\"{$value}\" required />";
    echo "<input id=\"searchsubmit\" type=\"submit\" value=\"Søg\" />";
    echo "</fieldset></form></div></aside></div>";

    //$tat1 = sprintf( __( 'You can visit the page by clicking <a href="%s">here</a>.', 'bsfj_lang' ), 'http://example.com');
    //$tat2 = sprintf( __( 'You can visit the page by clicking <a href="#">here</a>.', 'bsfj_lang' ));
}
add_action('my_header', 'headerWrapperStart1', 1);
add_action('my_header', 'the_legal_notice_1', 2);

add_action('my_header', 'headerWrapperStart', 3);
add_action('my_header', 'headerInnerWrapperStart', 4);
add_action('my_header', 'humbergerMennu', 5);
add_action('my_header', 'theHeaderLogo', 6);


add_action('my_header', 'navWrapperStart', 7);
add_action('my_header', 'mainNavDeclaration', 8);
add_action('my_header', 'navWrapperEnd', 9);


add_action('my_header', 'dummy_search', 10);
add_action('my_header', 'login_header_mobile', 11);

add_action('my_header', 'headerInnerWrapperEnd', 12);
add_action('my_header', 'headerWrapperEnd', 20);
add_action('my_header', 'slider_holder', 21);
//add_action('my_header', 'btn_search_wrapper_start', 25);
//add_action('my_header', 'the_btns', 26);
//add_action('my_header', 'btn_search_wrapper_end', 28);
//add_action('my_header', 'searchform_slider', 26);
