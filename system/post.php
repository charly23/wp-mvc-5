<?php if( ! class_exists( 'post_objects' ) or wp_die ( 'error found.' ) ){
      
      class post_objects 
      {
           
           public static function WP_Querys ( $arry=array()){
                 
                 if( is_array( $arry ) ){
                     
                     $query = new WP_Query( $arry );
                     
                     if( is_object( $query ) ){
                         
                         $return = true;
                     } else {
                        
                         $return = false;
                        
                     }
                     
                 }
                 
                 return $return;
            
           }

           // END
           
      }
         
}
?>