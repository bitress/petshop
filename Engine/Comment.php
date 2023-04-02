<?php

/**
 * @author Cyanne Justin Vega
 * Comment class
 */
class Comment
{

    private Database $db;
    private Rating $rating;

    public function __construct(){
        $this->db = Database::getInstance();
        $this->rating = new Rating();
    }

    public function fetchComment($product_id)
    {

    }

    public function sendComment($user_id, $product_id, $comment, $rating)
    {

    }

    public function editComment($user_id, $product_id, $comment, $rating)
    {

    }


}