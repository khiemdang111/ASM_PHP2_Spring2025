<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Index;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;

class HomeController
{
  public function index()
  {
    Header::render();
    Index::render();
    Footer::render();
  }
}
