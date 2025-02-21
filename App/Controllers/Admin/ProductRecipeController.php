<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Helpers\NotificationHelper;
use App\Views\Admin\Components\Notification;
use App\Models\WareHouse;
use App\Models\Product;
use App\Models\Material;
use App\Models\ProductRecipe;
use App\Views\Admin\Pages\Warehouses\ProductRecipe\Create as CreateProductRecipe;
use App\Views\Admin\Pages\Warehouses\ProductRecipe\Index;
class ProductRecipeController
{
  public function productRecipe()
  {
    $ware = new WareHouse();
    $data = $ware->getAll();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
  public function createProductRecipe()
  {
    $ware = new WareHouse();
    $product = new Product();
    $material = new Material();
    $products = $product->getAll();
    $rawMaterial = $material->getAllRawMaterial();
    $data = [
      'products' => $products,
      'rawMaterials' => $rawMaterial,
    ];
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    CreateProductRecipe::render($data);
    Footer::render();
  }
  public function storeProductRecipe()
  {
    $product_recipe = new ProductRecipe();

    $option_product_recipe = [
      'name' => $_POST['name'],
      'product_id' => (int) $_POST['product_id'],
    ];
    $getId = $product_recipe->getIdProduct($option_product_recipe['product_id']);
    if ($getId['product_id'] === $option_product_recipe['product_id']) {
      $product_recipe->deleteIngredient($getId['id']);
      $product_recipe->deleteProductRecipes($getId['id']);
      $result = $product_recipe->createProductRecipes($option_product_recipe);
    } else {
      $result = $product_recipe->createProductRecipes($option_product_recipe);
    }
    if (!$result) {
      NotificationHelper::error('store_product_recipe', 'Tạo công thức thất bại');
      header('location: /admin/warehouse/productrecipe');
      exit;
    }
    $table_name_recipes = 'product_recipes';
    $id_product_recipes = $product_recipe->getMaxIdProductRecipes($table_name_recipes);
    $data_value_recipe = [
      'id_product_recipes' => (int) $id_product_recipes,
      'raw_material_id' => $_POST['material_id'],
      'quantity' => $_POST['quantity'],
      'unit' => $_POST['unit_material'],
    ];
    // echo '<pre>';
    // var_dump($data_value_recipe);  die;
    $addRecipe = $product_recipe->createInGredients($data_value_recipe);
    if ($addRecipe) {
      NotificationHelper::success('store_product_recipe', 'Tạo công thức thành công');
      header('location: /admin/warehouse/productrecipe');
      exit;
    } else {
      NotificationHelper::error('store_product_recipe', 'Tạo công thức thất bại');
      header('location: /admin/warehouse/productrecipe');
      exit;
    }
  }
}