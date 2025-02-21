<?php
namespace App\Views\Admin\Pages\Warehouses\PurchaseOrders;

use App\Views\BaseView;

class Create extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2>Thêm mới đơn hàng</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Thêm mới đơn hàng</strong>
          </li>
        </ol>
      </div>
      <div class="col-lg-2">

      </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


      <div class="ibox-content m-b-sm border-bottom">
        <form action="/purchase_order/store" method="post" enctype="multipart/form-data">
          <input type="hidden" name="method" value="POST">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="name">Tên đơn hàng <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="date">Ngày <span class="text-danger">*</span></label>
                <input type="date" id="date" name="date" value="" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="quantity">Số lượng <span class="text-danger">*</span></label>
                <input type="number" id="quantity" name="quantity" value="" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="unit">Đơn vị tính: <span class="text-danger">*</span></label>
                <select class="form-control" id="unit" name="unit" aria-label="Default select example">
                  <option value="Kg" selected>Kí</option>
                  <option value="Gr">Gam</option>
                  <option value="Tấn">Tấn</option>
                  <option value="L">Lít</option>
                  <option value="Ml">Mililit</option>
                  <option value="Qủa">Quả</option>
                  <option value="Cái">Cái</option>
                  <option value="Bao">Bao</option>
                  <option value="Bó">Bó</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="unit_price">Tổng tiền <span class="text-danger">*</span></label>
                <input type="number" id="unit_price" name="unit_price" value="" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="unit_price">Trạng thái <span class="text-danger">*</span></label>
                <select id="status" name="status" value="" class="form-control">
                  <option value="">Chọn trạng thái</option>
                  <option value="1">Đã nhận</option>
                  <option value="0">Chưa nhận</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Thêm</button>
                <button type="reset" class="btn btn-success">Nhập lại</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script>
      CKEDITOR.replace('description');
    </script>
    <?php
  }
}
?>