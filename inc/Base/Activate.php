<?php 

namespace Inc\Base ;


class Activate
{
    public function activate ( )
    {
        # code...
        flush_rewrite_rules(  ) ;
    }
}