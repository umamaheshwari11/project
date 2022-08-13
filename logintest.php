<?php 
include 'libs/load.php';


$user = "umamahe";
$pass = "123";
$result = NULL;
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
?>