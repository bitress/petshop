<?php

    include_once 'init.php';

    if (isset($_POST['action'])){
        $action = $_POST['action'];

        switch ($action) {
            case 'userLogin':
                $auth = new Authentication();
                $res = $auth->userLogin($_POST['username'], $_POST['password']);
                if ($res === true) {
                    echo "true";
                }
            break;
            case 'userRegister':
                $auth = new Authentication();
                $avatar = !empty($_FILES['profile_picture']) ? $_FILES['profile_picture'] : '';

                $res = $auth->userRegister($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm_password'], $_POST['address'], $avatar);
                if ($res === true) {
                    echo "true";
                }

                break;
            case 'getCartItems':
                $cart = new Cart();
                $cart->fetchMyCart();
                break;
            case 'addToCart':
                $cart = new Cart();
                $res = $cart->addToCart($_POST['product_id'], $_POST['quantity']);
                if ($res === true) {
                    echo "true";
                }
                break;
            case 'updateCart':
                $cart = new Cart();
                $res = $cart->updateCart($_POST['product_id'], $_POST['quantity']);
                if ($res === true) {
                    echo "true";
                }
                break;
            case 'sendReview':
                $rating = new Rating();
                $res = $rating->sendRating($_POST['product_id'], $_POST['rating'], $_POST['review']);
                if ($res === true) {
                    echo "true";
                }
                break;
            default:
                echo "Unknown request";
        }
    }