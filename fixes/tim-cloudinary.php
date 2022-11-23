<?php
//TIM:cloudinary fixes
//remove clodinay galery
add_filter( 'wp_print_scripts', function(){
  wp_deregister_script([
    'cloudinary-media-library',
    'cloudinary-gallery-init',
    'cld-core',
    'cld-player',
    'cld-videoinit',
    'cld-gallery',
  ]);
}, 1 );
//fix file meta for get srcset
add_filter('wp_calculate_image_srcset_meta',function($image_meta, $size_array, $image_src, $attachment_id){
  try {
    $cloudinary = \Cloudinary\get_plugin_instance();
    $media = $cloudinary->get_component('media');
    $cloudinary_id = $media->get_cloudinary_id( $attachment_id );
    $image_meta['file']= ''
        . pathinfo( $cloudinary_id, PATHINFO_FILENAME ) . '/'
        . pathinfo( $cloudinary_id, PATHINFO_BASENAME );
    foreach ($image_meta['sizes'] as $k =>$v){
      $image_meta['sizes'][$k]['file'] = $media->convert_url($v['file'], $attachment_id);
    }
  } catch (Exception $exc) {
  }
  return $image_meta;
},10,4);

//fix disable core lazy loading reason conflict cloudinary and autooptimize
add_action('wp',function(){
  remove_all_filters('wp_lazy_loading_enabled');
  add_filter( 'wp_lazy_loading_enabled', '__return_false');
},11);

//fix cloudinary_context_options related to get_the_gid
add_filter('cloudinary_context_options',function($context_options,$post){
  if(isset($context_options['guid'])&&$post->ID > 0){
    $file = get_post_meta($post->ID,'_wp_attached_file',false);
    if(is_array($file)&& count($file)>0){
      $file = $file[0];
      $context_options['guid'] = md5($file);
    }
  }
  return $context_options;
},10,2);
