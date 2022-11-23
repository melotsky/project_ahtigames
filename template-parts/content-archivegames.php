<?php


/**
 * Content area for Default Template
 */


?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
  <div class="entry-content group">
    <h1><?php the_title() ?></h1>
    <?php echo do_shortcode( "[cu_son_api_widget widgetclass=GamesReviewedArchive limit=-1 ]" ); ?>
    <?php //the_content(); ?>
    <?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
  </div>
  <!-- .entry-content -->
    <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</article>
<!-- #post --> 