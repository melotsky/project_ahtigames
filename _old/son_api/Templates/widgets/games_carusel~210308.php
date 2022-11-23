<?php

use cumuli\son_api\Helper;

/* @var $this \cumuli\son_api\widget\Base */
/* @var $id string */
/* @var $title string */
/* @var $more_link string */
/* @var $games \cumuli\son_api\data\Game[] */

$items = [];
?>
<div class="group hp_hc__wrapper splide__slider">
  <div class="group hphc__title">
    <?php if (!empty($title)): ?>
      <h2><?= $title ?></h2>
    <?php endif; ?>
    <?php if (!empty($more_link)): ?>
        <div class="group hphc__right near_title">
            <a href="<?= $more_link ?>"><?php Helper::ln_e('See more');?></a>
        </div>
    <?php endif; ?>

    <div class="group hphc__right">

      <div class="group hphc__prevnext">
        <span class="prev slick-arrow"></span>
        <span class="next slick-arrow"></span>
      </div>
    </div>
  </div>
  <div class="hphc__holder  splide__track">
    <div class="flex_thisarea splide__list">
  <?php 
  $itemFile = $this->main->helper->getPluginTemplateFile('widgets/game_list_item.php');
  foreach ($games as $g){
    ob_start();
    include $itemFile;
    $items[] = str_replace('"tgt__items"','"tgt__items splide__slide"',ob_get_clean());
  } 
  echo implode('', $items);
  ?>
    </div>
  </div>
</div>
<?php ob_start() //script cover?>
<script>
<?php ob_start()//common script slic?>
jQuery(document).ready(function () {
  var timeout = 10;
  var offsetTop = jQuery('#<?=$id?>').offset().top;
  if(screen.height < offsetTop){
    timeout+=(offsetTop - screen.height)/3;
  }
    
  setTimeout(()=>{
<?php if(wp_is_mobile()):?>
    jQuery("#<?= $id ?> .flex_thisarea").removeClass("flex_thisarea");
<?php else:?>
  window.splideWhenReady(function(){
    jQuery("#<?= $id ?> .flex_thisarea").removeClass("flex_thisarea");
    var s = new Splide('#<?= $id ?>',{
      type:'loop',
      loop: true,
      pagination: false,
      speed: 500,
      autoplay: false,
      lazyLoad: false,
      perPage: 5,
      perMove: 5,
      arrows: false,
      classes:{
        arrows: 'hphc__prevnext', 
        next:'next.slick-arrow', 
        prev:'next.slick-arrow'
      },
      breakpoints: {
        1160: {
          perPage: 4,
          perMove: 4
        },
        931: {
          perPage: 3,
          perMove: 3
        },
        481: {
          destroy:true
        }
      }
    }).mount();
    jQuery("#<?= $id ?> .slick-arrow.prev").on("click",()=> s.go('<'));
    jQuery("#<?= $id ?> .slick-arrow.next").on("click",()=> s.go('>'));
  })
<?php endif;?>
  },timeout);
});
<?php $scriptSlic = ob_get_clean();?>
<?php
$this->jscriptCommon = $scriptSlic;
?>
</script>
<?php ob_get_clean()?>
