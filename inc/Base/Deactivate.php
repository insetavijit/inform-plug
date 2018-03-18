<?php 

namespace Inc\Base ;


class Deactivate
{
    public function deactivate ( )
    {
        # code...
        flush_rewrite_rules(  ) ;
    }
}