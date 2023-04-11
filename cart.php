<?php
include_once 'config/init.php';
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

</head>
<body>


<?php
include_once 'templates/navbar.php';
?>

<div class="container py-5">


    <div class="row">

        <div class="col-12 col-lg-6 col-xl-7">
            <h5>My Cart</h5>
            <div class="table-responsive m-2">
                <form method="post" action="checkout.php">
                    <div class="col-12">
                        <button type="button" class="btn btn-outline-danger float-end"><i class="fal fa-trash"></i></button>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Select All <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" onclick="selectAll(this)">
                                </div> </th>
                            <th class="d-none d-sm-table-cell"></th>
                            <th class="ps-sm-3">Details</th>
                            <th>Qty</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $cart_object = new Cart();
                        $cart_data = $cart_object->fetchCart(1000);
                        if (!empty($cart)){
                        $total_price = 0;
                        foreach ($cart_data as $cart){

                                $total_price += $cart['product_price'] * $cart['quantity'];

                                ?>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="product[]" value="<?php echo $cart['cart_id']; ?>" class="custom-control-input">
                                        </div>
                                    </td>
                                    <!-- image -->
                                    <td class="d-none d-sm-table-cell">
                                        <picture class="d-block bg-light p-3 f-w-20">
                                            <img class="img-fluid" src="assets/<?= $cart['product_image'] ?>" width="80px" alt="">
                                        </picture>
                                    </td>
                                    <!-- image -->

                                    <!-- Details -->
                                    <td>
                                        <div class="ps-sm-3">
                                            <h6 class="fw-bolder">
                                                <?php echo $cart['product_name'] ?>
                                            </h6>
                                            <small class="d-block text-muted"><?php echo $cart['category_name'] ?></small>
                                        </div>
                                    </td>
                                    <!-- Details -->

                                    <!-- Qty -->
                                    <td>
                                        <div class="quantity buttons_added" data-trigger="spinner" >
                                            <input type="hidden" value="<?php echo $cart['product_price'] ?>" id="price_<?php echo $cart['product_id'] ?>">
                                            <input type="button"  value="-" class="minus btn-outline-dark" data-spin="down">
                                            <input type="text" min="0" class="input-text qty text" name="quantity" id="qnt_<?php echo $cart['product_id'] ?>" value="<?php echo $cart['quantity'] ?>" title="quantity">
                                            <input type="button" value="+" class="plus" data-spin="up">
                                            <button type="button" data-product_id="<?php echo $cart['product_id'] ?>" data-user_id="<?php echo $cart['user_id'] ?>" name="update_cart" class="btn btn-sm btn-outline-success update_cart_button"><i class="far fa-cart-circle-check"></i></button>
                                            <br>
                                        </div>
                                        <div class="px-3">
                                            <span class="small text-muted mt-1"><span id="quantity_<?php echo $cart['product_id'] ?>"><?php echo ($cart['quantity']) ?></span> @ ₱<?php echo number_format($cart['product_price']) ?></span>
                                        </div>
                                    </td>
                                    <!-- /Qty -->

                                    <!-- Actions -->
                                    <td class="f-h-0">
                                        <div class="d-flex justify-content-between flex-column align-items-end h-100">
                                            <a href="delete_cart.php?product_id=<?php echo $cart['product_id']; ?>&customer_id=<?php echo $cart['user_id'];?>" class="btn btn-sm btn-danger"><i class="fal fa-trash-alt"></i></a>
                                            <p class="fw-bolder mt-3 m-sm-0">₱<span id="subtotal_<?php echo $cart['product_id'] ?>"><?php echo number_format($cart['product_price'] * $cart['quantity']) ?></span></p>
                                        </div>
                                    </td>
                                    <!-- /Actions -->

                                </tr>

                                <?php

                            }

                        } else {

                            ?>

                            <tr>
                                <td colspan="5" class="text-center">Your cart is empty! <a href="index.php">Continue Shopping</a> </td>
                            </tr>

                            <?php
                        }

                        ?>

                        </tbody>
                    </table>
                    <div class="float-end">
                        <button name="checkout" type="submit" class="btn btn-success">Checkout</button>
                    </div>
                </form>
            </div>


        </div>

        <div class="col-12 col-lg-6 col-xl-5">
            <div class="bg-dark p-4 p-md-5 text-white">
                <h3 class="fs-3 fw-bold m-0 text-center">Order Summary</h3>
                <div class="py-3 border-bottom-white-opacity">
                    <div class="d-flex justify-content-between align-items-center mb-2 flex-column flex-sm-row">
                        <p class="m-0 fw-bolder fs-6">Subtotal</p>
                        <p class="m-0 fs-6 fw-bolder">₱ 0.00</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center flex-column flex-sm-row mt-3 m-sm-0">
                        <p class="m-0 fw-bolder fs-6">Shipping</p>
                        <span class="text-white opacity-75 small">Will be set at checkout</span>
                    </div>
                </div>
                <div class="py-3 border-bottom-white-opacity">
                    <div class="d-flex justify-content-between align-items-center flex-column flex-sm-row">
                        <div>
                            <p class="m-0 fs-5 fw-bold">Grand Total</p>
                        </div>
                        <p class="mt-3 m-sm-0 fs-5 fw-bold">₱ 0.00</p>
                    </div>
                </div>

                <!-- Coupon Code-->
                <button class="btn btn-link p-0 mt-2 text-white fw-bolder text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Have a coupon code?
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body bg-transparent p-0">
                        <div class="input-group mb-0 mt-2">
                            <input type="text" class="form-control border-0" placeholder="Enter coupon code">
                            <button class="btn btn-white text-dark px-3 btn-sm border-0 d-flex justify-content-center align-items-center"><i class="ri-checkbox-circle-line ri-lg"></i></button>
                        </div>
                    </div>
                </div>
                <!-- / Coupon Code-->

                <!-- Checkout Button-->
                <button disabled class="btn btn-outline-light w-100 text-center mt-3" role="button"><i class="ri-secure-payment-line align-bottom"></i> Proceed to checkout</button>
                <!-- Checkout Button-->
            </div>
        </div>


    </div>

</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="assets/js/jquery.spinner.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="assets/js/notyf.settings.js"></script>
<script src="assets/js/cart.js"></script>
<script>
    function selectAll(source) {
        checkboxes = document.getElementsByName('product[]');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    selectAll(this)

    $(function (){
        $(".update_cart_button").on('click', function(){
            let product_id = $(this).data("product_id");
            let quantity = $("#qnt_"+product_id).val();
            let price = $("#price_"+ product_id).val();

            let subtotal = quantity * price;


            $.ajax({
                type: "POST",
                url: "config/Ajax.php",
                data: {
                    action: 'updateCart',
                    product_id: product_id,
                    quantity: quantity
                },
                success: function (data) {
                    if (data === "true"){
                        notyf.success("Cart updated successfully");
                        $("#quantity_"+ product_id).text(quantity);
                        $("#subtotal_"+ product_id).text(subtotal.toLocaleString("en-US"))
                    } else {
                        notyf.error(data);
                    }
                }
            })

        });
    })


</script>
</body>
</html>

