<?php
use cumuli\son_api\Helper;
?>
<div id="cc-prevenion-hover" class="prevenion_hover">
    <div class="ccp__main">
    <div class="ccp__outer">
    <div class="ccp__inner">
  <div style="" class="ccp__content_holder group">

    <div class="ccp__img">
        <img src="<?php _e(get_stylesheet_directory_uri())?>/assets/css/images/exclam.png" />
    </div>
    <div class="ccp__area group">
    <div class="cc-prevenion-header"><h4 class="cc-prevenion-title"><?= Helper::ln__($title)?></h4></div>
    <div class="cc-prevenionl-body text-center"><p><?= Helper::ln__($message)?></p>
      <a id="cc-prevenion-accept" href="#"><?= Helper::ln__('accept')?></a>
    </div>
    </div>

  </div>
    </div>
    </div>
    </div>
</div>
<script>
  (function(){
    function setCookie(n,v,m) {
        var e = "";
        if (m) {
            var d = new Date();
            d.setTime(d.getTime() + (m*60000));
            e = "; expires=" + d.toUTCString();
        }
        document.cookie = n + "=" + (v || "")  + e + "; path=/";
    }
    function getCookie(n) {
        var nEQ = n + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nEQ) == 0) return c.substring(nEQ.length,c.length);
        }
        return null;
    }
    
    if(getCookie('cc-prevenion') !== null){
      setCookie('cc-prevenion',true,10);
      var d=document.getElementById("cc-prevenion-hover");
      d.className += " hide";
    }
    
    document.getElementById("cc-prevenion-accept").addEventListener("click", function(e) {
      e.preventDefault();
      setCookie('cc-prevenion',true,10);
      var d=document.getElementById("cc-prevenion-hover");
      d.className += " hide";
    }, false);
  })()
</script>