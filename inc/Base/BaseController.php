<?php 
/* | @package wt-plug || BaseController|*/
namespace Inc\Base ;
/*|||||||||| date : 19-3-2018 ||||||
    Aurthor : avijit sarkar
    Version : 1.0.0
    UseCases: add new link to wp plugin infor after active link
    Used on : 
        1. Pages/**
        2. Settings/ callbacks.php
    comment : n/a
*/
class BaseController
{
    public function plug_info()
    {
        $plugin_url = plugin_dir_url( dirname( __FILE__ , 2) ) ;
        $parts = explode ( '/' ,$plugin_url ) ;
        return [
            # plugin Name :
            'NAME' => $parts [ count($parts) - 2 ],
            # plugin Url
            'URL'=> $plugin_url ,
            # plugin url path ( for including files from the root of this plugin )
            'PATH'=> plugin_dir_path( dirname( __FILE__ , 2)),
            # basefile url / name || ENTRY FILE FULL PATH
            'BASENAME'=> INS_PLUGIN_BASENAME ,
        ];
    }

    public function slugs()
    {
        return 
        [ #self explanatory 
            'ADMIN_MENU_SLUG' => 'wt-plug-inset-amdin-main-menu-area',
            'ADMIN_MENU_TRASH_SLUG' => 'wt-plug-inset-trash-page',
            'ADMIN_MENU_DASHBORD_SLUG' => 'wt-plug-inset-dashbord-page'
        ];
    }
}
