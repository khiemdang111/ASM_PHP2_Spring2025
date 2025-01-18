<?php
namespace App\Controller\Client;

class HomeController {
  public function index() {
    header("Location: App/View/Client/index.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function about() {
    header("Location: App/View/Client/Pages/about.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function service() {
    header("Location: App/View/Client/Pages/service.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function blog() {
    header("Location: App/View/Client/Pages/blog.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function contact() {
    header("Location: App/View/Client/Pages/contact.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
}
