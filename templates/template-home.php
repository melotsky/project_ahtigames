<?php
/**
 * Template Name: Home Template
 */

get_header(); 
?>
<section id="sec_content" class="group temp_home">
    <div id="outer" class="group">
        <div id="inner" class="group">

            <div id="primary" class="site-content group">
                <div id="content" role="main" class="group">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content', 'home' ); ?>
                        <?php //comments_template( '', true ); ?>
                    <?php endwhile; // end of the loop. ?>
                </div><!-- #content --> 
            </div><!-- #primary -->
            
        </div><!--#inner-->
    </div><!--#outer-->
</section><!--#sec_content-->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>





