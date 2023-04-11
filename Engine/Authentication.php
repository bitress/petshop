<?php

/**
 * Authentication Class
 *
 * @author Bitress
 */
class Authentication
{

    /**
     * @var Database
     */
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /**
     * Check if user is logged in
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        if (Session::check('isLoggedIn')){
            return true;
        }

        if (Session::check('user_id')){
            return true;
        }

        return false;

    }

    /**
     * Login the user
     * @param $username
     * @param $password
     * @return true|void
     */
    public function userLogin($username, $password){

        try {

            $username = trim($username);
            $password = trim($password);

            $sql = "SELECT * FROM `users` WHERE `username` = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":username", $username);
            if ($stmt->execute()){

                if ($stmt->rowCount() > 0) {

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    $hashed_password = $row['password'];
                    $user_id = $row['id'];

                    if ($this->verifyPassword($password, $hashed_password)) {
                        Session::set('isLoggedIn', true);
                        Session::set('user_id', $user_id);
                        return true;
                    } else {
                        echo "The password you have entered is incorrect";
                    }

                } else {
                    echo "No user found with that username";
                }

            }

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function userRegister($username, $email, $password, $confirm_password){

        try {

            $username = trim($username);
            $email = trim($email);
            $password = trim($password);
            $confirm_password = trim($confirm_password);

            if(empty($username)){
                echo "Username must be filled!";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 echo "Invalid email format";
            }

            if ($password !== $confirm_password){
                echo "Password does not match!";
            }

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);


            $sql = "INSERT INTO users (username, email, password) VALUES (:u, :e, :p)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":u", $username);
            $stmt->bindParam(":p", $hashed_password);
            $stmt->bindParam(":e", $email);
            if ($stmt->execute()){
                return true;
            }
        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }

    }



    private function verifyPassword(string $password, $hashed_password)
    {
        return password_verify($password, $hashed_password);
    }

}