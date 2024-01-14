<?php

include_once 'connection.php';

if (isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = '$id'";
    mysqli_query($con, $sql);

    $sql = "DELETE FROM cart WHERE product_id = '$id'";
    mysqli_query($con, $sql);

    header("Location: index.php");

}