<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Controllers\Client\HomeController;
use App\Controllers\Client\ProductController;
use App\Controllers\Client\AboutController;
use App\Controllers\Client\ServiceController;
use App\Controllers\Client\BlogController;
use App\Controllers\Client\ContactController;
use App\Controllers\Admin\HomeController as AdminHomeController;
use App\Controllers\Admin\ProductController as AdminProductController;
use App\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Controllers\Admin\CommentController as AdminCommentController;
use App\Controllers\Admin\RaitingController as AdminRaitingController;
use App\Controllers\Admin\OrderController as AdminOrderController;
use App\Controllers\Admin\PostController as AdminPostController;
use App\Controllers\Admin\VoucherController as AdminVoucherController;
use App\Controllers\Admin\UserController as AdminUserController;
use App\Controllers\Client\AuthController;
use App\Router;
use App\View\Client\Pages\About;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once 'config.php';

$router = new Router();

// ***** Client *****
$router->add("/", [HomeController::class, 'index']);
$router->add("/product", [ProductController::class, 'index']);
$router->add("/about", [AboutController::class, 'index']);
$router->add("/service", [ServiceController::class, 'index']);
$router->add("/blog", [BlogController::class, 'index']);
$router->add("/contact", [ContactController::class, 'index']);
$router->add("/login", [AuthController::class, 'login']);
$router->add("/register", [AuthController::class, 'register']);

// ***** Admin *****

$router->add("/admin", [AdminHomeController::class, 'index']);
// Product Admin
$router->add("/admin/product", [AdminProductController::class, 'index']);
$router->add("/admin/product/create", [AdminProductController::class, 'create']);
$router->add("/admin/product/edit/{id}", [AdminProductController::class, 'edit']);

// User Admin
$router->add("/admin/user", [AdminUserController::class, 'index']);
$router->add("/admin/user/create", [AdminUserController::class, 'create']);

// Category Admin
$router->add("/admin/category", [AdminCategoryController::class, 'index']);
$router->add("/admin/category/create", [AdminCategoryController::class, 'create']);
$router->add("/admin/category/edit/{id}", [AdminCategoryController::class, 'edit']);

// Customer Admin
$router->add("/admin/customer", [AdminCustomerController::class, 'index']);

// Comment Admin
$router->add("/admin/comment", [AdminCommentController::class, 'index']);

// Raiting Admin
$router->add("/admin/raiting", [AdminRaitingController::class, 'index']);

// Order Admin
$router->add("/admin/order", [AdminOrderController::class, 'index']);

// Post Admin
$router->add("/admin/post", [AdminPostController::class, 'index']);

// Voucher Admin
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
    header('Location: App/Views/Errors/404.php');
}
