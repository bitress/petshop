<?php

class Rating
{

    private Database $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function sendRating($user_id, $product_id)
    {

    }

    public function fetchRating($product_id)
    {
        
    }

}