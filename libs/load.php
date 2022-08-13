<?php
include_once 'includes/Database.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Session.class.php';

Session::start();

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php";
}

function verify($username, $password)
{
    if ($username == 'seshu' and $password == '123') {
        return true;
    } else {
        return false;
    }
}


function signup($user, $pass, $email, $phone)
{
    $conn = Database::getConnection();
    $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `block`, `active`)
    VALUES ('$user', '$pass', '$email', '$phone', '0', '1')";

   
    $error = false;
    if ($conn->query($sql) === true) {
        echo "New record created successfully";
        $error = false;
    } else {
        $error = $conn->error;
        // echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    return $error;
}
