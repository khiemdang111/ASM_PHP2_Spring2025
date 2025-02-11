<?php
namespace App\Views\Client\Pages;

use App\Views\BaseView;

class ProductDetail extends BaseView
{
    public static function render($data = null)
    {
        $product = $data['product'];
        ?>
        <div class="container mt-5">
            <div class="row">
                <!-- Product Images -->
                <div class="col-md-6 mb-4">
                    <img src="/public/assets/images/<?= $product['image'] ?>" alt="Product"
                        class="img-fluid rounded mb-3 product-image" id="mainImage">
                </div>
                <!-- Product Details -->
                <div class="col-md-6">
                    <h2 class="mb-3"><?= $product['name'] ?></h2>
                    <!-- <p class="text-muted mb-4">SKU: WH1000XM4</p> -->
                    <div class="mb-3">
                        <span class="h4 me-2 text-danger"><?= number_format($product['price'] - $product['discount_price']) ?>
                            đ</span>
                        <span class="text-muted"><s><?= number_format($product['discount_price']) ?> đ</s></span>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                        <span class="ms-2">4.5 (<b class="text-dark"><?= $product['view'] ?></b> lượt xem)</span>
                    </div>
                    <!-- <p class="mb-4">Experience premium sound quality and industry-leading noise cancellation with these wireless
                        headphones. Perfect for music lovers and frequent travelers.</p> -->
                    <!-- <div class="mb-4">
                        <h5>Color:</h5>
                        <div class="btn-group" role="group" aria-label="Color selection">
                            <input type="radio" class="btn-check" name="color" id="black" autocomplete="off" checked>
                            <label class="btn btn-outline-dark" for="black">Black</label>
                            <input type="radio" class="btn-check" name="color" id="silver" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="silver">Silver</label>
                            <input type="radio" class="btn-check" name="color" id="blue" autocomplete="off">
                            <label class="btn btn-outline-primary" for="blue">Blue</label>
                        </div>
                    </div> -->
                    <div class="mb-4">
                        <label for="quantity" class="form-label">Số lượng:</label>
                        <input type="number" class="form-control" id="quantity" value="1" min="1" style="width: 80px;">
                    </div>
                    <div class="row">
                        <div class="px-0" style="width: 40%">
                            <form action="/cart/add/<?= $product['id'] ?>" method="post">
                                <input type="hidden" name="method" value="POST">
                                <button type="submit" class="btn btn-primary btn-lg mb-3 me-2">
                                    <i class="bi bi-cart-plus"></i> Thêm giỏ hàng
                                </button>
                            </form>
                        </div>
                        <div class="col-5 px-0">
                            <button class="btn btn-success btn-lg mb-3">
                                <i class="bi bi-heart"></i> Mua ngay
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <h2>Mô tả sản phẩm</h2>
                <p class="text-description">
                    <?= $product['description'] ?>
                </p>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function changeImage(event, src) {
                document.getElementById('mainImage').src = src;
                document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
                event.target.classList.add('active');
            }
        </script>

        <?php
    }
}
?>