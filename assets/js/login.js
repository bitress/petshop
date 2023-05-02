
$(function (){

    $("#username").focus();

    $("#loginForm").on('submit', function (e) {
        e.preventDefault();

        let data = {
            username: $("#username").val(),
            password: $("#password").val()
        }


        data.password = CryptoJS.SHA256(data.password).toString();

        $.ajax({
            type: 'POST',
            url: 'config/Ajax.php',
            data: {
                action: 'userLogin',
                username: data.username,
                password: data.password
            },
            beforeSend() {
                $('#login_btn').attr('disabled', 'disabled');
                $("#login_btn").html('&nbsp;<i class="far fa-spinner fa-spin"></i> Logging In');
            },
            success: function (res){

                if (res === "true"){
                    notyf.success("Logged In Successfully");
                    setTimeout(function (){
                        window.location.href = 'index.php';
                    }, 3000)
                } else {
                    notyf.error(res)
                    $("#login_btn").html('&nbsp;<i class="fal fa-sign-in-alt"></i> Log In');
                    $('#login_btn').removeAttr('disabled');
                }
            }
        })

    })

});