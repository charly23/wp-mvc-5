<?php if( ! class_exists('register') or wp_die ( 'error found' ) ) 
{
    
     class register 
     {
          
         public static function activation_hook ( $file=null, $callback=null ) 
         {
             if( ! is_null( $file ) AND ! is_null( $callback ) ) : register_activation_hook( $file, $callback ); endif;
         } 
         
         public static function deactivation_hook ( $file=null, $callback=null ) 
         {
             if( ! is_null( $file ) AND ! is_null( $callback ) ): register_deactivation_hook( $file, $callback ); endif;
         }

         public static function uninstall_hook( $file=null, $callback=null )
         {
             if( ! is_null( $file ) AND ! is_null( $callback ) ): register_uninstall_hook( $file, $callback ); endif;
         }
         
         public static function hook( $name=null, $file=null, $callback=null )
         {
            
            $name_array = array( "activation", "deactivation", "uninstall" ); 
            
            if( in_array( $name, $name_array ) ) 
            {
                
                if( ! is_null( $name ) AND ! is_null( $file ) AND ! is_null( $callback ) )
                {
                    switch( $name ):
                        
                        case "activation" :
                        register::activation_hook($file, $callback);
                        break;
                        
                        case "deactivation" :
                        register::deactivation_hook($file, $callback);
                        break; 
                        
                        case "uninstall" :
                        register::uninstall_hook($file, $callback);
                        break;
                       
                    endswitch;
                }
            }
         }

         // END
          
     }
     
}
?>