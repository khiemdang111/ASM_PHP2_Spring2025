<?php

namespace App\Controllers\Client;

use App\Helpers\AuthHelper;
use App\Helpers\NotificationHelper;

use App\Views\Client\Layout\Header;
use App\Views\Client\Layout\Footer;

use App\Views\Client\Pages\Auth\Register;
use App\Views\Client\Pages\Auth\Login;
use App\Views\Client\Pages\Auth\Edit;
use App\Views\Client\Pages\Auth\ChangePassword;
use App\Views\Client\Pages\Auth\ForgotPassword;

use App\Models\User;
use App\Validations\AuthValidation;
use App\Views\Client\Components\Notification;

class AuthController
{
    public static function register()
    {
        // Hiển thị Header
        Header::render();
        // Hiển thị thông báo
        Notification::render();
        // Hủy session thông báo
        NotificationHelper::unset();
        // Hiển thị trang đăng ký
        Register::render();
        // Hiển thị Footer
        Footer::render();
    }

    // Thực hiện đăng kí
    public static function registerAction()
    {
        $is_valid = AuthValidation::register();
        if (!$is_valid) {
            NotificationHelper::error('register_valid', 'Đăng ký thất bại');
            header('Location: /register');
            exit();
        }
        $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data = [
            'username' => $_POST['username'],
            'password' => $hash_password,
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address']
        ];
        $user = new User();
        $result = $user->createUser($data);
        if ($result) {
            NotificationHelper::success('register_valid', 'Đăng ký thành công');
            header('Location: /login');
        } else {
            var_dump('Đăng ký thất bại');
        }
    }


    public static function login()
    {
        // Hiển thị Header
        Header::render();
        // Hiển thị trang đăng ký
        Notification::render();
        ///////////////////////////
        NotificationHelper::unset();

        Login::render();
        // Hiển thị Footer
        Footer::render();
    }
    public static function loginAction()
    {
        // Bắt lỗi
        // validation

        $is_valid = AuthValidation::login();
        if (!$is_valid) {
            NotificationHelper::error('login', ' Đăng nhập thất bại');
            header('Location: /login');
            exit();
        }
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'remember' => isset($_POST['remember'])
        ];
        $result = AuthHelper::login($data);
        if ($result) {
            // NotificationHelper::success('login', 'Đăng nhập thành công');
            header('Location: /');
        } else {
            // NotificationHelper::error('login', 'Đăng nhập thất bại');
            header('Location: /login');
        }
    }

    public static function checkLogin(): bool
    {
        if (isset($_COOKIE['user'])) {
            $user = $_COOKIE['user'];
            $user_data = json_decode($user);

            $_SESSION['user'] = (array) $user_data;

            return true;
        }

        if (isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }

    public static function logout()
    {
        AuthHelper::logout();
        NotificationHelper::success('logout', 'Đăng xuất thành công');
        header('Location: /');
    }

    public static function edit($id)
    {
        $resutl = AuthHelper::edit($id);
        if (!$resutl) {
            if (isset($_SESSION['error']['login'])) {
                header('Location: /login');
                exit();
            }

            if (isset($_SESSION['error']['user_id'])) {

                $data = $_SESSION['user'];
                $user_id = $data['id'];
                header("Location: /users/$user_id");
                exit();
            }
        }

        $data = $_SESSION['user'];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        Edit::render($data);
        Footer::render();
    }

    public static function upload($id)
    {
        $is_valid = AuthValidation::edit();

        if (!$is_valid) {
            NotificationHelper::error('upload_user', 'Cập nhật thất bại');
            header("Location: /users/$id");
            exit();
        }
        $data = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
        ];

        // Kiểm trá có upload hình ảnh ko, nếu có thì kiểm tra có hợp lệ hay không
        $is_upload = AuthValidation::uploadAvatar();
        if ($is_upload) {
            $data['avatar'] = $is_upload;
        }

        // Gọi helper để upload
        $result = AuthHelper::update($id, $data);
        // Kiểm tra kết quả trả về và chuyển hướng
        header("Location: /users/$id");
    }
    public static function changePassword($id)
    {
        // $id = $_GET['id'];
        $data = $_SESSION['user'];
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ChangePassword::render($data);
        Footer::render();
    }
    public static function uploadPassword($id)
    {
        // var_dump($id);
        // var_dump($_POST); die;
        $oldpassword = $_POST['oldpassword'];
        $checkpassword = AuthHelper::checkPassword($id, $oldpassword);
        if ($checkpassword) {
            $newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
            $data = [
                'password' => $newpassword
            ];
            $result = AuthHelper::update($id, $data);
            if ($result) {
                NotificationHelper::success('change_password', 'Đổi mật khẩu thành công');
                header('Location: /users/' . $id);
            } else {
                NotificationHelper::error('change_password', 'Đổi mật khẩu thất bại');
                header('Location: /user/changepassword/' . $id);
            }
        } else {
            NotificationHelper::error('change_password', 'Mật khẩu cũ không đúng');
            header('Location: /user/changepassword/' . $id);
        }

    }
    public function forgotPassword()
    {
        $mail = new EmailController();
        $email = $_GET['email'];
        $check = $mail->checkEmail($email);
        if (!$check) {
            header('Location: /login');
            exit();
        }
        Header::render();
        Notification::render();
        NotificationHelper::unset();
        ForgotPassword::render();
        Footer::render();
    }
}