<?php

if(!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

define('APP_PATH', realpath(dirname(dirname(__FILE__)))  );

define('VIEWS_PATH', APP_PATH . DS . 'views' . DS);
define('VIDEOS_PATH', APP_PATH . DS .'..'. DS .'public' .DS . 'videos' . DS);
define('COVERS_PATH',(realpath(dirname(dirname(dirname(__FILE__))))) .DS .'public' .DS. 'covers' . DS);




defined('DATABASE_HOST_NAME')       ? null : define ('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')       ? null : define ('DATABASE_USER_NAME', 'root');
defined('DATABASE_PASSWORD')        ? null : define ('DATABASE_PASSWORD', '');
defined('DATABASE_DB_NAME')         ? null : define ('DATABASE_DB_NAME', 'movie_website');
defined('DATABASE_CONN_DRIVER')     ? null : define ('DATABASE_CONN_DRIVER', 1);

function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}