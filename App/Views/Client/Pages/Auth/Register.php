<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="register">
      <!-- From Uiverse.io by akshat-patel28 -->
      <div class="form-container mx-auto my-3 py-3">
        <h3 class="title">Đăng kí tài khoản</h3>
        <form class="form" method="post">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="username" class="form-label">Username <span class="text-danger"> *</span></label>
              <input type="text" name="username" id="username" class="input">
            </div>
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Họ và tên <span class="text-danger"> *</span></label>
              <input type="text" class="input" id="name" name="name">
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email <span class="text-danger"> *</span></label>
              <input type="email" id="email" name="email" class="input">
            </div>
            <div class="col-md-6 mb-3">
              <label for="phone" class="form-label">Số điện thoại <span class="text-danger"> *</span></label>
              <input type="text" id="phone" name="phone" class="input">
            </div>
            <div class="col-md-12 mb-3">
              <label for="address" class="form-label">Địa chỉ <span class="text-danger"> *</span></label>
              <input type="text" id="address" name="address" class="input">
            </div>
            <div class="col-md-6 mb-3">
              <label for="password" class="form-label">Mật khẩu <span class="text-danger"> *</span></label>
              <input type="password" id="password" name="password" class="input">
            </div>
            <div class="col-md-6 mb-3">
              <label for="pre_password" class="form-label">Nhập lại mật khẩu <span class="text-danger"> *</span></label>
              <input type="password" id="pre_password" name="pre_password" class="input">
            </div>
            <button class="form-btn btn-primary">Đăng kí</button>
          </div>
      </div>
      </form>
    </div>
    <?php
  }
}
?>