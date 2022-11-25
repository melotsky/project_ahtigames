<?php
/**
 * Template Name: Pelit Template
 */

get_header(); 
use cumuli\son_api\Helper;?>

<section id="sec_content" class="group temp_default xtra_space">


  <div id="outer" class="group">
    <div id="inner" class="group">

      <div id="primary" class="site-content group">
        <div id="content" role="main">

            <!-- PELIT TEMPLATE FEATURED IMAGE START -->
            <?php 
            $detect = new Mobile_Detect;

            $featured_image = $detect->isMobile() 
                ? wp_get_attachment_image_src(get_field('mobile_image_pelit'), 'f_img_pelit_mobile')
                : wp_get_attachment_image_src(get_field('desktop_image_pelit'), 'full');

            $featured_image = $featured_image[0] . ".webp";
            ?>
            <div class="group pelit__fimg" style="background-image: url(<?php _e($featured_image) ?>)">
                <div class="group site-main pelit__fimg_inner">
                    <div class="pelit__fimg_table">
                    <div class="pelit__fimg_table_cell">
                    <div class="entry-content">
                        <h1><?php the_field('title_pelit') ?></h1>
                        <p class="has-text-align-center yellow_btn"><a rel="nofollow" href="#" class="" onclick="CU_SON_API.auth_open_registration(); return false;"><?php the_field('button_label_pelit') ?></a></p>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- PELIT TEMPLATE FEATURED IMAGE END -->

            <?php  
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                $currenturl = "https://";   
            else  
                $currenturl = "http://";   
            // Append the host(domain name, ip) to the URL.   
            $currenturl.= $_SERVER['HTTP_HOST'];   
            
            // Append the requested resource location to the URL   
            $currenturl.= $_SERVER['REQUEST_URI'];    
            
            $currenturl;  
            $dummy = strstr($currenturl, '?', true);

            if( $dummy ){
                $currenturl = $dummy;
            }

            while(the_repeater_field('labels_and_links')) :
                    $linkox[] = get_sub_field('target_page_navpelit');
            endwhile;

            while(the_repeater_field('labels_and_links')) :
                $label[] = get_sub_field('label_navpelit');
            endwhile;

            $url = array_search($currenturl, $linkox);
            $the_url = $linkox[$url];
            $the_label = $label[$url];

            ?>  

            <!-- PELIT NAVIGATION START -->
            <?php if( get_field('enable_pelit_navigation') ) :?>
            <div id="pelit_nav" class="group nooverflow" <?php if( get_field('hide_on_desktop') == 1 ) { ?>style="height: unset"<?php } ?>>
                <div class="group">

                <!-- MOPILE PELIT START -->
                <div id="the_group_pelit_mobile_nav" class="group">
                
                    <div class="group mob_pelit_wrapper">
                        <div id="pelit_flipper">
                            <?php if ( $currenturl == $the_url) : ?>
                                <span class="hide__bg"><img class="this_img" /><?php _e($the_label) ?></span>
                            <?php else: ?>
                                <span><?php Helper::ln_e('our casino games')?><?php //the_field('drop_down_title_pelit') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    

                    <div id="pelit_panel" style="display: none">
                        <ul id="mob_pelit_nav_ul">
                            <?php $counter=1; while(the_repeater_field('labels_and_links')) : 
                                $real_url = get_sub_field('target_page_navpelit');
                                if ( $currenturl == $real_url) : 
                                    $c="current_page"; 
                                    $ximage = wp_get_attachment_image_src(get_sub_field('image_icon'), 'pelit_bg_icons');
                                    $the_helper_img = $ximage[0];
                                else : 
                                    $c="";
                                endif;
                                ?>
                                <li class="<?php _e($c)?>">
                                    <?php $image = wp_get_attachment_image_src(get_sub_field('image_icon'), 'pelit_bg_icons'); ?>

                                    <a class="mob_icon_helper mob_icon_<?php _e($counter)?>" href="<?php the_sub_field('target_page_navpelit')?>">
                                    <?php if( get_sub_field('enable_jackpot_pel') or get_sub_field('enable_daily_jackpot_pel')) :
                                        $class = "withprice ";
                                    else : 
                                        $class="";
                                    endif; ?>
                                    <img src="<?php _e( $image[0] ); ?>" class="<?php _e($class); _e($c); ?>"/>
                                    <?php the_sub_field('label_navpelit')?>
                                        <?php if(get_sub_field('enable_jackpot_pel')) :?>
                                            <span class="npjackpot jackpot_pelitnav">
                                                <span><span style="--jackpot-font-size: 1rem;"><son-jackpot type="jackpot"></son-jackpot></span></span>
                                            </span>
                                        <?php endif;?>
                                        <?php if(get_sub_field('enable_daily_jackpot_pel')) :?>
                                            <span class="npjackpot jackpotdaily_pelitnav">
                                                <span><span style="--jackpot-font-size: 1rem;"><son-jackpot type="daily"></son-jackpot></span></span>
                                            </span>
                                        <?php endif;?>                                    
                                    </a>
                                </li>
                            <?php $counter++; endwhile; ?>
                        </ul>
                    </div>
                </div>
                <!-- MOPILE PELIT END -->

                <script type="text/javascript">
                jQuery(document).ready(function($) {
                    //var target_img = jQuery('.current_page').attr('src');
                    jQuery('.this_img').attr('src', "<?php _e($the_helper_img) ?>");
                    jQuery('#mob_pelit_nav_ul li.current_page').remove();
                    jQuery('#pelit_nav').removeClass("nooverflow");
                    jQuery('#pelit_nav').addClass("noheight");
                });
                </script>

                <!-- DESKTOP PELIT START -->
                <?php if( get_field('hide_on_desktop') == 1 ) : ?>
                    <div id="the_group_pelit_desktop_nav" class="group" style="display: none !important">
                <?php else: ?>
                    <div id="the_group_pelit_desktop_nav" class="group">
                <?php endif; ?>
                    <div id="tgpdv" class="group">
                        <ul id="tgpdv_ul">
                            <?php while(the_repeater_field('labels_and_links')) : ?>
                                <?php $image = wp_get_attachment_image_src(get_sub_field('image_icon'), 'pelit_bg_icons'); ?>
                                <?php
                                
                                $the_url = get_sub_field('target_page_navpelit');
                                //echo $linkox[url];

                                ?>
                                <li
                                <?php if ( $currenturl == $the_url AND get_sub_field('hide_this_menu') == 1) { 
                                    echo " class=\" activo hidethis_linker\" " ; 
                                }else if ( $currenturl == $the_url ) { 
                                    echo " class=\" activo\" " ; 
                                }else if (get_sub_field('hide_this_menu') == 1){
                                    echo " class=\" hidethis_linker\" " ; 
                                }
                                ?>
                                <?php //if ( get_sub_field('hide_this_menu') == "1" ) { echo " class=\" hidethis_linker\" " ; } ?>
                                >
                                    <a href="<?php the_sub_field('target_page_navpelit')?>">
                                        <img src="<?php _e( $image[0] ); ?>" />
                                        <?php the_sub_field('label_navpelit')?>
                                        <?php if(get_sub_field('enable_jackpot_pel')) :?>
                                            <div class="npjackpot jackpot_pelitnav">
                                                <span><span id="j_id"><son-jackpot type="jackpot"></son-jackpot></span></span>
                                            </div>
                                        <?php endif;?>
                                        <?php if(get_sub_field('enable_daily_jackpot_pel')) :?>
                                            <div class="npjackpot jackpotdaily_pelitnav">
                                                <span><span id="d_id"><son-jackpot type="daily"></son-jackpot></span></span>
                                            </div>
                                        <?php endif;?>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <!-- div id="vandsearch" class="group">
                        <span class="filter1">
                            <span>
                                <img src="<?php _e( get_stylesheet_directory_uri() ) ?>/assets/css/images/filter-icon.png" />
                            </span>
                        </span>
                        <span class="filter2">
                            <span>
                                <img src="<?php _e( get_stylesheet_directory_uri() ) ?>/assets/css/images/search-icon.png" />
                            </span>                            
                        </span>                        
                    </div -->
                </div>
                <!-- DESKTOP PELIT END -->                

                </div>
            </div>
            <?php endif; ?>
            <script type="text/javascript"> 
            jQuery(document).ready(function(){
                jQuery("#pelit_flipper").click(function(){
                    jQuery("#pelit_flipper").toggleClass("stat");
                    jQuery("#pelit_panel").toggleClass('show__on');
                    //jQuery("#pelit_panel").slideToggle();
                });
                jQuery('#tgpdv_ul > li:first-child').remove();
            });
            </script>            
            <!-- PELIT NAVIGATION END -->

          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'pelit' ); ?>
            <?php //comments_template( '', true ); ?>
          <?php endwhile; // end of the loop. ?>

        </div><!-- #content --> 
      </div><!-- #primary -->

    </div><!-- #inner -->
  </div><!-- #outer -->
</section><!-- #sec_content -->
<?php get_footer(); ?>
