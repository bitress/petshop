<?php

class Cart
{

    private Database $db;
    /**
     * @var mixed|null
     */
    private mixed $user_id;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->user_id = Session::get('user_id');
    }


    /**
     * Counts the number of items in cart
     * @return mixed|void
     */
    public function countCartItems(){

        $sql = "SELECT COUNT(*) as count FROM cart WHERE user_id = :u AND status = '0'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":u", $this->user_id);
        if ($stmt->execute()){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['count'];
        }
    }

    public function fetchCart($limit = 5){

        $sql = "SELECT * FROM cart INNER JOIN products ON products.id = cart.product_id INNER JOIN users ON users.id = cart.user_id 
    LEFT JOIN category ON category.category_id = products.category 
         WHERE  users.id = :uid AND cart.status = '0' LIMIT $limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":uid", $this->user_id);
        if ($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function fetchMyCart(){
        $cart = $this->fetchCart();
        $cart_items = $this->countCartItems();

        $output = "";
        $total_price = 0;

        foreach ($cart as $res){
            $image = $res['product_image'];
            $product_name = $res['product_name'];
            $price = $res['product_price'];
            $quantity = $res['quantity'];
            $total = $price * $quantity;
            $total_price += $total;

            $output .= '<li class="list-unstyled">';
            $output .= '<img src="assets/'. $image .'" alt="item" />';
            $output .= '<span class="item-name">'.$product_name.'</span>';
            $output .= '   <span class="item-detail">Price: ₱ '. number_format($price)  .'</span>';
            $output .= '   <span class="item-price">₱ '. number_format($total) .'</span>';
            $output .= '   <span class="item-quantity badge bg-primary rounded-pill text-black">Quantity: '. $quantity .'</span>';
            $output .= '    </li>';
            $output .= '<hr>';
        }

        $data = array(
            "cart_items" => $cart_items,
            "cart_items_html" => $output,
            "total_price" => number_format($total_price)
        );

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * Add to cart function
     * @param $user_id
     * @param $product
     * @param $quantity
     * @return bool|void
     */
    public function addToCart( $product, $quantity){

        try {

            $sql = "SELECT * FROM `cart` WHERE `product_id` = :product AND `user_id` = :uid";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":product", $product);
            $stmt->bindParam(":uid", $this->user_id);
            if ($stmt->execute()){

                if ($stmt->rowCount() > 0){

                    $sql = "UPDATE `cart` SET `quantity` = `quantity` + :quantity WHERE `product_id` = :product AND user_id = :uid";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(":product", $product);
                    $stmt->bindParam(":uid", $this->user_id);
                    $stmt->bindParam(":quantity", $quantity);
                    if ($stmt->execute()){
                        return true;
                    }

                } else {

                    $sql = "INSERT INTO `cart` (`product_id`, `user_id`, `quantity`) VALUES (:product, :uid, :quantity)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindParam(":product", $product);
                    $stmt->bindParam(":uid", $this->user_id);
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
    public function updateCart( $product_id,  $quantity)
    {
        try {

            $sql = "UPDATE cart SET quantity = :quantity WHERE product_id = :product_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":product_id", $product_id);
            $stmt->bindParam(":quantity", $quantity);
            if ($stmt->execute()){
                return true;
            }

        } catch (Exception $e){
            echo "Error: ". $e->getMessage();
        }

    }

}