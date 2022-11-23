<?php
/* Providers Archive Header
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'pah-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'pah';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
//$blogID = get_option( 'page_for_posts' );

if ( get_field('enable_providers_archive_header') == 1 ) :
$linker = get_field('button_link_pah');
$linker_target = $linker['target'] ? $linker['target'] : '_self';
$mobile_img = wp_get_attachment_image_src(get_field('mobile_background_image'), 'f_img_pelit_mobile');
$desktop_img = wp_get_attachment_image_src(get_field('desktop_background_image'), 'full');
$detect = new Mobile_Detect;
if ( $detect->isMobile() ) : 
    $real_img = $mobile_img[0];
else:
    $real_img = $desktop_img[0];
endif;

$the_image = $real_img;
?> 
        
<div class="group pelit__fimg" style="background-image: url(<?php _e($real_img) ?>)">
    <div class="group site-main pelit__fimg_inner">
        <div class="pelit__fimg_table">
        <div class="pelit__fimg_table_cell">
        <div class="entry-content">
            <h1><?php the_field('title_pah') ?></h1>
            <p class="has-text-align-center yellow_btn">
                <a rel="nofollow" href="#" class="" onclick="CU_SON_API.auth_open_registration(); return false;"><?php the_field('button_title_pah') ?></a>
            </p>
        </div>
        </div>
        </div>
    </div>
</div>

<?php
endif;