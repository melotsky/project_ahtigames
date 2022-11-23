<?php
/* The Testimonials Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'the-testimonials-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

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
if( get_field('enable_the_testimonial_carousel') == "1" ) :
?>
<div id="testimonial_carou" class="group <?php _e($className)?>">
    <div id="testimonial_wrapper" class="group">
        <h2><?php the_field('title_testimonial') ?></h2>
        <div id="testimonial_main" class="keen-slider group">
            <?php 
                $loop = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => 9 ) );
                while ( $loop->have_posts() ) : $loop->the_post(); $id = get_the_ID();
                //$testi_thumb = wp_get_attachment_image_src(get_field('client_image', $id), 'testimonial-image');
            ?>
            <div class="testi_inner keen-slider__slide">
                    <div class="testi_inner__wrapper">
                        <p class="testi_content"><?php echo get_field('testimonial_content', $id)?></p>
                        <!-- img class="testi_img" src="<?php _e($testi_thumb[0])?>" / -->
                        <p class="testi_name"><span><?php the_field('first_name', $id)?>,</span> <span><?php the_field('last_name', $id)?></span></p>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<script>
setTimeout(function(){
  window.keenWhenReady(function(){
    var s = new KeenSlider('#testimonial_main.keen-slider',{
      slidesPerView: 1,
      mode: "snap",
      spacing: 15,
      loop: true,
      breakpoints: {
        "(min-width: 601px)": {
          slidesPerView:2
        },
        "(min-width: 1003px)": {
          slidesPerView:5
            }
        }
    });    
  })
},100);
	
</script>

<?php endif; ?>
