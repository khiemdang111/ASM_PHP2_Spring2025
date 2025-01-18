<?php
namespace App\Controller\Admin;

class OrderController {
  public function index() {
    header("Location: /App/View/Admin/pages/orders/index.php");
    exit();
  }
}