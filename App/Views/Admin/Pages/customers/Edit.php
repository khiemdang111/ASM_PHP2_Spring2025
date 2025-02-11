<?php
namespace App\Views\Admin\Pages\Customers;

use App\Views\BaseView;

class Edit extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


      <div class="ibox-content m-b-sm border-bottom">
        <form action="/update/customer/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="method" value="PUT">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group text-center">
                <img src="/public/assets/images/<?= $data['avatar'] ?>"
                  class="rounded rounded-circle img-fluid mx-auto d-block" width="250px" style="max-height: 250px" alt="Ảnh chưa cập nhật">
                <br>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="username">Username <span class="text-danger">*</span></label>
                <input type="text" id="username" name="username" value="<?= $data['username'] ?>"
                  placeholder="Username người dùng" class="form-control" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="name">Họ và tên <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="<?= $data['name'] ?>" placeholder="Họ và tên"
                  class="form-control" disabled>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label" for="avatar">Đổi ảnh đại diện</label>
                <input type="file" id="avatar" name="avatar" value="" class="form-control" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $data['email'] ?>" placeholder="Địa chỉ email"
                  class="form-control" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="phone">Số điện thoại</label>
                <input type="text" id="phone" name="phone" value="<?= $data['phone'] ?>" placeholder="Số điện thoại"
                  class="form-control" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="password">Mật khẩu</label>
                <input type="text" id="password" name="password"
                  value="<?= isset($data['password']) ? '****************' : '' ?>" placeholder="Mật khẩu"
                  class="form-control" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="address">Địa chỉ</label>
                <input type="text" id="address" name="address" value="<?= $data['address'] ?>" placeholder="Địa chỉ email"
                  class="form-control" disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="status">Trạng thái <span class="text-danger">*</span></label>
                <select class="form-control" id="status" name="status" aria-label="Default select example">
                  <?php if ($data['status'] == 1): ?>
                    <option value="1" selected>Hoạt động</option>
                    <option value="2">Khóa</option>
                  <?php elseif ($data['status'] == 2): ?>
                    <option value="2" selected>Khóa</option>
                    <option value="1">Hoạt động</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="role">Quyền <span class="text-danger">*</span></label>
                <select class="form-control" id="role" name="role" aria-label="Default select example">
                  <?php if ($data['role'] == 1): ?>
                    <option value="1" selected>Quản trị viên</option>
                    <option value="0">Khách hàng</option>
                  <?php elseif ($data['role'] == 0): ?>
                    <option value="0" selected>Khách hàng</option>
                    <option value="1">Quản trị viên</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <button type="reset" class="btn btn-success">Hủy</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
  }
}
?>