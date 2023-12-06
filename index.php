<?php
    include_once 'config/init.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
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

    <style>
        .rating:not(:checked) > input {
            position: absolute;
            appearance: none;
        }

        .rating:not(:checked) > label {
            float: right;
            cursor: pointer;
            font-size: 20px;
            color: #666;
        }

        .rating:not(:checked) > label:before {
            content: '★';
        }

        .rating > input:checked ~ label {
            color: #ffa723;
        }
    </style>
</head>
<body>


<?php
    include_once 'templates/navbar.php';
?>


<div class="container py-5">

    <div class="row">

        <div class="col-12 main">
            <div class="carousel mb-4 w-auto">
                <div class="slides">
                    <img src="assets/banners/1.png" alt="slide image" class="slide">
                    <img src="assets/banners/2.png" alt="slide image" class="slide">
                    <img src="assets/banners/3.png" alt="slide image" class="slide">
                </div>
            </div>
        </div>


        <?php

            include_once 'templates/category.php';

        ?>



    </div>

    <div class="row g-0">
        <div class="col-lg-12">
            <div class="lh-1 fs-1 p-4 m-2 main">

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
        </div>
    </div>

    <div class="row">

        <?php

        $product = new Product();
        $result = $product->fetchByRatings();
        $rating = new Rating();


        foreach ($result as $row):

            $star_rating = $rating->fetchRating($row['id']);

            ?>
            <div class="col-sm-3 col-6 main">
                <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid" src="assets/<?= $row['product_image'] ?>">
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">

                        </div>
                    </div>

                    <form method="post">
                       <div class="card-body">
                            <span class="h6"><a href="product.php?id=<?= $row['id'] ?>" class="text-decoration-none"><?= $row['product_name'] ?></a> </span>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li class="fw-light"><a href="category.php?name=<?= $row['category_name'] ?>"><?= $row['category_name'] ?></a> </li>
                            </ul>
                            <div class="w-100 d-flex justify-content-center">
                                <div class="rating">
                                    <input <?= ($star_rating == 5) ? 'checked': '' ?> type="radio" id="star5" name="rate" value="5" disabled>
                                    <label for="star5" title="text"></label>
                                    <input <?= ($star_rating == 4) ? 'checked': '' ?> type="radio" id="star4" name="rate" value="4" disabled>
                                    <label for="star4" title="text"></label>
                                    <input <?= ($star_rating == 3) ? 'checked': '' ?> type="radio" id="star3" name="rate" value="3" disabled>
                                    <label for="star3" title="text"></label>
                                    <input <?= ($star_rating == 2) ? 'checked': '' ?> type="radio" id="star2" name="rate" value="2" disabled>
                                    <label for="star2" title="text"></label>
                                    <input <?= ($star_rating == 1) ? 'checked': '' ?> type="radio" id="star1" name="rate" value="1" disabled>
                                    <label for="star1" title="text"></label>
                                </div>
                            </div>
                            <p class="text-center mb-0 h6">₱ <?= $row['product_price'] ?></a> </p>
                            <div class="bottom d-flex flex-row justify-content-center">
                                <div class="quantity buttons_added" data-trigger="spinner" >
                                    <input type="button" value="-" class="minus btn btn-outline" data-spin="down">
                                    <input type="text" class="input-text qty text" name="quantity" id="quantity_<?= $row['id'] ?>" value="1" title="quantity">
                                    <input type="button" value="+" class="plus btn btn-outline" data-spin="up">
                                </div>

                                <?php
                                if ($auth->isLoggedIn()):
                                    ?>
                                    <button name="addtocart" data-id="<?= $row['id'] ?>"  class="btn btn-outline-success add btn-sm addtocart" type="submit">
                                        <i class="fal fa-cart-shopping"></i>
                                    </button>
                                <?php
                                else:
                                    ?>
                                    <a class="btn btn-outline-success btn-sm add" href="login.php" type="button">
                                        <i class="fal fa-cart-shopping"></i>
                                    </a>
                                <?php
                                endif;
                                ?>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>

    </div>




</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="assets/js/jquery.spinner.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="assets/js/notyf.settings.js"></script>
<script src="assets/js/cart.js"></script>
<script>
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
        }
    });
    splide.mount();
</script>

</body>
</html>

