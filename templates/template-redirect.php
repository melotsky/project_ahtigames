<?php
/**
 * Template Name: Redirect Template
 */

get_header(); 
wp_redirect( home_url(), '302' ); 
exit;
?>

<section id="sec_content" class="group temp_default xtra_space">
  <div id="outer" class="group">
    <div id="inner" class="group">

      <div id="primary" class="site-content group">
        <div id="content" role="main">

          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'page' ); ?>
            <?php //comments_template( '', true ); ?>
          <?php endwhile; // end of the loop. ?>

        </div><!-- #content --> 
      </div><!-- #primary -->

    </div><!-- #inner -->
  </div><!-- #outer -->
</section><!-- #sec_content -->
<?php get_footer(); ?>