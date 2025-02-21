<?php
namespace App\Models;

class ProductRecipe extends BaseModel
{
  protected $table = 'product_recipes';
  protected $id = 'id';

  public function getAllProductRecipe(){
    $result = [];
    try {
      $sql = "SELECT product_recipes.id AS product_recipes_id, product_recipes.name as product_recipes_name, products.name as product_name, raw_materials.name AS material_name, ingredients.quantity AS quantity, ingredients.unit AS unit FROM `products` INNER JOIN $this->table ON products.id = product_recipes.product_id INNER JOIN ingredients ON product_recipes.id = ingredients.product_recipes_id INNER JOIN raw_materials ON ingredients.raw_material_id = raw_materials.id;";
      $result = $this->_conn->MySQLi()->query($sql)->fetch_all(MYSQLI_ASSOC);
      return $result;
    } catch (\Throwable $th) {
      error_log('L��i khi lấy tất cả kết quả vòng quay: ' . $th->getMessage());
      return $result;
    }
  }
  public function createProductRecipes($data)
  {
    try {
      $name = $data['name'];
      $product_id = $data['product_id'];
      $sql = "INSERT INTO $this->table (name, product_id) VALUES (?, ?)";
      var_dump($sql);
      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("si", $name, $product_id);
      $stmt->execute();
      return true;
    } catch (\Throwable $th) {
      error_log('Lỗi khi lưu kết quả vòng quay: ' . $th->getMessage());
      return false;
    }
  }
  public function getMaxIdProductRecipes()
  {
    $result = [];
    try {
      $sql = "SELECT MAX(id) as max_id FROM $this->table";
      $result = $this->_conn->MySQLi()->query($sql)->fetch_assoc();
      return $result['max_id'];
    } catch (\Throwable $th) {
      error_log('Lỗi khi lấy id đơn đặt hàng tới cao nhất: ' . $th->getMessage());
      return $result;
    }
  }
  public function createInGredients($data)
  {
    try {
      $id_product_recipes = (int) $data['id_product_recipes'];
      $raw_material_ids = array_map('intval', $data['raw_material_id']);
      $quantities = array_map('floatval', $data['quantity']);
      $units = $data['unit'];

      $sql = "INSERT INTO ingredients (product_recipes_id, raw_material_id, quantity, unit) VALUES (?, ?, ?, ?)";
      // var_dump($sql); die;
      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);
      foreach ($raw_material_ids as $key => $raw_material_id) {
        $quantity = number_format($quantities[$key], 2, '.', ''); // Format về decimal (2 chữ số thập phân)
        $unit = $units[$key];

        $stmt->bind_param("iids", $id_product_recipes, $raw_material_id, $quantity, $unit);
        $stmt->execute();
      }
      return true;
    } catch (\Throwable $th) {
      error_log('Lỗi khi chèn dữ liệu vào bảng product_recipes_details: ' . $th->getMessage());
      return false;
    }
  }
  public function checkRecipesId($idArray)
  {
    $result = [];
    try {
      if (!is_array($idArray) || empty($idArray)) {
        return $result;
      }

      $idArray = array_map('intval', $idArray);

      $placeholders = implode(',', array_fill(0, count($idArray), '?'));
      $sql = "SELECT * FROM $this->table WHERE product_id IN ($placeholders)";

      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);

      $types = str_repeat('i', count($idArray)); // Tạo chuỗi kiểu dữ liệu ('i' cho số nguyên)
      $stmt->bind_param($types, ...$idArray);

      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi lấy dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
  public function checkIngredientId($idArray)
  {
    $result = [];
    try {
      if (!is_array($idArray) || empty($idArray)) {
        return $result;
      }

      $idArray = array_map('intval', $idArray);

      $placeholders = implode(',', array_fill(0, count($idArray), '?'));
      $sql = "SELECT * FROM ingredients WHERE product_recipes_id IN ($placeholders)";
      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);

      $types = str_repeat('i', count($idArray)); // Tạo chuỗi kiểu dữ liệu ('i' cho số nguyên)
      $stmt->bind_param($types, ...$idArray);

      $stmt->execute();
      return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi lấy dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
  public function getIdProduct(int $id)
  {
    $result = [];
    try {
      $sql = "SELECT * FROM $this->table WHERE product_id=?";

      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);

      $stmt->bind_param('i', $id);
      $stmt->execute();
      return $stmt->get_result()->fetch_assoc();
    } catch (\Throwable $th) {
      error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
  public function deleteProductRecipes($id)
  {
    return $this->delete($id);
  }
  public function deleteIngredient($id){
    try {
      $sql = "DELETE FROM ingredients WHERE product_recipes_id=?";
      $conn = $this->_conn->MySQLi();
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $id);
      return $stmt->execute();
    } catch (\Throwable $th) {
      error_log('L��i khi xóa dữ liệu: '. $th->getMessage());
      return false;
    }
  }
}