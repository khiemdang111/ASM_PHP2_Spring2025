<?php
namespace App\Controllers\Client;
use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;
use App\Views\Client\Pages\Product as Index;
use App\Views\Client\Pages\ProductDetail;;
use App\Helpers\ViewProductHelper;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Models\Product;

class ProductController
{
  public function index()
  {
    $products = new Product();
    $data = $products->getAllProductsClient();
    Header::render();
    Notification::render();
    NotificationHelper::unset();
    Index::render($data);
    Footer::render();
  }
  public static function detail($id)
    {

        $product = new Product();
        $product_detail = $product->getOneProductByStatus($id);

        if (!$product_detail) {
            NotificationHelper::error('product_detail', 'Không thể xem sản phẩm này');
            header('Location: /product');
        }
        // $comment = new Comment();
        // $comments = $comment->get5CommentNewestByProductAndStatus($id);

        $data = [
            'product' => $product_detail,
            // 'comment' => $comments,
        ];
        $view = $product_detail['view'];
        $view_result = ViewProductHelper::cookieView($id, $view);

        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ProductDetail::render($data);
        Footer::render();
    }
}