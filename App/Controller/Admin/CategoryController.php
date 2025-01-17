<?php
namespace App\Controller\Admin;

class CategoryController  {
  public function index() {
    header("Location: /View/Admin/Pages/categories/index.php");
    exit();
  }
}