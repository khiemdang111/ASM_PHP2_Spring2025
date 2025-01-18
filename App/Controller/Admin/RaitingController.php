<?php
namespace App\Controller\Admin;

class RaitingController {
  public function index() {
    header("Location: /App/View/Admin/pages/raitings/index.php");
    exit();
  }
}