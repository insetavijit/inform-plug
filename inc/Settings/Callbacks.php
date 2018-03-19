<?php

namespace Inc\Settings;

use Inc\Base\BaseController ;

class Callbacks extends BaseController
{
    public function Dashbord()
    {
        require_once( $this->plug_info()['PATH'] . '/templates/WellcomePage.php');
    }
    public function Trash()
    {
        require_once( $this->plug_info()['PATH'] . '/templates/ShowTrash.php');
    }
}