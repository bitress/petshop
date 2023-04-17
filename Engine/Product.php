<?php

class Product
{

    private Database $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function fetchProducts()
    {

        $sql = "SELECT * FROM products LEFT JOIN category ON category.category_id = products.category ORDER BY id DESC";
        $stmt = $this->db->query($sql);
        if ($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }

    public function fetchByRatings()
    {

        $sql = "SELECT * FROM products LEFT JOIN category ON category.category_id = products.category ORDER BY RAND() LIMIT 4";
        $stmt = $this->db->query($sql);
        if ($stmt->execute()){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function fetchByID($product_id){


        $sql = "SELECT * FROM products LEFT JOIN category ON category.category_id = products.category WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $product_id);
        if ($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    }

    public function relatedProduct($category_id, $product_id){
            $sql = "SELECT * FROM products LEFT JOIN category ON category.category_id = products.category WHERE category = :cat_id AND NOT id = :pid LIMIT 4";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':cat_id', $category_id);
        $stmt->bindParam(':pid', $product_id);
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }

}