<?php
/**
 * Header Template
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="format-detection" content="telephone=no">
<!-- meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" maximum-scale=1.0, / -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no" maximum-scale=1, />
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php
if( get_field('enable_x_default') == '1') :
    $target_url = get_field('url_xdef');
    echo "<link rel=\"alternate\" href=\"{$target_url}\" hreflang=\"x-default\" />";
endif;
if ( is_singular() && get_option( 'thread_comments' ) )
wp_enqueue_script( 'comment-reply' );
wp_head();
?>




<!-- Google Tag Manager -->
<script>
    (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            '//www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-T2B6H8P');
</script>
<!-- End Google Tag Manager -->
<!-- script type="application/javascript">
  (function(b,o,n,g,s,r,c){if(b[s])return;b[s]={};b[s].scriptToken="Xzc2NDk0OTA4";b[s].callsQueue=[];b[s].api=function(){b[s].callsQueue.push(arguments);};r=o.createElement(n);c=o.getElementsByTagName(n)[0];r.async=1;r.src=g;r.id=s+n;c.parentNode.insertBefore(r,c);})(window,document,"script","https://cdn.oribi.io/Xzc2NDk0OTA4/oribi.js","ORIBI");
</script -->
<script src="https://www.googleoptimize.com/optimize.js?id=GTM-TVVJR83"></script>
</head>
<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2B6H8P" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php 
my_slidebar(); 
my_header();
?>