<?php

class Rating
{

    private Database $db;

    public function __construct(){
        $this->db = Database::getInstance();
        $this->user = Session::get('user_id');
    }

    public function sendRating($product_id, $rating, $review)
    {

        try {

//            if (!$this->hasReviewed($product_id)){
//                echo "You already reviewed this product";
//                return false;
//            }

            $datetime = date('Y-m-d H:i:s');

            $review = trim($review);

            $sql = "INSERT INTO rating (user_id, product_id, rating, review , date_created) VALUES (:uid, :pid, :rating, :review, :dc)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':uid', $this->user, PDO::PARAM_INT);
            $stmt->bindParam(':pid', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':review', $review, PDO::PARAM_STR);
            $stmt->bindParam(':dc', $datetime);
            if ($stmt->execute()){
                return true;
            }

        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }

    }

    public function fetchReviews($product_id){
        try {
            $sql = "SELECT rating.*, users.username FROM rating INNER JOIN users on rating.user_id = users.id WHERE `product_id` = :pid";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':pid', $product_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo "Error: ". $e->getMessage();
        }
    }

    public function fetchRating($product_id)
    {

        $sql = "SELECT SUM(rating) as total_rating, COUNT(*) as num_ratings FROM rating WHERE `product_id` = :pid";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':pid', $product_id);
        if ($stmt->execute()){
            if ($stmt->rowCount() > 0){

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row['num_ratings'] > 0) {
                    return round($row['total_rating'] / $row['num_ratings']);
                } else {
                    return 0;
                }

            } else {
                return 0;
            }
        }
        
    }

    public function countRating($product_id, $rating = 0, $overall = false) {

        if (!$overall){
            $sql = "SELECT COUNT(*) as total FROM `rating` WHERE `product_id` = :pid AND rating = :r";
        } else {
            $sql = "SELECT COUNT(*) as total FROM `rating` WHERE `product_id` = :pid";
        }


        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':pid', $product_id);
        if (!$overall){
            $stmt->bindParam(':r', $rating);
        }
        if ($stmt->execute()){
            $row = $stmt->fetch();
            echo $row['total'];
        }

    }


    public function percentageRating($product_id, $rating){
        $sql = "SELECT SUM(rating) as total_rating, COUNT(*) as num_ratings FROM rating WHERE `product_id` = :pid AND rating = :rating";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':pid', $product_id);
        $stmt->bindParam(':rating', $rating);
        if ($stmt->execute()){
            if ($stmt->rowCount() > 0){

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row['num_ratings'] > 0) {
                    return ($row['total_rating'] / $row['num_ratings']) * 100 ;
                } else {
                    return 0;
                }

            } else {
                return 0;
            }
        }
    }

    /**
     * Check if the user has already reviewed the product
     * @param $product_id
     * @return boolean
     */
    public function hasReviewed($product_id) {

        $sql = "SELECT * FROM rating WHERE product_id = :pid AND user_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $this->user, PDO::PARAM_INT);
        $stmt->bindParam(':pid', $product_id, PDO::PARAM_INT);
        if ($stmt->execute()){
            if ($stmt->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

    }

    public function hasCheckout($cart_id) {
        $sql = "SELECT * FROM checkout WHERE user_id = :uid AND cart_id = :cid AND status = '2'";
        $stmt =$this->db->prepare($sql);
        $stmt->bindParam(':uid',$this->user_id);
        $stmt->bindParam(':cid',$cart_id);
        if ($stmt->execute()) {

            if ($stmt->rowCount() > 0) {
                return true;
            }

        }


    }

}