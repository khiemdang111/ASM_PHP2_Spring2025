<?php
namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Product extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <!-- Menu Start -->
        <div class="container-fluid menu">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-3 col-md-3 col-xl-3">
                        <h2 class="mb-2">Bộ lọc</h2>
                        <div class="row mt-3">
                            <h6>Theo danh mục</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Pizza
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Burger
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Sushi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Sandwich
                                </label>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <h6>Theo giá (VND)</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    30-50
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    50-100
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    100-200
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    200-350
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    350-500
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Trên 500
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 col-md-9 col-xl-9">
                        <h2 class="text-center mb-3">Sản phẩm nổi bật</h2>
                        <div class="row">
                            <?php
                            if ($data != null):
                                foreach ($data as $item):
                                    ?>
                                    <div class="col-4 col-md-4 col-xl-4 mb-3">
                                        <div class="card">
                                            <a href="/product/<?= $item['id'] ?>">
                                                <img width="200px" height="200px" src="/public/assets/images/<?= $item['image'] ?>"
                                                    class="card-img-top" alt="...">
                                            </a>
                                            <div class="card-body">
                                                <a href="/product/<?= $item['id'] ?>">
                                                    <h6 class="card-title name-product"><?= $item['name'] ?></h6>
                                                    <div class="description-product">
                                                        <p class="card-text product-menu-description mb-0"><?= $item['description'] ?>
                                                        </p>
                                                    </div>
                                                    <p>Giá chỉ từ: <span class="text-danger fs-3"> <?= number_format($item['price']) ?>
                                                            đ</span> <span class="text-secondary"
                                                            style=" text-decoration: line-through;">
                                                            <?php
                                                            $item['discount_price'] ? $item['discout_price'] : '';
                                                            ?>
                                                        </span>
                                                    </p>
                                                </a>
                                                <div class="row">
                                                    <div class="w-50">
                                                        <form action="/cart/add/<?= $item['id'] ?>" method="post">
                                                            <input type="hidden" name="method" value="POST">
                                                            <button type="submit" class="btn btn-primary ">
                                                                Giỏ hàng
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="w-50">
                                                        <a href="#" class="btn btn-danger">Mua ngay</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-4 col-md-4 col-xl-4 ">
                                <div class="card">
                                    <img width="200px" height="200px" src="/public/client/assets/img/menu-02.jpg"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Paneer</h5>
                                        <p class="card-text product-menu-description mb-0">Tôm, thanh cua, mực và bông cải xanh
                                            tươi ngon trên nền sốt Pesto
                                            Xanh.</p>
                                        <p>Giá chỉ từ: <span class="text-danger fs-3 "> 199k</span> <span class="text-secondary"
                                                style=" text-decoration: line-through;">250k</span></p>
                                        <a href="#" class="btn btn-primary">Giỏ hàng</a>
                                        <a href="#" class="btn btn-danger">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 col-xl-4 ">
                                <div class="card">
                                    <img width="200px" height="200px" src="/public/client/assets/img/menu-02.jpg"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Paneer</h5>
                                        <p class="card-text product-menu-description mb-0">Tôm, thanh cua, mực và bông cải xanh
                                            tươi ngon trên nền sốt Pesto
                                            Xanh.</p>
                                        <p>Giá chỉ từ: <span class="text-danger fs-3"> 199k</span> <span class="text-secondary"
                                                style=" text-decoration: line-through;">250k</span></p>
                                        <a href="#" class="btn btn-primary">Giỏ hàng</a>
                                        <a href="#" class="btn btn-danger">Mua ngay</a>
                                    </div>
                                </div>
                            </div> -->
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->


        <?php
    }
}
?>