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

    public function userRegister($firstname, $middlename, $lastname, $username, $email, $password, $confirm_password, $address, $profile_image){

        try {

            $username = trim($username);
            $email = trim($email);
            $password = trim($password);
            $confirm_password = trim($confirm_password);
            $firstname = trim($firstname);
            $middlename = trim($middlename);
            $lastname = trim($lastname);
            $address = trim($address);



            if (!empty($profile_image)) {

                if ( 0 < $profile_image['error'] ) {
                    echo 'Error: ' . $profile_image['error'];
                    return false;
                }

                $info = getimagesize($profile_image['tmp_name']);
                if ($info === FALSE) {
                    echo "Unable to determine image type of uploaded file";
                    return false;
                }

                if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
                    echo "Not a gif/jpeg/png";
                    return false;
                }

                $avatar = $this->upload_file($profile_image);
            } else {
                $avatar = "assets/images/pfp/default.jpg";
            }


            if(empty($username)){
                echo "Username must be filled!";
                return false;
            }

            if (empty($password)){
                echo "Password must be filled!";
                return false;

            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 echo "Invalid email format";
                return false;

            }

            if ($password !== $confirm_password){
                echo "Password does not match!";
                return false;

            }

            if (empty($firstname) || empty($lastname) || empty($middlename)){
                echo "Your name must be filled!";
                return false;

            }



            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);


            $sql = "INSERT INTO `users` (`username`, `email`, `password`, `firstname`, `middlename`, `lastname`, `address`, `profile_picture`) VALUES (:u, :e, :p, :fname, :mname, :lname, :address, :profile_picture)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":u", $username);
            $stmt->bindParam(":p", $hashed_password);
            $stmt->bindParam(":e", $email);
            $stmt->bindParam(":fname", $firstname);
            $stmt->bindParam(":mname", $middlename);
            $stmt->bindParam(":lname", $lastname);
            $stmt->bindParam(":address", $address);
            $stmt->bindParam(":profile_picture", $avatar);
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

    /**
     * @throws Exception
     */
    public  function upload_file($file)  {
        if(isset($file))
        {
            $extension = explode('.', $file['name']);
            $new_name = $this->generateUniqueID() . '.' . $extension[1];
            $destination = __DIR__ .'/../assets/images/pfp/' . $new_name;
            move_uploaded_file($file['tmp_name'], $destination);
            return $new_name;
        }
    }


    /**
     * @throws Exception
     */
    public  function generateUniqueID($length = 20): string
    {
        if (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $length);
    }



}