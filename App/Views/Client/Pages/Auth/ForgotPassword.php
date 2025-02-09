<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class forgotPassword extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <div class="container">
      <div class="w-50 mx-auto my-5">
        <div class="card">
          <div class="card-header">
            <h2 class="text-center">Nhập mã xác nhận</h2>
          </div>
          <div class="card-body">
            <form action="/forgotpassword/checkopt" method="post">
              <input type="hidden" name="method" value="POST">
              <div class="mb-3">
                <label for="otpEmail" class="form-label text-dark">Mã xác nhận</label>
                <input type="text" class="form-control" id="otpEmail" name="otpEmail">
                <span id="errorOldPassword" class="text-danger"></span>
              </div>
              <div class="mb-3">
                <div class="form-group">
                  <label for="password" class="form-label text-dark">Nhập mật khẩu mới:</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" oninput="validatePassword(this.value)">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="fas fa-eye"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <span id="minLength"><i class="fas fa-times
                                     text-danger"></i> Tối thiểu 6 kí tự</span>
                </div>
                <span id="errorMessage" class="font-weight-bold
                         text-danger"></span>
              </div>
              <div class="mb-3 text-center">
                <button type="submit" name="submit" class="btn btn-primary w-25">Xác nhận</button>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
    </script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js">
    </script>

    <script>
      // Function to toggle password visibility
      document.getElementById('togglePassword').addEventListener('click',
        function () {
          const passwordInput = document.getElementById('password');
          const icon = this.querySelector('i');

          if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
          } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
          }
        });
      document.getElementById('togglePassword2').addEventListener('click',
        function () {
          const passwordInput2 = document.getElementById('password2');
          const icon2 = this.querySelector('.icon-2');
          // console.log(passwordInput2);
          console.log(icon2);


          if (passwordInput2.type === 'password') {
            passwordInput2.type = 'text';
            icon2.classList.remove('fa-eye');
            icon2.classList.add('fa-eye-slash');
          } else {
            passwordInput2.type = 'password';
            icon2.classList.remove('fa-eye-slash');
            icon2.classList.add('fa-eye');
          }
        });
      function validatePassword(password) {
        const strongPasswordRegex =
          /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        const errorMessage = document.getElementById('errorMessage');

        // Check each condition and update the corresponding label
        document.getElementById('minLength').innerHTML =
          password.length >= 6 ?
            '<i class="fas fa-check text-success"></i> Mật khẩu mạnh ' :
            '<i class="fas fa-times text-danger"></i> Tối thiểu 6 kí tự';
      }
      function checkValidatePassword(password2) {
        const lengthPassword = document.getElementById('password').value;
        document.getElementById('passwordLength').innerHTML =
          password2.length === lengthPassword.length ?
            '<i class="fas fa-check text-success"></i> Độ dài đã trùng khớp ' :
            '<i class="fas fa-times text-danger"></i> Độ dài chưa trùng khớp';
      }
      function validateForm(event) {
        const oldpassword = document.getElementById('oldpassword').value;
        const password = document.getElementById('password').value;
        const password2 = document.getElementById('password2').value;

        const isPasswordValid = password.length >= 6;

        const isPasswordMatch = password === password2;
        if (oldpassword.length === 0) {
          document.getElementById('errorOldPassword').innerText = 'Vui lòng nhập lại mật khẩu cũ.';
        } else {
          document.getElementById('errorOldPassword').innerText = '';
        }
        if (!isPasswordValid) {
          document.getElementById('errorMessage').innerText = 'Vui lòng nhập mật khẩu mới.';
        } else {
          document.getElementById('errorMessage').innerText = '';
        }
        if (!password2) {
          document.getElementById('errorMessageLength').innerText = 'Vui lòng nhập lại mật khẩu mới.';
        } else {
          if (!isPasswordMatch) {
            document.getElementById('errorMessageLength').innerText = 'Mật khẩu nhập lại không khớp.';
          } else {
            document.getElementById('errorMessageLength').innerText = '';
          }
        }
        if (!isPasswordValid || !isPasswordMatch) {
          event.preventDefault();
        }
      }

      // Gắn sự kiện onsubmit vào form
      document.querySelector('form').addEventListener('submit', validateForm);
    </script>
    <?php
  }
}