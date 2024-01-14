<?php

$host = "localhost";
$username = "root";
$password = "";
$database_name = "rawrpetshop";

// Create connection
$con = new mysqli($host, $username, $password, $database_name);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

session_start();

const WEBSITE_DOMAIN = 'http://localhost/petshop/assets/';
