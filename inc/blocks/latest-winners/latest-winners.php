<?php
/* Latest winners Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'latest-winners-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'latest-winners';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
?>
<div class="group <?php _e($className)?>">
    <figure class="lw__img">
        <?php $image = wp_get_attachment_image_src(get_field('image_lw'), 'latest-winner-image'); ?>
            <div class="lw__img_tb">
                <div class="lw__img_tbc">        
                <img src="<?php _e( $image[0] )?>" />
            </div>
        </div>
    </figure>
    <div class="group lw__content">
        <div class="lw__content_tb">
                <div class="lw__content_tbc">
                    <?php the_field('text_info_lw') ?>
                </div>
            </div>
    </div>
    <div class="lw__price">
        <div class="lw__price_tb">
            <div class="lw__price_tbc">
                <?php the_field('price_lw') ?>
            </div>
        </div>
    </div>
</div>