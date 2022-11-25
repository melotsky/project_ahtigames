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

//MICROGAMING

/**
 * Register Ajax script
 *
 * @return  void
 */
function microgaming_theme_name_reg_script() {
    wp_register_script( 'microgaming_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_mg.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'microgaming_loadmore_custom_ajax', 'THE_PARAMETER_MG_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'microgaming_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'microgaming_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function mg_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 12,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'microgaming-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="mg" class="group tabs__support">';
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
    $content .= '<div id="mg_preLoader" class="group"></div><button id="mg_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="mg_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_microgaming', 'mg_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_MG() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'microgaming-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_MG', 'AJAX_HANDLER_MG' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_MG', 'AJAX_HANDLER_MG' ); 

//REALASTIC

/**
 * Register Ajax script
 *
 * @return  void
 */
function realistic_theme_name_reg_script() {
    wp_register_script( 'realistic_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_rg.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'realistic_loadmore_custom_ajax', 'THE_PARAMETER_RG_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'realistic_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'realistic_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function rg_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 12,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'realistic-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="rg" class="group tabs__support">';
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
    $content .= '<div id="rg_preLoader" class="group"></div><button id="rg_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="rg_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_realistic', 'rg_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_RG() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'realistic-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_RG', 'AJAX_HANDLER_RG' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_RG', 'AJAX_HANDLER_RG' ); 

  //GANAPATI

/**
 * Register Ajax script
 *
 * @return  void
 */
function ganapati_theme_name_reg_script() {
    wp_register_script( 'ganapati_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_gg.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'ganapati_loadmore_custom_ajax', 'THE_PARAMETER_GG_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'ganapati_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'ganapati_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function gg_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 12,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'ganapati-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="gg" class="group tabs__support">';
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
    $content .= '<div id="gg_preLoader" class="group"></div><button id="gg_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="gg_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_ganapati', 'gg_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_GG() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'ganapati-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_GG', 'AJAX_HANDLER_GG' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_GG', 'AJAX_HANDLER_GG' ); 

//REDTIGER

/**
 * Register Ajax script
 *
 * @return  void
 */
function redtiger_theme_name_reg_script() {
    wp_register_script( 'redtiger_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_rt.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'redtiger_loadmore_custom_ajax', 'THE_PARAMETER_RT_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'redtiger_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'redtiger_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function rt_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 12,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'redtiger-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="rt" class="group tabs__support">';
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
    $content .= '<div id="rt_preLoader" class="group"></div><button id="rt_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="rt_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_redtiger', 'rt_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_RT() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'redtiger-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_RT', 'AJAX_HANDLER_RT' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_RT', 'AJAX_HANDLER_RT' ); 


//YGGDRASIL

/**
 * Register Ajax script
 *
 * @return  void
 */
function yggdrasil_theme_name_reg_script() {
    wp_register_script( 'yggdrasil_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_yd.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'yggdrasil_loadmore_custom_ajax', 'THE_PARAMETER_YD_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'yggdrasil_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'yggdrasil_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function yd_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 12,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'yggdrasil-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="yd" class="group tabs__support">';
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
    $content .= '<div id="yd_preLoader" class="group"></div><button id="yd_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="yd_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_yggdrasil', 'yd_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_YD() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'yggdrasil-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_YD', 'AJAX_HANDLER_YD' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_YD', 'AJAX_HANDLER_YD' ); 

//MERKUR
/**
 * Register Ajax script
 *
 * @return  void
 */
function merkur_theme_name_reg_script() {
    wp_register_script( 'merkur_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_mkz.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'merkur_loadmore_custom_ajax', 'THE_PARAMETER_MKZ_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'merkur_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'merkur_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function mkz_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 12,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'merkur-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="mkz" class="group tabs__support">';
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
    $content .= '<div id="mkz_preLoader" class="group"></div><button id="mkz_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="mkz_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_merkur', 'mkz_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_MKZ() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'merkur-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_MKZ', 'AJAX_HANDLER_MKZ' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_MKZ', 'AJAX_HANDLER_MKZ' ); 

//STAKELOGIC
/**
 * Register Ajax script
 *
 * @return  void
 */
function stakelogic_theme_name_reg_script() {
    wp_register_script( 'stakelogic_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_sl.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'stakelogic_loadmore_custom_ajax', 'THE_PARAMETER_SL_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'stakelogic_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'stakelogic_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function sl_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 12,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'merkur-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="sl" class="group tabs__support">';
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
    $content .= '<div id="sl_preLoader" class="group"></div><button id="sl_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="sl_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_stakelogic', 'sl_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_SL() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'merkur-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_SL', 'AJAX_HANDLER_SL' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_SL', 'AJAX_HANDLER_SL' );

  //BLUEPRINT GAMING
/**
 * Register Ajax script
 *
 * @return  void
 */
function blueprintgaming_theme_name_reg_script() {
    wp_register_script( 'blueprintgaming_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_bpg.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'blueprintgaming_loadmore_custom_ajax', 'THE_PARAMETER_BPG_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'blueprintgaming_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'blueprintgaming_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function bpg_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 12,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'blueprint-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="bpg" class="group tabs__support">';
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
    $content .= '<div id="bpg_preLoader" class="group"></div><button id="bpg_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="bpg_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_blueprint', 'bpg_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_BPG() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'blueprint-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_BPG', 'AJAX_HANDLER_BPG' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_BPG', 'AJAX_HANDLER_BPG' );

//PLAYNGO
/**
 * Register Ajax script
 *
 * @return  void
 */
function playngo_theme_name_reg_script() {
    wp_register_script( 'playngo_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_png.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'playngo_loadmore_custom_ajax', 'THE_PARAMETER_PNG_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'playngo_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'playngo_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function png_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 12,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'playngo-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="png" class="group tabs__support">';
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
    $content .= '<div id="png_preLoader" class="group"></div><button id="png_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="png_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_playngo', 'png_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_PNG() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'playngo-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_PNG', 'AJAX_HANDLER_PNG' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_PNG', 'AJAX_HANDLER_PNG' );


//NYXGAMING
/**
 * Register Ajax script
 *
 * @return  void
 */
function nyxgaming_theme_name_reg_script() {
    wp_register_script( 'nyxgaming_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_ngx.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'nyxgaming_loadmore_custom_ajax', 'THE_PARAMETER_NGX_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'nyxgaming_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'nyxgaming_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function ngx_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 12,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'nyx-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="ngx" class="group tabs__support">';
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
    $content .= '<div id="ngx_preLoader" class="group"></div><button id="ngx_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="ngx_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_nyxgaming', 'ngx_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_NGX() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'nyx-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_NGX', 'AJAX_HANDLER_NGX' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_NGX', 'AJAX_HANDLER_NGX' );

//THUNDERKICK
/**
 * Register Ajax script
 *
 * @return  void
 */
function thunderkick_theme_name_reg_script() {
    wp_register_script( 'thunderkick_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_tkx.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'thunderkick_loadmore_custom_ajax', 'THE_PARAMETER_TKX_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'thunderkick_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'thunderkick_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function tkx_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 6,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'thunderkick-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="tkx" class="group tabs__support">';
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
    $content .= '<div id="tkx_preLoader" class="group"></div><button id="tkx_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="tkx_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_thunderkick', 'tkx_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_TKX() {
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'thunderkick-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_TKX', 'AJAX_HANDLER_TKX' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_TKX', 'AJAX_HANDLER_TKX' );



//NEXTGEN
/**
 * Register Ajax script
 *
 * @return  void
 */
function nextgen_theme_name_reg_script() {
    wp_register_script( 'nextgen_loadmore_custom_ajax', trailingslashit( get_template_directory_uri() ) . 'assets/js/loadmore_ngyx.js', ['jquery'] );
    // pass variables.
    wp_localize_script( 'nextgen_loadmore_custom_ajax', 'THE_PARAMETER_NGYX_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php'
    ) );
    wp_enqueue_script( 'nextgen_loadmore_custom_ajax' );
  }
  add_action( 'wp_enqueue_scripts', 'nextgen_theme_name_reg_script' );
  /**
   * Display latest CPT
   * 
   * @param  array $atts Shortcode parameters.
   * @return mixed
   */
  function ngyx_games_display_cpt_recent( $atts ) {
    $detect = new Mobile_Detect;
    // attributes default.
    $atts = shortcode_atts( array(
      'posts_per_page' => 6,
      'cpt_title' => '',
    ), $atts, 'display_slots' );
    $args = array( 'post_type' => 'nextgen-cpt',
                   'post_status' => 'publish',
                   'posts_per_page' => $atts['posts_per_page'] 
                  );
    $cpt_title = $atts['cpt_title'];
    $cpt_test = new WP_Query( $args );
    $content  = '<div class="gamer__provider group">';
    $content .= '<div class="group cpt_title__helper tabs__support"><h2 class="has-text-align-center add_extra_space_padding_top1">'.$cpt_title.'</h2></div>';
    $content .= '<div id="ngyx" class="group tabs__support">';
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
    $content .= '<div id="ngyx_preLoader" class="group"></div><button id="ngyx_cpt_loadmore" data-max-num-page="'.$cpt_test->max_num_pages.'" data-current-paged="1" data-posts-per-page="'.$atts['posts_per_page'].'">'.esc_html__( 'more games', 'ahti_lang' ).'</button><div class="ngyx_ajaxHelper"></div></div></div">';
    
    wp_reset_postdata();
    return $content;
  }
  add_shortcode( 'display_nextgen', 'ngyx_games_display_cpt_recent' );
  /**
   * Ajax handler for getting CPT more items.
   * 
   * @return mixed 
   */
  function AJAX_HANDLER_NGYX() { 
    $detect = new Mobile_Detect;
    $args = array( 'post_type' => 'nextgen-cpt',
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
  add_action( 'wp_ajax_THE_PARAMETER_NGYX', 'AJAX_HANDLER_NGYX' );
  add_action( 'wp_ajax_nopriv_THE_PARAMETER_NGYX', 'AJAX_HANDLER_NGYX' );