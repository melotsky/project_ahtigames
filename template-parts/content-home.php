<?php
/**
 * Content area for Default Template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
  <!-- header class="entry-header">
      <?php //the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
  </header -->
  <div class="entry-content group">
    <?php the_content(); ?>
    <?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
  </div>
  <!-- .entry-content -->
    <?php //edit_post_link( __( 'Edit', 'twentytwelve' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</article>
<!-- #post --> 

<script>
    jQuery(document).ready(function($) {
        //alert("fdsfsdfsfs");
        jQuery(".page-template-template-home #content .ahti_hp__block2").css('background-image', 'url(<?php echo get_stylesheet_directory_uri() . "/assets/css/images/bg-images/webp/games-desktop.webp"; ?>)');
        jQuery(".page-template-template-home #content .ahti_hp__block6 .ahti_hp__block6__wrapper > .ahti_hp__block6__backgroundimage").css('background-image', 'url(<?php echo get_stylesheet_directory_uri() . "/assets/css/images/bg-images/webp/live-dealer-desktop.webp"; ?>)');

        
    });
</script>