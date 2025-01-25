<?php
namespace App\Views\Admin\Pages\Users;

use App\Views\BaseView;

class Create extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2>Thêm mới người dùng</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Thêm mới người dùng</strong>
          </li>
        </ol>
      </div>
      <div class="col-lg-2">

      </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


      <div class="ibox-content m-b-sm border-bottom">
        <form action="">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="username">Username <span class="text-danger">*</span></label>
                <input type="text" id="username" name="username" value="" placeholder="Username" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="name">Họ và tên <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="" placeholder="Tên đầy đủ của người dùng" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="email">Email <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" value="" placeholder="Email"
                  class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="phone">Số điện thoại <span class="text-danger">*</span></label>
                <input type="text" id="phone" name="phone" value="" placeholder="Số điện thoại" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="avatar">Ảnh đại diện </label>
                <input type="file" id="avatar" name="avatar" value="" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="address">Địa chỉ <span class="text-danger">*</span></label>
                <input type="text" id="address" name="address" value="" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="role">Quyền</label>
                <select class="form-control" name="role" id="role" aria-label="Default select example">
                  <option value="0" selected>Khách hàng</option>
                  <option value="1">Quản trị viên</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="status">Trạng thái <span class="text-danger">*</span></label>
                <select class="form-control" id="status" name="status" aria-label="Default select example">
                  <option value="0" selected>Hiển thị</option>
                  <option value="1">Ẩn</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="password">Mật khẩu <span class="text-danger">*</span></label>
                <input type="password" id="password" name="password" value="" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="pre_password">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                <input type="password" id="pre_password" name="pre_password" value="" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <button class="btn btn-primary">Thêm</button>
                <button class="btn btn-success">Nhập lại</button>
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