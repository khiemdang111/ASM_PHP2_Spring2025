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
use App\Controllers\Client\CartController;
use App\Controllers\Client\AjaxController AS ClientAjaxController;
use App\Controllers\Client\EmailController;
use App\Controllers\Client\OrderController;
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

// products
Route::get("/product", [ProductController::class, 'index']);
Route::get("/product/{id}", [ProductController::class, 'detail']);

// cart
Route::get("/cart", [CartController::class, 'index']);
Route::post("/cart/add/{id}", [CartController::class, 'addToCart']);
Route::post("/ajax/cart/changeQuantity", [ClientAjaxController::class, 'changeQuantity']);
Route::post("/checkout", [CartController::class, 'checkout']);
Route::get("/cart/remove/{id}", [CartController::class, 'remove']);
Route::post("/create/order", [CartController::class, 'createOrder']);


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
Route::get("/forgotPassword", controllerMethod: [AuthController::class, 'forgotPassword']);
Route::post("/forgotpassword/checkopt", controllerMethod: [EmailController::class, 'checkOpt']);
Route::get("/user/order/waitpay/{id}", controllerMethod: [OrderController::class, 'waitPay']);


// ***** Admin *****

Route::get("/admin", [AdminHomeController::class, 'index']);
// Product Admin
Route::get("/admin/product", [AdminProductController::class, 'index']);
Route::get("/admin/product/create", [AdminProductController::class, 'create']);
Route::get("/admin/product/edit/{id}", [AdminProductController::class, 'edit']);
Route::post("/product/create", [AdminProductController::class, 'store']);
Route::put("/update/product/{id}", [AdminProductController::class, 'update']);
Route::post("/admin/product/delete/{id}", [AdminProductController::class, 'delete']);
Route::get("/product/search", [AdminProductController::class, 'search']);

// Category Admin
Route::get("/admin/category", [AdminCategoryController::class, 'index']);
Route::get("/admin/category/create", [AdminCategoryController::class, 'create']);
Route::get("/admin/category/edit/{id}", [AdminCategoryController::class, 'edit']);
Route::post("/category/create", [AdminCategoryController::class, 'store']);
Route::put("/update/category/{id}", [AdminCategoryController::class, 'update']);
Route::post("/admin/category/delete/{id}", [AdminCategoryController::class, 'delete']);
Route::get("/category/search", [AdminCategoryController::class, 'search']);
Route::post("/user/create", [AdminUserController::class, 'store']);


// User Admin
Route::get("/admin/user", [AdminUserController::class, 'index']);
Route::get("/admin/user/create", [AdminUserController::class, 'create']);
Route::get("/admin/user/edit/{id}", [AdminUserController::class, 'edit']);
Route::put("/update/user/{id}", [AdminUserController::class, 'update']);
Route::post("/admin/user/delete/{id}", [AdminUserController::class, 'delete']);


// Customer Admin
Route::get("/admin/customer", [AdminCustomerController::class, 'index']);
Route::get("/admin/customer/edit/{id}", [AdminCustomerController::class, 'edit']);
Route::put("/update/customer/{id}", [AdminCustomerController::class, 'update']);

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

// *** Recycler Admin ***
// product
Route::get("/admin/recycle/product", [RecycleController::class, 'product']);
Route::post("/admin/product/restore/{id}", [RecycleController::class, 'restore']);
Route::post("/admin/product/deletePermanently/{id}", [RecycleController::class, 'deletePermanently']);

// post
Route::get("/admin/recycle/post", [RecycleController::class, 'post']);
Route::post("/admin/post/restore/{id}", [RecycleController::class, 'restore']);
Route::post("/admin/post/deletePermanently/{id}", [RecycleController::class, 'deletePermanently']);

// user
Route::get("/admin/recycle/user", [RecycleController::class, 'user']);
Route::post("/admin/user/restore/{id}", [RecycleController::class, 'restore']);
Route::post("/admin/user/deletePermanently/{id}", [RecycleController::class, 'deletePermanently']);

// Ajax controller
Route::post("/ajax/changeStatus/product", [AjaxController::class, 'changeStatus']);
// Route::get("/ajax/changeStatus/product", [AjaxController::class, 'changeStatus']);

// **** Error ****
Route::get("/notfound", [ErrorController::class, 'notFound']);

Route::dispatch($_SERVER['REQUEST_URI']);
