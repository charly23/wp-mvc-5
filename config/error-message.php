<?php if( ! class_exists( 'error_message' ) or wp_die ( 'error found.' ) ) 
{   

    class error_message
    {
        public static $slug = 'error-message';

        public static function status () 
        {

            $error = array(
                        'empty' => 'Empty Field',
                        'max' => 'Max Lenght',
                        'required' => 'Required Field',
                        'int' => 'Integer Invalid Format',
                        'phone' => 'Phone Invalid Format',
                        'date' => 'Date Invalid Format'
                    );

            return $error;
        }

    }

}

?>