<?php
namespace App\Controllers\Admin;

use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Recycles\Product;
use App\Views\Admin\Pages\Recycles\Post;
use App\Views\Admin\Pages\Recycles\User;
use App\Models\Recycle;

class RecycleController
{
  public function product()
  {
    $table = 'products';
    $products = new Recycle();
    $data = $products->getAllRecyleBy($table);
    Header::render();
    Product::render($data);
    Footer::render();
  }
  public function post()
  {
    $table = 'posts';
    $products = new Recycle();
    $data = $products->getAllRecyleBy($table);
    Header::render();
    Post::render($data);
    Footer::render();
  }
  public function user()
  {
    $table = 'users';
    $products = new Recycle();
    $data = $products->getAllRecyleBy($table);
    Header::render();
    User::render($data);
    Footer::render();
  }
}