<?php
/* What do we review Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-carousel-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial-carousel';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
?>
<?php $loop = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => -1, 'orderby' => 'rand' ) ); ?>
<?php if( get_field('enable_testimonial_carousel') ) : ?>

    <div class="group <?php _e($className)?>">
        
        
        <?php if ( $loop->have_posts() ) : ?>
            <div id="tc__wrapper" class="group">
                <?php while ( $loop->have_posts() ) : $loop->the_post();
                $post_id = get_the_ID(); ?>

                    <div class="tc__class group">
                        <div class="tc__support group">
                            <p class="tc__testimonial"><?php the_field('testimonial_testi', $post_id) ?></p>
                            <?php if( get_field('rate_testi', $post_id) == "one" ) :?>
                                <p class="tc__stars" style="font-family: fontawesome"><span></span><span class="nostar"></span><span class="nostar"></span><span class="nostar"></span><span class="nostar"></span></p>
                            <?php elseif( get_field('rate_testi', $post_id) == "two" ) :?>
                                <p class="tc__stars" style="font-family: fontawesome"><span></span><span></span><span class="nostar"></span><span class="nostar"></span><span class="nostar"></span></p>
                            <?php elseif( get_field('rate_testi', $post_id) == "three" ) :?>
                                <p class="tc__stars" style="font-family: fontawesome"><span></span><span></span><span></span><span class="nostar"></span><span class="nostar"></span></p>
                            <?php elseif( get_field('rate_testi', $post_id) == "four" ) :?>
                                <p class="tc__stars" style="font-family: fontawesome"><span></span><span></span><span></span><span></span><span class="nostar"></span></p>
                            <?php elseif( get_field('rate_testi', $post_id) == "five" ) :?>
                                <p class="tc__stars" style="font-family: fontawesome"><span></span><span></span><span></span><span></span><span></span></p>
                            <?php endif; ?>

                            <div class="group tc__customer">
                                <p class="group tc__para">
                                    <span><?php the_field('name_testi', $post_id) ?></span>, <span><?php the_field('country_testi', $post_id) ?></span>
                                </p>
                            </div>
                        </div>
                    </div>


                <?php endwhile; ?>
            </div>

        <?php else : ?>
            <h4><?php echo __("Sorry no testimonials at the moment..", "fx_lang")?></h4>
        <?php endif; ?>
        <?php wp_reset_postdata(); // reset the query 
        wp_reset_query(); ?>
    </div>


<script>
jQuery(document).ready(function($){
    jQuery('#tc__wrapper').slick({
        dots: false,
        infinite: true,
        speed: 500,
        autoplay: true,
        lazyLoad: 'none',
        slidesToShow: 2,
        slidesToScroll: 2,
        prevArrow: '<span class="left-arrow"></span>',
        nextArrow: '<span class="right-arrow"></span>',

        responsive: [
        {
            breakpoint: 1000,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            }
        },
        { 
            breakpoint: 831,
            settings: { 
            slidesToShow: 2,
            slidesToScroll: 2
            }
        },
        { 
            breakpoint: 631,
            settings: { 
            slidesToShow: 1,
            slidesToScroll: 1
            }
        }
    
        ]
    });
});
</script>

<?php endif; ?>
