<?php
namespace App\Controllers\Client;
use App\Views\Client\Pages\Contact;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;

class ContactController
{
  public function index()
  {
    Header::render();
    Contact::render();
    Footer::render();
  }
}
