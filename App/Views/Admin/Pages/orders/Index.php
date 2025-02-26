<?php
namespace App\Views\Admin\Pages\Orders;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-9">
        <h2>Tất cả đơn hàng</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <a>Tất cả đơn hàng</a>
          </li>
        </ol>
      </div>
      <div class="col-lg-3">
      </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Tất cả khách hàng </h5>
              <div class="ibox-tools">
                <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                  <li><a href="#">Config option 1</a>
                  </li>
                  <li><a href="#">Config option 2</a>
                  </li>
                </ul>
                <a class="close-link">
                  <i class="fa fa-times"></i>
                </a>
              </div>
            </div>
            <div class="ibox-content">
              <div class="row">
                <div class="col-sm-5 m-b-xs">
                </div>
                <div class="col-sm-4 m-b-xs">
                </div>
                <div class="col-sm-3">
                  <form action="/order/search" method="get">
                    <div class="input-group">
                      <input type="text" name="keyword" class="input-sm form-control"
                        value="<?php echo isset($_SESSION['keyword']) ? $_SESSION['keyword'] : ''; ?>"
                        placeholder="Tìm kiếm">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-primary"> Tìm kiếm</button> </span>
                    </div>
                  </form>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th><input type="checkbox" class="i-checks" name="input[]"></th>
                      <th>Tên sản phẩm</th>
                      <th>Tên người mua </th>
                      <th>SĐT </th>
                      <th>Email</th>
                      <th>Giá</th>
                      <th>Tùy chỉnh</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (!empty($data)):
                      foreach ($data as $item):
                        ?>
                        <tr>
                          <td><input type="checkbox" class="i-checks" name="input[]"></td>
                          <td><?= $item['name'] ?></td>
                          <td><?= $item['name_customer'] ?></td>
                          <td><?= $item['phone'] ?></td>
                          <td><?= $item['email'] ?></td>
                          <td><?= $item['total'] ?></td>
                          <td>
                            <div class="custom-icon-detail">
                              <!-- From Uiverse.io by Galahhad -->
                              <label class="popup">
                                <input type="checkbox">
                                <div class="burger" tabindex="0">
                                  <span></span>
                                  <span></span>
                                  <span></span>
                                </div>
                                <nav class="popup-window">
                                  <ul>
                                    <li>
                                      <a href="/admin/order/work/<?= $item['id'] ?>">
                                        <button>
                                          <svg width="14" height="14" viewBox="0 0 64 64" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="8" y="22" width="40" height="20" stroke="currentColor" stroke-width="3"
                                              fill="none" stroke-linejoin="round" />
                                            <rect x="48" y="30" width="12" height="12" stroke="currentColor" stroke-width="3"
                                              fill="none" stroke-linejoin="round" />
                                            <circle cx="18" cy="48" r="5" stroke="currentColor" stroke-width="3" fill="none" />
                                            <circle cx="46" cy="48" r="5" stroke="currentColor" stroke-width="3" fill="none" />
                                            <path d="M16 18h20" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                                            <path d="M22 10l6 6m0 -6l-6 6" stroke="currentColor" stroke-width="3"
                                              stroke-linecap="round" />
                                          </svg>
                                          <span>Giao hàng</span>
                                        </button>
                                      </a>
                                    </li>
                                    <hr>
                                    <li>
                                      <a href="/admin/order/cancel/<?= $item['id'] ?>"
                                        style="display: inline-block;">
                                        <button type="submit">
                                          <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                            stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 6h18" />
                                            <path d="M8 6V4h8v2" />
                                            <path d="M10 11l4 4" />
                                            <path d="M14 11l-4 4" />
                                            <path d="M19 6l-1 14H6L5 6" />
                                          </svg>
                                          <span>Hủy</span>
                                        </button>
                                      </a>
                                    </li>
                                  </ul>
                                </nav>
                              </label>
                            </div>
                          </td>
                        </tr>
                        <?php
                      endforeach;
                    else: ?>
                      <h2 class="text-danger text-center">Chưa có đơn hàng!</h2>
                      <?php
                    endif;
                    ?>
                  </tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="row my-5 justify-content-center">
          <nav aria-label="...">
            <ul class="pagination d-flex justify-content-center">
              <?php
              $currentPage = isset($_GET['pages']) ? intval($_GET['pages']) : 1;
              $totalPages = $data['total_pages'];

              $prevPage = $currentPage - 1;
              ?>
              <li class="page-item <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= $currentPage > 1 ? '/admin/products?pages=' . $prevPage : '#' ?>">
                  << </a>
              </li>

              <?php
              for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i === $currentPage ? 'active' : '' ?>">
                  <a class="page-link" href="/admin/products?pages=<?= $i ?>"><?= $i ?></a>
                </li>
              <?php endfor; ?>

              <?php
              $nextPage = $currentPage + 1;
              ?>
              <li class="page-item <?= $currentPage >= $totalPages ? 'disabled' : '' ?>">
                <a class="page-link" href="<?= $currentPage < $totalPages ? '/admin/products?pages=' . $nextPage : '#' ?>">
                  >> </a>
              </li>
            </ul>
          </nav>

        </div>
    <?php
  }
}
?>