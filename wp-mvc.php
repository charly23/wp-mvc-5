<?php

/*
Plugin Name: WP-MVC
Description: Wordpress Model View Controller
Version: 1.1
Author: Charly Capillanes
Author URI: https://charlycapillanes.wordpress.com/
*/

include_once ( 'register.php' );

register::load ( true, 
    array ( 
        'system'  => $system_load, 
        'package' => $package_load, 
        'config'  => $config_load,
        'helper'  => $helper_load,
        'helper_dir' => $helper_dir_load,
        'model'   => $model_load,
        'control' => $control_load 
    ) 
);