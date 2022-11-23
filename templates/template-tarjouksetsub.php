<?php
/**
 * Template Name: Tarjoukset Subpages Template
 */

get_header(); ?>

<section id="sec_content" class="group temp_default xtra_space">
  <div id="outer" class="group">
    <div id="inner" class="group">

      <div id="primary" class="site-content group">
        <div id="content" role="main">


            <!-- PELIT TEMPLATE FEATURED IMAGE START -->
            <?php 
            $detect = new Mobile_Detect;
            // if( $detect->isMobile() ) {
            //     $image_featured = wp_get_attachment_image_src(get_field('mobile_image_pelit'), 'f_img_pelit_mobile');
            // }else{
            //     //$image_featured = wp_get_attachment_image_src(get_field('desktop_image_pelit'), 'f_img_pelit_desktop');
            //     $image_featured = wp_get_attachment_image_src(get_field('desktop_image_pelit'), 'full');
            // }

            $featured_image = $detect->isMobile()
                ? wp_get_attachment_image_src(get_field('mobile_image_pelit'), 'f_img_pelit_mobile')
                : wp_get_attachment_image_src(get_field('desktop_image_pelit'), 'full');

            $featured_image = $featured_image[0];

            $class1 = $detect->isMobile()
                ? "" 
                : " tarjuk_deskty";

            ?>

        
            <div class="group pelit__fimg<?php _e($class1)?>" style="background-image: url(<?php _e($featured_image) ?>)">
                <div class="group site-main pelit__fimg_inner">
                    <div class="pelit__fimg_table">
                    <div class="pelit__fimg_table_cell">
                    <div class="entry-content">
                        <?php if( get_field('use_other_style_of_text') ) { echo "<div id=\"tarj__title_helper\">"; }?>                           
                            <h1><?php the_field('title_pelit') ?></h1>
                            <p class="short_info"><?php the_field('content_subcont') ?></p>
                            <p class="has-text-align-center yellow_btn"><a rel="nofollow" href="#" class="" onclick="CU_SON_API.auth_open_registration(); return false;"><?php the_field('button_label_pelit') ?></a></p>
                        <?php if( get_field('use_other_style_of_text') ) { echo "</div>"; }?>
                    </div>
                    </div>
                    </div>
                </div>
          </div>
                <?php if( get_field('overwrite_tc') == "1" ):?>
                  <div class="group" style="position: relative;" id="tarj__helper_tc">
                    <div id="strpe" class="group" style="position: relative">
                        <div id="topview" class="group" style="display: none">
                          <div class="tv__cont group">
                              <div id="readmore__this" class="group">
                                <?php the_field('content_tc')?>
                              </div>            
                          </div>
                        </div>
                        <div class="group popout__helper">
                            <p><a id="l__noticex" href="#" onclick="return false;"><?php the_field('button_label')?></a></p>
                        </div>
                    </div>
                        <script>
                        jQuery(document).ready(function($){
                        });

                        jQuery(document).ready(function($){
                            setTimeout( function(){
                                jQuery(".ln2_top").remove();
                                //jQyery("a.cc_btn_accept_all").click();
                            }, 100000);

                            jQuery("#l__noticex").click( function(){
                                jQuery("#topview").toggleClass("showthis");
                            });

                            jQuery("#closetc").click( function(){
                              jQuery("#topview").toggleClass("hidethis__now");
                            })
                        });                        
                        </script>

                </div>
                <?php else: ?>
                  <div class="group" style="position: relative;" id="tarj__helper_tc">
                    <?php lnp2(); ?>
                    </div>
                <?php endif; ?>
            
            <?php //above_18(); ?>
            <!-- PELIT TEMPLATE FEATURED IMAGE END -->        

          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'tarjouksetsub' ); ?>
            <?php //comments_template( '', true ); ?>
          <?php endwhile; // end of the loop. ?>

        </div><!-- #content --> 
      </div><!-- #primary -->

    </div><!-- #inner -->
  </div><!-- #outer -->
</section><!-- #sec_content -->
<?php get_footer(); ?>
