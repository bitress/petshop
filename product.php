<?php
include_once 'config/init.php';
$product = new Product();
$review_object = new Rating();

    if (isset($_GET['id'])){
        $product_id = $_GET['id'];
        $res = $product->fetchByID($product_id);
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
    <link rel="stylesheet" href="assets/css/rating.css">
</head>
<body>


<?php
include_once 'templates/navbar.php';
?>


    <section class="py-5">
        <form action="product.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $res['id']?>">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="assets/<?= $res['product_image'] ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"><?php echo $res['category_name']; ?></div>
                        <h1 class="h5 fw-bolder"><?php echo $res['product_name']; ?></h1>
                        <p><?php echo $res['product_description'] ?></p>
                        <div class="fs-5 mb-5">
                            <span>₱<?php echo number_format($res['product_price'])?></span>
                        </div>
                        <div class="row">
                            <div class="quantity buttons_added mb-3" data-trigger="spinner" >
                                <input type="button" value="-" class="minus btn-outline-dark" data-spin="down">
                                <input type="text" class="input-text qty text" id="quantity_<?= $res['id'] ?>" name="quantity" value="1" title="quantity">
                                <input type="button" value="+" class="plus" data-spin="up">
                            </div>
                            <?php
                            if ($auth->isLoggedIn()):
                                ?>
                                <button name="addtocart" data-id="<?= $res['id'] ?>"  class="btn btn-outline-success add btn-sm addtocart" type="submit">
                                    <i class="fal fa-cart-shopping"></i> Add to Cart
                                </button>
                            <?php
                            else:
                                ?>
                                <a class="btn btn-outline-success btn-sm add" href="login.php" type="button">
                                    <i class="fal fa-cart-shopping"></i> Add to Cart
                                </a>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>

    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <h1 class="text-warning mt-4 mb-4">
                            <b><span id="average_rating"><?= $review_object->fetchRating($product_id) ?></span> / 5</b>
                        </h1>
                        <div class="mb-3">
                            <i class="fas fa-star star-light mr-1 <?= ($review_object->fetchRating($product_id) >= 1) ? 'uwu': '' ?>"></i>
                            <i class="fas fa-star star-light mr-1 <?= ($review_object->fetchRating($product_id) >= 2) ? 'uwu': '' ?>"></i>
                            <i class="fas fa-star star-light mr-1 <?= ($review_object->fetchRating($product_id) >= 3) ? 'uwu': '' ?>"></i>
                            <i class="fas fa-star star-light mr-1 <?= ($review_object->fetchRating($product_id) >= 4) ? 'uwu': '' ?>"></i>
                            <i class="fas fa-star star-light mr-1 <?= ($review_object->fetchRating($product_id) >= 5) ? 'uwu': '' ?>"></i>
                        </div>
                        <h3><span id="total_review"><?= $review_object->countRating($product_id, 0, true) ?></span> Review</h3>
                    </div>
                    <div class="col-sm-4">

                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>
                            </div>
                            <div class="col">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"><?=$review_object->percentageRating($product_id, 5); ?></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="progress-label-right">(<span id="total_five_star_review"><?=$review_object->countRating($product_id, 5); ?></span>)</div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            </div>
                            <div class="col">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"><?=$review_object->percentageRating($product_id, 4); ?></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="progress-label-right">(<span id="total_five_star_review"><?=$review_object->countRating($product_id, 3); ?></span>)</div>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            </div>
                            <div class="col">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"><?=$review_object->percentageRating($product_id, 3); ?></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="progress-label-right">(<span id="total_five_star_review"><?=$review_object->countRating($product_id, 3); ?></span>)</div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            </div>
                            <div class="col">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"><?=$review_object->percentageRating($product_id, 2); ?></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="progress-label-right">(<span id="total_five_star_review"><?=$review_object->countRating($product_id, 2); ?></span>)</div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            </div>
                            <div class="col">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"><?=$review_object->percentageRating($product_id, 1); ?></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="progress-label-right">(<span id="total_five_star_review"><?=$review_object->countRating($product_id, 1); ?></span>)</div>
                            </div>
                        </div>



                    </div>

                    <?php

                    if($auth->isLoggedIn()):
                        if ($review_object->hasReviewed($product_id)):
                    ?>

                    <div class="col-sm-4 text-center">
                        <h3 class="mt-4 mb-3">Write Review Here</h3>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#make_review">
                            Review
                        </button>
                    </div>

                    <?php
                    endif;
                    endif;
                    ?>


                </div>
            </div>
        </div>
    </div>

<div class="container d-flex justify-content-center align-items-center">
    <div class="row d-flex justify-content-center">

        <h3>Product Reviews</h3>
        <?php


            $review = $review_object->fetchReviews($product_id);

            if (!empty($review)):

        foreach ($review as $rev):

            $star_rating = $rev['rating'];

            ?>

        <div class="col-md-3 border m-1">
            <div class="d-flex flex-column mb-3" id="comment-container">
                <div class="bg-white">
                    <div class="flex-row d-flex">
                        <img src=".." width="40" class="rounded-circle">
                        <div class="d-flex flex-column justify-content-start ml-2">
                            <span class="d-block font-weight-bold name">@<?= $rev['username'] ?></span>
                            <span class="date text-black-50"><?= date("F d, Y h:i:s A", strtotime($rev['date_created']))  ?></span>
                            <div class="w-100 d-flex justify-content-center">
                                <div class="mb-3">
                                    <i class="fas fa-star star-light mr-1 <?= ($star_rating >= 1) ? 'uwu': '' ?>"></i>
                                    <i class="fas fa-star star-light mr-1 <?= ($star_rating >= 2) ? 'uwu': '' ?>"></i>
                                    <i class="fas fa-star star-light mr-1 <?= ($star_rating >= 3) ? 'uwu': '' ?>"></i>
                                    <i class="fas fa-star star-light mr-1 <?= ($star_rating >= 4) ? 'uwu': '' ?>"></i>
                                    <i class="fas fa-star star-light mr-1 <?= ($star_rating >= 5) ? 'uwu': '' ?>"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="comment-text"><?= htmlentities($rev['review']) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php
        endforeach;
        ?>

        <?php else: ?>

        <div class="col-md-12  m-1">
            <div class="d-flex flex-column mb-3" id="comment-container">
                <div class="bg-white ">
                    <div class="flex-row d-flex align-items-center">
                        <p>The product has no review yet.</p>
                    </div>
                </div>
            </div>

            <?php
            endif;
            ?>


    </div>
</div>
    </div>

    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">You may also like</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php
                $category = $res['category_id'];
                $id = $res['id'];

                    $result = $product->relatedProduct($category, $id);



                if (!empty($result)){
                    foreach($result as $row){
                        $star_rating = $review_object->fetchRating($row['id']);
                        ?>
                        <div class="col-sm-3 col-6">
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
                                            <div class="mb-3">

                                                <i class="fas fa-star star-light mr-1 <?= ($star_rating >= 1) ? 'uwu': '' ?>"></i>
                                                <i class="fas fa-star star-light mr-1 <?= ($star_rating >= 2) ? 'uwu': '' ?>"></i>
                                                <i class="fas fa-star star-light mr-1 <?= ($star_rating >= 3) ? 'uwu': '' ?>"></i>
                                                <i class="fas fa-star star-light mr-1 <?= ($star_rating >= 4) ? 'uwu': '' ?>"></i>
                                                <i class="fas fa-star star-light mr-1 <?= ($star_rating >= 5) ? 'uwu': '' ?>"></i>
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
                        <?php
                    }
                } else {
                    echo "No products to show!";
                }
                ?>


            </div>
        </div>
    </section>



<footer class="footer text-center bg-light p-4">
    Copyright &copy; 2023 - Rawr Pet Shop
</footer>


<div class="modal fade" id="make_review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Submit Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="w-100 d-flex justify-content-center">
                        <div class="feedback">
                            <div class="rating">
                                <input type="radio" name="rating" value="5" id="rating-5">
                                <label for="rating-5"></label>
                                <input type="radio" name="rating" value="4" id="rating-4">
                                <label for="rating-4"></label>
                                <input type="radio" name="rating" value="3" id="rating-3">
                                <label for="rating-3"></label>
                                <input type="radio" name="rating" value="2" id="rating-2">
                                <label for="rating-2"></label>
                                <input type="radio" name="rating" value="1" id="rating-1">
                                <label for="rating-1"></label>
                                <div class="emoji-wrapper">
                                    <div class="emoji">
                                        <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                            <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534"/>
                                            <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff"/>
                                            <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347"/>
                                            <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                            <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff"/>
                                            <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347"/>
                                            <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                            <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347"/>
                                        </svg>
                                        <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                            <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347"/>
                                            <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534"/>
                                            <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff"/>
                                            <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347"/>
                                            <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff"/>
                                            <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534"/>
                                            <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff"/>
                                            <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347"/>
                                            <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff"/>
                                        </svg>
                                        <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                            <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347"/>
                                            <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff"/>
                                            <circle cx="340" cy="260.4" r="36.2" fill="#3e4347"/>
                                            <g fill="#fff">
                                                <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10"/>
                                                <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z"/>
                                            </g>
                                            <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347"/>
                                            <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff"/>
                                        </svg>
                                        <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                            <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347"/>
                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                            <g fill="#fff">
                                                <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z"/>
                                                <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81"/>
                                            </g>
                                            <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                            <g fill="#fff">
                                                <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1"/>
                                                <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81"/>
                                            </g>
                                            <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                            <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff"/>
                                        </svg>
                                        <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                            <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                            <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f"/>
                                            <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                            <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                            <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f"/>
                                            <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                            <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347"/>
                                            <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b"/>
                                        </svg>
                                        <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <g fill="#ffd93b">
                                                <circle cx="256" cy="256" r="256"/>
                                                <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z"/>
                                            </g>
                                            <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4"/>
                                            <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea"/>
                                            <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88"/>
                                            <g fill="#38c0dc">
                                                <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z"/>
                                            </g>
                                            <g fill="#d23f77">
                                                <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z"/>
                                            </g>
                                            <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347"/>
                                            <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b"/>
                                            <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>

                <div class="mb-3">
                    <label for="user_review">Review Product</label>
                    <input type="hidden" id="product_id_review" name="product_id"" value="<?= $res['id'] ?>">
                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>

        </div>
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


    $(function(){

        $('.rating input[type="radio"]').click(function() {
            // Remove "checked" attribute from all inputs
            $('.rating input[type="radio"]').removeAttr('checked');
            // Add "checked" attribute to the clicked input
            $(this).attr('checked', 'checked');
        });


        $("#save_review").on('click', function(){

            var data = {
                rating: $('input[name=rating]:checked').val(),
                review: $('#user_review').val(),
                product_id: $('#product_id_review').val()
            }

            $.ajax({
                type: 'POST',
                url: 'config/Ajax.php',
                data: {
                    action: "sendReview",
                    rating: data.rating,
                    review: data.review,
                    product_id: data.product_id
                },

                success: function(response) {
                    if (response === "true"){
                        notyf.success("Review added successfully")
                        setTimeout(function (){
                            location.reload();
                        }, 3000)
                    } else {
                        notyf.error(response);
                    }
                }
            });


        });

    })
</script>

</body>
</html>

