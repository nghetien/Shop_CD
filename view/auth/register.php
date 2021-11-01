<?php
if(!empty($_SESSION['user_token'])){
    header("Location: home");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Đăng ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

    <div id="wrapper">
        <div class="home-btn d-none d-sm-block">
            <a href="home"><i class="fas fa-home h2 text-white"></i></a>
        </div>

        <div class="account-pages w-100 mt-5 mb-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mb-0">

                            <div class="card-body p-4">

                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <div class="text-center">
                                            <a href="#">
                                                <h1 class="text-uppercase mb-1 mt-4">Đăng ký</h1>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="account-content mt-4">
                                        <form id="form_register" class="form-horizontal">

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label>Họ và tên</label>
                                                    <input class="form-control" id="full_name" required="true" placeholder="Nghê Quyết Tiến">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label>Số điện thoại</label>
                                                    <input class="form-control" type="number" id="phone_number" required="true" placeholder="09123456789">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label>Email</label>
                                                    <input class="form-control" type="email" id="email_register" required="true" placeholder="nghequyettien@gmail.com">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label>Mật khẩu</label>
                                                    <input class="form-control" type="password" required="" id="password_register" placeholder="Nhập vào mật khẩu">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label>Nhập lại mật khẩu</label>
                                                    <input class="form-control" type="password" required="" id="confirm_password" placeholder="Nhập lại mật khẩu">
                                                </div>
                                            </div>

                                            <div class="form-group row text-center mt-2">
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Đăng ký</button>
                                                </div>
                                            </div>

                                        </form>

                                        <div class="row mt-4 pt-2">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Nếu bạn đã có tài khoản? <a href="login" class="text-dark ml-1"><b>Đăng nhập</b></a></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
    </div>

    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/js/pages/sweet-alerts.init.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="helper/js/register.js"></script>
</body>

</html>