<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Quản lý sản phẩm</title>
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

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Admin</li>
                                            <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Quản lý sản phẩm</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="modal fade create_new_topic" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="createAccount">Thêm mới thể loại</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_create_new_topic" role="form" novalidate="">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Thể loại nhạc<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control " id="topic" placeholder="Thể loại nhạc">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-between mb-0">
                                                <div class="w-100 d-flex justify-content-between mx-2">
                                                    <button type="reset" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" class="btn btn-warning waves-effect waves-light mr-1" id="create_new_topic">
                                                        Thêm
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <div class="modal fade create_new_category" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="createAccount">Thêm mới loại đĩa</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_create_new_category" role="form" novalidate="">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Loại đĩa<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control " id="category" placeholder="Loại đĩa">
                                                </div>
                                            </div>

                                            <div class="form-group row justify-content-between mb-0">
                                                <div class="w-100 d-flex justify-content-between mx-2">
                                                    <button type="reset" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light mr-1" id="create_new_category">
                                                        Thêm
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <div class="modal fade create_new_product" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="createAccount">Thêm mới sản phẩm</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_create_new_product" role="form" novalidate="">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Tên sản phẩm<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="name_product" placeholder="Họ và tên">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Số lượng<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="number" required="true" class="form-control" id="quantity_stock" placeholder="Số lượng">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Số lượng bài hát<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="number" required="true" class="form-control" id="number_of_songs" placeholder="Số lượng bài hát">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Mô tả</label>
                                                <div class="col-8">
                                                    <textarea class="form-control" rows="5" id="description" placeholder="Mô tả"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Loại đĩa<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <select id="id_category" class="selectpicker" data-style="btn-outline-secondary">
                                                        <?php
                                                        for ($i = 0; $i < count($listCategory); $i++) {
                                                            echo "
                                                                    <option value='{$listCategory[$i]->id_category}'>{$listCategory[$i]->name_category}</option>
                                                                ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Loại nhạc<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <select id="id_topic" class="selectpicker" data-style="btn-outline-secondary">
                                                        <?php
                                                        for ($i = 0; $i < count($listTopic); $i++) {
                                                            echo "
                                                                    <option value='{$listTopic[$i]->id_topic}'>{$listTopic[$i]->name_topic}</option>
                                                                ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Nơi sản xuất</label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="manufacturer" placeholder="Nơi sản xuất">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Giá 1 sản phẩm(VND)<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="number" required="true" class="form-control" id="price" placeholder="Giá">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Giảm giá (%)</label>
                                                <div class="col-8">
                                                    <input type="number" required="true" class="form-control" id="discount" placeholder="Giảm giá">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Đường dẫn ảnh (16x9)</label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="image" placeholder="Đường dẫn ảnh">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Đường dẫn ảnh (vuông)</label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="cover_image" placeholder="Đường dẫn ảnh">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Đường dẫn Audio</label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="audio_demo" placeholder="Đường dẫn Audio">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-between mb-0">
                                                <div class="w-100 d-flex justify-content-between mx-2">
                                                    <button type="reset" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" id="create_new_product">
                                                        Thêm
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <div class="modal fade edit_product" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="edit_product_title">Chỉnh sửa sản phẩm</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_edit_product" role="form" novalidate="">
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Tên sản phẩm<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="edit_name_product" placeholder="Họ và tên">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Số lượng<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="number" required="true" class="form-control" id="edit_quantity_stock" placeholder="Số lượng">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Số lượng bài hát<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="number" required="true" class="form-control" id="edit_number_of_songs" placeholder="Số lượng bài hát">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Mô tả</label>
                                                <div class="col-8">
                                                    <textarea class="form-control" rows="5" id="edit_description" placeholder="Mô tả"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Loại đĩa<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <select id="edit_id_category" class="selectpicker" data-style="btn-outline-secondary">
                                                        <?php
                                                        for ($i = 0; $i < count($listCategory); $i++) {
                                                            echo "
                                                                    <option value='{$listCategory[$i]->id_category}'>{$listCategory[$i]->name_category}</option>
                                                                ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Loại nhạc<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <select id="edit_id_topic" class="selectpicker" data-style="btn-outline-secondary">
                                                        <?php
                                                        for ($i = 0; $i < count($listTopic); $i++) {
                                                            echo "
                                                                    <option value='{$listTopic[$i]->id_topic}'>{$listTopic[$i]->name_topic}</option>
                                                                ";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Nơi sản xuất</label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="edit_manufacturer" placeholder="Nơi sản xuất">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Giá 1 sản phẩm(VND)<span class="text-danger">*</span></label>
                                                <div class="col-8">
                                                    <input type="number" required="true" class="form-control" id="edit_price" placeholder="Giá">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Giảm giá (%)</label>
                                                <div class="col-8">
                                                    <input type="number" required="true" class="form-control" id="edit_discount" placeholder="Giảm giá">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Đường dẫn ảnh (16x9)</label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="edit_image" placeholder="Đường dẫn ảnh">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Đường dẫn ảnh (vuông)</label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="edit_cover_image" placeholder="Đường dẫn ảnh">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-4 col-form-label">Đường dẫn Audio</label>
                                                <div class="col-8">
                                                    <input required="true" class="form-control" id="edit_audio_demo" placeholder="Đường dẫn Audio">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-between mb-0">
                                                <div class="w-100 d-flex justify-content-between mx-2">
                                                    <button type="reset" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit" class="btn btn-warning waves-effect waves-light mr-1" id="edit_product_btn">
                                                        Sửa thông tin
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <!-- start table title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">

                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline d-flex justify-content-between">
                                                <div class="form-group">
                                                    <input id="search_product" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-warning mr-2" data-toggle="modal" data-target=".create_new_topic">
                                                        <i class="mdi mdi-plus-circle mr-2"></i>
                                                        Thêm mới thể loại
                                                    </button>
                                                    <button id="add_category" class="btn btn-info mr-2" data-toggle="modal" data-target=".create_new_category">
                                                        <i class="mdi mdi-plus-circle mr-2"></i>
                                                        Thêm mới kiểu đĩa
                                                    </button>
                                                    <button id="add_product" class="btn btn-primary" data-toggle="modal" data-target=".create_new_product">
                                                        <i class="mdi mdi-plus-circle mr-2"></i>
                                                        Thêm mới sản phẩm
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <table id="product_table" class="table table-striped table-bordered mb-0 toggle-circle" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th data-sort-ignore="true" data-toggle="true">ID</th>
                                                <th data-hide="phone">Tên đĩa nhạc</th>
                                                <th data-hide="phone, tablet">Số lượng</th>
                                                <th data-hide="phone, tablet">Số lượng bài hát</th>
                                                <th data-hide="phone, tablet">Loại đĩa</th>
                                                <th data-hide="phone, tablet">Loại nhạc</th>
                                                <th data-hide="all">Nơi sản xuất</th>
                                                <th data-hide="phone, tablet">Giá</th>
                                                <th data-hide="phone, tablet">Giảm giá (%)</th>
                                                <th data-hide="all">Chi tiết</th>
                                                <th data-hide="all">Chỉnh sửa gần nhất</th>
                                                <th class="min-width"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 0; $i < count($listProduct); $i++) {
                                                $topic = "<td><span class='badge label-table badge-primary'>{$listProduct[$i]->name_topic}</span></td>";
                                                $category = "<td><span class='badge label-table badge-primary'>{$listProduct[$i]->name_category}</span></td>";
                                                $dateTime = date("d-m-Y", $listProduct[$i]->date_time / 1000);
                                                echo "
                                                <tr>
                                                    <td>{$listProduct[$i]->id_product}</td>
                                                    <td>{$listProduct[$i]->name_product}</td>
                                                    <td>{$listProduct[$i]->quantity_stock}</td>
                                                    <td>{$listProduct[$i]->number_of_songs}</td>
                                                    {$category}
                                                    {$topic}
                                                    <td>{$listProduct[$i]->manufacturer}</td>
                                                    <td>{$listProduct[$i]->price}</td>
                                                    <td>{$listProduct[$i]->discount}</td>
                                                    <td>{$listProduct[$i]->description}</td>
                                                    <td>{$dateTime}</td>
                                                    <td class='text-center'>
                                                        <button 
                                                            class='btn btn-warning btn-sm btn-icon'
                                                            data-toggle='modal'
                                                            data-target='.edit_product'
                                                            name='button_edit_product'
                                                            id_product='{$listProduct[$i]->id_product}'>
                                                            Sửa
                                                        </button>
                                                        <button class='btn btn-danger btn-sm btn-icon'
                                                            name='button_delete_product'
                                                            id_product='{$listProduct[$i]->id_product}'>
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
                                                <td colspan="11">
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
    <script src="helper/js/management_product.js"></script>

</body>

</html>