<?php
namespace App\Controllers\Client;
use App\Views\Client\Index;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;

class HomeController
{
  public function index()
  {
    Header::render();
    Index::render();
    Footer::render();
  }
  public function about()
  {
    header("Location: App/View/Client/Pages/about.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function service()
  {
    header("Location: App/View/Client/Pages/service.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function blog()
  {
    header("Location: App/View/Client/Pages/blog.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
  public function contact()
  {
    header("Location: App/View/Client/Pages/contact.php");
    exit; // Dừng thực thi sau khi chuyển hướng
  }
}
