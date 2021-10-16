<?php

session_start();

if ($_POST){
    $users = json_decode(file_get_contents('users.txt'),1);
    $session_user = false;
    foreach ($users as $key => $user){
        if ($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
            $session_user = $key;
        }
    }
    if ($session_user === false){
        echo 'User not found';
    } else{
        $_SESSION['user_id'] = $session_user;
        header('Location: http://php.local/authorize/index.php');
    }
}

?>