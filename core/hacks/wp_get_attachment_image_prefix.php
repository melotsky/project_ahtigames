<?php
// generate scset and sizes for prefixed only
function wp_get_attachment_image_prefix( $attachment_id, $prefix, $size = 'thumbnail', $icon = false, $attr = [] )
{
  $image = wp_get_attachment_image_src( $attachment_id, $size, $icon );

	if ( $image ) {
		list( $src, $width, $height ) = $image;

  
    $image_meta = wp_get_attachment_metadata( $attachment_id );
    if ( is_array( $image_meta ) ) {
      //
      $sizes_array=[];
      foreach ($image_meta['sizes'] as $k=>$v){
        if(strpos( $k , $prefix ) === 0){
          $sizes_array[$k]=$v;
        }
      }
      $image_meta['sizes']=$sizes_array;
      //
      $size_array = array( absint( $width ), absint( $height ) );
      $srcset     = wp_calculate_image_srcset( $size_array, $src, $image_meta, $attachment_id );
      $sizes      = wp_calculate_image_sizes( $size_array, $src, $image_meta, $attachment_id );

      if ( $srcset && ( $sizes || ! empty( $attr['sizes'] ) ) ) {
        $attr['srcset'] = $srcset;

        if ( empty( $attr['sizes'] ) ) {
          $attr['sizes'] = $sizes;
        }
      }
    }

  }
  return wp_get_attachment_image($attachment_id, $size, $icon, $attr);
}