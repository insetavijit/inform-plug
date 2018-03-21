<?php
/*| @package inform | PageGenerator */
namespace modules\Settings;
/*|||||||||| date : 19-3-2018 ||||||
    Author : avijit sarkar
    Version : 1.0.0
    UseCases: Generate Pages for Admin Panned Entry
    Used on : only this page 
    comment : n/a
*/
class PageGenerator
{
    /* [ listing all pages and subpages : ] */
    public $pages = array();
    public $subPages = array();
    ///> entry point
    public function register()
    {
        /*| this is the default function to execute everything | */
        add_action( 'admin_menu',   array($this , 'execute') );
    }
    public function addPages( array $page )
    {
        # 1 . modulesluding the given page meta to the page create Queue
        $this->pages = $page;
        return $this;
    }
    public function addSubPages( array $subPages )
    {
        # 2 . modulesluding All given subpage meta to the page create Queue        
        $this->subPages = array_merge($this->subPages , $subPages);
        return $this;
    }
    public function withSubpage( string $title )
    {#3. creating the main SubPage if asked for
        // if no page is setting up . then how to generate subpage of it ? so leave 
        if ( empty( $this->pages) ) { return $this; }
        // technical thing : we want to create the parent page as a subpage according to make it work like df setting->general page
        $main_page_entry = $this->pages[0];
        // adding additional Main Subpage  : (  this is auto gen . no need to specify in calling to create it but call the instance )
		$subpage = array(
			array(
				'parent_slug' => $main_page_entry['menu_slug'], 
				'page_title' => $main_page_entry['page_title'], 
				'menu_title' => ($title) ? $title : $main_page_entry['menu_title'], 
				'capability' => $main_page_entry['capability'], 
				'menu_slug' => $main_page_entry['menu_slug'], 
				'callback' => $main_page_entry['callback']
			)
		);
        $this->subPages = $subpage;
        # 4 .  return hole object for methods building 
		return $this;
    }
    public function execute()
    {
        foreach($this->pages as $page){
            add_menu_page(
                $page['page_title'], 
                $page['menu_title'], 
                $page['capability'], 
                $page['menu_slug'], 
                $page['callback'],
                //optional args :
                ($page['icon_url']) ? $page['icon_url'] : 'dashicons-admin-plugins',
                ($page['position']) ? $page['position'] : null
                
            );
        }
        // if their is no sub pages the loop will not be executed so chill
        foreach($this->subPages as $subPage){
            add_submenu_page(
                $subPage['parent_slug'],
                $subPage['page_title'], 
                $subPage['menu_title'], 
                $subPage['capability'], 
                $subPage['menu_slug'],
                $subPage['callback']
            );
        }
    }
}