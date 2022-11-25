<?php
/* GAME IMAGE SINGLE MOBILE AND DESKTOP IMAGE
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$detect = new Mobile_Detect;
$id = 'game_singleimg-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'game_singleimg';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
global $post;

if( get_field('enable_game_image') == "1" ) : 
    //$image_desktop = wp_get_attachment_image_src(get_field('desktop_image_gi'), 'game_image_desktop');
    //$image_mobile = wp_get_attachment_image_src(get_field('mobile_image_gi'), 'game_image_mobile');
?>
    <div id="<?php _e($id)?>" class="group">
        <div class="<?php _e($className) ?> group margin__top_1rem">

            <?php 
	
	if($detect->isMobile()){
		$imd_class1 = "game_singleimg__mobile";
		$imd_class2 = "game_singleimg__mobile_inner";
		$img_size = "soft_banner_750";
	}else{
		$imd_class1 = "game_singleimg__desktop";
		$imd_class2 = "game_singleimg__desktop_inner";
		$img_size = "full";
	}	
		 

            
            ?>
            <div class="<?php _e($imd_class1) ?>" style="">
                <div class="<?php _e($imd_class2) ?>" style=""> 

                <?= 
                 wp_get_attachment_image_prefix(get_field('desktop_image_gi'),'soft_banner_', $img_size, false,[
                     'alt' => get_field('image_titledeskmob'),
                     'title' => get_field('image_titledeskmob') 
                  ]);
                ?>					
            
                </div>
            </div>

        </div>
    </div>
<?php endif ?>