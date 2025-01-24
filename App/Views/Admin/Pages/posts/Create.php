<?php
namespace App\Views\Admin\Pages\Posts;

use App\Views\BaseView;

class Create extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2>Thêm mới bài viết</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Thêm mới bài viết</strong>
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
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="order_id">Order ID</label>
                <input type="text" id="order_id" name="order_id" value="" placeholder="Order ID" class="form-control">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="status">Order status</label>
                <input type="text" id="status" name="status" value="" placeholder="Status" class="form-control">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="customer">Customer</label>
                <input type="text" id="customer" name="customer" value="" placeholder="Customer" class="form-control">
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