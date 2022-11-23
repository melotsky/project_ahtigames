<?php
/* Single Iframe Image WIth Demo Iframe
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'demo-iframe-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'demo-iframe';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
global $post;

if( get_field('enable_game_iframe_img') == "1" ) : 
    $image = wp_get_attachment_image_src(get_field('game_image__ss'), 'single_game_img');

?>
<div id="demo-iframe" class="group">
    <div class="site-main" id="demo_iframe">

        <div class="group di__wrapper">

            <?php if (get_field('enable_demo_ss') == "1" ) : ?>
                <div class="di__democontroller">
                    <div class="di__dcontrol">

                        <div class="di__mob">
                            <a href="#game-fun-lightbox" class="html5lightbox"><?php _e('play free demo', 'ahti_lang') ?></a>
                        </div>

                        <div class="di__desktop group">
                            
                            <a href="#game-fun-lightbox" class="html5lightbox" id="tls" onclick="jQuery('#demo_holder').html(''); jQuery('.demo_mobile_class1 .dm_2').removeClass('active'); jQuery('.demo_mobile_class2 .dm_2').removeClass('active'); jQuery('.demo_mobile_class2').hide(); jQuery('.demo_mobile_class1').show();" ></a>
                            <a href="#" id="demo_mobile" class="demo_mobile_class1"><span class="dm_1"><?php _e('play free demo', 'ahti_lang') ?></span><span class="dm_2"></span></a>
                            <a href="#" id="demo_mobile" class="demo_mobile_class2" style="display: none"><span class="dm_1"><?php _e('play free demo', 'ahti_lang') ?></span><span class="dm_2"></span></a>                            
                            

                            <script type="text/javascript">
                                jQuery(document).ready(function(jQuery) {
                                    jQuery('.demo_mobile_class1').click(function () {
                                        jQuery('#demo_holder').html('<?php the_field('iframe_code_ss') ?>');
                                        jQuery('.demo_mobile_class1').hide();
                                        jQuery('.demo_mobile_class2').show();
                                        jQuery('.demo_mobile_class1 .dm_2').toggleClass('active');
                                        jQuery('.demo_mobile_class2 .dm_2').toggleClass('active');
                                        return false;
                                    });

                                    jQuery('.demo_mobile_class2').click(function () {
                                        jQuery('#demo_holder').html('');
                                        jQuery('.demo_mobile_class2').hide();
                                        jQuery('.demo_mobile_class1').show();
                                        jQuery('.demo_mobile_class1 .dm_2').toggleClass('active');
                                        jQuery('.demo_mobile_class2 .dm_2').toggleClass('active');
                                        return false;

                                    });                                    

                                         

                                });
                            </script>
                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <div class="di__img">
                <img src="<?php _e($image[0]) ?>" alt="<?php echo get_the_title($post->ID) ?>" title="<?php echo get_the_title($post->ID) ?>">
                <div id="demo_holder"></div>
            </div>
        </div>


    </div>
</div>
<?php endif; 
