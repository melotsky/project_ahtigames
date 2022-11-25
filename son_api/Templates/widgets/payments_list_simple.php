<?php

use cumuli\son_api\Helper;

/* @var $this \cumuli\son_api\widget\Base */
/* @var $payments \cumuli\son_api\data\PaymentMethod[] */

$n = 0;
?>
<div class="wp-block-group payment__cards">
<div class="wp-block-group__inner-container">
<?php foreach($payments as $payment):?>
  <div class="wp-block-group payment__cards__items">
    <div class="wp-block-group__inner-container">
      <div class="wp-block-image">
        <figure class="aligncenter size-large">
          <a href="<?=$payment->reviewUrl??'#'?>">
            <img src="<?=$payment->images['large']?>" title="<?=$payment->name?>">
         </a>
        </figure>
      </div>
    </div>
  </div>
<?php endforeach;?>
</div>
</div>
