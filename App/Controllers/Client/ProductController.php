<?php
namespace App\Controllers\Client;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;
use App\Views\Client\Pages\Product;

class ProductController
{
  public function index()
  {
    Header::render();
    Product::render();
    Footer::render();
  }
}