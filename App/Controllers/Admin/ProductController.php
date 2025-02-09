<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Products\Index;
use App\Views\Admin\Pages\Products\Create;
use App\Views\Admin\Pages\Products\Edit;
use App\Models\Product;
use App\Models\Category;
use App\Helpers\ProductHelper;
use App\Validations\ProductValidation;
use App\Helpers\NotificationHelper;
use App\Views\Admin\Components\Notification;
class ProductController
{
  public function index()
  {
    $products = new Product();
    $data = $products->getAllProducts();
    Header::render();
    Notification::render();
    //hủy thông báo     
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }

  public function create()
  {
    $categories = new Category();
    $data = $categories->getAllCategories();
    Header::render();
    Notification::render();
    //hủy thông báo     
    NotificationHelper::unset();
    Create::render($data);
    Footer::render();
  }

  public static function store()
  {
    // validation các trường dữ liệu
    $is_valid = ProductValidation::create();
    if (!$is_valid) {
      NotificationHelper::error('store_product', 'Thêm sản phẩm thất bại');
      header('location: /admin/product/create');
      exit;
    }
    $name = $_POST['name'];
    $status = $_POST['status'];
    // Kiểm tra các tên có tồn tại hay chưa
    $product = new Product();
    $is_exist = $product->getOneProductByName($name);
    if ($is_exist) {
      NotificationHelper::error('store_product2', 'Tên sản phẩm này đã tồn tại');
      header('location: /admin/product/create');
      exit;
    }


    // Thêm vào
    $data = [
      'name' => $name,
      'price' => (int) $_POST['price'],
      'discount_price' => (int) $_POST['discount_price'],
      'description' => $_POST['description'],
      'is_featured' => $_POST['is_featured'],
      'status' => $_POST['status'],
      'category_id' => $_POST['category_id'],
    ];
    $is_upload = ProductValidation::uploadImage();
    if ($is_upload) {
      $data['image'] = $is_upload;
    }
    $result = $product->createProduct($data);
    if ($result) {
      NotificationHelper::success('create_product', 'Thêm sản phẩm thành công');
      header('location: /admin/product');
    } else {
      NotificationHelper::error('create_product', 'Thêm sản phẩm thất bại');
      header('location: /admin/product/create');
      exit;
    }
  }
  public function edit($id)
  {
    $products = new Product();
    $categories = new Category();
    $product = $products->getOneProductJoinCategory($id);
    $category = $categories->getAll();
    $data = [
      'product' => $product,
      'categories' => $category
    ];
    // var_dump($data['product']); die;
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Edit::render($data);
    Footer::render();
  }
  public static function update(int $id)
  {

    $is_valid = ProductValidation::edit();
    if (!$is_valid) {
      NotificationHelper::error('update_product2', 'Cập nhật sản phẩm thất bại  !');
      header("Location: /admin/products/$id");
      exit();
    }
    $name = $_POST['name'];
    $product = new product();
    $is_exist = $product->getOneproductByName($name);

    if ($is_exist && $is_exist['id'] != $id) {
      NotificationHelper::error('update_product', 'Tên loại sản phẩm đã tồn tại!');
      header("Location: /admin/products/$id");
      exit();
    }
    $data = [
      'name' => $name,
      'price' => (int) $_POST['price'],
      'discount_price' => (int) $_POST['discount_price'],
      'description' => $_POST['description'],
      'is_featured' => $_POST['is_featured'],
      'status' => $_POST['status'],
      'category_id' => $_POST['category_id'],
    ];
    $is_upload = ProductValidation::updateImage();
    if ($is_upload) {
      $data['image'] = $is_upload;
    }
    $result = $product->updateproduct($id, $data);
    if ($result) {
      NotificationHelper::success('update_products', 'Cập nhật sản phẩm thành công!');
      header("Location: /admin/product");
    } else {
      NotificationHelper::error('update_products', 'Cập nhật sản phẩm thất bại!');
      header("Location: /admin/product/edit/$id");
    }
  }
  public function delete($id)
  {
    $products = new Product();
    $is_exit = $products->getOneProduct($id);
    // var_dump($is_exit['id']); die;
    if ($is_exit && $is_exit['id'] == $id) {
      $data = [
        'status' => 0
      ];
    }else{
      NotificationHelper::error('delete_product', 'Sản phẩm không tồn tại!');
      header("Location: /admin/product");
      exit();
    }
    $result = $products->updateProduct($id, $data);
    if ($result) {
      NotificationHelper::success('delete_product', 'Xóa sản phẩm thành công!');
      header('Location: /admin/product');
    } else {
      NotificationHelper::error('delete_product', 'Xóa sản phẩm thất bại!');
      header("Location: /admin/product");
    }
  }
  public function search(){
    $keyword = trim($_GET['keyword']);
    $_SESSION['keyword'] = $keyword;
    $products = new Product();
    $data = $products->searchProduct($keyword);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
    unset($_SESSION['keyword']);
  }
}
