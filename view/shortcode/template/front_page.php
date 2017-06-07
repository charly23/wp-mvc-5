<?php if( ! class_exists( 'front_page_objects' ) or die ( 'error found.' ) ) 
{    
    class front_page_objects extends html_var
    {
        public static $slug = 'wp-gcf';

        public static function template ( $atts=null ) 
        {
            $html = null;

            $html .= static::form( $atts );
            
            return $html; 
        }

        public static function form ( $atts=null ) 
        {
            $html = null;

            var_dump( $atts );

            return $html;
        }


        // END       
    }
}
?>