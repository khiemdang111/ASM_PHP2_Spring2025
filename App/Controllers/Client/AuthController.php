<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;

use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;

use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Edit;

use App\Models\User;
use App\Validations\AuthValidation;
use App\Views\Client\Components\Notification;

class AuthController
{
 public static function register()
 {
  // Hiển thị Header
  Header::render();
  // Hiển thị thông báo
  // Notification::render();
  // // Hủy session thông báo
  // NotificationHelper::unset();
  // Hiển thị trang đăng ký
  Register::render();
  // Hiển thị Footer
  Footer::render();
 }

 // Thực hiện đăng kí
//  public static function registerAction()
//  {
//   // Bắt lỗi dữ liệu
//   // Kiểm tra xem có thỏa đều kiện không
//   // Nếu có thì tiếp tục 
//   // Nếu không thỏa thì thông báo và chuyển hướng về trang đăng kí
//   $is_valid = AuthValidation::register();

//   if (!$is_valid) {
//    NotificationHelper::error('register_valid', 'Đăng kí thất bại');
//    header('Location: /register');
//    exit();
//   }
//   // Bắt lỗi validation
//   // Bắt lỗi username
//   $username = $_POST['username'];
//   $password = $_POST['password'];
//   $hash_password = password_hash($password, PASSWORD_DEFAULT);
//   $email = $_POST['email'];
//   $name = $_POST['name'];
//   // lưu ý tên Key phải trùng với CSDL
//   $data = [
//    'username' => $username,
//    'password' => $hash_password,
//    'email' => $email,
//    'name' => $name,
//    // Thêm các thông tin cần thiết vào mảng $data
//    // Thêm các thông tin cần thiết vào mảng $data
//   ];

//   $user = new User;
//   $result = AuthHelper::register($data);
//   if ($result) {
//    header('Location: /login');
//   } else {
//    header('Location: /register');
//   }
//  }


 public static function login()
 {
  // Hiển thị Header
  Header::render();
  // Hiển thị trang đăng ký
  Notification::render();

  ///////////////////////////
  NotificationHelper::unset();

  Login::render();
  // Hiển thị Footer
  Footer::render();
 }
//  public static function loginAction()
//  {
//   // Bắt lỗi
//   // validation

//   $is_valid = AuthValidation::login();
//   if (!$is_valid) {
//    NotificationHelper::error('login', ' Đăng nhập thất bại');
//    header('Location: /login');
//    exit();
//   }
//   $data = [
//    'username' => $_POST['username'],
//    'password' => $_POST['password'],
//    'remember' => isset($_POST['remember'])
//   ];

//   $result = AuthHelper::login($data);
//   if ($result) {
//    // NotificationHelper::success('login', 'Đăng nhập thành công');
//    header('Location: /');
//   } else {
//    // NotificationHelper::error('login', 'Đăng nhập thất bại');
//    header('Location: /login');
//   }
//  }
 
//  public static function checkLogin(): bool{
//   if(isset($_COOKIE['user'])){
//    $user = $_COOKIE['user'];
//    $user_data = json_decode($user);

//    $_SESSION['user'] = (array) $user_data;

//    return true;
//   }

//   if(isset($_SESSION['user'])){
//    return true;
//   }

//   return false;
//  }

//  public static function logout(){
//    AuthHelper::logout();
//    NotificationHelper::success('logout', 'Đăng xuất thành công');
//    header('Location: /');
//  }

//  public static function edit($id){
//   $resutl = AuthHelper::edit($id);
//   if(!$resutl){
//    if(isset($_SESSION['error']['login'])){
//     header('Location: /login');
//     exit();
//    }

//    if(isset($_SESSION['error']['user_id'])){

//     $data = $_SESSION['user'];
//     $user_id = $data['id'];
//     header("Location: /users/$user_id");
//     exit();
//    }
//   }

//   $data = $_SESSION['user'];
//   Header::render();
//   Notification::render();
//   NotificationHelper::unset();

//   // Giao diện thông tin User
//   Edit::render($data);
//   Footer::render();
//  }

//  public static function upload($id){
//   $is_valid = AuthValidation::edit();

//   if (!$is_valid) {
//    NotificationHelper::error('upload_user', 'Cập nhật thất bại');
//    header("Location: /users/$id");
//    exit();
//   }
//   $data = [
//     'email' => $_POST['email'],
//     'name' => $_POST['name'],

//   ];

//   // Kiểm trá có upload hình ảnh ko, nếu có thì kiểm tra có hợp lệ hay không
//   $is_upload = AuthValidation::uploadAvatar();
//   if($is_upload){
//     $data['avatar'] = $is_upload;
//   }

//   // Gọi helper để upload
//   $result = AuthHelper::update($id, $data);
//   // Kiểm tra kết quả trả về và chuyển hướng
//   header("Location: /users/$id");
//  }
}