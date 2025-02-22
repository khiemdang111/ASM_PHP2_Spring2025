<?php
namespace App\Controllers\Client;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Raitings\Index;
use App\Models\Cart;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\Product;
use App\Models\Category;
class AjaxController
{
    public function changeQuantity()
    {
        header('Content-Type: application/json; charset=utf-8');

        // Kiểm tra xem có dữ liệu POST không
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['option'])) {
            $option = $_POST['option'];

            // Ép kiểu về int
            $value = isset($option['value']) ? (int) $option['value'] : 0;
            $productID = isset($option['modelId']) ? (int) $option['modelId'] : 0;
            $field = $option['field'] ?? '';

            $cart = new Cart();
            $update = $cart->updateQuantity($productID, $field, $value);
            echo json_encode([
                'status' => 'success',
                'message' => 'Status updated successfully',
                'data' => [
                    'productID' => $productID,
                    'field' => $field,
                    'value' => $value,
                ]
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update status']);
        }
        echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
        exit;
    }

   public function filterProduct()
{
    header('Content-Type: application/json; charset=utf-8');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['option']) && is_array($_POST['option'])) {
        $option = $_POST['option'];
        $id = isset($option['value']) ? (int) $option['value'] : 0;
        $field = $option['field'] ?? '';

        $product = new Product();
        $categories = new Category();

        $products = $product->getAllProductByCategory($id);
        $category = $categories->getAllCategories();

        if ($products === null || $category === null) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to fetch data']);
            exit;
        }

        $data = [
            'products' => $products,
            'categories' => $category,
        ];
        
        echo json_encode([
            'status' => 'success',
            'message' => 'Status updated successfully',
            'data' => [
                'id' => $id,
                'field' => $field,
            ]
        ]);
        return $data;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    }
    exit;
}
}
