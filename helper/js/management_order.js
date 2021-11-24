$(document).ready(function () {
    "use strict";

    let tableAccount = $("#order_table");
    tableAccount
        .footable()
        .on("click", "[name='show_info_order']", function (event) {
            $.ajax({
                type: "GET",
                url: `index.php?controller=management_order&id=${event.target.getAttribute(
                    "id_order"
                )}`,
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    if (dataJson.status == "200") {
                        console.log(dataJson);
                        $("#date_time_info_order").val(
                            moment.unix(dataJson.data.dateTime).format("DD/MM/YYYY")
                        );
                        let dataTable = dataJson.data.listProduct.map((item, index) => {
                            return `
                                        <tr>
                                            <td>${index + 1}</td>
                                            <td>${item.idProduct}</td>
                                            <td>${item.nameProduct}</td>
                                            <td>${item.quantity}</td>
                                            <td>${numberWithCommas(
                                item.price
                            )}</td>
                                        </tr>
                                    `;
                        });
                        $("#body_table_info_order").html(dataTable);

                        let sumPrice = 0;
                        dataJson.data.listProduct.forEach((item) => {
                            sumPrice +=item.price *item.quantity;
                        });
                        $("#show_sum_count_info_order").html(numberWithCommas(sumPrice) + " VNĐ");
                        if(dataJson.data.status == "success"){
                            $("#show_status_info_order").html("<span class='badge label-table badge-success'>Đã thanh toán</span>");
                            $("#show_btn_info").html("<button type='reset' class='btn btn-secondary waves-effect waves-light' data-dismiss='modal'>Thoát</button>")
                        }else{
                            $("#show_status_info_order").html("<span class='badge label-table badge-warning'>Chưa thanh toán</span>");
                            $("#show_btn_info").html("<button type='reset' class='btn btn-secondary waves-effect waves-light' data-dismiss='modal'>Thoát</button><button type='reset' class='btn btn-primary waves-effect waves-light' id='transaction_order'>Thanh toán</button>")
                        }
                        $("#createOrder").attr(
                            "id_order",
                            dataJson.data.idOrder,
                        );
                        $("#transaction_order").on("click", function (event) {
                            $.ajax({
                                type: "PUT",
                                url: "index.php?controller=management_order",
                                data: {
                                    id_order: dataJson.data.idOrder,
                                },
                                success: function (data) {
                                    let dataJson = JSON.parse(data);
                                    if (dataJson.status == "200") {
                                        Swal.fire({
                                            title: "Thành công!",
                                            text: "Thanh toán đơn hàng thành công!",
                                            type: "success",
                                            confirmButtonClass: "btn btn-confirm mt-2",
                                        }).then(function (result) {
                                            if (result.value) {
                                                window.location.href = "management_order";
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Thanh toán đơn hàng thất bại",
                                            text: dataJson.message,
                                            type: "error",
                                        });
                                    }
                                },
                            });
                        })
                    }
                },
            });
        })
    .on("click", "[name='delete_order']", function (event) {
        Swal.fire({
            title: "Thông báo?",
            text: "Bạn có chắc xóa đơn hàng này không!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "OK!"
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: `index.php?controller=management_order`,
                    data: {
                        id_order: event.target.getAttribute("id_order"),
                    },
                    success: function (data) {
                        let dataJson = JSON.parse(data);
                        if (dataJson.status == "200") {
                            Swal.fire({
                                title: "Thành công!",
                                text: "Xóa đơn hàng thành công!",
                                type: "success",
                                confirmButtonClass: "btn btn-confirm mt-2",
                            }).then(function (result) {
                                if (result.value) {
                                    window.location.href = "management_order";
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
    $("#search_order").on("input", function (o) {
        o.preventDefault(),
            tableAccount.trigger("footable_filter", { filter: $(this).val() });
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    let storageCreateOrder = {};

    $("#date_time_create_order").datepicker({
        autoclose: !0,
        todayHighlight: !0,
    });

    $("#add_product").on("click", function (event) {
        event.preventDefault();
        if (
            $("#quantity_stock").val() !== "0" &&
            $("#quantity_stock").val() !== ""
        ) {
            if (
                storageCreateOrder[`${$("#id_product :selected").val()}`] !== undefined
            ) {
                storageCreateOrder[`${$("#id_product :selected").val()}`].quantity +=
                    parseInt($("#quantity_stock").val());
            } else {
                storageCreateOrder[`${$("#id_product :selected").val()}`] = {
                    id: $("#id_product :selected").val(),
                    name_product: $("#id_product :selected").attr("name_product"),
                    quantity: parseInt($("#quantity_stock").val()),
                    price: $("#id_product :selected").attr("price_for_one"),
                };
            }
            let dataTable = Object.keys(storageCreateOrder).map((key, index) => {
                return `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${storageCreateOrder[key].id}</td>
                                <td>${storageCreateOrder[key].name_product}</td>
                                <td>${storageCreateOrder[key].quantity}</td>
                                <td>${numberWithCommas(
                    storageCreateOrder[key].price
                )}</td>
                            </tr>
                        `;
            });

            $("#body_table_create_order").html(dataTable);

            let sumPrice = 0;
            Object.keys(storageCreateOrder).forEach((key) => {
                sumPrice +=
                    storageCreateOrder[key].price * storageCreateOrder[key].quantity;
            });
            $("#show_sum_count").html(numberWithCommas(sumPrice) + " VNĐ");
        }
    });

    $("#reset_storage").on("click", function (event) {
        event.preventDefault();
        storageCreateOrder = {};
        $("#body_table_create_order").html("");
        $("#show_sum_count").html("0 VNĐ");
    });

    $("#form_create_new_order").submit(function (event) {
        event.preventDefault();
        if (
            $("#date_time_create_order").val().length === 0 ||
            Object.keys(storageCreateOrder).length === 0
        ) {
            Swal.fire({
                title: "Thêm mới thất bại",
                text: "Yêu cầu nhập đầy đủ thông tin đơn hàng",
                type: "error",
            });
        } else {
            let mom = moment($("#date_time_create_order").val(), "MM-DD-YYYY");
            let sumPrice = 0;
            Object.keys(storageCreateOrder).forEach((key) => {
                sumPrice +=
                    storageCreateOrder[key].price * storageCreateOrder[key].quantity;
            });
            $.ajax({
                type: "POST",
                url: "index.php?controller=management_order",
                data: {
                    date_time: mom.unix(),
                    total_price: sumPrice,
                    list_product: JSON.stringify(storageCreateOrder),
                    status: $("#edit_id_category :selected").val(),
                },
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    if (dataJson.status == "200") {
                        Swal.fire({
                            title: "Thành công!",
                            text: "Thêm mới đơn hàng thành công!",
                            type: "success",
                            confirmButtonClass: "btn btn-confirm mt-2",
                        }).then(function (result) {
                            if (result.value) {
                                storageCreateOrder = {};
                                $("#body_table_create_order").html("");
                                $("#show_sum_count").html("0 VNĐ");
                                $("#quantity_stock").val("");
                                window.location.href = "management_order";
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
