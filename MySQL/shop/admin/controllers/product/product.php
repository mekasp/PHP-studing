<?php

if (isset($_GET['route']) && $_GET['route'] == 'products') {
    $query = mysqli_query($db, "SELECT p.id,pd.name FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id WHERE pd.language_id = 2;");

    $products = $query->fetch_all(MYSQLI_ASSOC);
}


if (isset($_GET['product_id'])){
    $query = mysqli_query($db, "SELECT p.id,p.category_id,pp.price FROM products p LEFT JOIN product_prices pp ON p.id = pp.product_id WHERE id = ". $_GET['product_id'] .";");
    $product = $query->fetch_assoc();
    $query = mysqli_query($db,"SELECT * FROM products_description WHERE product_id = " . $_GET['product_id']);
    $product_description = $query->fetch_all(MYSQLI_ASSOC);
}