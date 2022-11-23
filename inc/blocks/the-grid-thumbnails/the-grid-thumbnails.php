<?php
/* What do we review Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
use cumuli\son_api\Helper;
$id = 'the_grid_thumb-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'the-grid-thumb';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$blogID = get_option( 'page_for_posts' );

if ( get_field('enable_grid_thumbnail_gtx') == 1 ) :
?>

<div class="<?php _e($className)?>">
    <?php while(the_repeater_field('the_grid_thumbs_gtx')) : 
        $image = wp_get_attachment_image_src(get_sub_field('image_gtx'), 'the_grid_thumbnails');
        ?>
        <div class="tgt__items">
            <div class="tgt__items_holder">
                <div class="tgt__img">
                    <img src="<?php _e($image[0])?>" />
                </div>

                <div class="tgt__top">
                    <?php if(get_sub_field('type_gtx') ) :?>
                        <?php 
                        $select = get_sub_field('type_gtx');
                        if ( $select == 'hot' ) {
                            $class = " hot";
                        }elseif ( $select == 'new' ){
                            $class = " new";
                        }elseif ( $select == 'jackpot' ){
                            $class = " jackpot";
                        }elseif ( $select == 'popular' ){
                            $class = " popular";
                        }
                        ?>
                        <div class="tgt_type_1">
                            <div class="tgt_type_2">
                                <span><?php the_sub_field('type_gtx')?></span>
                                <div class="tgt_type_3<?php _e($class)?>"></div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(get_sub_field('jackpot_price_gtx') ) :?>
                        <div class="tgt_jackpot_1">
                            <div class="tgt_jackpot_2">
                                <span><?php the_sub_field('jackpot_price_gtx')?></span>
                                <div class="tgt_jackpot_3"></div>
                            </div>
                        </div>
                    <?php endif; ?>                    
                </div>

                <div class="group tgt__hover">
                    <div class="tgt__table">
                        <div class="tgt__tablecell">
                            <p class="tgt__title">the game title</p>
                            <p class="tgt__reg"><a href="#" onclick="CU_SON_API.auth_open_registration(); return false;"><?php Helper::ln_e('play now'); ?></a></p>
                            <?php if ( get_sub_field('enable_play_demo_gtx') ) : ?>
                            <p class="tgt__demo"><a href="#game-fun-lightbox" class="html5lightbox"><?php Helper::ln_e('try for free'); ?></a></p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php endif; ?>