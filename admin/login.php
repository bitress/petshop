<?php


session_start();

$_SESSION['isLoggedIn'] =true;
$_SESSION['admin'] = 1;
$_SESSION['id'] = 1;

header("Location: index.php");