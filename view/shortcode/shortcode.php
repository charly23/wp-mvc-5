<?php if( ! class_exists( 'shortcode' ) or die( 'error found.' ) ) 
{    
    class shortcode 
    {
        public static function front_page ( $atts=null )
        {
            $html = null;
            
            load::view( 'shortcode/template/front_page' );
            $html .= front_page_objects::template( $atts );

            return $html;
        }

        // END
        
    }
}

new shortcode();

?>