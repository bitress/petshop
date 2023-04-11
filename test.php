<?php

include_once 'config/init.php';

$rating = new Cart();
echo $rating->fetchMyCart();