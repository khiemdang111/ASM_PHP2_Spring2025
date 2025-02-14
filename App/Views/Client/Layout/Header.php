<?php
namespace App\Views\Client\Layout;

use App\Views\BaseView;
use App\Helpers\AuthHelper;

class Header extends BaseView
{
  public static function render($data = null)
  {
    $is_login = AuthHelper::checkLogin();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <title>K-Food</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap"
        rel="stylesheet">
      <!-- Icon Font Stylesheet -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

      <!-- Libraries Stylesheet -->
      <link href="<?= APP_URL ?>/public/client/assets/lib/animate/animate.min.css" rel="stylesheet">
      <link href="<?= APP_URL ?>/public/client/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
      <link href="<?= APP_URL ?>/public/client/assets/lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

      <!-- Customized Bootstrap Stylesheet -->
      <link href="<?= APP_URL ?>/public/client/assets/css/bootstrap.min.css" rel="stylesheet">

      <!-- Template Stylesheet -->
      <link href="<?= APP_URL ?>/public/client/assets/css/style.css" rel="stylesheet">
      <link href="<?= APP_URL ?>/public/client/assets/css/custom.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>

    <body>
      <!-- Spinner Start -->
      <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
      </div>
      <!-- Spinner End -->
      <div class="row"></div>
      <!-- Navbar start -->
      <div class="container-fluid nav-bar">
        <div class="container">
          <div class="row py-2">
            <div class="col-md-10"></div>
            <div class="col-md-2">
              <?php
              if (isset($is_login) && isset($_SESSION['user'])):
                ?>
                <div class="dropdown">
                  <p class="text-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Tài khoản
                  </p>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" style="color: #000"
                        href="/users/<?= $_SESSION['user']['id'] ?>"><?= $_SESSION['user']['username'] ?></a></li>
                    <li><a class="dropdown-item" style="color: #000" href="/logout">Đăng xuất</a></li>
                  </ul>
                </div>
                <?php
              else:
                ?>
                <a href="/login" class="text-primary fw-bold">Đăng nhập</a>
                <a href="/register" class="text-primary fw-bold mx-2">Đăng ký</a>
                <?php
              endif;
              ?>
            </div>
          </div>
          <nav class="navbar navbar-light navbar-expand-lg py-2">
            <a href="index.html" class="navbar-brand">
              <h1 class="text-primary fw-bold mb-0">K<span class="text-dark">-Food</span> </h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarCollapse">
              <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <div class="navbar-nav mx-auto">
                <a href="/" class="nav-item nav-link active">Trang chủ</a>
                <div class="nav-item dropdown">
                  <a href="/product" class="nav-link dropdown-toggle">Thực đơn</a>
                  <div class="dropdown-menu bg-light">
                    <a href="book.html" class="dropdown-item">Burger</a>
                    <a href="blog.html" class="dropdown-item">Pizza</a>
                    <a href="team.html" class="dropdown-item">Sushi</a>
                    <a href="testimonial.html" class="dropdown-item">Sandwiches</a>
                  </div>
                </div>
                <a href="/about" class="nav-item nav-link">Giới thiệu</a>
                <a href="/service" class="nav-item nav-link">Dịch vụ</a>
                <a href="/blog" class="nav-item nav-link">Tin tức</a>
                <a href="/contact" class="nav-item nav-link">Liên hệ</a>
              </div>
              <div id="search-icon">
                <div class="container">
                  <input checked="" class="checkbox" type="checkbox">
                  <div class="mainbox">
                    <div class="iconContainer">
                      <svg viewBox="0 0 512 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="search_icon">
                        <path
                          d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                        </path>
                      </svg>
                    </div>
                    <input class="search_input" placeholder="Tìm kiếm" type="text">
                  </div>
                </div>
              </div>
              <div class="cart-icon px-2">
                <a class="button" href="/cart">
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                    class="bi bi-cart-check" viewBox="0 0 16 16">
                    <path
                      d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                    <path
                      d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                  </svg>
                </a>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <!-- Navbar End -->
      <?php
  }
}
?>