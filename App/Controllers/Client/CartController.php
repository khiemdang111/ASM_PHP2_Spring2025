<?php
namespace App\Controllers\Client;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;
use App\Views\Client\Pages\Cart\Index;
use App\Views\Client\Pages\Cart\Checkout;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Validations\CartValidation;
use App\Models\Order;
use App\Models\Cart;

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

    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    $product_exists = false;
    foreach ($cart as &$item) {
      if ($item['id'] == $product_detail['id']) {
        $item['quantity']++;
        $product_exists = true;
        break;
      }
    }

    if (!$product_exists) {
      $cart[] = [
        'id' => $product_detail['id'],
        'name' => $product_detail['name'],
        'image' => $product_detail['image'],
        'price' => $product_detail['price'],
        'quantity' => 1
      ];
    }

    $cart_json = json_encode($cart);

    setcookie('cart', $cart_json, time() + (3600 * 24 * 30 * 12), "/"); // Cookie có thời hạn 1 năm
    $_SESSION['cart'] = $cart_json;

    header('Location: /cart');
  }
  public function remove($id)
  {
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
  public function checkout()
  {
    // echo '<pre>';
    // var_dump($_POST); die;
    $_SESSION['product_name'] = $_POST['product_name'];
    $is_check = CartValidation::checkCart();
    if (!$is_check) {
      header('Location: /cart');
      exit;
    }
    $data = [
      'id' => $_POST['product_id'],
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

  public function createOrder()
  {
    $_SESSION['product_name'] = $_POST['product_name'];
    $is_valid = CartValidation::checkInfoOrder();
    // if (!$is_valid) {
    //   NotificationHelper::success('create_product', 'Đặt hàng không thành công');
    //   header('Location: /checkout');
    //   exit;
    // }
    $payment = $_POST['payment'];
    $value = $_POST['product_id'];
    $data = [
      'name' => $_POST['name'],
      'email' => $_POST['email'],
      'address' => $_POST['address'],
      'phone' => $_POST['phone'],
      'province' => $_POST['province'],
      'district' => $_POST['district'],
      'ward' => $_POST['ward'],
      // 'product_id' => $_POST['product_id'],
      'total' => $_POST['total'],
      // 'quantity' => $_POST['product_quantity'],
      // 'price' => $_POST['product_price'],
      // 'payment' => $_POST['payment'],
      'user_id' => $_SESSION['user']['id'],
    ];
    $cart = new Cart;
    $cart->removeProduct($value);

    if ($payment === 'LIVE') {
      $order = new Order;
      $order->createOrder($data);
      NotificationHelper::success('success_pay', 'Thanh toán thành công');
      header('Location: /cart');
    }
    if ($payment === 'BANK') {
      $order = new Order;
      $order->createOrder($data);
      $_SESSION['QR'] = "https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=" . $data['total'];
      // NotificationHelper::success('success_pay', 'Thanh toán thành công');
      header('Location: /cart');
    }
    // die;
  }
}