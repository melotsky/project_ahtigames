<?php
/* Game Header Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'game-header-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'game-header';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
if( get_field('enable_the_game_header') == "1" ) : 
    /**
     * Background Decalration
     */
    $bg_mobile = wp_get_attachment_image_src(get_field('background_image'), 'game-header-mobile');
    $bg_desktop = wp_get_attachment_image_src(get_field('background_image'), 'game-header-desktop');
    $detect = new Mobile_Detect;

    if ( $detect->isMobile() ) { $className = "mob"; }else{ $className = "desk"; }
?>
<div id="game__header" class="game_header <?php _e($className)?>">
    <div class="game_header__wrapper game_header__width">
        <div class="game_header__bg">
            <div class="game_header__title">
                <h1><?php the_field('title_game') ?></h1>
            </div>
        </div>
    </div>
</div>
<style>
    <?php 
    if ( $detect->isMobile() ) : ?>
        .game_header__bg{background-image: url(<?php _e($bg_mobile[0])?>)}
        .safari .game_header__bg{background-image: url(<?php _e($bg_mobile[0])?>)}
    <?php else :?>
        .game_header__bg{background-image: url(<?php _e($bg_desktop[0])?>)}
        .safari .game_header__bg{background-image: url(<?php _e($bg_desktop[0])?>)}
    <?php endif; ?>
</style>
<?php endif;
