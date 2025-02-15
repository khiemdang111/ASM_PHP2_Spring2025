<?php
namespace App\Models;

class Order extends BaseModel
{
  protected $table = 'orders';
  protected $id = 'id';
  public function createOrder(array $data)
  {
    return $this->create($data);
  }
  
}