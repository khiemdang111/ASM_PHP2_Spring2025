<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Orders\Index;
use App\Views\Admin\Pages\Orders\Create;
use App\Views\Admin\Pages\Orders\Edit;
class OrderController
{
  public function index()
  {
    Header::render();
    Index::render();
    Footer::render();
  }

  public function create()
  {
    Header::render();
    Create::render();
    Footer::render();
  }

  public function edit()
  {
    Header::render();
    Edit::render();
    Footer::render();
  }
}
