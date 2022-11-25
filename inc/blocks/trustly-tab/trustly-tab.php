<?php
/* The Trustly Tabs Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'trustly-tab-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'trustly-tab';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
global $post;

if( get_field('enable_trustly_tab') == "1" ) : ?>

<div id="trustly-tab" class="group the-trustly-tab <?php _e($className)?>">
    <div id="habs__holder" class="group">
        <ul class="habs">
            <?php $counter=1; while(the_repeater_field('trustly_tab')) : ?>
            <li><a href="#habs<?php _e($counter)?>"><?php the_sub_field('tab_label')?></a></li><?php $counter++; endwhile; ?>
        </ul>
    </div>
    <?php $counter=1; while(the_repeater_field('trustly_tab')) : ?>
        <div id="habs<?php _e($counter)?>" class="group habs__class">
            <h2><?php the_sub_field('title_tab') ?></h2>
            <div class="group">
                <?php the_sub_field('introduction_tab') ?>
            </div>

            <!-- SLIDER AREA -->
            <?php if( get_sub_field('enable_slider_tab') == "1" ) : ?>
                <div id="habs-slider-<?php _e($counter)?>" class="group habs__slider keen-slider">

                    <?php $xcounter=1; while(the_repeater_field('slider_tab')) : 
                        $image = wp_get_attachment_image_src(get_sub_field('image_ts'), 'trustly-tabs'); ?>
                        <div class="habs__sliderx keen-slider__slide">
                            <div class="group habs__image">
                                <figure>
                                    <img src="<?php _e($image[0]) ?>" />
                                </figure>
                            </div>
                            <div class="habs__content habs__content_<?php _e($xcounter)?>">
                                <p><?php the_sub_field('text_info_ts') ?></p>
                            </div>
                        </div>
                    <?php 
                        $xcounter++; 
                        endwhile; 
                    ?>

                </div>
            <?php endif; ?>
            <!-- SLIDER AREA -->
        </div>
    <?php $counter++; endwhile; ?>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
  var keenload = ($obj)=> window.keenWhenReady(function(){
    new KeenSlider($obj,{
        type:'loop',
        loop: true,
        slidesPerView: 1,
        initial: 2
    });
  });
  jQuery("ul.habs").each(function(){
    var $active, $content, $links = jQuery(this).find('a');
    $active = jQuery($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
    $active.addClass('active');
    $content = jQuery($active[0].hash);
    $content.addClass('activo keen-loaded');
    keenload($content.find('.keen-slider')[0]);

    $links.not($active).each(function () {
        jQuery(this.hash).hide();
    });

    jQuery(this).on('click', 'a', function(e){
      $active.removeClass('active');
      //jQuery('.activo .habs__slider').slick('resize');
      $content.removeClass('activo');
      $content.hide();
      $active = jQuery(this);
      $content = jQuery(this.hash);
      $active.addClass('active');
      $content.addClass('activo');
      $content.show();
      if(!$content.hasClass('keen-loaded')){
        $content.addClass('keen-loaded');
        keenload($content.find('.keen-slider')[0]);
      }

      e.preventDefault();
    });
  });
});
</script>
<?php endif; ?>
