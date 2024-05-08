<?php

use AltoRouter as GlobalAltoRouter;
use App\Milay\Utils\Messages;
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

function get_files($headerPath) {
    $absolutePath = ROOT_PATH . '/views/' . $headerPath . '.php';
    if (file_exists($absolutePath)) {
        include $absolutePath;
    } else {
        echo "Erreur : Le fichier d'en-tête est introuvable.";
    }
}

function show_message($key) {
    $errors = Messages::getErrors();
    $successes = Messages::getSuccesses();

    switch (true) {
        case isset($errors[$key]):
            echo $errors[$key];
            break;
        case isset($successes[$key]):
            echo $successes[$key];
            break;
        default:
            break;
    }
}

function get_message($key){
    if(isset($key)){
        echo $key;
    }
}

function base_url(string $path){
     echo BASE_PATH.$path; 
}

function set_title(string $title){
    Messages::set("title",$title);   
}

function get_title(){
    return Messages::get("title","Milay");
}















?>