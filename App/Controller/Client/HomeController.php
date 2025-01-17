<?php
namespace App\Controller\Client;

class HomeController {
  public function index() {
    header("Location: View/Client/index.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function about() {
    header("Location: View/Client/Pages/about.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function service() {
    header("Location: View/Client/Pages/service.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function blog() {
    header("Location: View/Client/Pages/blog.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function contact() {
    header("Location: View/Client/Pages/contact.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
}
