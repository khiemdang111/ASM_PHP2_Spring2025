<?php
namespace App\Controller\Admin;

class PostController {
  public function index() {
    header("Location: /App/View/Admin/pages/posts/index.php");
    exit();
  }
}