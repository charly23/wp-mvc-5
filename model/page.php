<?php if( ! class_exists( 'page' ) or wp_die ( 'error found.' ) ) :
    
    // https://codex.wordpress.org/Function_Reference/get_all_page_ids

    class page 
    {

        public static function data_object ( $ids=null ) 
        {
            if( ! is_null( $ids ) ) return get_page( $ids, OBJECT );
        }

        public static function data_array_a ( $ids=null ) 
        {
            if( ! is_null( $ids ) ) return get_page( $ids, ARRAY_A );
        }

        public static function data_array_n ( $ids=null ) 
        {
            if( ! is_null( $ids ) ) return get_page( $ids, ARRAY_N );
        }

        public static function link ( $ids=null ) 
        {
            if( ! is_null( $ids ) ) return get_page_link( $ids );
        }

        public static function all_ids () 
        {
            return get_all_page_ids();
        }

        public static function all_data () 
        {
            $pages = get_all_page_ids();
            $results = array();
               
            if( $pages ) {
                foreach( $pages as $keys => $values ) :
                    $results[] = array( $values => get_the_title( $values ) );
                endforeach;
            }

            return $results;
        }

        public static function all_select () 
        {
            $pages = get_all_page_ids();
            $results = array();
               
            if( $pages ) {
                foreach( $pages as $keys => $values ) :
                    $results[$values] = get_the_title( $values );
                endforeach;
            }

            return $results;
        }

        // END
    }

endif;

?>