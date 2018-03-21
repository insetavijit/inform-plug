<?php 
/* | @package inform || BaseController|*/
namespace modules\Base ;
/*|||||||||| date : 19-3-2018 ||||||
    Author : avijit sarkar
    Version : 1.0.0
    UseCases: add new link to wp plugin inform after active link
    Used on : 
        1. Pages/**
        2. Settings/ callbacks.php
    comment : n/a
*/
class Config
{
    public $slug ;
    public $info ;

    function __construct(){
        $this->setSlug();
        $this->setinfo();
    }
    public function setSlug()
    {
        $plugin_url = plugin_dir_url( dirname( __FILE__ , 2) ) ;
        $parts = explode ( '/' ,$plugin_url ) ;
        $this->info =array
            (
                # plugin Name :
                'NAME' => $parts [ count($parts) - 2 ],
                # plugin Url
                'URL'=> $plugin_url ,
                # plugin url path ( for modulesluding files from the root of this plugin )
                'PATH'=> plugin_dir_path( dirname( __FILE__ , 2)),
                # base-file url / name || ENTRY FILE FULL PATH
                'BASENAME'=> INS_PLUGIN_BASENAME
            );
    }
    public function setinfo()
    {
        $this->slug =array
        (
             #self explanatory
            'ADMIN_MENU_TRASH_SLUG' => 'inform-inset-trash-page',
            'ADMIN_MENU_DASHBOARD_SLUG' => 'inform-inset-dashboard-page'
        );
    }
}
