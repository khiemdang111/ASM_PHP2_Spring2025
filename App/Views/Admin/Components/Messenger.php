<?php

namespace App\Views\Admin\Components;

use App\Views\BaseView;

class Messenger extends BaseView
{
 public static function render($data = null)
 {
  if (isset($_SESSION['success'])):
   foreach ($_SESSION['success'] as $key => $value):
    ?>
    <div class="container">
      <script>
        Swal.fire({
  title: "Hoàn tất",
  text: "<?= $value ?>",
  icon: "success"
});
      </script>
    </div>
    <?php
   endforeach;
  endif;
  ?>

  <?php
  if (isset($_SESSION['error'])):
   foreach ($_SESSION['error'] as $key => $value):
    ?>
    <div class="page-wrapper px-5">
     <div class="alert alert-danger alert-dismissible w-75">
      <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
      <strong><?= $value ?></strong>
     </div>
    </div>
    <?php
   endforeach;

  endif;
 }
}

?>