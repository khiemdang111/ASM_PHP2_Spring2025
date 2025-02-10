document.addEventListener('click', function (event) {
  const popup = document.querySelector('.popup');
  const burger = popup.querySelector('.burger');

  // Kiểm tra nếu click không nằm trong .popup và không phải trên nút burger
  if (!popup.contains(event.target) || event.target === burger) {
    const checkbox = popup.querySelector('input[type="checkbox"]');
    if (checkbox && checkbox.checked) {
      checkbox.checked = false; // Bỏ chọn checkbox để đóng popup
    }
  }
});