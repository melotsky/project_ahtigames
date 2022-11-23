<?php
/**
 * Homepage Tabs Template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'homepage-tab-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'homepage_tabs';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$blogID = get_option( 'page_for_posts' );

?>

<div id="flipper"><span><?php _e('our casino games', 'ahti_lang') ?></span><span class="search__test"></span></div>
    <div id="panel" style="display: none">
        <ul class="tabs">
            <li><a href="#jackpot_games"><span><?php _e('jackpot games', 'ahti_lang') ?></span></a></li>
            <li><a href="#roulette"><span><?php _e('roulette', 'ahti_lang') ?></span></a></li>
            <li><a href="#slots"><span><?php _e('slots', 'ahti_lang') ?></span></a></li>
            <li><a href="#card_games"><span><?php _e('card games', 'ahti_lang') ?></span></a></li>
        </ul>
    </div>

<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery("#flipper").click(function(){
        jQuery("#flipper").toggleClass("stat");
        jQuery("#panel").slideToggle();
  });
});
</script>


