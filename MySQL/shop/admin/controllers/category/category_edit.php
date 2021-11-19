<?php
//var_dump($_POST);
//die();
if ($_POST){
    $db = mysqli_connect('localhost', 'root', '', 'shop');

    //$query = mysqli_query($db, "UPDATE categories SET `name` = '" . $_POST['name'] ."' ,`description` = '" . $_POST['description'] ."' WHERE `id` = '" . $_POST['category_id'] ."';");
    foreach ($_POST['category_description'] as $language_id => $description){
        $update = mysqli_query($db,"UPDATE category_description SET `name` = '" . $description['name'] ."' ,`description` = '" . $description['description'] . "' WHERE `category_id` = '" . $_POST['category_id'] . "' AND `language_id` = '" . $language_id . "';");
    }

}

header('Location: http://mysql.local/shop/admin/index.php?route=categories');
