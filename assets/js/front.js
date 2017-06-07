jQuery ( function() 
    {
        var $params = jQuery;

        /**
         * placeholder : custom js
         * @pamar : array object
        **/

        $params.fn.placeholder = function ( arrays=null )  
        {
            var slg = 'placeholder'
            var inp = $params(this);
            var dlt = inp.val(); 
            var emp = null;   

            var val = 'value' in arrays ? arrays['value'] : null;
            var vdt = 'validate' in arrays ? arrays['validate'] : null;
    
            inp.on( 'click', function()
                {
                    if( dlt != val ) {
                        inp.val(); 
                    } else {
                        inp.val(emp);
                    }
                }
            );

            inp.on( 'blur', function() 
                {
                    var dlt=inp.val(); 
                    if( dlt != val ) {
                        inp.val(); 
                    } else {
                        inp.val(emp);
                    }
                    if( dlt == null || dlt == '' ) {
                        inp.val( val );
                    }
                }
            );

            if( vdt != false ) {
                inp.addClass( slg );
            }

            // END
        }

        /**
         * date-format : custom js
         * @pamar : array object
        **/

        $params.fn.input_format = function ( arrays=null )  
        {   
            var inp = $params(this);
            var dlt = inp.val(); 
            var emp = null;

            var val = 'value' in arrays ? arrays['value'] : null;
            var dval = 'default_value' in arrays ? arrays['default_value'] : null;

            inp.on( 'click', function() {
                    var cdlt = inp.val(); 
                    if( dlt != cdlt ) {
                        inp.val( cdlt );
                    } else {
                        inp.val( dval );
                    }
                }
            );

            inp.on( 'blur', function() {
                    var bdlt = inp.val(); 
                    if( bdlt != dval ) {
                        inp.val( bdlt ); 
                    } else {
                        inp.val( val );
                    }
                }
            );

            // END
        }

        // END    
    }
);