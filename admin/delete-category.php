<?php

include_once 'connection.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM category WHERE category_id = '$id'";
    mysqli_query($con, $sql);

    header("Location: index.php");

}