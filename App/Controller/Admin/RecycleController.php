<?php
namespace App\Controller\Admin;

class RecycleController {
  public function index() {
    header("Location: /View/Admin/pages/recycles/index.php");
    exit();
  }
}