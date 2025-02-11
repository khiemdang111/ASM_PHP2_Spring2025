<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Customers\Index;
use App\Views\Admin\Pages\Customers\Create;
use App\Views\Admin\Pages\Customers\Edit;
use App\Views\Admin\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\User;
class CustomerController
{
  public function index()
  {
    $users = new User();
    $data = $users->getAllCustomer();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
  public function create()
  {
    Header::render();
    Create::render();
    Footer::render();
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
    $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user = new User();
    $data = [
      // 'username' => $_POST['username'],
      // 'password' => $hash_password,
      // 'name' => $_POST['name'],
      // 'email' => $_POST['email'],
      // 'phone' => $_POST['phone'],
      // 'address' => $_POST['address'],
      'role' => $_POST['role'],
      'status' => $_POST['status'],
    ];
    $result = $user->updateUser($id, $data);
    if ($result) {
      NotificationHelper::success('update_customer', 'Cập nhật khách hàng thành công!');
      header("Location: /admin/customer");
    } else {
      NotificationHelper::error('update_customer', 'Cập nhật khách hàng thất bại!');
      header("Location: /admin/customer/edit/$id");
    }
  }
}
