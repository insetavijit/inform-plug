<?php

/*| @package inform | Init */
 namespace modules ;
/*|||||||||| date : 19-3-2018 ||||||
    Author : avijit sarkar
    Version : 1.0.0
    UseCases: main file to execute all calls ( main entry point to our plugins )
    Used on : only this page 
    comment : n/a
*/
 final class Init
 {
    public static function get_services()
    {   
        # 1. listening  all the classes to use
        return [
            Pages\Admin :: class,
            Base\Enqueue :: class ,
            Settings\LinkSettings :: class
        ];
    }
    public static function register_services()
    {   # 2. calling all of the queue classes instance
        foreach ( self::get_services () as $class ){
            $service = self::inStantiate( $class ) ;
            if(method_exists ( $service , 'register') ){
                $service->register();
            }
        }
    }
    private static function inStantiate( $class ){
        # 3. calling it
        return new $class() ;
    }
 }