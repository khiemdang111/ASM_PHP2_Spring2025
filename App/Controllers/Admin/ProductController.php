<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Products\Index;
use App\Views\Admin\Pages\Products\Create;
use App\Views\Admin\Pages\Products\Edit;
use App\Models\Product;
use App\Models\Category;
class ProductController
{
  public function index()
  {
    $products = new Product();
    $data = $products->getAllProducts();
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
