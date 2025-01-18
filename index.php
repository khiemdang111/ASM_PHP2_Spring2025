<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Controller\Client\HomeController;
use App\Controller\Client\ProductController;
use App\Controller\Admin\HomeController as AdminHomeController;
use App\Controller\Admin\ProductController as AdminProductController;
use App\Controller\Admin\CategoryController as AdminCategoryController;
use App\Controller\Admin\CustomerController as AdminCustomerController;
use App\Controller\Admin\CommentController as AdminCommentController;
use App\Controller\Admin\RaitingController as AdminRaitingController;
use App\Controller\Admin\OrderController as AdminOrderController;
use App\Controller\Admin\PostController as AdminPostController;
use App\Controller\Admin\VoucherController as AdminVoucherController;
use App\Controller\Admin\RoleController as AdminRoleController;

use App\Router;
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once 'config.php';

$router = new Router();

// ***** Client *****
$router->add("/", [HomeController::class, 'index']);
$router->add("/product", [ProductController::class, 'index']);
$router->add("/about", [HomeController::class, 'about']);
$router->add("/service", [HomeController::class, 'service']);
$router->add("/blog", [HomeController::class, 'blog']);
$router->add("/contact", [HomeController::class, 'contact']);


// ***** Admin *****

$router->add("/admin", [AdminHomeController::class, 'index']);
$router->add("/admin/product", [AdminProductController::class, 'index']);
$router->add("/admin/role", [AdminRoleController::class, 'index']);
$router->add("/admin/category", [AdminCategoryController::class, 'index']);
$router->add("/admin/customer", [AdminCustomerController::class, 'index']);
$router->add("/admin/comment", [AdminCommentController::class, 'index']);
$router->add("/admin/raiting", [AdminRaitingController::class, 'index']);
$router->add("/admin/order", [AdminOrderController::class, 'index']);
$router->add("/admin/post", [AdminPostController::class, 'index']);
$router->add("/admin/voucher", [AdminVoucherController::class, 'index']);


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