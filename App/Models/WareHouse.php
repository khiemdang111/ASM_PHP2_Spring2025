<?php
namespace App\Models;

class WareHouse extends BaseModel
{
  protected $table = 'inventories';
  protected $id = 'id';

  public function getAllInventory()
  {
    $result = [];
    try {
      $sql = "SELECT raw_materials.name AS name,inventories.quantity AS quantity,inventories.status as status, inventories.update_at as recentdate FROM inventories INNER JOIN raw_materials ON inventories.raw_material_id = raw_materials.id INNER JOIN purchase_order_items ON raw_materials.id = purchase_order_items.raw_material_id INNER JOIN purchase_orders ON purchase_order_items.purchase_order_id = purchase_orders.id";
      $result = $this->_conn->MySQLi()->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
  public function getAllRawMaterial()
  {
    $result = [];
    try {
      $sql = "SELECT * FROM raw_materials WHERE status != 0 AND status != 5 ORDER BY $this->id DESC ";
      $result = $this->_conn->MySQLi()->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
  public function createInventory($data)
  {
    return $this->create($data);
  }
  public function updateInventory($id, $quantity, $date)
  {
    $sql = "UPDATE $this->table SET quantity = ?, update_at = ? WHERE raw_material_id = ?";
    $conn = $this->_conn->MySQLi();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isi', $quantity, $date, $id);
    return $stmt->execute();
  }

  public function checkRawmaterial($name, $unit)
  {
    $result = [];
    try {
      $sql = "SELECT * FROM raw_materials WHERE name=? AND unit=?";
      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);

      $stmt->bind_param('ss', $name, $unit);
      $stmt->execute();
      return $stmt->get_result()->fetch_assoc();
    } catch (\Throwable $th) {
      error_log('Lỗi khi lấy bằng tên: ' . $th->getMessage());
      return $result;
    }
  }
  public function createRawMaterial($data)
  {
    try {
      $sql = "INSERT INTO raw_materials (";
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
  public function checkIdRawmaterial($id)
  {
    $result = [];
    try {
      $sql = "SELECT * FROM inventories WHERE raw_material_id=?";
      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);

      $stmt->bind_param('i', $id);
      $stmt->execute();
      return $stmt->get_result()->fetch_assoc();
    } catch (\Throwable $th) {
      error_log('Lỗi khi lấy bằng tên: ' . $th->getMessage());
      return $result;
    }
  }
  public function getMaxRawMaterialId()
  {
    $result = [];
    try {
      $sql = "SELECT MAX(id) as max_id FROM raw_materials";
      $result = $this->_conn->MySQLi()->query($sql)->fetch_assoc();
      return $result['max_id'];
    } catch (\Throwable $th) {
      error_log('L��i khi lấy id đơn đặt hàng tới cao nhất: ' . $th->getMessage());
      return $result;
    }
  }
}