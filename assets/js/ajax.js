jQuery ( function() 
    {
        var $params  = jQuery;
        var $scripts = ajax_script.ajax_url;
        var $debugs  = '';
        var $loader_gif = '';
        
        /**
          * wp ajaxs (error) custom function
          * actions scripting
          * events handler
        **/
        
        function ajax_results_classes ( $this, $flts )
        {
            if( $flts == 'before' ){
               $params( $this ).addClass( 'before--ajax' );
            } else if ( $flts == 'error' ){
               $params( $this ).removeClass( 'before--ajax' );
               $params( $this ).addClass( 'error--ajax' );  
            } else if ( $flts == 'success' ){
               $params( $this ).removeClass( 'before--ajax' );
               $params( $this ).addClass( 'success--ajax' );   
            } else if ( $flts == 'done' ) {
               $params( $this ).removeClass( 'before--ajax' );
               $params( $this ).removeClass( 'success--ajax' );
               $params( $this ).addClass( 'done--ajax' );  
            }      
        }
        
        /**
          * wp ajaxs custom function
          * actions scripting
          * events handler
        **/
          
        function ajax_actions ( actions, vals, sets, load )
        {
              var $scripts = ajax_script.ajax_url;
              var $values  = vals;
              var $setups  = sets;  
              var $loads   = load;
    
              $params.ajax ( 
              {
                      data: 
                      { 
                         action : actions, 
                         value  : $values,
                      },
                      type   : 'POST',
                      url    : $scripts,
                      beforeSend : function() { 
                           $params( $loads ).addClass( 'ajaxs-true' );
                      },
                      error : function( xhr, status, err ) {
                           // Handle errors
                      },
                      success : function( html, data ) {
                           $params( $setups ).html( html );
                           $params( $loads ).removeClass( 'ajaxs-true' );
                      }
              } ) . done ( function( html, data ) {
                      $params( $loads ).removeClass( 'ajaxs-true' );
                  }
              );       
        }

        function ajax_actions_filters ( actions, vals, sets, load )
        {
              var $scripts = ajax_script.ajax_url;
              var $values  = vals;
              var $setups  = sets;  
              var $loads   = load;
    
              $params.ajax ( 
              {
                      data: 
                      { 
                         action : actions, 
                         value  : $values,
                      },
                      type   : 'POST',
                      url    : $scripts,
                      beforeSend : function() { 
                           $params( $loads ).addClass( 'ajaxs-true' );
                      },
                      error : function( xhr, status, err ) {
                           // Handle errors
                      },
                      success : function( html, data ) {
                           $params( $setups ).html( html );
                           $params( $loads ).removeClass( 'ajaxs-true' );
                      }
              } ) . done ( function( html, data ) {
                      $params( $loads ).removeClass( 'ajaxs-true' );
                  }
              );       
        }

        // END
    }
);