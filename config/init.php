<?php

    include_once 'Configuration.php';

spl_autoload_register(function ($classname){
    include_once __DIR__ . '/../Engine/' . $classname . '.php';
});


// Init the Authentication Class
$auth = new Authentication();


// Start the session
Session::start();

if ($auth->isLoggedIn()){
    $user_data = new User();
    $user = $user_data->getData();
}

