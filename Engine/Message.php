<?php

class Message
{

    /**
     * @var mixed|null
     */
    private $user_id;

    public function __construct(){
        $this->user_id = Session::get('user_id');
    }

    public function sendMessage(){

    }



    public function generateChatBox(){

    }


}