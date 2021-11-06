<?php

if (isset($_GET['category_id'])){
    $db = mysqli_connect('localhost', 'root', '', 'shop');

    $query = mysqli_query($db, "DELETE FROM categories WHERE `id` = '" . $_GET['category_id'] ."';");
}

header('Location: http://mysql.local/shop/admin/index.php?route=categories');
