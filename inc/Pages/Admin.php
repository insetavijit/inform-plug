<?php
/*| @package wt-plug | Admin - entry point */
namespace Inc\Pages ;
/*| extend and uses |*/
use Inc\Base\BaseController ;
use Inc\Settings\PageGenerator ;
use Inc\Settings\Callbacks ;
/*|||||||||| date : 19-3-2018 ||||||
    Author : avijit sarkar
    Version : 1.0.0
    UseCases: Main menu entry for admin panel for this plugin
    Used on : only this page 
    comment : n/a
*/
class Admin extends BaseController
{
    # declaring vars we will use them later
    public $subpages ;
    public $pageSetting;
    public $calls ;
    # main function to ran on start ( called in init.php )
    public function register()
    {
        # 1 .setting up callback links :
        $this->calls = new Callbacks() ;
        # 2. setting up pageGenerator 
        $PageGenerator = new PageGenerator();
        # 3. setting up pages and sub pages :
        $this->setPage(); 
        $this->subpages();
        # 4. calling the PageGenerator for create pages and sub pages :
        $PageGenerator->addPages($this->pageSetting )->withSubpage( 'Dashboard' )->addSubPages( $this->subpages )->register();
    }
    public function setPage()
    { # 3.1 creating main page entry meta | called in register()
        $this->pageSetting = array(
            array
            ( ///> Creating the Dashboard main page entry  | this page will be used to create a sub page with same name 
                'page_title'=> 'Dashboard', 
                'menu_title'=> 'wt-plug', 
                'capability'=> 'manage_options', 
                'menu_slug' => $this->admin_slugs()['ADMIN_MENU_DASHBOARD_SLUG'],
                'callback'  => array( new Callbacks() , 'Dashboard' ),
                'icon_url'  => ''
            )
        );
    }
    public function subpages()
    {   # 3.2  creating subpages meta | called in register()
        $this->subpages = array(
            array
            (   ///> Creating the Trash  page entry 
                'parent_slug' => $this->admin_slugs()['ADMIN_MENU_DASHBOARD_SLUG'], 
                'page_title' => 'Trash - page ',
                'menu_title' => 'Trash',
                'capability' => 'manage_options', 
                'menu_slug' => $this->admin_slugs()['ADMIN_MENU_TRASH_SLUG'], 
                'callback' => array( $this->calls , 'Trash' )
            ),
        );
    }
}