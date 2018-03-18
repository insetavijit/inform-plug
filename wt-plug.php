<?php
/*
    Plugin Name: wt-plug
    Plugin URI: https://github.com/insetavijit/wt-plug.git
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


use Inc\Base\Activate ;
use Inc\Base\Deactivate ;


function wt_plug_activation (){
    Activate :: activate ();
}
function wt_plug_deactivation (){
    Deactivate :: deactivate ();
}


register_activation_hook    ( __FILE__ , 'wt_plug_activation' );
register_deactivation_hook  ( __FILE__ , 'wt_plug_deactivation');




if( class_exists( 'Inc\\Init') ){
    Inc\init::register_services() ; 
    // echo 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, molestias.';
}else{
    // print_r( Inc );
    // echo 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, molestias.';
}