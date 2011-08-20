<?php

define('BASE_PATH', __DIR__ . '/../');
define('APPLICATION_PATH', BASE_PATH . '/src');
define('TEST_PATH', BASE_PATH . '/tests');
define('APPLICATION_ENV', 'testing');

// Include path
set_include_path(
    '.'
    . PATH_SEPARATOR . BASE_PATH . '/src'
    . PATH_SEPARATOR . get_include_path()
);

// Mockery
require_once 'Mockery/Loader.php';
require_once 'Hamcrest/hamcrest.php';
$loader = new \Mockery\Loader;
$loader->register();


// Set the default timezone !!!
date_default_timezone_set('Europe/Madrid');

// We wanna catch all errors en strict warnings
error_reporting(E_ALL|E_STRICT);


spl_autoload_register(function($class)
{
    $file = __DIR__.'/../src/'.strtr($class, '\\', '/').'.php';
    if (file_exists($file)) {
        require $file;
        return true;
    }
});
