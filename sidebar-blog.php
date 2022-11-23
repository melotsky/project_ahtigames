<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kick_Ass_Theme
 */

//if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	//return;
//}
$desktop_banner = wp_get_attachment_image_src(get_field('desktop_banner', 'option'), 'advertise__desktop'); 

?>

<aside id="blog__sb" class="group" role="complementary">

	<div class="banner_sb" class="group">
		<a href="#" onclick="CU_SON_API.auth_open_registration(); return false;">
			<img src="<?php _e($desktop_banner[0])?>" />
		</a>
	</div>
	<?php if ( is_active_sidebar( 'sb' ) ) : ?>
		<?php dynamic_sidebar( 'sb' ); ?>
	<?php endif; ?>
</aside><!-- #secondary -->
