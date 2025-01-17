<?php
namespace App\Controller\Admin;

class RoleController  {
  public function index() {
    header("Location: /View/Admin/pages/roles/index.php");
    exit();
  }
}