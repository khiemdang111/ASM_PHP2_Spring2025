<?php
namespace App\Controllers\Client;
use App\Views\Client\Index;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;

class HomeController
{
  public function index()
  {
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render();
    Footer::render();
  }
}
