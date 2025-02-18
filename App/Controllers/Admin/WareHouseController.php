<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Warehouses\Index;
use App\Views\Admin\Pages\Warehouses\RawMaterial\RawMaterial;
use App\Views\Admin\Pages\Warehouses\RawMaterial\CreateRawMaterial;
use App\Helpers\NotificationHelper;
use App\Views\Admin\Components\Notification;
use App\Models\WareHouse;
use App\Validations\WareHouseValidation;
class WareHouseController
{
  public function index()
  {
    $products = new WareHouse();
    $data = $products->getAll();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }

  public function raw_material()
  {
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    RawMaterial::render();
    Footer::render();
  }
  public function createRawmaterial()
  {
    // $is_valid = WareHouseValidation::createRawmaterial();
    // if (!$is_valid) {
    //   NotificationHelper::error('store_Rawmaterial', 'Thêm sản phẩm thất bại');
    //   header('location: /admin/warehouse/raw_material/create');
    //   exit;
    // }
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    CreateRawMaterial::render();
    Footer::render();
  }
  public function storeRawmaterial()
  {
    $is_valid = WareHouseValidation::createRawmaterial();
    if (!$is_valid) {
      NotificationHelper::error('store_rawmaterial', 'Thêm nguyên liệu thất bại');
      header('location: /admin/warehouse/raw_material/create');
      exit;
    }
    $data = [
      'name' => $_POST['name'],
      'unit' => $_POST['unit'],
      'min_stock_level' => $_POST['min_stock_level'],
      'max_stock_level' => $_POST['max_stock_level']
    ];
    $warehouse = new WareHouse();
    $result = $warehouse->createRawMaterial($data);
    if(!$result){
      NotificationHelper::error('store_rawmaterial', 'Thêm nguyên liệu thất bại');
      header('location: /admin/warehouse/raw_material/create');
      exit;
    }
    NotificationHelper::success('store_rawmaterial', 'Thêm nguyên liệu thành công');
    header('location: /admin/warehouse/raw_material');
    exit;
  }
}