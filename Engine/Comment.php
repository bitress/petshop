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
        $comment = $this->db->prepare('
            SELECT *
            FROM comment
            WHERE product_id = :product_id
        ');
        $comment->bindParam('product_id', $product_id);
        $comment->execute();
        return $comment->fetch();

    }

    public function sendComment($user_id, $product_id, $comment, $rating)
    {
        $comment = $this->db->prepare('
            INSERT INTO comment (user_id, product_id, comment, rating)
            VALUES(:user_id, :product_id, :comment, :rating)
        ');
        $comment->bindParam('user_id', $user_id);
        $comment->bindParam('product_id', $product_id);
        $comment->bindParam('comment', $comment);
        $comment->bindParam('rating', $rating);
        $comment->execute();

    }

    public function editComment($user_id, $product_id, $comment, $rating)
    {
        $comment = $this->db->prepare('
            UPDATE comment SET message = :comment, rating = :rating
            WHERE user_id = :user_id AND product_id = :product_id
        ');
        $comment->bindParam('user_id', $user_id);
        $comment->bindParam('product_id', $product_id);
        $comment->bindParam('comment', $comment);
        $comment->bindParam('rating', $rating);
        $comment->execute();

    }

    public function countComments($product_id){
        $comment = $this->db->prepare('
            SELECT COUNT(*) as total
            FROM comment
            WHERE product_id = :product_id
        ');
        $comment->bindParam('product_id', $product_id);
        $comment->execute();
        return $comment->fetch()['total'];
    }


}