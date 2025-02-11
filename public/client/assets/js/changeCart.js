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
        let _this = $(this);
        HT.changeBackground(_this);
      })
    }
  }
  HT.changeBackground = (object) => {
    let isChecked = object.prop('checked');
    if (isChecked) {
      object.closest('tr').addClass('active-bg-tr');
    } else {
      object.closest('tr').removeClass('active-bg-tr');
    }
  }
  // Khi tài liệu đã sẵn sàng
  $(document).ready(function () {
    // HT.switchery();
    HT.changeStatus();
    HT.checkBoxItem();
  });
})(jQuery);
