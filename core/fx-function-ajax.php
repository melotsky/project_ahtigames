<?php 
if ( !defined('ABSPATH')) exit;


/**
 * Register Ajax script for roulette
 *
 * @return  void
 */
function cumulus_reg_script() {
  wp_register_script( 'loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore.js', ['jquery'] );
  // pass variables.
  wp_localize_script( 'loadmore_custom_ajax', 'THE_ROULETTE_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
  ) );
  wp_enqueue_script( 'loadmore_custom_ajax' );
}
add_action( 'wp_enqueue_scripts', 'cumulus_reg_script' );


/**
 * Display latest CPT ROULETTES
 * 
 * @param  array $atts Shortcode parameters.
 * @return mixed
 */

function cumulus_display_cpt_recent_roulettes( $atts ) {
    //global $exclude;
    $exclude = get_field('id_sdfsfsa', 'option');
  // attributes default.
  $atts = shortcode_atts( array(
    'posts_per_page' => 6,
    'tab_title' => 'title',
  ), $atts, 'display_roulette' );
  $detect = new Mobile_Detect;
  $args = array( 'post_type' => 'roulettes',
                 'post_status' => 'publish',
                 //'tab_title' => $atts['tab_title'],
                 'posts_per_page' => $atts['posts_per_page'] );
  $cpt_test = new WP_Query( $args );
  // begin item wrap.
  
  $content = '<div id="roulette" class="group tabs__support">';
  //$content .= '<h3>'.$atts['tab_title'].'</h3>';
  $featured_image_rl = wp_get_attachment_image_src(get_field('roulette_featured_game_image', 'option'), 'featured-image-tabs');
  $featured_image_rl_desk = wp_get_attachment_image_src(get_field('roulette_featured_game_image_desktop', 'option'), 'desktop-featured-image-tabs');
  if( $detect->isMobile() ){  
    $content .= '<div class="f_image__tabs"><img src="'.$featured_image_rl[0].'" alt="'.get_field('title_rf', 'option').'" title="'.get_field('title_rf', 'option').'" /></div>';
  }else{
    $content .= '<div class="f_image__tabs"><img src="'.$featured_image_rl_desk[0].'" alt="'.get_field('title_rf', 'option').'" title="'.get_field('title_rf', 'option').'" /></div>';
  }

  // ON THIS AREA
  $content .= '<div" class="item-wrapper">';
  // cpt test loop item.
  if ( $cpt_test->have_posts() ) {
    while ( $cpt_test->have_posts() ) {
      $cpt_test->the_post();
      if( $detect->isMobile() ){
        $image = wp_get_attachment_image_src(get_field('image_banner'), 'cptThumb');
        $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
      }else{
        $image = wp_get_attachment_image_src(get_field('image_banner'), 'big-cptThumb');
        $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
      }
      $content .= '<div class="item item-'.get_the_id().'">
      <div class="item___realimg_x">
        <div class="item___realimg_y">
        <img src="'.$image[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
        </div>
      </div>

      <div class="item___realimg_q" style="display: none">
        <div class="item___realimg_w" style="display: none">
        <img style="display: none" src="'.$image2[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
        </div>
      </div>
      </div>';
    }
  }
  $content .= '</div">
  ';
    $content .= '<div id="preLoader" class="group"></div><button id="cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="ajaxHelper"></div></div>
    ';
  
  wp_reset_postdata();
  return $content;
}

add_shortcode( 'display_roulette', 'cumulus_display_cpt_recent_roulettes' );
/**
 * Ajax handler for getting CPT more items. ROULETTES
 * 
 * @return mixed 
 */
function AJAX_ROULETTE() {
  $detect = new Mobile_Detect;
  $args = array( 'post_type' => 'roulettes',
                 'post_status' => 'publish',
                 'paged' => $_POST['paged'] + 1,
                 'posts_per_page' => $_POST['posts_per_page'] );
  $cpt_test = new WP_Query( $args );
  // cpt test loop item.
  if ( $cpt_test->have_posts() ) {
    while ( $cpt_test->have_posts() ) {
      $cpt_test->the_post();
      if( $detect->isMobile() ){
        $image = wp_get_attachment_image_src(get_field('image_banner'), 'cptThumb');
        $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
      }else{
        $image = wp_get_attachment_image_src(get_field('image_banner'), 'big-cptThumb');
        $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
      }
      echo '<div class="item item-'.get_the_id().'">
        <div class="item___realimg_x">
          <div class="item___realimg_y">
            <img src="'.$image[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
          </div>
        </div>

        <div class="item___realimg_q" style="display: none">
          <div class="item___realimg_w" style="display: none">
            <img style="display: none" src="'.$image2[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
          </div>
        </div>
      </div>';
      //echo '<div class="item group">'.get_the_title().'</div>';
    }
  }
  // restore data.
  wp_reset_postdata();
  exit;
}
add_action( 'wp_ajax_THE_ROULETTE', 'AJAX_ROULETTE' );
add_action( 'wp_ajax_nopriv_THE_ROULETTE', 'AJAX_ROULETTE' );  

//SLOTS

/**
 * Register Ajax script
 *
 * @return  void
 */
function slots_theme_name_reg_script() {
    wp_register_script( 'slots_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_slots.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'slots_loadmore_custom_ajax', 'THE_PARAMETER_SLOTS_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'slots_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'slots_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function theme_name_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 6,
      //'tab_title' => 'title',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'slots',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] );
    $cpt_test = new WP_Query( $args );
    // begin item wrap.
    $content = '<div id="slots" class="group tabs__support">';
    //$content .= '<h3>'.$atts['tab_title'].'</h3>';
    $featured_image_sl = wp_get_attachment_image_src(get_field('slots_featured_game_image', 'option'), 'featured-image-tabs');
    $featured_image_sl_desk = wp_get_attachment_image_src(get_field('slots_featured_game_image_desktop', 'option'), 'desktop-featured-image-tabs');
    if( $detect->isMobile() ){  
    $content .= '<div class="f_image__tabs"><img src="'.$featured_image_sl[0].'" alt="'.get_field('title_sf', 'option').'" title="'.get_field('title_sf', 'option').'" /></div>';
    }else{
      $content .= '<div class="f_image__tabs"><img src="'.$featured_image_sl_desk[0].'" alt="'.get_field('title_sf', 'option').'" title="'.get_field('title_sf', 'option').'" /></div>';      
    }
    $content .= '<div" class="item-wrapper">';
    // cpt test loop item.
    if ( $cpt_test->have_posts() ) {
      while ( $cpt_test->have_posts() ) {
        $cpt_test->the_post();
        if( $detect->isMobile() ){
          $image = wp_get_attachment_image_src(get_field('image_banner'), 'cptThumb');
          $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
        }else{
          $image = wp_get_attachment_image_src(get_field('image_banner'), 'big-cptThumb');
          $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
        }
        $content .= '<div class="item item-'.get_the_id().'">
        <div class="item___realimg_x">
        <div class="item___realimg_y">
        <img src="'.$image[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
        </div>
        </div>

        <div class="item___realimg_q" style="display: none">
          <div class="item___realimg_w" style="display: none">
          <img style="display: none" src="'.$image2[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
          </div>
        </div>        
        </div>';
      }
    }
    $content .= '</div">
    ';
      $content .= '<div id="slots_preLoader" class="group"></div><button id="slots_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="slots_ajaxHelper"></div></div>
      ';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_slots', 'theme_name_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_SLOTS() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'slots',
                   'post_status' => 'publish',
                   'paged' => $_POST['paged'] + 1,
                   'posts_per_page' => $_POST['posts_per_page'] );
    $cpt_test = new WP_Query( $args );
    // cpt test loop item.
    if ( $cpt_test->have_posts() ) {
      while ( $cpt_test->have_posts() ) {
        $cpt_test->the_post();
        if ( $detect->isMobile() ) {
          $image = wp_get_attachment_image_src(get_field('image_banner'), 'cptThumb');
          $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
        }else{
          $image = wp_get_attachment_image_src(get_field('image_banner'), 'big-cptThumb');
          $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
        }
        echo '<div class="item item-'.get_the_id().'">
        <div class="item___realimg_x">
        <div class="item___realimg_y">
          <img src="'.$image[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
        </div>
        </div>

        <div class="item___realimg_q" style="display: none">
          <div class="item___realimg_w" style="display: none">
            <img style="display: none" src="'.$image2[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
          </div>
        </div>
        </div>';
      }
    }
    // restore data.
    wp_reset_postdata();
    exit;
  }
  add_action( 'wp_ajax_THE_PARAMETER_SLOTS', 'AJAX_HANDLER_SLOTS' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_SLOTS', 'AJAX_HANDLER_SLOTS' );  

//CARDGAMES

/**
 * Register Ajax script
 *
 * @return  void
 */
function cg_theme_name_reg_script() {
    wp_register_script( 'cg_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_card_games.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'cg_loadmore_custom_ajax', 'THE_PARAMETER_CG_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'cg_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'cg_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function card_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 6,
      //'tab_title' => 'title',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'cardgames',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] );
    $cpt_test = new WP_Query( $args );
    // begin item wrap.
    $content = '<div id="card_games" class="group tabs__support">';
    //$content .= '<h3>'.$atts['tab_title'].'</h3>';
    $featured_image_cg = wp_get_attachment_image_src(get_field('card_games_featured_game_image', 'option'), 'featured-image-tabs');
    $featured_image_cg_desk = wp_get_attachment_image_src(get_field('card_games_featured_game_image_desktop', 'option'), 'desktop-featured-image-tabs');
    if( $detect->isMobile() ){  
      $content .= '<div class="f_image__tabs"><img src="'.$featured_image_cg[0].'" alt="'.get_field('title_cgf', 'option').'" title="'.get_field('title_cgf', 'option').'" /></div>';
    }else{
      $content .= '<div class="f_image__tabs"><img src="'.$featured_image_cg_desk[0].'" alt="'.get_field('title_cgf', 'option').'" title="'.get_field('title_cgf', 'option').'" /></div>';
    }
    $content .= '<div" class="item-wrapper">';
    // cpt test loop item.
    if ( $cpt_test->have_posts() ) {
      while ( $cpt_test->have_posts() ) {
        $cpt_test->the_post();
        if( $detect->isMobile() ){  
          $image = wp_get_attachment_image_src(get_field('image_banner'), 'cptThumb');
          $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
        }else{
          $image = wp_get_attachment_image_src(get_field('image_banner'), 'big-cptThumb');
          $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
        }
        $content .= '<div class="item item-'.get_the_id().'">
        <div class="item___realimg_x">
        <div class="item___realimg_y">
        <img src="'.$image[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
        </div>
        </div>

        <div class="item___realimg_q" style="display: none">
          <div class="item___realimg_w" style="display: none">
          <img style="display: none" src="'.$image2[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
          </div>
        </div>        
        </div>';
      }
    }
    $content .= '</div">
    ';
      $content .= '<div id="cg_preLoader" class="group"></div><button id="cg_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="cg_ajaxHelper"></div></div>
      ';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_card_games', 'card_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_CG() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'cardgames',
                   'post_status' => 'publish',
                   'paged' => $_POST['paged'] + 1,
                   'posts_per_page' => $_POST['posts_per_page'] );
    $cpt_test = new WP_Query( $args );
    // cpt test loop item.
    if ( $cpt_test->have_posts() ) {
      while ( $cpt_test->have_posts() ) {
        $cpt_test->the_post();
        if ( $detect->isMobile() ) {
          $image = wp_get_attachment_image_src(get_field('image_banner'), 'cptThumb');
          $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
        }else{
          $image = wp_get_attachment_image_src(get_field('image_banner'), 'big-cptThumb');
          $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
        }
        echo '<div class="item item-'.get_the_id().'">
        <div class="item___realimg_x">
        <div class="item___realimg_y">
          <img src="'.$image[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
        </div>
        </div>

        <div class="item___realimg_q" style="display: none">
          <div class="item___realimg_w" style="display: none">
            <img style="display: none" src="'.$image2[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
          </div>
        </div>        
        </div>';
      }
    }
    // restore data.
    wp_reset_postdata();
    exit;
  }
  add_action( 'wp_ajax_THE_PARAMETER_CG', 'AJAX_HANDLER_CG' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_CG', 'AJAX_HANDLER_CG' ); 

 //JACKPOT

/**
 * Register Ajax script
 *
 * @return  void
 */
function jg_theme_name_reg_script() {
  wp_register_script( 'jg_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_jackpot_games.js', ['jquery'] );
  // pass variables.
  wp_localize_script( 'jg_loadmore_custom_ajax', 'THE_PARAMETER_JG_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
  ) );
  wp_enqueue_script( 'jg_loadmore_custom_ajax' );
}
add_action( 'wp_enqueue_scripts', 'jg_theme_name_reg_script' );
/**
 * Display latest CPT
 * 
 * @param  array $atts Shortcode parameters.
 * @return mixed
 */
function jackpot_games_display_cpt_recent( $atts ) {
  $detect = new Mobile_Detect;
  // attributes default.
  $atts = shortcode_atts( array(
    'posts_per_page' => 6,
    //'tab_title' => 'title',
  ), $atts, 'display_slots' );
  $args = array( 'post_type' => 'jackpot-games',
                 'post_status' => 'publish',
                 'posts_per_page' => $atts['posts_per_page'] );
  $cpt_test = new WP_Query( $args );
  // begin item wrap.
  $content = '<div id="jackpot_games" class="group tabs__support">';
  //$content .= '<h3>'.$atts['tab_title'].'</h3>';
  $featured_image_cg = wp_get_attachment_image_src(get_field('jackpot_featured_game_image', 'option'), 'featured-image-tabs');
  $featured_image_cg_desk = wp_get_attachment_image_src(get_field('jackpot_featured_game_image_desktop', 'option'), 'desktop-featured-image-tabs');
  if( $detect->isMobile() ){  
    $content .= '<div class="f_image__tabs"><img src="'.$featured_image_cg[0].'" alt="'.get_field('title_jg', 'option').'" title="'.get_field('title_jg', 'option').'" /></div>';
  }else{
    $content .= '<div class="f_image__tabs"><img src="'.$featured_image_cg_desk[0].'" alt="'.get_field('title_jg', 'option').'" title="'.get_field('title_jg', 'option').'" /></div>';
  }
  $content .= '<div" class="item-wrapper">';
  // cpt test loop item.
  if ( $cpt_test->have_posts() ) {
    while ( $cpt_test->have_posts() ) {
      $cpt_test->the_post();
      if( $detect->isMobile() ){  
        $image = wp_get_attachment_image_src(get_field('image_banner'), 'cptThumb');
        $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
        
      }else{
        $image = wp_get_attachment_image_src(get_field('image_banner'), 'big-cptThumb');
        $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
      }
      $content .= '<div class="item item-'.get_the_id().'">
      <div class="item___realimg_x">
        <div class="item___realimg_y">
        <img src="'.$image[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
        </div>
      </div>

      <div class="item___realimg_q" style="display: none">
        <div class="item___realimg_w" style="display: none">
        <img style="display: none" src="'.$image2[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
        </div>
      </div>
        
        </div>';
    }
  }
  $content .= '</div">';
  $content .= '<div id="jg_preLoader" class="group"></div><button id="jg_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="jg_ajaxHelper"></div></div>';
  
  wp_reset_postdata();
  return $content;
}
add_shortcode( 'display_jackpot_games', 'jackpot_games_display_cpt_recent' );
/**
 * Ajax handler for getting CPT more items.
 * 
 * @return mixed 
 */
function AJAX_HANDLER_JG() {
  $detect = new Mobile_Detect;
  $args = array( 'post_type' => 'jackpot-games',
                 'post_status' => 'publish',
                 'paged' => $_POST['paged'] + 1,
                 'posts_per_page' => $_POST['posts_per_page'] );
  $cpt_test = new WP_Query( $args );
  // cpt test loop item.
  if ( $cpt_test->have_posts() ) {
    while ( $cpt_test->have_posts() ) {
      $cpt_test->the_post();
      if ( $detect->isMobile() ) {
        $image = wp_get_attachment_image_src(get_field('image_banner'), 'cptThumb');
        $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
      }else{
        $image = wp_get_attachment_image_src(get_field('image_banner'), 'big-cptThumb');
        $image2 = wp_get_attachment_image_src(get_field('image_banner'), 'bigger-cptThumb');
      }
      echo '<div class="item item-'.get_the_id().'">
      <div class="item___realimg_x">
        <div class="item___realimg_y">
          <img src="'.$image[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
        </div>
      </div>

      <div class="item___realimg_q" style="display: none">
        <div class="item___realimg_w" style="display: none">
          <img style="display: none" src="'.$image2[0].'" alt="'.get_the_title().'" title="'.get_the_title().'" />
        </div>
      </div>

      </div>';
    }
  }
  // restore data.
  wp_reset_postdata();
  exit;
}
add_action( 'wp_ajax_THE_PARAMETER_JG', 'AJAX_HANDLER_JG' );
add_action( 'wp_ajax_nopriv_THE_PARAMETER_JG', 'AJAX_HANDLER_JG' ); 