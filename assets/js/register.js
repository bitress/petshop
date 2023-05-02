$(document).ready(function (e) {
    $("#register_btn").on('click', function(e){
        e.preventDefault();

        let action = 'userRegister';

        let username = $('#username').val();
        let email = $('#email').val();
        var password = $('#password').val();
        var confirm_password = $('#repeat_password').val();
        let firstname = $('#firstname').val();
        let lastname = $('#lastname').val();
        let middlename = $('#middlename').val();
        let address = $('#address').val();

        let profile_picture = $('#profile_picture').prop('files')[0];
        let form_data = new FormData();

        password = CryptoJS.SHA256(password).toString();
        confirm_password = CryptoJS.SHA256(confirm_password).toString();


        form_data.append('action', action);
        form_data.append('profile_picture', profile_picture);
        form_data.append('username', username);
        form_data.append('email', email);
        form_data.append('password', password);
        form_data.append('confirm_password', confirm_password);
        form_data.append('firstname', firstname);
        form_data.append('lastname', lastname);
        form_data.append('middlename', middlename);
        form_data.append('address', address);


        $.ajax({
            type: 'POST',
            url: 'config/Ajax.php',
            data: form_data,
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(data){
                $('#register_btn').html('<i class="fa fa-spinner fa-spin"></i> &nbsp; Registering...');
                $('#register_btn').attr('disabled', 'disabled');
            },
            success: function(res){

                if (res === "true"){
                    notyf.success("Register Successfully");
                    setTimeout(function (){
                        window.location.href = 'login.php';
                    }, 3000)
                } else {
                    notyf.error(res)
                    $("#register_btn").html('&nbsp;<i class="fal fa-sign-in-alt"></i> Log In');
                    $('#register_btn').removeAttr('disabled');
                }
            }
        });

    });
});
