<?php
namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Service extends BaseView
{
    public static function render($data = null)
    {
        ?>
<!-- Hero Start -->
<div class="container-fluid bg-light py-4 mt-0">
    <div class="container text-center animated bounceInDown">
        <h1 class="display-1 mb-4">Dịch vụ</h1>
    </div>
</div>
<!-- Hero End -->
<!-- Service Start -->
<div class="container-fluid service">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <h1 class="display-5 mb-5">Chúng tôi cung cấp những dịch vụ</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-cheese fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Dịch vụ cưới</h4>
                            <p class="mb-4">Dịch vụ nhanh chóng tiện lợi, giá cả phù hợp, đồ ăn chất lượng, ngon miệng.
                            </p>
                            <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-pizza-slice fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Tiệc ở công ty</h4>
                            <p class="mb-4">Dịch vụ nhanh chóng tiện lợi, giá cả phù hợp, đồ ăn chất lượng, ngon miệng.
                            </p>
                            <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-wine-glass-alt fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Tiệc sinh nhật</h4>
                            <p class="mb-4">Dịch vụ nhanh chóng tiện lợi, giá cả phù hợp, đồ ăn chất lượng, ngon miệng.
                            </p>
                            <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-walking fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Giao hàng tận nhà</h4>
                            <p class="mb-4">Dịch vụ nhanh chóng tiện lợi, giá cả phù hợp, đồ ăn chất lượng, ngon miệng.
                            </p>
                            <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Testimonial Start -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Đánh
                giá</small>
            <h1 class="display-5 mb-5">Khách hàng hài lòng!</h1>
        </div>
        <div class="owl-carousel owl-theme testimonial-carousel testimonial-carousel-1 mb-4 wow bounceInUp"
            data-wow-delay="0.1s">
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="/public/client/assets/img/testimonial-1.jpg"
                        class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Khách hàng</h4>
                        <p class="m-0">Đã trải nghiệm dịch vụ</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Chúng tôi rất hài lòng về dịch vụ ở đây. Đồ ăn rất ngon và hợp với giá tiền, phục vụ nhanh và rất chu đáo, chúng tôi đánh giá cao về dịch vụ ở đây.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="/public/client/assets/img/testimonial-2.jpg"
                        class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Khách hàng</h4>
                        <p class="m-0">Đã trải nghiệm dịch vụ</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Chúng tôi rất hài lòng về dịch vụ ở đây. Đồ ăn rất ngon và hợp với giá tiền, phục vụ nhanh và rất chu đáo, chúng tôi đánh giá cao về dịch vụ ở đây.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="/public/client/assets/img/testimonial-3.jpg"
                        class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Khách hàng</h4>
                        <p class="m-0">Đã trải nghiệm dịch vụ</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Chúng tôi rất hài lòng về dịch vụ ở đây. Đồ ăn rất ngon và hợp với giá tiền, phục vụ nhanh và rất chu đáo, chúng tôi đánh giá cao về dịch vụ ở đây.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="/public/client/assets/img/testimonial-4.jpg"
                        class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Khách hàng</h4>
                        <p class="m-0">Đã trải nghiệm dịch vụ</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Chúng tôi rất hài lòng về dịch vụ ở đây. Đồ ăn rất ngon và hợp với giá tiền, phục vụ nhanh và rất chu đáo, chúng tôi đánh giá cao về dịch vụ ở đây.</p>
                </div>
            </div>
        </div>
        <div class="owl-carousel testimonial-carousel testimonial-carousel-2 wow bounceInUp" data-wow-delay="0.3s">
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="/public/client/assets/img/testimonial-1.jpg"
                        class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Khách hàng</h4>
                        <p class="m-0">Đã trải nghiệm dịch vụ</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Chúng tôi rất hài lòng về dịch vụ ở đây. Đồ ăn rất ngon và hợp với giá tiền, phục vụ nhanh và rất chu đáo, chúng tôi đánh giá cao về dịch vụ ở đây.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="/public/client/assets/img/testimonial-2.jpg"
                        class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Khách hàng</h4>
                        <p class="m-0">Đã trải nghiệm dịch vụ</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Chúng tôi rất hài lòng về dịch vụ ở đây. Đồ ăn rất ngon và hợp với giá tiền, phục vụ nhanh và rất chu đáo, chúng tôi đánh giá cao về dịch vụ ở đây.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="/public/client/assets/img/testimonial-3.jpg"
                        class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Khách hàng</h4>
                        <p class="m-0">Đã trải nghiệm dịch vụ</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Chúng tôi rất hài lòng về dịch vụ ở đây. Đồ ăn rất ngon và hợp với giá tiền, phục vụ nhanh và rất chu đáo, chúng tôi đánh giá cao về dịch vụ ở đây.</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="/public/client/assets/img/testimonial-4.jpg"
                        class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Khách hàng</h4>
                        <p class="m-0">Đã trải nghiệm dịch vụ</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">Chúng tôi rất hài lòng về dịch vụ ở đây. Đồ ăn rất ngon và hợp với giá tiền, phục vụ nhanh và rất chu đáo, chúng tôi đánh giá cao về dịch vụ ở đây.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
<?php
    }
}
    ?>