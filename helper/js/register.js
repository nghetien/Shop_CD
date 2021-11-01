$(document).ready(function () {
    "use strict";
    $("#form_register").submit(function (event) {
        event.preventDefault();
        if($("#password_register").val() !== $("#confirm_password").val()){
            Swal.fire({
                title: 'Đăng ký thất bại',
                text: "Hai mật khẩu không trùng nhau",
                type: 'error',
            });
        }else{
            $.ajax({
                type: "POST",
                url: "index.php?controller=register",
                data: {
                    "full_name": $("#full_name").val(),
                    "phone_number": $("#phone_number").val(),
                    "email_register": $("#email_register").val(),
                    "password_register": $("#password_register").val(),
                },
                success: function(data){
                    let dataJson = JSON.parse(data)
                    if(dataJson.status == '200'){
                        Swal.fire(
                            {
                                title: 'Thành công!',
                                text: 'Đăng ký tài khoản thành công!',
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            }
                        ).then(function (result) {
                            if (result.value) {
                                window.location = "login"
                            }
                        })
                    }else{
                        Swal.fire({
                            title: 'Đăng ký thất bại',
                            text: dataJson.message,
                            type: 'error',
                        });
                    }
                },
            })
        }
    });
});
