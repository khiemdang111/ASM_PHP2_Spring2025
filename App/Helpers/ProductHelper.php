<?php

namespace App\Helpers;
use App\Models\Product;
class ProductHelper
{

  public static function deleteProductCart($id)
  {
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Tìm và xóa sản phẩm trong giỏ hàng dựa vào id
    foreach ($cart as $key => $item) {
      if ($item['id'] == $id) {
        unset($cart[$key]);  // Xóa sản phẩm khỏi giỏ hàng
        break;
      }
    }

    // Kiểm tra nếu giỏ hàng không trống sau khi xóa sản phẩm
    if (!empty($cart)) {
      // Mã hóa giỏ hàng thành JSON và lưu lại
      $cart_json = json_encode(array_values($cart)); // Dùng array_values để đảm bảo các chỉ số mảng liên tiếp
      setcookie('cart', $cart_json, time() + (3600 * 24 * 30 * 12), "/"); // Cập nhật cookie
      $_SESSION['cart'] = $cart_json;  // Cập nhật session
    } else {
      // Nếu giỏ hàng trống, xóa cookie và session
      setcookie('cart', '', time() - 3600, "/"); // Xóa cookie
      unset($_SESSION['cart']);  // Xóa session
    }

    header('Location: /cart');
  }
}
