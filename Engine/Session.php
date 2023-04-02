<?php

class Session
{

    public static function start(){
        $cookieParams = session_get_cookie_params();
        session_set_cookie_params(
            $cookieParams["lifetime"],
            $cookieParams["path"],
            $cookieParams["domain"],
            true,
            true
        );

        session_start();
//        session_regenerate_id(1);
    }

    public static function set($index, $value){
        $_SESSION[$index] = $value;
    }

    public static function get($index, $default = null){
        if(isset($_SESSION[$index]))
            return $_SESSION[$index];
        else
            return $default;
    }

    public static function check($index){
        if (isset($_SESSION[$index])){
            return true;
        }
    }

    public static function del($index){
        unset($_SESSION[$index]);
    }

}