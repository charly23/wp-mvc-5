<?php

if( ! class_exists( 'router' ) or wp_die ( 'page rounter url' ) ) 
    {
        class router 
        {
            public static $wp_admin_page_querys = 'admin.php?page=';
            public static $wp_page_url = 'admin.php?page=wp-mvc';
            public static $wp_base_url = 'admin.php?page=wp-mvc';
            public static $wp_page_table = 'wp-mvc';

            public static $limit = 10;
            public static $offset = -1;

            public static $wp_separate = '&';

            public static $wp_users = 'user-edit.php?user_id=';
            public static $wp_users_actions = 'users.php?action=delete&user=';
        }
    }

?>

<?php if( ! class_exists( 'page_rounter' ) or wp_die ( 'page rounter url' ) ) 
{
    class page_rounter extends router
    {
        
        public static function url ( $path=null, $querys=array() )  
        {
            $results = null;
            $url = $path;

            if( !empty( $querys) AND is_array( $querys) ) 
            {
                $i = 0;
                foreach( $querys as $keys => $elements )  
                {
                    $is_separate = $i++ !=0 ? self::$wp_separate : null;
                    $results .=  $is_separate . "{$keys}={$elements}";            
                }

            }

            if( $querys !=false ) {
                $results_values = self::$wp_separate . __( $results, 'wp-router' );    
            } else  {
                $results_values = null;    
            }
            
            return self::$wp_admin_page_querys.__( $url, 'wp-router' ). __( $results_values, 'wp-router' ); 
        }

        public static function admin_user_url ( $ids=0 ) 
        {
            $url = admin_url();
            return $url . __( self::$wp_users, 'wp-router' ) . intval( $ids );
        }

        public static function admin_user_url_actions ( $ids=0 ) 
        {
            $url = admin_url();
            // $nonce_url = wp_nonce_url();
            return $url . __( self::$wp_users_actions, 'wp-router' ) . intval( $ids );
        }

    }

    new page_rounter(true);
}

?>