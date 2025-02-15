<?php
namespace App\Models;

class Cart extends BaseModel
{
  public function updateQuantity($id, $field, $value)
  {
    // Lấy dữ liệu giỏ hàng từ cookie
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
    $found = false;
    foreach ($cart as &$item) {
      if ($item['id'] == $id) {
        // Cập nhật trường được chỉ định (ví dụ: quantity)
        if (isset($item[$field])) {
          $item[$field] = $value;
        } else {
          // Trường không tồn tại, thêm trường mới nếu cần
          $item[$field] = $value;
        }
        $found = true;
        break;
      }
    }

    // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới
    if (!$found) {
      $cart[] = [
        'id' => $id,
        $field => $value,
      ];
    }

    setcookie('cart', json_encode($cart), time() + (86400 * 1000), "/"); // Lưu cookie trong 30 ngày

    return true; // Trả về true nếu cập nhật thành công
  }
  public function removeProduct(array $product_id)
  {
    if (isset($_COOKIE['cart'])) {
      $cart = json_decode($_COOKIE['cart'], true);

      if (!is_array($cart)) {
        $cart = [];
      }

      $cart = array_filter($cart, function ($product) use ($product_id) {
        return !in_array($product['id'], $product_id);
      });

      $cart = array_values($cart);

      setcookie('cart', json_encode($cart), time() + (86400 * 30), "/");
    } else {
      echo "Cookie 'cart' không tồn tại.";
    }
  }


}