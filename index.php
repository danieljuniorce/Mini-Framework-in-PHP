<?php
session_start();
ini_set('display_errors', 'On');
require 'config.php';

spl_autoload_register(function($class){
    if(file_exists('modules/'.$class.'/'.$class.'.php')) {
        require 'modules/'.$class.'/'.$class.'.php';
    }
});

Core::getInstance()->run($config);