<?php

namespace App\Views\Admin\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
  public static function render($data = null)
  {
    if (isset($_SESSION['success'])):
      foreach ($_SESSION['success'] as $key => $value):
        ?>
        <script>
          Swal.fire({
            title: "Hoàn tất!",
            text: "<?php echo htmlspecialchars($value); ?>", // Hiển thị nội dung lỗi
            icon: "success"
          });
        </script>
        <?php
      endforeach;
      unset($_SESSION['success']);
    endif;
    ?>

    <?php
    if (isset($_SESSION['error'])):
      foreach ($_SESSION['error'] as $key => $value):
        ?>
        <div class="page-wrapper px-5">
          <div class="alert alert-danger alert-dismissible w-75">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?= $value ?></strong>
          </div>
        </div>
        <?php
      endforeach;

    endif;
  }
}

?>