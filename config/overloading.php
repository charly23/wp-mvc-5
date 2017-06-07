<?php if( ! class_exists( 'method' ) or wp_die ( 'error found.' ) ) 
{    
    
    // http://php.net/manual/en/language.oop5.magic.php

    class method
    {
        private $name;
        private $slug;
        private $nums;

        public function __construct( $name, $slugs, $nums )
        {
            parent::__construct();

            $this->name = $name;
            $this->slug = $slug;
            $this->nums = $nums;

            $this->a = func_get_args(); 
            $this->i = func_num_args();
        }

        public function __destruct () 
        {
            // actions   
        }

        public function __get( $key ) 
        { 
            return $this->values[$key]; 
        }

        public function __set( $key, $value )
        { 
            $this->values[$key] = $value; 
        }

        public function __isset( $key )
        { 
            $this->values[$key]; 
        }

        public function __unset( $key ) 
        { 
            $this->values[$key]; 
        }

        // END
    }
}  
?>