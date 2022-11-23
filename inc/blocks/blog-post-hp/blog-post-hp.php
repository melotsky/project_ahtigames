<?php
/* The Testimonials Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
use cumuli\son_api\Helper;
$id = 'the-testimonials-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}
//echo $current_lang = pll_current_language();
//$fd = pll_default_language('fi');

// Create class attribute allowing for custom "className" and "align" values.
$className = 'the-testimonials';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
global $post;
//$slider_shortcode = get_field('slider_shortcode', $post->ID);
if( get_field('show_blog_posts') == "1" ) : ?>
<div id="blog_post__hp" class="group">
    <div class="blog_post__inner">
    <?php 
    $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'lang' => 'fi' ) );
    if ( $loop->have_posts() ) : ?>
        <div class="group blog_post__holder">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); $id = get_the_ID();
                //$image = wp_get_attachment_image_src(get_field('featured_image', $id), 'featured-image');
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'featured-image' );
            ?>
            <div class="blog_post__post blog_post-<?php _e($id)?>">
                <div class="group blog_post__img">
                    <a href="<?php the_permalink() ?>">
                        <img src="<?php _e($image[0])?>" alt="<?php the_title()?>" title="<?php the_title()?>"/>
                    </a>
                </div>
                <!-- div class="group blog_post__cat">
                    <?php 
                    // $categories = get_the_category();
                    // foreach($categories as $category){
                    //     $category->name; //category name
                    //     $cat_link = get_category_link($category->cat_ID);
                    //     echo '<a href="'.$cat_link.'">'.$category->name.'</a>'; // category link
                    // } ?>
                </div -->
                <div class="group blog_post__contet">
                    <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                    <p><?php the_field('intro_text', $id)?></p>
                </div>

                
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
        </div>
    <?php else : ?>
        <p><?php Helper::ln_e('Sorry, please come back again later...'); ?></p>
    <?php endif; ?>
    </div>
</div>
<?php endif;


