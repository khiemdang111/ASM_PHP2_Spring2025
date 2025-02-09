<?php
namespace App\Views\Admin\Pages\Products;

use App\Views\BaseView;

class Edit extends BaseView
{
  public static function render($data = null)
  {
    $item_product = $data['product'][0];
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2>Sửa sản phẩm</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Sửa sản phẩm</strong>
          </li>
        </ol>
      </div>
      <div class="col-lg-2">

      </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">


      <div class="ibox-content m-b-sm border-bottom">
        <form action="/update/product/<?= $item_product['id'] ?>" method="post">
          <input type="hidden" name="method" value="PUT">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group text-center">
              <img src="/public/assets/images/<?= $item_product['image'] ?>" class="rounded mx-auto d-block" width="250px" style="max-height: 250px" alt=""> <br>
              </div>
              <div class="form-group">
                <label class="control-label" for="name">Tên sản phẩm <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="<?= $item_product['name'] ?>" placeholder="Tên sản phẩm"
                  class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="price">Giá <span class="text-danger">*</span></label>
                <input type="text" id="price" name="price" value="<?= $item_product['price'] ?>" placeholder="Giá sản phẩm"
                  class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="discount_price">Giảm giá</label>
                <input type="text" id="discount_price" name="discount_price" value="<?= $item_product['discount_price'] ?>"
                  placeholder="Giảm giá" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="image">Đổi ảnh</label>
                <input type="file" id="image" name="image" value="" class="form-control">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="is_featured">Nổi bật</label>
                <select class="form-control" name="is_featured" id="is_featured" aria-label="Default select example">
                  <?php if ($item_product['is_featured'] == 1): ?>
                    <option value="1" selected>Nổi bật</option>
                    <option value="0">Không nổi bật</option>
                  <?php else: ?>
                    <option value="0" selected>Không nổi bật</option>
                    <option value="1">Nổi bật</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="status">Trạng thái <span class="text-danger">*</span></label>
                <select class="form-control" id="status" name="status" aria-label="Default select example">
                  <?php if ($item_product['status'] == 1): ?>
                    <option value="1" selected>Hiển thị</option>
                    <option value="0">Ẩn</option>
                  <?php else: ?>
                    <option value="0" selected>Ẩn</option>
                    <option value="1">Hiển thị</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="category_id">Danh mục <span class="text-danger">*</span></label>
                <select class="form-control" name="category_id" id="category_id" aria-label="Default select example">
                  <option selected value="<?= $item_product['category_id'] ?>"><?= $item_product['category_name'] ?>
                  </option>
                  <?php foreach ($data['categories'] as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label" for="description">Mô tả <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control description" id="description" rows="8"
                  placeholder="Nhập mô tả"><?= $item_product['description'] ?></textarea>
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