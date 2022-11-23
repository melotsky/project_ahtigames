<?php 
if ( !defined('ABSPATH')) exit;

function theLangSwitcherHook(){
    do_action('theLangSwitcherHook');
}

//add_action('theLangSwitcherHook', 'function_name', 1);