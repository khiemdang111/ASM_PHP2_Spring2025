<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Categories\Index;
use App\Views\Admin\Pages\Categories\Create;
use App\Views\Admin\Pages\Categories\Edit;
use App\Models\Category;
use App\Helpers\NotificationHelper;
use App\Validations\CategoryValidation;
use App\Validations\ProductValidation;
use App\Views\Admin\Components\Notification;
class CategoryController
{
  public function index()
  {
    $categories = new Category();
    $data = $categories->getAllCategories();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }

  public function create()
  {
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Create::render();
    Footer::render();
  }
  public static function store()
  {
    // validation các trường dữ liệu
    $is_valid = CategoryValidation::create();
    if (!$is_valid) {
      NotificationHelper::error('store_category', 'Thêm sản phẩm thất bại');
      header('location: /admin/category/create');
      exit;
    }
    $name = $_POST['name'];
    $status = $_POST['status'];
    // Kiểm tra các tên có tồn tại hay chưa
    $category = new Category();
    $is_exist = $category->getOneCategoryByName($name);
    if ($is_exist) {
      NotificationHelper::error('store_category2', 'Tên sản phẩm này đã tồn tại');
      header('location: /admin/category/create');
      exit;
    }

    $data = [
      'name' => $name,
      'description' => $_POST['description'],
      'status' => $_POST['status'],
    ];
    $is_upload = ProductValidation::uploadImage();
    if ($is_upload) {
      $data['image'] = $is_upload;
    }
    $result = $category->createCategory($data);
    if ($result) {
      NotificationHelper::success('create_category', 'Thêm sản phẩm thành công');
      header('location: /admin/category');
    } else {
      NotificationHelper::error('create_category', 'Thêm sản phẩm thất bại');
      header('location: /admin/category/create');
      exit;
    }
  }

  public function edit($id)
  {
    $categories = new Category();
    $data = $categories->getOneCategory($id);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Edit::render($data);
    Footer::render();
  }
  public static function update(int $id)
  {

    $is_valid = CategoryValidation::edit();
    if (!$is_valid) {
      NotificationHelper::error('update_product2', 'Cập nhật sản phẩm thất bại  !');
      header("Location: /admin/category/$id");
      exit();
    }
    $name = $_POST['name'];
    $category = new Category();
    $is_exist = $category->getOneCategoryByName($name);

    if ($is_exist && $is_exist['id'] != $id) {
      NotificationHelper::error('update_category', 'Tên loại sản phẩm đã tồn tại!');
      header("Location: /admin/category/$id");
      exit();
    }
    $data = [
      'name' => $name,
      'description' => $_POST['description'],
      'status' => $_POST['status'],
    ];
    $is_upload = ProductValidation::updateImage();
    if ($is_upload) {
      $data['image'] = $is_upload;
    }
    $result = $category->updateCategory($id, $data);
    if ($result) {
      NotificationHelper::success('update_category', 'Cập nhật sản phẩm thành công!');
      header("Location: /admin/category");
    } else {
      NotificationHelper::error('update_category', 'Cập nhật sản phẩm thất bại!');
      header("Location: /admin/category/edit/$id");
    }
  }
  public function delete($id)
  {
    $category = new Category();
    $is_exit = $category->getOneCategory($id);
    // var_dump($is_exit['id']); die;
    if ($is_exit && $is_exit['id'] == $id) {
      $data = [
        'status' => 0
      ];
    }else{
      NotificationHelper::error('delete_category', 'Sản phẩm không tồn tại!');
      header("Location: /admin/category");
      exit();
    }
    $result = $category->updateCategory($id, $data);
    if ($result) {
      NotificationHelper::success('delete_category', 'Xóa sản phẩm thành công!');
      header('Location: /admin/category');
    } else {
      NotificationHelper::error('delete_category', 'Xóa sản phẩm thất bại!');
      header("Location: /admin/category");
    }
  }
  public function search(){
    $keyword = trim($_GET['keyword']);
    $_SESSION['keyword'] = $keyword;
    $categories = new Category();
    $data = $categories->searchCategory($keyword);
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
    unset($_SESSION['keyword']);
  }
}
