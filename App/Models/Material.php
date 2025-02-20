<?php
namespace App\Models;

class Material extends BaseModel
{
  protected $table = 'raw_materials';
  protected $id = 'id';

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
  public function getOneMaterialById($id){
    return $this->getOne($id);
  }
}