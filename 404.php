<?php
/**
 * Header Template
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" maximum-scale=1.0, />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php
if ( is_singular() && get_option( 'thread_comments' ) )
wp_enqueue_script( 'comment-reply' );
wp_head();
use cumuli\son_api\Helper;
?>
</head>
<body <?php body_class(); ?>>
<?php do_shortcode('[cu_son_api_widget widgetclass=Login]'); ?>

<div id="the_404" class="group site-main">
    <a href="<?php _e( get_bloginfo('home') )?>">
        <img src="<?php _e( get_stylesheet_directory_uri() )?>/assets/css/images/ahti-badge.png" class="ahti_badge" />
    </a>
    <h1><?php Helper::ln_e('PAGE NOT FOUND'); ?></h1>
    <p class="top-p"><?php Helper::ln_e('The link you clicked may be broken or the page may have been removed.'); ?></p>
    <div class="group" id="the_404_btns">
        <a href="#" onclick="CU_SON_API.auth_open_login(); return false;">
            <?php Helper::ln_e('login'); ?>
        </a>
        <a href="#" onclick="CU_SON_API.auth_open_registration(); return false;">
            <?php Helper::ln_e('sign up'); ?>
        </a>
    </div>
    <p class="last-p">
    <?php Helper::ln_e('visit the'); ?> <a href="<?php _e( get_bloginfo('home') )?>"><?php Helper::ln_e('homepage'); ?></a> <?php Helper::ln_e('or'); ?> <a href="<?php echo get_permalink( pll_get_post( '886' ) );?>"><?php Helper::ln_e('contact us'); ?></a> <?php Helper::ln_e('about the problem'); ?> 
    </p>
</div>

<?php wp_footer(); ?>

</body>
</html>