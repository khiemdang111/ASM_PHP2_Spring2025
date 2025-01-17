<?php
namespace App\Controller\Admin;

class RaitingController {
  public function index() {
    header("Location: /View/Admin/pages/raitings/index.php");
    exit();
  }
}