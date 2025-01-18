<?php
namespace App\Controller\Admin;

class ProductController {
  public function index() {
    header("Location: /App/View/Admin/pages/products/index.php");
    exit();
  }
}