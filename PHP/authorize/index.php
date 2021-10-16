<?php

session_start();

$user =[];
if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];

    $users = json_decode(file_get_contents('users.txt'),1);

    if (isset($users[$user_id])){
        $user = $users[$user_id];
    }
}

require_once 'header.html';

if ((!isset($_GET['route']) || $_GET['route'] == 'home') && isset($_SESSION['user_id'])) {
    require_once('home.html');
}elseif (!isset($_GET['route']) || $_GET['route'] == 'login'){
    require_once ('login.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'register') {
    require_once ('register.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'logout') {
    require_once('logout.php');
}

require_once 'footer.html';


?>