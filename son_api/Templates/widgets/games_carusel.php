<?php

use cumuli\son_api\Helper;

/* @var $this \cumuli\son_api\widget\Base */
/* @var $id string */
/* @var $title string */
/* @var $more_link string */
/* @var $games \cumuli\son_api\data\Game[] */

$items = [];
?>
<div class="group hp_hc__wrapper">
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
        <span class="prev"></span>
        <span class="next"></span>
      </div>
    </div>
  </div>
  <div class="hphc__holder keen-slider flex_thisarea">

    <!-- <div class="flex_thisarea splide__listx"> -->

  <?php 
  $itemFile = $this->main->helper->getPluginTemplateFile('widgets/game_list_item.php');
  foreach ($games as $g){
    ob_start();
    include $itemFile;
    $items[] = str_replace('"tgt__items"','"tgt__items keen-slider__slide"',ob_get_clean());
  } 
  echo implode('', $items);
  ?>

    <!-- </div> -->


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
  window.keenWhenReady(function(){
    var s = new KeenSlider('#<?= $id ?> .keen-slider',{
      slidesPerView: 3,
      mode: "free",
      spacing: 15,
      loop: true,
      breakpoints: {
        "(min-width: 931px)": {
          slidesPerView:4,
          mode: "snap"
        },
        "(min-width: 1161px)": {
          slidesPerView:5,
          mode: "snap"
        }
      }
    });
    jQuery("#<?= $id ?> .flex_thisarea").removeClass("flex_thisarea");  
    jQuery("#<?= $id ?> .hphc__prevnext .prev").on("click",()=> {
      var d=s.details();
      s.moveToSlide(d.absoluteSlide-d.slidesPerView);
    });
    jQuery("#<?= $id ?> .hphc__prevnext .next").on("click",()=> {
      var d=s.details();
      s.moveToSlide(d.absoluteSlide+d.slidesPerView);
    });
  });

  },timeout);
});
<?php $scriptSlic = ob_get_clean();?>
<?php
$this->jscriptCommon = $scriptSlic;
?>
</script>
<?php ob_get_clean()?>
