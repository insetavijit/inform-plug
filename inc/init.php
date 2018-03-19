<?php

/*| @package wt-plug | Init */
 namespace Inc ;
/*|||||||||| date : 19-3-2018 ||||||
    Aurthor : avijit sarkar
    Version : 1.0.0
    UseCases: main file to exicute all calls ( main entry point to our plugins )
    Used on : only this page 
    comment : n/a
*/
 final class Init
 {
    public static function get_services()
    {   
        # 1. lising all the classes to use
        return [
            Pages\Admin :: class,
            Base\LinkSettings :: class ,
            Base\Enqueue :: class ,
        ];
    }
    public static function register_services()
    {   # 2. calling all of the queue classes instance
        foreach ( self::get_services () as $class ){
            $service = self::_inSantiate( $class ) ;
            if(method_exists ( $service , 'register') ){
                $service->register();
            }
        }
    }
    private static function _inSantiate( $class ){
        # 3. calling it
        return new $class() ;
    }
 }