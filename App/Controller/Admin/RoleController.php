<?php
namespace App\Controller\Admin;

class RoleController  {
  public function index() {
    header("Location: /App/View/Admin/pages/roles/index.php");
    exit();
  }
}