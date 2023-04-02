<?php

class Product
{

    private Database $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function fetch(){

    }

    public function fetchByID(){

    }

}