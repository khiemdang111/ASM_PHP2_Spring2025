<?php
include 'layout/header.php'
    ?>

<!-- Hero Start -->
<div class="container-fluid bg-light py-6 my-6 mt-0">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-7 col-md-12">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Chào mừng bạn đến với K-Food</small>
                <h1 class="display-1 mb-4 animated bounceInDown">Đặt đồ ăn nhanh với <span class="text-primary text-center">K-Food</span></h1>
                <a href=""
                    class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Đặt ngay</a>
                <a href="" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft">Đồ ăn nhanh</a>
            </div>
            <div class="col-lg-5 col-md-12">
                <img src="/public/client/assets/img/hero.png" class="img-fluid rounded animated zoomIn" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- About Satrt -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <img src="/public/client/assets/img/about.jpg" class="img-fluid rounded" alt="">
            </div>
            <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Về chúng tôi</small>
                <h1 class="display-5 mb-4">Với hơn 20 chi nhánh trên toàn quốc</h1>
                <p class="mb-4">Thực phẩm đã được cấp giấy chứng nhận an toàn vệ sinh thực phẩm. 
                    Thực phẩm được chế biến từ tay của các đầu bếp cao cấp 4 sao, giao hàng nhanh chóng tiện lợi giá rẻ.
                    Có nhiều chương trình ưu đãi dành cho khách hàng khi mua sản phẩm của các chi nhánh trên toàn quốc.</p>
                <div class="row g-4 text-dark mb-5">
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Giao đồ ăn tươi và nhanh
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Hỗ trợ khách hàng 24/7
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Tùy chọn tùy chỉnh dễ dàng
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-share text-primary me-2"></i>Ưu đãi hấp dẫn cho bữa ăn ngon
                    </div>
                </div>
                <a href="" class="btn btn-primary py-3 px-5 rounded-pill">Về chúng tôi<i
                        class="fas fa-arrow-right ps-2"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Fact Start-->
<div class="container-fluid faqt py-6">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <div class="row g-4">
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.3s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-users fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">689</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Khách hàng hài lòng</p>
                        </div>
                    </div>
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.5s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-users-cog fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">107</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Đầu bếp chuyên nghiệp</p>
                        </div>
                    </div>
                    <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.7s">
                        <div class="faqt-item bg-primary rounded p-4 text-center">
                            <i class="fas fa-check fa-4x mb-4 text-white"></i>
                            <h1 class="display-4 fw-bold" data-toggle="counter-up">253</h1>
                            <p class="text-dark text-uppercase fw-bold mb-0">Sự kiện đã đặt</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                <div class="video">
                    <button type="button" class="btn btn-play" data-bs-toggle="modal"
                        data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Video -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->


<!-- Service Start -->
<div class="container-fluid service py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Dịch vụ của chúng tôi</small>
            <h1 class="display-5 mb-5">Những dịch vụ chúng tôi cung cấp</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-cheese fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Dịch vụ cưới</h4>
                            <p class="mb-4">Dịch vụ nhanh chóng tiện lợi, giá cả phù hợp, đồ ăn chất lượng, ngon miệng.</p>
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
                            <p class="mb-4">Dịch vụ nhanh chóng tiện lợi, giá cả phù hợp, đồ ăn chất lượng, ngon miệng.</p>
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
                            <p class="mb-4">Dịch vụ nhanh chóng tiện lợi, giá cả phù hợp, đồ ăn chất lượng, ngon miệng.</p>
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
                            <p class="mb-4">Dịch vụ nhanh chóng tiện lợi, giá cả phù hợp, đồ ăn chất lượng, ngon miệng..</p>
                            <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- Menu Start -->
<div class="container-fluid menu bg-light py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
                Menu</small>
            <h1 class="display-5 mb-5">Các món ăn phổ biến</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill active" data-bs-toggle="pill"
                        href="#tab-6">
                        <span class="text-dark" style="width: 150px;">Burger</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill"
                        href="#tab-7">
                        <span class="text-dark" style="width: 150px;">Pizza</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill"
                        href="#tab-8">
                        <span class="text-dark" style="width: 150px;">Sushi</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill"
                        href="#tab-9">
                        <span class="text-dark" style="width: 150px;">Giảm giá</span>
                    </a>
                </li>
                <li class="nav-item p-2">
                    <a class="d-flex py-2 mx-2 border border-primary bg-white rounded-pill" data-bs-toggle="pill"
                        href="#tab-10">
                        <span class="text-dark" style="width: 150px;">Đặt biệt</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-6" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-01.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Paneer</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.2s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-02.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sweet Potato</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.3s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-03.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sabudana Tikki</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.4s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-04.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Pizza</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.5s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-05.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Bacon</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.6s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-06.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Chicken</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.7s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-07.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Blooming</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.8s">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-08.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sweet</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-7" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-01.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Argentinian</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-03.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Crispy</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-05.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sabudana Tikki</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-07.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Blooming</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-08.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Argentinian</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-03.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Lemon</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-02.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Water Drink</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-01.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Salty lemon</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-8" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-01.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Crispy water</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-02.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Juice</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-03.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Orange</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-04.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Apple Juice</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-05.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Banana</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-06.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sweet Water</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="/public/client/assets/img/menu-07.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Hot Coffee</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-08.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sweet Potato</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-9" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-06.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sabudana Tikki</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-07.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Crispy</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-09.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Pizza</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-02.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Bacon</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-03.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Chicken</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-05.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Blooming</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-07.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sweet</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-09.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Argentinian</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-10" class="tab-pane fade show p-0">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-06.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sabudana Tikki</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-07.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Crispy</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-09.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Pizza</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-02.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Bacon</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-03.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Chicken</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-05.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Blooming</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-07.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Sweet</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="menu-item d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded-circle" src="img/menu-09.jpg" alt="">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <div class="d-flex justify-content-between border-bottom border-primary pb-2 mb-2">
                                        <h4>Argentinian</h4>
                                        <h4 class="text-primary">$90</h4>
                                    </div>
                                    <p class="mb-0">Consectetur adipiscing elit sed dwso eiusmod tempor incididunt ut
                                        labore.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->


<!-- Book Us Start -->
<div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-0">
            <div class="col-1">
                <img src="/public/client/assets/img/background-site.jpg" class="img-fluid h-100 w-100 rounded-start"
                    style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
            <div class="col-10">
                <div class="border-bottom border-top border-primary bg-light py-5 px-4">
                    <div class="text-center">
                        <small
                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Đặt dịch vụ</small>
                        <h1 class="display-5 mb-5">Bạn muốn đặt dịch vụ ở đâu</h1>
                    </div>
                    <div class="row g-4 form">
                        <div class="col-lg-4 col-md-6">
                            <select class="form-select border-primary p-2" aria-label="Default select example">
                                <option selected>Tỉnh/Thành phố</option>
                                <option value="1">Depend On Country</option>
                                <option value="2">UK</option>
                                <option value="3">India</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select class="form-select border-primary p-2" aria-label="Default select example">
                                <option selected>Quận/Huyện</option>
                                <option value="1">Depend On Country</option>
                                <option value="2">UK</option>
                                <option value="3">India</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select class="form-select border-primary p-2" aria-label="Default select example">
                                <option selected>Xã phường</option>
                                <option value="1">Event Type</option>
                                <option value="2">Big Event</option>
                                <option value="3">Small Event</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="mobile" class="form-control border-primary p-2" placeholder="Số lượng bàn">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="text" class="form-control border-primary p-2" placeholder="Số điện thoại">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="email" class="form-control border-primary p-2" placeholder="Địa chỉ email">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label for="date-servcer" class="form-label">Ngày đặt</label>
                            <input type="date" class="form-control border-primary p-2" id="date-servcer" placeholder="Ngày đặt">
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill">Submit Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1">
                <img src="/public/client/assets/img/background-site.jpg" class="img-fluid h-100 w-100 rounded-end"
                    style="object-fit: cover; opacity: 0.7;" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Book Us End -->


<!-- Testimonial Start -->
<div class="container-fluid py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Đánh giá</small>
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
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
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
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore
                        magna aliqua.</p>
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
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
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
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore
                        magna aliqua.</p>
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
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
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
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore
                        magna aliqua.</p>
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
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
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
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore
                        magna aliqua.</p>
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
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
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
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore
                        magna aliqua.</p>
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
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
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
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore
                        magna aliqua.</p>
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
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
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
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore
                        magna aliqua.</p>
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
                        <h4 class="mb-0">Person Name</h4>
                        <p class="m-0">Profession</p>
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
                    <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore et dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->
<div class="container-fluid blog py-6">
  <div class="container">
    <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
      <small
        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Thông báo</small>
      <h1 class="display-5 mb-5">Thông báo mới nhất</h1>
    </div>
    <div class="row gx-4 justify-content-center">
      <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
        <div class="blog-item">
          <div class="overflow-hidden rounded">
            <img src="/public/client/assets/img/blog-1.jpg" class="img-fluid w-100" alt="">
          </div>
          <div class="blog-content mx-4 d-flex rounded bg-light">
            <div class="text-dark bg-primary rounded-start">
              <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                <p class="fw-bold mb-0">16</p>
                <p class="fw-bold mb-0">Sep</p>
              </div>
            </div>
            <a href="#" class="h5 lh-base my-auto h-100 p-3">How to get more test in your food from</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.3s">
        <div class="blog-item">
          <div class="overflow-hidden rounded">
            <img src="/public/client/assets/img/blog-2.jpg" class="img-fluid w-100" alt="">
          </div>
          <div class="blog-content mx-4 d-flex rounded bg-light">
            <div class="text-dark bg-primary rounded-start">
              <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                <p class="fw-bold mb-0">16</p>
                <p class="fw-bold mb-0">Sep</p>
              </div>
            </div>
            <a href="#" class="h5 lh-base my-auto h-100 p-3">How to get more test in your food from</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.5s">
        <div class="blog-item">
          <div class="overflow-hidden rounded">
            <img src="/public/client/assets/img/blog-3.jpg" class="img-fluid w-100" alt="">
          </div>
          <div class="blog-content mx-4 d-flex rounded bg-light">
            <div class="text-dark bg-primary rounded-start">
              <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                <p class="fw-bold mb-0">16</p>
                <p class="fw-bold mb-0">Sep</p>
              </div>
            </div>
            <a href="#" class="h5 lh-base my-auto h-100 p-3">How to get more test in your food from</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Blog End -->
</div>
<!-- Testimonial End -->
<?php
include 'layout/footer.php'
    ?>