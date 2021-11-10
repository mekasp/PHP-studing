<?php

session_start();

if (isset($_SESSION['userid'])){
    $db = mysqli_connect('localhost','root','','shop');
    $query = mysqli_query($db,'SELECT u.*,ui.avatar_path as avatar FROM users u LEFT JOIN user_images ui ON u.id = ui.user_id WHERE `id` ="' . $_SESSION['userid'] . '";');;
    if($query->num_rows > 0){
        $user = $query ->fetch_assoc();
    }
}

require_once 'views/header.html';

if (!isset($_GET['route']) || $_GET['route'] == 'login'){
    require_once('views/auth/login.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'register') {
    require_once('views/auth/register.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'account') {
    require_once 'views/auth/account.html';
} elseif (isset($_GET['route']) && $_GET['route'] == 'account_edit') {
    require_once 'views/auth/account_edit.html';
}


if ($user['avatar'] != ''){

}else {

}
require_once 'views/footer.html';