<?php
namespace App\Controllers\Admin;

use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Recycles\Product;
use App\Views\Admin\Pages\Recycles\Post;
use App\Views\Admin\Pages\Recycles\User;
use App\Views\Admin\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\Recycle;

class RecycleController
{
  public function product()
  {
    $table = 'products';
    $products = new Recycle();
    $data = $products->getAllRecyleBy($table);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Product::render($data);
    Footer::render();
  }
  public function post()
  {
    $table = 'posts';
    $products = new Recycle();
    $data = $products->getAllRecyleBy($table);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Post::render($data);
    Footer::render();
  }
  public function user()
  {
    $table = 'users';
    $products = new Recycle();
    $data = $products->getAllRecyleBy($table);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    User::render($data);
    Footer::render();
  }
  public function restore($id)
  {
    $table = $_POST['table'];
    $url = $_POST['urlTable'];
    $recycles = new Recycle();
    $data = $recycles->restore($id, $table);
    if ($data) {
      NotificationHelper::success('delete_recycle', 'Khôi phục sản phẩm thành công!');
      header("Location: /admin/recycle/$url");
    } else {
      NotificationHelper::error('delete_recycle', 'Khôi phục sản phẩm thất bại!');
      header("Location: /admin/recycle/$url");
    }
  }
  public function deletePermanently($id)
  {
    $table = $_POST['table'];
    $url = $_POST['urlTable'];
    $recycles = new Recycle();
    $data = $recycles->deletePermanently($id, $table);
    if ($data) {
      NotificationHelper::success('delete_recycle', 'Xóa sản phẩm thành công!');
      header("Location: /admin/recycle/$url");
    } else {
      NotificationHelper::error('delete_recycle', 'Xóa sản phẩm thất bại!');
      header("Location: /admin/recycle/$url");
    }
  }
}