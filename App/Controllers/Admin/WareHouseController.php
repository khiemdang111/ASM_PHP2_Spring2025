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
use App\Views\Admin\Pages\Warehouses\ProductRecipe\Create as CreateProductRecipe;
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
}