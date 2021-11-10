<?php

session_start();

$db = mysqli_connect('localhost','root','','shop');

if($_POST){
    $query = mysqli_query($db,'SELECT * FROM users WHERE `email` = "' . $_POST['email'] . '" AND `password` = "' . $_POST['password'] . '";');
    if($query->num_rows > 0){
        $user = $query->fetch_assoc();
        $_SESSION['userid'] = $user['id'];
        header('Location:http://mysql.local/shop/index.php');
    }
}
header('Location:http://mysql.local/shop/index.php');