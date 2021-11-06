<?php

if ($_POST){
    $db = mysqli_connect('localhost', 'root', '', 'shop');

    $query = mysqli_query($db, "UPDATE products SET `name` = '" . $_POST['name'] ."' ,`description` = '" . $_POST['description'] ."' WHERE `id` = '" . $_POST['product_id'] ."';");
}

header('Location: http://mysql.local/shop/admin/index.php?route=products');
