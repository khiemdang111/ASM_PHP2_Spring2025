(function ($) {
  "use strict";
  var HT = {};

  HT.initSelect2 = () => {
    $("#product_id").select2();
    // $(".material").select2();
  };
  HT.changeNamePurchase = () => {
    $("#unit").on("change", function (e) {
      let _this = $(this);
      let selectedOption = _this.find("option:selected");
      let option = {
        'model': _this.attr("data-model"),
        // 'value': _this.attr("data-id"),
        'value': selectedOption.data("id")
      }
      console.log(option);

      let unit = document.getElementById('unit_material');
      console.log(unit);

      $.ajax({
        url: "/ajax/warehouse/getUnit",
        method: 'POST',
        data: {
          type: 'json',
          method: "POST",
          option: option,
        },
        success: function (response) {
          if (response.status === "success") {
            unit.value = response.unit;
          } else {
            console.error("Lỗi từ server:", response.message);
          }
        },
        error: function (xhr, status, error) {
          console.log('Error:', xhr.responseText);
        }
      });

      e.preventDefault();
    })
  }
  $(document).ready(function () {
    $(document).on("change", ".material", function (e) {
      let _this = $(this);

      let parentElement = _this.closest(".parent-class");

      let option = {
        'value': _this.val(),
        'model': _this.attr("data-model"),
      };
      console.log(option);

      let unitMaterial = parentElement.find(".unit_material");

      $.ajax({
        url: "/ajax/warehouse/getUnit",
        method: 'POST',
        data: {
          type: 'json',
          method: "POST",
          option: option,
        },
        success: function (response) {
          if (response.status === "success") {
            unitMaterial.val(response.unit);
          } else {
            console.error("Lỗi từ server:", response.message);
          }
        },
        error: function (xhr, status, error) {
          console.log('Error:', xhr.responseText);
        }
      });

      e.preventDefault();
    });

    // Xử lý sự kiện thêm mới một nhóm nguyên liệu
    $(document).on('click', '.btn-add', function (e) {
      e.preventDefault();
      var controlForm = $('.controls .form:first'),
        currentEntry = $(this).closest('.entry'),
        newEntry = $(currentEntry.clone()).appendTo(controlForm);
      newEntry.find('input').val('');
      newEntry.find('select').val('');
      controlForm.find('.entry:not(:last) .btn-add')
        .removeClass('btn-add btn-primary').addClass('btn-remove btn-danger')
        .html('<i class="fa fa-minus"></i>');
    });

    // Xử lý sự kiện xóa một nhóm nguyên liệu
    $(document).on('click', '.btn-remove', function (e) {
      e.preventDefault();
      $(this).closest('.entry').remove();
    });
  });
  $(document).ready(function () {
    HT.initSelect2();
    // HT.getValueMeterial();
    HT.changeNamePurchase();
  });

})(jQuery);
