<?php 
if ( !defined('ABSPATH')) exit;

/************************************/
// WIDGET DECLARATION / START
/************************************/
add_action( 'after_setup_theme', 'remove_default_sidebars', 11 );
function remove_default_sidebars(){
    remove_action( 'widgets_init', 'kickass_widgets_init' );
}
if (function_exists('register_sidebar')) {
	
    register_sidebar(array(
    	'name' => 'Sidebar',
    	'id'   => 'sb',
    	'description'   => 'Sidebar',
    	'before_widget' => '<div class="blogi_sb">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h3 style="display: none">',
    	'after_title'   => '</h3>'
    ));
	
	
	register_sidebar(array(

    	'name' => 'Footer - 1st Position Widget',
    	'id'   => 'frm',
    	'description'   => 'Footer - 1st Position',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-wrap group">',
    	'after_widget'  => '</div></aside>',
    	'before_title'  => '<h3 class="widget-title">',
    	'after_title'   => '</h3>'

    ));

	register_sidebar(array(

    	'name' => 'Footer - 2nd Position Widget',
    	'id'   => 'frm2',
    	'description'   => 'Footer - 2nd Position',
     	'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-wrap group">',
     	'after_widget'  => '</div></aside>',
    	'before_title'  => '<h3 class="widget-title" style="display: none;">',
    	'after_title'   => '</h3>'

    ));

	register_sidebar(array(

    	'name' => 'Footer - 3rd Position Widget',
    	'id'   => 'frm3',
    	'description'   => 'Footer - 3rd Position',
    	'before_widget' => '',
    	'after_widget'  => '',
    	'before_title'  => '<h3 class="widget-title" style="display: none;">',
    	'after_title'   => '</h3>'

    ));        

	register_sidebar(array(

    	'name' => 'Slidebar 1',
    	'id'   => 'slb',
    	'description'   => 'Slidebar 1',
    	'before_widget' => '',
    	'after_widget'  => '',
    	'before_title'  => '<h3 class="widget-title" style="display: none;">',
    	'after_title'   => '</h3>'

    ));

	register_sidebar(array(

    	'name' => 'Slidebar 2',
    	'id'   => 'slb2',
    	'description'   => 'Slidebar 2',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-wrap group">',
    	'after_widget'  => '</div></aside>',
    	'before_title'  => '<h3 class="widget-title">',
    	'after_title'   => '</h3>'

    ));

    register_sidebar(array(

    	'name' => 'Legal Notice Position 1',
    	'id'   => 'lnp1',
    	'description'   => 'Legal Notice Position 1',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-wrap group">',
    	'after_widget'  => '</div></aside>',
    	'before_title'  => '<h3 class="widget-title" style="display: none !important">',
    	'after_title'   => '</h3>'

    ));    

    register_sidebar(array(

    	'name' => 'Legal Notice Position 2',
    	'id'   => 'lnp2',
    	'description'   => 'Legal Notice Position 2',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-wrap group">',
    	'after_widget'  => '</div></aside>',
    	'before_title'  => '<h3 class="widget-title" style="display: none !important">',
    	'after_title'   => '</h3>'

    ));        

}
/************************************/
// WIDGET DECLARATION / END
/************************************/


//CREATE YOUR WIDGETS!!!
/******************************************/
// WIDGETS
/******************************************/


/*ContactInformationHeaderPosition WIDGET START*/

if(!class_exists('ContactInformationHeaderPosition')) {

  class ContactInformationHeaderPosition extends WP_Widget {

    public function __construct() {
      $widget_ops = array(
        'classname' => 'contact_information_header_position_only_widget',
        'description' => 'Contact Information - Header Position',
      );
      parent::__construct( 'ContactInformationHeaderPosition_widget', 'Contact Information - Header Position', $widget_ops );
    }

    /**
    * Outputs the content of the widget
    *
    * @param array $args
    * @param array $instance
    */
	public function widget( $args, $instance ) {
      // outputs the content of the widget
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

	  // widget ID with prefix for use in ACF API functions
	  $widget_id = 'widget_' . $args['widget_id'];
	  
	  
	  $intro_text = get_field('intro_text', $widget_id);
	  
	  ?>

        


      <?php
            

    }


    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
    	// outputs the options form on admin
    }


    public function update( $new_instance, $old_instance ) {
    	// processes widget options to be saved
    }

  }

}

/**
 * Register THE WIDGET
 */
function register_ContactInformationHeaderPosition()
{
  register_widget( 'ContactInformationHeaderPosition' );
}
add_action( 'widgets_init', 'register_ContactInformationHeaderPosition' );

/*ContactInformationHeaderPosition WIDGET START*/





/*ReadMoreFooterPosition WIDGET START*/

if(!class_exists('ReadMoreFooterPosition')) {

	class ReadMoreFooterPosition extends WP_Widget {
  
	  public function __construct() {
		$widget_ops = array(
		  'classname' => 'read_more_footer_widget',
		  'description' => 'Read More - Footer Position',
		);
		parent::__construct( 'ReadMoreFooterPosition_widget', 'Read More - Footer Position', $widget_ops );
	  }
  
	  /**
	  * Outputs the content of the widget
	  *
	  * @param array $args
	  * @param array $instance
	  */
	  public function widget( $args, $instance ) {
		// outputs the content of the widget
		  if ( ! isset( $args['widget_id'] ) ) {
			  $args['widget_id'] = $this->id;
		  }
  
		// widget ID with prefix for use in ACF API functions
		$widget_id = 'widget_' . $args['widget_id'];
		
		
		//$intro_text = get_field('intro_text', $widget_id);
		
		?>
  
		<div id="read_more__inner" class="group read_more__inner">
			<h3><?php the_field('title_rm', $widget_id) ?></h3>
		  	<div id="read_more_para" class="group">
				  <p>
					<?= do_shortcode(get_field('default_text_rm', $widget_id)) ?>
					<span id="dots">...</span>
					<span id="more" style="display: none"><br><br><?= do_shortcode(get_field('hidden_text_rm', $widget_id)) ?></span>
				  </p>
				  <div class="clickmore">
					  <span onClick="readmore()" id="myBtn"><?php the_field('button_label', $widget_id)?></span>
				  </div>
			</div>
		</div>

		<script type="text/javascript">
			function readmore() {
				var dots = document.getElementById("dots");
				var moreText = document.getElementById("more");
				var btnText = document.getElementById("myBtn");
				//var thePara = document.getElementById("read_more_para");
			
				if (dots.style.display === "none") {
				dots.style.display = "inline";
				btnText.innerHTML = "Read more"; 
				moreText.style.display = "none";
				} else {
				dots.style.display = "none";
				//thePara.className("test");
				jQuery("#read_more_para").addClass("whiteit");
				btnText.remove();
				//btnText.innerHTML = "Read less"; 
				moreText.style.display = "inline";
				//moreText.slideDown();
				}
			}
		</script>
  
		<?php
			  
  
	  }
  
  
	  /**
	   * Outputs the options form on admin
	   *
	   * @param array $instance The widget options
	   */
	  public function form( $instance ) {
		  // outputs the options form on admin
	  }
  
  
	  public function update( $new_instance, $old_instance ) {
		  // processes widget options to be saved
	  }
  
	}
  
  }
/**
 * Register THE WIDGET
 */
function register_ReadMoreFooterPosition()
{
  register_widget( 'ReadMoreFooterPosition' );
}
add_action( 'widgets_init', 'register_ReadMoreFooterPosition' );



/*LogoFooterPosition WIDGET START*/

if(!class_exists('LogoFooterPosition')) {

	class LogoFooterPosition extends WP_Widget {
  
	  public function __construct() {
		$widget_ops = array(
		  'classname' => 'logo_footer_position_widget',
		  'description' => 'Logo Footer - Footer Position',
		);
		parent::__construct( 'LogoFooterPosition_widget', 'Logo Footer - Footer Position', $widget_ops );
	  }
  
	  /**
	  * Outputs the content of the widget
	  *
	  * @param array $args
	  * @param array $instance
	  */
	  public function widget( $args, $instance ) {
		// outputs the content of the widget
		  if ( ! isset( $args['widget_id'] ) ) {
			  $args['widget_id'] = $this->id;
		  }
  
		// widget ID with prefix for use in ACF API functions
		$widget_id = 'widget_' . $args['widget_id'];
		
		
		//$intro_text = get_field('intro_text', $widget_id);
		
		?>

		<div id="footer_logo" class="group">
			<div class="footer_table group">
				<div class="footer_tablecell group">
					<?php while(the_repeater_field('footer_logo', $widget_id)) { 
					$image = wp_get_attachment_image_src(get_sub_field('logo_img', $widget_id), 'full');	
					$titleText = get_post( get_sub_field('get_sub_field', $widget_id) ); // Get IMG by ID
					$altText = get_post_meta( get_sub_field('get_sub_field', $widget_id), '_wp_attachment_image_alt', true ); // Get IMG by ID
					?>
						<img src="<?php _e($image[0])?>">
					<?php } ?>
				</div>
			</div>
		</div>
  
  
  
		<?php
			  
  
	  }
  
  
	  /**
	   * Outputs the options form on admin
	   *
	   * @param array $instance The widget options
	   */
	  public function form( $instance ) {
		  // outputs the options form on admin
	  }
  
  
	  public function update( $new_instance, $old_instance ) {
		  // processes widget options to be saved
	  }
  
	}
  
  }
  
  /**
   * Register THE WIDGET
   */
  function register_LogoFooterPosition()
  {
	register_widget( 'LogoFooterPosition' );
  }
  add_action( 'widgets_init', 'register_LogoFooterPosition' );
  
  /*LogoFooterPosition WIDGET START*/


  /*PopupVideo WIDGET START*/

if(!class_exists('PopupVideo')) {

	class PopupVideo extends WP_Widget {
  
	  public function __construct() {
		$widget_ops = array(
		  'classname' => 'video_popup_widget',
		  'description' => 'Popup Video',
		);
		parent::__construct( 'PopupVideo_widget', 'Popup Video Widget', $widget_ops );
	  }
  
	  /**
	  * Outputs the content of the widget
	  *
	  * @param array $args
	  * @param array $instance
	  */
	  public function widget( $args, $instance ) {
		// outputs the content of the widget
		  if ( ! isset( $args['widget_id'] ) ) {
			  $args['widget_id'] = $this->id;
		  }
  
		// widget ID with prefix for use in ACF API functions
		$widget_id = 'widget_' . $args['widget_id'];
		
		
		$intro_text = get_field('intro_text', $widget_id);
		$video_url = get_field('video_url', $widget_id);
		$image = wp_get_attachment_image_src(get_field('image_thumb', $widget_id), 'v_thumb');
		$image = $image[0];
		?>

		  <div class="group vp__wrapper">
		  <a class="vp-a" href="<?php _e($video_url) ?>" >
		  	<div class="vp_img">
					<img src="<?php _e($image)?>" class="vthumb" />
			</div>
			<div class="vthumb_btn">
				<div class="vthumb_btn_table">
					<div class="vthumb_btn_table_cell">
							<img src="<?php _e( get_template_directory_uri() ) ?>/assets/css/images/play-btn.png" class="playbtnx" />
					</div>
				</div>
			</div>
		  </a>
		  </div>
  
		<?php
			  
  
	  }
  
  
	  /**
	   * Outputs the options form on admin
	   *
	   * @param array $instance The widget options
	   */
	  public function form( $instance ) {
		  // outputs the options form on admin
	  }
  
  
	  public function update( $new_instance, $old_instance ) {
		  // processes widget options to be saved
	  }
  
	}
  
  }
  
  /**
   * Register THE WIDGET
   */
  function register_PopupVideo()
  {
	register_widget( 'PopupVideo' );
  }
  add_action( 'widgets_init', 'register_PopupVideo' );
  
  /*PopupVideo WIDGET START*/  







/*PaymentsLogoFooterPosition WIDGET START*/

if(!class_exists('PaymentsLogoFooterPosition')) {

    class PaymentsLogoFooterPosition extends WP_Widget {
  
      public function __construct() {
        $widget_ops = array(
          'classname' => 'payments_logo_footer_position',
          'description' => 'Payments Logo - Footer Position',
        );
        parent::__construct( 'PaymentsLogoFooterPosition_widget', 'Payments Logo - Footer Position', $widget_ops );
      }
  
      /**
      * Outputs the content of the widget
      *
      * @param array $args
      * @param array $instance
      */
      public function widget( $args, $instance ) {
        // outputs the content of the widget
          if ( ! isset( $args['widget_id'] ) ) {
              $args['widget_id'] = $this->id;
          }
  
        // widget ID with prefix for use in ACF API functions
        $widget_id = 'widget_' . $args['widget_id'];
        
        
        $intro_text = get_field('intro_text', $widget_id);
        
        ?>
  
          <!-- <div id="pl__footer" class="group">
              <div class="pl__footer">
                <?php //while(the_repeater_field('payments_logo_rep', $widget_id)) { ?>
                    <div class="pl__inliner">
                        <div class="pl__table">
                            <div class="pl__tablecell" -->
                                <!-- a href="<?php //the_sub_field('url', $widget_id)?>" -->
                                    <?php //$image = wp_get_attachment_image_src(get_sub_field('logo_pl', $widget_id), 'full'); ?>
                                        <!-- img src="<?php //_e($image[0])?>" / -->
                                <!-- /a -->
                            <!-- </div>
                        </div>
                    </div>
                <?php // } ?>
              </div>
          </div> -->

          <div id="son__payments">
            <son-payments size="tiny"></son-payments>
          </div>
  
  
        <?php
              
  
      }
  
  
      /**
       * Outputs the options form on admin
       *
       * @param array $instance The widget options
       */
      public function form( $instance ) {
          // outputs the options form on admin
      }
  
  
      public function update( $new_instance, $old_instance ) {
          // processes widget options to be saved
      }
  
    }
  
  }
  
  /**
   * Register THE WIDGET
   */
  function register_PaymentsLogoFooterPosition()
  {
    register_widget( 'PaymentsLogoFooterPosition' );
  }
  add_action( 'widgets_init', 'register_PaymentsLogoFooterPosition' );
  
  /*PaymentsLogoFooterPosition WIDGET START*/




/*ProvidersLogoFooterPosition WIDGET START*/

if(!class_exists('ProvidersLogoFooterPosition')) {

    class ProvidersLogoFooterPosition extends WP_Widget {
  
      public function __construct() {
        $widget_ops = array(
          'classname' => 'providers_logo_footer_position',
          'description' => 'Providers Logo - Footer Position',
        );
        parent::__construct( 'ProvidersLogoFooterPosition_widget', 'Providers Logo - Footer Position', $widget_ops );
      }
  
      /**
      * Outputs the content of the widget
      *
      * @param array $args
      * @param array $instance
      */
      public function widget( $args, $instance ) {
        // outputs the content of the widget
          if ( ! isset( $args['widget_id'] ) ) {
              $args['widget_id'] = $this->id;
          }
  
        // widget ID with prefix for use in ACF API functions
        $widget_id = 'widget_' . $args['widget_id'];
        
        
        $intro_text = get_field('intro_text', $widget_id);
        $thelocale = get_locale();
        ?>
  
        <div id="pro__footer" class="group">
            <div class="pro__footer">
                <?php while(the_repeater_field('providers_logo_rep', $widget_id)) { ?>
                    <div class="pl__inliner">
                        <div class="pl__table">
                            <div class="pl__tablecell">
                                    <?php if($thelocale == "fi") : ?>
                                        <a href="<?php the_sub_field('target_page', $widget_id)?>">
                                    <?php endif; ?>
                                    <?php $image = wp_get_attachment_image_src(get_sub_field('logo_pl', $widget_id), 'full'); ?>
                                        <img src="<?php _e($image[0])?>" />
                                    <?php if($thelocale == "fi") : ?>
                                        </a>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>  
  
  
        <?php
              
  
      }
  
  
      /**
       * Outputs the options form on admin
       *
       * @param array $instance The widget options
       */
      public function form( $instance ) {
          // outputs the options form on admin
      }
  
  
      public function update( $new_instance, $old_instance ) {
          // processes widget options to be saved
      }
  
    }
  
  }
  
  /**
   * Register THE WIDGET
   */
  function register_ProvidersLogoFooterPosition()
  {
    register_widget( 'ProvidersLogoFooterPosition' );
  }
  add_action( 'widgets_init', 'register_ProvidersLogoFooterPosition' );
  
  /*ProvidersLogoFooterPosition WIDGET START*/






/*LicenseLogoFooterPosition WIDGET START*/

if(!class_exists('LicenseLogoFooterPosition')) {

    class LicenseLogoFooterPosition extends WP_Widget {
  
      public function __construct() {
        $widget_ops = array(
          'classname' => 'license_logo_footer_position',
          'description' => 'License Logo - Footer Position',
        );
        parent::__construct( 'LicenseLogoFooterPosition_widget', 'License Logo - Footer Position', $widget_ops );
      }
  
      /**
      * Outputs the content of the widget
      *
      * @param array $args
      * @param array $instance
      */
      public function widget( $args, $instance ) {
        // outputs the content of the widget
          if ( ! isset( $args['widget_id'] ) ) {
              $args['widget_id'] = $this->id;
          }
  
        // widget ID with prefix for use in ACF API functions
        $widget_id = 'widget_' . $args['widget_id'];
        
        
        $intro_text = get_field('intro_text', $widget_id);
        //echo do_shortcode( '[cu_son_api_widget widgetclass=LicenseFooterLogo]' );
        ?>
        <div id="licx__logo_footer">
            <son-license-logos image="light"></son-license-logos>
        </div>
        <?php
      }
  
  
      /**
       * Outputs the options form on admin
       *
       * @param array $instance The widget options
       */
      public function form( $instance ) {
          // outputs the options form on admin
      }
  
  
      public function update( $new_instance, $old_instance ) {
          // processes widget options to be saved
      }
  
    }
  
  }
  
  /**
   * Register THE WIDGET
   */
  function register_LicenseLogoFooterPosition()
  {
    register_widget( 'LicenseLogoFooterPosition' );
  }
  add_action( 'widgets_init', 'register_LicenseLogoFooterPosition' );
  
  /*LicenseLogoFooterPosition WIDGET START*/  




/*LicenseTextFooterPosition WIDGET START*/

if(!class_exists('LicenseTextFooterPosition')) {

    class LicenseTextFooterPosition extends WP_Widget {
  
      public function __construct() {
        $widget_ops = array(
          'classname' => 'license_Text_footer_position',
          'description' => 'License Text - Footer Position',
        );
        parent::__construct( 'LicenseTextFooterPosition_widget', 'License Text - Footer Position', $widget_ops );
      }
  
      /**
      * Outputs the content of the widget
      *
      * @param array $args
      * @param array $instance
      */
      public function widget( $args, $instance ) {
        // outputs the content of the widget
          if ( ! isset( $args['widget_id'] ) ) {
              $args['widget_id'] = $this->id;
          }
  
        // widget ID with prefix for use in ACF API functions
        $widget_id = 'widget_' . $args['widget_id'];
        
        
        $intro_text = get_field('intro_text', $widget_id);
        
        ?>

        <div class="lic_footer__wrapper group">
            <son-license-text></son-license-text>
            <?php //echo do_shortcode('[cu_son_api_widget widgetclass=LicenseFooter]'); ?>
        </div>
          
  
  
        <?php
              
  
      }
  
  
      /**
       * Outputs the options form on admin
       *
       * @param array $instance The widget options
       */
      public function form( $instance ) {
          // outputs the options form on admin
      }
  
  
      public function update( $new_instance, $old_instance ) {
          // processes widget options to be saved
      }
  
    }
  
  }
  
  /**
   * Register THE WIDGET
   */
  function register_LicenseTextFooterPosition()
  {
    register_widget( 'LicenseTextFooterPosition' );
  }
  add_action( 'widgets_init', 'register_LicenseTextFooterPosition' );
  
  /*LicenseTextFooterPosition WIDGET START*/  





  /*SlideBarNavigation WIDGET START*/

if(!class_exists('SlideBarNavigation')) {

    class SlideBarNavigation extends WP_Widget {
  
      public function __construct() {
        $widget_ops = array(
          'classname' => 'slide_bar_navigation_widget',
          'description' => 'Slidebar Navigation',
        );
        parent::__construct( 'SlideBarNavigation_widget', 'Slidebar Navigation', $widget_ops );
      }
  
      /**
      * Outputs the content of the widget
      *
      * @param array $args
      * @param array $instance
      */
      public function widget( $args, $instance ) {
        // outputs the content of the widget
          if ( ! isset( $args['widget_id'] ) ) {
              $args['widget_id'] = $this->id;
          }
  
        // widget ID with prefix for use in ACF API functions
        $widget_id = 'widget_' . $args['widget_id'];
        
        $intro_text = get_field('intro_text', $widget_id); ?>
        <div id="pelit_games__res" class="group">
            <ul id="pgr__ul">
            <?php while(the_repeater_field('slidebar_navigation', $widget_id)) { 
            $img_icon = wp_get_attachment_image_src(get_sub_field('image_transparent_icon_tv', $widget_id), 'full');    
            ?>
            <li>
                <a href="<?php the_sub_field('target_page_tv', $widget_id)?>">
                    <div class="tbl">
                        <div class="tblcell">
                            <img src="<?php _e($img_icon[0]) ?>" /> 
                            <span><?php the_sub_field('label_tv', $widget_id)?></span>
                            <?php if ( get_sub_field('enable_jackpot_price', $widget_id) ): ?>
                                <span class="jackpot_sb_1"><span id="jackpot_sb_2" class="jackpot_sb_2"><son-jackpot type="jackpot"></son-jackpot></span></span>
                            <?php endif; ?>
                            <?php if ( get_sub_field('enable_daily_jackpot_price', $widget_id) ): ?>
                                <span class="dailyjackpot_sb_1"><span class="dailyjackpot_sb_2"><son-jackpot type="daily"></son-jackpot></span></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </li>
            <?php } ?>
            </ul>
        </div>
      <?php }
  
  
      /**
       * Outputs the options form on admin
       *
       * @param array $instance The widget options
       */
      public function form( $instance ) {
          // outputs the options form on admin
      }
  
  
      public function update( $new_instance, $old_instance ) {
          // processes widget options to be saved
      }
  
    }
  
  }
  
  /**
   * Register THE WIDGET
   */
  function register_SlideBarNavigation()
  {
    register_widget( 'SlideBarNavigation' );
  }
  add_action( 'widgets_init', 'register_SlideBarNavigation' );
  
  /*SlideBarNavigation WIDGET START*/









/*LegalNoticePosition1 WIDGET START*/

if(!class_exists('LegalNoticePosition1')) {

    class LegalNoticePosition1 extends WP_Widget {
  
      public function __construct() {
        $widget_ops = array(
          'classname' => 'legal_notice_position_1',
          'description' => 'Legal Notice - Position 1',
        );
        parent::__construct( 'LegalNoticePosition1_widget', 'Legal Notice - Position 1', $widget_ops );
      }
  
      /**
      * Outputs the content of the widget
      *
      * @param array $args
      * @param array $instance
      */
      public function widget( $args, $instance ) {
        // outputs the content of the widget
          if ( ! isset( $args['widget_id'] ) ) {
              $args['widget_id'] = $this->id;
          }
  
        // widget ID with prefix for use in ACF API functions
        $widget_id = 'widget_' . $args['widget_id'];
        
        
        $intro_text = get_field('intro_text', $widget_id);

        ?>
            <?php 
              if(get_field('link_ln1', $widget_id) ) : 
                //$cookie_name = "theAhti_" . get_locale();
                //$cookie_value = "visitor";
                //$value = "theTimerCookie";
                //$timercookie = "timercookie_" . get_locale();

                // if( !isset($_COOKIE[$cookie_name]) ) {
                //     setcookie( $timercookie, "theTimerCookie", time() + 1800);
                //     setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day   
                // }
                // if(isset($_COOKIE[$cookie_name])) {
                //     if(isset($_COOKIE[$timercookie])) {
            ?>
            <!-- <son-beam responsible-link="<slug_link>" bonus-policy-link="<slug_link>"></son-beam>
            <son-beam responsible-link="https://domain.com/my-responsible-gaming-page" bonus-policy-link="https://domain.com/my-bonus-policy-page"></son-beam> -->
                        <div id="strpe" class="group xxx" style="position: relative">
                        <div class="group ln1_top">
                            <div class="ln1_inner site-main group">
                                <?php the_field('link_ln1', $widget_id) ?>
                            </div>
                        </div>
                        </div>
                        <script>
                        jQuery(document).ready(function($){
//                            setTimeout( function(){
                            //     jQuery("#mainHeaderHolder > .ln1_top").remove();
//                              jQuery('.ln1_top').show();
//                              jQuery('.ln1__height').removeClass('ln1__height');
//                            }, 1000);
                            //jQuery('.ln1_top').show();
                        });

                        // jQuery(document).ready(function($){
                        //     setTimeout( function(){
                        //         jQuery(".ln2_top").remove();
                        //         //jQyery("a.cc_btn_accept_all").click();
                        //     }, 100000);

                        //     jQuery("#l__notice").click( function(){
                        //         jQuery("#topview").toggleClass("showthis");
                        //     });
                        // });                        
                        </script>
            <?php 
            //         }
            //     }
             endif; ?>
  
        <?php
              
  
      }
  
  
      /**
       * Outputs the options form on admin
       *
       * @param array $instance The widget options
       */
      public function form( $instance ) {
          // outputs the options form on admin
      }
  
  
      public function update( $new_instance, $old_instance ) {
          // processes widget options to be saved
      }
  
    }
  
  }
  
  /**
   * Register THE WIDGET
   */
  function register_LegalNoticePosition1()
  {
    register_widget( 'LegalNoticePosition1' );
  }
  add_action( 'widgets_init', 'register_LegalNoticePosition1' );
  
/*LegalNoticePosition1 WIDGET START*/  






/*LegalNoticePosition2 WIDGET START*/

if(!class_exists('LegalNoticePosition2')) {

    class LegalNoticePosition2 extends WP_Widget {
  
      public function __construct() {
        $widget_ops = array(
          'classname' => 'legal_notice_position_2',
          'description' => 'Legal Notice - Position 2',
        );
        parent::__construct( 'LegalNoticePosition2_widget', 'Legal Notice - Position 2', $widget_ops );
      }
  
      /**
      * Outputs the content of the widget
      *
      * @param array $args
      * @param array $instance
      */
      public function widget( $args, $instance ) {
        // outputs the content of the widget
          if ( ! isset( $args['widget_id'] ) ) {
              $args['widget_id'] = $this->id;
          }
  
        // widget ID with prefix for use in ACF API functions
        $widget_id = 'widget_' . $args['widget_id'];
        
        
        $intro_text = get_field('intro_text', $widget_id);

        ?>
                        <div id="strpe" class="group" style="position: relative">

                        <?php if(get_field('button_label_ll2', $widget_id)) :?>
                        <div class="group popout__helper">
                            <p><a id="l__noticex" href="#" onclick="return false;"><?php the_field('button_label_ll2', $widget_id)?></a></p>
                        </div>
                        <?php endif;?>
                        <div id="topview" class="group" style="display: none">
                          <div class="tv__cont group">
                              <div id="readmore__this" class="group">
                                <?php the_field('link_ln2', $widget_id)?>
                              </div>            
                          </div>
                          <?php $the_local = get_locale();?>
                          <?php if( $the_local == "da_DK" or $the_local == "en_GB" ) :?>
                              <img id="closetc" src="<?php echo get_stylesheet_directory_uri()?>/assets/css/images/close-this.png" height="24" width="24" />
                          <?php endif; ?>
                        </div>
                        </div>
                        <script>
                        jQuery(document).ready(function($){
                        });

                        jQuery(document).ready(function($){
                            setTimeout( function(){
                                jQuery(".ln2_top").remove();
                                //jQyery("a.cc_btn_accept_all").click();
                            }, 100000);

                            jQuery("#l__noticex").click( function(){
                                jQuery("#topview").toggleClass("showthis");
                            });

                            jQuery("#closetc").click( function(){
                              jQuery("#topview").toggleClass("hidethis__now");
                            })
                        });                        
                        </script>

  
        <?php
              
  
      }
  
  
      /**
       * Outputs the options form on admin
       *
       * @param array $instance The widget options
       */
      public function form( $instance ) {
          // outputs the options form on admin
      }
  
  
      public function update( $new_instance, $old_instance ) {
          // processes widget options to be saved
      }
  
    }
  
  }
  
  /**
   * Register THE WIDGET
   */
  function register_LegalNoticePosition2()
  {
    register_widget( 'LegalNoticePosition2' );
  }
  add_action( 'widgets_init', 'register_LegalNoticePosition2' );
  
/*LegalNoticePosition2 WIDGET START*/  



/************************************/
// ADMIN TOOLBAR REMOVER START
/************************************/
//add_filter( 'show_admin_bar', '__return_false' );
/************************************/
// ADMIN TOOLBAR REMOVER END
/************************************/


/************************************/
// CHANGE THE --- on SELECT TAG OF CONTACT FORM 7
/************************************/
function my_wpcf7_dropdown_form($html) {
	$text = 'NEW TEXT HERE';
	$html = str_replace('---', '' . $text . '', $html);
	return $html;
}
add_filter('wpcf7_form_elements', 'my_wpcf7_dropdown_form');
/************************************/
// CHANGE THE --- on SELECT TAG OF CONTACT FORM 7
/************************************/

//REMOVE AUTOP of Contact Form 7
add_filter( 'wpcf7_autop_or_not', '__return_false' );
//$categ_ID = 150;
//wp_delete_category( $categ_ID );
