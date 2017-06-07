<?php if( ! class_exists( 'users' ) or wp_die ( 'error found.' ) ) 
{
     class users extends db
     {
          var $table = null;
          
          public static function querys () 
          {
               global $wpdb;
               $results = $wpdb->get_results( "SELECT * FROM {$wpdb->users} ", OBJECT );   
               if( isset( $results ) and is_array( $results ) ) return $results;
          }
          
          // END
     }

}  