<?php
namespace App\Models;

class WareHouse extends BaseModel
{
  protected $table = 'inventories';
  protected $id = 'id';

  public function getAllInventory()
  {
    return $this->getAll();
  }
  public function createRawMaterial($data){
    $table = 'raw_materials';
    return $this->create($data);
  }
}