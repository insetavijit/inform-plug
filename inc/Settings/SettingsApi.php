<?php

namespace Inc\Settings;

class SettingsApi
{
    /* [ listing all pages and subpages : ] */
    public $pages = array();
    public $subPages = array();


    public function register()
    {
        /*| this is the default function to exicute everything | */
        add_action( 'admin_menu',   array($this , 'exicute') );
    }
    public function addPages( array $page )
    {
        /*| one page @ one tiem . with all subs| */
        $this->pages = $page;
        return $this;
    }
    public function addSubPages( array $subPages )
    {
        $this->subPages = array_merge($this->subPages , $subPages);
        return $this;
    }
    public function withSubpage( string $title )
    {
        // if no page is seeted up . then how to get subpage of it ? so leave 
        if ( empty( $this->pages) ) { return $this; }
        // tecnical thing : we want to create the parrent page as a subpage acording to make it work like df setting->genaral page
        $admin_page = $this->pages[0];
        // adding additional subpage : ( main menu)
		$subpage = array(
			array(
				'parent_slug' => $admin_page['menu_slug'], 
				'page_title' => $admin_page['page_title'], 
				'menu_title' => ($title) ? $title : $admin_page['menu_title'], 
				'capability' => $admin_page['capability'], 
				'menu_slug' => $admin_page['menu_slug'], 
				'callback' => $admin_page['callback']
			)
		);

		$this->subPages = $subpage;

		return $this;
    }
    public function exicute()
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
        // if their is no sub pages the loop will not be exicuted so chil
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