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
    $recipes = new ProductRecipe();
    $data = $recipes->getAllProductRecipe();
    // $result = [];
    // foreach ($data as $recipe) {
    //     $id = $recipe['product_recipes_id'];
    //     if (!isset($result[$id])) {
    //         $result[$id] = [
    //             'product_recipes_id' => $recipe['product_recipes_id'],
    //             'product_recipes_name' => $recipe['product_recipes_name'],
    //             'product_name' => $recipe['product_name'],
    //             'materials' => []
    //         ];
    //     }
    //     $result[$id]['materials'][] = [
    //         'material_name' => $recipe['material_name'],
    //         'quantity' => $recipe['quantity'],
    //         'unit' => $recipe['unit']
    //     ];
    // }

    // // In ra toàn bộ kết quả để kiểm tra
    // echo '<pre>';
    // // print_r($result);

    // // Duyệt qua mảng $result và var_dump tất cả materials
    // foreach ($result as $id => $recipe) {
    //     var_dump($recipe['materials']); // In ra mảng materials của từng id
    // }

    // die;
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
  public function searchProductRecipe()
  {
    $_GET['keyword'] = trim($_GET['keyword']);
    $recipes = new ProductRecipe();
    $recipe = $recipes->getAllProductRecipeByName($_GET['keyword']);
    if ($recipe !== null) {
      $_SESSION['keyword'] = $_GET['keyword'];
      $data = $recipe;
    }
    if ($recipe == null) {
      $product = new Product();
      $recipes = new ProductRecipe();
      // var_dump($_GET['keyword']);
      $product = $product->searchProduct($_GET['keyword']);
      // var_dump($product);
      if ($product == null) {
        $name = $_GET['keyword'];
        $meterial_id = 0;
      } else {
        $meterial_id = (int) $product[0]['id'];
        $name = $_GET['keyword'];
      }
      $data = $recipes->getAllProductRecipeByProductId($meterial_id, $name);
      if ($data == null) {
        $_SESSION['keyword'] = $_GET['keyword'];
        $data = null;
      } else {
        $_SESSION['keyword'] = $_GET['keyword'];
      }
    }
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
}