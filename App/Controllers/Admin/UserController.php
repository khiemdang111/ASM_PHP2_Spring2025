<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Users\Index;
use App\Views\Admin\Pages\Users\Create;
use App\Views\Admin\Pages\Users\Edit;

use App\Models\User;
use App\Helpers\NotificationHelper;
use App\Views\Admin\Components\Notification;
use App\Validations\AuthValidation;
use App\Validations\ProductValidation;

class UserController
{
  public function index()
  {
    $users = new User();
    $data = $users->getAllUser();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
  public function create()
  {
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Create::render();
    Footer::render();
  }
  public static function store()
  {
    // validation các trường dữ liệu
    $is_valid = AuthValidation::register();
    if (!$is_valid) {
      NotificationHelper::error('store_user', 'Thêm người dùng thất bại');
      header('location: /admin/user/create');
      exit;
    }
    $email = $_POST['email'];
    // Kiểm tra các tên có tồn tại hay chưa
    $user = new User();
    $is_exist = $user->getOneUserByEmail($email);
    if ($is_exist) {
      NotificationHelper::error('store_user2', 'Tên người dùng này đã tồn tại');
      header('location: /admin/user/create');
      exit;
    }
    $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $role = $_POST['role'];
    // Thêm vào
    $data = [
      'username' => $_POST['username'],
      'password' => $hash_password,
      'name' => $_POST['name'],
      'email' => $_POST['email'],
      'phone' => $_POST['phone'],
      'address' => $_POST['address'],
      'role' => $role
    ];
    $is_upload = ProductValidation::uploadImage();
    if ($is_upload) {
      $data['image'] = $is_upload;
    }
    $result = $user->createUser($data);
    if ($result) {
      if ($role === 1) {
        NotificationHelper::success('create_user', 'Thêm người dùng thành công');
        header('location: /admin/user');
      } else {
        NotificationHelper::success('create_user', 'Thêm người dùng thành công');
        header('location: /admin/customer');
      }
    } else {
      NotificationHelper::error('create_user', 'Thêm người dùng thất bại');
      header('location: /admin/user/create');
      exit;
    }
  }
  public function edit($id)
  {
    $users = new User();
    $data = $users->getOneUser($id);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Edit::render($data);
    Footer::render();
  }
  public static function update(int $id)
  {

    $is_valid = AuthValidation::edit();
    if (!$is_valid) {
      NotificationHelper::error('update_product2', 'Cập nhật người dùng thất bại  !');
      header("Location: /admin/user/$id");
      exit();
    }
    $email = $_POST['email'];
    $user = new User();
    $is_exist = $user->getOneUserByEmail($email);

    if ($is_exist && $is_exist['email'] != $email) {
      NotificationHelper::error('update_product', 'Tên email đã tồn tại!');
      header("Location: /admin/user/$id");
      exit();
    }
    $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $data = [
      'username' => $_POST['username'],
      'password' => $hash_password,
      'name' => $_POST['name'],
      'email' => $_POST['email'],
      'phone' => $_POST['phone'],
      'address' => $_POST['address'],
      'role' => $_POST['role'],
      'status' => $_POST['status'],
    ];
    $is_upload = ProductValidation::updateImage();
    if ($is_upload) {
      $data['image'] = $is_upload;
    }
    $result = $user->updateUser($id, $data);
    if ($result) {
      NotificationHelper::success('update_user', 'Cập nhật người dùng thành công!');
      header("Location: /admin/user");
    } else {
      NotificationHelper::error('update_user', 'Cập nhật người dùng thất bại!');
      header("Location: /admin/user/edit/$id");
    }
  }
  public function delete($id)
  {
    $users = new User();
    $is_exit = $users->getOneUser($id);
    // var_dump($is_exit['id']); die;
    if ($is_exit && $is_exit['id'] == $id) {
      $data = [
        'status' => 0
      ];
    }else{
      NotificationHelper::error('delete_user', 'Người dùng không tồn tại!');
      header("Location: /admin/user");
      exit();
    }
    $result = $users->updateUser($id, $data);
    if ($result) {
      NotificationHelper::success('delete_user', 'Xóa người dùng thành công!');
      header('Location: /admin/user');
    } else {
      NotificationHelper::error('delete_user', 'Xóa người dùng thất bại!');
      header("Location: /admin/user");
    }
  }
}