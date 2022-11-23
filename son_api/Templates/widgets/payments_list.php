<?php

use cumuli\son_api\Helper;

/* @var $this \cumuli\son_api\widget\Base */
/* @var $payments \cumuli\son_api\data\PaymentMethod[] */

$n = 0;
$the_locale = get_locale();

$theclass = ($the_locale == "fi") ? '' : 'nonefin';
?>

<div class="pl__inner <?=$theclass?>" id="pl__parent">
<?php foreach($payments as $payment):?>
    <?php $frm_id = url_to_postid( $payment->reviewUrl ); ?>
  <div id="pl_list<?=$n++?>" class="pl__item">
    <div class="pl__upper group">
      <div class="pl__img">
        <?php if ( $the_locale == "fi") : ?>
            <a href="<?=$payment->reviewUrl??'#'?>">
        <?php else: ?>
            <a href="#" onclick="return false;">
        <?php endif; ?>
          <picture>
            <img src="<?=$payment->images['original']?>">
          </picture>
        </a>
      </div>
      <div class="pl__titlec">
        <h3><?=$payment->name?></h3>
        <div class="pl__typelists">
          <ul>
            <li class="pl__cross mate"><?php Helper::ln_e('deposit');?></li>
            <li class="pl__cross<?=$payment->withdrawals?' mate':''?>"><?php Helper::ln_e('withdraw');?></li>
          </ul>
        </div>
        <?php if ( $the_locale == "fi") : ?>
        <p><a href="<?=$payment->reviewUrl??'#'?>"><?php Helper::ln_e('read more');?></a></p>
        <?php endif; ?>
      </div>
    </div>
    <?php if ( $the_locale == "fi") : ?>
    <div class="pl__lower group">
      <div class="group pl__lower_left">
        <p class="semi_title"><?php Helper::ln_e('Processing time');?></p>
        <p class="semi_info clock_icon"><span>
            <?php if( get_field('enable_this_options', $frm_id) == 1 ){ the_field('processing_time', $frm_id); }else{ echo "0";} ?>
            <?php Helper::ln_e('banking day/s');?></span></p>
      </div><div class="group pl__lower_right">
        <p class="semi_title"><?php Helper::ln_e('min/max summa');?></p>
        <p class="semi_info info_icon"><span>
        <?php if( get_field('enable_this_options', $frm_id) == 1 ){ the_field('minmax_sum', $frm_id); }else{ echo "Min 0 / Max 0";} ?>    
        </span></p>
      </div>
    </div>
    <?php endif; ?>
  </div>
<?php  endforeach; ?>
</div>
  
