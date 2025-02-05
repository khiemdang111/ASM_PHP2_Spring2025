<?php
namespace App\Controllers;
use App\Views\Errors\NotFound;

class ErrorController {

  public function notFound(){
    NotFound::render();
  }
}