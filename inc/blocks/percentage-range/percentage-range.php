<?php
/* Percentage Range Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'percentage-range-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'percentage-range';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
global $post;

if( get_field('enable_this_percentage') == "1" ) : 

    $range = get_field('range');
    $the_title = get_field('title_perc');
    $yellow_btn_label = get_field('yellow_button_label_perc');
    $transparent_btn_label = get_field('transparent_button_label_perc');
    $yellow_btn_url = get_field('yellow_button_url_perc');
    $transparent_btn_url = get_field('transparent_button_url_perc');
    $logo_perc = wp_get_attachment_image_src(get_field('logo_perc'), 'log_perc');
    $logo_perc = $logo_perc[0];
 
    $alttile = filter_var($the_title, FILTER_SANITIZE_STRING);
 
?>
<div id="top__percentage" class="tp__wrapper group">
    <h2 class="has-text-align-center"><?php _e($the_title) ?></h2>
    <p class="has-text-align-center yellow_btn_fixwidth_mobile"><a href="#" onclick="window.openRegistration(); return false;"><?php _e($yellow_btn_label) ?></a></p>
    <img src="<?php _e( $logo_perc )?>" alt="<?php _e($alttile)?>" title="<?php _e($alttile)?>">
</div>
<div id="<?php _e($id)?>" class="percentage__range <?php _e($className)?>">

    <div id="p_range" class="p_range group">
        <div class="range__bg"></div>
        <div class="range__up" style="width: <?php _e($range)?>%"></div>
        <div class="left__tip"></div>
        <div class="right__tip"></div>
    </div>
    <div id="p_range__labels" class="group">
        <div class="p_range__labels p_range__labels__left">
            <p class="p_range__labels__price"><?php the_field('start_label_price') ?></p>
            <p class="p_range__labels__label"><?php the_field('label_content_start') ?></p>
        </div>
        <div class="p_range__labels p_range__labels__right">
            <p class="p_range__labels__price"><?php the_field('end_label_price') ?></p>
            <p class="p_range__labels__label"><?php the_field('label_content_end') ?></p>
        </div>
    </div>

    <div id="p_range__cols">
        <div class="p_range__col1">
            <span class="col__label"><?php the_field('column_1_label') ?></span>
            <span class="col__content"><?php the_field('column_1_content') ?></span>
        </div>
        <div class="p_range__col2">
            <span class="col__label"><?php the_field('column_2_label') ?></span>
            <span class="col__content"><?php the_field('column_2_content') ?></span>
        </div>
        <div class="p_range__col3">
            <span class="col__label"><?php the_field('column_3_label') ?></span>
            <span class="col__content"><?php the_field('column_3_content') ?></span>
        </div>
    </div>
</div>
<?php
endif;
