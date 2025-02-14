<?php
namespace App\Controllers\Client;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;
use App\Views\Client\Pages\Cart\Index;
use App\Views\Client\Pages\Cart\Checkout;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\Product;


class CartController
{
  public function index()
  {
    $data = json_decode($_COOKIE['cart'], true);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
  public function addToCart($id)
  {
      $product = new Product();
      $product_detail = $product->getOneProductByStatus($id);

      // Lấy giỏ hàng hiện tại từ cookie (nếu có)
      $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

      // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
      $product_exists = false;
      foreach ($cart as &$item) {
          if ($item['id'] == $product_detail['id']) {
              $item['quantity']++;  // Nếu có, tăng số lượng lên 1
              $product_exists = true;
              break;
          }
      }

      // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
      if (!$product_exists) {
          $cart[] = [
              'id' => $product_detail['id'],
              'name' => $product_detail['name'],
              'image' => $product_detail['image'],
              'price' => $product_detail['price'],
              'quantity' => 1
          ];
      }

      // Mã hóa giỏ hàng thành JSON
      $cart_json = json_encode($cart);

      // Lưu giỏ hàng vào cookie và session
      setcookie('cart', $cart_json, time() + (3600 * 24 * 30 * 12), "/"); // Cookie có thời hạn 1 năm
      $_SESSION['cart'] = $cart_json;

      // Chuyển hướng tới trang giỏ hàng
      header('Location: /cart');
  }
  public function remove($id){
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    foreach ($cart as $key => $item) {
        if ($item['id'] == $id) {
            unset($cart[$key]);
            break;
        }
    }
    $cart_json = json_encode($cart);
    setcookie('cart', $cart_json, time() + (3600 * 24 * 30 * 12), "/"); // Cookie có th��i hạn 1 năm
    $_SESSION['cart'] = $cart_json;
    header('Location: /cart');
  }
  public function checkout(){
    // var_dump($_POST); die;
    $data = [
      'name' => $_POST['product_name'],
      'price' => $_POST['product_price'],
      'quantity' => $_POST['product_quantity'],
    ];
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Checkout::render($data);
    Footer::render();
  }

}