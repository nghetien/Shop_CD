<?php
session_start();
include('../../connect.php');
if(empty($_SESSION['user_token'])){
    header("Location: login");
}else{
    if(md5($_SESSION['email']."1".$_SESSION['password']) != $_SESSION['user_token']){
        header("Location: home");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Quản lý đơn hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Footable css -->
    <link href="assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css">
    <!-- C3 Chart css -->
    <link href="assets/libs/c3/c3.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Header -->
        <?php include "../../layout/admin/header.php"; ?>
        <!-- end Header -->


        <!-- Sidebar -->
        <?php include "../../layout/admin/side_bar.php"; ?>
        <!-- end Sidebar -->

        <!-- Content -->
        <div>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">

                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Admin</li>
                                            <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Quản lý đơn hàng</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- start table title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">

                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div class="form-group">
                                                    <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <table id="demo-foo-addrow" class="table table-striped table-bordered mb-0 toggle-circle" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th data-sort-initial="true" data-toggle="true">First Name</th>
                                                <th>Last Name</th>
                                                <th data-hide="phone">Job Title</th>
                                                <th data-hide="phone, tablet">DOB</th>
                                                <th data-hide="phone, tablet">Status</th>
                                                <th data-sort-ignore="true" class="min-width"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Isidra</td>
                                                <td>Boudreaux</td>
                                                <td>Traffic Court Referee</td>
                                                <td>22 Jun 1972</td>
                                                <td><span class="badge label-table badge-success">Active</span></td>
                                                <td class="text-center">
                                                    <button 
                                                        class="btn btn-info btn-sm btn-icon waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-lg"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Shona</td>
                                                <td>Woldt</td>
                                                <td>Airline Transport Pilot</td>
                                                <td>3 Oct 1981</td>
                                                <td><span class="badge label-table badge-primary">Disabled</span></td>
                                                <td class="text-center">
                                                    <button 
                                                        class="btn btn-info btn-sm btn-icon waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-lg"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Granville</td>
                                                <td>Leonardo</td>
                                                <td>Business Services Sales Representative</td>
                                                <td>19 Apr 1969</td>
                                                <td><span class="badge label-table badge-danger">Suspended</span></td>
                                                <td class="text-center">
                                                    <button 
                                                        class="btn btn-info btn-sm btn-icon waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-lg"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Easer</td>
                                                <td>Dragoo</td>
                                                <td>Drywall Stripper</td>
                                                <td>13 Dec 1977</td>
                                                <td><span class="badge label-table badge-success">Active</span></td>
                                                <td class="text-center">
                                                    <button 
                                                        class="btn btn-info btn-sm btn-icon waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-lg"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Maple</td>
                                                <td>Halladay</td>
                                                <td>Aviation Tactical Readiness Officer</td>
                                                <td>30 Dec 1991</td>
                                                <td><span class="badge label-table badge-danger">Suspended</span></td>
                                                <td class="text-center">
                                                    <button 
                                                        class="btn btn-info btn-sm btn-icon waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-lg"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Maxine</td>
                                                <td><a href="#">Woldt</a></td>
                                                <td><a href="#">Business Services Sales Representative</a></td>
                                                <td>17 Oct 1987</td>
                                                <td><span class="badge label-table badge-primary">Disabled</span></td>
                                                <td class="text-center">
                                                    <button 
                                                        class="btn btn-info btn-sm btn-icon waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-lg"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lorraine</td>
                                                <td>Mcgaughy</td>
                                                <td>Hemodialysis Technician</td>
                                                <td>11 Nov 1983</td>
                                                <td><span class="badge label-table badge-primary">Disabled</span></td>
                                                <td class="text-center">
                                                    <button 
                                                        class="btn btn-info btn-sm btn-icon waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-lg"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lizzee</td>
                                                <td><a href="#">Goodlow</a></td>
                                                <td>Technical Services Librarian</td>
                                                <td>1 Nov 1961</td>
                                                <td><span class="badge label-table badge-danger">Suspended</span></td>
                                                <td class="text-center">
                                                    <button 
                                                        class="btn btn-info btn-sm btn-icon waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-lg"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Judi</td>
                                                <td>Badgett</td>
                                                <td>Electrical Lineworker</td>
                                                <td>23 Jun 1981</td>
                                                <td><span class="badge label-table badge-success">Active</span></td>
                                                <td class="text-center">
                                                    <button 
                                                        class="btn btn-info btn-sm btn-icon waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-lg"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lauri</td>
                                                <td>Hyland</td>
                                                <td>Blackjack Supervisor</td>
                                                <td>15 Nov 1985</td>
                                                <td><span class="badge label-table badge-danger">Suspended</span></td>
                                                <td class="text-center">
                                                    <button 
                                                        class="btn btn-info btn-sm btn-icon waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".bs-example-modal-lg"
                                                    >
                                                        Chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="6">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-split justify-content-end footable-pagination"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end table title -->

                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            <?php include "../../layout/admin/footer.php"; ?>
            <!-- end Footer -->

        </div>
        <!-- end Content -->


    </div>

    <!-- ============================================================== -->
    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!--C3 Chart-->
    <script src="assets/libs/d3/d3.min.js"></script>
    <script src="assets/libs/c3/c3.min.js"></script>
    <script src="assets/libs/custombox/custombox.min.js"></script>
    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>
    <!-- Init js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>