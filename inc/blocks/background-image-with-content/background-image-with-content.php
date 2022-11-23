<?php
/* Background Image With Content Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'biwct-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'biwct';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
if( get_field('biwlb_enable') == "1" ) : 
    /**
     * Background Decalration
     */
    $bg_img = wp_get_attachment_image_src(get_field('biwlb_img'), 'biwlb-img');
    $desktop_bg_img = wp_get_attachment_image_src(get_field('background_image_desktop'), 'pelivalmistaja_banner');
    $logo_img = wp_get_attachment_image_src(get_field('biwlb_logo'), 'biwlb-logo');
    $bg_img_url = $bg_img[0];
    $desktop_bg_img_url = $desktop_bg_img[0];
    $logo_img_url = $logo_img[0];
 
?>
    <div id="biwct" class="biwct">
        <div class="biwct__img mobile" style="background-image:url(<?php echo $bg_img_url ?>)">
            <div class="biwct_table group">
                <div class="biwct_tablecell group">
                    <img src="<?php _e($logo_img_url)?>">
                        <p class="has-text-align-center yellow_btn">
                        <a rel="nofollow" href="#" onclick="CU_SON_API.auth_open_registration(); return false;"><?php the_field('biwlb_button_label')?></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="biwct__img desktop" style="background-image:url(<?php echo $desktop_bg_img_url ?>)">
            <div class="biwct_table group">
                <div class="biwct_tablecell group">
                    <img src="<?php _e($logo_img_url)?>">
                    <p class="has-text-align-center yellow_btn">
                        <a rel="nofollow" href="#" onclick="CU_SON_API.auth_open_registration(); return false;"><?php the_field('biwlb_button_label')?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
