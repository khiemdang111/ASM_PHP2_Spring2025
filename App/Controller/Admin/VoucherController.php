<?php
namespace App\Controller\Admin;

class VoucherController {
  public function index() {
    header("Location: /View/Admin/pages/vouchers/index.php");
    exit();
  }
}