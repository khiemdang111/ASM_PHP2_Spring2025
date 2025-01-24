<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Roles\Index;

class RoleController
{
  public function index()
  {
    Header::render();
    Index::render();
    Footer::render();
  }
}