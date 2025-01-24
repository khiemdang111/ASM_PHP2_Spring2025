<?php
namespace App\Controllers\Client;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;
use App\Views\Client\Pages\Product as Index;
use App\Models\Product;

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
}