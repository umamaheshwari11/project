<?php

class User
{
    private $conn;
    public static function signup($user, $pass, $email, $phone)
    {
        
        $options = [
            'cost' => 5,
        ];
        $pass = password_hash("$pass", PASSWORD_BCRYPT, $options);

        $conn = Database::getConnection();
        $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `active`)
        VALUES ('$user', '$pass', '$email', '$phone', '1');";
        $error = false;
        try{
        if ($conn->query($sql) === true) {
            $error = false;
        } 
        } catch(Exception $e){
            // echo "Error: " . $sql . "<br>" . $conn->error;
            $error = $conn->error;
        }
    
        // $conn->close();
        return $error;
    }

    public static function login($user, $pass)
    {
      
        $query = "SELECT * FROM `auth` WHERE `username` = '$user'";
        $conn = Database::getConnection();
        $result = $conn->query($query);
        try{if($result->num_rows == 1){
            $row = $result->fetch_assoc();
              
            try{
            if (password_verify($pass,$row['password']))
              {
            return $row;
        }}
        catch(Exception $e){
            return false;
        }
        }}
        catch(Exception $e){
            return false;
        }
    }
  

    public function __construct($username)
    {
        $this->conn = Database::getConnection();
        $this->conn->query();
        $this->username = $username;

        $query = "SELECT * FROM `user` WHERE `username` = '$username'";
        $conn = Database::getConnection();
        $result = $conn->query($query);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $this->id = $id; 
        }
        else{
            return false;
        }

    }

    public function authenticate()
    {
    }

    public function setBio($bio)
    {
  
   
    }

    public function getBio($id)
    {

    }

    public function setAvatar()
    {
    }

    public function getAvatar()
    {
    }
}

