<?php 
include 'libs/load.php';


$user = "juma";
$pass = "123";
$result = NULL;

if (isset($_GET['logout'])) {
    Session::destroy();
    die("Session destroyed, <a href='logintest.php'>Login Again</a>");
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
}
else{
echo "failed";
}
}
echo <<<EOL
<br><br><a href="logintest.php?logout">Logout</a>
EOL;

?>