let defaultPage = true;

$(".load").on("click", function (){
    let load = $(this).data("load");

    $(".load").removeClass('active');
    $(".load").removeClass('disabled');


    switch (load){
        case 'homePage':
            loadHomePage();
            $(this).addClass('active');
            $(this).addClass('disabled');
            defaultPage = false;
            break;
        case 'loginPage':
            loadLoginPage();
            $(this).addClass('active');
            $(this).addClass('disabled');
            break;
        default:
            loadHomePage();
    }


})


if (defaultPage){
    loadLogin();
}

function loadHomePage(){
    $.ajax({
        type: 'post',
        url: 'templates/home.php',
        cache: false,
        success: function (html){
            $("#main").html(html);
            // Change Document Title
            $(document).prop('title', 'Home | RawrPet Shop');
        }
    });
}


function loadLoginPage()
{
    $.ajax({
        type: 'post',
        url: 'templates/login.php',
        cache: false,
        success: function (html){
            $("#main").html(html);
            // Change Document Title
            $(document).prop('title', 'Login | RawrPet Shop');
        }
    });
}
