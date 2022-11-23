<?php
//TIM: tune autooptimize push main JS
add_filter('autoptimize_filter_js_bodyreplacementpayload', function($s){
  $d=[];
  preg_match( '#<script[^>]*src=("|\')([^>]*)("|\')#Usmi', $s, $d );
  $url = $d[2];
  header("link: <".$url.">; rel=preload;  as=script", false);
  return $s;
});

