<?php

require_once '../vendor/autoload.php';

use Phalcon\Di\FactoryDefault;
use Phalcon\Loader;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

$loader = new Loader();
$loader->registerDirs([
    APP_PATH . '/controllers/',
    APP_PATH . '/models/'
]);

$loader->register();

$factory = new FactoryDefault();
$factory->set(
    'view',
    function () {
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);
$factory->set(
    'url',
    function () {
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/');
        return $url;
    }
);

$app = new \Phalcon\Mvc\Application($factory);
$response = $app->handle();
$response->send();

//Phalcon\Application\Bo::init([])->runApplicationOn($_SERVER);
//phpinfo();
