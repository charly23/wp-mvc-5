<?php if( ! class_exists( 'pagination' ) or wp_die ( 'error found.' ) ){

    class pagination{
          
        function __construct() 
        {
            // call    
        }
        
        public static function num($null=null){
            if( !is_null($null)){
                return isset( $_GET[$null] ) ? absint( $_GET[$null] ) : 1;
            }
        }  
        
        public static function offset($lmt=null,$pagenum=null){
            $limit = $lmt;
            
            $offset = ( $pagenum - 1 ) * $limit;
        }
        
        public static function entries($tbl=null,$offset=null,$limit=null){
            global $wpdb;
            
            $table = $wpdb->prefix.$tbl;
            
            $entries = $wpdb->get_results( "SELECT * FROM $table LIMIT $offset, $limit" );
            
            if( !empty($entries)){
                return $entries;
            }
        }
        
        public static function num_of_pages($tbl=null,$limit=null){
            global $wpdb;
            
            $table = $wpdb->prefix.$tbl;
            
            $total = $wpdb->get_var( "SELECT COUNT(`id`) FROM $table" );
            $num_of_pages = ceil( $total / $limit );
            
            return $num_of_pages;
        }
        
        public static function links($num_of_pages=null,$pagenum=null){
            
            $page_links = paginate_links( array(
                'base'      => add_query_arg( 'pagenum', '%#%' ),
                'format'    => '',
                'prev_text' => __( '&laquo;', 'aag' ),
                'next_text' => __( '&raquo;', 'aag' ),
                'total'     => $num_of_pages,
                'current'   => $pagenum
            ) );
            
            if ( $page_links ) {
                 return '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
            }
        }
        
        public static function num_offset($null=null,$tbl=null,$lmt=null){
            global $wpdb;
            
            $pagenum = self::num($null);
            $limit   = $lmt;
            $offset  = ( $pagenum - 1 ) * $limit;
            $table   = $wpdb->prefix.$tbl;
            
            $entries = $wpdb->get_results( "SELECT * FROM $table LIMIT $offset, $limit" );
            
            return $entries;
            
        }
        
        public static function total($tbl=null,$limit=null,$pagenum=null){
            global $wpdb;
            
            $table        = $wpdb->prefix.$tbl;
            $total        = $wpdb->get_var( "SELECT COUNT(`id`) FROM $table" );
            $num_of_pages = ceil( $total / $limit );
            
            $page_links = paginate_links( array(
                'base'      => add_query_arg( 'pagenum', '%#%' ),
                'format'    => '',
                'prev_text' => __( '&laquo;', 'aag' ),
                'next_text' => __( '&raquo;', 'aag' ),
                'total'     => $num_of_pages,
                'current'   => $pagenum
            ) );
             
            if ( $page_links ) {
                 return '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
            }
        }
        
    }

}
?>