<?php if( ! class_exists( 'db' ) or wp_die ( 'error found.' ) ) {
    
    class db 
    {
        public static $tblnm = array( 'wp-mvc'=>'wp_mvc' );
    
        public function __construct() 
        {
            parent::__construct();
        }
        
        /**
        * wpdb query function 
        * @param name (string)
        * @param get (true or false)
        * @param where (string)
        * @param sort (true or false)
        **/ 
        
        public static function query ( $tbl=null, $is_get=true, $is_where=array(), $is_sort=true ) 
        {
            global $wpdb;
            
            if( ! is_null( $tbl ) ) 
            {
                $tbl_val = $wpdb->prefix . $tbl;
                $tbl_active = true;
            } else {
                $tbl_val = $wpdb->prefix;
                $tbl_active = false;
            }
        
            $is_sort_val = $is_sort == true ? "ORDER BY `sort` ASC" : $sort = '';

            $is_where_fields = array_keys( $is_where ).'='.$is_where[array_keys( $is_where )];
            $is_where_string = "WHERE {$is_where_fields}";
            
            $is_where_val = is_array( $is_where ) ? $is_where_string : null;
        
            if( $tbl_active == true ) 
            { 

                if( $is_get == true ) {
                    $sql = $wpdb->get_results( "SELECT * FROM $tbl_val $is_where_val $is_sort_val", OBJECT );
                } else if( $is_get == false ) {
                    $sql = $wpdb->get_row( "SELECT * FROM $tbl_val $is_where_val", OBJECT );
                } else {
                    $sql = null;
                }
            
            } 
        
            if( is_array( $sql ) or is_object( $sql ) )
            {
                return $sql;
            } 
            
            // END
        }

        /**
        * wpdb selects function 
        * @param tbl (string)
        **/
        
        public static function selects ( $tbl=null )  
        {
            global $wpdb;

            $wpdb->show_errors();

            $tbls = $wpdb->prefix . __( $tbl, 'wpdb' );
            if( ! is_null( $tbls ) ) return $wpdb->get_results( "SELECT * FROM {$tbls}", OBJECT );  

            $wpdb->print_error();
        }

        /**
        * wpdb selects where function 
        * @param tbl (string)
        * @param where (string)
        * @param sort (string)
        **/

        public static function selects_where ( $tbl=null, $where=null, $sort=null ) 
        {
            global $wpdb;

            $tbls = $wpdb->prefix . __( $tbl, 'wpdb' );
            if( ! is_null( $tbls ) ) return $wpdb->get_results( "SELECT * FROM {$tbls} {$where} {$sort}", OBJECT );  
        }

        /**
        * wpdb rows function 
        * @param tbl (string)
        * @param where (string)
        **/

        public static function rows ( $tbl=null, $where=null ) 
        {
            global $wpdb;

            $tbls = $wpdb->prefix . __( $tbl, 'wpdb' );
            if( ! is_null( $tbls ) ) return $wpdb->get_row( "SELECT * FROM {$tbls} {$where}", OBJECT );  
        } 

        public static function rows_id ( $tbl=null, $id=null ) 
        {
            global $wpdb;

            $tbls = $wpdb->prefix . __( $tbl, 'wpdb' );
            if( ! is_null( $tbls ) ) return $wpdb->get_row( "SELECT * FROM {$tbls} WHERE id={$id}", OBJECT );  
        } 

        // END
    }     
}