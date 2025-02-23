<?php
namespace App\Controllers\Client;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;
use App\Views\Client\Pages\Auth\Order as Index;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\Order;
class OrderController
{
  public function index()
  {
    Header::render();
    Index::render();
    Footer::render();
  }
  public function waitPay($id)
  {
    $orders = new Order();
    // trạng thái bằng 4 là chưa thanh toán
    $status = 4;
    $_SESSION['check_status'] = $status;
    $order = $orders->getOrderByUserId($id, $status);

    $productAll = $orders->getAllProductByOrderId($order);
    $data = $productAll;
    $data['title'] = 'Đơn hàng chưa thanh toán';

    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    unset($_SESSION['check_status']);
    Footer::render();
  }
  public function workOrder($id)
  {
    $orders = new Order();
    // trạng thái bằng 2 là đang giao hàng
    $status = 2;
    $order = $orders->getOrderByUserId($id, $status);
    $productAll = $orders->getAllProductByOrderId($order);
    $data = $productAll;
    $data['title'] = 'Đơn hàng đang giao';
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
  public function successOrder($id)
  {
    $orders = new Order();
    // trạng thái bằng 1 là giao thành công
    $status = 1;
    $order = $orders->getOrderByUserId($id, $status);
    $productAll = $orders->getAllProductByOrderId($order);
    $data = $productAll;
    $data['title'] = 'Đơn hàng giao thành công';
    // echo '<pre>';
    // var_dump($data); die;
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
  public function cancelOrder($id)
  {
    $orders = new Order();
    // trạng thái bằng 0 là hủy đơn hàng
    $status = 0;
    $order = $orders->getOrderByUserId($id, $status);
    $productAll = $orders->getAllProductByOrderId($order);
    $data = $productAll;
    $data['title'] = 'Đơn hàng đã hủy';
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
}
