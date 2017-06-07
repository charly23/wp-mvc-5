<?php if( ! class_exists( 'direct' ) or wp_die ( 'error found.' ) ) 
{
    
     class direct 
     {
        
         public static function url ( $url=null, $status=null )
         {
             if( ! is_null( $url ) ) :
                 $status_array = array( 301, 302, 404 );
                 if( !is_null( $status ) ) 
                 {
                     if( in_array( $status, $status_array ) ){
                         wp_redirect( $url, $status ); 
                         exit();
                     } 
                 }
              endif; 
         }
         
         public static function location ( $location, $status = 302 ) 
         {
            	global $is_IIS;
            
            	$location = apply_filters( 'wp_redirect', $location, $status );
            	$status = apply_filters( 'wp_redirect_status', $status, $location );
            
            	if ( ! $location ) return false;
            
            	$location = wp_sanitize_redirect($location);
            
            	if ( !$is_IIS && php_sapi_name() != 'cgi-fcgi' ) status_header($status);
            
            	header("Location: $location", true, $status);
            
            	return true;
         }

         // END
     
     }
     
}







?>