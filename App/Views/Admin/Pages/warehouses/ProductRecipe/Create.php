<?php
namespace App\Views\Admin\Pages\Warehouses\ProductRecipe;

use App\Views\BaseView;

class Create extends BaseView
{
  public static function render($data = null)
  {
    $product = $data['products'];
    $rawMaterials = $data['rawMaterials'];
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2>Thêm mới công thức món ăn</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Thêm mới công thức món ăn</strong>
          </li>
        </ol>
      </div>
      <div class="col-lg-2">

      </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
      <div class="ibox-content m-b-sm border-bottom">
        <form action="/warehouse/productrecipe/store" method="post" enctype="multipart/form-data">
          <input type="hidden" name="method" value="POST">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="name">Tên công thức <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" value="" class="form-control" placeholder="Tên công thức món ăn">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="control-label" for="product_id">Món ăn <span class="text-danger">*</span></label>
                <select class="Select2 form-control " id="product_id" name="product_id" aria-label="Default select example">
                  <option value="" selected>Chọn</option>
                  <?php foreach ($product as $item): ?>
                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-ms-12 controls">
              <div class="form">
                <div class="entry mb-2">
                  <div id="add-select-productrecipe" class="parent-class">
                    <div class="col-sm-4 mb-3">
                      <label class="control-label" for="material_id">Nguyên liệu <span class="text-danger">*</span></label>
                      <select class="form-control material Select2" id="material_id" name="material_id[]"
                        aria-label="Default select example" data-model="raw_materials">
                        <option value="" selected>Chọn</option>
                        <?php foreach ($rawMaterials as $item): ?>
                          <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-sm-3 mb-3">
                      <label class="control-label" for="quantity">Số lượng <span class="text-danger">*</span></label>
                      <input class="form-control" name="quantity[]" id="quantity" type="text">
                    </div>
                    <div class="col-sm-3 mb-3">
                      <label class="control-label" for="unit_material">Đơn vị <span class="text-danger">*</span></label>
                      <input class="form-control unit_material" name="unit_material[]" type="text" value="" readonly>
                    </div>

                    <div class="col-sm-2">
                      <label class="control-label" for="date" style="margin-top: 37px"></label>
                      <button class="btn btn-primary btn-add" type="button">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
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
    <!-- <script>
      $(document).on('click', '.btn-add', function (e) {
        e.preventDefault();
        var controlForm = $('.controls .form:first'),
          currentEntry = $(this).closest('.entry'),
          newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
          .removeClass('btn-add btn-success').addClass('btn-remove btn-danger')
          .html('<i class="fa fa-minus"></i>');
      }).on('click', '.btn-remove', function (e) {
        e.preventDefault();
        $(this).closest('.entry').remove();
      });
    </script> -->
    <script>
      CKEDITOR.replace('description');
    </script>
    <?php
  }
}
?>