<?php
namespace App\Models;

class Category extends BaseModel {
  protected $table = 'categories';
  protected $id = 'id';

  public function getAllCategories() {
    return $this->getAll();
  }
}