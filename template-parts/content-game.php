<?php


/**
 * Content area for Single Game Template
 */


?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
    <div class="entry-content group">
        <div class="group single_gamex">
            <?php echo do_shortcode("[cu_son_api_widget widgetclass=GameSingle]"); ?>
        </div>
        <div class="wp-block-group ahti_vikings__block4 site-360px-group has-background helper__b4" style="background-color:#ffffff">
            <div class="wp-block-group__inner-container">
                <?php the_content(); ?>
            </div>
            </div>
        <?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
    </div>
    <!-- .entry-content -->
    <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</article>
<!-- #post --> 