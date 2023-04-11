<?php

    include_once 'config/init.php';
$cart = new Cart();
?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">
            <img src="logo.png" alt="Logo" width="25" height="25" class="d-inline-block align-text-top">
            Rawr PetShop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0 ms-lg-4" style="width: 65%">
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <form class="d-flex ms-auto me-auto w-100">
                    <div class="input-group">
                        <input class="form-control" name="query" id="searchbox" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline" type="button"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </ul>

            <?php
            if (!$auth->isLoggedIn()):

            ?>

            <ul class="navbar-nav ms-auto mb-lg-0 d-flex">
                <li class="nav-item">
                    <a class="btn btn-outline btn-sm" href="login.php">
                        <i class="far fa-user-plus"></i>
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline btn-sm" href="register.php">
                        <i class="far fa-right-to-bracket"></i>
                        Register
                    </a>
                </li>
            </ul>

                <?php
            else:
                ?>

                <ul class="navbar-nav ms-auto mb-lg-0 d-flex">
                    <li class="nav-item">
                        <div class="dropdown dropstart">
                            <button type="button" class="btn btn-outline-dark btn-sm dropdown-toggle position-relative" type="button" data-bs-toggle="dropdown">
                                <i class="far fa-cart-circle-arrow-up"></i> Cart
                                <span  class="cart-items position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">0
                                <span class="visually-hidden">your cart</span>
                              </span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="shopping-cart active">
                                    <div class="shopping-cart-header">
                                        <i class="bi-cart me-1"></i>
                                        <span class="badge bg-dark text-white ms-1 rounded-pill cart-items"></span>
                                        <div class="shopping-cart-total">
                                            <span class="lighter-text" id="total_cart">Total: </span>
                                            <span class="main-color-text total"></span>
                                        </div>
                                    </div>

                                    <ul class="shopping-cart-items text-decoration-none" id="cart-list">

                                    </ul>
                                    <div class="text-center">
                                        <a href="cart.php" class="btn btn-outline-dark btn-sm">Show Cart <i class="bi bi-cart"></i></a>
                                    </div>
                                </div> <!--end shopping-cart -->
                            </div>
                        </div>

                    </li>



                    <li class="nav-item">
                        <div class="dropdown dropstart">
                            <button class="btn btn-outline btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" >
                                <i class="fal fa-message"></i>
                                <span class="badge bg-dark text-white ms-1 rounded-pill">1</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <div class="shopping-cart active">
                                    <div class="shopping-cart-header">
                                        Messages
                                    </div>
                                    <ul class="list-group bg-light">

                                        <a href="#" class="list-group-item list-group-item-action">dfsfsd</a>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <button onclick="window.location='profile.php';" class="btn btn-outline btn-sm" type="button">
                            <i class="fal fa-user"></i>
                            Profile
                        </button>
                    </li>

                    <li class="nav-item">
                        <button onclick="window.location='logout.php';" class="btn btn-outline btn-sm" type="button">
                            <i class="fal fa-arrow-to-left"></i>
                            Logout
                        </button>
                    </li>

                </ul>

            <?php
            endif;
            ?>


        </div>
    </div>
</nav>