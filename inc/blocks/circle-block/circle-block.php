<?php
/* What do we review Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'circle-block-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'circle-block';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$blogID = get_option( 'page_for_posts' );
?>

<?php if( get_field('game_title') && get_field('game_type') ) : ?>
<div class="group <?php _e($className)?>">

    <img src="<?php _e( get_template_directory_uri() )?>/assets/css/images/glossy-cricle.png" class="glossy-circle">

    <div class="group circle__inner">
        <div class="group circle__inner_top">
            <p><?php the_field('game_title') ?></p>
            <p><?php the_field('game_type') ?></p>
        </div>
        <div class="group circle__inner_bot">
            <?php printf( __( '<p class="play_now"><a href="#">%s</a></p>', 'fx_lang' ), 'play now'); ?>
            <?php printf( __( '<p class="try_now"><a href="#">%s</a></p>', 'fx_lang' ), 'try for free'); ?>
            <img src="<?php _e( get_template_directory_uri() )?>/assets/css/images/playngo.png" class="playngo" />

            
        </div>
    </div>

</div>

<?php endif; ?>