<?php

class Message
{

    /**
     * @var mixed|null
     */
    private mixed $user_id;

    public function __construct(){
        $this->user_id = Session::get('user_id');
    }

    /**
     * Send sms as a user
     * @param $message
     * @return void
     */
    public function sendMessage($message){

        $datetime = date("Y-m-d H:i:s");
        $message = trim($message);

        $sql = "INSERT INTO message (sender, receiver, message, date_created) VALUES (:se, :re, :me, :dc)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':se', $this->user_id);
        $stmt->bindParam(':re', 0);
        $stmt->bindParam(':me', $message);
        $stmt->bindParam(':dc', $datetime);
        if ($stmt->execute()){
            return true;
        }


    }



    public function generateChatBox(){

    }


}