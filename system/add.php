<?php if( ! class_exists('add' ) or wp_die ( 'error found.' ) ) 
{    
     class add 
     {
          
          public static $plugin_load = 'plugins_loaded';
          public static $init_load   = array( 'init', 'admin_init', 'admin_enqueue_scripts' );
          public static $option_load = array( 'edit_options', 'manage_options' );
          
          /** 
           * admin add page
           * @param ( string ) 
          **/
           
          public static function action_page ( $function_name=null ) 
          {
               if( !is_null( $function_name ) ) add_action( 'admin_menu', $function_name );
          }
          
          /** 
           * admin submit action
           * @param ( string ) 
          **/
          
          public static function action_submit ( $var=1, $function_name=null ) 
          {
               $init = self::$init_load;
               if( !is_null( $function_name ) ) add_action( $init[$var], $function_name );
          }

          public static function action_ajax ( $function_name=null ) 
          {
              if( is_array( $function_name ) ) : if( count( $function_name ) >=1 ) 
                   
                        $function_name_ajax_callback = !is_null( $function_name[1] ) ? $function_name[1] : $function_name;
                        
                        if( !is_null( $function_name ) ) 
                        {
                            add_action( 'wp_ajax_'.$function_name_ajax_callback, $function_name );
                            add_action( 'wp_ajax_nopriv_'.$function_name_ajax_callback, $function_name );
                        }
                endif;
          }
          
          // nonce values
          
          public static function ajax_nonce ( $nonce_name=null ) 
          {      
                $is_nonce = is_string( $nonce_name ) ? trim( $nonce_name ) : null;
                if( !is_null( $is_nonce ) ) return wp_create_nonce( $is_nonce );   
          }
          
          
          public static function action_loaded($function_name=null)
          {
              $loaded = self::$plugin_load;
              
              if( is_array($function_name)): 
                  count($function_name)>=1 ? add_action( $loaded, $function_name ) : null; 
              else: 
                  add_action( $loaded, $function_name ); 
              endif;
          }
          
          public static function action( $var=1, $function_name=null)
          {
                global $wpdb;  
                $init = self::$init_load;
                if( !is_null($function_name)) add_action( $init[$var], $function_name);
          }
          
          public static function remove($action_name=null,$class_filter=array())
          {
                if( !is_null($action_name)){
                    
                    $class_callback = is_array($class_filter) ? $class_filter : null;
                    
                    if( !is_null($class_callback)){
                         $is_array = true;
                    } else {
                         $is_array = false;
                    }
                    
                    if( count($class_callback)>=1){
                        $is_count = true;
                        $is_callback = $class_callback;
                    } else {
                        $is_count = false;
                        $is_callback = null;
                    }
                    
                    if( $is_array == true AND $is_count == true ) remove_action( $action_name, $class_callback );
                }
          }
          
          public static function menu_page($page=null, $menu=null, $cap=1, $slug=null, $name=null, $url='')
          {
                global $wpdb;
                
                $page_title = $page; // Manager title page
                $menu_title = $menu; // Menu title page
                $capability = self::$option_load;
                
                $menu_slug  = $slug;
                $function   = $name;
                $icon_url   = plugins_url( $url );
                $position   = null;
                
                if( !is_null($page_title) AND !is_null($menu_title) AND !is_null( $cap)
                        AND !is_null($menu_slug) AND !is_null($function) ){
                        
                        add_menu_page( __($page_title), __($menu_title), $capability[$cap], $menu_slug, $function, $icon_url, $position);
                }
          }
          
          public static function submenu_page( $page=null, $menu, $cap=1, $parent_slug=null, $slug=null, $name=null )
          {
                $page_title = $page; // Manager title page
                $menu_title = $menu; // Menu title page
                $capability = self::$option_load;
                
                $menu_parent_slug = $parent_slug;
                $menu_slug  = $slug;
                $function   = $name;
                
                if( !is_null($page_title) AND !is_null($menu_title) AND !is_null($cap)
                        AND !is_null($menu_slug) AND !is_null($function) ){
                        
                        add_submenu_page( $menu_parent_slug, $page_title, $menu_title, $capability[$cap], $menu_slug, $function );
                
                }
          }
          
          public static function load_menu_page($menu=array())
          {
              
              $menu_key_val = 0;
              
              if( is_array( $menu)){
                    foreach( $menu as $menu_key => $menu_var ){
                        
                         if( is_array($menu[$menu_key]) AND $menu_key == $menu_key_val ){
                             add::menu_page( $menu[$menu_key][0], $menu[$menu_key][1], $menu[$menu_key][2], $menu[$menu_key][3], $menu[$menu_key][4], $menu[$menu_key][5] );
                         
                         } else {
                            
                           if( is_array($menu[$menu_key]) ):
                               add::submenu_page( $menu[$menu_key][0], $menu[$menu_key][1], $menu[$menu_key][2], $menu[$menu_key][3], $menu[$menu_key][4], $menu[$menu_key][5] ); 
                           endif;
                         
                         }
                    }
              }
          }
          
          public static function remove_submenu($menu_name, $submenu_name) 
          {
              global $submenu;
              $menu = $submenu[$menu_name];
              
              if ( !is_array( $menu ) ) return;
              
                foreach( $menu as $submenu_key => $submenu_object ) {
                    
                    if( in_array($submenu_name, $submenu_object) ) {
                        
                        unset($submenu[$menu_name][$submenu_key]);
                        return;
                    }
                    
              }          
          } 
          
          // wp_enqueue_style( 'style-name', get_stylesheet_uri() );
          
          public static function style($is_admin=true, $name=null, $url=null)
          {
              
              if( !is_null($name) AND !is_null($url)){
                  
                  if( $is_admin == true ){
                      
                      if( is_admin()){
                        
                          wp_enqueue_style( $name, plugins_url( $url ) );
                      }
                  
                  }
                  
                  if( $is_admin == false ){
                      
                      if( !is_admin()){
                        
                          wp_enqueue_style( $name, plugins_url( $url ) );
                      }
                  
                  }
              }
          }
          
           // wp_enqueue_script( 'script-name', get_stylesheet_uri() );
           
          public static function script($is_admin=true, $name=null, $url=null)
          {

              // url exists
              if( !is_null($name) AND !is_null($url))
              {
                  
                  if( $is_admin == true ){
                      
                      if( is_admin()){
                        
                          wp_enqueue_script( $name, plugins_url( $url ) );
                      }
                  
                  }
                  
                  if( $is_admin == false ){
                      
                      if( !is_admin()){
                          wp_enqueue_script( $name, plugins_url( $url ) );
                      }
                
                  }
              }
              
              // url not exists
              if( !is_null($name) AND is_null($url) OR empty($url) OR $url == false )
              {
                
                  if( $is_admin == true ){
                      
                      if( is_admin()){
                        
                          wp_enqueue_script( $name );
                      }
                  
                  }
                  
                  if( $is_admin == false ){
                      
                      if( !is_admin()){
                        
                          wp_enqueue_script( $name );
                      }
                  
                  }
              }
          }
          
          /** shortcode action functions **/
          
          public static function shortcode($shortcode_name=null, $function_name=null)
          {
              
              if( !is_null($shortcode_name)){
                   $shortcode_call = is_string( $shortcode_name) ? $shortcode_name : null;  
              } else {
                   $shortcode_call = null;
              }
              
              if( !is_null($function_name)){
                   if( is_array($function_name)){
                       
                       $function_call = count($function_name)>=1 ? $function_name : null;
                       
                   } else {
                       
                       $function_call = is_string( $function_name) ? $function_name : null; 
                   }
              } else {
                   
                   $function_call = null;
              }
              
              if( !is_null($shortcode_call) AND !is_null($function_call) ) add_shortcode( $shortcode_call, $function_call); 
          }
          
          public static function remove_shortcode($is_string=null)
          {
              
              if( !is_null($is_string)){
                
                  return is_string($is_string) ? remove_shortcode($is_string) : false;   
              
              }
          }
          
          public static function do_shortcode($is_string=null)
          {
              
              if( !is_null($is_string)){
                    
                       return is_string($is_string) ? do_shortcode($is_string) : false;   
              
              }
          }
          
          /** filter action functions **/
          
          public static function filter($tag=null, $function_to_add=null){
            
              if(!empty($tag) AND !empty($function_to_add)) 
              
                 if(!is_null($tag) AND !is_null($function_to_add)) add_filter($tag, $function_to_add);
          }
          
          public function apply_filter($tag=null, $value=null, $param=null, $otherparam=null){
              
              if( !is_null($tag) AND !is_null($value) AND is_null($param) AND is_null( $param )){ 
                   
                   return apply_filters( $tag, $value );
              
              }
              
              if( !is_null($tag) AND !is_null($value) AND !is_null($param) AND is_null( $otherparam )){ 
              
                   return apply_filters( $tag, $value, $param );
                   
              }   
              
               if( !is_null($tag) AND !is_null($value) AND !is_null($param) AND !is_null( $otherparam )){ 
              
                   return apply_filters( $tag, $value, $param, $otherparam );
                   
              }   
              
          }
          
          /** filter action functions **/
          
          public static function wp_script($name=null, $is_admin=null){
              
              if( !is_null($name) AND !is_null($is_admin)){
                  
                  if( $is_admin == true ){
                      
                      if( is_admin()){
                          wp_enqueue_script( $name );
                      }
                  
                  }
                  
                  if( $is_admin == false ){
                      
                      if( !is_admin()){
                           wp_enqueue_script( $name );
                      }
                  
                  }
              } else {
                  
                  wp_enqueue_script( $name );
                  
              }
          }
          
          
          /**
           * @param name (string)
           * @param url (string)
           * @param admin filter status display - true or false(keyword)
           */
          
          public static function wp_style( $name=null, $url=null, $is_admin=null )
          {
              
              if( !is_null($name) AND !is_null($is_admin)){
                  
                  if( $is_admin == true ){
                      
                      if( is_admin()){
                          wp_enqueue_style( $name, $url );
                      }
                  
                  }
                  
                  if( $is_admin == false ){
                      
                      if( !is_admin()){
                           wp_enqueue_style( $name, $url );
                      }
                  
                  }
              } else {
                  
                  wp_enqueue_style( $name, $url);
                  
              }
          }
          
          /**
           * @param true or false(keyword)
           * media loader handler function
           */
          
          public static function wp_media( $attr=true ) 
          {     
              if( $attr == true ) {
                
                  if(function_exists('wp_enqueue_media')) wp_enqueue_media();
              }
              
          }

          public function media_enqueue_scripts () {
              self::wp_media( true ); 
          }
          
          /**
           * @param true or false(keyword)
           * @param url (string)
           * @param script slug name (string)
           * @param multiple data ( array )
           */
          
          public function localize_script ( $is_admin=true, $handle=null, $name=null, $data=array() )
          {
              if( $is_admin == true ) 
              {
                  if( is_admin() ) 
                  {
                      if( !is_null( $handle ) AND !is_null( $name ) ):
                          if( !empty( $data ) AND !is_null( $data ) AND is_array( $data ) ):
                              wp_localize_script( $handle, $name, $data );
                          endif;
                      endif;
                  }
                  
              } else if( $is_admin == false ) {
                  
                  if( !is_admin() ) 
                  {
                      if( !is_null( $handle ) AND !is_null($name) ):
                          if( !empty( $data ) AND !is_null( $data ) AND is_array( $data ) ):
                              wp_localize_script( $handle, $name, $data );
                          endif;
                      endif;
                  }
                  
              } else {
                  
                  if( is_admin() ) 
                  { 
                      if( !is_null( $handle ) AND !is_null( $name ) ):
                          if( !empty( $data ) AND !is_null( $data ) AND is_array( $data ) ):
                              wp_localize_script( $handle, $name, $data );
                          endif;
                      endif;
                  }
                  
              }
          }
          
          /**
           * WP_Query
           * @param array( array () )
           */
          
          public static function WP_Querys( $arry=array() ) 
          {
              $query = new WP_Query( $arry ); 
              if( is_array( $arry) ) 
              {
                  $is_ojbect = ( ( object )$query );
                  
                  if( is_object( $is_ojbect ) ) 
                  {
                      return $is_ojbect; 
                  }
                
              }
          }
          
          /**
           * WP register widget
           * @param array( array () )
           */
          
          public static function widget_init ( $arrays=array() ) 
          {
              if( is_array( $arrays ) ) 
              {
                  add_action( 'widgets_init', $arrays );       
              }  
          }
          
          public static function get_sidebar ( $names=null ) 
          {
              get_sidebar( $names );      
          }

          // END
          
     }
}
?>