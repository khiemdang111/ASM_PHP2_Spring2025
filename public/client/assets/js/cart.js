document.addEventListener("DOMContentLoaded", function () {
  // Lấy tất cả các hàng trong bảng
  const rows = document.querySelectorAll("tr[data-id]");

  // Hàm định dạng số thành định dạng tiền tệ với dấu phân cách hàng nghìn
  function formatCurrency(value) {
    return new Intl.NumberFormat("vi-VN", {
      style: "decimal",
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(value);
  }

  // Hàm tính toán và cập nhật tổng giá trị cho từng hàng
  function updateTotalForRow(row) {
    // Lấy các phần tử trong hàng
    const priceElement = row.querySelector(".price");
    const quantityInput = row.querySelector(".quantity-input");
    const totalElement = row.querySelector(".total-product-detail");

    // Lấy giá trị của price và chuyển đổi thành số
    const price = parseFloat(priceElement.textContent.replace(/,/g, "").trim()) || 0;

    // Lấy giá trị của quantity và chuyển đổi thành số
    const quantity = parseInt(quantityInput.value, 10) || 0;

    // Tính tổng giá trị
    const total = price * quantity;

    // Định dạng tổng giá trị và cập nhật vào .total-product-detail
    totalElement.textContent = formatCurrency(total); // Định dạng số
  }

  // Duyệt qua từng hàng và thêm sự kiện
  rows.forEach((row) => {
    const quantityInput = row.querySelector(".quantity-input");
    const minusButton = row.querySelector(".minus-btn");
    const plusButton = row.querySelector(".plus-btn");

    // Gọi hàm updateTotalForRow khi trang tải xong
    updateTotalForRow(row);

    // Thêm sự kiện khi giá trị của quantity thay đổi
    quantityInput.addEventListener("input", () => updateTotalForRow(row));

    // // Thêm sự kiện khi nhấn nút tăng/giảm số lượng
    // minusButton.addEventListener("click", () => updateTotalForRow(row));
    // plusButton.addEventListener("click", () => updateTotalForRow(row));
  });
});