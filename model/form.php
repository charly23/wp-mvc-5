<?php if( ! class_exists( 'form' ) or wp_die ( 'error found.' ) ) 
{    
    class form extends input
    {
          public static $slug = 'wp_mvc';

          var $html = null;

                
          public function __construct() 
          {
               parent::__construct();
               
               new page_rounter( true );
               new html_var( true );
          }

          public static function page_title () 
          {
              $userdata = get_userdata( get_current_user_id() );
              $user_role = user_control::get_role();

              $page = self::get_is_object_element( 'page' );
              $name = wp_mvc_config::plugin_name(); 

              $label['wp_mvc'] = array( 
                  'title' => __( $name  . ' : Manager - ' . ucfirst ( $userdata->user_login ) . " ({$user_role})", 'wp-mvc' ) 
              );

              $ids = self::get_is_object_element( 'edit' );
              $add_new_titled = intval( $ids ) ? __( 'Edit Form', 'title' ) : __( 'Add New Form', 'title' );

              $label['add_new_wp_mvc'] = array( 
                  'title' => __( $name . ' : ' . $add_new_titled, 'wp-mvc' ) 
              );

              $label['setting_wp_mvc'] = array( 
                  'title' => __( $name . ' : Setting', 'wp-mvc' ) 
              );

              $label['help_wp_mvc'] = array( 
                  'title' => __( $name . ' : Help?', 'wp-mvc' ) 
              );

              return $label[$page]['title'];
          }

          public static function page_head () 
          {
              $userdata = get_userdata( get_current_user_id() );
              $user_role = user_control::get_role();
          }

          public static function page_body ( $page_class=null, $top=null, $inner=null, $bottom=null ) 
          {
              $html = null;

              if( $top != false AND ! is_null( $top ) )  
              {
                $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_inner-top ' . __( self::$slug ) . '_' . __( $page_class ) . '_inner-top' ) );
                $html .= __( $top, 'html' );
                $html .= html_var::_divend(); 
              }

              if( $inner != false AND ! is_null( $inner ) )  
              {
                $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_inner-center ' . __( self::$slug ) . '_' . __( $page_class ) . '_inner-center' ) );
                $html .= __( $inner, 'html' );
                $html .= html_var::_divend();  
              }
              
              if( $bottom != false AND ! is_null( $bottom ) ) 
              {
                $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_inner-bottom ' . __( self::$slug ) . '_' . __( $page_class ) . '_inner-bottom' ) );
                $html .= __( $bottom, 'html' );
                $html .= html_var::_divend(); 
              }

              $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_inner-footer ' . __( self::$slug ) . '_' . __( $page_class ) . '_inner-footer' ) );
              $html .= static::page_foot();
              $html .= html_var::_divend(); 

              return $html; 
          }

          public static function page_option_field ( $page_class=null ) 
          {
              $html = null;
 
              $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_top-action-option ' . __( self::$slug ) . '_' . __( $page_class ) . '_top-action-option' ) );

              $html .= html_var::_div( array( 'class' => 'option-btn') );
              $html .= __( 'Option', 'html' );
              $html .= html_var::_divend();

              $html .= html_var::_div( array( 'class' => 'option-switch') );
              $html .= __( 'Option Inner', 'html' );
              $html .= html_var::_divend();

              $html .= html_var::_divend(); 

              $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_top-field-option ' . __( self::$slug ) . '_' . __( $page_class ) . '_top-field-option' ) );
              $html .= __( 'Option', 'html' );
              $html .= html_var::_divend(); 
              
              return $html;
          }

          public static function page_foot () 
          {
              $html = null;

              $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_footer ' ) );
              $html .= __( 'Wordpress Model View Controller (WP-MVC) &nbsp;', 'copy' );
              $html .= html_var::_a( array( 'class' => __( self::$slug ) . '_webiste-link', 'href' => 'https://charlycapillanes.wordpress.com/', 'target' => '_blank' ) );
              $html .= __( 'charlycapillanes.com', 'website' );
              $html .= html_var::_aend();
              $html .= html_var::_divend(); 

              return $html;
          }

          /**
           * form : manager
           * inner, html, style, ui
           * manager function handlers
          **/

          public static function manager_inner () 
          { 
              $html = null;

              $top = __( 'Top', 'html' );
              $inner = __( 'Middle', 'html' );
              $bottom = __( 'Bottom', 'html' );

              $html .= self::page_body( 'manager', $top, $inner, $bottom );

              return $html;
          }

          /**
           * form : add new
           * inner, html, style, ui
           * add new function handlers
          **/

          public static function add_new_inner () 
          { 
              $html = null;

              $top = __( 'Top', 'html' );
              $inner = __( 'Middle', 'html' );
              $bottom = __( 'Bottom', 'html' );

              $html .= self::page_body( 'add_new', $top, $inner, $bottom );

              return $html;
          }

          /**
           * form : setting   
           * inner, html, style, ui
           * setting function handlers
          **/

          public static function setting_inner () 
          { 
              $html = null;

              $top = __( 'Top', 'html' );
              $inner = __( 'Middle', 'html' );
              $bottom = __( 'Bottom', 'html' );

              $html .= self::page_body( 'setting', $top, $inner, $bottom );

              return $html;
          }

          /**
           * form : help
           * inner, html, style, ui
           * help function handlers
          **/

          public static function help_inner () 
          { 
              $html = null;

              $top = __( 'Top', 'html' );
              $inner = __( 'Middle', 'html' );
              $bottom = __( 'Bottom', 'html' );

              $html .= self::page_body( 'help', $top, $inner, $bottom );

              return $html;
          }

          // END
    }
}
?>
