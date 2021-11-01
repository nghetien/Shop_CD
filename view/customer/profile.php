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

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet"/>
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet"/>

</head>

<body data-layout="horizontal">

<!-- Begin page -->
<div id="wrapper">

    <!-- Navigation Bar-->
    <?php include "../../layout/customer/header.php"; ?>
    <!-- End Navigation Bar-->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">Web bán băng đĩa</li>
                                    <li class="breadcrumb-item active">Thông tin cá nhân</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Thông tin cá nhân</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="profile-bg-picture" style="background-image:url('assets/images/bg-profile.jpg')">
                            <span class="picture-bg-overlay"></span><!-- overlay -->
                        </div>
                        <!-- meta -->
                        <div class="profile-user-box">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span class="float-left mr-3"><img src="assets/images/users/avatar-1.jpg" alt=""
                                                                       class="avatar-xl rounded-circle"></span>
                                    <div class="media-body">
                                        <h4 class="mt-1 mb-1 font-18 ellipsis">Michael A. Franklin</h4>
                                        <p class="font-13"> User Experience Specialist</p>
                                        <p class="text-muted mb-0"><small>California, United States</small></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-success waves-effect waves-light">
                                            <i class="mdi mdi-account-settings-variant mr-1"></i> Edit Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ meta -->
                    </div>
                </div>


            </div> <!-- end container-fluid -->

        </div> <!-- end content -->


        <!-- Footer Start -->
        <?php include "../../layout/customer/footer.php"; ?>
        <!-- end Footer -->

    </div>
</div>

<script src="assets/js/vendor.min.js"></script>

<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="assets/js/pages/profile.init.js"></script>
<script src="assets/js/app.min.js"></script>

</body>
</html>
