<?php
/*| @package inform | LinkSettings */
namespace modules\Settings;
/*| extend and uses |*/
use modules\Base\Config ;
/*|||||||||| date : 19-3-2018 ||||||
    Author : avijit sarkar
    Version : 1.0.0
    UseCases: Listing all Callbacks
    Used on : only this page 
    comment : n/a
*/
class Callbacks extends Config
{
    public function Dashboard()
    {
        require_once( $this->info['PATH'] . '/templates/WelcomePage.php');
    }
    public function Trash()
    {
        require_once( $this->info['PATH'] . '/templates/ShowTrash.php');
    }
}