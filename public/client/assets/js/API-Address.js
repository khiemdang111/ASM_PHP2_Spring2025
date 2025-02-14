(function ($) {
  "use strict";
  var _token = $('meta[name="csrf-token"]').attr("content");
  var HT = {};

  // Hàm tải danh sách tỉnh/thành phố
  HT.loadProvinces = () => {
    $("#province").on("focus", function (e) {
      fetch('https://vn-public-apis.fpo.vn/provinces/getAll?limit=-1')
        .then(response => response.json())
        .then(data => {
          let provinces = data.data.data;
          document.getElementById("province").innerHTML = "";
          provinces.forEach(value => {
            document.getElementById("province").innerHTML += `<option class="province_id" data-id="${value.code}" value="${value.code}">${value.name}</option>`;
          });
        })
        .catch(err => {
          console.error('Error:', err);
        });
    });
  };

  HT.loadDistricts = () => {
    $("#province").on("change", function (e) {
      let provinceID = $(this).find(":selected").data("id");
      if (!provinceID) return;

      fetch(`https://vn-public-apis.fpo.vn/districts/getByProvince?provinceCode=${provinceID}&limit=-1`)
        .then(response => response.json())
        .then(data => {
          let districts = data.data.data;
          document.getElementById("district").innerHTML = "";
          if (districts && districts.length > 0) {
            document.getElementById("district").innerHTML += `<option value="">-----Chọn-----</option>`;
            districts.forEach(value => {
              document.getElementById("district").innerHTML += `<option data-id="${value.code}" value="${value.code}">${value.name}</option>`;
            });
          } else {
            document.getElementById("district").innerHTML += `<option value="">Không có quận/huyện</option>`;
          }
        })
        .catch(err => {
          console.error('Error:', err);
        });
        $("#province").select2();
    });
  };

  HT.loadWard = () => {
    $("#district").on("change", function (e) {

      let districtID = $("#district").find(":selected").data("id");
      console.log(districtID);
      if (districtID === undefined || districtID === null) return;
  
      fetch(`https://vn-public-apis.fpo.vn/wards/getByDistrict?districtCode=${districtID}&limit=-1`)
        .then(response => response.json())
        .then(data => {
          let wards = data.data.data;
  
          document.getElementById("ward").innerHTML = `<option value="">-----Chọn-----</option>`;
  
          if (wards && Array.isArray(wards) && wards.length > 0) {
            wards.forEach(value => {
              document.getElementById("ward").innerHTML += `<option value="${value.code}">${value.name}</option>`;
            });
          } else {
            document.getElementById("ward").innerHTML += `<option value="">Không có Xã/Phường</option>`;
          }
        })
        .catch(err => {
          console.error('Error:', err);
        });
        $("#district").select2();
    });
  };
  HT.changeWard = () => {
    $("#ward").on("change", function (e) {
      $("#ward").select2();
    })
    }
  // Khởi tạo khi tài liệu đã sẵn sàng
  $(document).ready(function () {
    // HT.switchery();
    HT.loadProvinces();
    HT.loadDistricts();
    HT.loadWard();
    HT.changeWard();
  });
})(jQuery);