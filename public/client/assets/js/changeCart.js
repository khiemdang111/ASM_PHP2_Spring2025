(function ($) {
  "use strict";
  var _token = $('meta[name="csrf-token"]').attr("content");
  var HT = {};
  // Hàm thay đổi trạng thái
  HT.changeStatus = () => {
    $(".quantity-value").on("change", function (e) {
      let _this = $(this);
      let option = {
        'value': _this.val(),
        'modelId': _this.attr("data-modelId"),
        // 'model': _this.attr("data-model"),
        'field': _this.attr("data-field"),
      };
      console.log(option);

      // Code sử dụng $
      $.ajax({
        url: "/ajax/cart/changeQuantity",
        method: 'POST',
        data: {
          type: 'json',
          method: "POST",
          option: option,
        },
        success: function (response) {
          console.log(response);
        },
        error: function (xhr, status, error) {
          console.log('Error:', xhr.responseText);
        }
      });
      e.preventDefault();
    });
  };
  HT.checkBoxItem = () => {
    if ($('.checkout-product').length) {
      $('.checkout-product').on('change', function () {
        let _this = $(this); // Checkbox được chọn

        // Kiểm tra xem checkbox có được chọn không
        if (_this.is(':checked')) {
          // Lấy hàng chứa checkbox
          let row = _this.closest('tr');

          // Lấy tên sản phẩm
          let productName = row.find('.product-name').text().trim();

          // Lấy giá trị tổng từ class total-product-detail
          let totalValue = row.find('.total-product-detail').text().trim();

          let product_id = row.data('id');


          let quantity = row.find('.quantity-input').val();

          console.log(productName);
          console.log(quantity);

          let menu = document.getElementById("slidebar-cart")
          menu.innerHTML += `<tr>
                <input type="hidden" name="product_id[]" id="product_id" value="${product_id}">
                <th>${productName}</th>
                <input type="hidden" name="product_name[]" id="product_name" value="${productName}">
                <td class="price-slidebar">${totalValue}</td>
                <input type="hidden" name="product_quantity[]" id="quantity" value="${quantity}">
                <input type="hidden" name="product_price[]" id="product_price" value="${totalValue}">
                </tr>`;
          let total_price = document.getElementById("total-cart");
          let total_hidden = document.getElementById("total-hidden")
          total_hidden.value = Number(total_hidden.value) + Number(totalValue) + '.000';
          total_price.innerText = Number(total_price.innerText) + Number(totalValue) + '.000';
        }
        HT.changeBackground(_this);
      });
    }
  };
  HT.changeBackground = (object) => {
    let isChecked = object.prop('checked');
    if (isChecked) {
      object.closest('tr').addClass('active-bg-tr');
    } else {
      object.closest('tr').removeClass('active-bg-tr');
    }
  }
  HT.select2 = () => {
    if ($(".setupSelect2").length) {
      try {
        $(".setupSelect2").select2();
        console.log("Select2 đã khởi tạo thành công!");
      } catch (error) {
        console.error("Lỗi khi khởi tạo Select2:", error);
      }
    } else {
      console.warn("Không tìm thấy phần tử có class 'setupSelect2'");
    }
  };

  // Khi tài liệu đã sẵn sàng
  $(document).ready(function () {
    if (window.location.pathname !== '/cart') {
      HT.switchery();
    }
    HT.changeStatus();
    HT.checkBoxItem();
    HT.select2();
  });
})(jQuery);
