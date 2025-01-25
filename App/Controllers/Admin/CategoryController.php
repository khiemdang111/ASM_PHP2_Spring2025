<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Categories\Index;
use App\Views\Admin\Pages\Categories\Create;
use App\Views\Admin\Pages\Categories\Edit;
use App\Models\Category;
class CategoryController
{
  public function index()
  {
    $categories = new Category();
    $data = $categories->getAllCategories();
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

  public function edit()
  {
    Header::render();
    Edit::render();
    Footer::render();
  }
}
