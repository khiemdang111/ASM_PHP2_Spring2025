<?php
namespace App\Views\Client\Pages;

use App\Views\BaseView;

class Blog extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <!-- Hero Start -->
    <div class="container-fluid bg-light py-4 mt-0">
      <div class="container text-center animated bounceInDown">
        <h1 class="display-1 mb-4">Bài viết</h1>
      </div>
    </div>
    <!-- Hero End -->
    <!-- Blog Start -->
    <div class="container-fluid blog">
      <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
          <small
            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Thông
            báo</small>
          <h1 class="display-5 mb-5">Bài viết mới nhất</h1>
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
    <?php
  }
}
?>