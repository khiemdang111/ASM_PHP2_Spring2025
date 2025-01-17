<?php
namespace App\Controller\Admin;

class CustomerController {
  public function index() {
    header("Location: /View/Admin/pages/customers/index.php");
    exit();
  }
}