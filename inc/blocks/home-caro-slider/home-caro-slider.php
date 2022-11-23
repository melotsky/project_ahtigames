<?php
/* What do we review Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'hp-carousel-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hp-carousel';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
?>
<?php if( get_field('enable_carousel_hc') ) :?>

    <div class="group hp_hc__wrapper">
        <div class="group hphc__title <?php _e(the_field('id_hc'))?>">
            <h2><?php the_field('carousel_title_hc')?></h2>
            <div class="group hphc__right">
                <a href="<?php the_field('target_link_hc')?>"><?php the_field('button_label_hc') ?></a>
                <div class="group hphc__prevnext">
                    <span class="prev slick-arrow"></span>
                    <span class="next slick-arrow"></span>
                </div>
            </div>
        </div>

        <div class="hphc__holder" id="<?php _e(the_field('id_hc'))?>">
            <?php $counter=1; while(the_repeater_field('caruosel_hc')) : 
                $image = wp_get_attachment_image_src(get_sub_field('thumbnail_image_hc'), 'hcb_thumb');
            ?>
            <div class="hphc__img">
                <div class="hphc__btnsarea">
                    <img src="<?php _e( $image[0] ); ?>" alt="<?php the_sub_field('title_hc') ?>" title="<?php the_sub_field('title_hc') ?>">
                    <div class="hphc_abs">
                        <div class="hphc_table">
                            <div class="hphc_tablecell">
                                <div class="hphc__btns">
                                    <p class="hphc__title">the game title</p>
                                    <p class="hphc__type">game type</p>
                                    <p class="hphc__reg"><a rel="nofollow" href="#" onclick="CU_SON_API.auth_open_registration(); return false;"><?php _e("play now", "text-domain") ?></a></p>
                                    <p class="hphc__demo"><a class="html5lightbox" href="#thisone<?php _e($counter)?>" ><?php _e("try for free", "text-domain") ?></a></p>
                                    <p class="hphc__reviewlink"><a href="#">arvostelu</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php $counter++; endwhile ?>



        </div>
    </div>

    <div class="hideme group">
        <?php $counter=1; while(the_repeater_field('caruosel_hc')) :  ?>
            <div id="thisone<?php _e($counter) ?>" style="display: none" >
                <iframe id="neGameClient" src="https://skillonnet-static.casinomodule.com/games/starburst_mobile_html/game/starburst_mobile_html.xhtml?gameId=starburst_r3_not_mobile_sw&amp;lobbyURL=%23&amp;server=https%3A%2F%2Fskillonnet-game.casinomodule.com%2F&amp;lang=fi&amp;sessId=DEMO-1599467979-EUR&amp;operatorId=default&amp;statisticEndpointURL=https://gcl.netentcdn.com/gcs/reportData&amp;logsId=ee1614ca-3709-4ead-b23c-fe8acd7db8c3&amp;loadStarted=1599467981340&amp;giOperatorConfig=%7B%22gameId%22%3A%22starburst_r3_not_mobile_sw%22%2C%22staticServer%22%3A%22https%3A%2F%2Fskillonnet-static.casinomodule.com%2F%22%2C%22targetElement%22%3A%22neGameClient%22%2C%22lobbyURL%22%3A%22%23%22%2C%22server%22%3A%22https%3A%2F%2Fskillonnet-game.casinomodule.com%2F%22%2C%22lang%22%3A%22fi%22%2C%22sessId%22%3A%22DEMO-1599467979-EUR%22%2C%22operatorId%22%3A%22default%22%7D&amp;casinourl=https://promos.safe-communication.com" allow="autoplay;" autoplay="" style="width: 100%; height: 100%;" frameborder="0"></iframe>                
            </div>
        <?php $counter++; endwhile ?>
    </div>
<script>
jQuery(document).ready(function($){
    jQuery('#<?php _e(the_field('id_hc'))?>').slick({
        dots: false,
        infinite: true,
        speed: 500,
        autoplay: false,
        lazyLoad: 'none',
        slidesToShow: 5,
        slidesToScroll: 5,
        prevArrow: jQuery('.<?php _e(the_field('id_hc'))?> .hphc__prevnext .prev'),
        nextArrow: jQuery('.<?php _e(the_field('id_hc'))?> .hphc__prevnext .next'),
        //prevArrow: '<span class="left-arrow">l</span>',
        //nextArrow: '<span class="right-arrow">r</span>',

        responsive: [
        {
            breakpoint: 1002,
            settings: {
            slidesToShow: 5,
            slidesToScroll: 5
            }
        },
        { 
            breakpoint: 1001,
            settings: { 
            slidesToShow: 4,
            slidesToScroll: 4
            }
        },
        { 
            breakpoint: 931,
            settings: { 
            slidesToShow: 3,
            slidesToScroll: 3
            }
        },
        { 
            breakpoint: 761,
            settings: { 
            slidesToShow: 2,
            slidesToScroll: 2
            }
        },
        { 
            breakpoint: 481,
            settings: { 
            slidesToShow: 1,
            slidesToScroll: 1
            }
        }
    
        ]
    });
});
</script>



<?php endif; ?>
