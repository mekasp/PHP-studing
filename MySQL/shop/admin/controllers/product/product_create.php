<?php

$db = mysqli_connect('localhost','root','','shop');

if (isset($_POST['name']) && isset($_POST['description'])){
    $insert = mysqli_query($db,'INSERT INTO products SET name = "' . $_POST['name'] . '",description = "' . $_POST['description'] . '",category_id = "' . $_POST['category_id'] . '" ;');
    $error = mysqli_error($db);
}

header("location: http://mysql.local/shop/admin/index.php?route=products");