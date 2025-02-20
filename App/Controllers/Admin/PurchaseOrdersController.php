<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Warehouses\Index;
// use App\Views\Admin\Pages\Warehouses\PurchaseOrders\Index;
use App\Views\Admin\Pages\Warehouses\PurchaseOrders\Create;
use App\Helpers\NotificationHelper;
use App\Views\Admin\Components\Notification;
use App\Models\WareHouse;
use App\Models\PurchaseOrders;
use App\Validations\WareHouseValidation;
use App\Helpers\WareHouseHelper;
class PurchaseOrdersController
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

  public function createPurchaseOrders()
  {
    $raw_metal = new WareHouse();
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
    $data = [
      'name' => $_POST['name'],
      'unit' => $_POST['unit'],
      'unit_price' => $_POST['unit_price'],
      'quantity' => $_POST['quantity'],
      'date' => $_POST['date'],
      'status' => $_POST['status'],
    ];
    $name = $data['name'];
    $unit = $data['unit'];
    $quantity = (int) $data['quantity'];

    $date = date('Y-m-d H:i:s');
    $warehouse = new WareHouse();
    $check = $warehouse->checkRawmaterial($name, $unit);
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
      $result = $warehouse->createRawMaterial($dataRawMaterial);
      $id_rawmaterial = $warehouse->getMaxRawMaterialId() ? $warehouse->getMaxRawMaterialId() : 1;
      if (!$result) {
        NotificationHelper::error('store_rawmaterial', 'Thêm nguyên liệu thất bại');
        header('location: /admin/warehouse/raw_material/create');
        exit;
      }
    }
    $data_purchase_orders = [
      'name' => $data['name'],
      'status' => $data['status'],
      'date' => $data['date'],
    ];
    $purchaseOrders = new PurchaseOrders();
    $result_purchase_orders = $purchaseOrders->createPurchaseOrders($data_purchase_orders);
    $order_id_max = $purchaseOrders->getMaxPurchaseOrdersId() ? $purchaseOrders->getMaxPurchaseOrdersId() : 1;
    $order_id = (int) $order_id_max;
    $data_purchase_order_items = [
      'quantity' => (int) $data['quantity'],
      'unit_price' => (int) $data['unit_price'],
      'purchase_order_id' => $order_id,
      'raw_material_id' => $id_rawmaterial,
    ];
    $checkIdMaterial = $warehouse->checkIdRawmaterial($id_rawmaterial);

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