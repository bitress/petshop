<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home | Rawr PetShop</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/icons/favicon-16x16.png">
    <link rel="manifest" href="../assets/icons/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
    <style>
        body {
            overflow: scroll;
        }
        @media (max-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }

            .header_col {
                display: none;
            }
        }

        @media (min-width: 1025px) {
            .category {
                display: none !important;
            }
        }
        .carousel {
            width: 88vw;
            height: 400px;
            border-radius: 3px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }
        .carousel:hover .controls {
            opacity: 1;
        }
        .carousel .controls {
            opacity: 0;
            display: flex;
            position: absolute;
            top: 50%;
            left: 0;
            justify-content: space-between;
            width: s%;
            z-index: 99999;
            transition: all ease 0.5s;
        }
        .carousel .controls .control {
            margin: 0 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.7);
            opacity: 0.5;
            transition: ease 0.3s;
            cursor: pointer;
        }
        .carousel .controls .control:hover {
            opacity: 1;
        }
        .carousel .slides {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            display: flex;
            width: 100%;
            transition: 1s ease-in-out all;
        }
        .carousel .slides .slide {
            min-width: 100%;
            min-height: 250px;
            height: auto;
        }



        .bottom{
            padding: 10px;
            padding-top: 30px;
        }
        .add{

            height: 38px;
            border-radius: 4px;
            margin-left: 40px;
            padding-right: 22px;
            padding-left: 20px;
        }

        .card-img {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }



        .quantity {
            display: inline-block; }

        .quantity .input-text.qty {
            width: 35px;
            height: 39px;
            padding: 0 5px;
            text-align: center;
            background-color: transparent;
            border: 1px solid #efefef;
        }

        .quantity.buttons_added {
            text-align: left;
            position: relative;
            white-space: nowrap;
            vertical-align: top; }

        .quantity.buttons_added input {
            display: inline-block;
            margin: 0;
            vertical-align: top;
            box-shadow: none;
        }

        .quantity.buttons_added .minus,
        .quantity.buttons_added .plus {
            padding: 7px 10px 8px;
            height: 41px;
            background-color: #ffffff;
            border: 1px solid #efefef;
            cursor:pointer;}

        .quantity.buttons_added .minus {
            border-right: 0; }

        .quantity.buttons_added .plus {
            border-left: 0; }

        .quantity.buttons_added .minus:hover,
        .quantity.buttons_added .plus:hover {
            background: #eeeeee; }

        .quantity input::-webkit-outer-spin-button,
        .quantity input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            margin: 0; }

        .quantity.buttons_added .minus:focus,
        .quantity.buttons_added .plus:focus {
            outline: none; }




    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">
            <img src="../logo.png" alt="Logo" width="25" height="25" class="d-inline-block align-text-top">
            Rawr PetShop
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0 ms-lg-4" style="width: 65%">
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>

                <form class="d-flex ms-auto me-auto w-100" method="get" action="search.php">
                    <div class="input-group">
                        <input class="form-control" name="query" id="searchbox" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>



            </ul>



            <ul class="navbar-nav ms-auto mb-lg-0 d-flex">
                <li class="nav-item">
                    <button onclick="window.location='../login.php';"  href="#" class="btn btn-outline btn-sm" type="button">
                        <i class="bi bi-person"></i>
                        Login
                    </button>
                </li>
                <li class="nav-item">
                    <button onclick="window.location='../register.php';" class="btn btn-outline btn-sm" type="button">
                        <i class="bi bi-box-arrow-right"></i>
                        Register
                    </button>
                </li>
            </ul>

        </div>
    </div>
</nav>


<div class="container py-5">

    <div class="row">

        <div class="col-12 main">
            <div class="carousel mb-4 w-auto">
                <div class="slides">
                    <img src="../bannerse/1.png" alt="slide image" class="slide">
                    <img src="../bannerse/2.png" alt="slide image" class="slide">
                    <img src="../bannerse/3.png" alt="slide image" class="slide">
                </div>
            </div>
        </div>

        <div class="col-12 preload placeholder-glow">
            <div class="carousel mb-4 w-auto ">
                <div class="slides placeholder h-100">
                </div>
            </div>
        </div>


        <div class="col-12 main">
            <div class=" lh-1 fs-1 text-center mb-2 p-2">
                <h3 class="text-center">Categories</h3>
            </div>

            <div class="row g-0">
                <div class="splide">
                    <div class="splide__track">
                        <div class="splide__list">
                            <div class="col-sm-2 splide__slide m-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <img src="../images/category/cat_kp_dm.gif" width="100px" class="float-end">
                                        <h5 class="card-title">Cats</h5>
                                        <a class="btn btn-outline-dark btn-sm" href="category.php?id=1&name=Cats">Show Products</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 splide__slide m-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <img src="../images/category/westminster_kp_lm.gif" width="100px" class="float-end">
                                        <h5 class="card-title">Dogs</h5>
                                        <a class="btn btn-outline-dark btn-sm" href="category.php?id=2&name=Dogs">Show Products</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 splide__slide m-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <img src="../images/category/kukek.gif" width="100px" class="float-end">
                                        <h5 class="card-title">Birds</h5>
                                        <a class="btn btn-outline-dark btn-sm" href="category.php?id=4&name=Birds">Show Products</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 splide__slide m-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <img src="../images/category/AnimatedKaleidoscopicGeese-max-1mb.gif" width="100px" class="float-end">
                                        <h5 class="card-title">Foods</h5>
                                        <a class="btn btn-outline-dark btn-sm" href="category.php?id=5&name=Foods">Show Products</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 splide__slide m-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <img src="../images/category/QIpYFFQoyQPl.gif" width="100px" class="float-end">
                                        <h5 class="card-title">Treats & Chews</h5>
                                        <a class="btn btn-outline-dark btn-sm" href="category.php?id=6&name=Treats & Chews">Show Products</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 splide__slide m-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <img src="../images/category/orange-kitten-litterbox-accident-illustration.gif" width="100px" class="float-end">
                                        <h5 class="card-title">Cat Litter</h5>
                                        <a class="btn btn-outline-dark btn-sm" href="category.php?id=7&name=Cat Litter">Show Products</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 splide__slide m-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <img src="../images/category/apps-for-pet-technology-2.gif" width="100px" class="float-end">
                                        <h5 class="card-title">Leash & Collar</h5>
                                        <a class="btn btn-outline-dark btn-sm" href="category.php?id=10&name=Leash & Collar">Show Products</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 splide__slide m-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <img src="../images/category/2001e616063ce3bab711a11afcff0d5d.gif" width="100px" class="float-end">
                                        <h5 class="card-title">Dinosaur</h5>
                                        <a class="btn btn-outline-dark btn-sm" href="category.php?id=11&name=Dinosaur">Show Products</a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 splide__slide m-2">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <img src="../images/category/nemo-fish.gif" width="100px" class="float-end">
                                        <h5 class="card-title">Fish</h5>
                                        <a class="btn btn-outline-dark btn-sm" href="category.php?id=12&name=Fish">Show Products</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 preload">
            <div class=" lh-1 fs-1 text-center mb-2 p-2 placeholder-glow">
                <h3 class="text-center placeholder">Categories</h3>
            </div>

            <div class="row mb-2">
                <div class="placeholder">
                    <div class="splide">
                        <div class="splide__track">
                            <div class="splide__list">
                                <div class="col-sm-2 splide__slide">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <img src="../images/category/cat_kp_dm.gif" width="100px" class="float-end">
                                            <h5 class="card-title placeholder">Cats</h5>
                                            <a class="btn btn-outline-dark btn-sm placeholder" href="category.php?id=1&name=Cats">Show Products</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 splide__slide">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <img src="../images/category/westminster_kp_lm.gif" width="100px" class="float-end">
                                            <h5 class="card-title placeholder">Dogs</h5>
                                            <a class="btn btn-outline-dark btn-sm placeholder" href="category.php?id=2&name=Dogs">Show Products</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 splide__slide">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <img src="../images/category/kukek.gif" width="100px" class="float-end">
                                            <h5 class="card-title placeholder">Birds</h5>
                                            <a class="btn btn-outline-dark btn-sm placeholder" href="category.php?id=4&name=Birds">Show Products</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 splide__slide">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <img src="../images/category/AnimatedKaleidoscopicGeese-max-1mb.gif" width="100px" class="float-end">
                                            <h5 class="card-title placeholder">Foods</h5>
                                            <a class="btn btn-outline-dark btn-sm placeholder" href="category.php?id=5&name=Foods">Show Products</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 splide__slide">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <img src="../images/category/QIpYFFQoyQPl.gif" width="100px" class="float-end">
                                            <h5 class="card-title placeholder">Treats & Chews</h5>
                                            <a class="btn btn-outline-dark btn-sm placeholder" href="category.php?id=6&name=Treats & Chews">Show Products</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 splide__slide">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <img src="../images/category/orange-kitten-litterbox-accident-illustration.gif" width="100px" class="float-end">
                                            <h5 class="card-title placeholder">Cat Litter</h5>
                                            <a class="btn btn-outline-dark btn-sm placeholder" href="category.php?id=7&name=Cat Litter">Show Products</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 splide__slide">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <img src="../images/category/apps-for-pet-technology-2.gif" width="100px" class="float-end">
                                            <h5 class="card-title placeholder">Leash & Collar</h5>
                                            <a class="btn btn-outline-dark btn-sm placeholder" href="category.php?id=10&name=Leash & Collar">Show Products</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 splide__slide">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <img src="../images/category/2001e616063ce3bab711a11afcff0d5d.gif" width="100px" class="float-end">
                                            <h5 class="card-title placeholder">Dinosaur</h5>
                                            <a class="btn btn-outline-dark btn-sm placeholder" href="category.php?id=11&name=Dinosaur">Show Products</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 splide__slide">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <img src="../images/category/nemo-fish.gif" width="100px" class="float-end">
                                            <h5 class="card-title placeholder">Fish</h5>
                                            <a class="btn btn-outline-dark btn-sm placeholder" href="category.php?id=12&name=Fish">Show Products</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>



    <div class="row g-0">
        <div class="col-lg-12">
            <div class="lh-1 fs-1 bg-light p-4 m-2 main">

                <div class="row">
                    <div class="col">
                        <h3>Top Products</h3>
                        <p class="text-muted h6">We've sorted through our feed to put together a collection of our products perfect for your pet.</p>
                    </div>
                    <div class="col mx-auto py-1">
                        <a href="products.php" class="btn btn-outline-dark btn-sm float-end">Show all Products</a>
                    </div>
                </div>

            </div>


            <div class="lh-1 fs-1 bg-light p-4 m-2  preload">

                <div class="row placeholder-glow">
                    <div class="col">
                        <h3 class="placeholder">Top Products</h3>
                        <p class="text-muted h6 placeholder">We've sorted through our feed to put together a collection of our products perfect for your pet.</p>
                    </div>
                    <div class="col mx-auto py-1">
                        <a href="products.php" class="btn btn-outline-dark btn-sm float-end placeholder">Show all Products</a>
                    </div>
                </div>

            </div>

            <div class="row" id="pre_loader">
            </div>

            <div class="row">


                <div class="col-sm-3 col-6 main">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="http://localhost/rawr-petshop/products/323748021_854571872476860_7364424760173764583_n (1).jpg">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">

                            </div>
                        </div>

                        <form action="index.php" method="post">
                            <input type="hidden" name="product_id" value="155">
                            <div class="card-body">
                                <span class="h6"><a href="product.php?id=155" class="text-decoration-none">Cool Clean Clumping Cat Litter...</a> </span>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="fw-light"><a href="category.php?id=7&name=Cat+Litter">Cat Litter</a> </li>

                                </ul>
                                <p class="text-center mb-0 h6">₱250</p>
                                <div class="bottom d-flex flex-row justify-content-center">
                                    <div class="quantity buttons_added" data-trigger="spinner" >
                                        <input type="button" value="-" class="minus btn-outline-dark" data-spin="down">
                                        <input type="text" class="input-text qty text" name="quantity" value="1" title="quantity">
                                        <input type="button" value="+" class="plus" data-spin="up">
                                    </div>
                                    <button onclick="window.location='../login.php';" class="btn btn-outline-success add btn-sm" type="button">
                                        <i class="bi bi-cart"></i>                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3 col-6 main">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="http://localhost/rawr-petshop/products/323996132_981658369479950_7892074381606069540_n.jpg">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">

                            </div>
                        </div>

                        <form action="index.php" method="post">
                            <input type="hidden" name="product_id" value="170">
                            <div class="card-body">
                                <span class="h6"><a href="product.php?id=170" class="text-decoration-none">Rabbitgoo Cat Leash...</a> </span>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="fw-light"><a href="category.php?id=10&name=Leash+%26+Collar">Leash & Collar</a> </li>

                                </ul>
                                <p class="text-center mb-0 h6">₱170</p>
                                <div class="bottom d-flex flex-row justify-content-center">
                                    <div class="quantity buttons_added" data-trigger="spinner" >
                                        <input type="button" value="-" class="minus btn-outline-dark" data-spin="down">
                                        <input type="text" class="input-text qty text" name="quantity" value="1" title="quantity">
                                        <input type="button" value="+" class="plus" data-spin="up">
                                    </div>
                                    <button onclick="window.location='../login.php';" class="btn btn-outline-success add btn-sm" type="button">
                                        <i class="bi bi-cart"></i>                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3 col-6 main">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="http://localhost/rawr-petshop/products/324070033_1231844414211612_8879297401495226569_n.jpg">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">

                            </div>
                        </div>

                        <form action="index.php" method="post">
                            <input type="hidden" name="product_id" value="138">
                            <div class="card-body">
                                <span class="h6"><a href="product.php?id=138" class="text-decoration-none">Pedigree DentaStix Large (25-50kg) 112g (3 Sticks)...</a> </span>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="fw-light"><a href="category.php?id=6&name=Treats+%26+Chews">Treats & Chews</a> </li>

                                </ul>
                                <p class="text-center mb-0 h6">₱94</p>
                                <div class="bottom d-flex flex-row justify-content-center">
                                    <div class="quantity buttons_added" data-trigger="spinner" >
                                        <input type="button" value="-" class="minus btn-outline-dark" data-spin="down">
                                        <input type="text" class="input-text qty text" name="quantity" value="1" title="quantity">
                                        <input type="button" value="+" class="plus" data-spin="up">
                                    </div>
                                    <button onclick="window.location='../login.php';" class="btn btn-outline-success add btn-sm" type="button">
                                        <i class="bi bi-cart"></i>                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3 col-6 main">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="http://localhost/rawr-petshop/products/Screenshot_20230119_104417.png">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">

                            </div>
                        </div>

                        <form action="index.php" method="post">
                            <input type="hidden" name="product_id" value="185">
                            <div class="card-body">
                                <span class="h6"><a href="product.php?id=185" class="text-decoration-none"> Female exo low nose...</a> </span>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="fw-light"><a href="category.php?id=1&name=Cats">Cats</a> </li>

                                </ul>
                                <p class="text-center mb-0 h6">₱12,000</p>
                                <div class="bottom d-flex flex-row justify-content-center">
                                    <div class="quantity buttons_added" data-trigger="spinner" >
                                        <input type="button" value="-" class="minus btn-outline-dark" data-spin="down">
                                        <input type="text" class="input-text qty text" name="quantity" value="1" title="quantity">
                                        <input type="button" value="+" class="plus" data-spin="up">
                                    </div>
                                    <button onclick="window.location='../login.php';" class="btn btn-outline-success add btn-sm" type="button">
                                        <i class="bi bi-cart"></i>                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<footer class="footer text-center bg-light p-4">
    Copyright &copy; 2023 - Rawr Pet Shop
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="../js/jquery.spinner.min.js"></script>

<script>

    $(".main").addClass("d-none");
    showPreloader();


    setTimeout(function () {

        $(".main").removeClass("d-none");
        $("#pre_loader").addClass("d-none")
        $(".preload").addClass("d-none");

    }, 2000);


    function showPreloader(){
        var html = '';

        for (let i = 0; i < 4; i++) {

            html +='<div class="col-sm-3 col-6">';
            html +='<div class="card" aria-hidden="true">';
            html +='     <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect></svg><div class="card-body">';
            html +='     <h5 class="card-title placeholder-glow">';
            html +='         <span class="placeholder col-6"></span>';
            html +='     </h5>';
            html +='      <p class="card-text placeholder-glow">';
            html +='          <span class="placeholder col-7"></span>';
            html +='         <span class="placeholder col-4"></span>';
            html +='          <span class="placeholder col-4"></span>';
            html +='           <span class="placeholder col-6"></span>';
            html +='           <span class="placeholder col-8"></span>';
            html +='      </p>';
            html +='      <div class="bottom d-flex flex-row justify-content-center placeholder-glow">';
            html +='          <div class="quantity buttons_added" data-trigger="spinner" >';
            html +='               <input type="button" value="-" class="placeholder btn" data-spin="down">';
            html +='                    <input type="text" class="input-text qty text placeholder" name="quantity" value="1" title="quantity">';
            html +='                       <input type="button" value="+" class="placeholder btn" data-spin="up">';
            html +='            </div>';
            html +='            <button class="btn btn-outline-success placeholder add btn-sm" type="button"><i class="bi bi-cart"></i></button>';
            html +='       </div>';
            html +='    </div>';
            html +='    </div>';
            html +='</div>';
        }

        $("#pre_loader").html(html);
    }



    var splide = new Splide('.splide', {
        type: 'loop',
        perPage: 3,
        rewind: true,
        breakpoints: {
            640: {
                perPage: 2,
                gap: '.7rem',
                height: '12rem',
            },
            480: {
                perPage: 1,
                gap: '.7rem',
                height: '12rem',
            },
        },
    });
    splide.mount();

    $('#category_select').change(function() {
        window.location = $(this).val();
    });

    const delay = 3000; //ms

    const slides = document.querySelector(".slides");
    const slidesCount = slides.childElementCount;
    const maxLeft = (slidesCount - 1) * 100 * -1;

    let current = 0;

    function changeSlide(next = true) {
        if (next) {
            current += current > maxLeft ? -100 : current * -1;
        } else {
            current = current < 0 ? current + 100 : maxLeft;
        }

        slides.style.left = current + "%";
    }

    let autoChange = setInterval(changeSlide, delay);
    const restart = function() {
        clearInterval(autoChange);
        autoChange = setInterval(changeSlide, delay);
    };

</script>
</body>
</html>

