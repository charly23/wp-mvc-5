<?php if( ! class_exists( 'wp_mvc_page' ) or wp_die ( 'error found.' ) ) 
{    
    class wp_mvc_page extends wp_mvc_config
    {

        private static $instance; 
        
        public static function getInstance()  
        { 
              if( !self::$instance ) self::$instance = new self(); 
              return self::$instance;
        } 

        /**
          * user roles access entry cntrl
          * user role filter  
        **/

        public static function user_roles_access_entry ( $status=false ) 
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
        
        /**
         * load construct
         * auto file call
         * wp structure hook
         * wpdb querys 
         * - etc   
        **/

        public function admin_page () 
        {
            global $wp_roles;
            
            $this->userdata = get_userdata( get_current_user_id() );
            
            if( in_array( $this->userdata->roles[0], self::user_roles_access_entry( true ) ) ) {
                $icon = self::$icon;
            } else {
                $icon = self::$icon_2;
            }

            $menu[] = array( self::$name, self::$name, 1, self::$plugin_slug, array( $this,  self::$plugin_slug.'_function' ), $icon ); 
            
            if( in_array( $this->userdata->roles[0], self::user_roles_access_entry( true ) ) ) 
            { 
                $menu[] = array( 'Add New', 'Add New', 1, self::$plugin_slug, 'add_new_'.self::$plugin_slug, array( $this, 'add_new_'.self::$plugin_slug.'_function' ) );
                $menu[] = array( 'Setting', 'Setting', 1, self::$plugin_slug, 'setting_'.self::$plugin_slug, array( $this, 'setting_'.self::$plugin_slug.'_function' ) );
                $menu[] = array( 'Help?', 'Help?', 1, self::$plugin_slug, 'help_'.self::$plugin_slug, array( $this, 'help_'.self::$plugin_slug.'_function' ) );
            }

            if( is_array( $menu ) ) add::load_menu_page( $menu );
        }
        
        public function update_db_check () 
        {
            global $db_version;
            if ( get_site_option( 'db_version' ) != $db_version ) self::install();
        }
        
        /** 
            view structure ( include )
            @function callback
            @function page 
        **/
        
        public function wp_mvc_function () 
        { 
            load::view( 'manage' );
        }

        public function add_new_wp_mvc_function () 
        { 
            load::view( 'add-new' );
        }

        public function setting_wp_mvc_function () 
        { 
            load::view( 'setting' );
        }
                
        public function help_wp_mvc_function() 
        {
            load::view( 'help' );
        }
        
        /** 
            shortcode structure ( include )
            @function callback
            @function page  
        **/
        
        public function wp_gcf_shortcode_handler ( $atts ) 
        {
            $atts = shortcode_atts( array(
                'id' => 0,
                'name' => true,
            ), $atts, 'wp_mvc' );

            load::view( 'shortcode/shortcode' );
            return shortcode::front_page( $atts );
        }
                
        /** 
            ajaxs structures ( load-file ) 
            @function callback
            @function page 
        **/

        // backend : ajax handler

        public function ajaxs_admin_data () 
        {
            action::admin_data(); 
            die();
        }

        public function ajaxs_front_data () 
        {
            action::front_data(); 
            die();
        }

        // END
    }

}  

new wp_mvc_page( true );
?>