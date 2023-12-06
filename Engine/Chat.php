<?php

class Chat
{

    private Database $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }


}