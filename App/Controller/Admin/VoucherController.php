<?php
namespace App\Controller\Admin;

class VoucherController {
  public function index() {
    header("Location: /App/View/Admin/pages/vouchers/index.php");
    exit();
  }
}