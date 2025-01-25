<?php
namespace App\Views\Admin\Pages\Customers;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="row">
        <div class="col-lg-10">
          <h2>Quản lí khách hàng</h2>
          <ol class="breadcrumb">
            <li>
              <a href="index.html">Trang chủ</a>
            </li>
            <li class="active">
              <a>Quản lí khách hàng</a>
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
                          <td><img width="80px" height="80px" src="/public/assets/images/<?= $item['avatar'] ?> "
                          class="card-img-top" alt="..."></td>
                          <td><?= $item['email'] ?></td>
                          <td><?= $item['phone'] ?></td>
                          <td>
                            <label class="switch">
                              <input type="checkbox" <?= $item['status'] == 1 ? 'checked' : '' ?> class="status"
                                data-field="publish" data-model="User" value="">
                              <span class="slider"></span>
                            </label>
                          </td>
                          <td class="d-flex justify-content-between align-items-center">
                            <a href="#"><i class="fa fa-edit fa-2x text-success"></i></a>
                            <a href="#"><i class="fa fa-trash fa-2x text-danger"></i></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <?php
                    else:
                      ?>
                    <h2 class="text-danger">Chưa có tài khoản người dùng!</h2>
                    <?php
                    endif;
                    ?>
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