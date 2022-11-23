<?php
/**
 * Template Name: Single Provider Template
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
            if( $detect->isMobile() ) {
                $image_featured = wp_get_attachment_image_src(get_field('mobile_image_pelit'), 'f_img_pelit_mobile');
            }else{
                //$image_featured = wp_get_attachment_image_src(get_field('desktop_image_pelit'), 'f_img_pelit_desktop');
                $image_featured = wp_get_attachment_image_src(get_field('desktop_image_pelit'), 'full');
            }

            $featured_image .= $image_featured[0];
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

          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'provider' ); ?>
            <?php //comments_template( '', true ); ?>
          <?php endwhile; // end of the loop. ?>

        </div><!-- #content --> 
      </div><!-- #primary -->

    </div><!-- #inner -->
  </div><!-- #outer -->
</section><!-- #sec_content -->
<?php get_footer(); ?>
