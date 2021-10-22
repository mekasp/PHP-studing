<?php

session_start();

if(isset($_SESSION['userid'])){
    $db = mysqli_connect('localhost','root','','shop');
    $query = mysqli_query($db,'SELECT * FROM users WHERE id = "' . $_SESSION['userid'] . '";');
    if($query->num_rows > 0){
        $user = $query ->fetch_assoc();
        var_dump($user);
    }
}

require_once 'header.html';

if (!isset($_GET['route']) || $_GET['route'] == 'login'){
    require_once ('login.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'register') {
    require_once ('register.html');
}

require_once 'footer.html';