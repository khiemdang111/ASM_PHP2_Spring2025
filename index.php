<?php
session_start();
ob_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Controllers\Admin\AjaxController;
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
use App\Controllers\Admin\RecycleController;
use App\Controllers\Client\AuthController;
use App\Controllers\ErrorController;
use App\Helpers\AuthHelper;
use App\Controllers\Client\GoogleController;
use App\Route;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

AuthHelper::middleware();


require_once 'config.php';

// ***** Client *****
Route::get("/", [HomeController::class, 'index']);
Route::get("/product", [ProductController::class, 'index']);
Route::get("/about", [AboutController::class, 'index']);
Route::get("/service", [ServiceController::class, 'index']);
Route::get("/blog", [BlogController::class, 'index']);
Route::get("/contact", [ContactController::class, 'index']);
// Auth Client
Route::get("/login", [AuthController::class, 'login']);
Route::get("/register", [AuthController::class, 'register']);
Route::post("/register/user", [AuthController::class, 'registerAction']);
Route::post("/login/user", [AuthController::class, 'loginAction']);
Route::get("/logout", [AuthController::class, 'logout']);
Route::get("/login-google", controllerMethod: [GoogleController::class, 'loginGoogle']);
Route::get("/login-googleAction", controllerMethod: [GoogleController::class, 'callbackGoogle']);
Route::get("/users/{id}", controllerMethod: [AuthController::class, 'edit']);
Route::post("/users/update/{id}", controllerMethod: [AuthController::class, 'upload']);
Route::get("/user/changepassword/{id}", controllerMethod: [AuthController::class, 'changePassword']);
Route::post("/updata/password/{id}", controllerMethod: [AuthController::class, 'uploadPassword']);

// ***** Admin *****

Route::get("/admin", [AdminHomeController::class, 'index']);
// Product Admin
Route::get("/admin/product", [AdminProductController::class, 'index']);
Route::get("/admin/product/create", [AdminProductController::class, 'create']);
Route::get("/admin/product/edit/{id}", [AdminProductController::class, 'edit']);

// User Admin
Route::get("/admin/user", [AdminUserController::class, 'index']);
Route::get("/admin/user/create", [AdminUserController::class, 'create']);

// Category Admin
Route::get("/admin/category", [AdminCategoryController::class, 'index']);
Route::get("/admin/category/create", [AdminCategoryController::class, 'create']);
Route::get("/admin/category/edit/{id}", [AdminCategoryController::class, 'edit']);

// Customer Admin
Route::get("/admin/customer", [AdminCustomerController::class, 'index']);

// Comment Admin
Route::get("/admin/comment", [AdminCommentController::class, 'index']);

// Raiting Admin
Route::get("/admin/raiting", [AdminRaitingController::class, 'index']);

// Order Admin
Route::get("/admin/order", [AdminOrderController::class, 'index']);

// Post Admin
Route::get("/admin/post", [AdminPostController::class, 'index']);

// Voucher Admin
Route::get("/admin/voucher", [AdminVoucherController::class, 'index']);

// Recycler Admin
Route::get("/admin/recycle/product", [RecycleController::class, 'product']);
Route::get("/admin/recycle/post", [RecycleController::class, 'post']);
Route::get("/admin/recycle/user", [RecycleController::class, 'user']);

// Ajax controller
Route::post("/ajax/changeStatus/product", [AjaxController::class, 'changeStatus']);
// Route::get("/ajax/changeStatus/product", [AjaxController::class, 'changeStatus']);

// **** Error ****
Route::get("/notfound", [ErrorController::class, 'notFound']);

Route::dispatch($_SERVER['REQUEST_URI']);
