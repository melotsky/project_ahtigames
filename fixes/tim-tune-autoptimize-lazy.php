<?php
//TIM: tune autoptimize lazy
add_filter('autoptimize_filter_imgopt_lazyload_jsconfig', function($c){
  ob_start();?><script><?php ob_start();?>
    window.lazySizesConfig.ricTimeout=45;
    window.lazySizesConfig.expand=1;
    window.lazySizesConfig.expFactor=1;
    window.lazySizesConfig.hFac=1;
    window.lazySizesConfig.loadHidden=!1;
    window.lazySizesConfig.throttleDelay=30;
    window.addEventListener('lazybeforeunveil',(e)=>{
      try {
        var t=e.target;
        var u=t.getAttribute('data-bg');
//        console.log(u);
        if(u.length >0&&t.clientWidth>50){
          var U = new URL(u);
          if(U.host.endsWith('cloudinary.com')){
            U.pathname = U.pathname.replace('/f_auto,','/f_auto,w_'+t.clientWidth+',');
            if(u!=U.toString()){
              t.setAttribute('data-bg',U.toString());
            }
          }
        }
      } catch (e) {}
    });
  <?php $script=ob_get_clean();?></script><?php ob_clean();
  return str_replace('</script', $script.'</script', $c);
});
add_filter('autoptimize_filter_imgopt_lazyload_js', function($s){
  $d=[];
  preg_match( '#<script[^>]*src=("|\')([^>]*)("|\')#Usmi', $s, $d );
  $url = $d[2];
  header("link: <".$url.">; rel=prefetch;  as=script", false);
  return $s;
});

