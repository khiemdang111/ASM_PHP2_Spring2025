<?php
namespace App\Views\Admin\Pages\Recycles;

use App\Views\BaseView;

class User extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="row">
        <div class="col-lg-10">
          <h2>Quản lí người dùng</h2>
          <ol class="breadcrumb">
            <li>
              <a href="index.html">Trang chủ</a>
            </li>
            <li class="active">
              <a>Quản lí người dùng</a>
            </li>
          </ol>
        </div>
        <div class="col-lg-2 py-4">
          <a href="/admin/user/create" class="btn btn-primary">Thêm mới</a>
        </div>
      </div>
      <div class="col-lg-3">
      </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Tất cả người dùng </h5>
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
                  <div class="input-group"><input type="text" placeholder="Tìm kiếm" class="input-sm form-control"> <span
                      class="input-group-btn">
                      <button type="button" class="btn btn-sm btn-primary"> Tìm kiếm</button> </span></div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th><input type="checkbox" class="i-checks" name="input[]"></th>
                      <th>Username</th>
                      <th>Avatar </th>
                      <th>Email</th>
                      <th>Số điện thoại</th>
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
                          <td><?= $item['username'] ?></td>
                          <td><img width="60px" height="60px" src="/public/assets/images/<?= $item['avatar'] ?> "
                              class="card-img-top" alt="..."></td>
                          <td><?= $item['email'] ?></td>
                          <td><?= $item['phone'] ?></td>
                          <td>
                            <?php
                            if ($item['status'] == 1) {
                              echo '<span class="label label-primary">Hoạt động</span>';
                            } else {
                              echo '<span class="label label-warning">Bị khóa</span>';
                            }
                            ?>
                          </td>
                          <td class="d-flex justify-content-between align-items-center">
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
                                      <form action="/admin/user/restore/<?= $item['id'] ?>" method="post"
                                        style="display: inline-block;">
                                        <input type="hidden" name="method" value="POST">
                                        <input type="hidden" name="table" value="users">
                                        <input type="hidden" name="urlTable" value="user">
                                        <button type="submit">
                                          <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                            stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 10V4h6" />
                                            <path d="M20 14v6h-6" />
                                            <path d="M5 19a9 9 0 1 0 1.8-10.2L4 10" />
                                          </svg>
                                          <span>Khôi phục</span>
                                        </button>
                                      </form>
                                    </li>
                                    <hr>
                                    <li>
                                      <form action="/admin/user/deletePermanently/<?= $item['id'] ?>" method="post"
                                        style="display: inline-block;">
                                        <input type="hidden" name="method" value="POST">
                                        <input type="hidden" name="table" value="users">
                                        <input type="hidden" name="urlTable" value="user">
                                        <button type="submit">
                                          <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                            stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <line y2="18" x2="6" y1="6" x1="18"></line>
                                            <line y2="18" x2="18" y1="6" x1="6"></line>
                                          </svg>
                                          <span>Xóa vĩnh viễn</span>
                                        </button>
                                      </form>
                                    </li>
                                  </ul>
                                </nav>
                              </label>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>

                  </table>
                </div>
                <?php
                    else:
                      ?>
                <h2 class="text-danger">Thùng rác trống!</h2>
                <?php
                    endif;
                    ?>
            </div>
          </div>
        </div>

      </div>
    </div>
    <?php
  }
}
?>