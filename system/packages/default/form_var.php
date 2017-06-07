<?php if( ! class_exists( 'form_var' ) or wp_die ( 'error found.' ) ) 
{
    
    class form_var 
    {

        public static $null = null;
            
        /**
         * label : form
         * @param elem array() '<label {elem}></label>'
        **/

        public static function _label ( $elems=array() ) 
        {
            $value = self::$null;

            if( is_array( $elems) ) foreach( $elems as $keys => $vals ) :
                $value .= "{$keys}='{$vals}' ";
            endforeach;

            return "<label {$value}>";
        }

        public static function _labelend () {
            return '</label>';
        }

        // END
    }
}