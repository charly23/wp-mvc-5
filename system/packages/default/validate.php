<?php if( ! class_exists( 'validate' ) or wp_die ( 'error found.' ) ) 
{
    
    class validate
    {
        public static function is_empty ( $inputs=null ) 
        {
            if( ! is_null( $inputs ) and ! empty( $inputs ) and $inputs != '' ) 
            return true;
        }

        public static function is_string ( $inputs=null ) 
        {
            if( is_string( $inputs ) ) 
            return true;
        }

        public static function is_numeric ( $inputs=null ) 
        {
            if( is_numeric( $inputs ) )
            return true;
        }

        public static function is_numeric_options ( $inputs=null, $option=array() ) 
        {   
            /***
            $options = array(
                'options' => 
                    array(
                        'min_range' => 0,
                        'max_range' => 3,
                    )
            ); **/

            if( is_numeric( $inputs ) and filter_var( $inputs, FILTER_VALIDATE_INT, $options ) !== FALSE ) 
            return true;
        }

        public static function is_email ( $inputs=null ) 
        {
            if ( ! filter_var( $inputs, FILTER_VALIDATE_EMAIL ) === false )
            return true;
        }

        public static function is_max ( $inputs=null, $max=null ) 
        {
            if( strlen( $inputs ) <= $max ) 
            return true;
        }

        public static function field ( $inputs=null ) 
        {
            $empty = self::is_empty( $inputs );
            if( $empty != false ) {
                $_empty = array( 'status' => true );
            } else {
                $_empty = array( 'status' => false );
            }

            $string = self::is_string( $inputs );
            if( $string != false ) {
                $_string = array( 'status' => true );
            } else {
                $_string = array( 'status' => false );
            }

            $numeric = self::is_numeric( $inputs );
            if( $numeric != false ) {
                $_numeric = array( 'status' => true );
            } else {
                $_numeric = array( 'status' => false );
            }

            $status = array( 'empty' => $_empty, 'string' => $_string, 'numeric' => $_numeric );

            return $status;
        }
    }

}
?>