<?php if( ! class_exists( 'rewrite' ) or wp_die ( 'rewrite load error.' ) ) :

    // https://codex.wordpress.org/Class_Reference/WP_Rewrite

    class rewrite 
    {

        public static function server ( $tags=null ) 
        {
            $_path = (object) $_SERVER;
            $_urli = explode( '/', $_path->REQUEST_URI );

            if( in_array( $tags, $_urli ) ) {
                _e( static::incl( $_urli ), 'html' );
                die();
            }

        }

        public static function incl ( $datas=array() ) 
        {
            $ints = intval( end( $datas ) );

            if( $ints !== 0 ) {
                $ids = $ints;
            } else {
                $ids = null;
            }

            return $ids; 
        }

        // END  
    }

endif;
?>