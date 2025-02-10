<?php
namespace App\Models;

class Category extends BaseModel
{
  protected $table = 'categories';
  protected $id = 'id';

  public function getAllCategories()
  {
    return $this->getAll();
  }
  public function createCategory($data)
  {
    return $this->create($data);
  }
  public function getOneCategoryByName($name)
  {
    return $this->getOneByName($name);
  }
  public function getOneCategory($id)
  {
    return $this->getOne($id);
  }
  public function updateCategory($id, $data)
  {
    return $this->update($id, $data);
  }
  public function getCategoryInnerJoinProduct()
  {
    $result = [];
    try {
      $sql = "SELECT products.*, categories.name AS category_name 
                 FROM products 
                 INNER JOIN categories ON products.category_id = categories.id WHERE categories.status != 0";
      $result = $this->_conn->MySQLi()->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
  public function searchCategory($keyword){
    $result = [];
    try {
      $sql = "SELECT * FROM categories WHERE name LIKE '%$keyword%'";
      $result = $this->_conn->MySQLi()->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi tìm kiếm dữ liệu: '. $th->getMessage());
      return $result;
    }
  }
}