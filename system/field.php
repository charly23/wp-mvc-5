<?php if( ! class_exists( 'field' ) or wp_die( 'field class not executed' ) ){
    
     class field 
     {
         
          /** ------- 
              select field static class 
          --------- **/
          
          public static function select ( $fields=array() ) 
          {
              if( is_array( $fields )) 
              {
                  $html .= '<select class="select-field-type" id="">';
              }
              if( is_array( $fields )) 
              {  
                  foreach( $fields as $keys => $res ) 
                  {  
                        if( isset( $res ) ) 
                        {
                            $html .= '<option value="'. __( $keys, 'th-option-select-field' ) .'">';
                            $html .= __( $res, 'th-option-select-field' );
                            $html .= '</option>';
                        }
                  }
                  
              }
              if( is_array( $fields )) 
              {
                  $html .= '</select>';    
              }
              return $html;
          }
          
          /** ------- 
              input field static class
          --------- **/
          
          public static function input ( $atr=array() ) 
          {
              $html = null; 
              $active = $atr ? true : false;
              
              if( $active == true ) 
              {
                  $html .= '<input ';
                      if( is_array( $atr ) ) 
                      {
                          foreach( $atr as $atrs => $atr_vals ) {
                               if( isset( $atr[$atrs] ) AND !empty( $atr[$atrs] ) ) {
                                   $html .= "{$atrs}='{$atr_vals}' ";    
                               } 
                          }
                      } 
                  $html .= '/>';
              }
              
              return $html;
          }
          
          /** ------- 
              textarea field static class
          --------- **/
          
          public static function textarea ( $atr=array(), $value=null ) 
          {
              $html = null; 
              $active = $atr ? true : false;
              
              if( $active == true ) 
              {
                  $html .= '<textarea ';
                      if( is_array( $atr ) ) 
                      {
                          foreach( $atr as $atrs => $atr_vals ) {
                               if( isset( $atr[$atrs] ) AND !empty( $atr[$atrs] ) ) {
                                   $html .= "{$atrs}='{$atr_vals}' ";    
                               } 
                          }
                      } 
                  $html .= '>';
                  
                  if( !is_null( $value ) ) {
                      $html .= "{$value}";
                  }
                  
                  $html .= '</textarea>';
              }
              
              return $html;
          }

          // END
         
     }
    
} ?>