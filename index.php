<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');
use App\Model\Database;
use App\Model\User;
use App\Controller\Client\HomeController;
use App\Router;
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once 'config.php';

$router = new Router();

$router->add("/", [HomeController::class, 'index']);
$router->add("/product", [HomeController::class, 'about']);
$router->add("/about", [HomeController::class, 'about']);
$router->add("/service", [HomeController::class, 'service']);
$router->add("/blog", [HomeController::class, 'blog']);
$router->add("/contact", [HomeController::class, 'contact']);

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$route = $router->match($path);

if ($route) {
    [$controllerClass, $action] = $route;

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            die("Method '{$action}' không tồn tại trong class '{$controllerClass}'.");
        }
    } else {
        die("Controller class '{$controllerClass}' không tồn tại.");
    }
} else {
    die("Route không khớp.");
}

// include_once './View/Client/index.php';