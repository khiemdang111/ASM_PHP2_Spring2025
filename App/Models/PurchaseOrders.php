<?php
namespace App\Models;

class PurchaseOrders extends BaseModel
{
  protected $table = 'purchase_orders';
  protected $id = 'id';

  public function getAllInventory()
  {
    return $this->getAll();
  }
  public function createPurchaseOrders(array $data)
  {
    return $this->create($data);
  }
  public function getMaxPurchaseOrdersId($table_name)
  {
    return $this->getMaxId($table_name);
  }
  // public function updateInventory($id, $quantity)
  // {
  //   $sql = "UPDATE $this->table SET quantity = ? WHERE id = ?";
  //   $conn = $this->_conn->MySQLi();
  //   $stmt = $conn->prepare($sql);
  //   $stmt->bind_param('ii', $quantity, $id);
  //   return $stmt->execute();
  // }
  // public function checkRawmaterial($name, $unit)
  // {
  //   $result = [];
  //   try {
  //     $sql = "SELECT * FROM raw_materials WHERE name=? AND unit=?";
  //     $conn = $this->_conn->MySQLi();
  //     $stmt = $conn->prepare($sql);

  //     $stmt->bind_param('ss', $name, $unit);
  //     $stmt->execute();
  //     return $stmt->get_result()->fetch_assoc();
  //   } catch (\Throwable $th) {
  //     error_log('Lỗi khi lấy bằng tên: ' . $th->getMessage());
  //     return $result;
  //   }
  // }
  public function createPurchaseOrderItems($data)
  {
    try {
      $sql = "INSERT INTO purchase_order_items (";
      foreach ($data as $key => $value) {
        $sql .= "$key, ";
      }
      // INSERT INTO $this->table (name, description, status, 
      $sql = rtrim($sql, ", ");
      // INSERT INTO $this->table (name, description, status
      $sql .= " ) VALUES (";
      // INSERT INTO $this->table (name, description, status) VALUES (
      foreach ($data as $key => $value) {
        $sql .= "'$value', ";
      }

      // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1', 
      $sql = rtrim($sql, ", ");
      // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1'

      $sql .= ")";
      // INSERT INTO $this->table (name, description, status) VALUES ('category test', 'category test description', '1')
      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);

      return $stmt->execute();
    } catch (\Throwable $th) {
      error_log('Lỗi khi thêm dữ liệu: ' . $th->getMessage());
      return false;
    }
  }
}