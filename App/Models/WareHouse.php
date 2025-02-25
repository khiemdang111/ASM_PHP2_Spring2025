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
      $sql = "SELECT raw_materials.name AS name, MAX(inventories.quantity) AS quantity, MAX(inventories.status) AS status, raw_materials.unit AS unit, raw_materials.id AS materials_id, MAX(inventories.update_at) AS recentdate 
              FROM inventories 
              INNER JOIN raw_materials ON inventories.raw_material_id = raw_materials.id 
              INNER JOIN purchase_order_items ON raw_materials.id = purchase_order_items.raw_material_id 
              INNER JOIN purchase_orders ON purchase_order_items.purchase_order_id = purchase_orders.id 
              GROUP BY raw_materials.id;
              ";
      $result = $this->_conn->MySQLi()->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
  public function getOneInventoryByMaterialId($id)
  {
    $result = [];
    try {
      $sql = "SELECT raw_materials.name AS name, MAX(inventories.quantity) AS quantity, MAX(inventories.status) AS status, raw_materials.unit AS unit, raw_materials.id AS materials_id, MAX(inventories.update_at) AS recentdate 
              FROM inventories 
              INNER JOIN raw_materials ON inventories.raw_material_id = raw_materials.id 
              INNER JOIN purchase_order_items ON raw_materials.id = purchase_order_items.raw_material_id 
              INNER JOIN purchase_orders ON purchase_order_items.purchase_order_id = purchase_orders.id 
              WHERE raw_materials.id = $id;
              ";
      $result = $this->_conn->MySQLi()->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
  // public function getAllRawMaterial()
  // {
  //   $result = [];
  //   try {
  //     $sql = "SELECT * FROM raw_materials WHERE status != 0 AND status != 5 ORDER BY $this->id DESC ";
  //     $result = $this->_conn->MySQLi()->query($sql);
  //     return $result->fetch_all(MYSQLI_ASSOC);
  //   } catch (\Throwable $th) {
  //     error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
  //     return $result;
  //   }
  // }

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

  public function checkQuantityInventory($raw_material_id, $quantity)
  {
    try {
      $raw_material_ids = array_map('intval', (array) $raw_material_id);
      $placeholders = implode(',', array_fill(0, count($raw_material_ids), '?'));

      $sql = "SELECT * FROM $this->table WHERE raw_material_id IN ($placeholders)";

      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);

      if (!$stmt) {
        throw new \Exception("Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error);
      }
      $types = str_repeat('i', count($raw_material_ids)); // 'i' cho kiểu integer
      $stmt->bind_param($types, ...$raw_material_ids);

      $stmt->execute();

      $result = $stmt->get_result();

      $data = [];
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }

      $stmt->close();

      $errors = [];
      foreach ($data as $item) {
        $dbQuantity = number_format((float) $item['quantity'], 2, '.', '');
        $userQuantity = number_format((float) $quantity, 2, '.', '');
        if ($dbQuantity < $userQuantity) {
          $errors[] = [
            'raw_material_id' => $item['raw_material_id'],
            'message' => "Số lượng trong kho không đủ. Có sẵn: {$dbQuantity}, yêu cầu: {$userQuantity}"
          ];
        }
      }

      if (!empty($errors)) {
        return ['status' => 'error', 'errors' => $errors];
      }
      return ['status' => 'success', 'data' => $data];
    } catch (\Throwable $th) {
      error_log('Lỗi khi truy vấn dữ liệu trong bảng inventories: ' . $th->getMessage());
      return ['status' => 'error', 'message' => $th->getMessage()];
    }
  }

  public function updateQuantityInventory($raw_material_id, $quantity)
  {
    try {
      $raw_material_ids = array_map('intval', (array) $raw_material_id);
      $quantities = array_map('floatval', (array) $quantity);

      $sql = "UPDATE `" . $this->table . "` SET quantity = ? WHERE raw_material_id = ?";
      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);

      if (!$stmt) {
        throw new \Exception("Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error);
      }
      foreach ($raw_material_ids as $key => $id) {
        $query = "SELECT quantity FROM `inventories` WHERE raw_material_id = ?";
        $stmtSelect = $conn->prepare($query);
        $stmtSelect->bind_param("i", $id);
        $stmtSelect->execute();
        $stmtSelect->bind_result($currentQuantity);
        $stmtSelect->fetch();
        $stmtSelect->close();
        $newQuantity = number_format(($currentQuantity - $quantities[$key]), 2, '.', '');
        $stmt->bind_param("di", $newQuantity, $id);
        $stmt->execute();
      }
      $stmt->close();
      return true;
    } catch (\Throwable $th) {
      error_log('Lỗi khi cập nhật dữ liệu trong bảng ' . $this->table . ': ' . $th->getMessage());
      return false;
    }
  }
  public function countWarehouseTotal(){
    $result = [];
    try {
        $sql = "SELECT inventories.quantity as quantity, raw_materials.name as name, raw_materials.unit as unit FROM $this->table INNER JOIN raw_materials ON inventories.raw_material_id = raw_materials.id;";
        $result = $this->_conn->MySQLi()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
        error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
        return $result;
    }
  }
}