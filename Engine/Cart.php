<?php

class Cart
{

    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function fetchCart($user_id){

    }

    /**
     * Add to cart function
     * @param $user_id
     * @param $product
     * @param $quantity
     * @return bool|void
     */
    public function addToCart($user_id, $product, $quantity){

        try {

            $sql = "SELECT * FROM `cart` WHERE `product_id` = :product AND `user_id` = :uid";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":product", $product);
            $stmt->bindParam(":uid", $user_id);
            if ($stmt->execute()){

                if ($stmt->rowCount() > 0){

                    $sql = "UPDATE `cart` SET `quantity` = `quantity` + :quantity WHERE `product_id` = :product AND user_id = :uid";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(":product", $product);
                    $stmt->bindParam(":uid", $user_id);
                    $stmt->bindParam(":quantity", $quantity);
                    if ($stmt->execute()){
                        return true;
                    }

                } else {

                    $sql = "INSERT INTO `cart` (`product_id`, `user_id`, `quantity`) VALUES (:product, :uid, :quantity)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(":product", $product);
                    $stmt->bindParam(":uid", $user_id);
                    $stmt->bindParam(":quantity", $quantity);
                    if ($stmt->execute()){
                        return true;
                    }

                    return false;


                }

            }

        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }


    }

    public function deleteProduct($user_id) {

    }

    public function editProduct(){

    }

}