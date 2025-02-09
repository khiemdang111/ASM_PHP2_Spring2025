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
  public function edit()
  {
    Header::render();
    Edit::render();
    Footer::render();
  }
}
