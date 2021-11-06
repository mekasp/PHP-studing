<?php

$db = mysqli_connect('localhost','root','','shop');

if ($_POST){
    mysqli_query($db,'INSERT INTO products SET category_id = "' . $_POST['category_id'] . '" ;');

    $query = mysqli_query($db,"SELECT max(id) AS product_id FROM products");
    $result = $query->fetch_assoc();
    $product_id = $result['product_id'];

    mysqli_query($db,"INSERT INTO product_prices SET product_id = '". $product_id . "' , price = '" . $_POST['price'] ."', status = 1, date_added = now();");

    foreach ($_POST['product_description'] as $language_id => $description){
        mysqli_query($db,"INSERT INTO products_description SET `product_id` ='" . $product_id . "',`language_id` = '" . $language_id . "', `name` = '" . $description['name'] . "', `description` = '" . $description['description'] . "';");
    }
}

header("location: http://mysql.local/shop/admin/index.php?route=products");