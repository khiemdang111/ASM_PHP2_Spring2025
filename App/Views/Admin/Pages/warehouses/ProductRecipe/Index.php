<?php
namespace App\Views\Admin\Pages\Warehouses\ProductRecipe;

use App\Views\BaseView;

class Index extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
        <h2>Công thức món ăn</h2>
        <ol class="breadcrumb">
          <li>
            <a href="index.html">Trang chủ</a>
          </li>
          <li class="active">
            <strong>Công thức món ăn</strong>
          </li>
        </ol>
      </div>
      <div class="col-lg-2 align-end px-3" style="text-align: end">
        <a href="/admin/warehouse/productrecipe/create" class="btn btn-primary mt-3">Thêm mới</a>
      </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5>Tất cả công thức </h5>
              <div class="ibox-tools">
                <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                  <li><a href="#">Config option 1</a>
                  </li>
                  <li><a href="#">Config option 2</a>
                  </li>
                </ul>
                <a class="close-link">
                  <i class="fa fa-times"></i>
                </a>
              </div>
            </div>
            <div class="ibox-content">
              <div class="row mb-3">
                <div class="col-sm-5 m-b-xs">
                </div>
                <div class="col-sm-3 m-b-xs">
                </div>
                <div class="col-sm-4">
                  <form action="/recipes/search" method="get">
                    <div class="input-group">
                      <input type="text" name="keyword" class="input-sm form-control"
                        value="<?php echo isset($_SESSION['keyword']) ? $_SESSION['keyword'] : ''; ?>"
                        placeholder="Tìm kiếm">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-primary"> Tìm kiếm</button> </span>
                    </div>
                  </form>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th><input type="checkbox" class="i-checks" name="input[]"></th>
                      <th>Tên</th>
                      <th>Sản phẩm </th>
                      <th>Thành phần</th>
                      <th>Tùy chỉnh</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (!empty($data)):
                      $result = [];
                      // Nhóm các công thức lại dựa trên product_recipes_id
                      foreach ($data as $recipe) {
                        $id = $recipe['product_recipes_id'];
                        if (!isset($result[$id])) {
                          $result[$id] = [
                            'product_recipes_id' => $recipe['product_recipes_id'],
                            'product_recipes_name' => $recipe['product_recipes_name'],
                            'product_name' => $recipe['product_name'],
                            'materials' => [] // Đảm bảo materials luôn tồn tại
                          ];
                        }
                        // Thêm thông tin nguyên liệu vào materials
                        $result[$id]['materials'][] = [
                          'material_name' => $recipe['material_name'],
                          'quantity' => $recipe['quantity'],
                          'unit' => $recipe['unit']
                        ];
                      }
                      ?>
                      <?php foreach ($result as $recipe): ?>
                        <tr>
                          <td>
                            <input type="checkbox" class="i-checks" name="input[]">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($recipe['product_recipes_id']); ?>">
                          </td>
                          <td><?= htmlspecialchars($recipe['product_recipes_name']) ?></td>
                          <td><?= htmlspecialchars($recipe['product_name']) ?></td>
                          <td>
                            <?php if (!empty($recipe['materials'])): ?>
                              <ul>
                                <?php foreach ($recipe['materials'] as $material): ?>
                                  <li>
                                    <?= htmlspecialchars($material['material_name']) ?> -
                                    <?= htmlspecialchars($material['quantity']) ?>
                                    <?= htmlspecialchars($material['unit']) ?>
                                  </li>
                                <?php endforeach; ?>
                              </ul>
                            <?php else: ?>
                              <span class="text-danger">Lỗi công thức món</span>
                            <?php endif; ?>
                          </td>
                          <td>
                          <div class="custom-icon-detail">
                              <!-- From Uiverse.io by Galahhad -->
                              <label class="popup">
                                <input type="checkbox">
                                <div class="burger" tabindex="0">
                                  <span></span>
                                  <span></span>
                                  <span></span>
                                </div>
                                <nav class="popup-window">
                                  <ul>
                                    <li>
                                      <a href="/admin/product/edit/">
                                        <button>
                                          <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                            stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon>
                                          </svg>
                                          <span>Sửa</span>
                                        </button>
                                      </a>
                                    </li>
                                    <hr>
                                    <li>
                                      <form action="/admin/product/delete/" method="post"
                                        style="display: inline-block;">
                                        <input type="hidden" name="method" value="POST">
                                        <button type="submit">
                                        <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="2"
                                            stroke="currentColor" fill="none" viewBox="0 0 24 24" height="14" width="14"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 6h18" />
                                            <path d="M8 6V4h8v2" />
                                            <path d="M10 11l4 4" />
                                            <path d="M14 11l-4 4" />
                                            <path d="M19 6l-1 14H6L5 6" />
                                          </svg>
                                          <span>Xóa</span>
                                        </button>
                                      </form>
                                    </li>
                                  </ul>
                                </nav>
                              </label>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="4" class="text-center text-danger">Không tìm thấy công thức trong dữ liệu!</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <script>
      CKEDITOR.replace('description');
    </script>
    <?php
  }
}
?>