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
      $content = ' <div style="max-width: 500px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; background-color: #f9f9f9; border-radius: 8px; text-align: center; ">
                      <img src="https://st.quantrimang.com/photos/image/2020/07/06/Hinh-Nen-Mo-Khoa-Dien-Thoai-Hai-Huoc-25.jpg" 
                          alt="Company Logo" 
                          style="width: 320px; height: 300px; margin-bottom: 20px;">
                      <h2 style="color: #333;">Khôi phục mật khẩu của bạn</h2>
                      <p style="color: #555; font-size: 14px;">Chúng tôi nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn. Nếu bạn không thực hiện yêu cầu này, vui lòng bỏ qua email này.</p>
                      <p style="color: #555; font-size: 14px;">Nhấp vào nút bên dưới để đặt lại mật khẩu của bạn:</p>
                      <p>Mã OTP của bạn là: <b> ' . $code . ' </b></p>
                      <p style="color: #555; font-size: 14px; margin-top: 20px;">Cảm ơn,<br> <strong>Đội ngũ hỗ trợ</strong></p>
                  </div>
                ';
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
        $result = $user->update($id, $data);
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