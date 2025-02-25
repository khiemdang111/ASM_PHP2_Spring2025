<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Orders\OrderWait;
use App\Views\Admin\Pages\Orders\OrderWork;
use App\Views\Admin\Pages\Orders\SuccessWork;
use App\Views\Admin\Pages\Orders\CencalWork;
use App\Views\Admin\Pages\Orders\Create;
use App\Views\Admin\Pages\Orders\Edit;
use App\Views\Admin\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\Order;
class OrderController
{
  public function waitPay()
  {
    $order = new Order();
    $status = 4;
    $data = $order->getAllOrderByStatus($status);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    OrderWait::render($data);
    Footer::render();
  }
  public function workOrder()
  {
    $order = new Order();
    $status = 2;
    $data = $order->getAllOrderByStatus($status);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    OrderWork::render($data);
    Footer::render();
  }
  public function successOrder()
  {
    $order = new Order();
    $status = 1;
    $data = $order->getAllOrderByStatus($status);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    SuccessWork::render($data);
    Footer::render();
  }
  public function cancelOrder()
  {
    $order = new Order();
    $status = 0;
    $data = $order->getAllOrderByStatus($status);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    CencalWork::render($data);
    Footer::render();
  }
  public function create()
  {
    Header::render();
    Create::render();
    Footer::render();
  }

  
  public function updateWorkOrder($id)
  {
    $order = new Order();
    $data = [
      'status' => 2,
      'date' => date('Y-m-d H:i:s')
    ];
    $result = $order->updateOrder($id, $data);
    if ($result) {
      NotificationHelper::success('update_order', 'Cập nhật thành công');
      header('Location: /admin/order/work');
    } else{
      NotificationHelper::error('update_order', 'Cập nhật thất bại');
      header('Location: /admin/order/waitpay');
    }
    
  }
  public function updateCancelOrder($id)
  {
    $order = new Order();
    $data = [
      'status' => 0,
      'date' => date('Y-m-d H:i:s')
    ];
    $result = $order->updateOrder($id, $data);
    if ($result) {
      NotificationHelper::success('update_order', 'Cập nhật thành công');
      header('Location: /admin/order/cancel');
    } else{
      NotificationHelper::error('update_order', 'Cập nhật thất bại');
      header('Location: /admin/order/work');
    }
  }
}
