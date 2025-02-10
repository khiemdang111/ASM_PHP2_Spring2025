<?php
namespace App\Views\Admin\Pages\Categories;

use App\Views\BaseView;

class Edit extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2>Sửa danh mục sản phẩm</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Sửa danh mục sản phẩm</strong>
          </li>
        </ol>
      </div>
      <div class="col-lg-2">

      </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


      <div class="ibox-content m-b-sm border-bottom">
        <form action="/update/category/<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="method" value="PUT">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label" for="name">Tên <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="<?= $data['name']?>" placeholder="Tên danh mục sản phẩm" class="form-control">
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
                <?php if ($data['status'] == 1): ?>
                    <option value="1" selected>Hiển thị</option>
                    <option value="2">Ẩn</option>
                  <?php else: ?>
                    <option value="2" selected>Ẩn</option>
                    <option value="1">Hiển thị</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label" for="description">Mô tả <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control description" id="description" rows="8" placeholder="Nhập mô tả"><?= $data['description']?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
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