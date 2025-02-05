<?php
namespace App\Views\Admin\Pages\Recycles;

use App\Views\BaseView;

class Post extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-9">
        <h2>Tất cả bài viết trong thùng rác</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <a>Quản lí bài viết</a>
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
              <h5>Tất cả bài viết trong thùng rác</h5>
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
                      <th>Tiêu đề</th>
                      <th>Ngày tạo </th>
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
                          <td style="width: 40%"><?= $item['title'] ?></td>

                          <td><?= $item['create_at'] ?></td>
                          <td>
                            <label class="switch">
                              <input type="checkbox" <?= $item['status'] == 1 ? 'checked' : '' ?> class="status"
                                data-field="publish" data-model="User" value="">
                              <span class="slider"></span>
                            </label>
                          </td>

                          <td class="d-flex justify-content-between align-items-center">
                            <a href="/admin/product/edit/<?= $item['id'] ?>"><i class="fa fa-edit fa-2x text-success"></i></a>
                            <a href="#"><i class="fa fa-trash fa-2x text-danger"></i></a>
                          </td>
                        </tr>
                      <?php endforeach;
                      ?>
                    </tbody>
                  </table>
                  <?php
                    else:
                      ?>
                  <h2 class="text-danger text-center">Thùng rác trống!</h2>
                  <?php
                    endif;
                    ?>
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