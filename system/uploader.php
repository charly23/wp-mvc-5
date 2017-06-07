<?php if( ! class_exists( 'uploader' ) or wp_die ( 'error found.' ) ) 
{    
    class uploader
    {
        public static function file ( $input=array(), $btn_id=null, $btn_class=null ) 
        {
            $html = null; 
            $input_res = null; 
          
            if( is_array( $input ) and 
                count( $input) >=1 )
            {  
                  foreach( $input as $input_key => $input_var ) :
                      $key_value = $input[$input_key]; 
                      if( ! empty($input[$input_key] ) ) $input_res .= "{$input_key}='{$key_value}' ";
                  endforeach;

                  $html .= "<input type='text' {$input_res} />";
            }

            if( ! empty( $btn_class ) ) 
            {
                $html .= "<input type='submit' id='{$btn_id}' class='button action {$btn_class}' value='Browse' />";
            }
            
            return $html;   
        } 

        public static function get_file_url ( $id=null, $size=null, $icon=false, $attr=array() ) 
        {
            $html = null;

            if( is_numeric( $id ) ) 
            {
                return wp_get_attachment_image( intval( $id ), $size, $icon, $attr );    
            }
        }

        // END
    }
}