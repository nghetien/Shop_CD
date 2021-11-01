$(document).ready(function () {
    "use strict";
    $("#form_login").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "index.php?controller=login",
            data: {
                "email": $("#email").val(),
                "password": $("#password").val(),
            },
            success: function(data){
                console.log(data)
                let dataJson = JSON.parse(data)
                if(dataJson.status == '200'){
                    $.toast({
                        heading: 'Đăng nhập thành công!',
                        position: 'top-right',
                        loaderBg: '#5ba035',
                        icon: 'success',
                        hideAfter: 3000,
                        stack: 1
                    });
                    if(dataJson.data === "ADMIN"){
                        window.location = "management_account"
                    }else{
                        window.location = "home"
                    }
                }else{
                    Swal.fire({
                        title: 'Đăng nhập thất bại',
                        text: dataJson.message,
                        type: 'error',
                    });
                }
            },
        })
    });
});
