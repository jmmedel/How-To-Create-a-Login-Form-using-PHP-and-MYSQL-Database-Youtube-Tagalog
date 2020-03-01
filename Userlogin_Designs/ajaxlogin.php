<?php

session_start();
require_once('config.php');
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('Location: login.php');
    exit;
}
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ? Limit 1 ";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$username]);

if($result){
    $user = $stmtselect->fetch();
    if($stmtselect->rowCount() > 0 ){

        $validpassword = password_verify($password,$user['password']);
        if($validpassword){
                $_SESSION['userlogin'] = $user;
                echo('202');

        }else{
            print 'Ther Username and password are wrong';
        }
    }


}else {
    echo("There is a error while connecting to database");
}


?>