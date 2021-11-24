<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Quản lý tài khoản</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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

                        <!--  Modal create -->
                        <div id="modal_register" class="modal fade create-new-account" tabindex="-1" role="dialog" aria-labelledby="createAccount" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="createAccount">Tạo mới tài khoản</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_register_account" role="form" novalidate="">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Họ và tên<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="full_name" placeholder="Họ và tên">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Số điện thoại<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="number" required="true" class="form-control" id="phone_number" placeholder="Số điện thoại">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Email<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="email" required="true" class="form-control" id="email" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Loại tài khoản<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <select id="id_role" class="selectpicker" data-style="btn-outline-secondary">
                                                        <option value="1">Admin</option>
                                                        <option value="2">Khách hàng</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Mật khẩu<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input id="password" type="password" placeholder="Password" required="true" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Xác nhận mật khẩu
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="password" required="true" placeholder="Password" class="form-control" id="confirm_password">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-between mb-0">
                                                <div class="w-100 d-flex justify-content-between mx-2">
                                                    <button type="reset" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="register_button">
                                                        Đăng ký
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <!--  Modal edit -->
                        <div class="modal fade edit-account" tabindex="-1" role="dialog" aria-labelledby="editAccount" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="createAccount">Chỉnh sửa tài khoản</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_edit_account" role="form" novalidate="">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Họ và tên<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="edit_full_name" placeholder="Họ và tên">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Số điện thoại<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="number" required="true" class="form-control" id="edit_phone_number" placeholder="Số điện thoại">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Email<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="email" readonly="" class="form-control" id="edit_email" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Địa chỉ<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="text" class="form-control" id="edit_address">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Loại tài khoản<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <select id="edit_id_role" class="selectpicker" data-style="btn-outline-secondary">
                                                        <option value="1">Admin</option>
                                                        <option value="2">Khách hàng</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Mật khẩu<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input id="edit_password" type="password" placeholder="Password" required="true" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-between mb-0">
                                                <div class="w-100 d-flex justify-content-between mx-2">
                                                    <button type="reset" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" class="btn btn-warning waves-effect waves-light mr-1" id="register_button_edit">
                                                        Sửa thông tin
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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
                                            <li class="breadcrumb-item active">Quản lý tài khoản</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Quản lý tài khoản</h4>
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
                                            <div class="col-12 text-sm-center form-inline  d-flex justify-content-between">
                                                <div class="form-group">
                                                    <input id="table_account_management_search" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <button id="modal_create_account" class="btn btn-primary" data-toggle="modal" data-target=".create-new-account">
                                                        <i class="mdi mdi-plus-circle mr-2"></i>
                                                        Thêm mới tài khoản
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <table id="table_account_management" class="table table-striped table-bordered mb-0 toggle-circle" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th data-sort-ignore="true" data-toggle="true">ID</th>
                                                <th>Email</th>
                                                <th data-hide="phone">Họ và tên</th>
                                                <th data-hide="phone, tablet">Số điện thoại</th>
                                                <th data-hide="phone, tablet">Địa chỉ</th>
                                                <th data-hide="phone, tablet">Quyền</th>
                                                <th data-hide="phone, tablet">Trạng thái</th>
                                                <th class="min-width"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_account_management_body">
                                            <?php
                                            for ($i = 0; $i < count($listAccount); $i++) {
                                                $role = "<td><span class='badge label-table badge-primary'>Khách hàng</span></td>";
                                                if ($listAccount[$i]->id_role == "1") {
                                                    $role = "<td><span class='badge label-table badge-success'>Admin</span></td>";
                                                }
                                                $label = "<td><span class='badge label-table badge-success'>Hiện hành</span></td>";
                                                if ($listAccount[$i]->status == "0") {
                                                    $label = "<td><span class='badge label-table badge-danger'>Đã xóa</span></td>";
                                                }
                                                $password = md5($rows[$i][1]);
                                                echo "
                                                <tr>
                                                    <td>{$listAccount[$i]->id_user}</td>
                                                    <td>{$listAccount[$i]->email}</td>
                                                    <td>{$listAccount[$i]->full_name}</td>
                                                    <td>{$listAccount[$i]->phone}</td>
                                                    <td>{$listAccount[$i]->address}</td>
                                                    {$role}
                                                    {$label}
                                                    <td class='text-center'>
                                                        <button 
                                                            class='btn btn-warning btn-sm btn-icon'
                                                            data-toggle='modal'
                                                            data-target='.edit-account'
                                                            name='button_edit_item'
                                                            id_user='{$listAccount[$i]->id_user}'>
                                                            Sửa
                                                        </button>
                                                        <button class='btn btn-danger btn-sm btn-icon'
                                                            name='button_delete_item'
                                                            id_user='{$listAccount[$i]->id_user}'>
                                                            Xóa
                                                        </button>
                                                     </td>
                                                </tr>
                                            ";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
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
    <script src="helper/js/management_account.js"></script>
</body>

</html>