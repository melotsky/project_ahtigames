<?php
/* Yellow Button Template
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'yellow-btn-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'yellow-btn';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
//$blogID = get_option( 'page_for_posts' );

if ( get_field('enable_yellow_button') == 1 ) :
    $label = get_field('button_label_ybtn');
    $selectfield = get_field('link_ybtn');
?>

<div id="<?php _e($id)?>" class="group <?php _e($className)?>">
    <p class="yellow_btn">
        
    <?php 
    
    if ( $selectfield == 'prf' ):
        echo "<a rel=\"nofollow\" href=\"#\" onclick=\"CU_SON_API.auth_open_registration(); return false;\">{$label}</a>";
    elseif ( $selectfield == 'plf' ):
        echo "<a rel=\"nofollow\" href=\"#\" onclick=\"CU_SON_API.auth_open_login(); return false;\">{$label}</a>";
    elseif ( $selectfield == 'normallink' ):
        $thelink = get_field('link_typical');
        $thelink_url = $thelink['url'];
        $thelink_target = $thelink['target'] ? $thelink['target'] : '_self';?>

        <a href="<?php echo esc_url( $thelink_url )?>" target="<?php echo esc_attr( $thelink_target ); ?>"><?php _e($label)?></a>
    <?php endif; ?>
</div>

<?php endif;?>