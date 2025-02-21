<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Warehouses\RawMaterial\RawMaterial;
use App\Views\Admin\Pages\Warehouses\RawMaterial\CreateRawMaterial;
use App\Helpers\NotificationHelper;
use App\Views\Admin\Components\Notification;
use App\Models\Material;
use App\Models\WareHouse;
use App\Validations\WareHouseValidation;
class MaterialController
{
  public function raw_material()
  {
    $raw_metal = new Material();
    $data = $raw_metal->getAllRawMaterial();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    RawMaterial::render($data);
    Footer::render();
  }
  public function createRawmaterial()
  {
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
      'quantity' => $_POST['quantity'],
    ];
    var_dump($data); die;
    $name = $data['name'];
    $unit = $data['unit'];
    $quantity = $data['quantity'];
    $warehouse = new WareHouse();
    $material = new Material();
    $check = $material->checkRawmaterial($name, $unit);
    if ($check['name'] == $name && $check['unit'] === $unit) {
      $date = date('Y-m-d H:i:s');
      $id_rawmaterial = $check['id'];
      $warehouse->updateInventory($id_rawmaterial, $quantity, $date);
    }
    $result = $material->createRawMaterial($data);
    if (!$result) {
      NotificationHelper::error('store_rawmaterial', 'Thêm nguyên liệu thất bại');
      header('location: /admin/warehouse/raw_material/create');
      exit;
    }
    NotificationHelper::success('store_rawmaterial', 'Thêm nguyên liệu thành công');
    header('location: /admin/warehouse/raw_material');
    exit;
  }
}