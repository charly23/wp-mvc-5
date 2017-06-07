<?php if( ! class_exists( 'action' ) or wp_die ( 'error found.' ) ) 
{
    
     class action extends db_action
     {
          
          public static $tbls = array( 'wp-mvc'=>'wp_mvc' );

          public function __construct () 
          {
                parent::__construct();
          }

          public static function admin_data () 
          {
                $data = input::post_is_object();
          }

          public static function front_data () 
          {
                $data = input::post_is_object();
          }
          
          // END
     }
}
?>