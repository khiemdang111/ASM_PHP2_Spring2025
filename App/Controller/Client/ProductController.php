<?php
namespace App\Controller\Client;

class ProductController {
  public function index() {
    header("Location: View/Client/Pages/product.php");
    exit();
  }
}