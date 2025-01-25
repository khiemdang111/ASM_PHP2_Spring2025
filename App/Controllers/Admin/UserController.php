<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Users\Index;
use App\Views\Admin\Pages\Users\Create;
use App\Models\User;

class UserController
{
  public function index()
  {
    $users = new User();
    $data = $users->getAllUser();
    Header::render();
    Index::render($data);
    Footer::render();
  }
  public function create()
  {
    Header::render();
    Create::render();
    Footer::render();
  }
}