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
        <h2>Nhập đơn hàng vào kho</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Nhập đơn hàng</strong>
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
                <label class="control-label" for="unit">Tên đơn <span class="text-danger">*</span></label>
                <select class="form-control Select2" id="unit" name="name" aria-label="Default select example"
                  data-model="raw_materials" >
                  <option value="" selected>Chọn</option>
                  <?php foreach ($data as $item): ?>
                    <option value="<?= $item['name'] ?>" data-id="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="date">Ngày <span class="text-danger">*</span></label>
                <input type="datetime-local" id="date" name="date" value="" class="form-control">
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
                <label class="control-label" for="unit_material">Đơn vị tính: <span class="text-danger">*</span></label>
                <input class="form-control unit_material" id="unit_material" name="unit" type="text" value="" readonly>
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