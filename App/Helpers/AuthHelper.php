<?php

namespace App\Helpers;

use App\Models\User;

class AuthHelper
{
  public static function register($data)
  {
    $user = new User();

    $is_exist = $user->getOneUserByEmail($data['email']);
    if ($is_exist) {
      NotificationHelper::error('exit_register', 'Tên đăng nhập đã tồn tại');
      return false;
    }

    $result = $user->createUser($data);

    if ($result) {
      NotificationHelper::success('register', 'Đăng kí tài khoản thành công');
      return true;
    }
    NotificationHelper::error('exit_register', 'Đăng kí thất bại');
    return true;
  }
  public static function login($data)
  {
    $user = new User();
    $is_exist = $user->getOneUserByEmail($data['email']);

    // Kiểm tra xem có tồn tại username trong database hay không => nếu không: thông báo tài khoảng ko tồn tại
    if (!$is_exist) {
      NotificationHelper::error('username', 'Tên đăng nhập không tồn tại');
      return false;
    }

    // Nếu có thì kiểm tra password, nếu password không trùng thì thông báo ra lỗi
    // password người dùng nhập được lấy từ trong form: $data['password']
    // password trong csdl: $is_exit['password']
    if (!password_verify($data['password'], $is_exist['password'])) {
      NotificationHelper::error('password', 'Mật khẩu không đúng');
      return false;
    }

    // Nếu status == 0, thông báo trả về false
    if ($is_exist['status'] == 0) {
      NotificationHelper::error('status', 'Tài khoản đã bị khóa');
      return false;
    }
    // Kiểm tra status có bằng 1 hay không, nếu không thì thông báo tài khoản đã bị khóa
    // Kiểm tra trường remember có hay ko => nếu có thì lưu vào session hoặc cookie

    if ($data['remember']) {
      // Lưu vào cookie, session
      self::updateCookie($is_exist['id']);

    } else {
      // lưu session
      self::updateSession($is_exist['id']);
    }

    NotificationHelper::success('login', 'Đăng nhập thành công');
    return true;
    //
  }

  public static function updateCookie(int $id)
  {
    $user = new User();
    $result = $user->getOneUser($id);

    if ($result) {
      // Chuyển array thành string json để lưu vào cookie user
      $user_data = json_encode($result);

      // lưu cookie
      setcookie('user', $user_data, time() + (3600 * 24 * 30 * 12), "/"); // 86400 seconds = 1 day

      // lưu session
      $_SESSION['user'] = $result;
    }
  }
  public static function updateSession(int $id)
  {
    $user = new User();
    $result = $user->getOneUser($id);

    if ($result) {
      // lưu session
      $_SESSION['user'] = $result;
    }
  }

  public static function checkLogin(): bool
  {
    if (isset($_COOKIE['user'])) {
      $user = $_COOKIE['user'];
      $user_data = json_decode($user);

      $_SESSION['user'] = (array) $user_data;

      return true;
    }

    if (isset($_SESSION['user'])) {
      return true;
    }

    return false;
  }

  public static function logout()
  {
    if (isset($_COOKIE['user'])) {
      unset($_SESSION['user']);
    }
    if (isset($_COOKIE['user'])) {
      setcookie('user', '', time() - (3600 * 24 * 30 * 12), '/');
    }
  }

  public static function edit($id): bool
  {
    if (!self::checkLogin()) {
      NotificationHelper::error('login', 'Vui lòng đăng nhập để xem thông tin');
      return false;
    }



    $data = $_SESSION['user'];
    $user_id = $data['id'];

    if (isset($_COOKIE['user'])) {
      self::updateCookie($user_id);
    }

    self::updateCookie($user_id);

    if ($user_id != $id) {
      NotificationHelper::error('user_id', 'Không có quyền xem thông tin của tài khoản này');
      return false;
    }

    return true;
  }

  public static function update($id, $data)
  {
    $user = new User();
    $result = $user->update($id, $data);

    if (!$result) {
      NotificationHelper::error('update_user', 'Cập nhật thông tin thất bại');
      return false;
    }

    if ($_SESSION['user']) {
      self::updateSession($id);
    }

    if ($_COOKIE['user']) {
      self::updateCookie($id);
    }

    NotificationHelper::success('update_user', 'Cập nhật thông tin thành công');
    return true;
  }

  public static function middleware()
  {
    // var_dump($_SERVER['REQUEST_URI']);
    $admin = explode('/', $_SERVER['REQUEST_URI']);
    // var_dump($admin);
    $admin = $admin[1];

    if ($admin == 'admin') {
      // if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1){
      //  NotificationHelper::error('admin','Tài khoản này không có quyền truy cập');
      //  header('Location: /login');
      //  exit();
      // }
      if (!isset($_SESSION['user'])) {
        NotificationHelper::error('admin', 'Vui lòng đăng nhập');
        header('Location: /login');
        exit();
      }
      if ($_SESSION['user']['role'] != 1) {
        NotificationHelper::error('admin', 'Tài khoản này không có quyền truy cập');
        header('Location: /login');
        exit();
      }
    }
  }
  public static function checkExistedInfo($column, $info)
  {
    $UserModel = new User();
    $result = $UserModel->getOneUserByInfo($column, $info);
    if (empty($result)) {
      return false;
    } else {
      return $result;
    }
  }
  public static function checkPermission($requiredRole)
  {
    // Kiểm tra nếu người dùng chưa đăng nhập
    if (!isset($_SESSION['user'])) {
      $_SESSION['alert'] = [
        'title' => 'Error!',
        'text' => 'Vui lòng đăng nhập để thực hiện thao tác này',
        'icon' => 'error'
      ];
      header('Location: /login');
      exit();
    }

    // Lấy role của người dùng từ session
    $userRole = $_SESSION['user']['role'];

    // Nếu role = 0, cho phép tất cả
    if ($userRole == 0) {
      return true;
    }

    // Kiểm tra quyền
    if (in_array($userRole, $requiredRole)) {
      return true;
    }

    // Thêm thông báo lỗi vào session
    $_SESSION['alert'] = [
      'title' => 'Error!',
      'text' => 'Bạn không có quyền truy cập chức năng này',
      'icon' => 'error'
    ];
    header('Location: /admin');
    exit();
  }
  public static function checkPassword($id, $oldpassword){
    $user = new User();
    $result = $user->getOneUser($id);
    if($result){
      return password_verify($oldpassword, $result['password']);
    }
    else{
      NotificationHelper::error('errorOldPassword', 'Mật khẩu cũ không chính xác');
      return false;
    }
  }
}
