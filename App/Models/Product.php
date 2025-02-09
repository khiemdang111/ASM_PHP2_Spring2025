<?php
namespace App\Models;

class Product extends BaseModel
{
  protected $table = 'products';
  protected $id = 'id';

  public function getAllProducts()
  {
    return $this->getAll();
  }
  public function changeStatus($id, $data)
  {
    return $this->update($id, $data);
  }
  public function getOneProductByName($name)
  {
    return $this->getOneByName($name);
  }
  public function createProduct($data)
  {
    return $this->create($data);
  }
}