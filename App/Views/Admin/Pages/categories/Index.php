<?php
namespace App\Views\Admin\Pages\Categories;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-9">
        <h2>Quản lí sản phẩm</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <a>Quản lí sản phẩm</a>
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
              <h5>Tất cả sản phẩm </h5>
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
                  <form action="/category/search" method="get">
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
                      <th>Tên </th>
                      <th>Mô tả </th>
                      <th>Trạng thái</th>
                      <th>Tùy chỉnh</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($data != null):
                      foreach ($data as $item):
                        ?>
                        <tr>
                          <td><input type="checkbox" class="i-checks" name="input[]"></td>
                          <td><?= $item['name'] ?></td>
                          <td style="width: 40%"><?= $item['description'] ?></td>
                          <td>
                            <label class="switch">
                              <input type="checkbox" <?= $item['status'] == 1 ? 'checked' : '' ?> class="status"
                                data-field="status" data-model="categories" data-modelId="<?= $item['id'] ?>"
                                value="<?= $item['status'] ?>">
                              <span class="slider"></span>
                            </label>
                          </td>
                          <td class="d-flex justify-content-between align-items-center">
                            <!-- <a href="/admin/category/edit/<?= $item['id'] ?>"><i class="fa fa-edit fa-2x text-success"></i></a>
                            <form action="/admin/category/delete/<?= $item['id'] ?>" method="post"
                              style="display: inline-block;">
                              <input type="hidden" name="method" value="POST">
                              <button type="submit" class="btn btn-outline-primary delete-button"><i
                                  class="fa fa-trash fa-2x text-danger"></i></button>
                            </form> -->
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
                                      <a href="/admin/category/edit/<?= $item['id'] ?>">
                                        <button>
                                          <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                            stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon>
                                          </svg>
                                          <span>Sửa</span>
                                        </button>
                                      </a>
                                    </li>
                                    <hr>
                                    <li>
                                      <form action="/admin/category/delete/<?= $item['id'] ?>" method="post"
                                        style="display: inline-block;">
                                        <input type="hidden" name="method" value="POST">
                                        <button type="submit">
                                          <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                            stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <line y2="18" x2="6" y1="6" x1="18"></line>
                                            <line y2="18" x2="18" y1="6" x1="6"></line>
                                          </svg>
                                          <span>Xóa</span>
                                        </button>
                                      </form>
                                    </li>
                                  </ul>
                                </nav>
                              </label>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach;
                    else:
                      ?>
                      <h2 class="text-danger">Chưa có sản phẩm trong cơ sở dữ liệu!</h2>
                      <?php
                    endif;
                    ?>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
    <?php
  }
}
?>