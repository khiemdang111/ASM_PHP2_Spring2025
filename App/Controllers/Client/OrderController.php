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
  public function waitPay($id){
    $orders = new Order();
    // trạng thái bằng 4 là chưa thanh toán
    $status = 4;
    $data = $orders->getOrderByUserId($id, $status);
    $data['title'] = 'Đơn hàng chưa thanh toán';
    // echo '<pre>';
    // var_dump($data); die;
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
  public function workOrder($id){
    $orders = new Order();
    // trạng thái bằng 4 là chưa thanh toán
    $status = 2;
    $data = $orders->getOrderByUserId($id, $status);
    $data['title'] = 'Đơn hàng đang giao';
    // echo '<pre>';
    // var_dump($data); die;
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
  public function successOrder($id){
    $orders = new Order();
    // trạng thái bằng 4 là chưa thanh toán
    $status = 1;
    $data = $orders->getOrderByUserId($id, $status);
    $data['title'] = 'Đơn hàng giao thành công';
    // echo '<pre>';
    // var_dump($data); die;
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
  public function cancelOrder($id){
    $orders = new Order();
    // trạng thái bằng 4 là chưa thanh toán
    $status = 0;
    $data = $orders->getOrderByUserId($id, $status);
    $data['title'] = 'Đơn hàng đã hủy';
    // echo '<pre>';
    // var_dump($data); die;
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
}
