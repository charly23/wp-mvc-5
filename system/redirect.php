<?php if( ! class_exists( 'redirect' ) or wp_die ( 'error found.' ) ) 
{
     class redirect 
     {
            public static $status = 302;

            public static function filter ( $url=null ) 
            {
                if ( wp_redirect ( $url, self::$status ) ) {
                    exit;
                }   
            } 

            public static function safe_filter ( $url=null ) 
            {
                if ( wp_safe_redirect ( $url, self::$status ) ) {
                    exit;
                }   
            }   

            // END      
     }

}

?>