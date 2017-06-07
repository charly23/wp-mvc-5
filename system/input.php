<?php if( ! class_exists( 'input' ) or wp_die ( 'error found.' ) ) 
{
     class input 
     {
          
          public static $length = array( 100, 200, 500, 1000, 2000, 5000, 10 );
          
          // form open

          public static function form_open ( $method=array() ) 
          {
             $html = null;
             $method_val = null;
             
              if( is_array( $method ) and count( $method ) >=1  ) 
              {
                  foreach ( $method as $method_key => $method_var ) : 
                       if( !empty( $method[$method_key] ) ) $method_val .= "{$method_key}='{$method[$method_key]}' "; 
                  endforeach;
                  
                  $html .= "<form {$method_val}>";
              }

              return $html;
          }  
          
          // form close

          public static function form_close ( $is_action=true ) 
          {
              if( $is_action == true ) return "</form>"; 
          }
          
          /** 
           * input html field
           * object array function
           * input::text( array() ) 
          **/
          
          // input(text)
          
          public static function text ( $input=array() ) 
          {
              $html = null; 
              $input_res = null; 
              
              $end_length = end( self::$length );
              
              if( is_array( $input ) and count( $input) >=1 )
              {
                  foreach( $input as $input_key => $input_var ) :
                      $key_value = $input[$input_key]; 
                      if( !empty($input[$input_key] ) ) $input_res .= "{$input_key}='{$key_value}' ";
                  endforeach;

                  $html .= "<input type='text' {$input_res} />";
              }
              
              return $html;
          }
          
          // input(hidden)

          public static function hidden ( $input=array() )
          {
              $html = null; 
              $input_res = null; 
              
              $end_length = end( self::$length );

              if( is_array( $input ) and count( $input) >=1 )
              {
                  foreach( $input as $input_key => $input_var ) :
                      $key_value = $input[$input_key]; 
                      if( !empty($input[$input_key] ) ) $input_res .= "{$input_key}='{$key_value}' ";
                  endforeach;

                  $html .= "<input type='hidden' {$input_res} />";
              }
              
              return $html;
          }
          
          // input(submit)

          public static function submit ( $input=array(), $class=true )
          {
              $html        = null;
              $input_res   = null;
              $input_class = null;

              $is_class = $class == true ? 'button' : 'button button-primary';

              if( is_array( $input ) and count( $input ) >=1 )
              {
                  foreach( $input as $input_key => $input_var ) :
                       if( !empty($input[$input_key]) ) : 
                           if( $input_key == "class" ) :
                               $input_class .= "{$input_key}='{$input[$input_key]} {$is_class}' ";
                           elseif( $input_key != "class" ) :
                               $input_res .= "{$input_key}='{$input[$input_key]}' ";
                           endif;
                       endif;
                  endforeach;

                  $html .= "<input type='submit' {$input_res} {$input_class} />";
              }
              
              return $html;
          }
          
          public static function custom_submit ( $input=array() )
          {
              $html        = null;
              $input_class = null;
              $input_res   = null;
              
              if( is_array( $input ) and count( $input ) >=1 ) 
              {
                  foreach( $input as $input_key => $input_var ) :
                       if( !empty($input[$input_key]) ) : 
                           if( $input_key == "class" ) :
                               $input_class .= "{$input_key}='{$input[$input_key]} button button-primary' ";
                           elseif( $input_key != "class" ) :
                               $input_res .= "{$input_key}='{$input[$input_key]}' ";
                           endif;
                       endif;
                  endforeach;

                  $html .= "<input type='submit' {$input_res} {$input_class} />";
              }
              
              return $html;
          }    
          
          // input(password)

          public static function password ( $input=array() )
          {
              $html = null;
              
              if( is_array($input)){
                  if( count( $input)>=1){
                      
                      foreach($input as $input_key => $input_var ){
                           if( !empty($input[$input_key])) $input_res .= $input_key."='".__($input[$input_key]) . "' ";
                      }

                      $html .= "<input type='password' ".__( $input_res )." />";
                  }
              }
              
              return $html;
          }
          
          // input(checkbox)

          public static function checkbox ( $input=array(), $is_checked=null )
          {
              $html = null;
              $input_res = null;

              if( is_array($input)) { if( count( $input)>=1 ) 
              {
                      
                      foreach($input as $input_key => $input_var ) :
                           if( !empty($input[$input_key])) $input_res .= " {$input_key}='{$input[$input_key]}' ";
                      endforeach;

                      if( ! is_null( $is_checked ) ) {
                        $is_checked_value = ' checked="checked" ';
                      } else {
                        $is_checked_value = null; 
                      }

                      $html .= "<input type='checkbox' {$input_res} {$is_checked_value} />";
                  }
              }
              
              return $html;
          }
          
          // input(radio)

          public static function radio ( $input=array() ) 
          {
              $html = null;
              $input_res = null;
              
              if( is_array( $input ) and count( $input ) >=1 ) 
              {
                      foreach( $input as $input_key => $input_var ) : 
                           if( !empty( $input[$input_key] ) ) $input_res .= " {$input_key}='{$input[$input_key]}' ";
                      endforeach;

                      $html .= "<input type='radio' {$input_res} />";
              }
              
              return $html;
          }

          // input(select)

          public static function select ( $elem=array(), $array=array(), $filter=null, $defaults=null ) 
          {
              $html  = null;
              $label = null;
              $count = 0;
              $numz  = 0;
               
              if( ! empty ( $array ) 
                AND ! empty ( $elem ) )
              {

                  if( is_array ( $elem ) ) 
                  {

                      foreach( $elem as $elem_row => $elem_val ) 
                      {
                          $label .= $elem_row . "='" . $elem[$elem_row] . "' ";
                      }
                       
                      $html .= '<select '.$label.'>';
                       
                      $select_defualts = !is_null( $defaults ) ? $defaults != false ? $defaults : false : "...";

                      if( $select_defualts != false ) {
                          $html .= '<option value="' . __( $numz ) . '">'. __( $select_defualts ) . ' </option>';
                      }
                       
                      foreach( $array as $array_row => $array_val ) 
                      {
                            // $array_key_val = $array_row == $count ? $array_val : $array_row;

                            $is_selected = $array_row == $filter ? "selected=''" : false; 
                            $html .= '<option value="' . __( $array_row ) . '" ' . __( $is_selected ) . '>' . trim ( $array_val ) . '</option>';
                            $count++;
                      }
                       
                      $html .= '</select>';
                   }
              }
               
              return $html;

          }

          // input_array

          public static function select_array () 
          {

          }
          
          /**
           - input post object 
           - object array function
           - input::post_is_object()
          **/
          
          public static function post_is_object () 
          {
              if( isset( $_POST ) and count( $_POST ) >=1 ) return ( object ) $_POST;
          }
          
          public static function post_is_object_element ( $vars=null )
          {
              if( isset( $_POST ) and count( $_POST ) >=1 ) :
                  $is_objects = ( object ) $_POST;
                  if( !is_null( $vars ) AND !empty( $vars ) ) return $is_objects->$vars;
              endif;
          }

          public static function get_is_object () 
          {
              if( isset( $_GET ) and count( $_GET ) >=1 ) return ( object ) $_GET;
          }
          
          public static function get_is_object_element ( $vars=null )
          {
              if( isset( $_GET ) and count( $_GET ) >=1 ) :
                  $is_objects = ( object ) $_GET;
                  if( !is_null( $vars ) AND !empty( $vars ) ) return $is_objects->$vars;
              endif;
          }

          /**
           - input post array 
           - array element function
           - input::post_is_array()
          **/

          public static function post_is_array () 
          {
              if( isset( $_POST ) and count( $_POST ) >=1 ) return ( array ) $_POST;
          }
          
          public static function get_is_array() 
          {
              if( isset( $_GET ) and count( $_GET )>=1 ) return ( array ) $_GET;
          }

          // END
     } 
}