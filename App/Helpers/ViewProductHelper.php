<?php

namespace App\Helpers;
use App\Models\Product;
class ViewProductHelper
{

 public static function cookieView($id, $view)
 {

  if (isset($_COOKIE['view'])) {
   $view_data = json_decode($_COOKIE['view'], true);
  } else {
   $view_data = [];
  }
  // var_dump($view_data);
  $product_id_arr = array_column($view_data, "product_id");

  // Kiểm tra product_id có tồn tại trong cookie hay chưa
  if(in_array($id, $product_id_arr)){
   foreach($view_data as $key => $value){
    if($view_data[$key]['product_id'] == $id){
     if($view_data[$key]['time'] < time() - 60 ){
      $view++;
     }
     $view_data[$key]['time'] = time();
    }
   }
  }else{
   // Nếu chưa có thì thêm vào cookie view
   $produtc_array = [
    'product_id' => $id,
    'time' => time(),
   ];
   $view++;
   $view_data[] = $produtc_array;
  }

  // chuyển array thành string để lưu vào cookie view
  $product_data = json_encode($view_data);

  //lưu cookie
  setcookie('view', $product_data, time() + (3600 * 24 * 30 * 12), "/"); // 86400 seconds = 1 day

  return self::updateView($id, $view);
 }

 public static function updateView($id, $view){
  $product = new Product();
  $data = [
   'view' => $view,
  ];

  $result = $product->updateProduct($id, $data);

  return $result;
 }
}