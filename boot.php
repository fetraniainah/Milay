<?php

use AltoRouter as GlobalAltoRouter;
use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = require_once __DIR__ .'/bootstrap/database.php';
$capsule = new Capsule;
$capsule->addConnection($config['database']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$router = new GlobalAltoRouter();

require_once __DIR__.'/routes.php';
$match = $router->match();

if ($match) {
    list($controllerName, $actionName) = explode('#', $match['target']);
    $controllerClass = "App\\Milay\\Controller\\$controllerName";
    $controller = new $controllerClass();
  
    call_user_func_array([$controller, $actionName], $match['params']);
} else {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    echo "404 Not Found";
}















?>
