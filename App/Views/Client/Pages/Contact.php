<?php
namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Contact extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <!-- Hero Start -->
        <div class="container-fluid bg-light py-4 mt-0">
            <div class="container text-center animated bounceInDown">
                <h1 class="display-1">Liên hệ</h1>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Contact Start -->
        <div class="container-fluid contact  wow bounceInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="p-5 bg-light rounded contact-form">
                    <div class="row g-4">
                        <div class="col-12">
                            <small
                                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Liên
                                hệ</small>
                            <h1 class="display-5 mb-0">Hãy liên hệ với chúng tôi nếu có bất kỳ thắc mắc nào!</h1>
                        </div>
                        <div class="col-md-6 col-lg-7">
                            <form>
                                <input type="text" class="w-100 form-control p-3 mb-4 border-primary bg-light"
                                    placeholder="Tên của bạn">
                                <input type="email" class="w-100 form-control p-3 mb-4 border-primary bg-light"
                                    placeholder="Email">
                                <input type="email" class="w-100 form-control p-3 mb-4 border-primary bg-light"
                                    placeholder="Số điện thoại">
                                <textarea class="w-100 form-control mb-4 p-3 border-primary bg-light" rows="4" cols="10"
                                    placeholder="Tin nhắn"></textarea>
                                <button class="w-100 btn btn-primary form-control p-3 border-primary bg-primary rounded-pill"
                                    type="submit">Gửi ngay</button>
                            </form>
                        </div>
                        <div class="col-md-6 col-lg-5">
                            <div>
                                <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                    <div class="">
                                        <h4>Địa chỉ</h4>
                                        <p>30 đường Trương Vĩnh Nguyên, Thường Thạnh, Cái Răng, Cần Thơ</p>
                                    </div>
                                </div>
                                <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                    <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                    <div class="">
                                        <h4>Email</h4>
                                        <p class="mb-2">dangkhiemct111@gmail.com</p>
                                    </div>
                                </div>
                                <div class="d-inline-flex w-100 border border-primary p-4 rounded">
                                    <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div class="">
                                        <h4>Số điện thoại</h4>
                                        <p class="mb-2">0704725597</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        <?php
    }
}
?>