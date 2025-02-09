<?php
namespace App\Controllers\Client;

use App\Models\User;
use App\Views\Client\Components\Notification;
use App\Helpers\NotificationHelper;
use App\Mail\Mailer;

class EmailController
{
  public function checkEmail($email)
  {
    if ($email == '') {
      NotificationHelper::error('emptyEmail', 'Không được để trống email');
      return false;
    }
    $mailer = new Mailer();
    $user = new User();
    $getUser = $user->getOneUserByEmail($email);
    $_SESSION['id_user'] = $getUser['id'];
    if (!$getUser) {
      NotificationHelper::error('notFoundUser', 'Email không tồn tại');
      return false;
    }
    if ($getUser['email'] === $email) {
      $code = substr(rand(0, 99999), 0, 6);
      $title = "Cấp lại mật khẩu";
      $content = "Mã xác nhận của bạn là: <b>$code</b> ";
      $mailer->sendEmail($title, $content, $email);
      $_SESSION['email'] = $email;
      $_SESSION['code'] = $code;
    }
    return true;
  }
  public function checkOpt()
  {
    $id = $_SESSION['id_user'];
    $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $data = [
      'password' => $hash_password,
    ];
    if (isset($_POST['submit'])) {
      if ($_POST['otpEmail'] != $_SESSION['code']) {
        echo '<div class="alert alert-danger" role="alert">Mã xác nhận không đúng!</div>';
      } else {
        unset($_SESSION['code']);
        unset($_SESSION['id_user']);
        $user = new User();
        $result = $user->update($id,$data);
        if ($result) {
          header("Location: /login");
          NotificationHelper::success('updatePasswordSuccess', 'Cập nhật mật khẩu thành công');
        } else {
          NotificationHelper::error('updatePasswordError', 'Cập nhật mật khẩu thất bại');
        }
        header("Location: /login");
      }
    }
  }
}