<?php

namespace App\Views\Client\Pages\Cart;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {
    ?>

    <section class="h-100 h-custom">
      <div class="pt-3">
        <h1 class="text-center">Giỏ hàng</h1>
      </div>
      <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-9 col-md-9">
            <div class="table-responsive">
              <h5 class="mb-5">Đơn hàng</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      </div>
                    </th>
                    <th scope="col" class="h6">Tên</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá (VNĐ)</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng (VNĐ)</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data as $item): ?>
                    <tr data-id="<?= $item['id'] ?>" class="">
                      <th class="align-middle">
                        <div class="form-check">
                          <input class="form-check-input checkout-product" data-id="<?= $item['id'] ?>" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                      </th>
                      <th scope="row" class="align-middle">
                        <p><?= $item['name'] ?></p>
                      </th>
                      <td class="align-middle">
                        <p class="mb-0" style="font-weight: 500;">
                          <img src="/public/assets/images/<?= $item['image'] ?>" alt="Product" class="img-fluid rounded-start"
                            width="100px" height="100px" />
                        </p>
                      </td>
                      <td class="align-middle">
                        <p class="mb-0 price" style="font-weight: 500;"><?= number_format($item['price']) ?></p>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex flex-row">
                          <!-- <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2 minus-btn"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                          </button> -->
                          <input id="form1 quantity" min="0" name="quantity" value="<?= $item['quantity'] ?>" type="number"
                            class="form-control form-control-sm quantity-input quantity-value" style="width: 50px;"
                            data-field="quantity" data-model="products" data-modelId="<?= $item['id'] ?>" />
                          <!-- <button ata-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2 plus-btn"
                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="fas fa-plus"></i>
                          </button> -->

                        </div>
                      </td>
                      <td class="align-middle">
                        <b class="total-product-detail"></b> đ
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-3 col-md-3">
            <h5>Tổng thanh toán</h5>
            <div class="card shadow-2-strong mb-5 p-1 mb-lg-0" style="border-radius: 10px;">
              <div class="card-body p-0" style="min-height: 200px">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="text-dark">Tên</th>
                        <th scope="col" class="text-dark">Giá (VNĐ)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <th></th>
                      <th></th>
                    </tbody>
                  </table>
                </div>
              </div>
              <hr>
              <div class="mt-1">
                <p><b>Tổng: </b> <span></span></p>
              </div>
            </div>

          </div>

        </div>
      </div>
      </div>
    </section>
    <?php
    if ($data == null) {
      echo '<h1 class="text-center text-danger">Chưa có sản phẩm trong giỏ hàng</h1>';
    }
  ?>
  <?php
  }
}
?>