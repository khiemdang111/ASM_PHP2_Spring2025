<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Customers\Index;
use App\Views\Admin\Pages\Customers\Create;
use App\Views\Admin\Pages\Customers\Edit;
use App\Models\User;
class CustomerController
{
  public function index()
  {
    $users = new User();
    $data = $users->getAllCustomer();
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
