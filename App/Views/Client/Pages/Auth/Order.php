<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Order extends BaseView
{
  public static function render($data = null)
  {
    $currentPath = strtok($_SERVER['REQUEST_URI'], '?');
    ?>
    <div class="container py-5">
      <h1 class="mb-5"><?= $data['title'] ?></h1>
      <div class="row">
        <div class="col-lg-3">
          <!-- Cart Summary -->
          <div class="card cart-summary">
            <div class="card-body">
              <h5 class="card-title mb-4">Đơn hàng</h5>
              <div class="">
                <p><a
                    class="<?= strpos($currentPath, "/user/order/waitpay/" . $_SESSION['user']['id']) === 0 ? 'text-primary' : 'text-dark' ?>"
                    href="">Chưa thanh toán</a></p>
                <p><a
                    class="<?= strpos($currentPath, "/user/order/work/" . $_SESSION['user']['id']) === 0 ? 'text-primary' : 'text-dark' ?>"
                    href="">Đang giao</a></p>
                <p><a
                    class="<?= strpos($currentPath, "/user/order/success/" . $_SESSION['user']['id']) === 0 ? 'text-primary' : 'text-dark' ?>"
                    href="">Đã giao</a></p>
                <p><a
                    class="<?= strpos($currentPath, "/user/order/cancel/" . $_SESSION['user']['id']) === 0 ? 'text-primary' : 'text-dark' ?>"
                    href="">Đã hủy</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <!-- Cart Items -->
          <div class="card mb-4">
            <div class="card-header">
              <div class="row">
                <div class="col-md-3">
                  <h6 class="card-title">Tên</h6>
                </div>
                <div class="col-md-3">
                  <h6 class="card-title">Giá</h6>
                </div>
                <div class="col-md-2">
                  <h6 class="card-title">Ngày đặt</h6>
                </div>
                <div class="col-md-2">
                  <h6 class="card-title">Tổng đơn</h6>
                </div>
                <?php if ($data['QR']): ?>
                  <div class="col-md-2">
                    <h6>Mã QR</h6>
                  </div>
                  <?php
                endif;
                ?>
              </div>
            </div>
            <div class="card-body">
              <?php
              if ($data != null):
                foreach ($data as $item):
                  ?>
                  <div class="row cart-item mb-3">
                    <div class="col-md-3">
                      <h6 class="card-title"><?= $data['name_product'] ? $data['name_product'] : '' ?></h6>
                    </div>
                    <div class="col-md-3">
                      <span><?= $data['price'] ? $data['price'] : '' ?>x<?= $data['quantity'] ? $data['price'] : '' ?></span>
                    </div>
                    <div class="col-md-2">
                      <p class="fw-bold"><?= $data['date'] ? $data['date'] : '' ?></p>
                    </div>
                    <div class="col-md-2">
                      <p><?= $data['total'] ? $data['total'] : '' ?></p>
                    </div>
                    <?php if ($data['QR']): ?>
                      <div class="col-md-2">
                        <div class="modal-12">
                          <div class="card">
                            <div class="card-content">
                              <h6 class="card-heading">Vui lòng thanh quét mã thanh toán! </h6>
                              <p>Chúng tôi sẽ lên đơn ngay sau khi thanh toán</p>
                            </div>
                            <div class="card-button-wrapper text-center">
                              <img width="300px" src="<?= $data['QR'] ?>" alt="">
                            </div>
                            <button class="exit-button">
                              <svg height="20px" viewBox="0 0 384 512">
                                <path
                                  d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z">
                                </path>
                              </svg>
                            </button>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                  <hr>
                  <?php
                endforeach;
              endif;
              ?>
            </div>
          </div>
          <!-- Continue Shopping Button -->
          <div class="text-start mb-4">
            <a href="#" class="btn btn-outline-primary">
              <i class="bi bi-arrow-left me-2"></i>Continue Shopping
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
}
?>