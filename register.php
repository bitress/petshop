<?php
include_once 'config/init.php';

if ($auth->isLoggedIn()){

    header("Location: index.php");

}

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home | Rawr PetShop</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/favicon-16x16.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/my-style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
</head>
<body>

<?php
include_once 'templates/navbar.php';
?>


<div class="container">
    <div class="row justify-content-sm-center my-5 py-5">

        <div class="col-md-4">
            <div class="text-center">
                <img src="logo.png" alt="logo" width="200">
            </div>
            <div class="text-center">
                <h1>Welcome to Rawr Pet Shop </h1>
                <p>Unleash the love with a pet from our shop</p>
            </div>
        </div>

        <div class="col-md-8">

            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <h1 class="fs-4 card-title fw-bold mb-4">Rawr Pet Shop</h1>


                    <form id="registerForm" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-12">
                                <label class="mb-2 text-muted">Profile Picture</label>
                                <input type="file" id="profile_picture" class="form-control" name="profile_picture" required><br>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-2 text-muted" for="username">First Name</label>
                                <input id="firstname" type="text" class="form-control" name="firstname" value="" required autofocus>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-2 text-muted" for="username">Middle Name</label>
                                <input id="middlename" type="text" class="form-control" name="middlename" value="" required autofocus>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-2 text-muted" for="username">Last Name</label>
                                <input id="lastname" type="text" class="form-control" name="lastname" value="" required autofocus>
                            </div>

                        </div>


                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="username">Address</label>
                            <input id="address" type="text" class="form-control" name="address" value="" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="username">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 w-100">
                                <label class="text-muted" for="password">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>


                        <div class="mb-3">
                            <div class="mb-2 w-100">
                                <label class="text-muted" for="repeat_password">Confirm Password</label>
                            </div>
                            <input id="repeat_password" type="password" class="form-control" name="repeat_password" required>
                        </div>

                        <p class="form-text text-muted" style="font-size: 12px">
                            By creating an account with our store, you will be able to move through the checkout process faster, store shipping addresses, view and track your orders in your account and more.
                        </p>

                        <div class="d-flex align-items-center">
                            <button type="button" id="register_btn" name="submit" class="btn btn-primary ms-auto">
                                Register
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer py-3 border-0">
                    <div class="text-center">
                        Already have an account? <a href="login.php" class="text-dark">Login</a>                        </div>
                </div>
            </div>

        </div>
    </div>
</div>
<footer>
    <div class="text-center mt-5 text-muted">
        Copyright &copy; 2022 &mdash; ShopOn-it
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="assets/js/jquery.spinner.min.js"></script>
<script src="assets/js/sha256.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="assets/js/notyf.settings.js"></script>
<script src="assets/js/register.js"></script>

</body>
</html>

