<?php
/*| @package wt-plug | LinkSettings */
namespace Inc\Settings;
/*| extend and uses |*/
use Inc\Base\BaseController ;
/*|||||||||| date : 19-3-2018 ||||||
    Author : avijit sarkar
    Version : 1.0.0
    UseCases: Listing all Callbacks
    Used on : only this page 
    comment : n/a
*/
class Callbacks extends BaseController
{
    public function Dashboard()
    {
        require_once( $this->plug_info()['PATH'] . '/templates/WelcomePage.php');
    }
    public function Trash()
    {
        require_once( $this->plug_info()['PATH'] . '/templates/ShowTrash.php');
    }
}