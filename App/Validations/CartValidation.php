<?php

namespace App\Validations;

use App\Helpers\NotificationHelper;

class CartValidation {

 public static function checkCart(){
  $is_valid = true;
  if(!isset($_POST['product_name']) || !isset($_SESSION['product_name'])) {
    NotificationHelper::error('cart', 'Vui lòng chọn sản phẩm để thanh toán!');
    return false;
  }
  return $is_valid;
 }
 public static function checkInfoOrder(){
  $is_valid = true;
  if(!isset($_POST['name']) || $_POST['name'] == '') {
    NotificationHelper::error('name_customer', 'Vui lòng nhập tên khách hàng!');
    return false;
  }
  if(!isset($_POST['email']) || $_POST['email'] == '') {
    NotificationHelper::error('email_customer', 'Vui lòng email!');
    return false;
  }
  if(!isset($_POST['phone']) || $_POST['phone'] == '') {
    NotificationHelper::error('phone_customer', 'Vui lòng nhập số điện thoại!');
    return false;
  }
  if(!isset($_POST['address']) || $_POST['address'] == '') {
    NotificationHelper::error('address_customer', 'Vui lòng nhập địa chỉ!');
    return false;
  }
  if(!isset($_POST['province']) || $_POST['province'] == '') {
    NotificationHelper::error('province', 'Vui chọn tỉnh/thành phố!');
    return false;
  }
  if(!isset($_POST['district']) || $_POST['district'] == '') {
    NotificationHelper::error('district', 'Vui chọn quận/huyện!');
    return false;
  }
  if(!isset($_POST['ward']) || $_POST['ward'] == '') {
    NotificationHelper::error('ward', 'Vui chọn quận/huyện!');
    return false;
  }
  // if(!isset($_POST['pay']) || $_POST['pay'] == '') {
  //   NotificationHelper::error('pay', 'Vui lòng chọn phương thức thanh toán!');
  //   return false;
  // }
  return $is_valid;
 }
}