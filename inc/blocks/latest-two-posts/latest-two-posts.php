<?php
/* What do we review Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'latest-two-posts-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'latest-two-posts';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$blogID = get_option( 'page_for_posts' );
$loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 2, ) );
?>
<?php if( get_field('enable_latest_two_post') ) : ?>
    <?php if ( $loop->have_posts() ) : ?>
        <div class="group <?php _e( $className ); ?>">
            <div id="latest-two-posts">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <?php $postid = get_the_ID(); ?>
                    <div class="post-id-<?php the_ID(); ?> ltp_handler">
                        <div class="group ltp_handler__inner">
                            
                            <?php $fimage = wp_get_attachment_image_src(get_field('featured_image_post', $postid), 'featured-img-hp'); ?>
                            <div class="group ltp_handler__img" style="background-image: url(<?php _e( $fimage[0]); ?>)">
                                <img src="<?php _e( $fimage[0]); ?>" alt="<?php the_title()?>" title="<?php the_title()?>" />
                            </div>

                            <div class="group ltp_handler__content_outer">
                                
                                <div class="group ltp_handler__content">
                                    <?php printf( __( '<h3 class="ltp_handler__title"><a href="%s">%s</a></h3>'), get_the_permalink(), get_the_title() ); ?>
                                    <?php
                                    $first_name = get_the_author_meta('first_name');
                                    $last_name = get_the_author_meta('last_name');
                                    printf(  __('<p class="ltp_handler__autho">By <span>%s %s</span></p>', 'fx_lang'), $first_name, $last_name );
                                    $the_excerpt = ShortenExcerpt( get_the_excerpt() ); 
                                    printf(  __('<p class="ltp_handler__excerpt">%s</p>'), $the_excerpt );
                                    ?>
                                </div>

                                <div class="group ltp_handler__btn">
                                    <?php 
                                    $date_post = get_the_time('F d.Y');
                                    $date_post_mob = get_the_time('M.d.Y');
                                    printf(  __('<div class="ltp_handler__btn_helper"><p class="ltp_handler__btn_para"><a href="%s">read more</a></p>', 'fx_lang'), get_the_permalink() );
                                    printf(  __('<div class="ltp_handler__date"><div class="ltp_handler__datetb"><div class="ltp_handler__datetbc">%s</div><div class="ltp_handler__datetbc mob">%s</div></div></div></div>', 'fx_lang'), $date_post, $date_post_mob );
                                    ?>

                                </div>
                            </div>

                            
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php 
                
                $blogid = get_option( 'page_for_posts' );
                $permalink_blog = get_permalink( $blogid );
                printf( __( '<p class="blog_link"><a href="%s">%s</a></p>', 'fx_lang' ), $permalink_blog, "More recent posts");
                ?>
            </div>
        </div>
    <?php endif ?>
    <?php wp_reset_postdata(); // reset the query ?>
<?php endif; ?>