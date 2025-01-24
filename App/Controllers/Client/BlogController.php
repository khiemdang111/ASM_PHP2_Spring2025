<?php
namespace App\Controllers\Client;
use App\Views\Client\Pages\Blog;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;

class BlogController
{
  public function index()
  {
    Header::render();
    Blog::render();
    Footer::render();
  }
}
