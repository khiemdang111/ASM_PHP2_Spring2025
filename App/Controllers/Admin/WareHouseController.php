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
 use App\Models\Product;
use App\Validations\WareHouseValidation;
use App\Views\Admin\Pages\Warehouses\ProductRecipe\Create AS CreateProductRecipe;
class WareHouseController
{
  public function index()
  {
    $wares = new WareHouse();
    $data = $wares->getAllInventory();
    // echo '<pre>';
    // var_dump($data); die;
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }

  public function raw_material()
  {
    $raw_metal = new WareHouse();
    $data = $raw_metal->getAllRawMaterial();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    RawMaterial::render($data);
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
      'quantity' => $_POST['quantity'],
    ];

    $name = $data['name'];
    $unit = $data['unit'];
    $quantity = $data['quantity'];
    $warehouse = new WareHouse();
    $check = $warehouse->checkRawmaterial($name, $unit);
    if ($check['name'] == $name && $check['unit'] === $unit) {
      $date = date('Y-m-d H:i:s');
      $id_rawmaterial = $check['id'];
      $warehouse->updateInventory($id_rawmaterial, $quantity, $date);
    }
    $result = $warehouse->createRawMaterial($data);
    if (!$result) {
      NotificationHelper::error('store_rawmaterial', 'Thêm nguyên liệu thất bại');
      header('location: /admin/warehouse/raw_material/create');
      exit;
    }
    NotificationHelper::success('store_rawmaterial', 'Thêm nguyên liệu thành công');
    header('location: /admin/warehouse/raw_material');
    exit;
  }
  public function createProductRecipe(){
    $ware = new WareHouse();
    $product = new Product();
    $products = $product->getAll();
    $rawMaterial = $ware->getAllRawMaterial();
    $data= [
      'products' => $products,
      'rawMaterials' => $rawMaterial,
    ];
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    CreateProductRecipe::render($data);
    Footer::render();
  }
  public function storeProductRecipe(){
    $ware = new WareHouse();
    // echo '<pre>';
    // var_dump($_POST); 
    $option_product_recipe = [
      'name' => $_POST['name'],
      'product_id' => (int) $_POST['product_id'],
    ];
    $result = $ware->createProductRecipes($option_product_recipe); 
    if(!$result){
      NotificationHelper::error('store_product_recipe', 'Tạo công thức thất bại');
      header('location: /admin/warehouse/productrecipe');
      exit;
    }
    $id_product_recipes = $ware->getMaxIdProductRecipes();
    $data_value_recipe = [
      'id_product_recipes' => (int) $id_product_recipes,
      'raw_material_id' => $_POST['material_id'],
      'quantity' =>  $_POST['quantity'],
      'unit' => $_POST['unit_material'],
    ];
    // echo '<pre>';
    // var_dump($data_value_recipe);  die;
    $addRecipe = $ware->createInGredients($data_value_recipe);
    if($addRecipe){
      NotificationHelper::success('store_product_recipe', 'Tạo công thức thành công');
      header('location: /admin/warehouse/productrecipe');
      exit;
    }
    else{
      NotificationHelper::error('store_product_recipe', 'Tạo công thức thất bại');
      header('location: /admin/warehouse/productrecipe');
      exit;
    }
  }
}