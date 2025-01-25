<?php
namespace App\Views\Admin\Pages\Categories;

use App\Views\BaseView;

class Create extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2>Thêm mới danh mục sản phẩm</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Thêm mới danh mục sản phẩm</strong>
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
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label" for="name">Tên <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="" placeholder="Tên danh mục sản phẩm" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="image">Hình ảnh <span class="text-danger">*</span></label>
                <input type="file" id="image" name="image" value="" class="form-control">
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
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label" for="description">Mô tả <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control description" id="description" rows="8" placeholder="Nhập mô tả"></textarea>
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
    <script>
        CKEDITOR.replace('description');
      </script>
    <?php
  }
}
?>