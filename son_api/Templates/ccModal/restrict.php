<?php
use cumuli\son_api\Helper;
?>
<div class="cc-restrict-hover" style="display: block; z-index:99999;">

    <div class="cc__outer">
    <div class="cc__inner group">
    <div class="cc__rej group">
    <div class="ccp__img">
        <img src="<?php _e(get_stylesheet_directory_uri())?>/assets/css/images/exclam.png" />
    </div>
    <div class="ccp__area group">
  <div class="cc-restrict-content">
    <div class="cc-restrict-header"><h4 class="modal-title"><?= Helper::ln__($title)?></h4></div>
    <div class="cc-restrict-body text-center"><p><?= Helper::ln__($message)?></p></div>
  </div>
  </div>
  </div>

  </div>
  </div>

</div>
<?php
    echo get_stylesheet_directory_uri();
?>
<style>
@font-face {
  font-family: 'Bebas Neue';
  font-style: normal;
  font-weight: 400;
  src: local('Bebas Neue Regular'), local('BebasNeue-Regular'),
       url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/bebas-neue-v2-latin-regular.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/bebas-neue-v2-latin-regular.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

@font-face {
  font-family: 'Proxima Nova Black';
  src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Black.eot');
  src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Black.eot?#iefix') format('embedded-opentype'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Black.woff2') format('woff2'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Black.woff') format('woff'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Black.ttf') format('truetype'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Black.svg#ProximaNova-Black') format('svg');
  font-weight: 900;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: 'Proxima Nova';
  src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Regular.eot');
  src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Regular.eot?#iefix') format('embedded-opentype'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Regular.woff2') format('woff2'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Regular.woff') format('woff'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Regular.ttf') format('truetype'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Regular.svg#ProximaNova-Regular') format('svg');
  font-weight: 400;
  font-style: normal;
  font-display: swap;
}

@font-face {
    font-family: 'Proxima Nova Extrabold';
  src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Extrabld.eot');
  src: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Extrabld.eot?#iefix') format('embedded-opentype'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Extrabld.woff2') format('woff2'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Extrabld.woff') format('woff'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Extrabld.ttf') format('truetype'),
      url('<?php echo get_stylesheet_directory_uri(); ?>/assets/css/fonts/ProximaNova-Extrabld.svg#ProximaNova-Extrabld') format('svg');
  font-weight: 800;
  font-style: normal;
  font-display: swap;
}

    #error-page{
        margin: 0 auto ! important;
        font-family: 'Proxima Nova';
        padding: 1rem !important;
        background: #0649b4;
        background: #0a379e;
        height: 100%
        width: 100%;
        max-width: unset !important;
    }

    .cc-restrict-hover {
        background: transparent !important;
        height: 100%;
        padding: 0;
    }
    .cc__inner.group {
        display: table-cell;
        width: 100%;
        height: 100%;
        vertical-align: middle;
    }
    .cc__outer {
        display: table;
        width: 100%;
        height: 100%;
    }
    .ccp__img{
        padding: 0 0 1rem;
    }
    .ccp__img img{
        display: block;
        margin: 0 auto;
        width: 50%;
    }
    .cc__rej {
        background: #fff;
        padding: 1rem;
    }
    .ccp__area{}
    .ccp__area{}
    .ccp__area{}
    .cc-restrict-header h4{
        padding: 0 0 1rem;
    font-family: "Proxima Nova Extrabold";
    text-align: center;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 1.5rem;
    color: #082b91;
    margin: 0;        
    }
    .cc-restrict-body{}
    .cc-restrict-body p {
        padding: 0 0 1rem;
        text-align: center;
        font-size: 1rem;
        color: #333;
        margin: 0 !important;
    }
    @media only screen and (min-width : 600px ) {
        .cc__rej {
            padding: 1rem;
            width: 440px;
            margin: 0 auto;
        }
        .ccp__img img {
            width: 200px;
        }
    }

    html{
        background: transparent !important;
    }
</style>