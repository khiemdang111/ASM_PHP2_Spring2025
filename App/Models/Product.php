<?php
namespace App\Models;

class Product extends BaseModel {
  protected $table = 'products';
  protected $id = 'id';

  public function getAllProducts() {
    return $this->getAll();
  }
}