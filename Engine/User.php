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

        $sql = "SELECT * FROM users WHERE users.id = :uid";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":uid", $this->user);
        if ($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        

    }

    public function updateProfile()
    {

    }



}