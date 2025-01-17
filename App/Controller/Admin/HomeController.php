<?php
namespace App\Controller\Admin;

class HomeController {
  public function index() {
    header("Location: /View/Admin/index.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
}
