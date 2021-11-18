<?php

if ($_POST){
    $db = mysqli_connect('localhost', 'root', '', 'shop');
    mysqli_query($db,"UPDATE products SET category_id = '" . $_POST['category_id'] . "' WHERE `id` = '" . $_POST['product_id'] . "';");

    foreach ($_POST['product_description'] as $language_id => $description){
        mysqli_query($db,"UPDATE products_description SET `name` = '" . $description['name'] ."' ,`description` = '" . $description['description'] . "' WHERE `product_id` = '" . $_POST['product_id'] . "' AND `language_id` = '" . $language_id . "';");
    }

    mysqli_query($db,"UPDATE product_prices SET `price` ='" . $_POST['price'] . "' WHERE `product_id` = '" . $_POST['product_id'] ."';");
}

header('Location: http://mysql.local/shop/admin/index.php?route=products');
