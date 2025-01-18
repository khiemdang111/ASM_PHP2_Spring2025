<?php
namespace App\Controller\Admin;

class CategoryController  {
  public function index() {
    header("Location: /App/View/Admin/Pages/categories/index.php");
    exit();
  }
}