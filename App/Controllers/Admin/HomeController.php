<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Index;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Helpers\NotificationHelper;
use App\Views\Admin\Components\Notification;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\WareHouse;
class HomeController
{
  public function index()
  {
    $userCount = new User();
    $order = new Order();
    $product = new Product();
    $count_order = $order->counOrderTotal();
    $count_total = $userCount->countUserTotal();
    $count_total = $product->countProductTotal();
    $ware = new Warehouse();
    $count_warehouse = $ware->countWarehouseTotal();
    // var_dump($count_warehouse); die;
    $data = [
      'total_user' => $count_total,
      'total_order' => $count_order,
      'total_product' => $count_total,
      'total_warehouse' => $count_warehouse,
    ];
    // echo '<pre>';
    // var_dump($data['total_warehouse']); die;
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
}
