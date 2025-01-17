<?php
namespace App\Controller\Admin;

class OrderController {
  public function index() {
    header("Location: /View/Admin/pages/orders/index.php");
    exit();
  }
}