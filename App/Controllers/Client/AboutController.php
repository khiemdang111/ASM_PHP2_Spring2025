<?php
namespace App\Controllers\Client;
use App\Views\Client\Pages\About;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;

class AboutController
{
  public function index()
  {
    Header::render();
    About::render();
    Footer::render();
  }
}
