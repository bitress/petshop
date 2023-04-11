var defaultPage = true;
$(".load").on("click", function (){
    let load = $(this).data("load");

    $(".load").removeClass('active');
    $(".load").removeClass('disabled');



    switch (load){
        case 'homePage':
            loadHomePage();
            $(this).addClass('active');
            $(this).addClass('disabled');
            defaultPage = true;
            break;
        case 'loginPage':
            loadLoginPage();
            defaultPage = false;

            break;
        case 'registerPage':
            loadRegisterPage();
            defaultPage = false;

            break;
        case 'productPage':
            loadProductsPage();
            defaultPage = false;

            break;
        default:
            loadHomePage();
            defaultPage = true;

    }


})


if (defaultPage){
    loadHomePage();
}

function loadHomePage(){
    $.ajax({
        type: 'post',
        url: 'templates/home.php',
        cache: false,
        success: function (html){
            $("#root").html(html);
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
            $("#root").html(html);
            // Change Document Title
            $(document).prop('title', 'Login | RawrPet Shop');
        }
    });
}

function loadRegisterPage()
{
    $.ajax({
        type: 'post',
        url: 'templates/register.php',
        cache: false,
        success: function (html){
            $("#root").html(html);
            // Change Document Title
            $(document).prop('title', 'Register | RawrPet Shop');
        }
    });
}

function loadCartPage()
{
    $.ajax({
        type: 'post',
        url: 'templates/cart.php',
        cache: false,
        success: function (html){
            $("#root").html(html);
            // Change Document Title
            $(document).prop('title', 'Cart | RawrPet Shop');
        }
    });
}

function loadNavbar(){
    $.ajax({
        type: 'post',
        url: 'templates/navbar.php',
        cache: false,
        success: function (html){
            $("#navigation").html(html);
        }
    });
}


function loadProductsPage(){
    $.ajax({
        type: 'post',
        url: 'templates/products.php',
        cache: false,
        success: function (html){
            $("#navigation").html(html);
        }
    });
}