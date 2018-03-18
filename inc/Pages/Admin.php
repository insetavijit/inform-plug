<?php

namespace Inc\Pages ;

use Inc\Base\BaseController ;
use Inc\Settings\SettingsApi ;

class Admin extends BaseController
{
    public $subpages ;
    public $pageSetting;
    public function register()
    {
        

        $this->setPage(); 
        $this->subpages(); 

        $settings = new SettingsApi();
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
                'callback' => ''
            ),
        );
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
                'callback'  => '',
                'icon_url'  => ''
            )
        );
        return $this ;
    }
}