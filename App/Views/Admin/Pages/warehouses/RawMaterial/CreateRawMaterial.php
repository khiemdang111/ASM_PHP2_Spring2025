<?php
namespace App\Views\Admin\Pages\Warehouses\RawMaterial;

use App\Views\BaseView;

class CreateRawMaterial extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2>Thêm mới nguyên liệu</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Thêm mới nguyên liệu</strong>
          </li>
        </ol>
      </div>
      <div class="col-lg-2">

      </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


      <div class="ibox-content m-b-sm border-bottom">
        <form action="/rawmaterial/store" method="post" enctype="multipart/form-data">
          <input type="hidden" name="method" value="POST">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="name">Tên nguyên liệu <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="unit">Đơn vị tính: <span class="text-danger">*</span></label>
                <select class="form-control" id="unit" name="unit" aria-label="Default select example">
                  <option value="Kg" selected>Kí</option>
                  <option value="Gr">Gam</option>
                  <option value="L">Lít</option>
                  <option value="Ml">Mililit</option>
                  <option value="Qua">Quả</option>
                  <option value="Cai">Cái</option>
                  <option value="Bao">Bao</option>
                  <option value="Bó">Bó</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="quantity">Số lượng tối thiểu <span class="text-danger">*</span></label>
                <input type="number" id="quantity" name="quantity" value="" class="form-control">
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