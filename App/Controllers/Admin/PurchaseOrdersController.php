<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Warehouses\PurchaseOrders\Index;
use App\Views\Admin\Pages\Warehouses\PurchaseOrders\Create;
use App\Helpers\NotificationHelper;
use App\Views\Admin\Components\Notification;
use App\Models\WareHouse;
use App\Models\Material;
use App\Models\PurchaseOrders;
use App\Validations\WareHouseValidation;
class PurchaseOrdersController
{
  public function index()
  {
    $order = new PurchaseOrders();
    $data = $order->getAllPurchasesOrder();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }

  public function createPurchaseOrders()
  {
    $raw_metal = new Material();
    $warehouse = new WareHouse();
    $data = $raw_metal->getAllRawMaterial();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Create::render($data);
    Footer::render();
  }
  public function storePurchaseOrder()
  {
    $is_valid = WareHouseValidation::createPurchaseOrder();
    if (!$is_valid) {
      NotificationHelper::error('store_rawmaterial', 'Nhập đơn hàng thất bại');
      header('location: /admin/warehouse/create');
      exit;
    }
    if ($_POST['unit'] == 'Tấn') {
      $unit_update = 'Kg';
      $quantity_update = $_POST['quantity'] * 1000;
    } else if ($_POST['unit'] == 'Gr') {
      $unit_update = 'Kg';
      $quantity_update = $_POST['quantity'] / 1000;
    } else if ($_POST['unit'] == 'Ml') {
      $unit_update = 'L';
      $quantity_update = $_POST['quantity'] / 1000;
    } else {
      $unit_update = $_POST['unit'];
      $quantity_update = $_POST['quantity'];
    }
    $data = [
      'name' => $_POST['name'],
      'unit' => $unit_update,
      'unit_price' => $_POST['unit_price'],
      'quantity' => $quantity_update,
      'date' => $_POST['date'],
      'status' => $_POST['status'],
    ];
    $name = $data['name'];
    $unit = $data['unit'];
    $quantity = (int) $data['quantity'];

    $date = date('Y-m-d H:i:s');
    $material = new Material();
    $warehouse = new WareHouse();
    $check = $material->checkRawmaterial($name, $unit);
    // echo "<pre>";
    if ($check != false || $check != NULL) {
      if ($check['name'] == $name && $check['unit'] === $unit) {
        $id_rawmaterial = $check['id'];
      }
    } else {
      $dataRawMaterial = [
        'name' => $data['name'],
        'unit' => $data['unit'],
      ];
      $result = $material->createRawMaterial($dataRawMaterial);
      $table_name = 'raw_materials';
      $id_rawmaterial = $material->getMaxRawMaterialId($table_name) ? $material->getMaxRawMaterialId($table_name) : 1;
      if (!$result) {
        NotificationHelper::error('store_rawmaterial', 'Thêm nguyên liệu thất bại');
        header('location: /admin/warehouse/raw_material/create');
        exit;
      }
    }
    $data_purchase_orders = [
      'name' => $data['name'],
      'status' => (int) $data['status'],
      'date' => $data['date'],
    ];
    $purchaseOrders = new PurchaseOrders();
    $result_purchase_orders = $purchaseOrders->createPurchaseOrders($data_purchase_orders);

    $table_name_purchase = 'purchase_orders';
    $order_id_max = $purchaseOrders->getMaxPurchaseOrdersId($table_name_purchase) ? $purchaseOrders->getMaxPurchaseOrdersId($table_name_purchase) : 1;
    $order_id = (int) $order_id_max;
    $data_purchase_order_items = [
      'quantity' => (int) $data['quantity'],
      'unit_price' => (int) $data['unit_price'],
      'purchase_order_id' => $order_id,
      'raw_material_id' => $id_rawmaterial,
    ];
    $checkIdMaterial = $material->checkIdRawmaterial($id_rawmaterial);
    if ($checkIdMaterial) {
      $quantityUpdate = $checkIdMaterial['quantity'] + $quantity;
      $updateInventory = $warehouse->updateInventory($id_rawmaterial, $quantityUpdate, $date);
      if (!$updateInventory) {
        NotificationHelper::error('store_rawmaterial', 'Cập nhật sản phẩm vào kho thất bại');
        header('location: /admin/warehouse/create');
        exit;
      }
    } else {
      $dataInventory = [
        'quantity' => (int) $data['quantity'],
        'raw_material_id' => (int) $id_rawmaterial
      ];
      $createInventory = $warehouse->createInventory($dataInventory);
      if (!$createInventory) {
        NotificationHelper::error('store_rawmaterial', 'Thêm sản phẩm vào kho thất bại');
        header('location: /admin/warehouse/create');
        exit;
      }
    }
    $createPurchaseOrderItems = $purchaseOrders->createPurchaseOrderItems($data_purchase_order_items);
    if (!$result_purchase_orders || !$createPurchaseOrderItems) {
      NotificationHelper::error('store_purchase_order', 'Tạo đơn hàng thất bại');
      header('location: /admin/warehouse/create');
      exit;
    } else {
      NotificationHelper::success('store_purchase_order', 'Tạo đơn hàng thành công');
      header('location: /admin/warehouse/create');
      exit;
    }
  }
}