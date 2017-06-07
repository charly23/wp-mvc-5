<?php if( ! class_exists( 'db_action' ) or wp_die ( 'error found.' ) ) 
{
     class db_action 
     {
          
          
          public function __construct() 
          {
              parent::__construct();
          }
          
          /**
           * @param $tbls ( string )
           * @param $datas ( array() )
           * @param $formats ( array( ) ) 
          **/
          
          public static function errors ( ) 
          {
              global $wpdb;
              
              return array( 'show_errors' => $wpdb->show_errors(), 'hide_errors' => $wpdb->hide_errors(), 'print_error' => $wpdb->print_error(), 'status' => true ); 
          }
          
          public static function inserts ( $tbls=null, $datas=array(), $formats=array() ) 
          {
              global $wpdb;
              
              $prefix = $wpdb->prefix;
              
              /** $wpdb->insert( 'table',  
             	                 array( 'column1' => 'value1', 'column2' => 123 ), 
                            	 array( '%s', '%d' ) ); **/
              
              if( ! is_null( $tbls ) ) 
              {
                  $inserts = $wpdb->insert( $prefix.$tbls, $datas, $formats );    
              }
              
              if( $inserts ) return self::errors();
          }
          
          /**
           * @param $tbls ( string )
           * @param $datas ( array() )
           * @param $formats ( array( ) ) 
          **/
          
          public static function replaces ( $tbls=null, $datas=array(), $formats=array() ) 
          {
              global $wpdb;

              $prefix = $wpdb->prefix;
              
              /** $wpdb->replace( 'table', 
            	                  array( 'indexed_id' => 1, 'column1' => 'value1', 'column2' => 123  ), 
            	                  array( '%d', '%s', '%d' ) ); **/
              
              if( ! is_null( $tbls ) ) 
              {
                  $replaces = $wpdb->replace( $prefix.$tbls, $datas, $formats );  
              }
              
              if( $replaces ) return self::errors();
          }

          /**
           * @param $tbls ( string )
           * @param $datas ( array() )
           * @param $wheres ( array( ) ) 
           * @param $formats ( array( ) ) 
           * @param $wheres_formats ( array( ) ) 
          **/
          
          public static function updates ( $tbls=null, $datas, $wheres=array(), $formats=array(), $wheres_formats=array() ) 
          {
              global $wpdb;
              
              $prefix = $wpdb->prefix;
              
              /** $wpdb->update( 'table', 
                                 array( 'column1' => 'value1', 'column2' => 'value2' ), 
                                 array( 'ID' => 1 ), 
                            	   array( '%s', '%d' ), 
                                 array( '%d' ) ); **/
              
              if( ! is_null( $tbls ) ) 
              {
                  $updates = $wpdb->update( $prefix.$tbls, $datas, $wheres, $formats, $wheres_formats ); 
              }
              
              if( $updates ) return self::errors(); 
          }
          
          /**
           * @param $tbls ( string ) 
           * @param $wheres ( array() )
           * @param $where_formats ( array( ) ) 
          **/
          
          public static function deletes ( $tbls=null, $wheres=array(), $where_formats=array() ) 
          {
              global $wpdb;

              $prefix = $wpdb->prefix;
              
              /** $wpdb->delete( 'table', 
                                 array( 'ID' => 1 ), 
                                 array( '%d' ) ); **/
              
              if( ! is_null( $tbls ) ) 
              {
                  $deletes = $wpdb->delete( $prefix.$tbls, $wheres, $where_formats );
              }
              
              if( $deletes ) return self::errors(); 
              
          }
          public static function print_r_wpdb () 
          {
              global $wpdb; 
              var_dump( $wpdb );
          }

          public static function action_validate ( $actions=null ) 
          {
              return $actions ? false : true;
          }

          public static  function validate_field_lengths ( $data, $table ) 
          {
              foreach ( $data as $field => $value ) :

                  if ( '%d' === $value['format'] || '%f' === $value['format'] ) :
                      $value['length'] = false;
                  else :
                      $value['length'] = $this->get_col_length( $table, $field );
                      if ( is_wp_error( $value['length']) ) return false;
                  endif;

                  $data[$field] = $value;
              endforeach;

              return $data;
          }

          public static function insert_options ( $options=array() ) 
          {

              foreach( $options as $keys => $results ) :

                    $option_keys = key( $results );

                    if ( get_option( $option_keys ) !== false ) {
                      if( !empty( $results[$option_keys]['value'] ) ) :
                        update_option( $option_keys, $results[$option_keys]['value'] ); 
                      endif;
                    } else {
                      if( !empty( $results[$option_keys]['value'] ) ) :
                        add_option( $option_keys, $results[$option_keys]['value'], '', 'yes' );  
                      endif;
                    }

              endforeach;
               
          }

          // END
          
     }
}
?>