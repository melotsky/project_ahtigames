<?php
use cumuli\son_api\Helper;

/* @var $this \cumuli\son_api\widget\Base */
/* @var $game \cumuli\son_api\data\Game */
/* @var $gameMobile \cumuli\son_api\data\Game */
//global $string;

if(wp_is_mobile()){
  if($gameMobile){
    $funMode = $gameMobile->fun_mode;
    $funUrl = $gameMobile->funUrl;
  }else{
    $funMode = $game->fun_mode;
    $funUrl = $game->funUrl;
  }
}else{
  $funMode = $game->fun_mode;
  $funUrl = $game->funUrl;
}

$flag2 = $game->is_megaways ? 'megaways' : 'xx' ;

if($game->is_hot || $game->is_most_popular){
    $flag = 'popular';
  }elseif($game->is_jackpot){
    $flag = 'jackpot';
  }elseif($game->daily_jackpot){
    $flag = 'jackpot daily';
  }elseif($game->is_new){
    $flag = 'new';
  }else{
    $flag = false;
  }
?>

<?php if($funMode):
    $iframe = "<iframe style=\"margin:0;padding:0;border:none;\" scrolling=\"no\" allowfullscreen=\"\" src=\"{$funUrl}\"></iframe>";
    $iframex = '&lt;iframe style=&quot;margin:0;padding:0;border:none;&quot; scrolling=&quot;no&quot; allowfullscreen=&quot;&quot; src=&quot;'.$funUrl.'&quot;&gt;&lt;/iframe&gt;';
endif;?>
<?php
$slots_features = $game->slots_features;
?>


<div id="demo-iframe" class="group">
    <div class="site-main" id="demo_iframe">
        <div class="group di__wrapper">

            <div class="di__img">
                <img width="720" height="400" id="single_screenshot_game" src="<?php $game->screenshot; ?>" alt="<?=$game->application_name?>" title="<?=$game->application_name?>" class="" />
                <?php if($funMode): ?>
                    <div id="demo_holder"></div>
                    <div class="new_btns group">
                        <div class="new_btnstable">
                            <div class="new_btnstablecell">
                                <div class="sgi__btns group">
                                    <p class="has-text-align-center">
                                        <a href="#" onclick="CU_SON_API.auth_open_registration(); return false;" class="sgi_btn_yellow">pelaa nyt</a>
                                        <a href="#" class="sgi_btn_yellow_to_transparent demo_mobile_class1">ilmaispeli</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                            jQuery(document).ready(function(jQuery) {
                                jQuery('.demo_mobile_class1').click(function () {
                                    jQuery('#demo_holder').html('<?=$iframe?>');
                                    jQuery('.demo_mobile_class1').hide();
                                    jQuery('.demo_mobile_class2').show();
                                    jQuery('.demo_mobile_class1 .dm_2').toggleClass('active');
                                    jQuery('.demo_mobile_class2 .dm_2').toggleClass('active');
                                    jQuery('.new_btns').hide();
                                    jQuery('#single_game_hidbtn').show();
                                    return false;
                                });

                                jQuery('.demo_mobile_class2').click(function () {
                                    jQuery('#demo_holder').html('');
                                    jQuery('.demo_mobile_class2').hide();
                                    jQuery('.demo_mobile_class1').show();
                                    jQuery('.demo_mobile_class1 .dm_2').toggleClass('active');
                                    jQuery('.demo_mobile_class2 .dm_2').toggleClass('active');
                                    return false;
                                });

                            });
                        </script>                                             
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function(jQuery) {
    setTimeout( function(){
    jQuery(".di__img").find('img').each(function(){
    if (this.isLoaded()) {
          // nothiong to do with this
          //console.log("loaded");
    }
    else {
        console.log("nope");
        var newimage = '<?php echo get_stylesheet_directory_uri() . "/assets/css/images/nogame_img.png"; ?>';
        jQuery("#single_screenshot_game").removeAttr("src");
        jQuery("#single_screenshot_game").attr('src', newimage);
    }
    });
    }, 2000); //2 seconds
  });
</script>

<div id="sgi" class="group">
  <div id="sgi__wrapper" class="site-main">

    <div class="sgi__top_info group" style="position: relative">
        <div class="mob_tgt_top">

            <?php //var_dump($game->slots_themes) ?>


            <?php if ($flag2 == 'megaways') :?>
                <div class="tgt_type_1">
                    <div class="tgt_type_2">
                        <span><?php Helper::ln_e('megaways'); ?></span>
                        <div class="tgt_type_3 popular"></div>
                    </div>
                </div>
            <?php endif; ?>

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

            <?php if($game->jackpot_amount > 0):?>
            <div class="tgt_jackpot_1">
                <div class="tgt_jackpot_2">
                <span><?= Helper::currencyFormat($game->jackpot_amount, '')?></span>
                <div class="tgt_jackpot_3"></div>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>

    <?php 
        $rating_value = $game->ratingValue * 20; 
        $rating_value .= '%';
    ?>
    <div class="sgi__title">
        <h1 class=""><?=$game->application_name?></h1>
      
        <div class="sgi__gamerate">

            <div class="sgi__starholder">
                <div class="sgi__starbase">
                    <div class="sgi__starinner" style="width: <?php _e($rating_value)?> !important"></div>
                </div>
            </div>

            <div class="sgi__info">
                <div class="sgi__tinfo">
                    <div class="sgi__ttable">
                        <div class="sgi__ttablecell">
                            <span><?php echo $game->ratingValue . ' • ' . $game->rating['ratingSum']; ?> <?php Helper::ln_e('Arvostelut') ?></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="sgi__theme">
            <p><span><?php Helper::ln_e('Teema') ?>: </span>
            <?php
            $slot_themes_count = count($game->slots_themes);
            $counter = 1;
            foreach( $game->slots_themes as $hah){
               echo $hah;
               if($counter != $slot_themes_count) {
                echo ', ';
               }
               $counter++;
            }
            ?>
            </p>
        </div>

    </div>
    


    <?php if( $game->biggest_win or $game->paylines or $game->max_win or $game->min_bet or $game->volatility or $game->game_provider or $game->preels) : ?>
        <div class="sgi_text__info">

            <div class="sgit__item">
                <p><?php Helper::ln_e('Isoin voitto'); ?></p>
                <h4><?php echo Helper::currencyFormat($game->biggest_win, '')?></h4>
            </div>

            <div class="sgit__item">
                <p><?php Helper::ln_e('Palautusprosentti'); ?></p>
                <h4><?php _e( $game->rtp_max . '%' ) ?>
            </h4>
            </div>
            
            <div class="sgit__item">
                <p><?php Helper::ln_e('Maksulinjat'); ?></p>
                <h4><?php echo $game->paylines ?></h4>
            </div>  
            
            <div class="sgit__item">
                <p><?php Helper::ln_e('Max. Voitto'); ?></p>
                <h4><?php echo Helper::currencyFormat($game->max_win, '')?></h4>
            </div>

            <?php if( $game->min_bet or $game->volatility or $game->game_provider or $game->preels ) : ?>
                <div class="sgit__border"></div>

                <div class="sgit__item">
                    <p><?php Helper::ln_e('Min Panos'); ?></p>
                    <h4><?php echo Helper::currencyFormat($game->min_bet, '')?></h4>
                </div>

                <div class="sgit__item">
                    <p><?php Helper::ln_e('Volatiliteetti'); ?></p>
                    <h4><?php echo $game->volatility ?></h4>
                </div>

                <div class="sgit__item">
                    <p><?php Helper::ln_e('Pelivalmistaja'); ?></p>
                    <h4><?php echo $game->game_provider ?></h4>
                </div>

                <div class="sgit__item">
                    <p><?php Helper::ln_e('Rullat'); ?></p>
                    <h4><?php echo $game->preels ?></h4>
                </div>

            <?php endif; ?>

        </div>
    <?php endif; ?>



    
    <?php if( in_array('bonus', $slots_features) or in_array('free_spins', $slots_features) or in_array('win_multiplier', $slots_features) or in_array('respin', $slots_features) or in_array('win_multiplier', $slots_features) ): ?>
        <div class="sgif__block">

            <?php if(in_array('bonus', $slots_features)):?>
                <div class="sgif__items">
                    <span class="sgi_f_img">
                        <img width="46" height="48" class=" lazyloaded" src="<?php _e( get_stylesheet_directory_uri() )?>/assets/css/images/bonus-img.png"/>
                    </span>
                    <span class="sgi_f_label"> <?php Helper::ln_e('bonus'); ?> </span>
                </div>
            <?php endif; ?>

            <?php if(in_array('free_spins', $slots_features)):?>
                <div class="sgif__items">
                    <span class="sgi_f_img">
                        <img width="46" height="48" class=" lazyloaded" src="<?php _e( get_stylesheet_directory_uri() )?>/assets/css/images/machine-img.png"/>
                    </span>
                    <span class="sgi_f_label"> <?php Helper::ln_e('ilmaiskierroksia'); ?> </span>
                </div>
            <?php endif; ?>

            <?php if(in_array('win_multiplier', $slots_features)):?>
                <div class="sgif__items">
                    <span class="sgi_f_img">
                        <img width="46" height="48" class=" lazyloaded" src="<?php _e( get_stylesheet_directory_uri() )?>/assets/css/images/win-img.png"/>
                    </span>
                    <span class="sgi_f_label"> <?php Helper::ln_e('tuplaus'); ?> </span>
                </div>
            <?php endif; ?>

            <?php if(in_array('respin', $slots_features)):?>
                <div class="sgif__items">
                    <span class="sgi_f_img">
                        <img width="46" height="48" class=" lazyloaded" src="<?php _e( get_stylesheet_directory_uri() )?>/assets/css/images/respin-img.png"/>
                    </span>
                    <span class="sgi_f_label"> <?php Helper::ln_e('respin'); ?> </span>
                </div>
            <?php endif; ?>


            <?php if(in_array('win_multiplier', $slots_features)):?>
                <div class="sgif__items">
                    <span class="sgi_f_img">
                        <img width="52" height="48" class=" lazyloaded" src="<?php _e( get_stylesheet_directory_uri() )?>/assets/css/images/viotto-img.png"/>
                    </span>
                    <span class="sgi_f_label"> <?php Helper::ln_e('voittokerroin'); ?> </span>
                </div>
            <?php endif; ?>

        </div>
    <?php endif; ?>

  </div>
</div>