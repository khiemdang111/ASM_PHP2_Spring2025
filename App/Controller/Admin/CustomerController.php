<?php
namespace App\Controller\Admin;

class CustomerController {
  public function index() {
    header("Location: /App/View/Admin/pages/customers/index.php");
    exit();
  }
}