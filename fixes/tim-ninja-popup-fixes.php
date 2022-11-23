<?php
use cumuli\son_api\Helper;

add_filter('ninjapopups_exit_id',function($POPUP_ID){

    $detect = new Mobile_Detect;
    $c_code = strtolower(Helper::getCountryCode());

    if (!isset($_COOKIE['Aname'])) {

        if( $c_code === 'fi' ) {

            if ( $detect->isMobile() ) {
                return '20262'; //Fi Mobile
            }else{
                return '20264'; //Fi Desktop
            }

        }elseif( $c_code === 'no' ){

            if ( $detect->isMobile() ) {
                return '20265'; //No Mobile
            }else{
                return '20267'; //No Desktop
            }

        }
    }

    return 'disabled';
});


add_filter('ninjapopups_welcome_id',function($POPUP_ID){
  return 'disabled';
});


