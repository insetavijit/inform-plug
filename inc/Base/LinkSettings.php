<?php 

namespace Inc\Base ;

use Inc\Base\BaseController;

class LinkSettings extends BaseController
{
    public function register()
    {
        // echo $this->plug_info()['BASENAME'];
        # code...
        add_filter( 
            'plugin_action_links_'. $this->plug_info()['BASENAME'] ,
            array( $this , 'settings_link') );
    }
    public function settings_link( $links ) // $link will be provided by wordpess
    {
        # code...
        $newlink = '<a href="admin.php?page=ins_wp_plug"> Dashbord </a>' ;
        array_push( $links , $newlink );

        return $links ;
    }
}
