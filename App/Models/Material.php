<?php
namespace App\Models;

class Material extends BaseModel
{
  protected $table = 'raw_materials';
  protected $id = 'id';

  public function getAllRawMaterial()
  {
    return $this->getAll();
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
    return $this->create($data);
  }

  public function getMaxRawMaterialId($table_name)
  {
    return $this->getMaxId($table_name);
  }
  public function getOneMaterialById($id){
    return $this->getOne($id);
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
  public function searchMaterial($keyword)
  {
    $result = [];
    try {
      $sql = "SELECT * FROM $this->table WHERE name LIKE '%$keyword%'";
      $result = $this->_conn->MySQLi()->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi tìm kiếm dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
}