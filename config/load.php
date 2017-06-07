<?php
   
   /**
    *  @Application WP MVC
    *  @charlycapillanes since (2013)
   **/
   
   /**
    *  System load wp mvc default classes
   **/
   
   /** auto load 
       $system_load = array( 'system-1', 'system-2', 'system-3' );
   **/

   $system_load = array( 'add', 'load', 'sanitize', 'input', 'html', 'uploader', 'post', 'widget', 'redirect' );

   /**
   $package_load= array( 
              'package-directory-1' => array( 'package-file-1', 'package-file-2' ), 
              'package-directory-2' => array( 'package-file-2', 'package-file-2' )
          ); **/

   $package_load= array(
              'default' => array( 'html_var', 'form_var', 'tinymce', 'validate' ),  
              'library' => array( 'rewrite', 'money_format' ) 
          );  

   /** config load 
       $config_load = array( 'config-1', 'config-2', 'config-3' );
   **/
        
   $config_load = array( 'router', 'overloading', 'smtp-config', 'error-message', 'config', 'autoload' );

  /**
    *  Helper load custom classes
   **/
   
    /** helper load 
       $helper_load = array( 'helper-1', 'helper-2', 'helper-3' );
   **/
   
   $helper_load = array( 'user-control', 'money_format' );

   /** $helper_dir_load= array(
              'helper-dir-1' => array( 'helper-dir-file-1', 'helper-dir-file-2' ),
              'helper-dir-2' => array( 'helper-dir-file-1', 'helper-dir-file-2' )
          );  **/

   $helper_dir_load= array(
              'libraries' => array( 'send-mail' )
          );  
   
   /**
    *  Model load custom classes
   **/
   
   /** model load 
       $model_load = array( 'model-1', 'model-2', 'model-3' );
   **/
    
   $model_load = array( 'db', 'page', 'form', 'users' );
    
   /**
    *  Controller load custom classes
   **/

   /** control load
       $control_load = array( 'control-1', 'control-2', 'control-3' );
   **/
    
   $control_load = array( 'db_action', 'action' );
   
?>