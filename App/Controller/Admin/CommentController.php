<?php
namespace App\Controller\Admin;

class CommentController {
  public function index() {
    header("Location: /View/Admin/pages/comments/index.php");
    exit();
  }
}