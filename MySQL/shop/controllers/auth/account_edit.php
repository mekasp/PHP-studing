<?php
session_start();
if ($_POST) {
    $db = mysqli_connect('localhost', 'root', '', 'shop');
    mysqli_query($db, "UPDATE users SET `name` = '" . $_POST['name'] . "' ,`email` = '" . $_POST['email'] . "' , `phone` = '" . $_POST['phone'] . "' WHERE `id` = '" . $_SESSION['userid'] . "';");
    if ($_FILES){
        $path = "../../images/avatars/" . $_FILES['avatar']['name'];
        $loaded = move_uploaded_file($_FILES['avatar']['tmp_name'],$path);
        if ($loaded){
            $path = str_replace('../../','',$path);
            mysqli_query($db,"DELETE FROM user_images WHERE `user_id` ='" . $_SESSION['userid'] . "';");
            mysqli_query($db,"INSERT INTO user_images SET `user_id` ='" . $_SESSION['userid'] . "', avatar_path ='" . $path . "',date_added = now();");
        }
    }
}
header('Location: http://mysql.local/shop/index.php?route=account');
