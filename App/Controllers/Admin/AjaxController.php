<?php
namespace App\Controllers\Admin;
use App\Views\Admin\Layout\Header;
use App\Views\Admin\Layout\Footer;
use App\Views\Admin\Pages\Raitings\Index;
use App\Models\Product;
class AjaxController
{
  public function changeStatus()
{
    header('Content-Type: application/json; charset=utf-8');

    // Kiểm tra xem có dữ liệu POST không
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['option'])) {
        $option = $_POST['option']; // Lấy toàn bộ mảng option

        // Ép kiểu về int
        $value = isset($option['value']) ? (int) $option['value'] : 0;
        $modelId = isset($option['modelId']) ? (int) $option['modelId'] : 0;
        $model = $option['model'] ?? '';
        $field = $option['field'] ?? '';

        // Đổi trạng thái: nếu 1 -> 0, nếu 0 -> 1
        $newValue = ($value == 1) ? 0 : 1;
        $data = [
            'status' => $newValue
        ];

        // Kiểm tra dữ liệu có đầy đủ không
        if (!$modelId || empty($model) || empty($field)) {
            echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
            exit;
        }

        // Cập nhật trạng thái
        $products = new Product();
        $change = $products->changeStatus($modelId, $data);

        if ($change) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Status updated successfully',
                'data' => [
                    'new_value' => $newValue,
                    'modelId' => $modelId,
                    'model' => $model,
                    'field' => $field
                ]
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update status']);
        }
        exit;
    }

    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    exit;
}

}
