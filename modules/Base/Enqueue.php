<?php 
/*| @package inform || Enqueue |*/
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

class Enqueue extends Config 
{
    public function register()
    {
        add_action (  'admin_enqueue_scripts',  array( $this , 'enqueue') );
    }
    public function enqueue( )
    {
        # Css Files :
        wp_enqueue_style    (   'bootstrap', $this->info['URL'] . '/lib/bootstrap.min.css' );
        wp_enqueue_style    (   'informStyle', $this->info['URL'] . '/lib/informStyle.min.css' );
        # js files :
        wp_enqueue_script (   'bootstrap',  $this->info['URL'] . '/lib/bootstrap.min.js', array( 'jquery' ), '' , true );
        wp_enqueue_script (   'informScript',  $this->info['URL'] . '/lib/informScript.min.js', array( 'jquery' ), '' , true );
    }
}
