<?php if( ! class_exists( 'user_control' ) or wp_die ( 'error found.' ) ) 
{    
    class user_control
    {

        public static $datas = array( 'data', 'ID', 'caps', 'cap_key', 'allcaps' );
        public static $users = true;

        public static function get_all_user () 
        {
            return get_editable_roles();   
        } 
        public static function get_all ()
        {
            return wp_get_current_user();    
        }
        public static function get_id ()
        {
            return wp_get_current_user()->data->ID;
        }
        public static function get_user_login ()
        {
            return wp_get_current_user()->data->user_login;
        }
        public static function get_user_email ()
        {
            return wp_get_current_user()->data->user_email;
        }
        public static function get_role ()
        {
            return wp_get_current_user()->roles[0];
        }
        public static function get_userdata_value ( $keys=null ) 
        {
            $data = self::get_all();

            if( in_array( $keys, self::$datas ) ) : $results = $data->$keys; else :
                $results = null;
            endif;

            return $results;
        }
        public static function get_all_role() 
        {
            $roles = get_editable_roles();
            
            foreach( $roles as $key => $value ) :
                $results[] = trim( $key );
            endforeach;

            return $results;
        }
        public static function is_active ( $status=true ) 
        {
            if( $status != false ) 
            {
                return array ( 
                    'administrator' 
                );       
            } else {
                return array ();   
            }
        }
        public static function get_userdata_objects () 
        {
            return get_userdata( get_current_user_id() );
        }

        // END
    }
}