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
                    href="/user/order/waitpay/<?= $_SESSION['user']['id'] ?>">Chưa thanh toán</a></p>
                <p><a
                    class="<?= strpos($currentPath, "/user/order/work/" . $_SESSION['user']['id']) === 0 ? 'text-primary' : 'text-dark' ?>"
                    href="/user/order/work/<?= $_SESSION['user']['id'] ?>">Đang giao</a></p>
                <p><a
                    class="<?= strpos($currentPath, "/user/order/success/" . $_SESSION['user']['id']) === 0 ? 'text-primary' : 'text-dark' ?>"
                    href="/user/order/success/<?= $_SESSION['user']['id'] ?>">Đã giao</a></p>
                <p><a
                    class="<?= strpos($currentPath, "/user/order/cancel/" . $_SESSION['user']['id']) === 0 ? 'text-primary' : 'text-dark' ?>"
                    href="/user/order/cancel/<?= $_SESSION['user']['id'] ?>">Đã hủy</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <!-- Cart Items -->
          <div class="card mb-4">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="card-title">Đơn hàng</h6>
                </div>
                <!-- <div class="col-md-3">
                  <h6 class="card-title">Giá</h6>
                </div> -->
                <div class="col-md-2">
                  <h6 class="card-title">Ngày đặt</h6>
                </div>
                <div class="col-md-2">
                  <h6 class="card-title">Tổng đơn</h6>
                </div>
                <?php if (isset($data[0]['QR'])): ?>
                  <div class="col-md-2 text-center">
                    <h6>Mã QR</h6>
                  </div>
                  <?php
                else: ?>
                  <?php
                  echo '<p></p>';
                endif;
                ?>
              </div>
            </div>
            <div class="card-body">
              <?php
              if (!empty($data)):
                foreach ($data as $item):
                  if (!is_array($item))
                    continue;
                  ?>
                  <div class="row cart-item mb-3">
                    <div class="col-md-6">
                      <input type="hidden" name="order_id" value="<?= $item['order_id'] ?>">
                      <?php
                      if (array($item['product'])):
                        foreach ($item['product'] as $product):
                          ?>
                          <div class="row">
                            <div class="col-md-6">
                              <p class="card-title text-dark">
                                <?= htmlspecialchars($product['name'] ?? 'Tên sản phẩm đang được cập nhật') ?>
                              </p>
                            </div>
                            <div class="col-md-6">
                              <span><?= htmlspecialchars(number_format($product['price']) ?? '0') ?> x
                                <?= htmlspecialchars($product['quantity'] ?? '0') ?></span>
                            </div>
                          </div>
                          <?php
                        endforeach;
                      else:
                        ?>
                        <div class="row">
                          <div class="col-md-6">
                            <p class="card-title text-dark">
                              <?= htmlspecialchars($item['name'] ?? 'Tên sản phẩm đang được cập nhật') ?>
                            </p>
                          </div>
                          <div class="col-md-6">
                            <span><?= htmlspecialchars(number_format($item['price']) ?? '0') ?> x
                              <?= htmlspecialchars($item['quantity'] ?? '0') ?></span>
                          </div>
                        </div>
                        <?php
                      endif;
                      ?>
                    </div>
                    <div class="col-md-2">
                      <p class="fw-bold"><?= htmlspecialchars($item['date'] ?? 'Không có ngày') ?></p>
                    </div>
                    <div class="col-md-2">
                      <p><?= htmlspecialchars(number_format($item['total']) ?? '0') ?></p>
                    </div>

                    <?php if (!empty($item['QR'])): ?>
                      <div class="col-md-2 text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="border border-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <img width="20" height="20" src="https://img.icons8.com/ios/50/qr-code--v1.png" alt="qr-code--v1" />
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="modal-12">
                                  <div class="card">
                                    <div class="card-content">
                                      <h6 class="card-heading">Vui lòng quét mã thanh toán!</h6>
                                      <p>Chúng tôi sẽ lên đơn ngay sau khi thanh toán</p>
                                    </div>
                                    <div class="card-button-wrapper text-center">
                                      <img width="300px"
                                        src="https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=<?= $item['total'] ?>"
                                        alt="QR Code">
                                    </div>
                                    <button class="exit-button" data-bs-dismiss="modal">
                                      <svg height="20px" viewBox="0 0 384 512">
                                        <path
                                          d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z">
                                        </path>
                                      </svg>
                                    </button>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                  <hr>
                  <?php
                endforeach;
              else:
                ?>
                <p>Không có đơn hàng nào</p>
                <?php
              endif;
              ?>

            </div>
          </div>
          <!-- Continue Shopping Button -->
        </div>
      </div>
    </div>
    <?php
  }
}
?>