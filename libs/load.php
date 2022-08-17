<?php
include_once 'includes/Database.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Session.class.php';

Session::start();

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT']."/uma_project/_templates/$name.php";
}

function verify($username, $password)
{
    // if ($username == 'seshu' and $password == '123') {
    //     return true;
    // } else {
    //     return false;
    // }



    $user = $username;
    $pass = $password;
    $result = NULL;
    
    if (isset($_GET['logout'])) {
        Session::destroy();
        die("Session destroyed, <a href='login.php'>Login Again</a>");
    }
    
    
    
    if(Session::get('is_loggined')){
        $username = Session::get('session_user');
        print("welcome back, $username[username]");
        $result = $username;
    }
    else{
        print("No session found");
    $result = User::login($user,$pass);
    if($result){
    echo "success, $result[username]";
    Session::set('is_loggined',true);
    Session::set('session_user',$result);
return true;
    }
    else{
    echo "failed";
    return false;
    }
    }
    echo <<<EOL
    <br><br><a href="login.php?logout">Logout</a>
    EOL;
    

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
