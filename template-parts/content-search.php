<?php


/**
 * Content area for Search Template
 */
use cumuli\son_api\Helper;

?>
<?php //Helper::ln_e('XXXXXX')?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
  <div class="entry-content group">
    
    <?php
    $keyword = $_GET['search'];
    $total = $_GET['items'];

    if( $keyword && $total ):
    ?>
    <div class="group total_keyword site-main">
        <h4 class="tk__result"><?php Helper::ln_e('Games found:')?> <span class="tk__total"><?php _e($total)?></span> <?php Helper::ln_e('results for')?> <span class="tk__keyword">"<?php _e($keyword)?>"</span></h4>
    </div>
    <?php endif;?>

    <?php the_content(); ?>
    <?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
  </div>
  <!-- .entry-content -->
    <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</article>
<!-- #post --> 