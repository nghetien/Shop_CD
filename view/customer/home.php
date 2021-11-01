<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/libs/slick-slider/slick.css" rel="stylesheet" type="text/css"/>
    <link href="assets/libs/slick-slider/slick-theme.css" rel="stylesheet" type="text/css"/>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet"/>
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet"/>

</head>

<body data-layout="horizontal">

<!-- Begin page -->
<div id="wrapper">

    <!-- Navigation Bar-->
    <?php include "layout/customer/header.php"; ?>
    <!-- End Navigation Bar-->

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Trang chủ</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title mb-3">Sản phẩm mới</h4>
                            <div class="slider-syncing-for" dir="ltr">
                                <div>
                                    <img src="assets/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                            </div>

                            <div class="slider-syncing-nav" dir="ltr">
                                <div>
                                    <img src="assets/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="header-title mb-3">Bán chạy</h4>
                            <div class="multiple-items slider-padding" dir="ltr">
                                <div>
                                    <img src="assets/images/small/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-4.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-5.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-6.jpg" alt="slider-img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>


                <div class="card-box">
                    <h4 class="header-title mb-3">Các loại sản phẩm</h4>
                    <div class="row">
                        <div class="col-md-6 col-lg-3">

                            <!-- Simple card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 col-lg-3">

                            <!-- Simple card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 col-lg-3">

                            <!-- Simple card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 col-lg-3">

                            <!-- Simple card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 col-lg-3">

                            <!-- Simple card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 col-lg-3">

                            <!-- Simple card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 col-lg-3">

                            <!-- Simple card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 col-lg-3">

                            <!-- Simple card -->
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Button</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <nav>
                        <ul class="pagination pagination-split justify-content-end">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>


            </div>

        </div> <!-- end content -->


        <!-- Footer Start -->
        <?php include "layout/customer/footer.php"; ?>
        <!-- end Footer -->

    </div>
</div>

<script src="assets/js/vendor.min.js"></script>

<script src="assets/libs/slick-slider/slick.min.js"></script>
<script src="assets/js/pages/slick-slider.init.js"></script>

<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="assets/js/pages/profile.init.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="helper/js/home.js"></script>

</body>
</html>