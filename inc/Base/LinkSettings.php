<?php 
/*| @package wt-plug | LinkSettings */
    namespace modules\Base ;
/*| extend and uses |*/
    use modules\Base\BaseController;
/*|||||||||| date : 19-3-2018 ||||||
    Author : avijit sarkar
    Version : 1.0.0
    UseCases: add new link to wp plugin inform after active link
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
                # 1 . Concating with the base name : ! remember ('concating') this is the first line not second
                . $this->plug_info()['BASENAME'] 
                # 2. the CallBack function | currant page ( line 32 )
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
            '<a href="admin.php?page='.$this->admin_slugs()['ADMIN_MENU_DASHBOARD_SLUG'].'"> Dashboard </a>' 
        );
        # 3 . at last returning the updated arry to wp - callback
        return $links ;
    }
}
