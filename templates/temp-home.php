<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<section id="sec-content" class="group">
    <div id="outer" class="group">
        <div id="inner" class="group">
            <div id="main_wrapper" class="group">

                <div id="primary" class="site-content">
                    <div id="content" role="main">

                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'template-parts/content', 'home' ); ?>
                            <?php //comments_template( '', true ); ?>
                        <?php endwhile; // end of the loop. ?>

                    </div><!-- #content --> 
                </div><!-- #primary -->

            </div><!-- #main_wrapper -->    
        </div><!-- #inner -->    
    </div><!-- #outer -->
</section><!--#sec-content-->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>