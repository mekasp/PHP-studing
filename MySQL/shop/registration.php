<?php

$db = mysqli_connect('localhost','root','','shop');


if ($_POST){
    $insert = mysqli_query($db,'INSERT INTO users SET email = "' . $_POST['email'] . '",name = "' . $_POST['name'] . '",phone = "' . $_POST['phone'] . '",password = "' . $_POST['password'] . '";');
    $error = mysqli_error($db);
    header('Location: http://mysql.local/shop/index.php?route=login');
}

