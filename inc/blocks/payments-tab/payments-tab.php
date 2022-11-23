<?php
/* Payments Tab Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'payments-tab-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'payments-tab';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
if( get_field('enable_payments_tab') == "1" ) : 
    /**
     * Background Decalration
     */
//    $img = wp_get_attachment_image_src(get_sub_field('background_image'), 'game-header-mobile');

?>

<div id="payments__tab" class="group">
    <div class="group payments__tab">

        <!-- TABS BUTTONS START -->
        <div id="pabs__holder" class="group">
            <ul class="pabs" style="list-style-type: none">
                <?php $counter=1; while(the_repeater_field('payments_tab')) : ?>
                    <li><a href="#pabs<?php _e($counter)?>"><?php the_sub_field('tab_title')?></a></li>
                <?php $counter++;  endwhile;  ?>
            </ul>
        </div>
        <!-- TABS BUTTONS END -->

        <!-- THE TABS CONTENT START -->
        <div id="pabs_content_outer">
            <div id="pabs_content_inner">
                <?php $counter=1; while(the_repeater_field('payments_tab')) : ?>
                    <div id="pabs<?php _e($counter)?>" class="group">

                        <div class="pabs__title_holder">
                            <div class="pabs__title">
                                <div class="pabs__title_tb"><div class="pabs__title_tbc"><h4><?php the_sub_field('column_title_1') ?></h4></div></div>
                                <div class="pabs__title_tb"><div class="pabs__title_tbc"><h4><?php the_sub_field('column_title_2') ?></h4></div></div>
                                <div class="pabs__title_tb"><div class="pabs__title_tbc"><h4><?php the_sub_field('column_title_3') ?></h4></div></div>
                            </div>
                        </div>

                        <div class="pabs__content_holder">
                            <?php $xcounter=1; while(the_repeater_field('column_content')) : ?>
                                <div class="pabs__content__flex">
                                    
                                    <!-- IMAGE -->
                                    <div class="pabs__content__items">
                                        <div class="pabs__content__items_tb"><div class="pabs__content__items_tbc">
                                            <div class="pabs__content__items_tbx">
                                                <?php $img = wp_get_attachment_image_src(get_sub_field('content_image_1'), 'payments-tab-card'); ?>
                                                <img src="<?php _e($img[0])?>">
                                            </div>
                                        </div></div>
                                    </div>
                                    <!-- IMAGE -->

                                    <!-- CONTENT  2 -->
                                    <div class="pabs__content__items">
                                        <div class="pabs__content__items_tb"><div class="pabs__content__items_tbc">
                                            <div class="pabs__content__items_tbx">
                                                <p><?php the_sub_field('content_2') ?></p>
                                            </div>
                                        </div></div>
                                    </div>
                                    <!-- CONTENT  2 -->

                                    <!-- CONTENT  3 -->
                                    <div class="pabs__content__items">
                                        <div class="pabs__content__items_tb"><div class="pabs__content__items_tbc">
                                            <div class="pabs__content__items_tbx">
                                                <p><?php the_sub_field('content_3') ?></p>
                                            </div>
                                        </div></div>
                                    </div>
                                    <!-- CONTENT  6 -->

                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php $counter++; endwhile; ?>
            </div>
        </div>
        <!-- THE TABS CONTENT END -->

    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {

    jQuery('ul.pabs').each(function(){
        var $active, $content, $links = jQuery(this).find('a');
        $active = jQuery($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
        $active.addClass('active');
        $content = jQuery($active[0].hash);

        $links.not($active).each(function () {
            jQuery(this.hash).hide();
        });

        jQuery(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
            $active = jQuery(this);
            $content = jQuery(this.hash);
            $active.addClass('active');
            $content.show();
            e.preventDefault();
        });
    });


});
</script>
<?php endif; ?>