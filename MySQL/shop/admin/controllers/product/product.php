<?php

if (isset($_GET['route']) && $_GET['route'] == 'products') {
    $query = mysqli_query($db, "SELECT * FROM products");

    $products = $query->fetch_all(MYSQLI_ASSOC);
}


if (isset($_GET['product_id'])){
    $query = mysqli_query($db, "SELECT * FROM products WHERE id = ". $_GET['product_id'] .";");

    $product = $query->fetch_assoc();
}