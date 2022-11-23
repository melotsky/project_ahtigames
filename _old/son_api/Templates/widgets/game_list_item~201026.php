<?php
use cumuli\son_api\Helper;
/* @var $this \cumuli\son_api\widget\Base */
/* @var $g \cumuli\son_api\data\Game */

if($g->is_hot || $g->is_most_popular){
  $flag = 'popular';
}elseif($g->is_jackpot){
  $flag = 'jackpot';
}elseif($g->daily_jackpot){
  $flag = 'jackpot daily';
}elseif($g->is_new){
  $flag = 'new';
}else{
  $flag = false;
}
?>
<div class="tgt__items">
  <div class="tgt__items_holder">
    <div class="tgt__img">
    <?php if($g->reviewUrl):?>
      <a href="<?=$g->reviewUrl?>">
    <?php else:?>
      <a href="#" onClick="CU_SON_API.game_playNow('<?=$g->internal_game_id?>'); return false;">
    <?php endif;?>
        <img src="<?= $g->getImage('sq', 250) ?>" alt="<?= $g->application_name ?>" title="<?= $g->application_name ?>" data-lazy-width="250"  data-lazy-height="250" />
        <div class="mob_tgt_top">

    <?php if($flag):?>
      <div class="tgt_type_1">
        <div class="tgt_type_2">
        <?php //echo $flag ?>
        <?php if( $flag == "new" ):?>
          <span><?php Helper::ln_e('new'); ?></span>
        <?php elseif( $flag == "popular" ): ?>
            <span><?php Helper::ln_e('popular'); ?></span>
        <?php elseif( $flag == "jackpot daily" ): ?>
            <span><?php Helper::ln_e('jackpot daily'); ?></span>
        <?php elseif( $flag == "jackpot" ) : ?>
            <span><?php Helper::ln_e('jackpot'); ?></span>
        <?php endif; ?>

          <div class="tgt_type_3 <?=$flag?>"></div>
        </div>
      </div>
    <?php endif;?>
    
    <?php if($g->jackpot_amount > 0):?>
      <div class="tgt_jackpot_1">
        <div class="tgt_jackpot_2">
          <span><?= Helper::currencyFormat($g->jackpot_amount, '')?></span>
          <div class="tgt_jackpot_3"></div>
        </div>
      </div>
    <?php endif;?>
        </div>
      </a>
    </div>
    <div class="group tgt__hover">
      <div class="tgt__table">
        <div class="tgt__tablecell">
          <p class="tgt__title"><?= $g->application_name ?></p>
          <!-- p class="hphc__type"><?= $g->game_family_group ?></p -->
          <p class="tgt__reg"><a href="#" onclick="CU_SON_API.game_playNow('<?=$g->internal_game_id?>'); return false;"><?php Helper::ln_e('Play now'); ?></a></p>
              <?php if ($g->fun_mode): ?>
                <?php if ($g->reviewUrl): ?>
                  <p class="hphc__demo"><a href="<?= $g->reviewUrl ?>" ><?php Helper::ln_e('Try for free'); ?></a></p>
                <?php else: ?>
                    <?php 
                    global $string;
                    $string = pll__($string);
                    $iframe_demo = $g->funUrl; 
                    $iframex = '&lt;iframe style=&quot;margin:0;padding:0;border:none;&quot; scrolling=&quot;no&quot; allowfullscreen=&quot;&quot; src=&quot;'.$iframe_demo.'&quot;&gt;&lt;/iframe&gt;'; 
                    $btnx =  '&lt;div id=&quot;content&quot; class=&quot;frm_helper__btn&quot;&gt;&lt;div class=&quot;entry-content&quot;&gt;&lt;p class=&quot;yellow_btn&quot;&gt;&lt;a href=&quot;#&quot; onclick=&quot;CU_SON_API.auth_open_registration(); return false;&quot;&gt;'.$string.'&lt;/a&gt;&lt;p&gt;&lt;/div&gt;&lt;/div&gt;';
                    //Helper::ln_e('teste'); 
                    ?>
                  <p class="hphc__demo"><a href="#game-fun-lightbox" onClick="CU_SON_API.game_modalFunUrl('<?php echo $g->funUrl?>', '<?php _e($btnx)?>'); return false;"><?php Helper::ln_e('Try for free'); ?></a></p>
                  <!-- p class="hphc__demo"><a href="#game-fun-lightbox" onClick="jQuery('#game-fun-lightbox').html('<?php _e($iframex)?>'); return false;"><?php Helper::ln_e('Try for free'); ?></a></p -->
                <?php endif; ?>
                <?php endif; ?>
                <?php if ($g->reviewUrl): ?>
                <!-- p class="hphc__reviewlink"><a href="<?= $g->reviewUrl ?>"><?php Helper::ln_e('Review'); ?></a></p -->
                <?php endif; ?>
        </div>
      </div>
    </div>

  </div>
</div>
