<?php 
/*| @package wt-plug | Activate
/*|||||||||| date : 19-3-2018 ||||||
    Aurthor : avijit sarkar
    Version : 1.0.0
    UseCases: Run on Activate plugin
    Used on : only this page 
    comment : n/a
*/
namespace Inc\Base ;
class Activate
{
    public function activate ( )
    {
        flush_rewrite_rules(  ) ;
    }
}