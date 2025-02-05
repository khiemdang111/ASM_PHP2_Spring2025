(function ($) {
  "use strict";
  var _token = $('meta[name="csrf-token"]').attr("content");
  var HT = {};
 // Hàm thay đổi trạng thái
  HT.changeStatus = () => {
    $(".status").on("change", function (e) {
      let _this = $(this);
      let option = {
        'value': _this.val(),
        'modelId': _this.attr("data-modelId"),
        'model': _this.attr("data-model"),
        'field': _this.attr("data-field"),
      };
      console.log(option);

        // Code sử dụng $
        $.ajax({
          url: "/ajax/changeStatus/product",
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
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 1000
        };
        toastr.success('', 'Cập nhật thành công');
      e.preventDefault();
    });
  };

  // Khi tài liệu đã sẵn sàng
  $(document).ready(function () {
    // HT.switchery();
    HT.changeStatus();
  });
})(jQuery);
