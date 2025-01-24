<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Vouchers\Index;
use App\Views\Admin\Pages\Vouchers\Create;
use App\Views\Admin\Pages\Vouchers\Edit;
class VoucherController
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
