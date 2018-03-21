<?php 
/*| @package wt-plug | Deactivate */
namespace modules\Base ;
/*|||||||||| date : 19-3-2018 ||||||
    Author : avijit sarkar
    Version : 1.0.0
    UseCases: Run on Deactivate plugin
    Used on : only this page 
    comment : n/a
*/
class Deactivate
{
    public function deactivate ( )
    {
        flush_rewrite_rules(  ) ;
    }
}