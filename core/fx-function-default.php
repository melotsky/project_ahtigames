<?php 
if ( !defined('ABSPATH')) exit;


require_once( dirname(__FILE__) . '/fx-function-acf.php'); // OPTION THEME / ACF
require_once( dirname(__FILE__) . '/fx-function-css-loader.php'); // CSS LOADER
require_once( dirname(__FILE__) . '/fx-function-hooks.php'); // HOOKS
require_once( dirname(__FILE__) . '/fx-function-image-size.php'); // IMAGES SIZES
require_once( dirname(__FILE__) . '/fx-function-js-loader.php'); // JS LOADER
require_once( dirname(__FILE__) . '/fx-function-nav-position.php'); // NAV POSITION
require_once( dirname(__FILE__) . '/fx-function-add-font.php'); // ADD FONT FOR GOOGLE
require_once( dirname(__FILE__) . '/fx-function-paginator.php'); // PAGINATION FUNCTION
require_once( dirname(__FILE__) . '/fx-function-lang.php'); // LANGUAGE
require_once( dirname(__FILE__) . '/fx-function-wp-others-admin.php'); // WP OTHER FUNCTIONS ADMIN / BACK END  / WIDGETS
require_once( dirname(__FILE__) . '/fx-function-wp-others.php'); // WP OTHER FUNCTIONS FRONT END
//ENABLE THIS TO CREATE CUSTOM POST TYPE AND EDIT THE FILE
require_once( dirname(__FILE__) . '/fx-function-create-cpt.php'); // CREATE CPT

//ONLY ENABLE THIS IF YOU WANT TO CREATE A BLOCK USING ACF PRO
require_once( dirname(__FILE__) . '/fx-function-blocks.php'); // BLOCKS FOR ACF

// $exclude = get_field('id_sdfsfsa', 'option');
// global $exclude;
require_once( dirname(__FILE__) . '/fx-function-ajax.php'); 

require_once "Mobile_Detect.php";


//ENABLE THIS IF YOU WANT TO CREATE A SITEORIGIN WIDGET ONLY IF YOU WANT TO USE SITEORIGIN... OLDSCHOOL
//require_once( dirname(__FILE__) . '/fx-siteorigin-widgets.php'); // SITEORIGIN WIDGETS



// ENABLE THIS IF YOU WANT TO ADD SCRIPT OF THE FOOTER ( NOT EXTERNAL FILE)
//require_once( dirname(__FILE__) . '/fx-function-script-loader.php'); 

//ONLY ENABLE THIS IF YOU MADE THIS THEME AS CHILD THEME AND EDIT THE FILE TO UNLOAD THE CSS OR JS FILE OF THE TARGET PARENT THEME
require_once( dirname(__FILE__) . '/fx-function-unload.php'); // UNLOAD CSS / JS

// Additionaly Hack Functions
require_once( dirname(__FILE__) . '/fx-hacks.php'); 
