<?php
//TIM: prefeatch DNS
add_filter('send_headers', function(){
  header("link: <https://aws-origin.image-tech-storage.com/>; rel=dns-prefetch", false);
});


