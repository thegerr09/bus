<?php
/*
 * Modified: preppend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('PUBLIC_URL') || define('PUBLIC_URL', 'account');
defined('BASE_PATH')  || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH')   || define('APP_PATH', BASE_PATH . '/app');
// defined('URL')        || define('URL', 'http://pogalatama.com/');
defined('URL')        || define('URL', 'http://192.168.1.196/bus/');
defined('MOVE_PHOTO') || define('MOVE_PHOTO', BASE_PATH . '/public/img');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => 'theger092290',
        'dbname'      => 'galatama',
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'dataDir'        => APP_PATH . '/data/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        // 'baseUri'        => 'http://pogalatama.com/',
        'baseUri'        => '/bus/',
    ]
]);
