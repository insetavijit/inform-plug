<?php 
/*| @package wt-plug || Enqueue |*/
namespace modules\Base ;
/*| extends and uses |*/
use modules\Base\BaseController;
/*|||||||||| date : 19-3-2018 ||||||
    Author : avijit sarkar
    Version : 1.0.0
    UseCases: enqueue css and js
    Used on : only this page 
    comment : n/a
*/

class Enqueue extends BaseController 
{
    public function register()
    {
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
