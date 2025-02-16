<?php
namespace App\Models;
use Exception;
use PDO;
use PDOException;

class Order extends BaseModel
{
  protected $table = 'orders';
  protected $id = 'id';
  public function createOrder(array $data)
  {
    return $this->create($data);
  }

  public function getOrderByUserId($id, $status)
  {
    $result = [];
    try {
      $sql = "SELECT * FROM orders WHERE id = $id AND status = $status";
      $result = $this->_conn->MySQLi()->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    } catch (\Throwable $th) {
      error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
      return $result;
    }
  }
  function getMaxOrderId()
  {
    $query = "SELECT MAX(id) as max_id FROM orders";
    if (!$this->_conn) {
      throw new Exception("Lỗi kết nối cơ sở dữ liệu");
    }
    $stmt = $this->_conn->MySQLi()->query($query);
    if (!$stmt) {
      throw new Exception("Lỗi truy vấn: " . $this->_conn->MySQLi()->error);
    }
    $row = $stmt->fetch_assoc();
    $stmt->close();
    return $row['max_id'] ? (int) $row['max_id'] : 1;
  }
  function createOrderDetail($data)
  {
    // Kiểm tra dữ liệu đầu vào
    $requiredFields = ['product_id', 'quantity', 'price', 'order_id'];
    foreach ($requiredFields as $field) {
      if (!isset($data[$field]) || !is_array($data[$field])) {
        throw new Exception("Thiếu hoặc dữ liệu không hợp lệ: {$field}");
      }
    }

    // Đảm bảo tất cả các mảng có cùng số lượng phần tử
    $arrayLengths = array_map('count', $data);
    if (count(array_unique($arrayLengths)) !== 1) {
      throw new Exception("Các mảng dữ liệu không có cùng số lượng phần tử.");
    }

    try {
      $pdo = $this->_conn->Pdo();
      // Bắt đầu transaction
      $pdo->beginTransaction();

      // Chuẩn bị câu lệnh SQL
      $sql = "INSERT INTO order_details (quantity, price, product_id, order_id) VALUES (:quantity, :price, :product_id, :order_id)";
      $stmt = $pdo->prepare($sql);

      // Lấy thông tin từ mảng đầu vào
      $product_ids = $data['product_id'];
      $quantities = $data['quantity'];
      $prices = $data['price'];
      $order_ids = $data['order_id'];

      // Xử lý từng sản phẩm trong đơn hàng
      foreach ($product_ids as $index => $product_id) {
        // Làm sạch và kiểm tra dữ liệu
        $product_id = (int) filter_var($product_id, FILTER_VALIDATE_INT);
        $quantity = (int) filter_var($quantities[$index], FILTER_VALIDATE_INT);
        $price = (int) (filter_var(str_replace(',', '', $prices[$index]), FILTER_VALIDATE_FLOAT) * 100);
        $order_id = (int) $order_ids[$index];

        if ($product_id <= 0 || $quantity <= 0 || $price <= 0 || $order_id <= 0) {
          throw new Exception("Dữ liệu không hợp lệ tại sản phẩm thứ " . ($index + 1));
        }

        // Thực thi truy vấn
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);

        if (!$stmt->execute()) {
          throw new Exception("Lỗi khi thêm chi tiết đơn hàng.");
        }
      }

      // Commit transaction
      $pdo->commit();
    } catch (PDOException $e) {
      // Rollback nếu có lỗi
      if ($pdo) {
        $pdo->rollBack();
      }
      throw new Exception("Lỗi PDO khi thêm chi tiết đơn hàng: " . $e->getMessage());
    } catch (Exception $e) {
      // Rollback nếu có lỗi
      if ($pdo) {
        $pdo->rollBack();
      }
      throw new Exception("Lỗi khi thêm chi tiết đơn hàng: " . $e->getMessage());
    }
  }
  // var_dump($order_id); var_dump($price); var_dump($quantity);  var_dump($product_id);   

}