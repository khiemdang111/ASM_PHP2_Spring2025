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
  public function getOneProduct($id)
  {
    return $this->getOne($id);
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
  public function getOneProductJoinCategory($id)
  {
    $result = [];
    try {
      $sql = "SELECT products.*, categories.name AS category_name 
                 FROM products 
                 INNER JOIN categories ON products.category_id = categories.id WHERE products.id = $id";
      $result = $this->_conn->MySQLi()->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
  public function updateProduct($id, $data)
  {
    return $this->update($id, $data);
  }
  public function deleteProduct($id){
    return $this->delete($id);
  }
  public function searchProduct($keyword){
    $result = [];
    try {
      $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%' OR price LIKE '%$keyword%'";
      $result = $this->_conn->MySQLi()->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi tìm kiếm dữ liệu: '. $th->getMessage());
      return $result;
    }
  }
}