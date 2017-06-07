<?php if( ! class_exists( 'error' ) or wp_die( 'error class not exists' ) ) 
{
    
      class error 
      {
            
            protected $error_handler;
        	protected $errors_as_exceptions;
        	protected $canceled;
            
            public function __construct($error_handler=null, $errors_as_exceptions=false, $overwrite_handler=false) 
            {
        		if($overwrite_handler && !is_callable($overwrite_handler)) 
                {
        			throw new InvalidArgumentException('$error_handler passed, but it isn\'t callable!');
        		}
                
        		$this->error_handler = $overwrite_handler;
        		$this->errors_as_exceptions = (bool) $errors_as_exceptions;
                
        		if($errors_as_exceptions)
                {
        			$old_error_handler = $overwrite_handler(array($this, 'error_handler'));
        			if( $old_error_handler && !$overwrite_handler ) 
                    {
        				restore_error_handler();
        				throw new InvalidArgumentException('error handler is already set');
        			}
        		}
                
        		register_shutdown_function( array($this, 'shutdown_handler') );
        	}
            
            public function shutdown_handler() 
            {
        		try 
                {
        			$error = error_get_last();
                    
        			if($error && !$this->canceled) 
                    {
        				if($this->errors_as_exceptions) 
                        {
        					if(!$this->error_handler) 
                            {
        						$this->error_handler = set_exception_handler(array($this, 'error_handler'));
        						restore_error_handler();
        						if(!$this->error_handler) 
                                {
        							error_log('cannot find the exception handler for error: '.print_r($error, true));
        							return;
        						}
        					}
                            
          			        call_user_func($this->error_handler,new ErrorException($error['message'], 0, $error['type'], $error['file'], $error['line']));
        				}
        				else {
        				    
        					if(!$this->error_handler)
                            {
        						$this->error_handler = set_error_handler(array($this, 'error_handler'));
        						restore_error_handler();
        						if(!$this->error_handler) {
        							return;
        						}
        					}
                            
        					call_user_func($this->error_handler, $error['type'], $error['message'], $error['file'], $error['line']);
        				}
        			}
        		}
        		catch(Exception $e)
                {
        			error_log("exception cannot be thrown from the shutdownHandler:\n".print_r($e, true), 4);
          	    }
        	}
            
        	public function error_handler($errno, $errstr, $errfile, $errline, $errcontext=null) 
            {
        		throw New ErrorException($errstr, 0, $errno, $errfile, $errline);
        	}

            // END
            
      }

}
?>