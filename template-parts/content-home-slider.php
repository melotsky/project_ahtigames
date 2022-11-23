<?php
use cumuli\son_api\Helper;

if (!class_exists('HPSlide')) {

  /**
   * @property string $title Slide Title
   * @property string $subTitle Slide Sub Title
   * @property string $buttonLabel Slide Buttpn label
   * @property string $tcLink Terms & Conditions link
   * @property string $tcContent Terms & Conditions content
   * @property string $extraConditionalLabel Button Label for T&C OPEN
   * 
   */
  class HPSlide
  {

    /**
     *
     * @var HpSlider
     */
    public $slider;
    public $countriesRules;
    //boolean
    public $isEnableTc;
    public $isDisableH1Title;
    public $isEnableSubTitle;
    public $isEnableTcLinkOnly;
    
    //titels parts
    //en
    public $titleEn;
    public $subTitleEn;
    public $buttonLabelEn;
    public $tcLinkEn;
    public $tcContentEn;
    public $extraConditionalLabelEn;
    //fi
    public $titleFi;
    public $subTitleFi;
    public $buttonLabelFi;
    public $tcLinkFi;
    public $tcContentFi;
    public $extraConditionalLabelFi;
    //no
    public $titleNo;
    public $subTitleNo;
    public $buttonLabelNo;
    public $tcLinkNo;
    public $tcContentNo;
    public $extraConditionalLabelNo;
    //da
    public $titleDa;
    public $subTitleDa;
    public $buttonLabelDa;
    public $tcLinkDa;
    public $tcContentDa;
    public $extraConditionalLabelDa;
    //sv
    public $titleSv;
    public $subTitleSv;
    public $buttonLabelSv;
    public $tcLinkSv;
    public $tcContentSv;
    public $extraConditionalLabelSV;
    //de
    public $titleDe;
    public $subTitleDe;
    public $buttonLabelDe;
    public $tcLinkDe;
    public $tcContentDe;
    public $extraConditionalLabelDe;
    
    //images
    //desktop
    public $desktopLogo;
    public $desktopImage;
    public $desktopImage2;
    public $desktopImage3;
    public $desktopImage4;
    //mobile
    public $mobileLogo;
    public $mobileImage;
    public $mobileImage2;
    public $mobileImage3;

    public function __construct($slider, $data)
    {
      $this->slider = $slider;
      $this->countriesRules = $data['countries_rules'];

      //bool
      $this->isEnableTc = $data['enable_tc'];
      $this->isDisableH1Title = $data['disable_h1_title'];
      $this->isEnableSubTitle = $data['enable_sub_title'];
      $this->isEnableTcLinkOnly = $data['enable_tc_link_only'];

      //texts
      //en
      $this->titleEn = $data['title_en'];
      $this->subTitleEn = $data['sub_title_en'];
      $this->buttonLabelEn = $data['button_label_en'];
      $this->tcLinkEn = $data['tc_link_en'];
      $this->tcContentEn = $data['tc_content_en'];
      $this->extraConditionalLabelEn = $data['extra_conditional_label_en'];
      //fi
      $this->titleFi = $data['title_fi'];
      $this->subTitleFi = $data['sub_title_fi'];
      $this->buttonLabelFi = $data['button_label_fi'];
      $this->tcLinkFi = $data['tc_link_fi'];
      $this->tcContentFi = $data['tc_content_fi'];
      $this->extraConditionalLabelFi = $data['extra_conditional_label_fi'];
      //no
      $this->titleNo = $data['title_no'];
      $this->subTitleNo = $data['sub_title_no'];
      $this->buttonLabelNo = $data['button_label_no'];
      $this->tcLinkNo = $data['tc_link_no'];
      $this->tcContentNo = $data['tc_content_no'];
      $this->extraConditionalLabelNo = $data['extra_conditional_label_no'];
      //da
      $this->titleDa = $data['title_da'];
      $this->subTitleDa = $data['sub_title_da'];
      $this->buttonLabelDa = $data['button_label_da'];
      $this->tcLinkDa = $data['tc_link_da'];
      $this->tcContentDa = $data['tc_content_da'];
      $this->extraConditionalLabelDa = $data['extra_conditional_label_da'];
      //sv
      $this->titleSv = $data['title_sv'];
      $this->subTitleSv = $data['sub_title_sv'];
      $this->buttonLabelSv = $data['button_label_sv'];
      $this->tcLinkSv = $data['tc_link_sv'];
      $this->tcContentSv = $data['tc_content_sv'];
      $this->extraConditionalLabelSv = $data['extra_conditional_label_sv'];
      //de
      $this->titleDe = $data['title_de'];
      $this->subTitleDe = $data['sub_title_de'];
      $this->buttonLabelDe = $data['button_label_de'];
      $this->tcLinkDe = $data['tc_link_de'];
      $this->tcContentDe = $data['tc_content_de'];
      $this->extraConditionalLabelDe = $data['extra_conditional_label_de'];

      //images
      //desktop
      $this->desktopLogo = $data['desktop_logo'];
      $this->desktopImage = $data['desktop_image_1'];
      $this->desktopImage2 = $data['desktop_image_2'];
      $this->desktopImage3 = $data['desktop_image_3'];
      $this->desktopImage4 = $data['desktop_image_4'];
      //mobile
      $this->mobileLogo = $data['mobile_logo'];
      $this->mobileImage = $data['mobile_image_1'];
      $this->mobileImage2 = $data['mobile_image_2'];
      $this->mobileImage3 = $data['mobile_image_3'];
    }

    public function __get($name)
    {
      switch ($name) {
        case 'title':
        case 'subTitle':
        case 'buttonLabel':
        case 'tcLink':
        case 'tcContent':
        case 'extraConditionalLabel':
          $slug = $this->slider->getLnSlug();
          $var = $name . ucfirst($slug);
          return $this->$var;
      }
    }

    public function render($params=[])
    {
      static $firstSlide;
      $firstSlide = !isset($firstSlide);
      extract($params);

      $nolazyPart = $firstSlide ? ' data-no-lazy' : '';

      $holderClass = '';
      if ($this->desktopImage2)
        $holderClass .= ' desktop_effect';
      if ($this->mobileImage2)
        $holderClass .= ' mobile_effect';
      if ($this->isEnableTc)
        $holderClass .= ' i__adjust';
      ?>
      <div class="group hp__start splide__slide">
        <div class="rel__holder group<?= $holderClass ?>">
          <div class="group hp__sliderhelpertc" style="position: relative">
            <div class="sld_deskn_sup" style="background-image: url(<?= $this->desktopImage ?>)"<?= $nolazyPart ?>>
              <div class="group slide__bg desktop_only" style="background-image: url(<?php //=$bg_image_desktop  ?>)"<?= $nolazyPart ?>></div>
            </div>

        <?php
        if ($this->slider->mediaType == HpSlider::MEDIA_TYPE_DESKTOP):
          // DESKTOP AREA
          //REMEMBER THE DISADVANTAGE OF THIS.. IF U ARE USING BROWSER IN DESKTOP AND SET IT TO MOBILE VIEW... LET SAY YOU MAKE IT
          // A BIGGER WIDTH SIZE.. OF COURSE IT WILL SHOW THE DESKTOP VIEW.. BUT WHEN YOU RESIZE THE BROWSER AND MAKE IT SMALL WIDTH..
          // OFCOURSE IT WILL NOT SHOW THE IMAGES.. YPU NEED TO REFRESH IT....
        ?>
          <?php if ($this->desktopImage2): ?>
            <div class="group desktop_only noanimation ayat" style="background-image: url(<?= $this->desktopImage2 ?>)"<?= $nolazyPart ?>></div>
          <?php endif; ?>

          <?php if ($this->desktopImage3): ?>
            <div class="group slide__bg_additional desktop_only ctrl__this" style="background-image: url(<?= $this->desktopImage3 ?>)"<?= $nolazyPart ?>></div>
          <?php endif; ?>

          <?php if ($this->desktopImage4): ?>
            <div class="group the_100 desktop_only" style="background-image: url(<?= $this->desktopImage4 ?>)"<?= $nolazyPart ?>></div>
          <?php endif; ?>

        <?php
        else:
          // MOBILE AREA
        ?>
          <div class="group slide__bg mobile_only" style="background-image: url(<?= $this->mobileImage ?>)"<?= $nolazyPart ?>></div>

          <?php if ($this->mobileImage3): ?>
            <div class="group mobile_image_3 mobile_only" style="background-image: url(<?= $this->mobileImage3 ?>)"<?= $nolazyPart ?>></div>
          <?php endif; ?>

          <?php if ($this->mobileImage2): ?>
            <div class="group slide__bg_additional mobile_only mobhelper_img2_banner" style="background-image: url(<?= $this->mobileImage2 ?>)"<?= $nolazyPart ?>></div>
          <?php endif; ?>
        <?php
        endif;
        ?>

            <div class="group hp__bgholder" style="width: 100%; ">
              <div class="group hp__contentholder">
                <div class="hp__widthit">
                  <div class="desktop_text_sld">
                    <div class="text_sld_anim1">
                      <?php if ($this->isDisableH1Title) : ?>
                      <h2 class="hp__title">
                        <?= $this->title ?>
                      </h2>
                      <?php else: ?>
                      <h2 class="hp_title">
                        <img src="<?= $this->desktopLogo ?>">
                      </h2>
                      <?php endif; ?>
                      <?php if ($this->isEnableSubTitle): ?>
                        <h3 class="hp__subtitle"><?= $this->subTitle ?></h3>
                      <?php endif; ?>
                    </div>
                    <div class="text_sld_anim2">
                      <p class="hp__btn">
                        <a href="#" onclick="CU_SON_API.auth_open_registration(); return false;">
                          <?= $this->buttonLabel ?>
                        </a>
                      </p>
                    </div>
                  </div>
                  <div class="mobile_text_sld">
                      <?php if ($this->isDisableH1Title) : ?>
                      <h2 class="hp__title">
                        <?= $this->title ?>
                      </h2>
                      <?php else: ?>
                      <h2 class="hp_title">
                        <img src="<?= $this->mobileLogo ?>" />
                      </h2>
                      <?php endif; ?>
                    <?php if ($this->isEnableSubTitle) : ?>
                      <h3 class="hp__subtitle"><?= $this->subTitle ?></h3>
                    <?php endif; ?>
                    <p class="hp__btn">
                      <a href="#" onclick="CU_SON_API.auth_open_registration(); return false;">
                      <?= $this->buttonLabel ?>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </div> <!-- END GAME --->

          <!-- T&C LINK START -->
        <?php if ($this->isEnableTcLinkOnly): ?>
          <div class="group tc__enabled" style="position: relative;" id="tarj__helper_tc">
            <div id="strpe" class="group" style="position: relative">
              <div class="group popout__helper" style="display: block !important">
                <?=$this->tcLink?>
              </div>
            </div>
          </div>
        <?php else: ?>
          <div class="group fihelper__fitc" style="position: relative; display: none !important" id="tarj__helper_tc">
            <div id="strpe" class="group" style="position: relative">
              <div class="group popout__helper ttt" style="display: block !important">
              </div>
            </div>
          </div>
        <?php endif; ?>
          <!-- T&C LINK END -->

          <!-- T&C START -->
        <?php if ($this->isEnableTc): ?>
            <div class="group orig__tc" style="position: relative;" id="tarj__helper_tc">
              <div id="strpe" class="group" style="position: relative">
                <div class="group popout__helper">
                    
                  <p>
                    <a id="l__noticex" href="#" onclick="return false;" class="">
                        <?=$this->extraConditionalLabel?>
                    </a>
                  </p>
                </div>
                <div id="topview" class="group topview__helper" >
                  <div class="tv__cont group">
                    <div id="readmore__this" class="group">
                    <?php if (in_array($this->slider->getLnSlug(), ['en','da'])): ?>
                      <div class="scroll_flower group">
                        <div class="sf__table group">
                          <div class="sf__tablecell group">
                    <?php endif;?>
                            <?=$this->tcContent?>
                    <?php if (in_array($this->slider->getLnSlug(), ['en','da'])): ?>
                            </div>
                          </div>
                        </div>
                    <?php endif;?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      <?php endif ?>
          <!-- T&C END -->

        </div>
      </div>
      <?php
    }

  }

  class HpSlider
  {

    const MEDIA_TYPE_DESKTOP = 1;
    const MEDIA_TYPE_MOBILE = 2;
    const MEDIA_TYPE_TABLET = 3;

    public $mediaType;

    /**
     *
     * @var HPSlide[]
     */
    public $slides = [];

    public function __construct()
    {
      $detect = new Mobile_Detect();
      if ($detect->isMobile()) {
        $this->mediaType = self::MEDIA_TYPE_MOBILE;
      } elseif ($detect->isTablet()) {
        $this->mediaType = self::MEDIA_TYPE_TABLET;
      } else {
        $this->mediaType = self::MEDIA_TYPE_DESKTOP;
      }
      $bFields = [
          'enable_tc',
          'disable_h1_title',
          'enable_sub_title',
          'enable_tc_link_only',
      ];
      $tFields = [
          'countries_rules',
          //texts
          'title_en', 'sub_title_en', 'button_label_en',
          'title_fi', 'sub_title_fi', 'button_label_fi',
          'title_no', 'sub_title_no', 'button_label_no',
          'title_da', 'sub_title_da', 'button_label_da',
          'title_sv', 'sub_title_sv', 'button_label_sv',
          'title_de', 'sub_title_de', 'button_label_de',
          'tc_link_en','tc_link_fi','tc_link_no','tc_link_da','tc_link_sv','tc_link_de',
          'tc_content_en','tc_content_fi','tc_content_no','tc_content_da','tc_content_sv','tc_content_de',
          'extra_conditional_label_fi', 'extra_conditional_label_no', 'extra_conditional_label_de', 'extra_conditional_label_da',
          'extra_conditional_label_en'
      ];
      $iFields = [
          'full' => ['desktop_image_1', 'desktop_image_2', 'desktop_image_3', 'desktop_image_4',],
          'slider-mobile' => ['mobile_image_1', 'mobile_image_2', 'mobile_image_3',],
          'logo_slider_main' => ['logo_image_slidermain' => 'desktop_logo'],
          'logo_slider_main_mob' => ['logo_image_slidermain' => 'mobile_logo'],
      ];
      while (the_repeater_field('slider_fields', 'option')) {
        $d = [];
        //texts
        foreach ($bFields as $k => $f) {
          $d[$f] = get_sub_field(is_string($k) ? $k : $f, 'option') == '1';
        }
        foreach ($tFields as $k => $f) {
          $d[$f] = get_sub_field(is_string($k) ? $k : $f, 'option');
        }
        //images
        foreach ($iFields as $s => $fields) {
          foreach ($fields as $k => $f) {
            $field = get_sub_field(is_string($k) ? $k : $f, 'option');
            $img = empty($field) ? false : wp_get_attachment_image_src($field, $s);
            $d[$f] = is_array($img) ? $img[0] : false;
          }
        }

        //add slide
        $this->slides[] = new HPSlide($this, $d);
      }
    }

    /**
     * @staticvar string $lnSlug 2 chars lang
     * @return string return ln_slug en|fi|no|da|sv|de
     */
    public function getLnSlug()
    {
      static $lnSlug;
      if (is_null($lnSlug)) {
        $lnSlug = Helper::getSlugLang();
      }
      return $lnSlug;
    }

    /**
     * 
     * @staticvar string $cc Country Code
     * @param HPSlide $slide slider for witch
     * @return boolean
     */
    public function slideShouldShow($slide)
    {
      static $cc;

      //detect country code and language slug
      if (is_null($cc)) {
        $lnSlug = $this->getLnSlug();
        $cc = strtolower(Helper::getCountryCode());
      }

      //parse rule
      $restrictions = [];
      foreach (explode(';', $slide->countriesRules) as $tmp) {
        $c = '';
        foreach (explode('_', $tmp) as $part) {
          if ($c === '') {
            $c = strtolower($part);
            if (!isset($restrictions[$c]))
              $restrictions[$c] = [];
          } else {
            $restrictions[$c][] = strtolower($part);
          }
        }
      }

      //certain restrict
      if (isset($restrictions['!' . $cc])) {
        $r = $restrictions['!' . $cc];
        if (empty($r)) {
          return false;
        }
        if (in_array('!' . $lnSlug, $r)) {
          return true;
        }
        if (in_array($lnSlug, $r)) {
          return false;
        }
      }
      //certain allow
      if (isset($restrictions[$cc])) {
        $r = $restrictions[$cc];
        if (empty($r)) {
          return true;
        }
        if (in_array('!' . $lnSlug, $r)) {
          return false;
        }
        if (in_array($lnSlug, $r)) {
          return true;
        }
      }
      //all restrict
      if (isset($restrictions['!all'])) {
        $r = $restrictions['!all'];
        if (empty($r)) {
          return false;
        }
        if (in_array('!' . $lnSlug, $r)) {
          return true;
        }
        if (in_array($lnSlug, $r)) {
          return false;
        }
      }
      //certain allow
      if (isset($restrictions['all'])) {
        $r = $restrictions['all'];
        if (empty($r)) {
          return true;
        }
        if (in_array('!' . $lnSlug, $r)) {
          return false;
        }
        if (in_array($lnSlug, $r)) {
          return true;
        }
      }

      //default behavior slide is allowed
      return true;
    }

    public function render()
    {
      switch ($this->mediaType) {
        case self::MEDIA_TYPE_DESKTOP:
          $height = "320px";
          $class = "mob__view";
          break;
        default;
          $height = "500px";
          $class = "desk__view";
      }
      ?>
      <div class="slider__helper" style="height: 354px; overflow: hidden">
        <div id="home_slider" class="group home_slider mob__view" style="overflow: hidden;">
          <div id="hp__wrapper" class="group hp__wrapper" style="width: 100%;">
            <div class="splide__track">
              <div class="splide__list">
                <?php
                foreach ($this->slides as $s) {
                  if(!$this->slideShouldShow($s))
                    continue;
                  $s->render();
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
    }

    public function renderScript()
    {
      ?>
      <script type="text/javascript">
        jQuery(document).ready(function ($) {
          jQuery('#home_slider').on('click', '.popout__helper > p > a', function (e) {
            var $this = jQuery(this);
            if ($this.attr('href') == '#') {
              jQuery('#topview', $this.closest('.orig__tc')).toggleClass("showthis");
            }
          });
        });
      </script>
      <?php
    }

  }

}

//print it only @front page
if (is_front_page()) {
  $slider = new HpSlider();
  $slider->render();
  $slider->renderScript();
}

