<?php

namespace App\Views\Client\Pages\Cart;

use App\Views\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <div class="container">

            <h1 class="text-center my-2">Thanh toán</h1>
            <form action="/create/order" method="post" id="form-info-customer">
                <input type="hidden" name="method" value="POST">
                <div class="row my-3">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <ol class="activity-checkout mb-0 px-4 mt-3">
                                    <li class="checkout-item">
                                        <div class="avatar checkout-icon p-1">
                                            <div class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bxs-receipt text-white font-size-20"></i>
                                            </div>
                                        </div>
                                        <div class="feed-item-list">
                                            <div>
                                                <h5 class="font-size-16 mb-1">Thông tin người nhận</h5>
                                                <div class="my-3">
                                                    <div id="form-group">
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="name">Họ và tên: <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" id="name"
                                                                            name="name">
                                                                        <span class="text-danger" id="errorName"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="email">Email: <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="email" class="form-control" id="email"
                                                                            name="email">
                                                                        <span class="text-danger" id="errorEmail"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="phone">Số điện thoại:
                                                                            <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" id="phone"
                                                                            placeholder="" name="phone">
                                                                        <span class="text-danger" id="errorPhone"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-lg-4">
                                                                    <label for="province" class="form-label">Tỉnh/Thành phố:
                                                                        <span class="text-danger">*</span></label>
                                                                    <select name="province" id="province"
                                                                        class="form-select setupSelect2"
                                                                        onchange="getProvinces(event)">
                                                                        <option value="">------Chọn-----</option>
                                                                    </select>
                                                                    <span class="text-danger" id="errorProvince"></span>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label for="district" class="form-label">Quận/Huyện: <span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="district" id="district"
                                                                        class="form-select setupSelect2">
                                                                        <option value="">------Chọn-----</option>
                                                                    </select>
                                                                    <span class="text-danger" id="errorDistrict"></span>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label for="ward" class="form-label">Xã/Phường: <span
                                                                            class="text-danger">*</span></label>
                                                                    <select name="ward" id="ward"
                                                                        class="form-select setupSelect2">
                                                                        <option value="">------Chọn-----</option>
                                                                    </select>
                                                                    <span class="text-danger" id="errorWard"></span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="address">Địa chỉ: <span
                                                                        class="text-danger">*</span></label>
                                                                <textarea class="form-control" id="address" rows="3"
                                                                    placeholder="Ghi cụ thể địa chỉ" name="address"></textarea>
                                                                <span class="text-danger" id="errorAddress"></span>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" for="note">Ghi chú</label>
                                                                <textarea class="form-control" id="note" name="note" rows="3"
                                                                    placeholder=""></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card checkout-order-summary">
                            <div class="card-body">
                                <div class="p-3 bg-light mb-3">
                                    <h5 class="font-size-16 mb-0">Thanh toán</h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-centered mb-0 table-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0" scope="col">Tên</th>
                                                <th class="border-top-0" style="width: 37%" scope="col">Giá</th>
                                                <!-- <th class="border-top-0" scope="col">Tổng</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($data != null):
                                                foreach ($data['name'] as $index => $productName) {
                                                    $product_id = $data['id'][$index];
                                                    $price = $data['price'][$index];
                                                    $quantity = $data['quantity'][$index];
                                                    ?>
                                                    <tr>
                                                        <input type="hidden" name="product_id[]" value="<?= $product_id ?>">
                                                        <input type="hidden" name="product_price[]" value="<?= $price ?>">
                                                        <input type="hidden" name="product_quantity[]" value="<?= $quantity ?>">
                                                        <th>
                                                            <?= $productName ?>
                                                            <input type="hidden" name="product_name" value="<?= $productName ?>">
                                                        </th>
                                                        <td class="">

                                                            <span class="price"><?= $price ?></span> x <span
                                                                class="quantity"><?= $quantity ?></span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            endif;
                                            ?>
                                            <tr class="">
                                                <div class="row m-3 p-3">
                                                    <td class="font-size-16">Tổng cộng:</td>
                                                    </td>
                                                    <td class="border-top-0 text-right font-weight-bold">
                                                        <b id="total-price"></b>
                                                        <input type="hidden" name="total" id="total-price-hidden" value="">
                                                    </td>
                                                </div>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mt-3">
                                        <h6>Phương thức thanh toán</h6>
                                        <div class="form-check">
                                            <input class="form-check-input" checked type="radio" name="payment" id="pay-live"
                                                value="LIVE">
                                            <label class="form-check-label" for="pay-live">
                                                Thanh toán khi nhận hàng
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment" id="pay-bank" value="BANK">
                                            <label class="form-check-label" for="pay-bank">
                                                Chuyển khoản ngân hàng
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button type="submit" class="btn btn-primary btn-block">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script>
            let priceElements = document.getElementsByClassName('price');
            let quantityElements = document.getElementsByClassName('quantity');

            let totalPrice = 0;

            for (let i = 0; i < priceElements.length; i++) {
                let price = parseFloat(priceElements[i].textContent);
                let quantity = parseInt(quantityElements[i].textContent);

                totalPrice += price * quantity;
            }
            document.getElementById('total-price-hidden').value = totalPrice + '000';
            document.getElementById('total-price').textContent = totalPrice.toLocaleString() + '.000 VNĐ'; // Định dạng số với dấu phân cách
        </script>
        <?php
    }
}
?>