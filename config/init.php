<?php

    include_once 'Configuration.php';

spl_autoload_register(function ($classname){
    include_once __DIR__ . '/Engine/' . $classname . '.php';
});


// Start the session
Session::start();