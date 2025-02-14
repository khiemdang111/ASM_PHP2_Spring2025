document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form-info-customer");

  if (form) {
    const inputs = form.querySelectorAll("input, select, textarea");

    inputs.forEach(input => {
      input.addEventListener("change", function () {
        let obj = {
          name: form.elements['name'].value,
          email: form.elements['email'].value,
          phone: form.elements['phone'].value,
          address: form.elements['address'].value,
          province: form.elements['province'].value,
          district: form.elements['district'].value,
          ward: form.elements['ward'].value
        };

        // tên
        if (obj.name === '') {
          document.getElementById("errorName").innerHTML = "Vui lòng nhập họ tên"
        } else if (/\d/.test(obj.name)) {
          errorName.innerHTML = "Họ tên không được chứa số";
          errorName.style.color = "red";
        } else if (/[\d!@#$%^&*()_+={}\[\]:;"'<>,.?\/\\|`~]/.test(obj.name)) {
          errorName.innerHTML = "Họ tên không được chứa kí tự đặt biệt";
        } else {
          errorName.innerHTML = "";
        }

        //email
        if (obj.email === '') {
          document.getElementById("errorEmail").innerHTML = "Vui lòng nhập email"
        } else if (!(/^[^\s@]+@[^\s@]+\.[^\s@]+$/).test(obj.email)) {
          errorEmail.innerHTML = "Email không hợp lệ";
        }
        else {
          errorEmail.innerHTML = "";
        }

        //sđt
        if (obj.phone === '') {
          document.getElementById("errorPhone").innerHTML = "Vui lòng nhập số điện thoại"
        } else if (!/^\d{10}$/.test(obj.phone)) {
          errorPhone.innerHTML = "Số điện thoại không hợp lệ";
        } else {
          errorPhone.innerHTML = "";
        }

        // tỉnh
        if (obj.province === '') {
          document.getElementById("errorProvince").innerHTML = "Vui lòng chọn tỉnh/thành phố"
        } else {
          errorProvince.innerHTML = "";
        }

        // quận/huyện
        if (obj.district === '') {
          document.getElementById("errorDistrict").innerHTML = "Vui lòng chọn quận/huyện"
        } else {
          errorDistrict.innerHTML = "";
        }
        // xã/phư��ng
        if (obj.ward === '') {
          document.getElementById("errorWard").innerHTML = "Vui lòng chọn xã/phường"
        } else {
          errorWard.innerHTML = "";
        }

        // địa chỉ
        if (obj.address === '') {
          document.getElementById("errorAddress").innerHTML = "Vui lòng nhập địa chỉ"
        } else {
          errorAddress.innerHTML = "";
        }
        
      });
    });
  }
});
