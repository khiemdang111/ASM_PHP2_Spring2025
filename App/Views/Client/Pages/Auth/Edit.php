<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
{
  public static function render($data = null)
  {
    ?>

    <section style="background-color: #eee;">
      <div class="container py-5">
        <div class="row">
          <div class="col">
            <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thông tin người dùng</li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="/public/assets/images/<?= $data['avatar'] ?>" height="150px" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?= $data['username'] ?></h5>
                <!-- <p class="text-muted mb-1">Đăng xuất</p>
            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
                <!-- <div class="d-flex justify-content-center mb-2">
                  <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Đổi
                    avatar</button>
                  <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Đổi
                    mật khẩu</button>
                </div> -->
                <ul class="list-group list-group-flush rounded-3">
                  <li class="list-group-item d-flex align-items-center p-3">
                    <i class="bi bi-gear"></i>
                    <p class="mb-0 mx-2"><a class="text-dark" href="">Cài đặt</a></p>
                  </li>
                  <li class="list-group-item d-flex align-items-center p-3">
                    <i class="bi bi-cart"></i>
                    <p class="mb-0 mx-2"><a class="text-dark" href="">Giỏ hàng</a></p>
                  </li>
                  <li class="list-group-item d-flex align-items-center p-3">
                    <i class="bi bi-bag-check"></i>
                    <p class="mb-0 mx-2"><a class="text-dark" href="">Đơn hàng</a></p>
                  </li>
                  <li class="list-group-item d-flex align-items-center p-3">
                    <i class="bi bi-wallet2"></i>
                    <p class="mb-0 mx-2"><a class="text-dark" href="">Số dư ví</a></p>
                  </li>
                  <li class="list-group-item d-flex align-items-center p-3">
                    <i class="bi bi-box-arrow-right"></i>
                    <p class="mb-0 mx-2"><a class="text-dark" href="/users/<?= $_SESSION['user']['id'] ?>">Đăng xuất</a></p>
                  </li>
                </ul>
              </div>
            </div>
            <!-- <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">https://mdbootstrap.com</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg text-body"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
            </ul>
          </div>
        </div> -->
          </div>
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Họ và tên:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $data['name'] ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $data['email'] ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Số điện thoại:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $data['phone'] ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Địa chỉ:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $data['address'] ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Mật khẩu:</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">*****************</p>
                  </div>
                </div>
                <div class="row py-3">
                  <div class="col-sm-6"></div>
                  <div class="col-sm-3 mt-3 text-right d-flex justify-content-end">
                    <a href="/user/changepassword/<?= $data['id'] ?>" class="btn btn-outline-primary">
                      Đổi mật khẩu
                    </a>
                  </div>
                  <div class="col-sm-3 mt-3 text-right ">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Chỉnh sửa
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title text-center" id="exampleModalLabel">Thông tin người dùng</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="/users/update/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="method" value="POST">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label for="username" class="form-label text-dark">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                  value="<?= $data['username'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="name" class="form-label text-dark">Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $data['name'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="email" class="form-label text-dark">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                  value="<?= $data['email'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="avatar" class="form-label text-dark">Ảnh đại diện</label>
                                <input type="file" class="form-control" id="avatar" name="avatar">
                              </div>
                              <div class="mb-3">
                                <label for="phone" class="form-label text-dark">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                  value="<?= $data['phone'] ?>">
                              </div>
                              <div class="mb-3">
                                <label for="address" class="form-label text-dark">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                  value="<?= $data['address'] ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                              <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        </div>
      </div>
      </div>
    </section>
    <?php
  }
}