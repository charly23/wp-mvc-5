<?php if( ! class_exists( 'url' ) or wp_die ( 'error found.' ) ) 
    {
        class url 
        {
            public static function dir () 
            {
                return plugins_url( '', dirname( __FILE__ ) ) ;    
            }
            public static function dir_assets ( $url='assets/' ) 
            {
                return plugins_url( "{$url}", dirname( __FILE__ ) ) ;    
            }
            public static function dir_css ( $url='css/' ) 
            {
                return self::dir_assets( "{$url}" );    
            }
            public static function dir_image ( $url='images/' ) 
            {
                return self::dir_assets( "{$url}" );    
            }
            public static function dir_js ( $url='js/' ) 
            {
                return self::dir_assets( "{$url}" );    
            }

            // END
        }
    } 
?>