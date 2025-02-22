(function ($) {
  "use strict";
  var HT = {};
  // Hàm thay đổi trạng thái
  HT.filter = () => {
    $(".filter-product").on("change", function (e) {
      let _this = $(this);
      let option = {
        'value': _this.val(),
        'field': _this.attr("data-model"),
      };
      console.log(option);

      $.ajax({
        url: "/product/filter",
        method: 'POST',
        data: {
          type: 'json',
          method: "POST",
          option: option,
        },
        // success: function (response) {
        //   console.log(response);
        // },
        // error: function (xhr, status, error) {
        //   console.log('Error:', xhr.responseText);
        // }
      });
      // e.preventDefault();
    });
  };
  // Khi tài liệu đã sẵn sàng
  $(document).ready(function () {
    HT.filter();
  });
})(jQuery);
