<?php

include_once 'config/init.php';

Session::del('user_id');
Session::del('isLoggedIn');

header('Location: index.php');