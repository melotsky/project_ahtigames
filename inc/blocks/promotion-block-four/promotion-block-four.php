<?php
/* Promotion Block 4
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'promo-block4-' . $block['id'];
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

if ( get_field('enable_prizes') == 1 ) :
    $mobile_img = wp_get_attachment_image_src(get_field('image_pb1'), 'promo_block1_img_mob');
    $desktop_img = wp_get_attachment_image_src(get_field('image_pb1'), 'promo_block1_img_desk');
?>
<div class="group spacer__topbot lv__bg <?php _e($id)?>" id="pb4">
    <div class="groupo site-main">
        
        <h2 class="pt__title top_spacer_new_zero "><?php the_field('title_pb4') ?></h2>
        
        <div id="prizes_thumbs">
            <?php while(the_repeater_field('prizes_pb4')) : 
                $img = wp_get_attachment_image_src(get_sub_field('image_p_pb4'), 'promo_block4_img_thumb');    
            ?>
            <div class="pt__items">
                <div class="pt__img">
                    <img src="<?php _e($img[0])?>" />
                </div>
                <div class="pt__protitle">
                    <h3><?php the_sub_field('title_p_pb4')?></h3>
                </div>
            </div>
            <?php endwhile; ?>  
        </div>

        <div class="group pt__button">
            <p class="block_promo_5_subtitle "><?php the_field('buton_label_pb4') ?></p>
        </div>

    </div>
</div>
<?php
endif;
?>