<?php

class User
{

    private Database $db;
    /**
     * @var mixed|null
     */
    private mixed $user;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->user = Session::get("user_id");
    }

    public function getData()
    {

    }

    public function updateProfile()
    {

    }



}