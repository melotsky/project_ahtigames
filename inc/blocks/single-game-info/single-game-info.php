<?php
/* Single Game Info
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
use cumuli\son_api\Helper;
$id = 'singlegame_info-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'singlegame_info';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
global $post;

if( get_field('enable_single_game_info_sg') == "1" ) : 
    $logo = wp_get_attachment_image_src(get_field('logo_sg'), 'single-game-logo');
    $game_screenshot = wp_get_attachment_image_src(get_field('game_screenshot_sg'), 'screenshot_game');
?>
<div id="sgi" class="group">
    <div id="sgi__wrapper" class="site-main">
        <div class="sgi__logo">
            <img src="<?php _e($logo[0]) ?>" alt="<?php _e( get_the_title($post->ID) )?>" title="<?php _e( get_the_title($post->ID) )?>" />
        </div>

        <div class="sgi__title">
            <h2 class="has-text-align-center"><?php the_field('title_sg') ?></h2>
        </div>

        <div class="sgi__btns group"> 
            <p class="has-text-align-center">
                <a href="#game-fun-lightbox" class="sgi_btn_trans html5lightbox" onclick="jQuery('.di__img #demo_holder').html(''); jQuery('.demo_mobile_class1 .dm_2').removeClass('active'); jQuery('.demo_mobile_class2 .dm_2').removeClass('active'); jQuery('.demo_mobile_class2').hide(); jQuery('.demo_mobile_class1').show(); return false;" ><?php Helper::ln_e('demo mode'); ?></a>
                <a rel="nofollow" href="#" onclick="CU_SON_API.auth_open_registration(); return false;" class="sgi_btn_yellow"><?php Helper::ln_e('play now'); ?></a>
            </p> 
        </div>

        <?php if( get_field('max_profit_sg') or get_field('payment_lines_sg') or get_field('rolls_sg') ) :?>
        <div class="sgi__otherinfo group">
            <div class="sgi__oi_inner">

                <?php if( get_field('max_profit_sg') ) : ?>
                    <div class="sgi__oi_item">
                        <div class="sgi__oi_element maxprofit group">
                            <span class="sgi__oi_s1"><?php Helper::ln_e('max. profit'); ?></span>
                            <span class="sgi__oi_s2"><?php the_field('max_profit_sg') ?></span>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( get_field('payment_lines_sg') ) : ?>
                    <div class="sgi__oi_item">
                        <div class="sgi__oi_element paymentlines group">
                            <span class="sgi__oi_s1"><?php Helper::ln_e('payment'); ?></span>
                            <span class="sgi__oi_s2"><?php the_field('payment_lines_sg') ?></span>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( get_field('rolls_sg') ) : ?>
                    <div class="sgi__oi_item">
                        <div class="sgi__oi_element rolls group">
                            <span class="sgi__oi_s1"><?php Helper::ln_e('rolls'); ?></span>
                            <span class="sgi__oi_s2"><?php the_field('rolls_sg') ?></span>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <?php endif; ?>

        <div class="sgi__minmax">
            <div class="sgi__mm_content">
                <span class="sgi__oi_s1"><?php Helper::ln_e('min / max input'); ?></span>
                <span class="sgi__oi_s2"><?php the_field('minimum__maximum_input_sg') ?></span>            
            </div>
        </div>

        <?php if( get_field('bonus_sg') == "1" or get_field('free_spins_sg') == "1" or get_field('rollsx_sg') == "1" ) :?>      
        <div class="sgi__features group">

            <div class="sgi__features_inner">

                <?php if( get_field('bonus_sg') == "1" ) : ?>
                    <div class="sgi__features_item">
                    <span class="sgi_f_img">
                        <img src="<?php echo get_stylesheet_directory_uri()?>/assets/css/images/bonus-img.png" />
                    </span>
                    <span class="sgi_f_label">
                        <?php _e('bonus', 'ahti_lang')?>
                    </span>
                    </div>
                <?php endif; ?>

                <?php if( get_field('free_spins_sg') == "1" ) : ?>
                    <div class="sgi__features_item">
                    <span class="sgi_f_img">
                        <img src="<?php echo get_stylesheet_directory_uri()?>/assets/css/images/machine-img.png" />
                    </span>
                    <span class="sgi_f_label">
                        <?php _e('free spins', 'ahti_lang')?>
                    </span>
                    </div>
                <?php endif; ?>                

                <?php if( get_field('rollsx_sg') == "1" ) : ?>
                    <div class="sgi__features_item">
                    <span class="sgi_f_img">
                        <img src="<?php echo get_stylesheet_directory_uri()?>/assets/css/images/win-img.png" />
                    </span>
                    <span class="sgi_f_label">
                        <?php _e('win multiplier', 'ahti_lang')?>
                    </span>
                    </div>
                <?php endif; ?>                                

            </div>

        </div>
        <?php endif; ?>

        <div class="sgi__screenshot group">
            <img src="<?php _e($game_screenshot[0])?>" alt="<?php _e( get_the_title($post->ID) )?>" title="<?php _e( get_the_title($post->ID) )?>"/>
        </div>        

    </div>
</div>
<?php
endif;