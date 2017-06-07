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
         * wp media custom function
         * actions scripting
         * events handler - libraries
         **/

        $params.fn.media_uploader = function ( dis=null, vle=null ) 
        {
            var frame,
                brw = $params(this),
                inp = $params(dis),
                val = $params(vle);

            brw.on( 'click', function(e)
                {

                    if ( frame ) {
                        frame.open(); 
                        return;
                    }

                    frame = wp.media( 
                        {
                            title: 'Select or Upload Media Of Your Chosen Persuasion',
                                button: {
                                text: 'Use this media'
                            },
                            multiple: false
                        }
                    ); 

                    frame.on( 'select', function() 
                        {
                            var attach = frame.state().get( 'selection' ).first().toJSON();
                            inp.text( attach.name );
                            val.val( attach.url );
                        }
                    );

                    frame.open();
                }
            );

            // END
        }

        /**
         * copy-clipboard custom function
         * actions scripting
         **/

        $params.fn.clipboard = function ( elem=null ) 
        {
            var click= $params(this);
            var temp = $params( '<input />' );
            var copy = $params( elem );

            click.on( 'click', function(e) 
                {
                    
                    $params( 'body' ).append( temp );
                    temp.val( copy.text() ).select();

                    copy.css( {'background-color':'#0073aa' });
                    copy.css( {'color':'#fff' });

                    document.execCommand( 'copy' );
                    temp.remove();

                } 
            );
            
            // END 
        }

        /**
         * checkbox-all/selected custom function
         * actions scripting
         **/

        $params.fn.checkall = function ( nm=null ) 
        {
            var checked = [];
            var items = $params(nm);

            $params(this).on ( 'click', function()
                {
                     if( $params(this).is( ':checked' ) == true ) {

                        items.attr('checked', true);
                        items.prop('checked', true);

                        items.each( function(i)
                            {
                                if( $params(this).is( ':checked' ) == true ) {
                                    checked[i] = $params(this).val();
                                }
                            }
                        );

                    } else {

                        items.attr('checked', false);
                        items.prop('checked', false);

                        items.each( function(i)
                            {
                                if( $params(this).is( ':checked' ) == false ) {
                                    checked[i] = 0;
                                }
                            }
                        );
                    }

                    console.log( checked );
                }
            );
 
            // END
        }

        $params.fn.check_selected = function ( nm=null ) 
        {
            var checked = [];
            var items = $params(nm);

            $params(this).on ( 'click', function()
                {
                    items.each( function(i)
                        {
                            if( $params(this).is( ':checked' ) == true ) {
                                checked[i] = $params(this).val();
                            } else {
                                checked[i] = 0;
                            }
                        }
                    );

                    console.log( checked );
                }
            );

            // END
        }

        // END

    }
);