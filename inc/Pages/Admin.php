<?php

namespace Inc\Pages ;
use Inc\Base\BaseController ;

class Admin extends BaseController
{
    public function register()
    {
        add_action(
            'admin_menu', 
            array($this , 'add_admin_page')
        );
    }
    public function add_admin_page( )
    {
        add_menu_page( 
            'wp_plug' ,// $page_title:string, 
            'wp_plug' ,// $menu_title:string, 
            'manage_options' ,// $capability:string, 
            'ins_wp_plug' ,// $menu_slug:string, 
            array( $this ,'admin_index' ) ,// $function:callable, 
            'dashicons-store' // $icon_url:string,
        );
    }
    public function admin_index()
    {
        require_once ( $this->plug_info()['PATH'] . '/templates/WellcomePage.php') ;
    }
}