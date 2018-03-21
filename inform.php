<?php
/*
    Plugin Name: inform
    Plugin URI: https://github.com/insetavijit/inform.git
    Description: A simple Clean minimalistc mordern wordpress plugin devlopment workfollow - seed 
    Version: 1.0.0
    Author: Avijit sarkar
    Author URI: https://github.com/insetavijit/
    License: GPLv2 or later
    Text Domain: inset
*/
defined( 'ABSPATH' ) or die( 'Get Out !' ) ;

if(file_exists( dirname( __FILE__ ) .'/vendor/autoload.php' )){
    require_once ( dirname( __FILE__ ) .'/vendor/autoload.php' );
}


define ( 'INS_PLUGIN_BASENAME' , plugin_basename( __FILE__ ));


use modules\Base\Activate ;
use modules\Base\Deactivate ;


function inform_form_support_activation (){
    Activate :: activate ();
}
function inform_form_support_deactivation (){
    Deactivate :: deactivate ();
}


register_activation_hook    ( __FILE__ , 'inform_form_support_activation' );
register_deactivation_hook  ( __FILE__ , 'inform_form_support_deactivation');




if( class_exists( 'modules\\Init') ){
    Inc\init::register_services() ; 
    // echo 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, molestias.';
}else{
    // print_r( Inc );
    // echo 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, molestias.';
}