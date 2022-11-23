<?php
/* What do we review Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'popup-video-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'popup-video';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$blogID = get_option( 'page_for_posts' );

if ( get_field('enable_popup_video') == 1 ) :
?>

<div class="group <?php _e($className)?>">

<?php 
    $video_url = get_field('video_url');
    $image = wp_get_attachment_image_src(get_field('image_thumb'), 'full');
    $image = $image[0];
    $play_icon = get_field('use_big_button');
?>


    <a class="vp-a" href="<?php the_field('video_url') ?>" data-ytid="<?php the_field('youtube_video_id') ?>">
        <div class="group pv__wrapper">
        <img src="<?php _e($image)?>" alt="<?php _e($altText) ?>" title="<?php _e($titleText->post_title)?>" class="play_thumb" />
        <div class="play_icon_holder">
            <div class="play_icon_holder_table">
                <div class="play_icon_holder_tablecell">
                    <?php if( ! $play_icon == 1  ) :?>
                        <div class="play__icon"></div>
                    <?php else:?>
                        <div class="play__icon bigger__icon"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        </div>
    </a>

</div>
<?php endif;?>