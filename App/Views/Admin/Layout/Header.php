<?php
namespace App\Views\Admin\Layout;

use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {

        ?>
        <!DOCTYPE html>
        <html>

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <title>K-Food Dashboard</title>

            <link href="<?= APP_URL ?>/public/admin/assets/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?= APP_URL ?>/public/admin/assets/css/custom.css" rel="stylesheet">
            <link href="<?= APP_URL ?>/public/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

            <!-- Toastr style -->
            <link href="<?= APP_URL ?>/public/admin/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

            <!-- Gritter -->
            <link href="<?= APP_URL ?>/public/admin/assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

            <link href="<?= APP_URL ?>/public/admin/assets/css/animate.css" rel="stylesheet">
            <link href="<?= APP_URL ?>/public/admin/assets/css/style.css" rel="stylesheet">
            <script src="<?= APP_URL ?>/public/library/ckeditor4/ckeditor/ckeditor.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>

        <body>
            <div id="wrapper">
                <nav class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav metismenu" id="side-menu">
                            <li class="nav-header">
                                <div class="dropdown profile-element text-center"> <span>
                                        <img alt="image" class="img-circle avatar-admin m-auto" width="70px"
                                            src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.pinterest.com%2Ftthy5143%2Favatar-facebook-xinh-m%25E1%25BA%25B7c-%25C4%2591%25E1%25BB%258Bnh%2F&psig=AOvVaw2Mx-ZSuYChIx1DqEIBi9xk&ust=1737186702659000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCNjSnvWi_IoDFQAAAAAdAAAAABAE" />
                                    </span>
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                        <span class="clear"> <span class="block m-t-xs"> <strong
                                                    class="font-bold">Admin</strong>
                                            </span> <span class="text-muted text-xs block">Xem thêm <b class="caret"></b></span>
                                        </span> </a>
                                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                        <li><a href="profile.html">Thông tin</a></li>
                                        <li><a href="login.html">Logout</a></li>
                                    </ul>
                                </div>
                                <div class="logo-element">
                                    K-Food
                                </div>
                            </li>
                            <li class="active">
                                <a href="/admin"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                            </li>
                            <li class="active">
                                <a href="/admin/user"><i class="fa fa-diamond"></i> <span class="nav-label">Người dùng</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pie-chart"></i> <span class="nav-label">Sản phẩm</span><span
                                        class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/admin/product">Tất cả</a></li>
                                    <li><a href="/admin/product/create">Thêm mới</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="mailbox.html"><i class="fa fa-snowflake-o"></i> <span class="nav-label">Danh
                                        mục</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/admin/category">Tất cả</a></li>
                                    <li><a href="/admin/category/create">Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="/admin/customer"><i class="fa fa-user"></i> <span class="nav-label">Khách hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/comment"><i class="fa fa-comment"></i> <span class="nav-label">Bình luận</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/raiting"><i class="fa fa-star"></i> <span class="nav-label">Đánh giá</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-money"></i> <span class="nav-label">Đơn hàng</span><span
                                        class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/admin/order">Tất cả</a></li>
                                    <li><a href="/admin/order">Chờ xử lí</a></li>
                                    <li><a href="/admin/order">Đang giao</a></li>
                                    <li><a href="/admin/order">Đã giao</a></li>
                                    <li><a href="/admin/order">Đã hủy</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Bài viết </span><span
                                        class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/admin/post">Tất cả</a></li>
                                    <li>
                                        <a href="./pages/posts/index.php">Thêm mới</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/admin/voucher"><i class="fa fa-magic"></i> <span class="nav-label">Vourcher
                                    </span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-trash"></i> <span class="nav-label">Thùng rác </span><span
                                        class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li><a href="/admin/recycle/product">Sản phẩm</a></li>
                                    <li>
                                        <a href="/admin/recycle/post">Bài viết</a>
                                    </li>
                                    <li>
                                        <a href="/admin/recycle/user">Người dùng</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </nav>

                <div id="page-wrapper" class="gray-bg dashbard-1">
                    <div class="row border-bottom">
                        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                            <div class="navbar-header">
                                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                        class="fa fa-bars"></i> </a>
                            </div>
                            <ul class="nav navbar-top-links navbar-right">
                                <li>
                                    <span class="m-r-sm text-muted welcome-message">Xin chào Admin</span>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                        <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-messages">
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a href="profile.html" class="pull-left">
                                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <small class="pull-right">46h ago</small>
                                                    <strong>Mike Loreipsum</strong> started following <strong>Monica
                                                        Smith</strong>. <br>
                                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a href="profile.html" class="pull-left">
                                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right text-navy">5h ago</small>
                                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica
                                                        Smith</strong>. <br>
                                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a href="profile.html" class="pull-left">
                                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right">23h ago</small>
                                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="text-center link-block">
                                                <a href="mailbox.html">
                                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                        <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-alerts">
                                        <li>
                                            <a href="mailbox.html">
                                                <div>
                                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="profile.html">
                                                <div>
                                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="grid_options.html">
                                                <div>
                                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="text-center link-block">
                                                <a href="notifications.html">
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>


                                <li>
                                    <a href="login.html">
                                        <i class="fa fa-sign-out"></i> Log out
                                    </a>
                                </li>
                            </ul>

                        </nav>
                    </div>
                    <?php
    }
}
?>