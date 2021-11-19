<?php

$db = mysqli_connect('localhost','root','','shop');

if ($_POST){
//    $insert = mysqli_query($db,'INSERT INTO categories SET name = "' . $_POST['name'] . '",description = "' . $_POST['description'] . '";');
//    $error = mysqli_error($db);
    mysqli_query($db,"INSERT INTO categories SET status = 1 ;");

    $query = mysqli_query($db,"SELECT max(id) AS id FROM categories");
    $result = $query->fetch_assoc();
    $category_id = $result['id'];

    foreach ($_POST['category_description'] as $language_id => $description){
        mysqli_query($db,"INSERT INTO category_description SET `category_id` ='" . $category_id . "',`language_id` = '" . $language_id . "', `name` = '" . $description['name'] . "', `description` = '" . $description['description'] . "' `date_added` = now ();");
    }
//    $error = mysqli_error();
//    var_dump($result);
//    die();
}

header("location: http://mysql.local/shop/admin/index.php?route=categories");
