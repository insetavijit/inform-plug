<?php

namespace Inc\Pages ;

use Inc\Base\BaseController ;
use Inc\Settings\SettingsApi ;
use Inc\Settings\Callbacks ;

class Admin extends BaseController
{
    public $subpages ;
    public $pageSetting;
    public $calls ;
    public function register()
    {
        
        $this->calls = new Callbacks() ;
        $settings = new SettingsApi();

        $this->setPage(); 
        $this->subpages();
        $settings->addPages($this->pageSetting )->withSubpage( 'Dashbord' )->addSubPages( $this->subpages )->register();
    }
    public function subpages()
    {
        
        $this->subpages = array(
            array
            (
                'parent_slug' => 'wt_plug_main', 
                'page_title' => 'Trash',
                'menu_title' => 'trash',
                'capability' => 'manage_options', 
                'menu_slug' => 'wt_plug_main_trash', 
                'callback' => array( $this->calls , 'Dashbord' )
            ),
        );
    }
    public function callBk(){
        echo 'Hi' ;
    }
    public function setPage()
    {
        $this->pageSetting = array(
            array
            (
                'page_title'=> 'dashbord', 
                'menu_title'=> 'wt-seed', 
                'capability'=> 'manage_options', 
                'menu_slug' => 'wt_plug_main',
                'callback'  => array( new Callbacks() , 'Dashbord' ),
                'icon_url'  => ''
            )
        );
        return $this ;
    }
}