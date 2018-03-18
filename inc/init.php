<?php


 namespace Inc ;

 final class Init
 {
    public static function get_services()
    {
        return [

            Pages\Admin :: class,
            Base\LinkSettings :: class ,
            Base\Enqueue :: class ,
        ];
    }
    public static function register_services()
    {
        foreach ( self::get_services () as $class ){
            $service = self::_inSantiate( $class ) ;
            if(method_exists ( $service , 'register') ){
                $service->register();
            }
        }
    }
    private static function _inSantiate( $class ){
        return new $class() ;
    }
 }