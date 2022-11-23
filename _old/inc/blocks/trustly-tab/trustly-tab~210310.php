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
                <div id="habs-slider-<?php _e($counter)?>" class="group habs__slider">

                <div class="splide__track">
                <div class="splide__list"> 

                    <?php $xcounter=1; while(the_repeater_field('slider_tab')) : 
                        $image = wp_get_attachment_image_src(get_sub_field('image_ts'), 'trustly-tabs'); ?>
                        <div class="habs__sliderx splide__slide">
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
                </div>

                </div>
            <?php endif; ?>
            <!-- SLIDER AREA -->
        </div>
    <?php $counter++; endwhile; ?>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {

    
    jQuery("ul.habs").each(function(){

    var $active, $content, $links = jQuery(this).find('a');
    $active = jQuery($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
    $active.addClass('active');
    $content = jQuery($active[0].hash);
    $content.addClass('activo');

    setTimeout(function(){
        window.splideWhenReady(function(){
            var s = new Splide(jQuery('#habs-slider-1')[0],{
                type:'loop',
            loop: true,
            pagination: true,
            speed: 500,
            autoplay: false,
            lazyLoad: false,
            perPage: 1,
            perMove: 1,
            arrows: true
            //focus    : 'center'
        }).mount();
        });    
    },100);  
   

    // jQuery('#habs-slider-1, #habs-slider-2').slick({
	//  	dots: true,
	//  	infinite: true,
	//  	speed: 500,
	//  	autoplay: true,
	//  	lazyLoad: 'none',
	//  	slidesToShow: 1,
	//  	slidesToScroll: 1,
    //     prevArrow: '<span class="left-arrow"></span>',
	//     nextArrow: '<span class="right-arrow"></span>'
    // });

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

            //jQuery('#habs-slider-1, #habs-slider-2').slick('refresh');

            e.preventDefault();
        });
    });


    setTimeout(function(){
        window.splideWhenReady(function(){
            var s = new Splide(jQuery('#habs-slider-2')[0],{
                type:'loop',
            loop: true,
            pagination: true,
            speed: 500,
            autoplay: false,
            lazyLoad: false,
            perPage: 1,
            perMove: 1,
            arrows: true
            //focus    : 'center'
        }).mount();
        });    
    },100);      
});
</script>
<?php endif; ?>
