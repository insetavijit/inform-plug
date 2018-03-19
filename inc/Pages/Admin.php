<?php
/*| @package wt-plug | Admin - enty point */
namespace Inc\Pages ;
/*| extend and uses |*/
use Inc\Base\BaseController ;
use Inc\Settings\PageGenarator ;
use Inc\Settings\Callbacks ;
/*|||||||||| date : 19-3-2018 ||||||
    Aurthor : avijit sarkar
    Version : 1.0.0
    UseCases: Main menu entry for admin pannel for this plugin
    Used on : only this page 
    comment : n/a
*/
class Admin extends BaseController
{
    # decliaring vars we will use them leater
    public $subpages ;
    public $pageSetting;
    public $calls ;
    # main function to ran on start ( called in init.php )
    public function register()
    {
        # 1 .seeting up callback links :
        $this->calls = new Callbacks() ;
        # 2. setting up pageGenarator 
        $PageGenarator = new PageGenarator();
        # 3. setting up pages and subpages :
        $this->setPage(); 
        $this->subpages();
        # 4. calling the PageGenarator for create pages and subpages :
        $PageGenarator->addPages($this->pageSetting )->withSubpage( 'Dashbord' )->addSubPages( $this->subpages )->register();
    }
    public function setPage()
    { # 3.1 creating main page entry meta | called in register()
        $this->pageSetting = array(
            array
            ( ///> Creating the Dashbord main page entry  | this page will be used to create a subpage with same name 
                'page_title'=> 'dashbord', 
                'menu_title'=> 'wt-seed', 
                'capability'=> 'manage_options', 
                'menu_slug' => 'wt_plug_main',
                'callback'  => array( new Callbacks() , 'Dashbord' ),
                'icon_url'  => ''
            )
        );
    }
    public function subpages()
    {   # 3.2  creating subpages meta | called in register()
        $this->subpages = array(
            array
            (   ///> Creating the Trash  page entry 
                'parent_slug' => 'wt_plug_main', 
                'page_title' => 'Trash',
                'menu_title' => 'trash',
                'capability' => 'manage_options', 
                'menu_slug' => 'wt_plug_main_trash', 
                'callback' => array( $this->calls , 'Dashbord' )
            ),
        );
    }
}