<?php

if (isset($_GET['route']) && $_GET['route'] == 'products') {
    $query = mysqli_query($db, "SELECT p.id,pd.name FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id WHERE pd.language_id = 2;");

    $products = $query->fetch_all(MYSQLI_ASSOC);
}


if (isset($_GET['product_id'])){
    $query = mysqli_query($db, "SELECT * FROM products WHERE id = ". $_GET['product_id'] .";");

    $product = $query->fetch_assoc();
}