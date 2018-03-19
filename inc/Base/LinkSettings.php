<?php 
/*| @package wt-plug | LinkSettings */
    namespace Inc\Base ;
/*| extend and uses |*/
    use Inc\Base\BaseController;
/*|||||||||| date : 19-3-2018 ||||||
    Aurthor : avijit sarkar
    Version : 1.0.0
    UseCases: add new link to wp plugin infor after active link
    Used on : only this page 
    comment : n/a
*/


class LinkSettings extends BaseController
{
    public function register()
    {
        // putting out request for new link in plugin intro : after activate link !
        add_filter
            ( 
                # 1. This is the hook
                'plugin_action_links_' 
                # 1 . Concating with the base name : ! remember ('concating') this is the firest line not secound
                . $this->plug_info()['BASENAME'] 
                # 2. the CallBack function | currnt page ( line 32 )
                ,array( $this , 'settings_link')
            );
    }
    public function settings_link( $links )
    {
        # extending the $links array . with our new link
        array_push
        ( 
            # 1. The $links will be passed by wordpress .
            $links,
            # 2 . this is the link we are passing to wp to add in the plugin section 
            '<a href="admin.php?page=ins_wp_plug"> Dashbord </a>' 
        );
        # 3 . at last returning the updated arry to wp - callback
        return $links ;
    }
}
