<?php

session_start();

if (isset($_SESSION['userid'])){
    $db = mysqli_connect('localhost','root','','shop');
    $query = mysqli_query($db,'SELECT * FROM users WHERE id = "' . $_SESSION['userid'] . '";');
    if($query->num_rows > 0){
        $user = $query ->fetch_assoc();
        var_dump($user);
    }
}

require_once 'views/header.html';

if (!isset($_GET['route']) || $_GET['route'] == 'login'){
    require_once('views/auth/login.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'register') {
    require_once('views/auth/register.html');
}

require_once 'views/footer.html';