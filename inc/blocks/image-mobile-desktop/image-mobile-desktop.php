<?php
/* Image Mobile Desktop View Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$detect = new Mobile_Detect;

$id = 'imdv-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'imdv';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
if( get_field('enable_image_for_mobile_and_desktop_view') == "1" ) : 
    /**
     * Background Decalration
     */

	if($detect->isMobile()){
		$imd_class = "imdv__img_mob";
		$img_size = "soft_banner_750";
	}else{
		$imd_class = "imdv__img_desk";
		$img_size = "soft_banner_1110";
	}		
?>
    


    <div class="imdv-desk <?php echo $className?>">
        <div class="<?= $imd_class ?>">
                <a rel="nofollow" href="#" onclick="CU_SON_API.auth_open_registration(); return false;">
                <?= 
                 wp_get_attachment_image_prefix(get_field('desktop_image_desk'),'soft_banner_', $img_size, false,[
                     'alt' => get_field('image_titledeskmob'),
                     'title' => get_field('image_titledeskmob') 
//                      'sizes' => '
//                        (max-width: 360px) 360px, 
//                        (max-width: 500px) 500px, 
//                        (max-width: 600px) 600px, 
//                        (max-width: 750px) 750px, 
//                        (max-width: 800px) 800px, 
//                        (max-width: 900px) 900px, 
//                        (max-width: 1000px) 1000px,
//                        100vw',
                  ]);
                
                  //wp_get_attachment_image(get_field('desktop_image_desk'), 'full');
                ?>
                </a>
        </div>
    </div>


<?php endif; ?>
