<?php
namespace App\Views\Admin\Pages\Products;

use App\Views\BaseView;

class Create extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2>Thêm mới sản phẩm</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Thêm mới sản phẩm</strong>
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
                <label class="control-label" for="name">Tên sản phẩm <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="" placeholder="Tên sản phẩm" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="price">Giá <span class="text-danger">*</span></label>
                <input type="text" id="price" name="price" value="" placeholder="Giá sản phẩm" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="discout_price">Giảm giá</label>
                <input type="text" id="discout_price" name="discout_price" value="" placeholder="Giảm giá"
                  class="form-control">
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
                <label class="control-label" for="is_featured">Nổi bật</label>
                <select class="form-control" name="is_featured" id="is_featured" aria-label="Default select example">
                  <option value="0" selected>Không nổi bật</option>
                  <option value="1">Nổi bật</option>
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
                <label class="control-label" for="category_id">Danh mục <span class="text-danger">*</span></label>
                <select class="form-control" name="category_id" id="category_id" aria-label="Default select example">
                  <option value="0" selected>Không nổi bật</option>
                  <option value="1">Nổi bật</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label" for="description">Mô tả <span class="text-danger">*</span></label>
                <textarea name="" class="form-control" id="" rows="8" placeholder="Nhập mô tả"></textarea>
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