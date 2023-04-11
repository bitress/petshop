<?php

class Category
{

    public function __construct(){

        $this->db = Database::getInstance();

    }

    public function getCategory($id){}

    public function addCategory($data){}

    public function editCategory($id, $data){}

    public function deleteCategory($id){}

    public function fetchAllCategory(){

        $query = "SELECT * FROM category";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}