<?php 
if ( !defined('ABSPATH')) exit;

if (!is_admin()) {
/************************************/
// INLCUDE THE JQUERY USED BY THE WORDPRESS SAME WITH OTHER THEMES LIKE 2010 TO 2015 / START
/************************************/
function theme_scripts() {
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'theme_scripts');

function no_more_jquery(){
    wp_deregister_script('jquery');
}
//add_action('wp_enqueue_scripts', 'no_more_jquery');

/************************************/
// LOAD JS / START
/************************************/
function fx_js() {

	wp_register_script('jquery_hoverintent', get_template_directory_uri(). '/assets/js/hoverIntent.js', array('jquery'), '', true ); // JQUERY SUPERFISH
	wp_enqueue_script('jquery_hoverintent');
	
	wp_register_script('jquery_superfish', get_template_directory_uri(). '/assets/js/superfish.js', array('jquery'), '', true ); // JQUERY SUPERFISH
	wp_enqueue_script('jquery_superfish');
	
	wp_register_script('jquery_superfish_settings', get_template_directory_uri(). '/assets/js/js-superfish-settings.js', array('jquery'), '', true ); // JQUERY SUPERFISH
	wp_enqueue_script('jquery_superfish_settings');
	
	wp_register_script('jquery_slicknav', get_template_directory_uri(). '/assets/js/jquery.slicknav.min.js', array('jquery'), '', true ); // JQUERY SLICKNAV
	wp_enqueue_script('jquery_slicknav');
	
	wp_register_script('jquery_slicknav_settings', get_template_directory_uri(). '/assets/js/js-slicknav-settings.js', array('jquery'), '', true ); // JQUERY FLEXNAV
	wp_enqueue_script('jquery_slicknav_settings');
	
	wp_register_script('jquery_slidebars', get_template_directory_uri(). '/assets/js/slidebars.min.js', array('jquery'), '', true ); // SLIDEBARS
	wp_enqueue_script('jquery_slidebars');
	
	wp_register_script('jquery_slidebars_settings', get_template_directory_uri(). '/assets/js/js-slidebars-settings.js', array('jquery'), '', true ); // SLIDEBAR SETTINGS
	wp_enqueue_script('jquery_slidebars_settings');
	
	wp_register_script('jquery_ham_settings', get_template_directory_uri(). '/assets/js/ham-settings.js', array('jquery'), '', true ); // HAM SETTINGS
	wp_enqueue_script('jquery_ham_settings');
	
	wp_register_script('jquery_wow', get_template_directory_uri(). '/assets/js/wow.min.js', array('jquery'), '', true ); // WOW ANIMATION
	wp_enqueue_script('jquery_wow');
	
	wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '', true );
	wp_enqueue_script('custom_script');

//	wp_register_script('splide_slider', get_template_directory_uri(). '/assets/js/splide.min.js', [], '', true );
//	wp_register_script('splide_slider_settings', get_template_directory_uri(). '/assets/js/splide-slider-settings.js', ['splide_slider'], '', true );
//	wp_enqueue_script('splide_slider_settings');

//TIM: footer direct script injection
add_action('wp_footer', function(){
  ?>
<script>
  //script loader callback
  window.cuScriptLoader= function(u,c){
    jQuery(document).ready(function(){
       var h = document.getElementsByTagName("head")[0];
       var s = document.createElement("script");
       s.setAttribute("type", "text/javascript");
       s.setAttribute("async", "async");
       if(c!==undefined){
         if (s.readyState){
           s.onreadystatechange = function() {
             if (s.readyState == "loaded" || s.readyState == "complete") {
               s.onreadystatechange = null;
               c();
             }
           };
         }else{
           s.onload = function() {c()};
         }
       }
       s.setAttribute("src", u);
       h.appendChild(s);
    })
  }
  //load lightbox
  html5lightbox_options={inityoutube:false,initvimeo:false,initsocial:false};
  window.cuScriptLoader('<?=get_template_directory_uri(). '/assets/js/html5lightbox/html5lightbox.js'?>');
  //load splider
  (function(){
    var l=[];
    var k=[];
    window.splideWhenReady =function(c){
      if(c!==undefined)l.push(c)
      if(window.Splide){
        var x;
        if(x=l.shift()){
          x();
          setTimeout(function(){window.splideWhenReady()},10);
        };
      }
    }
    window.keenWhenReady =function(c){
      if(c!==undefined)k.push(c)
      if(window.KeenSlider){
        var x;
        if(x=k.shift()){
          x();
          setTimeout(function(){window.keenWhenReady()},10);
        };
      }
    }
  })()
//  window.cuScriptLoader('<?=get_template_directory_uri(). '/assets/js/splide.min.js'?>',function(){window.splideWhenReady()});
  window.cuScriptLoader('<?=get_template_directory_uri(). '/assets/js/keen-slider.min.js'?>',function(){window.keenWhenReady()});
  setTimeout(window.cuScriptLoader('<?=get_template_directory_uri(). '/assets/js/home-slider-settings.js'?>'),7000);
</script>
  <?php
  });
}

add_action('init', 'fx_js', 1);

/************************************/
// LOAD JS / END
/************************************/


/************************************/
// LOAD JS TO FOOTER / START
/************************************/

function add_script_to_footer() {
//	wp_register_script('Ajax_Loader', get_template_directory_uri(). '/assets/js/ajax.js' ); 
//	wp_enqueue_script('Ajax_Loader', true);
}
//add_action( 'wp_footer', 'add_script_to_footer' );	

/************************************/
// LOAD JS TO FOOTER / END
/************************************/
}
