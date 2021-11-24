$(document).ready(function () {
    "use strict";

    let tableAccount = $("#product_table");
    tableAccount
        .footable()
        .on("click", "[name='button_edit_product']", function (event) {
            $.ajax({
                type: "GET",
                url: `index.php?controller=management_product&id=${event.target.getAttribute("id_product")}`,
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    let myData = {};
                    if (dataJson.data.length > 0) {
                        myData = JSON.parse(dataJson.data);
                    }
                    if (dataJson.status == "200") {
                        $("#edit_product_title").attr(
                            "id_product",
                            event.target.getAttribute("id_product")
                        );
                        $("#edit_name_product").val(myData.nameProduct);
                        $("#edit_quantity_stock").val(myData.quantityStock);
                        $("#edit_number_of_songs").val(myData.numberOfSongs);
                        $("#edit_manufacturer").val(myData.manufacturer);
                        $("#edit_price").val(myData.price);
                        $("#edit_description").val(myData.description);
                        $("#edit_image").val(myData.image);
                        $("#edit_cover_image").val(myData.coverImage);
                        $("#edit_audio_demo").val(myData.audioDemo);
                        $("#edit_discount").val(myData.discount);
                        $("#edit_id_topic").val(myData.idTopic).change();
                        $("#edit_id_category").val(myData.idCategory).change();
                    }
                },
            });
        })
        .on("click", "[name='button_delete_product']", function (event) {
            Swal.fire({
                title: "Thông báo?",
                text: "Bạn có chắc xóa sản phẩm này không!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "OK!"
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: `index.php?controller=management_product`,
                        data: {
                            id_product: event.target.getAttribute("id_product"),
                        },
                        success: function (data) {
                            let dataJson = JSON.parse(data);
                            if (dataJson.status == "200") {
                                Swal.fire({
                                    title: "Thành công!",
                                    text: "Xóa sản phẩm thành công!",
                                    type: "success",
                                    confirmButtonClass: "btn btn-confirm mt-2",
                                }).then(function (result) {
                                    if (result.value) {
                                        window.location.href = "management_product";
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: "Thất bại",
                                    text: dataJson.message,
                                    type: "error",
                                });
                            }
                        },
                    });
                }
            });
        })
    $("#search_product").on("input", function (o) {
        o.preventDefault(),
            tableAccount.trigger("footable_filter", { filter: $(this).val() });
    });

    $("#form_create_new_topic").submit(function (event) {
        event.preventDefault();
        if ($("#topic").val().length === 0) {
            Swal.fire({
                title: "Thêm mới thất bại",
                text: "Tên thể loại nhạc không được bỏ trống",
                type: "error",
            });
        } else {
            $.ajax({
                type: "POST",
                url: "index.php?controller=management_product&action=topic",
                data: {
                    topic: $("#topic").val(),
                },
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    if (dataJson.status == "200") {
                        Swal.fire({
                            title: "Thành công!",
                            text: "Thêm mới loại nhạc thành công!",
                            type: "success",
                            confirmButtonClass: "btn btn-confirm mt-2",
                        }).then(function (result) {
                            if (result.value) {
                                $("#topic").val("");
                                window.location.href = "management_product";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Thêm mới thất bại",
                            text: dataJson.message,
                            type: "error",
                        });
                    }
                },
            });
        }
    });

    $("#form_create_new_category").submit(function (event) {
        event.preventDefault();
        if ($("#category").val().length === 0) {
            Swal.fire({
                title: "Thêm mới thất bại",
                text: "Tên thể loại đĩa không được bỏ trống",
                type: "error",
            });
        } else {
            $.ajax({
                type: "POST",
                url: "index.php?controller=management_product&action=category",
                data: {
                    category: $("#category").val(),
                },
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    if (dataJson.status == "200") {
                        Swal.fire({
                            title: "Thành công!",
                            text: "Thêm mới loại đĩa thành công!",
                            type: "success",
                            confirmButtonClass: "btn btn-confirm mt-2",
                        }).then(function (result) {
                            if (result.value) {
                                $("#category").val("");
                                window.location.href = "management_product";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Thêm mới thất bại",
                            text: dataJson.message,
                            type: "error",
                        });
                    }
                },
            });
        }
    });

    $("#form_create_new_product").submit(function (event) {
        event.preventDefault();
        if ($("#name_product").val().length === 0 ||
            $("#quantity_stock").val().length === 0 ||
            $("#number_of_songs").val().length === 0 ||
            $("#price").val().length === 0) {
            Swal.fire({
                title: "Thêm mới thất bại",
                text: "Yêu cầu nhập đầy đủ thông tin",
                type: "error",
            });
        } else {
            $.ajax({
                type: "POST",
                url: "index.php?controller=management_product&action=product",
                data: {
                    name_product: $("#name_product").val(),
                    quantity_stock: $("#quantity_stock").val(),
                    number_of_songs: $("#number_of_songs").val(),
                    manufacturer: $("#manufacturer").val(),
                    price: $("#price").val(),
                    description: $("#description").val(),
                    image: $("#image").val(),
                    cover_image: $("#cover_image").val(),
                    audio_demo: $("#audio_demo").val(),
                    discount: $("#discount").val(),
                    id_category: $("#id_category :selected").val(),
                    id_topic: $("#id_topic :selected").val(),
                    date_time: new Date().getTime(),
                },
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    if (dataJson.status == "200") {
                        Swal.fire({
                            title: "Thành công!",
                            text: "Thêm mới sản phẩm thành công!",
                            type: "success",
                            confirmButtonClass: "btn btn-confirm mt-2",
                        }).then(function (result) {
                            if (result.value) {
                                $("#name_product").val("");
                                $("#quantity_stock").val("");
                                $("#number_of_songs").val("");
                                $("#manufacturer").val("");
                                $("#price").val("");
                                $("#description").val("");
                                $("#image").val("");
                                $("#audio_demo").val("");
                                $("#discount").val("");
                                window.location.href = "management_product";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Thêm mới thất bại",
                            text: dataJson.message,
                            type: "error",
                        });
                    }
                },
            });
        }
    });

    $("#form_edit_product").submit(function (event) {
        event.preventDefault();
        if ($("#edit_name_product").val().length === 0 ||
            $("#edit_quantity_stock").val().length === 0 ||
            $("#edit_number_of_songs").val().length === 0 ||
            $("#edit_price").val().length === 0) {
            Swal.fire({
                title: "Thay đổi thất bại",
                text: "Yêu cầu nhập đầy đủ thông tin",
                type: "error",
            });
        } else {
            $.ajax({
                type: "PUT",
                url: "index.php?controller=management_product",
                data: {
                    id_product: $("#edit_product_title").attr("id_product"),
                    name_product: $("#edit_name_product").val(),
                    quantity_stock: $("#edit_quantity_stock").val(),
                    number_of_songs: $("#edit_number_of_songs").val(),
                    manufacturer: $("#edit_manufacturer").val(),
                    price: $("#edit_price").val(),
                    description: $("#edit_description").val(),
                    image: $("#edit_image").val(),
                    cover_image: $("#edit_cover_image").val(),
                    audio_demo: $("#edit_audio_demo").val(),
                    discount: $("#edit_discount").val(),
                    id_category: $("#edit_id_category :selected").val(),
                    id_topic: $("#edit_id_topic :selected").val(),
                    date_time: new Date().getTime(),
                },
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    if (dataJson.status == "200") {
                        Swal.fire({
                            title: "Thành công!",
                            text: "Thay đổi sản phẩm thành công!",
                            type: "success",
                            confirmButtonClass: "btn btn-confirm mt-2",
                        }).then(function (result) {
                            if (result.value) {
                                window.location.href = "management_product";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Thêm mới thất bại",
                            text: dataJson.message,
                            type: "error",
                        });
                    }
                },
            });
        }
    });
});
