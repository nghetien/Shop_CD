$(document).ready(function () {
    "use strict";

    let tableAccount = $("#table_account_management");
    tableAccount
        .footable()
        .on("click", "[name='button_edit_item']", function (event) {
            $.ajax({
                type: "GET",
                url: `index.php?controller=management_account&id=${event.target.getAttribute(
                    "id_user"
                )}`,
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    let myData = {};
                    if (dataJson.data.length > 0) {
                        myData = JSON.parse(dataJson.data);
                    }
                    if (dataJson.status == "200") {
                        $("#createAccount").attr(
                            "id_user",
                            event.target.getAttribute("id_user")
                        );
                        $("#edit_full_name").val(myData.fullName);
                        $("#edit_phone_number").val(myData.phone);
                        $("#edit_email").val(myData.email);
                        $(`#edit_id_role`).val(myData.idRole).change();
                        $("#edit_password").val(myData.password);
                        $("#edit_address").val(myData.address);
                    }
                },
            });
        })
        .on("click", "[name='button_delete_item']", function (event) {
            $.ajax({
                type: "DELETE",
                url: `index.php?controller=management_account`,
                data: {
                    id_user: event.target.getAttribute("id_user"),
                },
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    if (dataJson.status == "200") {
                        Swal.fire({
                            title: "Thành công!",
                            text: "Xóa tài khoản thành công!",
                            type: "success",
                            confirmButtonClass: "btn btn-confirm mt-2",
                        }).then(function (result) {
                            if (result.value) {
                                reloadTable();
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
        })
    $("#table_account_management_search").on("input", function (o) {
        o.preventDefault(),
            tableAccount.trigger("footable_filter", { filter: $(this).val() });
    });

    const reloadTable = () => {
        // $.ajax({
        //     type: "GET",
        //     url: "index.php?controller=management_account&action=reload",
        //     success: function (data) {
        //         let dataJson = JSON.parse(data);
        //         let dataReload = dataJson.map((user) => {
        //             let role =
        //                 "<td><span class='badge label-table badge-primary'>Khách hàng</span></td>";
        //             if (user.id_role == "1") {
        //                 role =
        //                     "<td><span class='badge label-table badge-success'>Admin</span></td>";
        //             }
        //             let label =
        //                 "<td><span class='badge label-table badge-success'>Hiện hành</span></td>";
        //             if (user.status == "0") {
        //                 label =
        //                     "<td><span class='badge label-table badge-danger'>Đã xóa</span></td>";
        //             }
        //             return `
        //                 <tr>
        //                     <td>${user.id_user}</td>
        //                     <td>${user.email}</td>
        //                     <td>${user.full_name}</td>
        //                     <td>${user.phone}</td>
        //                     <td>${user.address}</td>
        //                     ${role}
        //                     ${label}
        //                     <td class='text-center'>
        //                         <button 
        //                             class='btn btn-warning btn-sm btn-icon'
        //                             data-toggle='modal'
        //                             data-target='.edit-account'
        //                             name='button_edit_item'
        //                             id_user='${user.id_user}'>
        //                             Sửa
        //                         </button>
        //                         <button class='btn btn-danger btn-sm btn-icon'
        //                             name='button_delete_item'
        //                             id_user='${user.id_user}'>
        //                             Xóa
        //                         </button>
        //                     </td>
        //                 </tr>
        //             `;
        //         });
        //         $("#table_account_management_body").html(dataReload);
        //     },
        // });
        window.location.href = "management_account";
    };

    $("#form_register_account").submit(function (event) {
        event.preventDefault();
        if ($("#password").val() !== $("#confirm_password").val()) {
            Swal.fire({
                title: "Đăng ký thất bại",
                text: "Hai mật khẩu không trùng nhau",
                type: "error",
            });
        } else {
            $.ajax({
                type: "POST",
                url: "index.php?controller=management_account",
                data: {
                    full_name: $("#full_name").val(),
                    phone_number: $("#phone_number").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    id_role: $("#id_role :selected").val(),
                },
                success: function (data) {
                    let dataJson = JSON.parse(data);
                    if (dataJson.status == "200") {
                        Swal.fire({
                            title: "Thành công!",
                            text: "Đăng ký tài khoản thành công!",
                            type: "success",
                            confirmButtonClass: "btn btn-confirm mt-2",
                        }).then(function (result) {
                            if (result.value) {
                                $("#full_name").val("");
                                $("#phone_number").val("");
                                $("#email").val("");
                                $("#password").val("");
                                $("#confirm_password").val("");
                                reloadTable();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Đăng ký thất bại",
                            text: dataJson.message,
                            type: "error",
                        });
                    }
                },
            });
        }
    });

    $("#form_edit_account").submit(function (event) {
        console.log(event.target);
        console.log($("#createAccount").attr("id_user"));
        event.preventDefault();
        $.ajax({
            type: "PUT",
            url: "index.php?controller=management_account",
            data: {
                id_user: $("#createAccount").attr("id_user"),
                full_name: $("#edit_full_name").val(),
                phone_number: $("#edit_phone_number").val(),
                email: $("#edit_email").val(),
                password: $("#edit_password").val(),
                id_role: $("#edit_id_role :selected").val(),
                address: $("#edit_address").val(),
            },
            success: function (data) {
                console.log(data);
                let dataJson = JSON.parse(data);
                if (dataJson.status == "200") {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Sửa thông tin tài khoản thành công!",
                        type: "success",
                        confirmButtonClass: "btn btn-confirm mt-2",
                    }).then(function (result) {
                        if (result.value) {
                            reloadTable();
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
    });
});
