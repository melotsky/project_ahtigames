<?php
/* What do we review Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'coins-image-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'coins-image';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
//$blogID = get_option( 'page_for_posts' );
?>
<?php //if( have_rows('images_coins') ): ?>
    <div class="group <?php _e($className)?>">
        <?php while(the_repeater_field('images_coins')) { 
            $image = wp_get_attachment_image_src(get_sub_field('image_ci'), 'full');
            echo "<img src=\"{$image[0]}\" class=\"wow slideInDown delay-2s\" data-wow-offset=\"300\"/>";
        } ?>
    </div>
<?php //endif; ?>