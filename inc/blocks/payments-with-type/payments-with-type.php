<?php
/* Payments Lists Template.
*
* @param   array $block The block settings and attributes.
* @param   string $content The block inner HTML (empty).
* @param   bool $is_preview True during AJAX preview.
* @param   (int|string) $post_id The post ID this block is saved to.
*/

// Create id attribute allowing for custom "anchor" value.
$id = 'payments-lists-' . $block['id'];
if( !empty($block['anchor']) ) {
   $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'payments-lists';
if( !empty($block['className']) ) {
   $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
   $className .= ' align' . $block['align'];
}
$checker = get_field('enable_payment_lists');
if( $checker == "1" ) : 
?>
<div id="<?php _e($id)?>" class="group pl__wrapper">
    <div class="pl__inner" id="pl__parent">
    <?php echo do_shortcode('[cu_son_api_widget widgetclass=PaymentsList]'); ?>
    </div>
</div> 

<?php endif; ?>