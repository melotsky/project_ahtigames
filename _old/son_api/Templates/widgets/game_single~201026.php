<?php
use cumuli\son_api\Helper;

/* @var $this \cumuli\son_api\widget\Base */
/* @var $game \cumuli\son_api\data\Game */
//global $string;
?>

<?php if($game->fun_mode):
    $iframe_demo = $game->funUrl;
    $iframe = "<iframe style=\"margin:0;padding:0;border:none;\" scrolling=\"no\" allowfullscreen=\"\" src=\"{$iframe_demo}\"></iframe>"; 
    $iframex = '&lt;iframe style=&quot;margin:0;padding:0;border:none;&quot; scrolling=&quot;no&quot; allowfullscreen=&quot;&quot; src=&quot;'.$iframe_demo.'&quot;&gt;&lt;/iframe&gt;'; 
endif;?>
<?php 
//echo $string;
//pll_e($string);
//$game->getImage('sq', 250);
//$game->screenshot;
//$fdf = $game->slots_symbols;
// FOR BONUS, FREE SPINS
$slots_features = $game->slots_features;
//echo $fdf;
?>
<!-- pre>
    <?php //print_r($slots_features)?>
</pre -->

<div id="demo-iframe" class="group">
    <div class="site-main" id="demo_iframe">
        <div class="group di__wrapper">

                <?php if($game->fun_mode): ?>
                <div class="di__democontroller">
                    <div class="di__dcontrol">
                        <div class="di__mob"> <a href="#game-fun-lightbox" class="html5lightbox"><?php Helper::ln_e('play free demo'); ?></a> </div>
<?php
                    global $string;
                    $string = pll__($string);
                    // $iframe_demo = $g->funUrl; 
                    // $iframex = '&lt;iframe style=&quot;margin:0;padding:0;border:none;&quot; scrolling=&quot;no&quot; allowfullscreen=&quot;&quot; src=&quot;'.$iframe_demo.'&quot;&gt;&lt;/iframe&gt;'; 
                    $btnx =  '&lt;div id=&quot;content&quot; class=&quot;frm_helper__btn&quot;&gt;&lt;div class=&quot;entry-content&quot;&gt;&lt;p class=&quot;yellow_btn&quot;&gt;&lt;a href=&quot;#&quot; onclick=&quot;CU_SON_API.auth_open_registration(); return false;&quot;&gt;'.$string.'&lt;/a&gt;&lt;p&gt;&lt;/div&gt;&lt;/div&gt;';                        
?>                    
                            <div class="di__desktop group"> <a href="#game-fun-lightbox" class="html5lightbox" id="tls" onclick="jQuery('#demo_holder').html(''); jQuery('.demo_mobile_class1 .dm_2').removeClass('active'); jQuery('.demo_mobile_class2 .dm_2').removeClass('active'); jQuery('.demo_mobile_class2').hide(); jQuery('.demo_mobile_class1').show(); jQuery('#game-fun-lightbox').html('<?php echo $iframex . $btnx; ?>');"></a> <a href="#" id="demo_mobile" class="demo_mobile_class1"><span class="dm_1"><?php Helper::ln_e('play free demo'); ?></span><span class="dm_2"></span></a> <a href="#" id="demo_mobile" class="demo_mobile_class2" style="display: none"><span class="dm_1"><?php Helper::ln_e('play free demo'); ?></span><span class="dm_2"></span></a> 
                                <script type="text/javascript">
                                            jQuery(document).ready(function(jQuery) {
                                                jQuery('.demo_mobile_class1').click(function () {
                                                    jQuery('#demo_holder').html('<?=$iframe?>');
                                                    jQuery('.demo_mobile_class1').hide();
                                                    jQuery('.demo_mobile_class2').show();
                                                    jQuery('.demo_mobile_class1 .dm_2').toggleClass('active');
                                                    jQuery('.demo_mobile_class2 .dm_2').toggleClass('active');
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
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <div class="di__img">
                    <img id="single_screenshot_game" src="<?php $game->screenshot; ?>" alt="<?=$game->application_name?>" title="<?=$game->application_name?>" class="" />
                    <?php if($game->fun_mode): ?>
                        <div id="demo_holder"></div>
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
    }, 2000); //3 seconds

    // jQuery(".di__img").find('img').each(function(){
    //   if(jQuery(this).is(':visible')){
    //     alert("This image is visible");
    //     }else{
    //       alert("Nope");
    //     }
    // });
    // jQuery(".di__img img").each(function(){
    //   .on('load', function() { 
    //     alert("image loaded correctly");
    //   });
    //   .on('error', function() { 
    //     alert("error loading image"); 
    //     });
    // });


  });
</script>




<div id="sgi" class="group">
  <div id="sgi__wrapper" class="site-main">
    <!-- div class="sgi__logo">   
        <!-- img src="<?php //_e($game->getImage('sq', 250)) ?>" alt="<?//=$game->application_name?>" title="<?//=$game->application_name?>" class="" / -->
    <!-- /div -->
    <div class="sgi__title">
      <h1 class="has-text-align-center"><?=$game->application_name?></h1>
    </div>
    <div class="sgi__btns group">
    
      <p class="has-text-align-center"> 
        <?php if($game->fun_mode): ?>
            <!-- a href="#game-fun-lightbox" class="sgi_btn_trans html5lightbox" onclick="jQuery('.di__img #demo_holder').html(''); jQuery('#game-fun-lightbox').html('<?php _e($iframex)?>');  jQuery('.demo_mobile_class1 .dm_2').removeClass('active'); jQuery('.demo_mobile_class2 .dm_2').removeClass('active'); jQuery('.demo_mobile_class2').hide(); jQuery('.demo_mobile_class1').show(); return false;" ><?php //Helper::ln_e('demo mode'); ?></a --> 
        <?php endif; ?>
            <a href="#" onclick="CU_SON_API.auth_open_registration(); return false;" class="sgi_btn_yellow"><?php Helper::ln_e('play now'); ?></a></p>
    </div>

    <?php if ( $game->biggest_win.$game->biggest_win_currency or $game->paylines or $game->paylines ) :?>
    <div class="sgi__otherinfo group">
      <div class="sgi__oi_inner">

        <?php if ( $game->biggest_win.$game->biggest_win_currency ) :?>
        <div class="sgi__oi_item">
          <div class="sgi__oi_element maxprofit group"> <span class="sgi__oi_s1"><?php Helper::ln_e('max. profi'); ?>t</span> <span class="sgi__oi_s2"><?=$game->biggest_win.$game->biggest_win_currency ?></span></div>
        </div>
        <?php endif; ?>
      

        <?php if ( $game->paylines ) :?>
        <div class="sgi__oi_item">
          <div class="sgi__oi_element paymentlines group"> <span class="sgi__oi_s1"><?php Helper::ln_e('payment'); ?></span> <span class="sgi__oi_s2"><?=$game->paylines?></span></div>
        </div>
        <?php endif; ?>

        <?php if ( $game->paylines ) :?>
        <div class="sgi__oi_item">
          <div class="sgi__oi_element rolls group"> <span class="sgi__oi_s1"><?php Helper::ln_e('rolls'); ?></span> <span class="sgi__oi_s2"><?= $game->preels?></span></div>
        </div>
        <?php endif; ?>

      </div>
    </div>
    <?php endif; ?>


    <div class="sgi__minmax">
      <div class="sgi__mm_content"> <span class="sgi__oi_s1"><?php Helper::ln_e('min / max input'); ?></span> <span class="sgi__oi_s2"><?=$game->min_bet?> – <?=$game->max_bet?></span></div>
    </div>
    <div class="sgi__features group">
      <div class="sgi__features_inner">
        <?php if(in_array('bonus', $slots_features)):?>
            <div class="sgi__features_item">
                <span class="sgi_f_img">
                    <img class=" lazyloaded" src="<?php _e( get_stylesheet_directory_uri() )?>/assets/css/images/bonus-img.png"/>
                </span>
                <span class="sgi_f_label"> <?php Helper::ln_e('bonus'); ?> </span>
            </div>
        <?php endif; ?>

        <?php if(in_array('free_spins', $slots_features)):?>
        <div class="sgi__features_item">
            <span class="sgi_f_img">
                <img class=" lazyloaded" src="<?php _e( get_stylesheet_directory_uri() )?>/assets/css/images/machine-img.png" /> 
            </span> 
            <span class="sgi_f_label"> <?php Helper::ln_e('free spins'); ?> </span>
        </div>
        <?php endif; ?>

        <?php if(in_array('win_multiplier', $slots_features)):?>
        <div class="sgi__features_item"> 
            <span class="sgi_f_img">
                <img class=" lazyloaded" src="<?php _e( get_stylesheet_directory_uri() )?>/assets/css/images/win-img.png" /> 
            </span> 
            <span class="sgi_f_label"> <?php Helper::ln_e('win multiplier'); ?> </span>
        </div>
        <?php endif; ?>

      </div>
    </div>
    <!-- div class="sgi__screenshot group">
        <img src="<?php //$game->getScreenshot(3); ?>" alt="<?php //$game->application_name?>" title="<?php //$game->application_name?>" class="">
    </div -->
  </div>
</div>
