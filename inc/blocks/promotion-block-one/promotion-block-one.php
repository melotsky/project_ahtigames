<?php
/* Promotion Block 1
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'promo-block1-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'pb1';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
//$blogID = get_option( 'page_for_posts' );

if ( get_field('enable_promotion_block_1') == 1 ) :
    $mobile_img = wp_get_attachment_image_src(get_field('image_pb1'), 'promo_block1_img_mob');
    $desktop_img = wp_get_attachment_image_src(get_field('image_pb1'), 'promo_block1_img_desk');
?> 

<div class="group spacer__topbot <?php _e($id)?>" id="pb1">
    <div class="groupo site-main">
        <div class="group pb_txt__contents">
            <h1><?php the_field('title_pb1')?></h1>
            <h2><?php the_field('prize_pb1')?></h2>
            <h3><?php the_field('sub_title_pb1')?></h3>
            <div class="group pb_txt__para">
                <?php the_field('content_pb1')?>
            </div>
        </div>
        <div class="group pb_txt__img">
            <div class="pb_txt__img_desktop">
            <img src="<?php _e($desktop_img[0])?>" />
            </div>
            <div class="pb_txt__img_mobile">
                <img src="<?php _e($mobile_img[0])?>" />
            </div>
        </div>

    </div>
</div>
<?php
endif;