<?php
namespace App\Controllers\Client;
use App\Views\Client\Pages\Service;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;

class ServiceController
{
  public function index()
  {
    Header::render();
    Service::render();
    Footer::render();
  }
}
