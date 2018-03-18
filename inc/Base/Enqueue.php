<?php 

namespace Inc\Base ;

use Inc\Base\BaseController;

class Enqueue extends BaseController 
{
    public function register()
    {
        # code...
        add_action (  'admin_enqueue_scripts',  array( $this , 'enqueue') );
    }
    public function enqueue( )
    {
        # Css Files :
        wp_enqueue_style    (   'mYstyle', $this->plug_info()['URL'] . '/lib/mYstyle.min.css' );
        # js files :
        wp_enqueue_script (   'mYscript',  $this->plug_info()['URL'] . '/bin/mYscript.min.js', array( 'jquery' ), '' , true );
    }
}
