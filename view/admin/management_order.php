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

    <link href="assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/c3/c3.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Header -->
        <?php include "layout/admin/header.php"; ?>
        <!-- end Header -->

        <!-- Sidebar -->
        <?php include "layout/admin/side_bar.php"; ?>
        <!-- end Sidebar -->

        <!-- Content -->
        <div>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">

                        <!--  Modal content for the above example -->
                        <div class="modal fade create_new_order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myLargeModalLabel">Thêm mới đơn hàng</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_create_new_order" role="form" novalidate="">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Ngày tạo<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="date_time_create_order">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-12 text-sm-center form-inline d-flex justify-content-between align-items-end">
                                                    <div class="form-group row">
                                                        <div class=" col-8 d-flex flex-column align-items-start">
                                                            <label class="col-form-label text-start">Sản phẩm<span class="text-danger">*</span></label>
                                                            <select id="id_product" class="selectpicker" data-style="btn-outline-secondary">
                                                                <?php
                                                                for ($i = 0; $i < count($listProduct); $i++) {
                                                                    echo "
                                                                        <option value='{$listProduct[$i]->id_product}'
                                                                                name_product='{$listProduct[$i]->name_product}'
                                                                                price_for_one='{$listProduct[$i]->price}'>
                                                                            {$listProduct[$i]->name_product}
                                                                        </option>
                                                                    ";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-4 d-flex flex-column align-items-start">
                                                            <label class="col-form-label text-start ml-2">Số lượng<span class="text-danger">*</span></label>
                                                            <div class="col-8">
                                                                <input type="number" required="true" class="form-control" id="quantity_stock" placeholder="Số lượng">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button id="add_product" class="btn btn-info">
                                                        <i class="mdi mdi-plus-circle mr-2"></i>
                                                        Thêm sản phẩm
                                                    </button>
                                                </div>
                                            </div>

                                            <table class="table table-striped table-bordered mb-0 toggle-circle" data-page-size="7">
                                                <thead>
                                                    <th>STT</th>
                                                    <th>ID</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                </thead>
                                                <tbody id="body_table_create_order">
                                                </tbody>
                                            </table>

                                            <div class="form-group row my-2">
                                                <label class="col-4 col-form-label">Tổng tiền<span class="text-danger">*</span></label>
                                                <div class="col-8 d-flex justify-content-end">
                                                    <b class="text-end" id="show_sum_count">0 VNĐ</b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Trạng thái đơn hàng<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <select id="edit_id_category" class="selectpicker" data-style="btn-outline-primary">
                                                        <option value='success'>Đã thanh toán</option>
                                                        <option value='pending'>Chờ thanh toán</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-between mb-0">
                                                <div class="w-100 d-flex justify-content-between mx-2">
                                                    <button type="reset" class="btn btn-danger waves-effect waves-light" id="reset_storage">
                                                        Xóa sản phẩm
                                                    </button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="create_new_order">
                                                        Thêm
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div class="modal fade show_info_order" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="createOrder">Thông tin đơn hàng</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_show_order" role="form" novalidate="">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Ngày tạo<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <div>
                                                        <div class="input-group">
                                                            <input readonly="true" type="text" class="form-control" placeholder="dd/mm/yyyy" id="date_time_info_order">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-striped table-bordered mb-0 toggle-circle" data-page-size="7">
                                                <thead>
                                                    <th>STT</th>
                                                    <th>ID</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                </thead>
                                                <tbody id="body_table_info_order">
                                                </tbody>
                                            </table>

                                            <div class="form-group row my-2">
                                                <label class="col-4 col-form-label">Tổng tiền<span class="text-danger">*</span></label>
                                                <div class="col-8 d-flex justify-content-end">
                                                    <b class="text-end" id="show_sum_count_info_order">0 VNĐ</b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Trạng thái đơn hàng<span class="text-danger">*</span></label>
                                                <div class="col-8 text-right" id="show_status_info_order"></div>
                                            </div>

                                            <div class="form-group row justify-content-between mb-0">
                                                <div class="w-100 d-flex justify-content-between mx-2" id="show_btn_info">
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

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
                                            <div class="col-12 text-sm-center form-inline d-flex justify-content-between">
                                                <div class="form-group">
                                                    <input id="search_order" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <button id="add_product" class="btn btn-primary" data-toggle="modal" data-target=".create_new_order">
                                                        <i class="mdi mdi-plus-circle mr-2"></i>
                                                        Thêm mới đơn hàng
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <table id="order_table" class="table table-striped table-bordered mb-0 toggle-circle" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>Mã đơn</th>
                                                <th data-hide="phone, tablet">Email</th>
                                                <th data-hide="phone, tablet">Ngày tạo</th>
                                                <th data-hide="phone, tablet">Tổng tiền</th>
                                                <th data-hide="phone, tablet">Trạng thái</th>
                                                <th class="min-width"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 0; $i < count($listOrder); $i++) {
                                                $status = "<td><span class='badge label-table badge-primary'>Đã thanh toán</span></td>";
                                                $detail = "
                                                    <td class='text-center'>
                                                        <button 
                                                            class='btn btn-info btn-sm btn-icon'
                                                            data-toggle='modal'
                                                            data-target='.show_info_order'
                                                            name='show_info_order'
                                                            id_order='{$listOrder[$i]->id_order}'>
                                                            Xem thông tin
                                                        </button>
                                                    </td>
                                                ";
                                                if ($listOrder[$i]->status == "pending") {
                                                    $status = "<td><span class='badge label-table badge-warning'>Chưa thanh toán</span></td>";
                                                    $detail = "
                                                    <td class='text-center'>
                                                        <button 
                                                            class='btn btn-info btn-sm btn-icon'
                                                            data-toggle='modal'
                                                            data-target='.show_info_order'
                                                            name='show_info_order'
                                                            id_order='{$listOrder[$i]->id_order}'>
                                                            Xem thông tin
                                                        </button>
                                                        <button class='btn btn-danger btn-sm btn-icon'
                                                            name='delete_order'
                                                            id_order='{$listOrder[$i]->id_order}'>
                                                            Xóa
                                                        </button>
                                                    </td>
                                                ";
                                                }
                                                $totalPrice = number_format($listOrder[$i]->total_price, 0, ',', '.') . " VNĐ";
                                                $dateTime = date("d-m-Y", $listOrder[$i]->date_time);
                                                echo "
                                                <tr>
                                                    <td>{$listOrder[$i]->id_order}</td>
                                                    <td>{$listOrder[$i]->email}</td>
                                                    <td>{$dateTime}</td>
                                                    <td>{$totalPrice}</td>
                                                    {$status}
                                                    {$detail}
                                                </tr>
                                            ";
                                            }
                                            ?>
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
            <?php include "layout/admin/footer.php"; ?>
            <!-- end Footer -->

        </div>
        <!-- end Content -->


    </div>

    <script src="helper/lib/moment.js"></script>
    <script src="assets/js/vendor.min.js"></script>

    <script src="assets/libs/d3/d3.min.js"></script>
    <script src="assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <script src="assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="assets/js/pages/form-validation.init.js"></script>
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/js/pages/sweet-alerts.init.js"></script>
    <script src="assets/libs/custombox/custombox.min.js"></script>
    <script src="assets/libs/switchery/switchery.min.js"></script>
    <script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="assets/libs/select2/select2.min.js"></script>
    <script src="assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
    <script src="assets/libs/autocomplete/jquery.autocomplete.min.js"></script>
    <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="helper/js/management_order.js"></script>
</body>

</html>